@php
    $whatsappNumber = preg_replace('/\D+/', '', (string) config('services.whatsapp.number', '4915566180004'));
    $whatsappUrl = $whatsappNumber !== '' ? 'https://wa.me/'.$whatsappNumber : null;
    $defaultWhatsappMessage = 'Hello KAT MAPPING, I would like to discuss a calibration project.';
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#05070b">
    <meta name="description" content="KAT MAPPING FZCO — custom ECU and TCU calibration, German vehicle expertise and UAE-ready performance solutions.">
    <meta name="robots" content="index,follow">
    <meta property="og:type" content="website">
    <meta property="og:title" content="KAT MAPPING — REMAP TO WIN">
    <meta property="og:description" content="Precision calibration engineered around the vehicle, its hardware and its operating conditions.">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <title>KAT MAPPING — REMAP TO WIN</title>

    {{-- The landing page remains independent of the Vite build during the quick transition. --}}
    <style>{!! file_get_contents(resource_path('css/app.css')) !!}</style>
</head>
<body>
    <div class="site-shell">
        <div class="ambient ambient-one" aria-hidden="true"></div>
        <div class="ambient ambient-two" aria-hidden="true"></div>
        <div class="noise" aria-hidden="true"></div>

        <header class="site-header" data-site-header>
            <div class="site-container">
                <a href="#top" class="brand" aria-label="KAT MAPPING home">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 34 34" role="img">
                            <path d="M7 25.5 13.5 8h4.2l-2.3 6.2L26 8h6l-12.3 7.2L27 26h-6.1l-4.8-7.8-2.9 1.7-2.1 5.6H7Z" fill="currentColor"/>
                        </svg>
                    </span>
                    <span>
                        <span class="brand-name">KAT MAPPING</span>
                        <span class="brand-claim">REMAP TO WIN</span>
                    </span>
                </a>

                <nav aria-label="Primary navigation">
                    <a class="nav-link" href="#services" data-i18n="nav_services">Services</a>
                    <a class="nav-link" href="#expertise" data-i18n="nav_expertise">Expertise</a>
                    <a class="nav-link" href="#process" data-i18n="nav_process">Process</a>
                    @if ($whatsappUrl)
                        <a class="nav-link nav-whatsapp" href="{{ $whatsappUrl }}?text={{ urlencode($defaultWhatsappMessage) }}" target="_blank" rel="noopener noreferrer" data-whatsapp-link data-i18n="nav_whatsapp">WhatsApp</a>
                    @endif
                </nav>

                <div class="header-actions">
                    <div class="language-picker" role="group" aria-label="Language">
                        <button class="language-option is-active" type="button" data-language="en" aria-pressed="true">EN</button>
                        <button class="language-option" type="button" data-language="de" aria-pressed="false">DE</button>
                        <button class="language-option" type="button" data-language="ar" aria-pressed="false">AR</button>
                    </div>

                    <button class="menu-button" type="button" data-menu-button aria-controls="mobile-navigation" aria-expanded="false">
                        <span class="sr-only">Open navigation</span>
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 8h14M5 16h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <nav id="mobile-navigation" class="mobile-navigation" data-mobile-navigation hidden aria-label="Mobile navigation">
                <div class="site-container">
                    <a class="mobile-link" href="#services" data-i18n="nav_services">Services</a>
                    <a class="mobile-link" href="#expertise" data-i18n="nav_expertise">Expertise</a>
                    <a class="mobile-link" href="#process" data-i18n="nav_process">Process</a>
                    @if ($whatsappUrl)
                        <a class="mobile-link mobile-whatsapp" href="{{ $whatsappUrl }}?text={{ urlencode($defaultWhatsappMessage) }}" target="_blank" rel="noopener noreferrer" data-whatsapp-link data-i18n="nav_whatsapp">WhatsApp</a>
                    @endif
                </div>
            </nav>
        </header>

        <main id="top">
            <section class="hero-section">
                <div class="site-container">
                    <div class="hero-copy" data-reveal>
                        <div class="eyebrow">
                            <span class="eyebrow-dot"></span>
                            <span data-i18n="hero_eyebrow">Calibration engineered around the setup</span>
                        </div>

                        <h1 class="hero-title">
                            <span>KAT MAPPING</span>
                            <span class="gradient-text">REMAP TO WIN</span>
                        </h1>

                        <p class="hero-text" data-i18n="hero_text">
                            Custom ECU and TCU calibration for workshops, tuners and performance-focused drivers — with German vehicle expertise and UAE operating conditions in mind.
                        </p>

                        <div class="hero-actions">
                            <span class="maintenance-button" role="status">
                                <span class="maintenance-icon" aria-hidden="true"></span>
                                <span data-i18n="fileservice_soon">FILESERVICE — COMING SOON</span>
                            </span>

                            @if ($whatsappUrl)
                                <a class="whatsapp-button" href="{{ $whatsappUrl }}?text={{ urlencode($defaultWhatsappMessage) }}" target="_blank" rel="noopener noreferrer" data-whatsapp-link>
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 2a9.7 9.7 0 0 0-8.42 14.53L2.3 21.2l4.79-1.26A9.7 9.7 0 1 0 12 2Zm0 17.65a7.9 7.9 0 0 1-4.03-1.1l-.29-.17-2.84.75.76-2.77-.19-.29A7.94 7.94 0 1 1 12 19.65Zm4.35-5.94c-.24-.12-1.41-.7-1.63-.77-.22-.08-.38-.12-.54.12-.16.24-.62.77-.76.93-.14.16-.28.18-.52.06-.24-.12-1-.37-1.91-1.18a7.16 7.16 0 0 1-1.32-1.64c-.14-.24-.01-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.4 1.37.51.58.18 1.1.16 1.51.1.46-.07 1.41-.58 1.61-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z"/></svg>
                                    <span data-i18n="whatsapp_cta">Start on WhatsApp</span>
                                    <span aria-hidden="true">↗</span>
                                </a>
                            @else
                                <span class="whatsapp-button is-disabled" aria-disabled="true" data-i18n="whatsapp_pending">WhatsApp will be available shortly</span>
                            @endif
                        </div>

                        <div class="trust-row" aria-label="Key benefits">
                            <span><i></i><b data-i18n="trust_custom">Custom files</b></span>
                            <span><i></i><b data-i18n="trust_support">Direct support</b></span>
                            <span><i></i><b data-i18n="trust_global">Worldwide workflow</b></span>
                        </div>
                    </div>

                    <div class="console-wrap" data-reveal>
                        <div class="console-glow" aria-hidden="true"></div>
                        <div class="console-card">
                            <div class="console-topbar">
                                <div>
                                    <span class="console-kicker">KAT MAPPING SYSTEM</span>
                                    <h2 data-i18n="system_overview">Calibration workspace</h2>
                                </div>
                                <div class="console-lights" aria-hidden="true"><i></i><i></i><i></i></div>
                            </div>

                            <div class="console-grid">
                                <article class="console-module status-module">
                                    <div class="module-heading">
                                        <span data-i18n="service_status">Portal status</span>
                                        <span class="status-pill"><i></i><b data-i18n="coming_soon">Coming soon</b></span>
                                    </div>
                                    <p data-i18n="maintenance_note">The global fileservice is being prepared. Until launch, every request is handled personally via WhatsApp.</p>
                                    <div class="progress-track" aria-hidden="true"><span></span></div>
                                </article>

                                <article class="console-module">
                                    <span class="module-label">01 / CAL</span>
                                    <h3 data-i18n="module_mapping">Custom calibration</h3>
                                    <p data-i18n="module_mapping_text">Built around vehicle data, hardware and the intended use.</p>
                                </article>

                                <article class="console-module">
                                    <span class="module-label">02 / UAE</span>
                                    <h3 data-i18n="module_thermal">Thermal awareness</h3>
                                    <p data-i18n="module_thermal_text">Performance, drivability and thermal margins considered together.</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="services" class="content-section">
                <div class="site-container">
                    <div class="section-heading" data-reveal>
                        <div>
                            <span class="section-number">01</span>
                            <p class="section-kicker" data-i18n="services_kicker">Focused services</p>
                        </div>
                        <div>
                            <h2 data-i18n="services_title">Built for precise results.</h2>
                            <p data-i18n="services_intro">Individual calibration instead of generic files — backed by a clear technical workflow and direct communication.</p>
                        </div>
                    </div>

                    <div class="services-grid">
                        <article class="service-card" data-reveal>
                            <span class="card-index">01</span>
                            <div class="card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M4 15.5V9m5 9V6m6 13V5m5 10V9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M3 20h18" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                            </div>
                            <h3 data-i18n="service_one_title">ECU calibration</h3>
                            <p data-i18n="service_one_text">Custom engine software aligned with the vehicle, hardware, fuel quality and project target.</p>
                        </article>

                        <article class="service-card" data-reveal>
                            <span class="card-index">02</span>
                            <div class="card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M4 12a8 8 0 1 1 16 0" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="m12 12 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="12" r="1.5" fill="currentColor"/><path d="M6.5 18h11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
                            </div>
                            <h3 data-i18n="service_two_title">TCU calibration</h3>
                            <p data-i18n="service_two_text">Transmission calibration focused on torque strategy, shift behaviour and a coherent overall setup.</p>
                        </article>

                        <article class="service-card" data-reveal>
                            <span class="card-index">03</span>
                            <div class="card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M12 3 4.5 7.2v9.6L12 21l7.5-4.2V7.2L12 3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m8.5 12 2.2 2.2 4.8-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <h3 data-i18n="service_three_title">Technical file support</h3>
                            <p data-i18n="service_three_text">Structured review, revisions and direct technical communication from request to delivery.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="motion-section" aria-label="Engineering in motion">
                <video class="motion-video" data-lazy-video muted loop playsinline preload="none" aria-hidden="true">
                    <source data-src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
                </video>
                <div class="motion-overlay" aria-hidden="true"></div>
                <div class="site-container motion-copy" data-reveal>
                    <p class="section-kicker" data-i18n="motion_kicker">Engineering in motion</p>
                    <h2 data-i18n="motion_title">Every detail changes the result.</h2>
                    <p data-i18n="motion_text">Power delivery, response, thermal behaviour and durability must work as one system.</p>
                </div>
            </section>

            <section id="expertise" class="content-section expertise-section">
                <div class="site-container">
                    <div class="section-heading" data-reveal>
                        <div>
                            <span class="section-number">02</span>
                            <p class="section-kicker" data-i18n="expertise_kicker">European roots. UAE focus.</p>
                        </div>
                        <div>
                            <h2 data-i18n="expertise_title">Experience that travels.</h2>
                            <p data-i18n="expertise_intro">German automotive know-how meets the demands of high ambient temperatures, regional fuel qualities and everyday driving in the UAE.</p>
                        </div>
                    </div>

                    <div class="expertise-grid">
                        <article data-reveal>
                            <span>DE</span>
                            <h3 data-i18n="expertise_german_title">German manufacturers</h3>
                            <p data-i18n="expertise_german_text">Extensive practical experience with German performance platforms and their ECU and TCU strategies.</p>
                        </article>
                        <article data-reveal>
                            <span>UAE</span>
                            <h3 data-i18n="expertise_uae_title">Heat-aware setup</h3>
                            <p data-i18n="expertise_uae_text">Calibration decisions account for thermal load, drivability and reliable performance in demanding climates.</p>
                        </article>
                        <article data-reveal>
                            <span>INT</span>
                            <h3 data-i18n="expertise_global_title">Global file workflow</h3>
                            <p data-i18n="expertise_global_text">Prepared for international workshops and tuners with clear project data, communication and revisions.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="process" class="content-section process-section">
                <div class="site-container">
                    <div data-reveal>
                        <span class="section-number">03</span>
                        <p class="section-kicker" data-i18n="process_kicker">Current workflow</p>
                        <h2 class="process-title" data-i18n="process_title">Personal until the portal launches.</h2>
                    </div>

                    <ol class="process-list">
                        <li data-reveal>
                            <span>01</span>
                            <div><h3 data-i18n="step_one_title">Message via WhatsApp</h3><p data-i18n="step_one_text">Send vehicle details, hardware, fuel and your calibration goal.</p></div>
                        </li>
                        <li data-reveal>
                            <span>02</span>
                            <div><h3 data-i18n="step_two_title">Technical review</h3><p data-i18n="step_two_text">The setup and requirements are checked before the calibration is prepared.</p></div>
                        </li>
                        <li data-reveal>
                            <span>03</span>
                            <div><h3 data-i18n="step_three_title">Calibration and support</h3><p data-i18n="step_three_text">Receive the custom file with direct communication and revision support.</p></div>
                        </li>
                    </ol>
                </div>
            </section>

            <section id="whatsapp-contact" class="cta-section">
                <div class="site-container">
                    <div class="cta-panel" data-reveal>
                        <div>
                            <span class="section-kicker" data-i18n="cta_kicker">Available now</span>
                            <h2 data-i18n="cta_title">Your project starts on WhatsApp.</h2>
                            <p data-i18n="cta_text">The fileservice portal is coming soon. Until then, requests and support are handled personally here.</p>
                        </div>
                        @if ($whatsappUrl)
                            <a class="primary-button whatsapp-primary" href="{{ $whatsappUrl }}?text={{ urlencode($defaultWhatsappMessage) }}" target="_blank" rel="noopener noreferrer" data-whatsapp-link>
                                <span data-i18n="whatsapp_cta">Start on WhatsApp</span>
                                <span aria-hidden="true">↗</span>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="site-container">
                <div>
                    <a href="#top" class="brand footer-brand" aria-label="KAT MAPPING home">
                        <span class="brand-mark" aria-hidden="true">
                            <svg viewBox="0 0 34 34"><path d="M7 25.5 13.5 8h4.2l-2.3 6.2L26 8h6l-12.3 7.2L27 26h-6.1l-4.8-7.8-2.9 1.7-2.1 5.6H7Z" fill="currentColor"/></svg>
                        </span>
                        <span><span class="brand-name">KAT MAPPING</span><span class="brand-claim">REMAP TO WIN</span></span>
                    </a>
                    <p class="footer-copy">© {{ date('Y') }} KAT MAPPING FZCO. <span data-i18n="rights">All rights reserved.</span></p>
                </div>

                <div class="footer-meta">
                    <p>KAT MAPPING FZCO</p>
                    <p>Building A1, Dubai Digital Park</p>
                    <p>Dubai Silicon Oasis, Dubai, UAE</p>
                    <span>EVC / WinOLS workflow</span>
                </div>
            </div>
        </footer>

        @if ($whatsappUrl)
            <a class="floating-whatsapp" href="{{ $whatsappUrl }}?text={{ urlencode($defaultWhatsappMessage) }}" target="_blank" rel="noopener noreferrer" data-whatsapp-link aria-label="Contact KAT MAPPING on WhatsApp">
                <span class="floating-ripple" aria-hidden="true"></span>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 2a9.7 9.7 0 0 0-8.42 14.53L2.3 21.2l4.79-1.26A9.7 9.7 0 1 0 12 2Zm0 17.65a7.9 7.9 0 0 1-4.03-1.1l-.29-.17-2.84.75.76-2.77-.19-.29A7.94 7.94 0 1 1 12 19.65Zm4.35-5.94c-.24-.12-1.41-.7-1.63-.77-.22-.08-.38-.12-.54.12-.16.24-.62.77-.76.93-.14.16-.28.18-.52.06-.24-.12-1-.37-1.91-1.18a7.16 7.16 0 0 1-1.32-1.64c-.14-.24-.01-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.4 1.37.51.58.18 1.1.16 1.51.1.46-.07 1.41-.58 1.61-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z"/></svg>
                <span class="floating-label" data-i18n="whatsapp_short">WhatsApp</span>
            </a>
        @endif
    </div>

    <script>
        window.katMapping = @json([
            'whatsappUrl' => $whatsappUrl,
        ]);
    </script>
    <script>{!! file_get_contents(resource_path('js/app.js')) !!}</script>
</body>
</html>
