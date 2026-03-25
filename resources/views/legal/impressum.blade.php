@extends('layouts.public')

@section('title', __('legal_impressum.meta_title'))
@section('meta_description', __('legal_impressum.meta_description'))

@section('content')

<section class="relative overflow-hidden bg-[#05070b] py-24 sm:py-28">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(239,68,68,0.08),transparent_20%),radial-gradient(circle_at_bottom_right,rgba(239,68,68,0.06),transparent_24%),linear-gradient(180deg,#05070b_0%,#06080d_45%,#05070b_100%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.03),transparent_30%)]"></div>
    <div class="absolute inset-0 opacity-[0.012] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-5xl px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/20 bg-red-600/10 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_20px_rgba(239,68,68,0.05)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_12px_rgba(239,68,68,0.9)]"></span>
                {{ __('legal_impressum.badge') }}
            </div>

            <h1 class="mt-6 text-4xl font-bold tracking-[-0.03em] text-white sm:text-5xl lg:text-6xl">
                {{ __('legal_impressum.title') }}
            </h1>

            <div class="mt-6 h-px w-24 bg-gradient-to-r from-red-500 to-transparent"></div>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                {{ __('legal_impressum.intro') }}
            </p>
        </div>

        <div class="mt-14 space-y-8">
            <div class="rounded-[2rem] border border-white/10 bg-gradient-to-br from-white/[0.06] via-white/[0.035] to-red-500/[0.02] p-8 shadow-[0_20px_60px_rgba(0,0,0,0.30)] backdrop-blur-2xl">
                <h2 class="text-2xl font-semibold text-white">{{ __('legal_impressum.section_company') }}</h2>

                <div class="mt-6 space-y-2 text-slate-300">
                    <p class="font-semibold text-white">{{ __('legal_impressum.company_name') }}</p>
                    <p>{{ __('legal_impressum.owner') }}</p>
                    <p>{{ __('legal_impressum.street') }}</p>
                    <p>{{ __('legal_impressum.zip_city') }}</p>
                    <p>{{ __('legal_impressum.country') }}</p>
                </div>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-black/20 p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.03)]">
                        <div class="text-sm font-semibold uppercase tracking-[0.18em] text-red-400">{{ __('legal_impressum.vat_label') }}</div>
                        <p class="mt-3 text-slate-300">{{ __('legal_impressum.vat_value') }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/20 p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.03)]">
                        <div class="text-sm font-semibold uppercase tracking-[0.18em] text-red-400">{{ __('legal_impressum.contact_label') }}</div>
                        <p class="mt-3 text-slate-300">{{ __('legal_impressum.email') }}</p>
                        <p class="mt-1 text-slate-300">{{ __('legal_impressum.phone') }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-gradient-to-br from-white/[0.05] via-white/[0.03] to-white/[0.02] p-8 shadow-[0_18px_50px_rgba(0,0,0,0.22)] backdrop-blur-xl">
                <h2 class="text-2xl font-semibold text-white">{{ __('legal_impressum.disclaimer_title') }}</h2>

                <h3 class="mt-6 text-lg font-semibold text-red-300">{{ __('legal_impressum.content_liability_title') }}</h3>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.content_liability_text') }}</p>

                <div class="mt-8 h-px w-full bg-gradient-to-r from-white/10 via-white/5 to-transparent"></div>

                <h3 class="mt-8 text-lg font-semibold text-red-300">{{ __('legal_impressum.links_liability_title') }}</h3>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.links_liability_text') }}</p>

                <div class="mt-8 h-px w-full bg-gradient-to-r from-white/10 via-white/5 to-transparent"></div>

                <h3 class="mt-8 text-lg font-semibold text-red-300">{{ __('legal_impressum.copyright_title') }}</h3>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.copyright_text') }}</p>
            </div>

            <div class="rounded-[2rem] border border-red-500/15 bg-gradient-to-br from-red-600/[0.08] via-white/[0.025] to-black p-8 shadow-[0_0_60px_rgba(239,68,68,0.05)] backdrop-blur-xl">
                <h2 class="text-2xl font-semibold text-white">{{ __('legal_impressum.software_title') }}</h2>

                <h3 class="mt-6 text-lg font-semibold text-red-300">{{ __('legal_impressum.software_notice_title') }}</h3>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.software_notice_text_1') }}</p>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.software_notice_text_2') }}</p>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.software_notice_text_3') }}</p>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.software_notice_text_4') }}</p>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.software_notice_text_5') }}</p>

                <div class="mt-8 h-px w-full bg-gradient-to-r from-red-500/20 via-white/5 to-transparent"></div>

                <h3 class="mt-8 text-lg font-semibold text-red-300">{{ __('legal_impressum.no_guarantee_title') }}</h3>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.no_guarantee_text') }}</p>

                <div class="mt-8 h-px w-full bg-gradient-to-r from-red-500/20 via-white/5 to-transparent"></div>

                <h3 class="mt-8 text-lg font-semibold text-red-300">{{ __('legal_impressum.misuse_title') }}</h3>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.misuse_intro') }}</p>

                <ul class="mt-4 space-y-3 pl-6 text-slate-300 marker:text-red-400 list-disc">
                    @foreach(__('legal_impressum.misuse_items') as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <p class="mt-4 leading-8 text-slate-300">{{ __('legal_impressum.misuse_text') }}</p>

                <div class="mt-8 h-px w-full bg-gradient-to-r from-red-500/20 via-white/5 to-transparent"></div>

                <h3 class="mt-8 text-lg font-semibold text-red-300">{{ __('legal_impressum.data_loss_title') }}</h3>
                <p class="mt-3 leading-8 text-slate-300">{{ __('legal_impressum.data_loss_text') }}</p>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/[0.035] p-6 shadow-[0_14px_40px_rgba(0,0,0,0.18)] backdrop-blur-xl">
                <p class="text-sm leading-7 text-slate-400">{{ __('legal_impressum.note') }}</p>
            </div>
        </div>
    </div>
</section>

@endsection