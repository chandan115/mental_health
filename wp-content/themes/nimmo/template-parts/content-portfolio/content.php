<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Troma
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-type-inner">
        <?php the_content(); ?>
    </div>
</article><!-- #post -->