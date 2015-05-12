<?php  
/*
Custom Taxonomies for Bronx Little Italy Post Types
*/


/*_____________________________________________________

-------------Register Custom Post Types----------------
_______________________________________________________*/

function bli_custom_post_type() {

    // Merchants Post Type
    $labels = array(
        'name'               => _x( 'Merchants', 'post type general name' ),
        'singular_name'      => _x( 'Merchant', 'post type singular name' ),
        'menu_name'          => _x( 'Merchants', 'admin menu' ),
        'name_admin_bar'     => _x( 'Merchants', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Merchants' ),
        'add_new_item'       => __( 'Add New Merchants' ),
        'new_item'           => __( 'New Merchants' ),
        'edit_item'          => __( 'Edit Merchants' ),
        'view_item'          => __( 'View Merchants' ),
        'all_items'          => __( 'All Merchants' ),
        'search_items'       => __( 'Search Merchants' ),
        'parent_item_colon'  => __( 'Parent Merchants:' ),
        'not_found'          => __( 'No merchants found.' ),
        'not_found_in_trash' => __( 'No merchants found in Trash.' ),
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
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'merchants', $args );

    // Attractions Post Type
    $labels = array(
        'name'               => _x( 'Attractions', 'post type general name' ),
        'singular_name'      => _x( 'Attraction', 'post type singular name' ),
        'menu_name'          => _x( 'Attractions', 'admin menu' ),
        'name_admin_bar'     => _x( 'Attractions', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Attractions' ),
        'add_new_item'       => __( 'Add New Attractions' ),
        'new_item'           => __( 'New Attractions' ),
        'edit_item'          => __( 'Edit Attractions' ),
        'view_item'          => __( 'View Attractions' ),
        'all_items'          => __( 'All Attractions' ),
        'search_items'       => __( 'Search Attractions' ),
        'parent_item_colon'  => __( 'Parent Attractions:' ),
        'not_found'          => __( 'No attractions found.' ),
        'not_found_in_trash' => __( 'No attractions found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-tickets-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'attractions' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'attractions', $args );

    // Events Post Type
    $labels = array(
        'name'               => _x( 'Events', 'post type general name' ),
        'singular_name'      => _x( 'Event', 'post type singular name' ),
        'menu_name'          => _x( 'Events', 'admin menu' ),
        'name_admin_bar'     => _x( 'Events', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Events' ),
        'add_new_item'       => __( 'Add New Events' ),
        'new_item'           => __( 'New Events' ),
        'edit_item'          => __( 'Edit Events' ),
        'view_item'          => __( 'View Events' ),
        'all_items'          => __( 'All Events' ),
        'search_items'       => __( 'Search Events' ),
        'parent_item_colon'  => __( 'Parent Events:' ),
        'not_found'          => __( 'No events found.' ),
        'not_found_in_trash' => __( 'No events found in Trash.' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-calendar-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'events' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
    );

    register_post_type( 'events', $args );

}
add_action('init', 'bli_custom_post_type' );


// Flush rewrite rules to add "review" as a permalink slug
function bli_rewrite_flush() {
    bli_custom_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'bli_rewrite_flush' );


/*_____________________________________________________

---Custom Taxonomies - with Rewrite slug same as CPT---
_______________________________________________________*/

/**
 * bli_custom_taxonomies function. Creates Type of Merchants Taxonomy for taggin merchants & events.
 * 
 * @access public
 * @return void
 */
function bli_custom_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Types of Merchants', 'taxonomy general name' ),
        'singular_name'     => _x( 'Types of Merchant', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Type of Merchants' ),
        'all_items'         => __( 'All Types of Merchants' ),
        'parent_item'       => __( 'Parent Types of Merchants' ),
        'parent_item_colon' => __( 'Parent Types of Merchants:' ),
        'edit_item'         => __( 'Edit Type of Merchants' ),
        'update_item'       => __( 'Update Type of Merchants' ),
        'add_new_item'      => __( 'Add New Type of Merchants' ),
        'new_item_name'     => __( 'New Type of Merchants Name' ),
        'menu_name'         => __( 'Type of Merchants' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'merchants' ),
    );

    register_taxonomy( 'merchants_type', array( 'merchants' ), $args );

    // Taxonomy for Events (Non-Heirachical)
    $labels = array(
        'name'              => _x( 'Types of Events', 'taxonomy general name' ),
        'singular_name'     => _x( 'Types of Event', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Type of Merchants' ),
        'all_items'         => __( 'All Types of Events' ),
        'parent_item'       => __( 'Parent Types of Events' ),
        'parent_item_colon' => __( 'Parent Types of Events:' ),
        'edit_item'         => __( 'Edit Type of Events' ),
        'update_item'       => __( 'Update Type of Events' ),
        'add_new_item'      => __( 'Add New Type of Events' ),
        'new_item_name'     => __( 'New Type of Events Name' ),
        'menu_name'         => __( 'Type of Events' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'events' ),
    );

    register_taxonomy( 'events_type', array( 'events' ), $args );
}
add_action( 'init', 'bli_custom_taxonomies', 0 );



/*_____________________________________________________

-----Register Custom Post Type for Home Page Slider-----
_______________________________________________________*/

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
