<?php
/**
 * prepros.includes entry — include_once'd before any page renders.
 *
 * The three extension points a Kirigami site normally uses, written with the
 * procedural alias functions (each one wraps a static class method):
 *
 *   register_tag()       → PREPROS::registerTag()   a custom HTML tag
 *   md_register_plugin() → MD::registerPlugin()     a Markdown shortcode
 *   register_hook()      → PREPROS::registerHook()  a render-pipeline hook
 *
 * Delete what you don't need.
 */


/* 1. Custom HTML tag — <year> prints the current year.
 *    Processed after PHP runs, on the assembled HTML. */
register_tag('year', fn() => date('Y'));


/* 2. Markdown shortcode — {% lead A short highlighted intro %}
 *    Works inside <markdown> blocks and any .md data file. */
md_register_plugin('lead', function (array $args, string $body): string {
    $text = trim($body !== '' ? $body : implode(' ', $args));
    return $text === '' ? '' : '<p class="lead">' . str_htmlesc($text) . '</p>';
});


/* 3. Render hook — replace a build-time token in the finished HTML. */
register_hook('post_render', fn(string $html): string =>
    str_replace('{{build-date}}', date('F j, Y'), $html)
);
