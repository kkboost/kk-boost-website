<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function create()
    {
        return view('web.contact.create');
    }

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Zusätzlicher Spam-Schutz vor der normalen Validierung
        |--------------------------------------------------------------------------
        */

        // 1) Honeypot-Feld: echte Nutzer sehen/füllen es nicht
        if ($request->filled('website')) {
            return redirect()
                ->route('contact.create')
                ->with('error', __('contact_mail.delivery_failed'));
        }

        // 2) Zeitprüfung: Formular wurde zu schnell abgesendet = sehr wahrscheinlich Bot
        if ($request->filled('form_time')) {
            $submittedAt = (int) $request->input('form_time');

            if ($submittedAt > 0 && (time() - $submittedAt) < 3) {
                return redirect()
                    ->route('contact.create')
                    ->withInput()
                    ->with('error', __('contact_mail.delivery_failed'));
            }
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Zusätzliche inhaltliche Spam-Prüfungen
        |--------------------------------------------------------------------------
        */

        $nameLower = Str::lower(trim($validated['name']));
        $emailLower = Str::lower(trim($validated['email']));
        $subjectLower = Str::lower(trim($validated['subject']));
        $messageLower = Str::lower(trim($validated['message']));

        $combinedText = $nameLower . ' ' . $emailLower . ' ' . $subjectLower . ' ' . $messageLower;

        $spamKeywords = [
            'reseller',
            'price for reseller',
            'about your price',
            'wanted to know your price',
            'volevo sapere il tuo prezzo',
            'quería saber o seu prezo',
            'meg akartam tudni az árát',
            'qiymətinizi bilmək istədim',
        ];

        $isSpam = false;

        // 3) Verdächtige Keywords / Muster
        foreach ($spamKeywords as $keyword) {
            if (Str::contains($combinedText, Str::lower($keyword))) {
                $isSpam = true;
                break;
            }
        }

        // 4) Sehr viele Links sind fast immer Spam
        if (
            substr_count($validated['message'], 'http://') > 0 ||
            substr_count($validated['message'], 'https://') > 0 ||
            substr_count($validated['message'], 'www.') > 0
        ) {
            $isSpam = true;
        }

        // 5) Zu viele Sonderzeichen / unnatürliche Inhalte
        if (preg_match('/[<>$%^*_=~`|]{4,}/', $validated['message'])) {
            $isSpam = true;
        }

        // 6) Wegwerf-/komische Namensmuster optional grob erkennen
        if (
            strlen($validated['name']) < 2 ||
            preg_match('/^[a-z0-9]+$/i', str_replace([' ', '-'], '', $validated['name'])) &&
            strlen(str_replace([' ', '-'], '', $validated['name'])) > 20
        ) {
            $isSpam = true;
        }

        // 7) Wenn Nachricht eindeutig Spam ist: keine Mail senden
        if ($isSpam) {
            return redirect()
                ->route('contact.create')
                ->with('success', __('contact.success_message'));
        }

        $locale = app()->getLocale();

        try {
            App::setLocale($locale);

            Mail::send('emails.contact.admin-notification', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subjectLine' => $validated['subject'],
                'messageText' => $validated['message'],
            ], function ($mail) use ($validated, $locale) {
                $mail->to('info@kk-boost.de')
                    ->replyTo($validated['email'], $validated['name'])
                    ->subject(__('contact_mail.admin_subject'));
            });

            App::setLocale($locale);

            Mail::send('emails.contact.customer-confirmation', [
                'name' => $validated['name'],
                'subjectLine' => $validated['subject'],
            ], function ($mail) use ($validated, $locale) {
                $mail->to($validated['email'], $validated['name'])
                    ->subject(__('contact_mail.customer_subject'));
            });

            App::setLocale($locale);

            return redirect()
                ->route('contact.create')
                ->with('success', __('contact.success_message'));

        } catch (\Throwable $e) {
            report($e);

            App::setLocale($locale);

            return redirect()
                ->route('contact.create')
                ->withInput()
                ->with('error', __('contact_mail.delivery_failed'));
        }
    }
}