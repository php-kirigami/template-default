<?php
/**
 * prepros.types.page.before — opens a text page (@type page), inside the
 * global header. The page itself only writes its body, typically a
 * <markdown> block; its @title and @abstract become the heading and lead.
 */
?>
<article class="section wrap prose">
    <h1><?php echo str_htmlesc($title); ?></h1>
    <?php if (!empty($abstract)): ?>
        <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
    <?php endif; ?>
