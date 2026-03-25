<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function set(string $locale): RedirectResponse
    {
        if (! in_array($locale, ['de', 'en'])) {
            $locale = 'en';
        }

        session(['locale' => $locale]);

        return redirect()->back();
    }
}