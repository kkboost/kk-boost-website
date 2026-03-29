@extends('layouts.public')

@section('title', 'KK-BOOST REMAPPING')
@section('meta_description', __('home.meta_description'))

@section('head')
    @php
        $homeSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => __('home.meta_title'),
            'description' => __('home.meta_description'),
            'url' => url()->current(),
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => 'KK-BOOST',
                'url' => url('/'),
            ],
            'about' => [
                '@type' => 'Organization',
                'name' => 'KK-BOOST',
                'url' => url('/'),
            ],
            'inLanguage' => app()->getLocale() === 'de' ? 'de-DE' : 'en-GB',
        ];

        $serviceSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'KK-BOOST Chiptuning & Fileservice',
            'provider' => [
                '@type' => 'Organization',
                'name' => 'KK-BOOST',
                'url' => url('/'),
            ],
            'serviceType' => 'Chiptuning, Fileservice, Getriebeoptimierung, Performance Solutions',
            'areaServed' => 'Europe',
            'availableLanguage' => ['German', 'English'],
            'url' => url()->current(),
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($homeSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

<style>
    @keyframes kkFloatSlow {
        0%, 100% {
            transform: translate3d(0, 0, 0);
        }
        50% {
            transform: translate3d(0, -6px, 0);
        }
    }

    @keyframes kkGlowPulse {
        0%, 100% {
            opacity: 0.55;
            transform: scale(1);
        }
        50% {
            opacity: 0.9;
            transform: scale(1.06);
        }
    }

    @keyframes kkShimmer {
        0% {
            transform: translateX(-120%);
            opacity: 0;
        }
        20% {
            opacity: 0.22;
        }
        100% {
            transform: translateX(120%);
            opacity: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
            animation: none !important;
            transition: none !important;
            scroll-behavior: auto !important;
        }
    }

    html {
        scroll-behavior: smooth;
    }

    section {
        position: relative;
    }

    section .rounded-\[1\.75rem\],
    section .rounded-\[1\.6rem\],
    section .rounded-\[1\.9rem\],
    section .rounded-\[2rem\],
    section .rounded-\[1\.4rem\],
    section .rounded-2xl,
    section .rounded-3xl,
    section .rounded-\[1\.5rem\] {
        transition:
            transform 420ms cubic-bezier(0.22, 1, 0.36, 1),
            border-color 320ms ease,
            box-shadow 420ms cubic-bezier(0.22, 1, 0.36, 1),
            background-color 320ms ease,
            opacity 320ms ease;
        will-change: transform, box-shadow;
    }

    section .rounded-\[1\.75rem\]:hover,
    section .rounded-\[1\.6rem\]:hover,
    section .rounded-\[1\.9rem\]:hover,
    section .rounded-\[2rem\]:hover,
    section .rounded-\[1\.4rem\]:hover,
    section .rounded-2xl:hover,
    section .rounded-3xl:hover,
    section .rounded-\[1\.5rem\]:hover {
        box-shadow:
            0 24px 70px rgba(0, 0, 0, 0.30),
            0 0 0 1px rgba(255, 255, 255, 0.035),
            0 0 40px rgba(239, 68, 68, 0.07);
    }

    section a.inline-flex,
    section button,
    .fixed a.inline-flex,
    .fixed button {
        position: relative;
        transition:
            transform 260ms cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 320ms ease,
            background-color 260ms ease,
            border-color 260ms ease,
            color 260ms ease,
            opacity 260ms ease;
        will-change: transform, box-shadow;
    }

    section a.inline-flex:hover,
    section button:hover,
    .fixed a.inline-flex:hover,
    .fixed button:hover {
        transform: translateY(-1px);
    }

    section a.inline-flex:active,
    section button:active,
    .fixed a.inline-flex:active,
    .fixed button:active {
        transform: translateY(0) scale(0.985);
    }

    section a.inline-flex:focus-visible,
    section button:focus-visible,
    .fixed a.inline-flex:focus-visible,
    .fixed button:focus-visible {
        outline: none;
        box-shadow:
            0 0 0 1px rgba(255, 255, 255, 0.06),
            0 0 0 4px rgba(239, 68, 68, 0.16),
            0 16px 36px rgba(0, 0, 0, 0.22);
    }

    section a.bg-gradient-to-r.from-red-600,
    .fixed a.bg-gradient-to-r.from-red-600,
    .fixed button.border-green-400\/16,
    .fixed button.border-green-400\/18 {
        overflow: hidden;
        isolation: isolate;
    }

    section a.bg-gradient-to-r.from-red-600::after,
    .fixed a.bg-gradient-to-r.from-red-600::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(115deg, transparent 18%, rgba(255,255,255,0.18) 50%, transparent 82%);
        transform: translateX(-120%);
        transition: transform 0ms;
        pointer-events: none;
        z-index: 0;
    }

    section a.bg-gradient-to-r.from-red-600:hover::after,
    .fixed a.bg-gradient-to-r.from-red-600:hover::after {
        animation: kkShimmer 1.25s ease;
    }

    section a.bg-gradient-to-r.from-red-600 > *,
    .fixed a.bg-gradient-to-r.from-red-600 > * {
        position: relative;
        z-index: 1;
    }

    .kk-status-active,
    .kk-status-inactive {
        backdrop-filter: blur(12px);
    }

    .kk-status-dot-active {
        animation: kkGlowPulse 1.9s ease-in-out infinite;
    }

    .group img,
    img {
        transition:
            transform 700ms cubic-bezier(0.22, 1, 0.36, 1),
            filter 420ms ease,
            opacity 320ms ease;
    }

    .group:hover img {
        filter: saturate(1.04) contrast(1.03);
    }

    .sticky.top-28 {
        transition: transform 320ms ease, box-shadow 320ms ease, border-color 320ms ease;
    }

    .sticky.top-28:hover {
        transform: translateY(-2px);
        box-shadow:
            0 26px 75px rgba(0, 0, 0, 0.34),
            0 0 48px rgba(239, 68, 68, 0.08);
    }

    .kk-grid-premium,
    .kk-grid-premium-soft {
        mask-image: linear-gradient(to bottom, transparent, rgba(0,0,0,1) 12%, rgba(0,0,0,1) 88%, transparent);
    }

    .absolute.-inset-6.rounded-\[2rem\].bg-red-600\/10.blur-3xl,
    .absolute.-inset-4.rounded-\[2rem\].bg-red-600\/10.blur-3xl {
        animation: kkFloatSlow 7.5s ease-in-out infinite;
    }

    .shadow-\[0_24px_90px_rgba\(0\,0\,0\,0\.40\)\] {
        box-shadow:
            0 30px 110px rgba(0, 0, 0, 0.42),
            0 0 0 1px rgba(255,255,255,0.035),
            inset 0 1px 0 rgba(255,255,255,0.03) !important;
    }

    .shadow-\[0_20px_70px_rgba\(0\,0\,0\,0\.30\)\] {
        box-shadow:
            0 24px 85px rgba(0, 0, 0, 0.34),
            0 0 0 1px rgba(255,255,255,0.03),
            inset 0 1px 0 rgba(255,255,255,0.025) !important;
    }

    .shadow-\[0_0_50px_rgba\(239\,68\,68\,0\.05\)\],
    .shadow-\[0_0_45px_rgba\(239\,68\,68\,0\.08\)\],
    .shadow-\[0_0_35px_rgba\(239\,68\,68\,0\.03\)\],
    .shadow-\[0_0_40px_rgba\(239\,68\,68\,0\.03\)\] {
        box-shadow:
            0 22px 64px rgba(0, 0, 0, 0.24),
            0 0 42px rgba(239, 68, 68, 0.065),
            0 0 0 1px rgba(255,255,255,0.03) !important;
    }

    .text-red-500.drop-shadow-\[0_0_18px_rgba\(239\,68\,68\,0\.35\)\] {
        text-shadow:
            0 0 22px rgba(239, 68, 68, 0.34),
            0 0 44px rgba(239, 68, 68, 0.12);
    }

    .backdrop-blur-xl,
    .backdrop-blur-2xl,
    .backdrop-blur-md,
    .backdrop-blur-lg {
        -webkit-backdrop-filter: blur(18px);
        backdrop-filter: blur(18px);
    }

    .grid.gap-6.lg\:grid-cols-3 > *,
    .grid.gap-6.md\:grid-cols-3 > *,
    .grid.gap-6.md\:grid-cols-2 > *,
    .grid.gap-5.md\:grid-cols-2 > *,
    .grid.gap-5.md\:grid-cols-2.xl\:grid-cols-3 > *,
    .grid.gap-6.md\:grid-cols-2.xl\:grid-cols-4 > *,
    .grid.gap-6.md\:grid-cols-2.xl\:grid-cols-4 > *,
    .grid.gap-8.md\:grid-cols-3 > * {
        position: relative;
    }

    .grid.gap-6.lg\:grid-cols-3 > *::before,
    .grid.gap-6.md\:grid-cols-3 > *::before,
    .grid.gap-6.md\:grid-cols-2 > *::before,
    .grid.gap-5.md\:grid-cols-2 > *::before,
    .grid.gap-5.md\:grid-cols-2.xl\:grid-cols-3 > *::before,
    .grid.gap-6.md\:grid-cols-2.xl\:grid-cols-4 > *::before,
    .grid.gap-8.md\:grid-cols-3 > *::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: inherit;
        padding: 1px;
        background: linear-gradient(180deg, rgba(255,255,255,0.065), rgba(255,255,255,0.01) 28%, rgba(239,68,68,0.05) 100%);
        -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
        opacity: 0.55;
    }

    .grid.gap-6.lg\:grid-cols-3 > *:hover::before,
    .grid.gap-6.md\:grid-cols-3 > *:hover::before,
    .grid.gap-6.md\:grid-cols-2 > *:hover::before,
    .grid.gap-5.md\:grid-cols-2 > *:hover::before,
    .grid.gap-5.md\:grid-cols-2.xl\:grid-cols-3 > *:hover::before,
    .grid.gap-6.md\:grid-cols-2.xl\:grid-cols-4 > *:hover::before,
    .grid.gap-8.md\:grid-cols-3 > *:hover::before {
        opacity: 0.9;
    }

    .mt-8.grid.gap-3.sm\:grid-cols-3 > div,
    .mt-8.grid.gap-3.sm\:grid-cols-2 > div,
    .mt-6.grid.gap-4.sm\:grid-cols-2 > div,
    .mt-5.space-y-3 > div,
    .mt-6.grid.gap-3.sm\:grid-cols-2 > a,
    .mt-7.flex.flex-col.gap-3 > a,
    .mt-6.grid.gap-3 > div {
        transition:
            transform 320ms cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 320ms ease,
            border-color 260ms ease,
            background-color 260ms ease;
    }

    .mt-8.grid.gap-3.sm\:grid-cols-3 > div:hover,
    .mt-8.grid.gap-3.sm\:grid-cols-2 > div:hover,
    .mt-6.grid.gap-4.sm\:grid-cols-2 > div:hover,
    .mt-5.space-y-3 > div:hover,
    .mt-6.grid.gap-3 > div:hover {
        transform: translateY(-2px);
        box-shadow:
            0 18px 46px rgba(0, 0, 0, 0.22),
            0 0 28px rgba(239, 68, 68, 0.06);
    }

    .pointer-events-none.absolute.inset-x-0.bottom-8 a {
        box-shadow:
            0 10px 28px rgba(0, 0, 0, 0.18),
            inset 0 1px 0 rgba(255,255,255,0.035);
    }

    .pointer-events-none.absolute.inset-x-0.bottom-8 a:hover {
        transform: translateY(-2px);
        box-shadow:
            0 16px 38px rgba(0, 0, 0, 0.24),
            0 0 24px rgba(239, 68, 68, 0.08);
    }

    .fixed.inset-x-0.bottom-5 .overflow-hidden.rounded-\[1\.75rem\],
    .fixed.inset-x-0.bottom-0 {
        box-shadow:
            0 18px 55px rgba(0,0,0,0.28),
            0 0 0 1px rgba(255,255,255,0.03);
    }

    .kk-review-slider {
        min-height: 560px;
    }

    .kk-review-grid {
        align-items: stretch;
    }

    .kk-review-card {
        height: 400px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        background:
            linear-gradient(180deg, rgba(255,255,255,0.05), rgba(255,255,255,0.028) 44%, rgba(239,68,68,0.022));
        box-shadow:
            0 24px 64px rgba(0, 0, 0, 0.24),
            0 0 0 1px rgba(255,255,255,0.03),
            inset 0 1px 0 rgba(255,255,255,0.03);
    }

    .kk-review-card-body {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
    }

    .kk-review-quote {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: calc(2rem * 5);
    }

    .kk-review-card-footer {
        margin-top: auto;
    }

    @media (max-width: 1023px) {
        .kk-review-slider {
            min-height: 320px;
        }

        .kk-review-card {
            height: 300px;
        }

        .kk-review-quote {
            -webkit-line-clamp: 4;
            min-height: calc(2rem * 4);
        }
    }

    @media (max-width: 639px) {
        .kk-review-slider {
            min-height: auto;
        }

        .kk-review-card {
            height: auto;
            min-height: 280px;
        }

        .kk-review-quote {
            -webkit-line-clamp: 5;
            min-height: unset;
        }
    }
