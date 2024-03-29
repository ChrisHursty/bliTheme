<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

    <div class="row">
    <!-- Row for main content area -->
        <div class="small-12 large-12 columns" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
            </header><!-- .page-header -->

            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'content', get_post_format() );

            // End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'bli-theme' ),
                'next_text'          => __( 'Next page', 'bli-theme' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bli-theme' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>

        </div><!-- /small-12 large-12 columns -->
    </div><!-- /row -->

<?php get_footer(); ?>