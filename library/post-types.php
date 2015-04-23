<?php  
/*
Custom Taxonomies for Bronx Little Italy Post Types
*/

// Register Custom Post Type
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
        'edit_item'           => __( 'Edit Places', 'bli-theme' ),
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
        'supports'            => array( 'title', 'custom-fields', 'thumbnail' ),
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
        'supports'            => array( 'custom-fields', ),
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


?>