</style>
@endsection

@section('content')

@php
    $now = now()->timezone('Europe/Berlin');
    $day = $now->dayOfWeekIso;
    $time = $now->format('H:i');

    $isActive = false;

    if ($day >= 1 && $day <= 5 && $time >= '08:00' && $time <= '20:00') {
        $isActive = true;
    }

    if ($day == 6 && $time >= '08:00' && $time <= '14:00') {
        $isActive = true;
    }

    $liveStatusText = app()->getLocale() === 'de'
        ? ($isActive ? 'AKTIV' : 'INAKTIV')
        : ($isActive ? 'ACTIVE' : 'OFFLINE');

    $tuningOptions = app()->getLocale() === 'de'
        ? [
            [
                'title' => 'Stage 1 / Stage 2 / Stage 3',
                'text' => 'Leistungsabstimmungen für unterschiedliche Fahrzeug- und Hardwarekonzepte – sauber umgesetzt und projektbezogen abgestimmt.',
            ],
            [
                'title' => 'TCU / Getriebeoptimierung',
                'text' => 'Optimierung von Schaltpunkten, Drehmomentmanagement und Fahrverhalten für ein harmonisches Gesamtpaket.',
            ],
            [
                'title' => 'Pop & Bang / Overrun',
                'text' => 'Schubabschaltungseffekte und Overrun-Anpassungen je nach Fahrzeug, Setup und gewünschter Charakteristik.',
            ],
            [
                'title' => 'AdBlue OFF',
                'text' => 'Softwareanpassungen im Bereich SCR / AdBlue-Systeme – je nach Projekt und technischer Ausführung.',
            ],
            [
                'title' => 'DPF OFF',
                'text' => 'Anpassung rund um Dieselpartikelfilter-Funktionen und zugehörige Strategien im Steuergerät.',
            ],
            [
                'title' => 'EGR OFF',
                'text' => 'Abstimmung im Bereich Abgasrückführung inklusive relevanter Kennfelder und Systemlogiken.',
            ],
            [
                'title' => 'Lambda OFF',
                'text' => 'Deaktivierung bzw. Anpassung im Bereich Lambdaregelung – abhängig vom jeweiligen Setup.',
            ],
            [
                'title' => 'MAF OFF',
                'text' => 'Anpassung im Bereich Luftmassenmesser und plausibler Ersatzstrategien innerhalb der Software.',
            ],
            [
                'title' => 'NOx OFF',
                'text' => 'Lösungen im Bereich NOx-Systeme und zugehörige Diagnose- und Überwachungsfunktionen.',
            ],
            [
                'title' => 'Flaps OFF',
                'text' => 'Anpassung für Drallklappen bzw. ähnliche Ansaugsysteme im Rahmen technischer Sonderlösungen.',
            ],
            [
                'title' => 'TVA OFF',
                'text' => 'Anpassungen im Bereich Drosselklappen- und Stellglied-Strategien, falls projektbezogen erforderlich.',
            ],
            [
                'title' => 'Vmax Aufhebung',
                'text' => 'Aufhebung oder Anpassung vorhandener Geschwindigkeitsbegrenzungen im Rahmen der Softwarebearbeitung.',
            ],
            [
                'title' => 'IMMO Flash / EEPROM',
                'text' => 'Bearbeitung immobilizerrelevanter Bereiche direkt im Flash- oder EEPROM-Bereich.',
            ],
            [
                'title' => 'Öldruck-Fix / Anhebung des Öldrucks',
                'text' => 'Gezielte Anpassung zur Anhebung des Öldrucks – je nach Fahrzeug, Motor und technischer Ausgangsbasis.',
            ],
            [
                'title' => 'Weitere Lösungen auf Anfrage',
                'text' => 'Je nach Fahrzeug, Motorsteuergerät und technischer Basis sind weitere Anpassungen und Sonderlösungen projektbezogen möglich.',
            ],
        ]
        : [
            [
                'title' => 'Stage 1 / Stage 2 / Stage 3',
                'text' => 'Performance calibrations for different vehicle and hardware setups – cleanly developed and matched to each project.',
            ],
            [
                'title' => 'TCU / Gearbox Optimization',
                'text' => 'Optimization of shift points, torque management and overall drivability for a more refined setup.',
            ],
            [
                'title' => 'Pop & Bang / Overrun',
                'text' => 'Overrun and crackle adjustments depending on vehicle, setup and requested character.',
            ],
            [
                'title' => 'AdBlue OFF',
                'text' => 'Software adjustments in the SCR / AdBlue area depending on project requirements and technical setup.',
            ],
            [
                'title' => 'DPF OFF',
                'text' => 'Adjustments related to diesel particulate filter functions and associated ECU strategies.',
            ],
            [
                'title' => 'EGR OFF',
                'text' => 'Calibration work in the exhaust gas recirculation area including relevant maps and logic.',
            ],
            [
                'title' => 'Lambda OFF',
                'text' => 'Lambda control deactivation or adjustment depending on the technical setup.',
            ],
            [
                'title' => 'MAF OFF',
                'text' => 'Adjustments in the mass airflow meter area including suitable fallback strategies.',
            ],
            [
                'title' => 'NOx OFF',
                'text' => 'Solutions for NOx systems and related diagnostics and monitoring functions.',
            ],
            [
                'title' => 'Flaps OFF',
                'text' => 'Adjustments for swirl flaps and similar intake components as part of technical special solutions.',
            ],
            [
                'title' => 'TVA OFF',
                'text' => 'Throttle and actuator strategy adjustments where project-specific implementation is required.',
            ],
            [
                'title' => 'Vmax Removal',
                'text' => 'Removal or adjustment of factory speed limiters within the software setup.',
            ],
            [
                'title' => 'IMMO Flash / EEPROM',
                'text' => 'Immobilizer-related work directly in flash or EEPROM areas.',
            ],
            [
                'title' => 'Oil Pressure Fix / Increased Oil Pressure',
                'text' => 'Targeted oil pressure adjustment depending on vehicle, engine and technical base setup.',
            ],
            [
                'title' => 'Further solutions on request',
                'text' => 'Additional adjustments and special solutions may be possible depending on vehicle, ECU and technical setup.',
            ],
        ];

    $trustBoosters = app()->getLocale() === 'de'
        ? [
            [
                'kicker' => 'Vertrauen',
                'title' => 'Offiziell verifizierte WinOLS Lizenz',
                'text' => 'Sichtbarer Kompetenznachweis über EVC / WinOLS – transparent, prüfbar und passend zu einer hochwertigen Positionierung.',
            ],
            [
                'kicker' => 'Workflow',
                'title' => 'Saubere Struktur statt Chaos',
                'text' => 'Website, Kontakt und Kundenportal sind klar getrennt. Standard-Abläufe laufen strukturiert, Sonderprojekte direkt über Anfrage.',
            ],
            [
                'kicker' => 'Anspruch',
                'title' => 'Keine Massenabfertigung',
                'text' => 'Fokus auf technisch saubere Umsetzung, klare Kommunikation und Lösungen mit echtem Qualitätsanspruch statt beliebiger Standardware.',
            ],
        ]
        : [
            [
                'kicker' => 'Trust',
                'title' => 'Officially verified WinOLS license',
                'text' => 'Visible proof of expertise via EVC / WinOLS – transparent, verifiable and aligned with a high-end positioning.',
            ],
            [
                'kicker' => 'Workflow',
                'title' => 'Clean structure instead of chaos',
                'text' => 'Website, contact and customer portal are clearly separated. Standard workflows stay structured, special projects go directly through inquiry.',
            ],
            [
                'kicker' => 'Standard',
                'title' => 'No mass-processing',
                'text' => 'Focus on technically clean implementation, clear communication and solutions with real quality standards instead of generic bulk work.',
            ],
        ];

    $trustProofPoints = app()->getLocale() === 'de'
        ? [
            '+1200 Fahrzeuge optimiert',
            'DE / EN Support',
            'Portal + Direktkontakt',
            'EVC / WinOLS verifiziert',
        ]
        : [
            '+1200 vehicles optimized',
            'DE / EN support',
            'Portal + direct contact',
            'EVC / WinOLS verified',
        ];

    $socialProofStats = app()->getLocale() === 'de'
        ? [
            ['value' => '5★', 'label' => 'starker Qualitätsanspruch'],
            ['value' => '+1200', 'label' => 'optimierte Fahrzeuge'],
            ['value' => '8+ Jahre', 'label' => 'Erfahrung in Softwareoptimierung'],
            ['value' => 'ECU & TCU', 'label' => 'Programmierung & Kalibrierung'],
        ]
        : [
            ['value' => '5★', 'label' => 'strong quality standard'],
            ['value' => '+1200', 'label' => 'optimized vehicles'],
            ['value' => '8+ years', 'label' => 'software optimization experience'],
            ['value' => 'ECU & TCU', 'label' => 'programming & calibration'],
        ];

    $socialProofCards = app()->getLocale() === 'de'
        ? [
            [
                'quote' => 'Sehr saubere Kommunikation, schneller Ablauf und technisch überzeugendes Ergebnis. Genau die Art von professioneller Zusammenarbeit, die man sich in diesem Bereich wünscht.',
                'role' => 'Werkstattkunde',
                'name' => 'Marek K.',
            ],
            [
                'quote' => 'Von der Anfrage bis zur Umsetzung wirkte alles strukturiert, klar und hochwertig. Besonders positiv war die direkte Erreichbarkeit und der saubere Workflow.',
                'role' => 'Performance-Enthusiast',
                'name' => 'Yasin D.',
            ],
            [
                'quote' => 'Kompetenter Eindruck, präzise Abstimmung und eine professionelle Außenwirkung. Die Zusammenarbeit lief zuverlässig und ohne unnötige Reibung.',
                'role' => 'Projektanfrage',
                'name' => 'Piotr S.',
            ],
            [
                'quote' => 'Sehr professioneller Ablauf mit einer klaren Kommunikation vom ersten Kontakt bis zum fertigen Ergebnis. Genau so stellt man sich einen Premium-Anbieter vor.',
                'role' => 'Bestandskunde',
                'name' => 'Omar A.',
            ],
            [
                'quote' => 'Was besonders überzeugt hat, war die Kombination aus technischer Kompetenz, direkter Erreichbarkeit und einer sehr strukturierten Umsetzung.',
                'role' => 'Werkstattpartner',
                'name' => 'Emre T.',
            ],
            [
                'quote' => 'Die gesamte Abwicklung wirkte hochwertig, schnell und präzise. Kein Chaos, keine unnötigen Rückfragen, sondern ein sauberer Workflow.',
                'role' => 'Projektkunde',
                'name' => 'Adam W.',
            ],
            [
                'quote' => 'Schon der erste Eindruck war deutlich professioneller als bei vielen anderen Anbietern. Die Umsetzung selbst hat diesen Eindruck bestätigt.',
                'role' => 'Performance-Anfrage',
                'name' => 'Karim H.',
            ],
            [
                'quote' => 'Technisch sauber, kommunikativ stark und insgesamt sehr vertrauenswürdig. Genau die Art von Zusammenarbeit, die man langfristig sucht.',
                'role' => 'Empfehlung / Stammkunde',
                'name' => 'Rashid M.',
            ],
        ]
        : [
            [
                'quote' => 'Very clean communication, fast turnaround and a technically convincing result. Exactly the kind of professional collaboration you want in this field.',
                'role' => 'Workshop client',
                'name' => 'Marek K.',
            ],
            [
                'quote' => 'From first inquiry to delivery, everything felt structured, clear and premium. Direct communication and the clean workflow stood out positively.',
                'role' => 'Performance enthusiast',
                'name' => 'Yasin D.',
            ],
            [
                'quote' => 'Competent impression, precise calibration and a professional overall appearance. The collaboration was reliable and smooth throughout.',
                'role' => 'Project inquiry',
                'name' => 'Piotr S.',
            ],
            [
                'quote' => 'A very professional process with clear communication from the first contact to the final result. Exactly what you expect from a premium provider.',
                'role' => 'Returning client',
                'name' => 'Omar A.',
            ],
            [
                'quote' => 'What stood out most was the combination of technical competence, direct communication and a very structured implementation.',
                'role' => 'Workshop partner',
                'name' => 'Emre T.',
            ],
            [
                'quote' => 'The entire handling felt premium, fast and precise. No chaos, no unnecessary friction, just a clean and reliable workflow.',
                'role' => 'Project client',
                'name' => 'Adam W.',
            ],
            [
                'quote' => 'Even the first impression was noticeably more professional than many other providers. The actual execution fully confirmed that impression.',
                'role' => 'Performance inquiry',
                'name' => 'Karim H.',
            ],
            [
                'quote' => 'Technically clean, communicatively strong and overall highly trustworthy. Exactly the type of collaboration you want long term.',
                'role' => 'Referral / returning client',
                'name' => 'Rashid M.',
            ],
        ];

    $caseStudies = app()->getLocale() === 'de'
        ? [
            [
                'badge' => 'Diesel Performance',
                'vehicle' => 'BMW 3.0 Diesel Plattform',
                'goal' => 'Mehr Durchzug, sauberere Leistungsentfaltung und bessere Alltagstauglichkeit.',
                'situation' => 'Das Fahrzeug sollte im mittleren Drehzahlbereich souveräner wirken, ohne hektische Charakteristik oder unruhiges Fahrverhalten.',
                'approach' => 'Projektbezogene Stage-Abstimmung mit Fokus auf harmonische Kraftentfaltung, fahrbare Reserven und ein OEM-nah sauberes Gesamtbild.',
                'result' => 'Spürbar mehr Punch im relevanten Bereich, bessere Elastizität und ein insgesamt deutlich hochwertigeres Fahrgefühl.',
                'chips' => ['Driveability', 'Custom Calibration', 'Refined Power', 'Daily Use'],
                'image' => asset('images/case-studies/bmw.jpg'),
            ],
            [
                'badge' => 'Efficiency & Torque',
                'vehicle' => 'VAG 2.0 TDI Setup',
                'goal' => 'Effizientere Leistungsabgabe, sauberer Durchzug und stimmiges Verhalten im Alltagsbetrieb.',
                'situation' => 'Gewünscht war keine aggressive Charakteristik, sondern eine technisch saubere Optimierung mit Fokus auf Nutzbarkeit und Konsistenz.',
                'approach' => 'Individuell abgestimmte Kennfeldbearbeitung mit Blick auf Lastaufbau, Drehmomentcharakteristik und ruhige Fahrbarkeit.',
                'result' => 'Verbessertes Ansprechverhalten, souveränere Kraftentfaltung und ein Setup, das im Alltag klar stimmiger wirkt.',
                'chips' => ['Efficiency', 'Torque Delivery', 'Clean Workflow', 'OEM-Aware'],
                'image' => asset('images/case-studies/vag.jpg'),
            ],
            [
                'badge' => 'Performance Project',
                'vehicle' => 'AMG / Performance Plattform',
                'goal' => 'Individuelle Abstimmung für ein präzises, hochwertiges und fahraktives Gesamtpaket.',
                'situation' => 'Bei leistungsorientierten Projekten zählt nicht nur mehr Output, sondern vor allem, wie sauber und kontrolliert das Ergebnis wirkt.',
                'approach' => 'Projektbezogene Kalibrierung mit Fokus auf Präzision, sauberen Lastaufbau, reproduzierbares Verhalten und klare Kommunikation im Ablauf.',
                'result' => 'Ein spürbar definierteres Performance-Gefühl mit hochwertigerer Abstimmungscharakteristik statt beliebiger Standardlösung.',
                'chips' => ['Tailored Setup', 'Precision', 'High-End Result', 'Platform Specific'],
                'image' => asset('images/case-studies/amg.jpg'),
            ],
        ]
        : [
            [
                'badge' => 'Diesel Performance',
                'vehicle' => 'BMW 3.0 Diesel Platform',
                'goal' => 'Stronger pull, cleaner power delivery and improved everyday drivability.',
                'situation' => 'The vehicle needed to feel more confident in the mid-range without becoming nervous, harsh or less refined to drive.',
                'approach' => 'Project-specific stage calibration focused on harmonic power delivery, usable reserves and an OEM-aware clean overall result.',
                'result' => 'Noticeably stronger response in the relevant range, better elasticity and a significantly more premium driving feel.',
                'chips' => ['Driveability', 'Custom Calibration', 'Refined Power', 'Daily Use'],
                'image' => asset('images/case-studies/bmw.jpg'),
            ],
            [
                'badge' => 'Efficiency & Torque',
                'vehicle' => 'VAG 2.0 TDI Setup',
                'goal' => 'More efficient power delivery, cleaner pull and more consistent behavior in daily operation.',
                'situation' => 'The request was not an aggressive setup, but a technically clean optimization focused on usability and consistency.',
                'approach' => 'Individually calibrated map work with attention to load build-up, torque character and smooth drivability.',
                'result' => 'Improved throttle response, more confident torque delivery and a setup that feels clearly more refined in everyday use.',
                'chips' => ['Efficiency', 'Torque Delivery', 'Clean Workflow', 'OEM-Aware'],
                'image' => asset('images/case-studies/vag.jpg'),
            ],
            [
                'badge' => 'Performance Project',
                'vehicle' => 'AMG / Performance Platform',
                'goal' => 'Tailored calibration for a precise, premium and performance-focused overall result.',
                'situation' => 'On performance projects, it is not only about more output, but about how clean, controlled and premium the result feels.',
                'approach' => 'Project-specific calibration focused on precision, clean load build-up, repeatable behavior and clear communication throughout the process.',
                'result' => 'A noticeably more defined performance feel with a more premium calibration character instead of a generic off-the-shelf solution.',
                'chips' => ['Tailored Setup', 'Precision', 'High-End Result', 'Platform Specific'],
                'image' => asset('images/case-studies/amg.jpg'),
            ],
        ];

    $faqItems = app()->getLocale() === 'de'
        ? [
            [
                'question' => 'Wie läuft eine Anfrage bei KK-BOOST ab?',
                'answer' => 'Standard-Projekte können strukturiert über das Portal gestartet werden. Bei spezielleren Vorhaben oder Rückfragen ist zusätzlich der Direktkontakt über Kontaktformular oder WhatsApp möglich, damit die technische Ausgangsbasis sauber eingeordnet werden kann.',
            ],
            [
                'question' => 'Wann nutze ich das Portal und wann den Direktkontakt?',
                'answer' => 'Das Portal eignet sich ideal für klar definierte Standard-Abläufe. Sobald es um Sonderlösungen, individuelle Setups oder eine genauere Vorabklärung geht, ist der Direktkontakt sinnvoller.',
            ],
            [
                'question' => 'Sind auch Sonderprojekte und individuelle Setups möglich?',
                'answer' => 'Ja. Nicht jede Anfrage passt in ein Standardschema. Genau dafür gibt es die Möglichkeit, Projekte individuell zu besprechen und die technische Machbarkeit sauber einzuordnen.',
            ],
            [
                'question' => 'Welche Informationen sollte ich für eine Anfrage bereithalten?',
                'answer' => 'Hilfreich sind Fahrzeugdaten, Motor-/Getriebeinformationen, vorhandene Hardware, das gewünschte Ziel und eventuelle Besonderheiten am Fahrzeug. Je klarer die Ausgangsbasis beschrieben ist, desto sauberer kann das Projekt eingeordnet werden.',
            ],
            [
                'question' => 'Arbeitet KK-BOOST nur mit Standardlösungen?',
                'answer' => 'Nein. Die Positionierung ist bewusst nicht auf Massenabfertigung ausgelegt. Im Fokus stehen saubere Abläufe, klare Kommunikation und projektbezogene Lösungen statt beliebiger Off-the-Shelf-Ansätze.',
            ],
            [
                'question' => 'Ist Support auf Deutsch und Englisch möglich?',
                'answer' => 'Ja. KK-BOOST ist auf DE / EN Kommunikation ausgelegt, damit Anfragen und Projekte auch international sauber und klar abgewickelt werden können.',
            ],
            [
                'question' => 'Wie schnell erfolgt die Bearbeitung?',
                'answer' => 'Das hängt immer vom Projekt, der Ausgangsbasis und der Komplexität ab. Klar definierte Standardfälle laufen in der Regel deutlich strukturierter und schneller als individuelle Sonderprojekte.',
            ],
            [
                'question' => 'Kann ich mein Projekt vorab besprechen, bevor ich starte?',
                'answer' => 'Ja. Gerade bei individuellen Vorhaben oder wenn bestimmte Ziele sauber abgestimmt werden sollen, ist eine kurze Vorabklärung oft der beste erste Schritt.',
            ],
        ]
        : [
            [
                'question' => 'How does an inquiry with KK-BOOST work?',
                'answer' => 'Standard projects can be started in a structured way through the portal. For more specific requests or technical clarification, direct contact via the contact form or WhatsApp is available so the base setup can be assessed properly.',
            ],
            [
                'question' => 'When should I use the portal and when direct contact?',
                'answer' => 'The portal is ideal for clearly defined standard workflows. As soon as a project involves special solutions, tailored setups or more detailed clarification, direct contact is the better route.',
            ],
            [
                'question' => 'Are special projects and individual setups possible?',
                'answer' => 'Yes. Not every inquiry fits into a standard scheme. That is exactly why projects can be discussed individually and evaluated properly from a technical point of view.',
            ],
            [
                'question' => 'What information should I prepare for an inquiry?',
                'answer' => 'Helpful details include vehicle information, engine/gearbox details, installed hardware, the desired target and any special aspects of the setup. The clearer the starting point, the cleaner the project assessment.',
            ],
            [
                'question' => 'Does KK-BOOST only work with standard solutions?',
                'answer' => 'No. The positioning is intentionally not built around bulk processing. The focus is on clean workflows, clear communication and project-specific solutions instead of generic off-the-shelf approaches.',
            ],
            [
                'question' => 'Is support available in German and English?',
                'answer' => 'Yes. KK-BOOST is set up for DE / EN communication so inquiries and projects can be handled clearly and professionally on an international level.',
            ],
            [
                'question' => 'How fast is the turnaround?',
                'answer' => 'That always depends on the project, the technical starting point and the complexity involved. Clearly defined standard cases are usually handled more directly and faster than individual special projects.',
            ],
            [
                'question' => 'Can I discuss my project before getting started?',
                'answer' => 'Yes. Especially for individual projects or when specific targets should be aligned properly, a short pre-discussion is often the best first step.',
            ],
        ];

    $whatsAppNumber = '4915566180004';

    $waGeneral = app()->getLocale() === 'de'
        ? 'Hallo KK-BOOST, ich habe eine allgemeine Anfrage.'
        : 'Hello KK-BOOST, I have a general inquiry.';

    $waStage = app()->getLocale() === 'de'
        ? 'Hallo KK-BOOST, ich interessiere mich für eine Stage Anfrage und hätte gerne weitere Informationen.'
        : 'Hello KK-BOOST, I am interested in a stage tuning request and would like more information.';

    $waGearbox = app()->getLocale() === 'de'
        ? 'Hallo KK-BOOST, ich interessiere mich für eine Getriebeoptimierung und hätte gerne eine Beratung.'
        : 'Hello KK-BOOST, I am interested in gearbox optimization and would like some advice.';

    $waSpecial = app()->getLocale() === 'de'
        ? 'Hallo KK-BOOST, ich habe ein Sonderprojekt und möchte die Möglichkeiten besprechen.'
        : 'Hello KK-BOOST, I have a special project and would like to discuss the available options.';

    $waGeneralLink = 'https://wa.me/' . $whatsAppNumber . '?text=' . urlencode($waGeneral);
    $waStageLink = 'https://wa.me/' . $whatsAppNumber . '?text=' . urlencode($waStage);
    $waGearboxLink = 'https://wa.me/' . $whatsAppNumber . '?text=' . urlencode($waGearbox);
    $waSpecialLink = 'https://wa.me/' . $whatsAppNumber . '?text=' . urlencode($waSpecial);

    $heroMicroPoints = app()->getLocale() === 'de'
        ? [
            'Premium statt Massenabfertigung',
            'Klare Prozesse & direkte Kommunikation',
            'Portal für Standardfälle, Kontakt für Sonderprojekte',
        ]
        : [
            'Premium instead of bulk processing',
            'Clear processes & direct communication',
            'Portal for standard cases, contact for special projects',
        ];
