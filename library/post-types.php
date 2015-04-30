<?php  
/*
Custom Taxonomies for Bronx Little Italy Post Types
*/

// Register Custom Post Type for Places/Merchants
function bli_places_custom_post_type() {

    $labels = array(
        'name'                => _x( 'Places', 'Post Type General Name', 'bli-theme' ),
        'singular_name'       => _x( 'Place', 'Post Type Singular Name', 'bli-theme' ),
        'menu_name'           => __( 'Places', 'bli-theme' ),
        'name_admin_bar'      => __( 'Places', 'bli-theme' ),
        'parent_item_colon'   => __( 'Parent Place:', 'bli-theme' ),
        'all_items'           => __( 'All Places', 'bli-theme' ),
        'add_new_item'        => __( 'Add New Place', 'bli-theme' ),
        'add_new'             => __( 'Add New', 'bli-theme' ),
        'new_item'            => __( 'New Place', 'bli-theme' ),
        'edit_item'           => __( 'Edit Place', 'bli-theme' ),
        'update_item'         => __( 'Update Places', 'bli-theme' ),
        'view_item'           => __( 'View Place', 'bli-theme' ),
        'search_items'        => __( 'Search Place', 'bli-theme' ),
        'not_found'           => __( 'Not found', 'bli-theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bli-theme' ),
    );
    $args = array(
        'label'               => __( 'places', 'bli-theme' ),
        'description'         => __( 'Places', 'bli-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-site',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'places', $args );

}

// Hook into the 'init' action
add_action( 'init', 'bli_places_custom_post_type', 0 );


// Register Custom Post Type for Home Page Sponsors
function bli_sponsors() {

    $labels = array(
        'name'                => _x( 'Sponsors', 'Post Type General Name', 'bli-theme' ),
        'singular_name'       => _x( 'Sponsor', 'Post Type Singular Name', 'bli-theme' ),
        'menu_name'           => __( 'Sponsors', 'bli-theme' ),
        'name_admin_bar'      => __( 'Sponsor', 'bli-theme' ),
        'parent_item_colon'   => __( 'Parent Item:', 'bli-theme' ),
        'all_items'           => __( 'All Sponsors', 'bli-theme' ),
        'add_new_item'        => __( 'Add New Sponsor', 'bli-theme' ),
        'add_new'             => __( 'Add New', 'bli-theme' ),
        'new_item'            => __( 'New Sponsor', 'bli-theme' ),
        'edit_item'           => __( 'Edit Sponsor', 'bli-theme' ),
        'update_item'         => __( 'Update Sponsor', 'bli-theme' ),
        'view_item'           => __( 'View Sponsor', 'bli-theme' ),
        'search_items'        => __( 'Search Sponsors', 'bli-theme' ),
        'not_found'           => __( 'Not found', 'bli-theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bli-theme' ),
    );
    $args = array(
        'label'               => __( 'sponsor', 'bli-theme' ),
        'description'         => __( 'Home Page Sponsors Section', 'bli-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'custom-fields', ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-shield',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'sponsor', $args );

}

// Hook into the 'init' action
add_action( 'init', 'bli_sponsors', 0 );


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
        'menu_position'     => 6,
        'menu_icon'         => 'dashicons-images-alt2',
        'taxonomies'        => $taxonomies
     );
     register_post_type('slides',$post_type_args);
}
add_action('init', 'bli_homeSlider');
  

?>
