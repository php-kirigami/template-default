# Kirigami starter

The default template for [Kirigami](https://github.com/php-kirigami/kirigami) —
`kiri create` uses it when you don't name a template. PHP page templates compiled
to dependency-free static HTML, no PHP install and no server.

## Develop

```console
npm install
npx kiri watch      # rebuild on save (no server)
```

Point a preview server (e.g. VS Code Live Server) at `src/` for a live browser.
`npx kiri build` does a one-off build; `npx kiri export` writes a production site
into `dist/`.

## Layout

```
kirigami.yaml              # the one config file
src/
  _layouts/header.php      # wraps every page (prepros.before)
  _layouts/footer.php      # wraps every page (prepros.after)
  _lib/functions.php       # custom tags / shortcodes / hooks
  _index.php               # → src/index.html
  about/_index.php          # → src/about/index.html
  styles/kirigami.core.scss # Sass entry — partials/_conf.scss holds the theme
  scripts/kirigami.core.js  # esbuild entry
assets/fonts/              # inlined by the Sass font pipeline
```

Retheme in `src/styles/partials/_conf.scss` — it `@forward`s
`@kirigami/canva/conf`, so every design token (palette, dark mode, fonts) is one
override away. `sitemap.xml` and `robots.txt` are generated from
`kirigami.baseurl`.

MIT
