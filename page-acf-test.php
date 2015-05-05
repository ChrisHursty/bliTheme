<?php

/**
 * Template Name: ACF Test Page
 */

get_header(); ?>


<div class="row">
    <div class="small-12 large-12 columns" role="main">
        <ul class="medium-block-grid-3">
        <?php if ( have_posts() ) : ?>
                
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                    
            <?php the_content(); ?>  
                    
                
            <?php endwhile; ?>

        

        <?php endif; // end have_posts() check ?>
        </ul>

    </div>
</div>
<?php get_footer(); ?>