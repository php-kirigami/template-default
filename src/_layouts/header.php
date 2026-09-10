<?php
/**
 * prepros.before — prepended to every rendered page.
 *
 * In scope: everything from the `kirigami:` block ($project, $baseurl, $author,
 * $tagline, $description, …), every PHPDOC annotation of the page being rendered
 * ($title, $abstract, $section, …), plus $relroot (path back to the site root)
 * and $absurl (this page's absolute path).
 */

$page_title = !empty($title) && $title !== $project
    ? "{$title} — {$project}"
    : "{$project} — {$tagline}";

$meta_desc = trim($abstract ?? '') ?: trim($description ?? '');
$section   = $section ?? '';

$origin    = preg_replace('#^(https?://[^/]+).*#', '$1', $baseurl);
$canonical = $origin . $absurl;

// path (relative to the site root) => [label, section key]
$nav = [
    ''       => ['Home',  'home'],
    'about/' => ['About', 'about'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo str_htmlesc($page_title); ?></title>
    <meta name="description" content="<?php echo str_htmlesc($meta_desc); ?>">
    <meta name="author" content="<?php echo str_htmlesc($author); ?>">
    <link rel="canonical" href="<?php echo str_htmlesc($canonical); ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo str_htmlesc($project); ?>">
    <meta property="og:title" content="<?php echo str_htmlesc($title ?? $project); ?>">
    <meta property="og:description" content="<?php echo str_htmlesc($meta_desc); ?>">
    <meta property="og:url" content="<?php echo str_htmlesc($canonical); ?>">

    <?php /* Kirigami injects the theme guard, the stylesheet <link> and the
             bundle <script> automatically (prepros.head). */ ?>
</head>
<body class="page-<?php echo str_htmlesc($section ?: 'home'); ?>">
    <a class="skip-link" href="#main">Skip to content</a>

    <header class="site-header">
        <div class="wrap site-header__inner">
            <a class="brand" href="<?php echo $relroot; ?>"><?php echo str_htmlesc($project); ?></a>

            <nav class="site-nav" id="site-nav" aria-label="Primary">
                <ul>
                    <?php foreach ($nav as $path => [$label, $key]): ?>
                        <li>
                            <a href="<?php echo $relroot . $path; ?>"<?php
                                echo ($section ?: 'home') === $key ? ' aria-current="page"' : ''; ?>><?php echo $label; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <button class="theme-toggle" type="button" data-theme-toggle aria-label="Toggle dark mode">
                <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                    <path class="theme-toggle__moon" fill="currentColor" d="M12 3a9 9 0 1 0 9 9c0-.46-.04-.92-.1-1.36A5.5 5.5 0 0 1 12.36 3.1 9.6 9.6 0 0 0 12 3Z"/>
                    <g class="theme-toggle__sun" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <circle cx="12" cy="12" r="4"/>
                        <path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>
                    </g>
                </svg>
            </button>

            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Toggle menu">
                <span></span>
            </button>
        </div>
    </header>

    <main id="main">
