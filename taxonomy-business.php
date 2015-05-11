<?php get_header();
/*
Taxonomy Index Page - For Business Types/Merchants
 */

?>

<?php 
$merchants = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'business',
            'field'    => 'slug',
        ),
    ),
);

if( !empty($merchants) ): ?>

<div class="acf-map">
  <?php foreach($merchants as $merchant): ?>
    <?php
        $location = get_field('merchant_address',$merchant->ID);
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

        <div class="bliSearchInput">
            <input type="text" placeholder="Search Food, Products, Places" />
            <div class="bliFormButton">
                <a href=""><img src="../assets/png/circle-right.png" alt="Search Food, Products, Places"></a>
            </div>  
        </div> <!-- /bliSearchInput -->
    </div> <!-- /row -->
    <div class="row archiveExcerpt">
        <h1 class="archivePageTitle">Merchants</h1>
        <article>
            <p>
                The neighborhood has an eclectic mix of merchants. Whether you want fresh ground coffee beans or the finest cannoli, we’ve got it all! Have a look around and find out what we mean!
            </p>
            <p>
                <?php

                // Breadcrumb Style Inline List of all Businesses
                $args = array( 'hide_empty=0' );

                $terms = get_terms( 'business', $args );
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

    <?php
    // Shows image for custom taxonomy (via plugin)
    $tax_terms = get_terms($taxonomy);
    $title_div = '<div class="archiveText"><div class="archiveTitle taxTitle">';
    $terms = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'business') );
    if ( ! empty( $terms ) ) {
        echo '<ul class="medium-block-grid-3">';
        foreach( (array) $terms as $term ) {
            echo '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'See All %s', 'bli-theme' ), $term->name ) . '">';
            echo '<li class="archiveBlock">' . '<div class="archiveImg taxImg">' . wp_get_attachment_image( $term->image_id, 'taxonomy-thumb' ) . $title_div . $term->name;
            get_template_part('parts/see_all_taxonomy');
            echo '<div class="seeAll"><span>&#9656;</span> See All</div>';
            echo '</div></div>';
        }
        echo '</div></li></ul>';
        echo '</a>';
    }; ?>

</div>

<?php get_footer(); ?>