<?php
/**
 * @title    Home
 * @section  home
 * @abstract A starter site built with Kirigami — PHP page templates compiled to
 *           dependency-free static HTML.
 */
?>

<section class="hero wrap">
    <h1><?php echo str_htmlesc($tagline); ?></h1>
    <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
    <p>
        <a class="btn" href="<?php echo $relroot; ?>about/">About this template</a>
        <a class="btn btn--ghost" href="https://github.com/php-kirigami/kirigami">Kirigami on GitHub</a>
    </p>
</section>

<section class="section wrap">
    <h2>Where things live</h2>

    <div class="grid" data-reveal>
        <article class="card">
            <h3><code>src/_index.php</code></h3>
            <p>This page. A <code>_name.php</code> file compiles to <code>name.html</code> in the same folder. The PHPDOC block at the top becomes <code>$title</code>, <code>$section</code>, <code>$abstract</code>…</p>
        </article>
        <article class="card">
            <h3><code>src/_layouts/</code></h3>
            <p><code>header.php</code> and <code>footer.php</code> wrap every page (set in <code>kirigami.yaml</code> under <code>prepros</code>).</p>
        </article>
        <article class="card">
            <h3><code>src/_lib/functions.php</code></h3>
            <p>Register custom tags, Markdown shortcodes and render hooks. Try <code>&lt;year&gt;</code>: <strong><year></strong>.</p>
        </article>
        <article class="card">
            <h3><code>src/styles/</code> · <code>src/scripts/</code></h3>
            <p>The Sass and esbuild task entries. Edit <code>partials/_conf.scss</code> to retheme — it forwards <code>@kirigami/canva</code>.</p>
        </article>
    </div>
</section>

<section class="section wrap">
    <h2>Build it</h2>
    <div class="prose">
        <markdown>
        ```shell
        npm install
        npx kiri watch      # rebuild on save, no server
        npx kiri build      # one-off dev build
        npx kiri export     # production build into dist/
        ```
        </markdown>
    </div>
</section>
