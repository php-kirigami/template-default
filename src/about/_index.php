<?php
/**
 * @title    About
 * @section  about
 * @type     page
 * @abstract What this starter ships and how to make it your own.
 */
?>

<markdown>
    This is the **default Kirigami starter**, the template `kiri create` uses when
    you don't name one. It's deliberately small: two pages, one layout, one page
    type, a themeable stylesheet and a few lines of progressive-enhancement
    JavaScript.

    This page only writes its text: `@type page` in its header wraps it in
    `_layouts/types/page.before.php` and `page.after.php` (declared under
    `prepros.types` in `kirigami.yaml`), which add the title, the lead and the
    link back home.

    ## Make it yours

    - **`kirigami.yaml`**: set `project`, `baseurl`, `author`, `description`, `tagline`. Every key under `kirigami:` is a PHP variable on every page.
    - **`src/styles/partials/_conf.scss`** `@forward`s `@kirigami/canva/conf`, so every design token (palette, dark mode, fonts) is one override away.
    - **Add a page**: a new `src/<path>/_index.php` becomes `<path>/index.html`. Give it `@type page` to reuse this layout. `sitemap.xml` and `robots.txt` are generated from `baseurl`.
    - **Trim the examples**: the `<year>` tag and the `lead` shortcode in `src/_lib/functions.php` are just there to show the extension points.

    ## Deploy

    `npx kiri export` writes a static site into `dist/`. The included
    `.github/workflows/page.yml` does it on every push to `main` and publishes
    the result to GitHub Pages (Settings → Pages → Source: GitHub Actions).
</markdown>
