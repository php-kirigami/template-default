/**
 * Bundled by the `js-core` esbuild task → scripts/kirigami.core.min.js
 *
 * Progressive enhancement only — the site works with JavaScript disabled.
 */

// Theme toggle: wires every [data-theme-toggle] control, persists the choice
// under `kirigami-theme`, keeps controls in sync (incl. with OS changes in
// auto mode), and fires `canva:themechange` on window. The <head> has an
// inline guard that reads the same key before first paint.
import "@kirigami/canva/theme";

const ready = (fn) =>
    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', fn, { once: true })
        : fn();

ready(() => {
    // ── Mobile nav ────────────────────────────────────────────────
    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.getElementById('site-nav');
    navToggle?.addEventListener('click', () => {
        const open = nav.toggleAttribute('data-open');
        navToggle.setAttribute('aria-expanded', String(open));
    });

    // ── Reveal on scroll ──────────────────────────────────────────
    const reveal = [...document.querySelectorAll('[data-reveal]')];
    const show = (el) => el.classList.add('is-in');

    if (reveal.length && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                show(e.target);
                io.unobserve(e.target);
            }
        }, { rootMargin: '0px 0px -10% 0px' });
        reveal.forEach((el) => io.observe(el));
        setTimeout(() => reveal.forEach(show), 1500); // safety net
    } else {
        reveal.forEach(show);
    }
});
