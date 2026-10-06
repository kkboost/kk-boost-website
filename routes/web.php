<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\LanguageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:3,10')
    ->name('contact.store');

Route::get('/lang/{locale}', [LanguageController::class, 'set'])
    ->where('locale', 'de|en')
    ->name('lang.switch');

Route::view('/impressum', 'legal.impressum')->name('legal.impressum');
Route::view('/datenschutz', 'legal.datenschutz')->name('legal.datenschutz');
Route::view('/agb', 'legal.agb')->name('legal.agb');

Route::get('/sitemap.xml', function () {
    $urls = [
        [
            'loc' => route('home'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '1.0',
        ],
        [
            'loc' => route('contact.create'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ],
        [
            'loc' => route('legal.impressum'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'yearly',
            'priority' => '0.3',
        ],
        [
            'loc' => route('legal.datenschutz'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'yearly',
            'priority' => '0.3',
        ],
        [
            'loc' => route('legal.agb'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'yearly',
            'priority' => '0.3',
        ],
    ];

    return response()
        ->view('sitemap', compact('urls'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');