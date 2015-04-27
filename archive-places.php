<?php get_header(); ?>
<div class="row">
<!-- Row for main content area -->
    <div class="small-12 large-12 columns" role="main">
    <?php
    // List All Categories like Breadcrumbs
    $args = array(
      'orderby' => 'name',
      'order' => 'ASC'
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
                <a href="<?php the_permalink(); ?>" class="archiveAnchor">
                    <div class="archiveImg">
                        <?php the_post_thumbnail(); ?>    
                    </div>
                    <div class="archiveText">
                        <div class="archiveTitle">
                            <?php the_title(); ?>    
                        </div>
                        <div class="archiveAddress">
                            <?php 
                                    
                            // Returns the Address from Google Map Place
                            $contact_address = get_field('place_address');
                            ?>
                            <span>Location: </span>
                            <?php $address = explode( ", " , $contact_address['address']);
                            echo $address[0]. ', '; //street, number
                            ?>

                            <?php
                            echo $address[1].', '.$address[2]; //city, state + zip
                            ?>   
                        </div>
    
                    </div>
                </a>
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
