<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicContactController extends Controller
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

        try {
            Mail::raw(
                "Neue Kontaktanfrage:\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Betreff: {$validated['subject']}\n\n" .
                "Nachricht:\n{$validated['message']}",
                function ($mail) use ($validated) {
                    $mail->to('info@kk-boost.de') // ← HIER ÄNDERN
                         ->subject('Neue Kontaktanfrage - KK-BOOST');
                }
            );
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()
            ->route('contact.index')
            ->with('success', __('contact.success_message'));
    }
}