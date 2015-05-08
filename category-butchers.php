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
            <div class="merchantCategories archiveExcerpt" role="main">
                <h1 class="archivePageTitle">Butchers</h1>
            </div>
            <div class="row">
                <?php
                    $merchant_list = get_the_category_list( __( ', ', 'bli-theme') );
                    echo '<div>' . $merchant_list . '</div>';
                ?>
                <?php
                $title_div = '<div class="archiveText"><div class="archiveTitle taxTitle">';
                $args = array(
                    'post_type' => 'merchants',
                    'tax_name'    => 'merchants_taxonomy',
                    'posts_per_page' => -1
                );
                $loop = new WP_Query( $args );
                echo '<ul class="medium-block-grid-3">';
                while ( $loop->have_posts() ) : $loop->the_post();
                    echo '<li class="archiveBlock">' . '<div class="archiveImg taxImg">' . $title_div . $term->name;
                        the_title();

                    echo '<div class="seeAll"><span>&#9656;</span> See All</div>';
                    echo '</div></div>';
                    echo '</div></li>';
                endwhile;
                echo '</ul>';
                ?>
                </ul>
            </div>
               

        </div><!-- /small-12 large-12 columns -->
    </div><!-- /row -->

<?php get_footer(); ?>