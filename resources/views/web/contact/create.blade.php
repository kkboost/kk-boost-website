@extends('layouts.public')

@section('title', __('contact.meta_title'))
@section('meta_description', __('contact.meta_description'))

@section('content')

<section class="relative overflow-hidden bg-[#05070b] py-24 sm:py-28">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(239,68,68,0.08),transparent_22%),radial-gradient(circle_at_bottom_right,rgba(239,68,68,0.06),transparent_24%)]"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-red-500/20 bg-red-600/10 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 backdrop-blur sm:text-sm">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_12px_rgba(239,68,68,0.9)]"></span>
                {{ __('contact.badge') }}
            </div>

            <p class="mb-4 text-sm font-semibold uppercase tracking-[0.28em] text-slate-400">
                KK-BOOST
            </p>

            <h1 class="text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-5xl lg:text-6xl">
                {{ __('contact.title') }}
            </h1>

            <div class="mt-6 h-px w-24 bg-gradient-to-r from-red-500 to-transparent"></div>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                {{ __('contact.intro') }}
            </p>
        </div>

        <div class="mt-14 grid gap-8 lg:grid-cols-[0.72fr_0.28fr]">
            <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-black/45 p-6 shadow-[0_24px_70px_rgba(0,0,0,0.42)] backdrop-blur-2xl sm:p-8">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(239,68,68,0.08),transparent_42%)] opacity-80"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-white/[0.03] via-transparent to-red-500/[0.03]"></div>

                <div class="relative">
                    @if (session('success'))
                        <div class="mb-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-4 text-sm text-emerald-300 shadow-lg shadow-black/10">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 rounded-2xl border border-red-400/20 bg-red-400/10 px-5 py-4 text-sm text-red-300 shadow-lg shadow-black/10">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-red-400/20 bg-red-400/10 px-5 py-4 text-sm text-red-300 shadow-lg shadow-black/10">
                            <div class="font-semibold">{{ __('contact.error_title') }}</div>
                            <ul class="mt-2 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf

                        {{-- Spam-Schutz: verstecktes Honeypot-Feld für Bots --}}
                        <input
                            type="text"
                            name="website"
                            value=""
                            tabindex="-1"
                            autocomplete="off"
                            class="hidden"
                            aria-hidden="true"
                        >

                        {{-- Spam-Schutz: Zeitstempel zur Erkennung von zu schnellen Submits --}}
                        <input
                            type="hidden"
                            name="form_time"
                            value="{{ time() }}"
                        >

                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-200">
                                    {{ __('contact.form_name') }}
                                </label>

                                <input
                                    name="name"
                                    type="text"
                                    value="{{ old('name') }}"
                                    class="w-full rounded-2xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-500 shadow-[inset_0_1px_0_rgba(255,255,255,0.03)] transition duration-300 focus:border-red-500/50 focus:bg-black/50 focus:outline-none focus:ring-2 focus:ring-red-500/10"
                                    placeholder="{{ __('contact.form_name_placeholder') }}"
                                >
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-200">
                                    {{ __('contact.form_email') }}
                                </label>

                                <input
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    class="w-full rounded-2xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-500 shadow-[inset_0_1px_0_rgba(255,255,255,0.03)] transition duration-300 focus:border-red-500/50 focus:bg-black/50 focus:outline-none focus:ring-2 focus:ring-red-500/10"
                                    placeholder="{{ __('contact.form_email_placeholder') }}"
                                >
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-200">
                                {{ __('contact.form_subject') }}
                            </label>

                            <input
                                name="subject"
                                type="text"
                                value="{{ old('subject') }}"
                                class="w-full rounded-2xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-500 shadow-[inset_0_1px_0_rgba(255,255,255,0.03)] transition duration-300 focus:border-red-500/50 focus:bg-black/50 focus:outline-none focus:ring-2 focus:ring-red-500/10"
                                placeholder="{{ __('contact.form_subject_placeholder') }}"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-200">
                                {{ __('contact.form_message') }}
                            </label>

                            <textarea
                                name="message"
                                rows="8"
                                class="w-full rounded-2xl border border-white/10 bg-black/40 px-4 py-3 text-white placeholder:text-slate-500 shadow-[inset_0_1px_0_rgba(255,255,255,0.03)] transition duration-300 focus:border-red-500/50 focus:bg-black/50 focus:outline-none focus:ring-2 focus:ring-red-500/10"
                                placeholder="{{ __('contact.form_message_placeholder') }}"
                            >{{ old('message') }}</textarea>
                        </div>

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3.5 text-sm font-semibold text-white shadow-[0_16px_40px_rgba(239,68,68,0.28)] transition duration-300 hover:scale-[1.02] hover:shadow-[0_18px_44px_rgba(239,68,68,0.34)]"
                            >
                                {{ __('contact.form_submit') }}
                            </button>

                            <p class="text-sm leading-6 text-slate-400">
                                {{ __('contact.form_note') }}
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-[2rem] border border-white/10 bg-black/35 p-8 shadow-[0_18px_40px_rgba(0,0,0,0.28)] backdrop-blur-xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-red-400">
                        {{ __('contact.side_kicker') }}
                    </p>

                    <h2 class="mt-4 text-2xl font-semibold text-white">
                        {{ __('contact.side_title') }}
                    </h2>

                    <p class="mt-4 leading-7 text-slate-400">
                        {{ __('contact.side_text') }}
                    </p>
                </div>

                <div class="rounded-[2rem] border border-white/10 bg-black/35 p-8 shadow-[0_18px_40px_rgba(0,0,0,0.28)] backdrop-blur-xl">
                    <h3 class="text-lg font-semibold text-white">
                        {{ __('contact.side_points_title') }}
                    </h3>

                    <ul class="mt-4 space-y-3 text-sm leading-7 text-slate-300">
                        <li>• {{ __('contact.side_point_1') }}</li>
                        <li>• {{ __('contact.side_point_2') }}</li>
                        <li>• {{ __('contact.side_point_3') }}</li>
                        <li>• {{ __('contact.side_point_4') }}</li>
                    </ul>
                </div>

                <div class="rounded-[2rem] border border-red-500/20 bg-gradient-to-br from-red-600/12 via-orange-500/5 to-slate-950 p-8 shadow-[0_18px_40px_rgba(0,0,0,0.28)] backdrop-blur-xl">
                    <h3 class="text-lg font-semibold text-red-300">
                        {{ __('contact.side_cta_title') }}
                    </h3>

                    <p class="mt-3 text-sm leading-7 text-slate-200">
                        {{ __('contact.side_cta_text') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- WhatsApp Floating Button --}}
    <a href="https://wa.me/4915566180004?text={{ urlencode(app()->getLocale() === 'de' ? 'Hallo KK-BOOST, ich habe eine Anfrage.' : 'Hello KK-BOOST, I have an inquiry.') }}"
       target="_blank"
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 group">

        <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-black/60 px-4 py-3 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.5)] transition duration-300 hover:scale-[1.05] hover:border-green-400/40">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-green-500 to-green-400 shadow-[0_0_20px_rgba(34,197,94,0.6)]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" class="h-5 w-5">
                    <path d="M20.52 3.48A11.86 11.86 0 0012.06 0C5.48 0 .1 5.38.1 11.96c0 2.11.55 4.16 1.6 5.97L0 24l6.2-1.62a11.9 11.9 0 005.86 1.5h.01c6.58 0 11.96-5.38 11.96-11.96 0-3.2-1.25-6.21-3.51-8.44zM12.07 21.7h-.01a9.7 9.7 0 01-4.94-1.34l-.35-.2-3.68.96.98-3.59-.23-.37a9.67 9.67 0 01-1.48-5.2c0-5.36 4.36-9.72 9.73-9.72 2.6 0 5.05 1.01 6.88 2.85a9.66 9.66 0 012.85 6.87c0 5.36-4.36 9.74-9.72 9.74zm5.33-7.27c-.29-.15-1.72-.85-1.99-.94-.27-.1-.47-.15-.67.15-.2.29-.77.94-.94 1.13-.17.2-.34.22-.63.07-.29-.15-1.22-.45-2.33-1.44-.86-.77-1.44-1.72-1.61-2.01-.17-.29-.02-.44.13-.59.13-.13.29-.34.43-.51.15-.17.2-.29.3-.49.1-.2.05-.37-.02-.52-.07-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.5h-.57c-.2 0-.52.07-.79.37-.27.29-1.04 1.02-1.04 2.48 0 1.46 1.07 2.87 1.22 3.07.15.2 2.11 3.22 5.1 4.52.71.31 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.08 1.72-.7 1.96-1.37.24-.67.24-1.24.17-1.36-.07-.12-.27-.2-.57-.35z"/>
                </svg>
            </div>

            <div class="hidden sm:block">
                <div class="text-xs text-slate-400">
                    {{ __('contact.whatsapp_help') }}
                </div>
                <div class="text-sm font-semibold text-white">
                    WhatsApp
                </div>
            </div>

        </div>
    </a>
</section>

@endsection