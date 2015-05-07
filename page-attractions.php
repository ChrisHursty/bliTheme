<?php get_header(); ?>

<?php 
$attractions = get_posts( array(
   'post_type'      => 'attractions', 
   'posts_per_page' => -1
));

if( !empty($attractions) ): ?>


<div class="acf-map">

  <?php foreach($attractions as $attraction): ?>
    <?php
        $location = get_field('attraction_address',$attraction->ID);

        if( !empty($location) ): ?>

        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>

        <?php endif; ?>
  <?php endforeach; ?> 

</div> 

<?php endif; ?>

<div class="row">
<!-- Row for main content area -->
    <div class="small-12 large-12 columns merchantCategories" role="main">
    <?php
    // List All Categories like Breadcrumbs
    $args = array(
      'orderby' => 'name',
      'order'   => 'ASC'
      );
    $categories = get_categories($args);
      foreach($categories as $category) { 
        echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>,  '; } 
    ?>
    
    <?php
    // Shows image for custom taxonomy
    $tax_terms = get_terms($taxonomy);
    $title_div = '<div class="archiveText"><div class="archiveTitle taxTitle">';
    $terms = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'attractions') );
    if ( ! empty( $terms ) ) {
        echo '<ul class="medium-block-grid-3">';
        foreach( (array) $terms as $term ) {
            echo '<li class="archiveBlock">' . '<div class="archiveImg taxImg">' . wp_get_attachment_image( $term->image_id, 'taxonomy-thumb' ) . $title_div . $term->name;
            get_template_part('parts/see_all_taxonomy');
            echo '<div class="seeAll"><span>&#9656;</span> See All</div>';
            echo '</div></div>';
        }
        echo '</div></li></ul>';
    }; ?>

    </div>

    <div class="small-12 large-12 columns" role="main">

    <ul class="medium-block-grid-3">
        <?php $loop = new WP_Query( array( 
            'post_type'      => 'attractions', 
            'posts_per_page' => -1
        ));
        ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                
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
                        $contact_address = get_field('attraction_address');
                        ?>
                        <?php $address = explode( "," , $contact_address['address']);
                        echo $address[0]; //street, number
                        ?><br />
                        <?php
                        echo $address[1].','.$address[2]; //city, state + zip
                        ?>
                    
                        <div class="placeNumber">
                            <h6>Phone Number</h6>
                            <?php the_field('attraction_phone'); ?>    
                        </div>
                        <?php 
                        if( $website = get_field('attraction_website') ) {
                            ?> 
                            <div class="placeWeb">
                                <h6>Website</h6>
                                <a href="<?php the_field('attraction_website'); ?>" target="_blank">
                                    <?php the_field('attraction_website'); ?>
                                </a>  
                            </div>
                            <?php
                        }; ?>
                    </div> <!-- /placeAddress -->
                </div> <!-- /archiveText --> 
            </div> <!-- /archiveAnchor -->
        </li>
        <?php endwhile; ?>
    </ul>


    <?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php if ( function_exists('bliTheme_pagination') ) { bliTheme_pagination(); } else if ( is_paged() ) { ?>
        <nav id="post-nav">
            <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'bli-theme' ) ); ?></div>
            <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'bli-theme' ) ); ?></div>
        </nav>
    <?php } ?>

    </div>
</div>
<?php get_footer(); ?>