@endphp

<section class="relative min-h-[100svh] w-full overflow-hidden">
    <video autoplay muted loop playsinline class="absolute inset-0 h-full w-full object-cover">
        <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
    </video>

    <div class="absolute inset-0 bg-gradient-to-b from-black/95 via-black/80 to-black"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(239,68,68,0.08),transparent_58%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.035),transparent_30%)]"></div>
    <div class="absolute inset-0 opacity-[0.014] kk-grid-premium"></div>

    <div class="relative z-10 mx-auto flex min-h-[100svh] max-w-[1440px] items-center px-6 pb-12 pt-28 sm:pt-32 lg:px-10 lg:pb-20 lg:pt-36">
        <div class="grid w-full items-center gap-10 lg:grid-cols-[1.08fr_0.92fr] lg:gap-14">
            <div class="max-w-3xl">
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.18em] text-red-300 backdrop-blur-md shadow-[0_0_16px_rgba(239,68,68,0.05)] sm:text-sm">
                    <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                    {{ __('home.hero_badge') }}
                </div>

                <h1 class="max-w-4xl text-4xl font-bold leading-[0.98] tracking-[-0.045em] text-white sm:text-5xl lg:text-[4.5rem]">
    {{ __('home.hero_title_1') }}<br>
    <span class="text-red-500 drop-shadow-[0_0_10px_rgba(239,68,68,0.18)]">
        {{ __('home.hero_title_2') }}
    </span><br>
    {{ __('home.hero_title_3') }}
