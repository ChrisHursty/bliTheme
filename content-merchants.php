<?php
/**
 * @package bliTheme
 */
?>
    

<?php 

$args = array ( 
    'post_type' => 'merchants', 
    'tax_query' => array ( 
        'taxonomy' => 'business', 
        'field' => 'slug', 
        'terms' => 'delicatessens' 
    ), 
    'order_by' => 'title',
    'order' => 'DES' 
);

$me_query = new WP_Query ( $args );
while ( $me_query -> have_posts () ) {
    $me_query -> the_post();
    echo get_permalink($post->ID) . ', ' . '<br>';
}


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

    <div class="entry-content">
        <h1>Single Merchant Content</h1>
        <div class="taxonomies">
            <div class="businessType">
                <?php echo get_the_term_list( $post->ID, 'business', 'Type of Merchants: ', ', ', ''); ?>
            </div>
        </div>

        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'bli-theme' ), 
                'after'  => '</div>',
            ) );
        ?>
        <?php the_content(__('Continue reading...', 'bli-theme')); ?>
    </div>
    <footer>
        <?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
    </footer>
    <hr /> 
</article><!-- #post-## -->
