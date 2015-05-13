<?php get_header();
/*
Taxonomy Index Page - For Events
*/

?>

<?php 
$markers = get_posts( array(
   'post_type'      => 'events',
   'posts_per_page' => -1
));

if( !empty($markers) ): ?>

<div class="acf-map">
  <?php foreach($markers as $marker): ?>
    <?php
        $location = get_field('event_address',$marker->ID);
        if( !empty($location) ): ?>
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        <?php endif; ?>
  <?php endforeach; ?>
  
</div>

<?php endif; ?>

<div class="row">
<!-- Row for main content area -->
<div class="small-12 large-12 columns merchantCategories" role="main">
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
    <div class="row archiveExcerpt">
        <h1 class="archivePageTitle">Attractions</h1>
        <article>
            <?php get_template_part('parts/events_content'); ?>
            <p>
                <?php

                // Breadcrumb Style Inline List of all Businesses
                $args = array( 'hide_empty=0' );

                $terms = get_terms( 'attractions', $args );
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    $count = count( $terms );
                    $i = 0;
                    $term_list = '<p>';
                    foreach ( $terms as $term ) {
                        $i++;
                        $term_list .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'See All %s', 'bli-theme' ), $term->name ) . '">' . $term->name . '</a>';
                        if ( $count != $i ) {
                            $term_list .= ' &#9656; ';
                        }
                        else {
                            $term_list .= '</p>';
                        }
                    }
                    echo $term_list;
                };
                ?>
            </p>
        </article>
    </div>


    <div class="row">
        <div class="small-12 large-12 columns" role="main">
            <ul class="medium-block-grid-3">
            <?php if ( have_posts() ) : ?>
                    
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                        
                    <li class="archiveBlock">
                        <div class="archiveAnchor">
                            <a href="<?php the_permalink(); ?>">
                                <div class="archiveImg">
                                    <?php the_post_thumbnail(); ?>    
                                </div>
                            </a>
                            <div class="archiveText">
                                <div class="archiveTitle">
                                    <?php the_title(); ?>    
                                </div>
                            
                                <div class="placeAddress">
                                    <h6>Address</h6>
                                    <?php 
                                                            
                                    // Returns the Address from Google Map Place
                                    $contact_address = get_field('event_address');
                                    ?>
                                    <?php $address = explode( "," , $contact_address['address']);
                                    echo $address[0]; //street, number
                                    ?><br />
                                    <?php
                                    echo $address[1].','.$address[2]; //city, state + zip
                                    ?>
                                
                                    <div class="placeNumber">
                                        <h6>Time</h6>
                                        Starts: <?php the_field('event_start_time'); ?> / Ends: <?php the_field('event_end_time'); ?>
                                    </div>
                                    <div class="placeExcerpt">
                                        <p><?php the_field('event_excerpt'); ?></p>
                                    </div>
                                    <?php 
                                    if( $website = get_field('event_website') ) {
                                        ?> 
                                        <div class="placeWeb">
                                            <h6>Website</h6>
                                            <a href="<?php the_field('attraction_website'); ?>" target="_blank">
                                                <?php the_field('event_website'); ?>
                                            </a>
                                        </div>
                                        <?php
                                    }; ?>
                                </div> <!-- /placeAddress -->
                            </div> <!-- /archiveText --> 
                        </div> <!-- /archiveAnchor -->

                    </li>
                <?php endwhile; ?>

            <?php endif; // end have_posts() check ?>
            </ul>


            <?php /* Display navigation to next/previous pages when applicable */ ?>
            <?php if ( function_exists('bliTheme_pagination') ) { bliTheme_pagination(); } else if ( is_paged() ) { ?>
                <nav id="post-nav">
                    <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'bli-theme' ) ); ?></div>
                    <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'bli-theme' ) ); ?></div>
                </nav>
            <?php } ?>

        </div> <!-- small-12 large-12 columns -->
    </div> <!-- /row -->
</div>
<?php get_footer(); ?>