</h1>
                <p class="mt-8 max-w-2xl text-base leading-8 text-slate-300 sm:text-lg sm:leading-8">
                    {{ __('home.hero_intro_premium') }}
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    @foreach ($heroMicroPoints as $point)
                        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.035] px-4 py-2 text-[0.72rem] font-medium tracking-[0.04em] text-slate-200 backdrop-blur-md shadow-[inset_0_1px_0_rgba(255,255,255,0.03)] sm:text-xs">
                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                            {{ $point }}
                        </div>
                    @endforeach
                </div>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:gap-4">
                    <a href="https://kk-boostfileservice.de/register" class="group relative inline-flex items-center justify-center overflow-hidden rounded-xl bg-red-600 px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.16)] ring-1 ring-red-400/15 transition duration-300 hover:scale-[1.01] hover:bg-red-500 sm:text-base">
                        <span class="relative z-10">{{ __('home.hero_primary_button') }}</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-orange-500 opacity-0 transition duration-300 group-hover:opacity-100"></div>
                    </a>

                    <a href="#services" class="inline-flex items-center justify-center rounded-xl border border-white/15 bg-white/[0.02] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:border-white/30 hover:bg-white/[0.05] sm:text-base">
                        {{ __('home.hero_secondary_button') }}
                    </a>
                </div>

                <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                    <a href="{{ route('contact.create') }}" class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.035] px-4 py-3 text-sm font-medium text-slate-200 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)] transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05] hover:text-white">
                        <span class="h-2 w-2 rounded-full bg-red-500"></span>
                        {{ __('home.hero_quote_button') }}
                    </a>

                    <a href="https://kk-boostfileservice.de/login" class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.035] px-4 py-3 text-sm font-medium text-slate-200 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)] transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05] hover:text-white">
                        <span class="h-2 w-2 rounded-full bg-white/70"></span>
                        {{ __('home.hero_portal_button') }}
                    </a>
                </div>

                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-black/30 px-4 py-4 shadow-[0_0_14px_rgba(0,0,0,0.10)] backdrop-blur-xl">
                        <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                            {{ __('home.hero_card_1_title') }}
                        </div>
                        <div class="mt-2 text-sm leading-7 text-slate-300">
                            {{ __('home.hero_card_1_text') }}
                        </div>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/30 px-4 py-4 shadow-[0_0_14px_rgba(0,0,0,0.10)] backdrop-blur-xl">
                        <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                            {{ __('home.hero_card_2_title') }}
                        </div>
                        <div class="mt-2 text-sm leading-7 text-slate-300">
                            {{ __('home.hero_card_2_text') }}
                        </div>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/30 px-4 py-4 shadow-[0_0_14px_rgba(0,0,0,0.10)] backdrop-blur-xl">
                        <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                            {{ __('home.hero_card_3_title') }}
                        </div>
                        <div class="mt-2 text-sm leading-7 text-slate-300">
                            {{ __('home.hero_card_3_text') }}
                        </div>
                    </div>
                </div>

                <div class="mt-8 grid gap-3 sm:grid-cols-2 xl:max-w-2xl">
                    <div class="rounded-2xl border border-red-500/12 bg-gradient-to-br from-red-600/[0.08] to-transparent px-5 py-4 shadow-[0_0_16px_rgba(239,68,68,0.03)] backdrop-blur-xl">
                        <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                            {{ __('home.hero_fast_onboarding_title') }}
                        </div>
                        <div class="mt-2 text-sm leading-7 text-slate-300">
                            {{ __('home.hero_fast_onboarding_text') }}
                        </div>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/25 px-5 py-4 shadow-[0_0_14px_rgba(0,0,0,0.10)] backdrop-blur-xl">
                        <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                            {{ __('home.hero_direct_contact_title') }}
                        </div>
                        <div class="mt-2 text-sm leading-7 text-slate-300">
                            {{ __('home.hero_direct_contact_text') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block">
                <div class="relative mx-auto max-w-[600px]">
                    <div class="absolute -inset-4 rounded-[2rem] bg-red-600/[0.05] blur-3xl"></div>

                    <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-black/30 p-6 shadow-[0_18px_54px_rgba(0,0,0,0.26)] ring-1 ring-white/5 backdrop-blur-2xl">
                        <div class="flex items-center justify-between border-b border-white/10 pb-4">
                            <div>
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.24em] text-red-400">{{ __('home.hero_console_kicker') }}</div>
                                <div class="mt-2 text-lg font-semibold text-white">
                                    {{ __('home.hero_console_title') }}
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="h-2.5 w-2.5 rounded-full bg-red-500"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-orange-400"></span>
                                <span class="h-2.5 w-2.5 rounded-full bg-white/40"></span>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl border border-white/10 bg-white/[0.025] p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-slate-400">
                                    {{ __('home.hero_console_hours_title') }}
                                </div>
                                <div class="mt-3 text-2xl font-bold text-white">{{ __('home.hero_console_hours_value') }}</div>
                                <div class="mt-2 text-sm text-slate-400">{{ __('home.hero_console_hours_sub') }}</div>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/[0.025] p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-slate-400">
                                    {{ __('home.hero_console_saturday_title') }}
                                </div>
                                <div class="mt-3 text-2xl font-bold text-white">{{ __('home.hero_console_saturday_value') }}</div>
                                <div class="mt-2 text-sm text-slate-400">
                                    {{ __('home.hero_console_saturday_sub') }}
                                </div>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/[0.025] p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-slate-400">
                                    {{ __('home.hero_console_gearbox_title') }}
                                </div>
                                <div class="mt-3 text-2xl font-bold text-white">
                                    {{ __('home.hero_console_gearbox_value') }}
                                </div>
                                <div class="mt-2 text-sm text-slate-400">
                                    {{ __('home.hero_console_gearbox_sub') }}
                                </div>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/[0.025] p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-slate-400">
                                    {{ __('home.hero_console_special_title') }}
                                </div>
                                <div class="mt-3 text-2xl font-bold text-white">{{ __('home.hero_console_special_value') }}</div>
                                <div class="mt-2 text-sm text-slate-400">
                                    {{ __('home.hero_console_special_sub') }}
                                </div>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/[0.025] p-5 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)] sm:col-span-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-slate-400">
                                            {{ __('home.hero_console_standard_title') }}
                                        </div>
                                        <div class="mt-3 text-sm text-slate-300">
                                            {{ __('home.hero_console_standard_text') }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="inline-flex items-center rounded-full border px-4 py-2 text-base font-bold tracking-[0.14em] uppercase {{ $isActive ? 'kk-status-active border-green-400/25 bg-green-500/[0.08] text-green-300 shadow-[0_0_10px_rgba(74,222,128,0.12)]' : 'kk-status-inactive border-red-500/25 bg-red-500/[0.08] text-red-400 shadow-[0_0_10px_rgba(239,68,68,0.10)]' }}">
                                            <span class="mr-2 inline-block h-2.5 w-2.5 rounded-full {{ $isActive ? 'bg-green-400 kk-status-dot-active animate-pulse' : 'bg-red-500 kk-status-dot-inactive' }}"></span>
                                            {{ $liveStatusText }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 h-2 overflow-hidden rounded-full bg-white/10">
                                    <div class="h-full w-[84%] rounded-full bg-gradient-to-r from-red-500 via-red-400 to-orange-400 shadow-[0_0_8px_rgba(239,68,68,0.18)]"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 rounded-2xl border border-red-500/12 bg-gradient-to-r from-red-600/[0.08] to-transparent p-5 shadow-[0_0_14px_rgba(239,68,68,0.03)]">
                            <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                                {{ __('home.hero_console_about_title') }}
                            </div>
                            <p class="mt-3 text-sm leading-7 text-slate-300">
                                {{ __('home.hero_console_about_text') }}
                            </p>
                        </div>

                        <div class="mt-6 grid gap-3 sm:grid-cols-2">
                            <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.16)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01] hover:shadow-[0_12px_26px_rgba(239,68,68,0.20)]">
                                {{ __('home.hero_console_register_button') }}
                            </a>

                            <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                                {{ __('home.hero_console_consultation_button') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

           <div class="lg:hidden">
    <div class="rounded-[1.75rem] border border-white/10 bg-black/18 p-5 shadow-[0_14px_34px_rgba(0,0,0,0.18)] ring-1 ring-white/5 backdrop-blur-md">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <div>
                            <div class="text-[0.68rem] font-semibold uppercase tracking-[0.24em] text-red-400">
                                {{ __('home.hero_mobile_quickaccess_kicker') }}
                            </div>
                            <div class="mt-2 text-lg font-semibold text-white">
                                {{ __('home.hero_mobile_quickaccess_title') }}
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-red-500"></span>
                            <span class="h-2.5 w-2.5 rounded-full bg-orange-400"></span>
                            <span class="h-2.5 w-2.5 rounded-full bg-white/40"></span>
                        </div>
                    </div>

                    <div class="mt-5 space-y-3">
                        <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-4">
                            <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                                {{ __('home.hero_mobile_website_title') }}
                            </div>
                            <div class="mt-2 text-sm leading-7 text-slate-300">
                                {{ __('home.hero_mobile_website_text') }}
                            </div>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/[0.03] p-4">
                            <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                                {{ __('home.hero_mobile_portal_title') }}
                            </div>
                            <div class="mt-2 text-sm leading-7 text-slate-300">
                                {{ __('home.hero_mobile_portal_text') }}
                            </div>
                        </div>

                        <div class="rounded-2xl border {{ $isActive ? 'border-green-400/20 bg-green-500/[0.08]' : 'border-red-500/20 bg-red-500/[0.08]' }} p-4">
                            <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] {{ $isActive ? 'text-green-300' : 'text-red-400' }}">
                                Live Status
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-sm font-semibold {{ $isActive ? 'text-green-300' : 'text-red-400' }}">
                                <span class="inline-block h-2.5 w-2.5 rounded-full {{ $isActive ? 'bg-green-400 animate-pulse' : 'bg-red-500' }}"></span>
                                {{ $liveStatusText }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.16)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                            {{ __('home.hero_mobile_register') }}
                        </a>

                        <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                            {{ __('home.hero_mobile_contact') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pointer-events-none absolute inset-x-0 bottom-8 z-10 hidden justify-center lg:flex">
        <a href="#services" class="pointer-events-auto inline-flex items-center gap-3 rounded-full border border-white/10 bg-black/25 px-4 py-2 text-[0.7rem] font-semibold uppercase tracking-[0.22em] text-slate-300 backdrop-blur-md transition duration-300 hover:border-red-500/20 hover:text-white">
            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
            {{ app()->getLocale() === 'de' ? 'Mehr entdecken' : 'Discover more' }}
        </a>
    </div>
</section>

<section class="relative bg-black py-14 sm:py-16">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(239,68,68,0.03),transparent_45%)]"></div>

    <div class="relative mx-auto grid max-w-[1440px] grid-cols-2 gap-4 px-6 text-center md:grid-cols-4 lg:px-10">
        <div class="rounded-[1.4rem] border border-white/8 bg-white/[0.02] px-4 py-5 shadow-[0_0_12px_rgba(0,0,0,0.08)] backdrop-blur-sm">
            <div class="text-3xl font-bold text-red-500">{{ __('home.stat_1_value') }}</div>
            <div class="mt-1 text-sm text-slate-400">{{ __('home.stat_1_label') }}</div>
        </div>
        <div class="rounded-[1.4rem] border border-white/8 bg-white/[0.02] px-4 py-5 shadow-[0_0_12px_rgba(0,0,0,0.08)] backdrop-blur-sm">
            <div class="text-3xl font-bold text-red-500">{{ __('home.stat_service_hours_value') }}</div>
            <div class="mt-1 text-sm text-slate-400">{{ __('home.stat_service_hours_label') }}</div>
        </div>
        <div class="rounded-[1.4rem] border border-white/8 bg-white/[0.02] px-4 py-5 shadow-[0_0_12px_rgba(0,0,0,0.08)] backdrop-blur-sm">
            <div class="text-3xl font-bold text-red-500">{{ __('home.stat_stage_value') }}</div>
            <div class="mt-1 text-sm text-slate-400">{{ __('home.stat_stage_label') }}</div>
        </div>
        <div class="rounded-[1.4rem] border border-white/8 bg-white/[0.02] px-4 py-5 shadow-[0_0_12px_rgba(0,0,0,0.08)] backdrop-blur-sm">
            <div class="text-3xl font-bold text-red-500">{{ __('home.stat_4_value') }}</div>
            <div class="mt-1 text-sm text-slate-400">{{ __('home.stat_4_label') }}</div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#05070b] py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(239,68,68,0.04),transparent_40%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ app()->getLocale() === 'de' ? 'Trust & Positionierung' : 'Trust & Positioning' }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ app()->getLocale() === 'de' ? 'Vertrauen, das sichtbar aufgebaut wird' : 'Trust that is built visibly' }}
            </h2>

            <p class="mt-4 max-w-3xl text-base leading-8 text-slate-400">
                {{ app()->getLocale() === 'de'
                    ? 'Eine hochwertige Außenwirkung entsteht nicht nur über Optik, sondern über nachvollziehbare Struktur, klare Prozesse und sichtbare Kompetenznachweise.'
                    : 'A high-end appearance is not only built through visuals, but through clear structure, defined processes and visible proof of expertise.' }}
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @foreach ($trustBoosters as $booster)
                <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-7 shadow-[0_0_16px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20 hover:shadow-[0_0_24px_rgba(239,68,68,0.04)]">
                    <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                        {{ $booster['kicker'] }}
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-white">
                        {{ $booster['title'] }}
                    </h3>
                    <p class="mt-4 leading-8 text-slate-400">
                        {{ $booster['text'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-8 rounded-[2rem] border border-red-500/12 bg-gradient-to-r from-red-600/[0.08] via-white/[0.02] to-transparent p-6 shadow-[0_0_20px_rgba(239,68,68,0.025)] ring-1 ring-white/5 backdrop-blur-xl sm:p-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-2xl">
                    <div class="text-[0.7rem] font-semibold uppercase tracking-[0.24em] text-red-400">
                        {{ app()->getLocale() === 'de' ? 'High-End Signale' : 'High-end Signals' }}
                    </div>
                    <h3 class="mt-3 text-2xl font-bold tracking-[-0.02em] text-white">
                        {{ app()->getLocale() === 'de' ? 'Starke Vertrauensanker direkt auf der Startseite' : 'Strong trust anchors directly on the homepage' }}
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300 sm:text-base">
                        {{ app()->getLocale() === 'de'
                            ? 'Diese Elemente helfen Besuchern schneller einzuordnen, wofür KK-BOOST steht: technische Präzision, klare Kommunikation und eine professionelle Gesamtstruktur.'
                            : 'These elements help visitors understand faster what KK-BOOST stands for: technical precision, clear communication and a professional overall structure.' }}
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:min-w-[360px]">
                    @foreach ($trustProofPoints as $point)
                        <div class="rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-slate-200 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                            {{ $point }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-black py-20 sm:py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_left_center,rgba(239,68,68,0.03),transparent_30%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/8 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_16px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ app()->getLocale() === 'de' ? 'Social Proof' : 'Social Proof' }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
               {{ app()->getLocale() === 'de' ? 'Vertrauen, das durch starke Ergebnisse und saubere Abläufe entsteht' : 'Trust built through strong results and clean processes' }}
            </h2>

            <p class="mt-4 max-w-3xl text-base leading-8 text-slate-400">
                {{ app()->getLocale() === 'de'
    ? 'Professionelle Kommunikation, ruhige Abläufe und ein hochwertiger Gesamteindruck sorgen dafür, dass Vertrauen nicht behauptet, sondern spürbar aufgebaut wird.'
    : 'Professional communication, calm workflows and a premium overall impression help build trust in a way that feels tangible rather than claimed.' }}
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($socialProofStats as $stat)
                <div class="rounded-[1.6rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-6 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl">
                    <div class="text-3xl font-bold text-white">{{ $stat['value'] }}</div>
                    <div class="mt-2 text-sm uppercase tracking-[0.18em] text-slate-400">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        <div
            class="kk-review-slider mt-8"
            style="min-height:auto;"
            x-data="{
                active: 0,
                cards: @js($socialProofCards),
                visibleDesktop: 3,
                visibleMobile: 1,
                get visibleCount() {
                    return window.innerWidth >= 1024 ? this.visibleDesktop : this.visibleMobile;
                },
                next() {
                    this.active = (this.active + 1) % this.cards.length;
                },
                prev() {
                    this.active = (this.active - 1 + this.cards.length) % this.cards.length;
                },
                visibleCards() {
                    let output = [];
                    for (let i = 0; i < this.visibleCount; i++) {
                        output.push(this.cards[(this.active + i) % this.cards.length]);
                    }
                    return output;
                },
                init() {
                    window.addEventListener('resize', () => {
                        this.active = this.active % this.cards.length;
                    });
                }
            }"
        >
            <div class="mb-6 flex items-center justify-between gap-4">
                <div class="text-sm uppercase tracking-[0.22em] text-slate-500">
                    {{ app()->getLocale() === 'de' ? 'Rezensionen & Eindrücke' : 'Reviews & Insights' }}
                </div>

                <div class="flex items-center gap-3">
                    <button
                        type="button"
                        @click="prev()"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]"
                        aria-label="Previous testimonial"
                    >
                        <span>&larr;</span>
                    </button>

                    <button
                        type="button"
                        @click="next()"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]"
                        aria-label="Next testimonial"
                    >
                        <span>&rarr;</span>
                    </button>
                </div>
            </div>

            <div class="kk-review-grid grid gap-6 lg:grid-cols-3">
                <template x-for="(card, index) in visibleCards()" :key="active + '-' + index">
                    <div
                        x-transition:enter="transition ease-out duration-350"
                        x-transition:enter-start="opacity-0 translate-y-2 scale-[0.992]"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-180"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-1 scale-[0.992]"
                        class="kk-review-card rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.035] via-white/[0.02] to-red-500/[0.01] p-7 ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:border-red-500/20"
                        style="height:auto; min-height:0;"
                    >
                        <div class="kk-review-card-body">
                            <div class="mb-5 flex items-center justify-between gap-4">
                                <div class="flex items-center gap-1 text-red-400">
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                </div>

                                <div class="rounded-full border border-white/10 bg-white/[0.03] px-3 py-1 text-[0.65rem] font-semibold uppercase tracking-[0.18em] text-slate-400">
                                    {{ app()->getLocale() === 'de' ? 'Feedback' : 'Feedback' }}
                                </div>
                            </div>

                            <p class="kk-review-quote text-base leading-8 text-slate-300" style="min-height:0;" x-text="'“' + card.quote + '”'"></p>
                        </div>

                        <div class="kk-review-card-footer border-t border-white/10 pt-4">
                            <div class="text-sm font-semibold text-white" x-text="card.role"></div>
                            <div class="mt-1 text-sm text-slate-300" x-text="card.name"></div>
                            <div class="mt-1 text-xs uppercase tracking-[0.18em] text-slate-500">
                                {{ app()->getLocale() === 'de' ? 'Professioneller Eindruck' : 'Professional impression' }}
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="mt-5 flex items-center justify-center gap-2 sm:mt-6">
                <template x-for="(card, index) in cards" :key="'dot-' + index">
                    <button
                        type="button"
                        @click="active = index"
                        class="h-2.5 rounded-full transition-all duration-300"
                        :class="index === active ? 'w-8 bg-red-500 shadow-[0_0_10px_rgba(239,68,68,0.35)]' : 'w-2.5 bg-white/20 hover:bg-white/35'"
                        :aria-label="'Go to testimonial ' + (index + 1)"
                    ></button>
                </template>
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#05070b] py-16 sm:py-20 lg:py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(239,68,68,0.04),transparent_38%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/8 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_16px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ app()->getLocale() === 'de' ? 'Case Studies' : 'Case Studies' }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ app()->getLocale() === 'de' ? 'Beispiele, wie hochwertige Projekte in der Praxis aussehen' : 'Examples of what premium projects look like in practice' }}
            </h2>

            <p class="mt-4 max-w-3xl text-base leading-8 text-slate-400">
                {{ app()->getLocale() === 'de'
                    ? 'Nicht jede Anfrage ist gleich. Genau deshalb zeigen Case Studies besser als klassische Bewertungen, wie technische Ziele, saubere Umsetzung und hochwertiges Fahrgefühl zusammenkommen.'
                    : 'Not every request is the same. That is exactly why case studies show better than traditional reviews how technical goals, clean execution and premium drivability come together.' }}
            </p>
        </div>

        <div class="grid gap-6 xl:grid-cols-3">
            @foreach ($caseStudies as $study)
                <div class="group overflow-hidden rounded-[1.9rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20 hover:shadow-[0_0_28px_rgba(239,68,68,0.04)]">
                    <div class="relative h-64 overflow-hidden">
                        <img
                            src="{{ $study['image'] }}"
                            alt="{{ $study['vehicle'] }}"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-[1.03]"
                            loading="lazy"
                            decoding="async"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/45 to-black/10"></div>
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(239,68,68,0.12),transparent_35%)]"></div>

                        <div class="absolute left-5 top-5">
                            <div class="inline-flex items-center rounded-full border border-red-500/15 bg-red-600/12 px-3 py-1.5 text-[0.68rem] font-semibold uppercase tracking-[0.2em] text-red-200 backdrop-blur-md">
                                {{ $study['badge'] }}
                            </div>
                        </div>

                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <h3 class="text-2xl font-semibold leading-tight text-white drop-shadow-[0_4px_14px_rgba(0,0,0,0.35)]">
                                {{ $study['vehicle'] }}
                            </h3>

                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach ($study['chips'] as $chip)
                                    <span class="rounded-full border border-white/10 bg-black/35 px-3 py-1.5 text-[0.68rem] font-medium uppercase tracking-[0.14em] text-slate-200 backdrop-blur-md">
                                        {{ $chip }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="p-7">
                        <div class="space-y-5">
                            <div>
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                                    {{ app()->getLocale() === 'de' ? 'Ziel' : 'Goal' }}
                                </div>
                                <p class="mt-2 text-sm leading-7 text-slate-300">
                                    {{ $study['goal'] }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                                    {{ app()->getLocale() === 'de' ? 'Ausgangssituation' : 'Starting Point' }}
                                </div>
                                <p class="mt-2 text-sm leading-7 text-slate-400">
                                    {{ $study['situation'] }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-400">
                                    {{ app()->getLocale() === 'de' ? 'Vorgehen' : 'Approach' }}
                                </div>
                                <p class="mt-2 text-sm leading-7 text-slate-400">
                                    {{ $study['approach'] }}
                                </p>
                            </div>

                            <div class="rounded-2xl border border-red-500/12 bg-gradient-to-r from-red-600/8 to-transparent p-4 shadow-[0_0_12px_rgba(239,68,68,0.025)]">
                                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-300">
                                    {{ app()->getLocale() === 'de' ? 'Ergebnis' : 'Result' }}
                                </div>
                                <p class="mt-2 text-sm leading-7 text-slate-200">
                                    {{ $study['result'] }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                            <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                                {{ app()->getLocale() === 'de' ? 'Ähnliches Setup anfragen' : 'Request Similar Setup' }}
                            </a>

                            <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                                {{ app()->getLocale() === 'de' ? 'Projekt starten' : 'Start Project' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 rounded-[2rem] border border-red-500/12 bg-gradient-to-r from-red-600/8 via-white/[0.02] to-transparent p-6 shadow-[0_0_20px_rgba(239,68,68,0.025)] ring-1 ring-white/5 backdrop-blur-xl sm:p-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-2xl">
                    <div class="text-[0.7rem] font-semibold uppercase tracking-[0.24em] text-red-400">
                        {{ app()->getLocale() === 'de' ? 'Projektanfrage' : 'Project Inquiry' }}
                    </div>
                    <h3 class="mt-3 text-2xl font-bold tracking-[-0.02em] text-white">
                        {{ app()->getLocale() === 'de' ? 'Du hast ein eigenes Setup oder ein spezielles Ziel?' : 'Do you have your own setup or a specific target?' }}
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300 sm:text-base">
                        {{ app()->getLocale() === 'de'
                            ? 'Dann ist eine saubere Anfrage der beste Start. Standard-Projekte laufen strukturiert über das Portal, Sonderprojekte gerne direkt über Kontakt oder WhatsApp.'
                            : 'Then a clean inquiry is the best starting point. Standard projects run in a structured way via the portal, while special projects can be discussed directly via contact or WhatsApp.' }}
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                        {{ app()->getLocale() === 'de' ? 'Projekt starten' : 'Start Project' }}
                    </a>

                    <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                        {{ app()->getLocale() === 'de' ? 'Sonderprojekt anfragen' : 'Request Special Project' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="relative overflow-hidden bg-black py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_left_top,rgba(239,68,68,0.04),transparent_28%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ __('home.services_kicker') }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ __('home.services_title') }}
            </h2>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-8 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="mb-4 text-xl font-semibold text-white">
                    {{ __('home.services_card_custom_title') }}
                </h3>
                <p class="leading-8 text-slate-400">
                    {{ __('home.services_card_custom_text') }}
                </p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-8 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="mb-4 text-xl font-semibold text-white">
                    {{ __('home.services_card_gearbox_title') }}
                </h3>
                <p class="leading-8 text-slate-400">
                    {{ __('home.services_card_gearbox_text') }}
                </p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-8 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="mb-4 text-xl font-semibold text-white">
                    {{ __('home.services_card_special_title') }}
                </h3>
                <p class="leading-8 text-slate-400">
                    {{ __('home.services_card_special_text') }}
                </p>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                {{ __('home.services_primary_button') }}
            </a>

            <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                {{ __('home.services_secondary_button') }}
            </a>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#05070b] py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(239,68,68,0.04),transparent_38%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ app()->getLocale() === 'de' ? 'Machbare Optionen' : 'Available Options' }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ app()->getLocale() === 'de' ? 'Tuning Optionen & technische Lösungen' : 'Tuning Options & Technical Solutions' }}
            </h2>

            <p class="mt-4 max-w-3xl text-base leading-8 text-slate-400">
                {{ app()->getLocale() === 'de'
                    ? 'Hier siehst du einen Auszug möglicher Optionen. Weitere Anpassungen sind je nach Projekt auf Anfrage möglich. Wichtig: Nicht jede Lösung ist bei jedem Fahrzeug, Motor oder Motorsteuergerät realisierbar.'
                    : 'Here you can see an excerpt of possible options. Further adjustments may be available on request depending on the project. Important: not every solution is possible for every vehicle, engine or ECU.' }}
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($tuningOptions as $option)
                <div class="rounded-[1.6rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-6 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                    <h3 class="text-xl font-semibold text-white">
                        {{ $option['title'] }}
                    </h3>
                    <p class="mt-4 leading-8 text-slate-400">
                        {{ $option['text'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="expertise" class="relative overflow-hidden bg-[#05070b] py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_right_top,rgba(239,68,68,0.04),transparent_30%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ __('home.expertise_kicker') }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ __('home.expertise_title') }}
            </h2>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-7 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.expertise_1_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.expertise_1_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-7 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.expertise_2_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.expertise_2_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-7 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.expertise_3_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.expertise_3_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-7 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.expertise_4_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.expertise_4_text') }}</p>
            </div>
        </div>
    </div>
</section>

<section id="workflow" class="relative overflow-hidden bg-black py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_left_bottom,rgba(239,68,68,0.03),transparent_30%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ __('home.workflow_kicker') }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ __('home.workflow_title') }}
            </h2>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-6 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <div class="mb-4 text-sm font-bold tracking-[0.2em] text-red-400">01</div>
                <h3 class="text-xl font-semibold text-white">{{ __('home.workflow_step_1_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.workflow_step_1_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-6 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <div class="mb-4 text-sm font-bold tracking-[0.2em] text-red-400">02</div>
                <h3 class="text-xl font-semibold text-white">{{ __('home.workflow_step_2_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.workflow_step_2_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-6 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <div class="mb-4 text-sm font-bold tracking-[0.2em] text-red-400">03</div>
                <h3 class="text-xl font-semibold text-white">{{ __('home.workflow_step_3_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.workflow_step_3_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-6 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <div class="mb-4 text-sm font-bold tracking-[0.2em] text-red-400">04</div>
                <h3 class="text-xl font-semibold text-white">{{ __('home.workflow_step_4_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.workflow_step_4_text') }}</p>
            </div>
        </div>
    </div>
</section>

<section id="why-us" class="relative overflow-hidden bg-[#05070b] py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_right_center,rgba(239,68,68,0.04),transparent_30%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ __('home.why_kicker') }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ __('home.why_title') }}
            </h2>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-8 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.why_1_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.why_1_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-8 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.why_2_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.why_2_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-8 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.why_3_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.why_3_text') }}</p>
            </div>

            <div class="rounded-[1.75rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] p-8 shadow-[0_0_18px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-red-500/20">
                <h3 class="text-xl font-semibold text-white">{{ __('home.why_4_title') }}</h3>
                <p class="mt-4 leading-8 text-slate-400">{{ __('home.why_4_text') }}</p>
            </div>
        </div>

        <div class="mt-10 rounded-[2rem] border border-red-500/12 bg-gradient-to-r from-red-600/[0.08] via-transparent to-transparent p-6 shadow-[0_0_20px_rgba(239,68,68,0.025)] ring-1 ring-white/5 backdrop-blur-xl sm:p-8">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-2xl">
                    <div class="text-[0.7rem] font-semibold uppercase tracking-[0.24em] text-red-400">
                        {{ __('home.why_nextstep_kicker') }}
                    </div>
                    <h3 class="mt-3 text-2xl font-bold tracking-[-0.02em] text-white">
                        {{ __('home.why_nextstep_title') }}
                    </h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300 sm:text-base">
                        {{ __('home.why_nextstep_text') }}
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                        {{ __('home.cta_button_primary') }}
                    </a>

                    <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                        {{ __('home.cta_button_secondary') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-black py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(239,68,68,0.03),transparent_36%)]"></div>
    <div class="absolute inset-0 opacity-[0.01] kk-grid-premium-soft"></div>

    <div class="relative mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="mb-12 max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                {{ app()->getLocale() === 'de' ? 'FAQ' : 'FAQ' }}
            </div>

            <h2 class="mt-6 text-4xl font-bold leading-tight tracking-[-0.03em] text-white sm:text-[2.6rem]">
                {{ app()->getLocale() === 'de' ? 'Häufige Fragen vor dem Start' : 'Frequently asked questions before getting started' }}
            </h2>

            <p class="mt-4 max-w-3xl text-base leading-8 text-slate-400">
                {{ app()->getLocale() === 'de'
                    ? 'Die wichtigsten Punkte vor einer Anfrage: strukturiert beantwortet, klar formuliert und auf hochwertige Projektabwicklung ausgerichtet.'
                    : 'The most important points before an inquiry: answered clearly, structured cleanly and aligned with a premium project workflow.' }}
            </p>
        </div>

        <div class="grid gap-8 lg:grid-cols-[1fr_0.88fr]">
            <div
                x-data="{ open: 0 }"
                class="space-y-4"
            >
                @foreach ($faqItems as $index => $faq)
                    <div class="overflow-hidden rounded-[1.6rem] border border-white/10 bg-gradient-to-br from-white/[0.04] via-white/[0.025] to-red-500/[0.015] shadow-[0_0_16px_rgba(239,68,68,0.02)] ring-1 ring-white/5 backdrop-blur-xl transition duration-300 hover:border-red-500/20">
                        <button
                            type="button"
                            @click="open = open === {{ $index }} ? -1 : {{ $index }}"
                            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left"
                        >
                            <span class="text-base font-semibold leading-7 text-white sm:text-lg">
                                {{ $faq['question'] }}
                            </span>

                            <span
                                class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] text-lg text-white transition duration-300"
                                :class="open === {{ $index }} ? 'rotate-45 border-red-500/20 bg-red-500/[0.06] text-red-300' : ''"
                            >
                                +
                            </span>
                        </button>

                        <div
                            x-show="open === {{ $index }}"
                            x-transition:enter="transition ease-out duration-250"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-180"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            style="display: none;"
                        >
                            <div class="border-t border-white/10 px-6 pb-6 pt-4">
                                <p class="text-sm leading-8 text-slate-300 sm:text-base">
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="h-full">
                <div class="sticky top-28 rounded-[2rem] border border-red-500/12 bg-gradient-to-br from-red-600/[0.08] via-white/[0.03] to-transparent p-7 shadow-[0_0_20px_rgba(239,68,68,0.025)] ring-1 ring-white/5 backdrop-blur-xl">
                    <div class="text-[0.7rem] font-semibold uppercase tracking-[0.24em] text-red-400">
                        {{ app()->getLocale() === 'de' ? 'Direkte Klärung' : 'Direct Clarification' }}
                    </div>

                    <h3 class="mt-4 text-2xl font-bold tracking-[-0.02em] text-white">
                        {{ app()->getLocale() === 'de' ? 'Du hast noch offene Punkte zu deinem Projekt?' : 'Do you still have open points regarding your project?' }}
                    </h3>

                    <p class="mt-4 text-sm leading-7 text-slate-300 sm:text-base">
                        {{ app()->getLocale() === 'de'
                            ? 'Dann ist eine kurze Vorabklärung oft der beste Weg. Gerade bei individuellen Setups, Sonderwünschen oder besonderen technischen Voraussetzungen lohnt sich ein sauberer Erstkontakt.'
                            : 'Then a short pre-discussion is often the best route. Especially for tailored setups, special requests or specific technical conditions, a clean first contact is worth it.' }}
                    </p>

                    <div class="mt-6 grid gap-3">
                        <div class="rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-slate-200">
                            {{ app()->getLocale() === 'de' ? 'Portal für strukturierte Standard-Projekte' : 'Portal for structured standard projects' }}
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-slate-200">
                            {{ app()->getLocale() === 'de' ? 'Direktkontakt für Sonderprojekte & Vorabklärung' : 'Direct contact for special projects & pre-discussion' }}
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-black/20 px-4 py-3 text-sm text-slate-200">
                            {{ app()->getLocale() === 'de' ? 'DE / EN Kommunikation möglich' : 'DE / EN communication available' }}
                        </div>
                    </div>

                    <div class="mt-7 flex flex-col gap-3">
                        <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.04] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                            {{ app()->getLocale() === 'de' ? 'Projekt besprechen' : 'Discuss Project' }}
                        </a>

                        <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                            {{ app()->getLocale() === 'de' ? 'Direkt starten' : 'Start Directly' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-black py-24">
    <div class="mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="rounded-3xl border border-red-500/12 bg-gradient-to-r from-red-600/[0.08] to-black p-8 shadow-[0_0_24px_rgba(239,68,68,0.025)] ring-1 ring-white/5 sm:p-10 lg:p-12">
            <h2 class="mb-6 text-3xl font-bold tracking-[-0.03em] text-white sm:text-4xl">
                {{ __('home.cta_title') }}
            </h2>

            <p class="mb-8 max-w-2xl leading-8 text-slate-300">
                {{ __('home.cta_text') }}
            </p>

            <div class="flex flex-col gap-3 sm:flex-row sm:gap-4">
                <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-xl bg-red-600 px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12 transition hover:bg-red-500 sm:text-base">
                    {{ __('home.cta_button_primary') }}
                </a>

                <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-xl border border-white/15 bg-white/[0.02] px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/[0.05] sm:text-base">
                    {{ __('home.cta_button_secondary') }}
                </a>
            </div>

            <div class="mt-6 grid gap-3 text-sm text-slate-300 sm:grid-cols-3">
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-3 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                    {{ __('home.cta_point_1') }}
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-3 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                    {{ __('home.cta_point_2') }}
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-3 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                    {{ __('home.cta_point_3') }}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative bg-black pb-28 lg:pb-40">
    <div class="mx-auto max-w-[1440px] px-6 lg:px-10">
        <div class="overflow-hidden rounded-[2rem] border border-red-500/12 bg-gradient-to-br from-white/[0.04] via-white/[0.02] to-red-500/[0.015] shadow-[0_0_24px_rgba(239,68,68,0.025)] ring-1 ring-white/5 backdrop-blur-xl">
            <div class="grid items-center gap-8 p-8 lg:grid-cols-[1.1fr_0.9fr] lg:p-10">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-red-500/15 bg-red-600/[0.08] px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.2em] text-red-300 shadow-[0_0_14px_rgba(239,68,68,0.04)]">
                        <span class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.55)]"></span>
                        {{ __('home.evc_kicker') }}
                    </div>

                    <h3 class="mt-5 text-2xl font-bold leading-tight tracking-[-0.03em] text-white lg:text-3xl">
                        {{ __('home.evc_title_1') }}
                        <span class="text-red-500">{{ __('home.evc_title_2') }}</span>
                    </h3>

                    <p class="mt-4 max-w-2xl text-base leading-8 text-slate-300">
                        {{ __('home.evc_text') }}
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <div class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-slate-300 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                            {{ __('home.evc_point_1') }}
                        </div>
                        <div class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-slate-300 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                            {{ __('home.evc_point_2') }}
                        </div>
                        <div class="rounded-xl border border-white/10 bg-white/[0.03] px-4 py-3 text-sm text-slate-300 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)]">
                            {{ __('home.evc_point_3') }}
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                            {{ __('home.evc_primary_button') }}
                        </a>

                        <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_24px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                            {{ __('home.evc_secondary_button') }}
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-3 rounded-[2rem] bg-red-600/[0.04] blur-3xl"></div>

                    <div class="relative rounded-[1.75rem] border border-white/10 bg-black/50 p-6 shadow-[0_0_18px_rgba(239,68,68,0.03)] ring-1 ring-white/5">
                        <div class="mb-5 flex items-center justify-between">
                            <div>
                                <div class="text-xs font-semibold uppercase tracking-[0.22em] text-red-400">
                                    {{ __('home.evc_check_title') }}
                                </div>
                                <div class="mt-2 text-lg font-semibold text-white">
                                    {{ __('home.evc_check_subtitle') }}
                                </div>
                            </div>

                            <div class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-slate-300">
                                {{ __('home.evc_check_status') }}
                            </div>
                        </div>

                        <a
                            href="https://www.evc.de/de/check_evc_license.asp?k=R0%2bTo6BmTg3nQ62jyahIXw%3d%3d"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center justify-center rounded-2xl border border-white/10 bg-white/[0.03] p-5 transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]"
                        >
                            <img
                                src="https://www.evc.de/common/check_evc_license_image.asp?k=R0%2bTo6BmTg3nQ62jyahIXw%3d%3d"
                                alt="EVC WinOLS Lizenzprüfung"
                                class="h-auto max-w-full transition duration-300 group-hover:scale-[1.01]"
                                loading="lazy"
                                decoding="async"
                            >
                        </a>

                        <p class="mt-5 text-sm leading-7 text-slate-400">
                            {{ __('home.evc_check_note') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div
    x-data="{
        showBar: false,
        waOpen: false,
        mobileWaOpen: false,
        init() {
            const updateBar = () => {
                this.showBar = window.scrollY > 680;
            };
            updateBar();
            window.addEventListener('scroll', updateBar);
        }
    }"
>
    <div
        x-show="showBar"
        x-transition:enter="transition ease-out duration-250"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-180"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        class="pointer-events-none fixed inset-x-0 bottom-5 z-40 hidden px-6 md:block"
        style="display: none;"
    >
        <div class="pointer-events-auto mx-auto max-w-5xl">
            <div
                x-show="waOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2 scale-[0.98]"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-2 scale-[0.98]"
                @click.outside="waOpen = false"
                class="mb-3 ml-auto w-full max-w-md overflow-hidden rounded-[1.5rem] border border-white/8 bg-[#07090d]/40 p-3 shadow-[0_12px_28px_rgba(0,0,0,0.16)] ring-1 ring-white/5 backdrop-blur-xl"
                style="display: none;"
            >
                <div class="px-2 pb-3 pt-1">
                    <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-green-300">
                        {{ app()->getLocale() === 'de' ? 'WhatsApp Auswahl' : 'WhatsApp Selection' }}
                    </div>
                    <div class="mt-2 text-sm text-slate-300">
                        {{ app()->getLocale() === 'de' ? 'Wähle direkt die passende Anfrage aus.' : 'Choose the right inquiry directly.' }}
                    </div>
                </div>

                <div class="grid gap-2">
                    <a href="{{ $waGeneralLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/8 bg-white/[0.025] px-4 py-3 text-sm text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.05]">
                        {{ app()->getLocale() === 'de' ? 'Allgemeine Anfrage' : 'General inquiry' }}
                    </a>

                    <a href="{{ $waStageLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/8 bg-white/[0.025] px-4 py-3 text-sm text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.05]">
                        {{ app()->getLocale() === 'de' ? 'Stage Anfrage' : 'Stage inquiry' }}
                    </a>

                    <a href="{{ $waGearboxLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/8 bg-white/[0.025] px-4 py-3 text-sm text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.05]">
                        {{ app()->getLocale() === 'de' ? 'Getriebeoptimierung' : 'Gearbox optimization' }}
                    </a>

                    <a href="{{ $waSpecialLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/8 bg-white/[0.025] px-4 py-3 text-sm text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.05]">
                        {{ app()->getLocale() === 'de' ? 'Sonderprojekt' : 'Special project' }}
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-[1.75rem] border border-white/7 bg-[#07090d]/22 shadow-[0_10px_24px_rgba(0,0,0,0.14)] ring-1 ring-white/5 backdrop-blur-lg">
                <div class="bg-[linear-gradient(180deg,rgba(255,255,255,0.03),rgba(255,255,255,0.01))]">
                    <div class="flex flex-col gap-4 p-4 lg:flex-row lg:items-center lg:justify-between lg:px-5">
                        <div>
                            <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-red-300">
                                {{ app()->getLocale() === 'de' ? 'Direkter Einstieg' : 'Direct Entry' }}
                            </div>
                            <div class="mt-1 text-sm text-slate-200">
                                {{ app()->getLocale() === 'de' ? 'Schnell registrieren, Kontakt aufnehmen oder direkt per WhatsApp anfragen.' : 'Register quickly, get in touch or start directly via WhatsApp.' }}
                            </div>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-3 lg:min-w-[520px]">
                            <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-[0_10px_22px_rgba(239,68,68,0.12)] ring-1 ring-red-400/12 transition duration-300 hover:scale-[1.01]">
                                {{ app()->getLocale() === 'de' ? 'Registrieren' : 'Register' }}
                            </a>

                            <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/8 bg-white/[0.025] px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.05]">
                                {{ app()->getLocale() === 'de' ? 'Kontakt' : 'Contact' }}
                            </a>

                            <button
                                type="button"
                                @click="waOpen = !waOpen"
                                class="inline-flex items-center justify-center rounded-2xl border border-green-400/14 bg-green-500/[0.06] px-5 py-3 text-sm font-semibold text-green-300 transition duration-300 hover:border-green-400/22 hover:bg-green-500/[0.08]"
                            >
                                WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        x-show="mobileWaOpen"
        x-transition:enter="transition ease-out duration-250"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-180"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 md:hidden"
        style="display: none;"
    >
        <div class="absolute inset-0 bg-black/55 backdrop-blur-sm" @click="mobileWaOpen = false"></div>

        <div
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-180"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            class="absolute inset-x-0 bottom-0 rounded-t-[2rem] border-t border-white/10 bg-[#07090d]/94 p-5 shadow-[0_-16px_42px_rgba(0,0,0,0.28)] backdrop-blur-2xl"
        >
            <div class="mx-auto max-w-md">
                <div class="mx-auto mb-4 h-1.5 w-16 rounded-full bg-white/15"></div>

                <div class="text-[0.68rem] font-semibold uppercase tracking-[0.22em] text-green-300">
                    {{ app()->getLocale() === 'de' ? 'WhatsApp Auswahl' : 'WhatsApp Selection' }}
                </div>

                <div class="mt-2 text-sm leading-7 text-slate-300">
                    {{ app()->getLocale() === 'de' ? 'Wähle direkt die passende Anfrage aus.' : 'Choose the right inquiry directly.' }}
                </div>

                <div class="mt-5 grid gap-3">
                    <a href="{{ $waGeneralLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4 text-sm font-medium text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.06]">
                        {{ app()->getLocale() === 'de' ? 'Allgemeine Anfrage' : 'General inquiry' }}
                    </a>

                    <a href="{{ $waStageLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4 text-sm font-medium text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.06]">
                        {{ app()->getLocale() === 'de' ? 'Stage Anfrage' : 'Stage inquiry' }}
                    </a>

                    <a href="{{ $waGearboxLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4 text-sm font-medium text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.06]">
                        {{ app()->getLocale() === 'de' ? 'Getriebeoptimierung' : 'Gearbox optimization' }}
                    </a>

                    <a href="{{ $waSpecialLink }}" target="_blank" rel="noopener noreferrer" class="rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4 text-sm font-medium text-slate-200 transition duration-300 hover:border-green-400/20 hover:bg-white/[0.06]">
                        {{ app()->getLocale() === 'de' ? 'Sonderprojekt' : 'Special project' }}
                    </a>

                    <button
                        type="button"
                        @click="mobileWaOpen = false"
                        class="mt-2 rounded-2xl border border-white/10 bg-white/[0.03] px-4 py-4 text-sm font-semibold text-white"
                    >
                        {{ app()->getLocale() === 'de' ? 'Schließen' : 'Close' }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div
        x-show="showBar"
        x-transition:enter="transition ease-out duration-250"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-180"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        class="fixed inset-x-0 bottom-0 z-40 border-t border-white/10 bg-[#07090d]/82 p-3 backdrop-blur-2xl md:hidden"
        style="display: none;"
    >
        <div class="mx-auto grid max-w-7xl grid-cols-3 gap-3">
            <a href="{{ route('contact.create') }}" class="inline-flex items-center justify-center rounded-xl border border-white/10 bg-white/[0.04] px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:border-red-500/20 hover:bg-white/[0.06]">
                {{ __('home.mobile_sticky_contact') }}
            </a>

            <a href="https://kk-boostfileservice.de/register" class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-red-600 via-red-500 to-orange-500 px-4 py-3 text-sm font-semibold text-white shadow-[0_10px_22px_rgba(239,68,68,0.14)] ring-1 ring-red-400/12">
                {{ __('home.mobile_sticky_register') }}
            </a>

            <button
                type="button"
                @click="mobileWaOpen = true"
                class="inline-flex items-center justify-center rounded-xl border border-green-400/14 bg-green-500/[0.08] px-4 py-3 text-sm font-semibold text-green-300"
            >
                WhatsApp
            </button>
        </div>
    </div>
</div>

@endsection