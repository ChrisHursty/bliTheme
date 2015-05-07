<?php
 
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
        <div class="small-12 large-12 columns" role="main">
            <div class="merchantCategories" role="main">
                <h1>This is the Category-Butcher Template</h1>

            </div>
                <div class="row">



                    <?php
                    add_action('restrict_manage_posts','my_restrict_manage_posts');

                            function my_restrict_manage_posts() {
                                global $typenow;

                                if ($typenow=='your_custom_post_type'){
                                             $args = array(
                                                 'show_option_all' => "Show All Categories",
                                                 'taxonomy'        => 'butchers',
                                                 'name'            => 'butchers'

                                             );
                                    wp_dropdown_categories($args);
                                            }
                            }
                    add_action( 'request', 'my_request' );
                    function my_request($request) {
                        if (is_admin() && $GLOBALS['PHP_SELF'] == '/wp-admin/edit.php' && isset($request['post_type']) && $request['post_type']=='butchers') {
                            $request['term'] = get_term($request['butchers'],'butchers')->name;

                        }
                        return $request;
                    }
                    ;?>




                    
                </div>
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