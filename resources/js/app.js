import './bootstrap';

const enableRevealAnimations = () => {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const selectors = [
        'section > div',
        'section h1',
        'section h2',
        'section h3',
        'section p',
        'section .grid > div',
        'section .rounded-2xl',
        'section .rounded-3xl',
        'section [class*="rounded-[1.75rem]"]',
        'section [class*="rounded-[2rem]"]'
    ];

    const elements = Array.from(
        new Set(
            selectors.flatMap((selector) => Array.from(document.querySelectorAll(selector)))
        )
    ).filter((element) => !element.closest('header') && !element.closest('footer'));

    elements.forEach((element, index) => {
        element.classList.add('kk-reveal');

        const mod = index % 4;
        if (mod === 1) element.classList.add('kk-reveal-delay-1');
        if (mod === 2) element.classList.add('kk-reveal-delay-2');
        if (mod === 3) element.classList.add('kk-reveal-delay-3');
        if (mod === 0 && index !== 0) element.classList.add('kk-reveal-delay-4');
    });

    if (reducedMotion) {
        elements.forEach((element) => element.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, currentObserver) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    currentObserver.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.12,
            rootMargin: '0px 0px -8% 0px'
        }
    );

    elements.forEach((element) => observer.observe(element));
};

const enhancePremiumElements = () => {
    const selectors = [
        '.rounded-2xl',
        '.rounded-3xl',
        '[class*="rounded-[1.75rem]"]',
        '[class*="rounded-[2rem]"]'
    ];

    document.querySelectorAll(selectors.join(',')).forEach((element) => {
        if (!element.closest('header') && !element.closest('footer')) {
            element.classList.add('kk-premium-sheen', 'kk-premium-lift');
        }
    });
};

const enhanceNavbar = () => {
    const header = document.querySelector('header');

    if (!header) return;

    const onScroll = () => {
        if (window.scrollY > 40) {
            header.classList.add('kk-nav-scrolled');
        } else {
            header.classList.remove('kk-nav-scrolled');
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
};

document.addEventListener('DOMContentLoaded', () => {
    enableRevealAnimations();
    enhancePremiumElements();
    enhanceNavbar();
});