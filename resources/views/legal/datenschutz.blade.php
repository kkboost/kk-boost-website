@extends('layouts.public')

@section('title', __('legal_privacy.meta_title'))
@section('meta_description', __('legal_privacy.meta_description'))

@section('content')

<section class="relative overflow-hidden bg-[#05070b] py-24 sm:py-28">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(239,68,68,0.08),transparent_20%),radial-gradient(circle_at_bottom_right,rgba(239,68,68,0.06),transparent_24%),linear-gradient(180deg,#05070b_0%,#06080d_45%,#05070b_100%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.03),transparent_30%)]"></div>
    <div class="absolute inset-0 opacity-[0.012] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-5xl px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/20 bg-red-600/10 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_20px_rgba(239,68,68,0.05)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_12px_rgba(239,68,68,0.9)]"></span>
                {{ __('legal_privacy.badge') }}
            </div>

            <h1 class="mt-6 text-4xl font-bold tracking-[-0.03em] text-white sm:text-5xl lg:text-6xl">
                {{ __('legal_privacy.title') }}
            </h1>

            <div class="mt-6 h-px w-24 bg-gradient-to-r from-red-500 to-transparent"></div>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                {{ __('legal_privacy.intro') }}
            </p>
        </div>

        <div class="mt-14 space-y-6">
            <div class="rounded-[2rem] border border-white/10 bg-gradient-to-br from-white/[0.06] via-white/[0.035] to-red-500/[0.02] p-8 shadow-[0_20px_60px_rgba(0,0,0,0.30)] backdrop-blur-2xl">
                <p class="text-slate-300 leading-8">{{ __('legal_privacy.lead') }}</p>
            </div>

            @foreach(__('legal_privacy.sections') as $section)
                <div class="rounded-[2rem] border {{ str_contains($section['title'], 'Stripe') ? 'border-red-500/15 bg-gradient-to-br from-red-600/[0.08] via-white/[0.025] to-black shadow-[0_0_60px_rgba(239,68,68,0.05)]' : 'border-white/10 bg-gradient-to-br from-white/[0.05] via-white/[0.03] to-white/[0.02] shadow-[0_18px_50px_rgba(0,0,0,0.22)]' }} p-8 backdrop-blur-xl">
                    <h2 class="text-2xl font-semibold text-white">{{ $section['title'] }}</h2>

                    @foreach($section['paragraphs'] as $paragraph)
                        <p class="mt-4 leading-8 text-slate-300">{{ $paragraph }}</p>
                    @endforeach

                    @if(!empty($section['list']))
                        <ul class="mt-4 space-y-3 pl-6 text-slate-300 marker:text-red-400 list-disc">
                            @foreach($section['list'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if(!empty($section['subsections']))
                        @foreach($section['subsections'] as $subsection)
                            <div class="mt-8 h-px w-full bg-gradient-to-r from-white/10 via-white/5 to-transparent"></div>
                            <h3 class="mt-8 text-lg font-semibold text-red-300">{{ $subsection['title'] }}</h3>
                            @foreach($subsection['paragraphs'] as $paragraph)
                                <p class="mt-3 leading-8 text-slate-300">{{ $paragraph }}</p>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            @endforeach

            <div class="rounded-[2rem] border border-white/10 bg-white/[0.035] p-6 shadow-[0_14px_40px_rgba(0,0,0,0.18)] backdrop-blur-xl">
                <p class="text-sm leading-7 text-slate-400">{{ __('legal_privacy.note') }}</p>
            </div>
        </div>
    </div>
</section>

@endsection