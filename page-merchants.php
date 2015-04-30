<?php
/*
Template Name: Merchants
*/
get_header(); ?>

<div class="row">
    <div class="small-12 large-8 columns" role="main">
        <?php do_action('bliTheme_before_content'); ?>

        <?php
        $args = array(
            'post_type'      => 'places',
            'posts_per_page' => '-1'
        );

        $the_query = new WP_Query( $args );

        $the_query->have_posts()
        ?>

        <div>
            <?php       
                // The Loop
                while ( $the_query->have_posts() ) : $the_query->the_post();
            
                echo the_title();
                echo '<br />';
                echo the_post_thumbnail();
            ?>

        <?php endwhile; ?>
            
        </div><!-- / -->        
        <?php 
        // Reset Post Data
        wp_reset_postdata();
        ?>

        <?php do_action('bliTheme_after_content'); ?>

    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
