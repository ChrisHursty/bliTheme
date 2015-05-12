<?php
/**
 * @package bliTheme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <div class="entry-content">
        <?php if ( has_post_thumbnail() ): ?>
            <div class="row">
                <div class="column">
                    <?php the_post_thumbnail('', array('class' => 'th')); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php bliTheme_entry_meta(); ?>
        <footer>
            <?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
        </footer>
        <hr />
    </div>
</article><!-- #post-## -->
