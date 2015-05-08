<?php

/**
 * Template Name: ACF Test Page
*/

get_header(); ?>

<div class="featuredImage-small">
    <?php if ( has_post_thumbnail() ) {
    the_post_thumbnail( 'featured-img-sm' );
    } else { ?>
    <img src="<?php bloginfo('template_directory'); ?>/assets/default-featured-img.jpg" alt="Bronx Little Italy" />
    <?php } ?>
</div>


<div class="row">
    <div class="small-12 large-12 columns" role="main">
        <ul class="medium-block-grid-3">
        <?php if ( have_posts() ) : ?>
                
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                    
            <?php the_content(); ?>
            <?php the_field('event_text'); ?>  
            <?php the_field('event_date'); ?>
            <?php the_field('event_address'); ?>       
                
            <?php endwhile; ?>

        

        <?php endif; // end have_posts() check ?>
        </ul>

    </div>
</div>
<?php get_footer(); ?>