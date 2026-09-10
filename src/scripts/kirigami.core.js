/**
 * Bundled by the `js-core` esbuild task → scripts/kirigami.core.min.js
 *
 * Progressive enhancement only — the site works with JavaScript disabled.
 * Dependency-free on purpose. `@kirigami/canva/theme` ships this same
 * theme-toggle contract as an import if you'd rather not maintain it here.
 */

const ready = (fn) =>
    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', fn, { once: true })
        : fn();

ready(() => {
    const root = document.documentElement;
    const media = matchMedia('(prefers-color-scheme: dark)');

    // ── Theme toggle ──────────────────────────────────────────────
    // Persists under `kirigami-theme`; the <head> has an inline guard that
    // reads the same key before first paint.
    const stored = () => {
        try { return localStorage.getItem('kirigami-theme') || 'auto'; }
        catch { return 'auto'; }
    };
    const resolved = () => {
        const forced = root.dataset.theme;
        return forced === 'light' || forced === 'dark'
            ? forced
            : (media.matches ? 'dark' : 'light');
    };
    const setPref = (pref) => {
        const forced = pref === 'light' || pref === 'dark';
        try {
            forced
                ? localStorage.setItem('kirigami-theme', pref)
                : localStorage.removeItem('kirigami-theme');
        } catch {}
        if (forced) root.dataset.theme = pref;
        else delete root.dataset.theme;
    };

    document.querySelectorAll('[data-theme-toggle]').forEach((el) => {
        el.addEventListener('click', () => {
            setPref(resolved() === 'dark' ? 'light' : 'dark');
        });
    });

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
