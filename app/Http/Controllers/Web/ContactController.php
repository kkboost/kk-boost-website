<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('web.contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

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