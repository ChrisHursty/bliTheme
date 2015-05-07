<?php
 
get_header(); ?>
 
    <div class="row">
        <div class="small-12 large-12 columns" role="main">
            <div class="merchantCategories" role="main">
                <h1>Piss Of you clown</h1>
                <?php
                // List All Categories like Breadcrumbs
                $args = array(
                  'orderby' => 'name',
                  'order'   => 'ASC'
                  );
                $categories = get_categories($args);
                  foreach($categories as $category) { 
                    echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> - '; } 
                ?>
            </div>

            <h3 class="page-title">
                <?php printf( __( '%s', 'bli-theme' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
            </h3>
            <?php /* Start loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="entry-content">
                        <h2><?php the_title(); ?> Boooo!</h2>
                        <div class="row">
                            <div class="small-10 small-offset-1 columns">
                                <?php the_content(); ?>    
                            </div>   
                        </div>
                    </div>

                </article>
            <?php endwhile; // End the loop ?>

        </div><!-- /small-12 large-12 columns -->
    </div><!-- /row -->

<?php get_footer(); ?>