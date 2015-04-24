<?php

/**
 * Template Name: ACF Test Page
 */

get_header(); 

?>

<div class="row">
    <div class="small-12 large-8 columns" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <h1><?php the_field('test_name'); ?></h1>
            <?php the_field('field_name'); ?>
            <img src="<?php the_field('test_image'); ?>" />

            <p><?php the_content(); ?></p>

        <?php endwhile; // end of the loop. ?>

    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>