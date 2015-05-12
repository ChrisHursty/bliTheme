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
a<li class="instagram"><a href="http://instagram.com/bronxlittleitaly/" target="_blank"></a></li>    
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
            <section>
                <h1>Hello: <?php get_page_template_slug( $post->ID ); ?></h1>
                <?php
                // $bli_slug = 
                // $bli_category_tax = get_queried_object()->name;
                // if($tax_term->name == 'Butchers') {
                //     echo '<h1>Hello World</h1>';
                // }
                $args = array(
                    'post_type' => 'merchants',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'merchants_type',
                            'field'    => 'slug',
                            'terms'    => array( 'butchers', 'bakers' ),
                        ),
                        array(
                            'taxonomy' => 'merchants_type',
                            'field'    => 'term_id',
                            'terms'    => array( 'delicatessens', 'fish-markets' ),
                            'operator' => 'NOT IN',
                        ),
                    ),
                );
                $query = new WP_Query( $args );
                    
                ?>
            </section>
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
                </p>
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
        <div class="row">
            <?php
            $post_type = 'merchants';
            $tax = 'merchants_type';
            $tax_terms = get_terms($tax,'hide_empty=0');

            

            //list everything
            if ($tax_terms) {
              foreach ($tax_terms as $tax_term) {
                $args=array(
                      'post_type' => $post_type,
                      "$tax" => $tax_term->slug,
                      'post_status' => 'publish',
                      'posts_per_page' => -1
                    );

                    $my_query = null;
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                      echo "<h2 class=\"tax_term-heading\" id=\"".$tax_term->slug."\"> $tax_term->name </h2>";
                      while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                        <?php
                      endwhile;
                      echo "<p><a href=\"#top\">Back to top</a></p>";
                    }
                    wp_reset_query();
                }
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
