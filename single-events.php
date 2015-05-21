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
    <div class="small-12 large-12 columns" role="main">
        <div class="row">
            <div class="socialLinks">
                <ul>
                    <li class="facebook"><a href="http://facebook.com/BronxLittleItaly" target="_blank"></a></li>
                    <li class="twitter"><a href="http://twitter.com/BXLittleItaly" target="_blank"></a></li>
                    <li class="instagram"><a href="http://instagram.com/bronxlittleitaly/" target="_blank"></a></li>    
                </ul>
            </div> <!-- /socialLinks -->
            
            <form role="search" method="get" class="bliSearchInput" action="<?php echo home_url( '/' ); ?>">
				<label>
					<input type="search" placeholder="Search Food, Products, Places" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</label>
	            <a href=""><input type="submit" class="bliFormButton" /></a>
			</form> <!-- /bliSearchInput -->
        </div> <!-- /row -->
        <div class="row">
            <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
            } ?>
        </div>

        <header>
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </header>
           
            
    </div>

    <div class="small-12 large-8 columns" role="main">

        <?php do_action('bliTheme_before_content'); ?>

        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <?php do_action('bliTheme_post_before_entry_content'); ?>
                <?php get_template_part( 'content', 'events' ); ?>
            </article>
            <section class="nextPrevLinks">
                <?php
                $next_post = get_next_post();
                $prev_post = get_previous_post();
                ?>
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>">< <?php echo $prev_post->post_title; ?></a> | 
                <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?> ></a>
                
            </section>
        <?php endwhile;?>
        <?php do_action('bliTheme_after_content'); ?>
    </div>
    <?php get_sidebar('events'); ?>
</div>
<?php get_footer(); ?>

