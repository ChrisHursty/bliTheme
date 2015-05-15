<?php
/*
Taxonomy Index Page - For Business Types/Merchants
 */

get_header() ;?>
<div class="featuredImage-small">
    <?php if( is_page('merchants') ) {
        the_post_thumbnail( 'featured-img-sm' );
    } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/assets/default-featured-img.jpg" alt="Bronx Little Italy" />
    } ?>
    <?php } ?>
</div>

<div class="row">
<!-- Row for main content area -->
<div class="small-12 large-12 columns archiveCategories" role="main">
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
        <h1 class="archivePageTitle">Merchants</h1>
        <article>
            <?php get_template_part('parts/merchants_content'); ?>
            <p>
                <?php

                // Breadcrumb Style Inline List of all Businesses
                $args = array( 'hide_empty=0' );

                $terms = get_terms( 'merchants_type', $args );
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
    $terms = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'merchants_type') );
    if ( ! empty( $terms ) ) {
        echo '<ul class="medium-block-grid-3">';
        foreach( (array) $terms as $term ) {
            echo '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'See All %s', 'bli-theme' ), $term->name ) . '">';
            echo '<li class="archiveBlock">' . '<div class="archiveImg taxImg">' . wp_get_attachment_image( $term->image_id, 'taxonomy-thumb' ) . $title_div . $term->name;
            echo '<div class="seeAll"><span>&#9656;</span> See All</div>';
            echo '</div></div>';
        }
        echo '</div></li></ul>';
        echo '</a>';
    }; ?>

</div>

<?php get_footer(); ?>
