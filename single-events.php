<?php
/**
 * Single Event Template
 *
 * @package bliTheme 
 */

get_header(); ?>

<div class="placesMap">
    
    <?php 
    // Map from ACF Google Map
    $location = get_field('event_address');

    if( !empty($location) ):
    ?>
    <div class="acf-map">
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
    <?php endif; ?>
</div>


<div class="row">
    <header>
        <h2 class="entry-title"><?php the_title(); ?></h2>
    </header>

    <div class="small-12 large-8 columns" role="main">

        <?php do_action('bliTheme_before_content'); ?>

        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <?php do_action('bliTheme_post_before_entry_content'); ?>
                <?php get_template_part( 'content', 'events' ); ?>
            </article>
        <?php endwhile;?>
        <?php do_action('bliTheme_after_content'); ?>
    </div>
    <?php get_sidebar('events'); ?>
</div>
<?php get_footer(); ?>

