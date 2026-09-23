<div align="center">

<img src="https://zmotrin.github.io/assets/kirigami/kirigami-logo-universal.svg" alt="Kirigami" width="400" />

---

# Kirigami starter

The default template for **[Kirigami](https://github.com/php-kirigami/kirigami)** —
`kiri create` clones it when you don't name a template.

[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE)
[![Node](https://img.shields.io/badge/node-%3E%3D24.0.0-brightgreen)](#develop)

</div>

---

PHP page templates compiled to dependency-free static HTML — no PHP install, no
server.

## Develop

```console
npm install
npx kiri serve      # build, then rebuild on save with a live-reloading local server
```

`npx kiri build` does a one-off build; `npx kiri export` writes a production site
into `dist/`. In VS Code, the recommended Kirigami extension runs the same
commands and the dev server from the Command Palette and the status bar.

## Layout

```
kirigami.yaml              # the one config file
src/
  _layouts/header.php      # wraps every page (prepros.before)
  _layouts/footer.php      # wraps every page (prepros.after)
  _layouts/types/page.*.php # title + lead around pages with @type page
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
`kirigami.baseurl`. Pushing to `main` deploys to GitHub Pages through
`.github/workflows/page.yml`.

MIT
