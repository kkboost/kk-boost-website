<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $currentUrl = url()->current();
        $siteName = 'KK-BOOST';
        $pageTitle = trim($__env->yieldContent('title')) ?: __('home.meta_title');
        $pageDescription = trim($__env->yieldContent('meta_description')) ?: __('home.meta_description');
        $ogImage = trim($__env->yieldContent('og_image')) ?: asset('images/og/kk-boost-og.jpg');
        $robots = trim($__env->yieldContent('robots')) ?: 'index,follow';
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $currentUrl }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'de' ? 'de_DE' : 'en_GB' }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <meta name="theme-color" content="#05070b">

    @yield('head')

    <style>
        html {
            -webkit-text-size-adjust: 100%;
            text-rendering: optimizeLegibility;
        }

        body {
            -webkit-tap-highlight-color: transparent;
            overscroll-behavior-y: none;
        }

        @media (max-width: 767px) {
            .kk-mobile-lite-blur {
                -webkit-backdrop-filter: blur(10px) !important;
                backdrop-filter: blur(10px) !important;
            }

            .kk-mobile-lite-shadow {
                box-shadow:
                    0 10px 24px rgba(0,0,0,0.20),
                    0 0 0 1px rgba(255,255,255,0.025) !important;
            }

            .kk-mobile-lite-overlay {
                opacity: 0.012 !important;
            }

            .kk-mobile-lite-radial {
                opacity: 0.75 !important;
            }
        }
    </style>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#05070b] text-white antialiased selection:bg-red-500 selection:text-white">

    <div class="relative min-h-screen overflow-hidden bg-[#05070b]">
        <div class="absolute inset-0 -z-20 bg-[radial-gradient(circle_at_top_left,rgba(239,68,68,0.10),transparent_18%),radial-gradient(circle_at_bottom_right,rgba(220,38,38,0.10),transparent_22%),linear-gradient(180deg,#05070b_0%,#04060a_45%,#05070b_100%)] kk-mobile-lite-radial"></div>
        <div class="absolute inset-0 -z-10 opacity-[0.025] kk-grid-premium kk-mobile-lite-overlay"></div>

        <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 border-b border-white/10 bg-[#07090d]/75 backdrop-blur-2xl kk-mobile-lite-blur">
            <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-red-500/30 to-transparent"></div>

            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
                <a href="{{ route('home') }}" class="group flex items-center gap-4">
                    <div class="relative flex h-14 w-14 items-center justify-center overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-white/[0.08] via-white/[0.04] to-red-500/[0.06] ring-1 ring-white/5 shadow-[0_14px_34px_rgba(0,0,0,0.38)] transition duration-300 group-hover:border-red-500/30 group-hover:shadow-[0_14px_40px_rgba(239,68,68,0.12)] kk-mobile-lite-shadow">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(239,68,68,0.14),transparent_55%)] opacity-70 kk-mobile-lite-radial"></div>
                        <img
                            src="{{ asset('images/branding/kk-boost-logo.png') }}"
                            alt="KK-BOOST Logo"
                            class="relative h-12 w-12 scale-[1.08] object-contain"
                        >
                    </div>

                    <div class="leading-none">
                        <div class="text-[1rem] font-bold tracking-[0.18em] text-white transition duration-300 group-hover:text-red-100">
                            KK-BOOST
                        </div>
                        <div class="mt-2 text-[0.72rem] uppercase tracking-[0.22em] text-slate-400">
                            Individual Chiptuning
                        </div>
                    </div>
                </a>

                <nav class="hidden items-center gap-2 xl:flex">
                    <a href="{{ route('home') }}#services" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_services') }}</a>
                    <a href="{{ route('home') }}#expertise" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_expertise') }}</a>
                    <a href="{{ route('home') }}#workflow" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_workflow') }}</a>
                    <a href="{{ route('home') }}#why-us" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_why_us') }}</a>
                    <a href="{{ route('contact.create') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_contact') }}</a>
                </nav>

                <div class="hidden items-center gap-3 xl:flex">
                    <div class="flex items-center rounded-2xl border border-white/10 bg-gradient-to-br from-white/[0.06] to-white/[0.03] p-1 shadow-[0_10px_24px_rgba(0,0,0,0.22)]">
                        <a href="{{ route('lang.switch', 'de') }}"
                           class="rounded-xl px-3 py-2 text-xs font-semibold transition duration-300 {{ app()->getLocale() === 'de' ? 'bg-red-500 text-white shadow-[0_0_24px_rgba(239,68,68,0.28)]' : 'text-slate-300 hover:text-white' }}">
                            DE
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}"
                           class="rounded-xl px-3 py-2 text-xs font-semibold transition duration-300 {{ app()->getLocale() === 'en' ? 'bg-red-500 text-white shadow-[0_0_24px_rgba(239,68,68,0.28)]' : 'text-slate-300 hover:text-white' }}">
                            EN
                        </a>
                    </div>

                    <a href="https://kk-boostfileservice.de/login"
                       class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-gradient-to-br from-white/[0.06] to-white/[0.03] px-5 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(0,0,0,0.20)] transition duration-300 hover:border-white/20 hover:bg-white/10 hover:shadow-[0_10px_30px_rgba(255,255,255,0.05)]">
                        {{ __('home.nav_login') }}
                    </a>

                    <a href="https://kk-boostfileservice.de/register"
                       class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-[0_16px_40px_rgba(239,68,68,0.30)] transition duration-300 hover:scale-[1.02] hover:shadow-[0_18px_46px_rgba(239,68,68,0.38)]">
                        {{ __('home.nav_register') }}
                    </a>
                </div>

                <button
                    type="button"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="inline-flex xl:hidden items-center justify-center rounded-2xl border border-white/10 bg-gradient-to-br from-white/[0.06] to-white/[0.03] p-3 text-white shadow-[0_10px_24px_rgba(0,0,0,0.20)] transition duration-300 hover:border-red-500/30 hover:bg-white/10 transform-gpu"
                    :aria-expanded="mobileMenuOpen.toString()"
                    aria-label="Menü öffnen"
                >
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: block;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16" />
                    </svg>

                    <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-250"
                x-transition:enter-start="opacity-0 -translate-y-3"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-180"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-3"
                class="xl:hidden border-t border-white/10 transform-gpu"
                style="display: none;"
            >
                <div class="mx-auto max-w-7xl px-6 py-5 lg:px-8">
                    <div class="overflow-hidden rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-[#0b0f14]/95 via-[#090c11]/95 to-[#13080a]/95 p-5 shadow-[0_20px_60px_rgba(0,0,0,0.35)] backdrop-blur-2xl kk-mobile-lite-blur kk-mobile-lite-shadow">
                        <div class="flex flex-col gap-2">
                            <a @click="mobileMenuOpen = false" href="{{ route('home') }}#services" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_services') }}</a>
                            <a @click="mobileMenuOpen = false" href="{{ route('home') }}#expertise" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_expertise') }}</a>
                            <a @click="mobileMenuOpen = false" href="{{ route('home') }}#workflow" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_workflow') }}</a>
                            <a @click="mobileMenuOpen = false" href="{{ route('home') }}#why-us" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_why_us') }}</a>
                            <a @click="mobileMenuOpen = false" href="{{ route('contact.create') }}" class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-200 transition duration-300 hover:bg-white/5 hover:text-red-300">{{ __('home.nav_contact') }}</a>
                        </div>

                        <div class="my-5 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center rounded-2xl border border-white/10 bg-gradient-to-br from-white/[0.06] to-white/[0.03] p-1 shadow-[0_10px_24px_rgba(0,0,0,0.22)]">
                                <a href="{{ route('lang.switch', 'de') }}"
                                   class="rounded-xl px-3 py-2 text-xs font-semibold transition duration-300 {{ app()->getLocale() === 'de' ? 'bg-red-500 text-white shadow-[0_0_24px_rgba(239,68,68,0.28)]' : 'text-slate-300 hover:text-white' }}">
                                    DE
                                </a>
                                <a href="{{ route('lang.switch', 'en') }}"
                                   class="rounded-xl px-3 py-2 text-xs font-semibold transition duration-300 {{ app()->getLocale() === 'en' ? 'bg-red-500 text-white shadow-[0_0_24px_rgba(239,68,68,0.28)]' : 'text-slate-300 hover:text-white' }}">
                                    EN
                                </a>
                            </div>
                        </div>

                        <div class="mt-5 grid gap-3 sm:grid-cols-2">
                            <a href="https://kk-boostfileservice.de/login"
                               class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-gradient-to-br from-white/[0.06] to-white/[0.03] px-5 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(0,0,0,0.20)] transition duration-300 hover:border-white/20 hover:bg-white/10">
                                {{ __('home.nav_login') }}
                            </a>

                            <a href="https://kk-boostfileservice.de/register"
                               class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-[0_16px_40px_rgba(239,68,68,0.30)] transition duration-300 hover:scale-[1.02]">
                                {{ __('home.nav_register') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="relative border-t border-white/5 bg-[#05070b]">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(239,68,68,0.08),transparent_30%)] kk-mobile-lite-radial"></div>
            <div class="absolute inset-0 opacity-[0.015] kk-grid-premium-soft kk-mobile-lite-overlay"></div>

            <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8">
                <div class="grid gap-14 md:grid-cols-4">
                    <div class="md:col-span-2">
                        <div class="flex items-center gap-4">
                            <div class="relative flex h-14 w-14 items-center justify-center overflow-hidden rounded-2xl border border-white/10 bg-gradient-to-br from-white/[0.08] via-white/[0.04] to-red-500/[0.06] ring-1 ring-white/5 shadow-[0_14px_34px_rgba(0,0,0,0.32)] kk-mobile-lite-shadow">
                                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(239,68,68,0.14),transparent_55%)] opacity-70 kk-mobile-lite-radial"></div>
                                <img
                                    src="{{ asset('images/branding/kk-boost-logo.png') }}"
                                    alt="KK-BOOST Logo"
                                    class="relative h-12 w-12 scale-[1.08] object-contain"
                                >
                            </div>

                            <div class="leading-none">
                                <div class="text-[1rem] font-bold tracking-[0.18em] text-white">
                                    KK-BOOST
                                </div>
                                <div class="mt-2 text-[0.72rem] uppercase tracking-[0.22em] text-slate-400">
                                    Individual Chiptuning
                                </div>
                            </div>
                        </div>

                        <p class="mt-8 max-w-xl text-sm leading-8 text-slate-400">
                            KK-BOOST steht für Individual Chiptuning, Premium Fileservice, mobile Performance-Dienstleistungen und technisch präzise Lösungen mit echter High-End-Ausrichtung.
                        </p>

                        <div class="mt-8 flex flex-wrap gap-3">
                            <span class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-slate-300">Premium Fileservice</span>
                            <span class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-slate-300">Individuelle Lösungen</span>
                            <span class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-slate-300">Professioneller Workflow</span>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.24em] text-white">
                            {{ __('home.footer_nav_title') }}
                        </h3>

                        <div class="mt-6 flex flex-col gap-4 text-sm text-slate-400">
                            <a href="{{ route('home') }}#services" class="transition duration-300 hover:text-white">{{ __('home.nav_services') }}</a>
                            <a href="{{ route('home') }}#expertise" class="transition duration-300 hover:text-white">{{ __('home.nav_expertise') }}</a>
                            <a href="{{ route('home') }}#workflow" class="transition duration-300 hover:text-white">{{ __('home.nav_workflow') }}</a>
                            <a href="{{ route('home') }}#why-us" class="transition duration-300 hover:text-white">{{ __('home.nav_why_us') }}</a>
                            <a href="{{ route('contact.create') }}" class="transition duration-300 hover:text-white">{{ __('home.nav_contact') }}</a>
                            <a href="https://kk-boostfileservice.de/login" class="transition duration-300 hover:text-white">{{ __('home.nav_login') }}</a>
                            <a href="https://kk-boostfileservice.de/register" class="transition duration-300 hover:text-white">{{ __('home.nav_register') }}</a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.24em] text-white">
                            {{ __('home.footer_legal_title') }}
                        </h3>

                        <div class="mt-6 flex flex-col gap-4 text-sm text-slate-400">
                            <a href="{{ route('legal.impressum') }}" class="transition duration-300 hover:text-white">{{ __('home.footer_impressum') }}</a>
                            <a href="{{ route('legal.datenschutz') }}" class="transition duration-300 hover:text-white">{{ __('home.footer_datenschutz') }}</a>
                            <a href="{{ route('legal.agb') }}" class="transition duration-300 hover:text-white">{{ __('home.footer_agb') }}</a>
                        </div>
                    </div>
                </div>

                <div class="mt-16 border-t border-white/5 pt-8 text-xs tracking-[0.12em] text-slate-500">
                    © {{ now()->year }} KK-BOOST · Premium Performance & Fileservice
                </div>
            </div>
        </footer>
    </div>

</body>
</html>