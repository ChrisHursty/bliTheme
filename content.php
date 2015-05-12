<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package bliTheme
 * @subpackage bliTheme
 * @since bliTheme 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>">  
        <header class="blog-entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
        </a>
        <?php // Displays Merchants / Type of 
            if( 'merchants' == get_post_type( ) ) { ?>
                <div class="">
                    <div class="">
                        <?php echo get_the_term_list( $post->ID, 'merchants', 'Type of Merchants: ', ', ', ''); ?>
                    </div>
                </div>
            <?php } ?>
    <div class="entry-content">
        <?php the_content(__('Continue reading...', 'bli-theme')); ?>
    </div>
    <footer>
        <?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
    </footer>
    <hr />
</article>