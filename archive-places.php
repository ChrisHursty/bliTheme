<?php get_header(); ?>

<?php 
$places = get_posts( array(
   'post_type'      => 'places', 
   'posts_per_page' => -1
));

if( !empty($places) ): ?>


<div class="acf-map">

  <?php foreach($places as $place): ?>
    <?php
     $location = get_field('place_address',$place->ID);

     if( !empty($location) ): ?>

     <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>

    <?php endif; ?>
  <?php endforeach; ?> 

</div> 

<?php endif; ?>

<div class="row">
<!-- Row for main content area -->
    <div class="small-12 large-12 columns" role="main">
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
    <h1>Stuff...</h1>
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
                            $contact_address = get_field('place_address');
                            ?>
                            <?php $address = explode( "," , $contact_address['address']);
                            echo $address[0]; //street, number
                            ?><br />
                            <?php
                            echo $address[1].','.$address[2]; //city, state + zip
                            ?>
                        
                            <div class="placeNumber">
                                <h6>Phone Number</h6>
                                <?php the_field('place_phone'); ?>    
                            </div>
                            <?php 
                            if( $website = get_field('place_website') ) {
                                ?> 
                                <div class="placeWeb">
                                    <h6>Website</h6>
                                    <a href="<?php the_field('place_website'); ?>" target="_blank">
                                        <?php the_field('place_website'); ?>
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

    </div>
</div>
<?php get_footer(); ?>
