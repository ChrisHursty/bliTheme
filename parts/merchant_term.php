

<div class="small-12 large-12 columns" role="main">

    <ul class="medium-block-grid-3">
        <?php
        $current_merchant_type = get_queried_object();
        $taxonomy_type         = get_taxonomy($current_merchant_type->taxonomy);
        $merchant_term         = 'butchers';
        $loop = new WP_Query(array(
            'post_type'         =>  'merchants', // name of CPT
            'tax_query' => array( 
                array(
                    'taxonomy' => 'merchants_type', // taxonomy name              
                    'field'    => 'slug',                   
                    'terms'    => array( $merchant_term ), // taxonomy term
                )
            ),
            'posts_per_page' =>  -1, 
            'order'          =>  'ASC',
            'orderby'        =>  'title'
        ));
        ?>
        <?php get_template_part('parts/custom_loop'); ?>
    </ul>