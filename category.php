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
                <?php the_post_thumbnail(); ?>    
                <?php the_title(); ?>    
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
