<?php  
/*
Custom Taxonomies for Bronx Little Italy Post Types
*/
function bli_custom_post_type() {

    // Merchants Post Type
    $labels = array(
        'name'               => 'Merchants',
        'singular_name'      => 'Merchant',
        'menu_name'          => 'Merchants',
        'name_admin_bar'     => 'Merchant',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Merchant',
        'new_item'           => 'New Merchant',
        'edit_item'          => 'Edit Merchant',
        'view_item'          => 'View Merchant',
        'all_items'          => 'All Merchants',
        'search_items'       => 'Search Merchants',
        'parent_item_colon'  => 'Parent Merchants:',
        'not_found'          => 'No Merchants found.',
        'not_found_in_trash' => 'No Merchants found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-id-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'merchants' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'         => array( 'post_tag' )
    );
    register_post_type( 'merchants', $args );


    // Attractions Post Type
    $labels = array(
        'name'               => 'Attractions',
        'singular_name'      => 'Attraction',
        'menu_name'          => 'Attractions',
        'name_admin_bar'     => 'Attraction',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Attraction',
        'new_item'           => 'New Attraction',
        'edit_item'          => 'Edit Attraction',
        'view_item'          => 'View Attraction',
        'all_items'          => 'All Attractions',
        'search_items'       => 'Search Attractions',
        'parent_item_colon'  => 'Parent Attractions:',
        'not_found'          => 'No attractions found.',
        'not_found_in_trash' => 'No attractions found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'attractions' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-tickets-alt',
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'attractions', $args );

}
add_action('init', 'bli_custom_post_type' );


// Flush rewrite rules to add "review" as a permalink slug
function bli_rewrite_flush() {
    bli_custom_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'bli_rewrite_flush' );





// Custom Taxonomies
function bli_custom_taxonomies() {
    // Type of Merchant
    $labels = array(
        'name'              => 'Business Types',
        'singular_name'     => 'Business Type',
        'search_items'      => 'Search Business Types',
        'all_items'         => 'All Business Types',
        'parent_item'       => 'Parent Business Type',
        'parent_item_colon' => 'Parent Business Type:',
        'edit_item'         => 'Edit Business Type',
        'update_item'       => 'Update Business Type',
        'add_new_item'      => 'Add New Business Type',
        'new_item_name'     => 'New Business Type Name',
        'menu_name'         => 'Business Type',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'business' ),
    );
    register_taxonomy( 'business', array( 'merchants' ), $args );

}
add_action( 'init', 'bli_custom_taxonomies' );





// Register Custom Post Type for Home Page Slider
function bli_homeSlider() {
    $labels = array(
        'name'              => _x( 'Slides', 'post type general name' ),
        'singular_name'     => _x( 'Slide', 'post type singular name' ),
        'add_new'           => __( 'Add New Slide' ),
        'add_new_item'      => __( 'Add New Slide' ),
        'edit_item'         => __( 'Edit Slide' ),
        'new_item'          => __( 'New Slide' ),
        'view_item'         => __( 'View Slide' ),
        'search_items'      => __( 'Search Slides' ),
        'not_found'         => __( 'Slide' ),
        'not_found_in_trash'=> __( 'Slide' ),
        'parent_item_colon' => __( 'Slide' ),
        'menu_name'         => __( 'Slides' )
    );
    
    $taxonomies = array();
    
    $supports = array('title','thumbnail');
    
    $post_type_args = array(
        'labels'            => $labels,
        'singular_label'    => __('Slide'),
        'public'            => true,
        'show_ui'           => true,
        'publicly_queryable'=> true,
        'query_var'         => true,
        'capability_type'   => 'post',
        'has_archive'       => false,
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'slides', 'with_front' => false ),
        'supports'          => $supports,
        'menu_position'     => 10,
        'menu_icon'         => 'dashicons-images-alt2',
        'taxonomies'        => $taxonomies
     );
     register_post_type('slides',$post_type_args);
}
add_action('init', 'bli_homeSlider');


?>
