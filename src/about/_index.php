<?php
/**
 * @title    About
 * @section  about
 * @abstract What this starter ships and how to make it your own.
 */
?>

<section class="section wrap prose">
    <h1><?php echo str_htmlesc($title); ?></h1>
    <p class="lead"><?php echo str_htmlesc($abstract); ?></p>

    <markdown>
        This is the **default Kirigami starter** — the template `kiri create` uses when
        you don't name one. It's deliberately small: two pages, one layout, a themeable
        stylesheet and a few lines of progressive-enhancement JavaScript.

        ## Make it yours

        - **`kirigami.yaml`** — set `project`, `baseurl`, `author`, `description`, `tagline`. Every key under `kirigami:` is a PHP variable on every page.
        - **`src/styles/partials/_conf.scss`** — `@forward`s `@kirigami/canva/conf`, so every design token (palette, dark mode, fonts) is one override away.
        - **Add a page** — a new `src/<path>/_index.php` becomes `<path>/index.html`. `sitemap.xml` and `robots.txt` are generated from `baseurl`.
        - **Trim the examples** — the `<year>` tag and `{% lead %}` shortcode in `src/_lib/functions.php` are just there to show the extension points.

        ## Deploy

        `npx kiri export` writes a static site into `dist/`. Point any static host at it.
        A GitHub Pages workflow will ship with a later Kirigami release.
    </markdown>

    <p><a href="<?php echo $relroot; ?>">← Back home</a></p>
</section>
