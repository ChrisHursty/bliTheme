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



?>
