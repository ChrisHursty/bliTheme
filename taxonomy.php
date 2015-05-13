<?php
/**
 * Taxonomy index template  
 */

get_header(); ?>

<?php 
$merchants = get_posts( array(
   'post_type'      => 'merchants',
   'posts_per_page' => -1
));

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
            <h1 class="archivePageTitle">
                <?php 
                    $current_merchant = get_queried_object();
                    $taxonomyName = get_taxonomy($current_merchant->taxonomy);
                    echo 'Merchant Type: ' . $current_merchant->name;
                ?>
            </h1>
            <article>
                <p>
                    The neighborhood has an eclectic mix of merchants. Whether you want fresh ground coffee beans or the finest cannoli, we’ve got it all! Have a look around and find out what we mean!

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
        <div class="row">
            <?php
                $current_merchant_type = get_queried_object();
                $taxonomy_type         = get_taxonomy($current_merchant_type->taxonomy);

                if( is_tax('merchants_type', $current_merchant_type) ) {
                    echo $current_merchant_type->name . ' - Show All';
                }

            ?>
            <hr>
               


            <?php
            // Shows image for custom taxonomy (via plugin)
            $tax_terms = get_terms($taxonomy);
            $title_div = '<div class="archiveText"><div class="archiveTitle taxTitle">';
            $terms = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'merchants') );
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
            </ul>
        </div>
        <div class="row">
            <?php

                $post_type = 'merchants';
                $tax = 'merchants_type';
                $tax_terms = get_terms($tax,'hide_empty=0');

                //list everything
                if ($tax_terms) {
                    echo '<ul class="medium-block-grid-3">';
                    foreach ($tax_terms as $tax_term) {
                        $args=array(
                            'post_type'      => $post_type,
                            "$tax"           => $tax_term->slug,
                            //'post_status'  => 'publish',
                            'posts_per_page' => -1
                        );

                        $my_query = null;
                        $my_query = new WP_Query($args);
                        echo '<li>';
                        if( $my_query->have_posts() ) {
                            echo "<h2 class=\"tax_term-heading\" id=\"".$tax_term->slug."\"> $tax_term->name </h2>";
                            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                            <?php
                            endwhile;
                            echo "<p><a href=\"#top\">Back to top</a></p>";
                        }
                        echo '</li>';
                        wp_reset_query();
                    }
                }

            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
