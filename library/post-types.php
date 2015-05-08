<?php  
/*
Custom Taxonomies for Bronx Little Italy Post Types
*/

// Register Custom Post Type for Merchants
function bli_merchants_custom_post_type() {

    $labels = array(
        'name'                => _x( 'Merchants', 'Post Type General Name', 'bli-theme' ),
        'singular_name'       => _x( 'Merchant', 'Post Type Singular Name', 'bli-theme' ),
        'menu_name'           => __( 'Merchants', 'bli-theme' ),
        'name_admin_bar'      => __( 'Merchants', 'bli-theme' ),
        'parent_item_colon'   => __( 'Parent Merchant:', 'bli-theme' ),
        'all_items'           => __( 'All Merchants', 'bli-theme' ),
        'add_new_item'        => __( 'Add New Merchant', 'bli-theme' ),
        'add_new'             => __( 'Add New', 'bli-theme' ),
        'new_item'            => __( 'New Merchant', 'bli-theme' ),
        'edit_item'           => __( 'Edit Merchant', 'bli-theme' ),
        'update_item'         => __( 'Update Merchants', 'bli-theme' ),
        'view_item'           => __( 'View Merchant', 'bli-theme' ),
        'search_items'        => __( 'Search Merchant', 'bli-theme' ),
        'not_found'           => __( 'Not found', 'bli-theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bli-theme' ),
    );
    $args = array(
        'label'               => __( 'merchants', 'bli-theme' ),
        'description'         => __( 'Merchants', 'bli-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'          => array( 'merchants', 'post_tag' ),
        'hierarchical'        => true,
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
    register_post_type( 'merchants', $args );

}

// Hook into the 'init' action
add_action( 'init', 'bli_merchants_custom_post_type', 0 );


// Register Custom Taxonomy for Merchants
function merchants_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Type of Merchants', 'Taxonomy General Name', 'bli-theme' ),
        'singular_name'              => _x( 'Type of Merchant', 'Taxonomy Singular Name', 'bli-theme' ),
        'menu_name'                  => __( 'Types of Merchants', 'bli-theme' ),
        'all_items'                  => __( 'All Types of Merchants', 'bli-theme' ),
        'parent_item'                => __( 'Parent Item', 'bli-theme' ),
        'parent_item_colon'          => __( 'Parent Item:', 'bli-theme' ),
        'new_item_name'              => __( 'New Merchant Type Name', 'bli-theme' ),
        'add_new_item'               => __( 'Add New Merchant Type', 'bli-theme' ),
        'edit_item'                  => __( 'Edit Merchant Type', 'bli-theme' ),
        'update_item'                => __( 'Update Merchant Type', 'bli-theme' ),
        'view_item'                  => __( 'View Merchant Type', 'bli-theme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'bli-theme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'bli-theme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'bli-theme' ),
        'popular_items'              => __( 'Popular Items', 'bli-theme' ),
        'search_items'               => __( 'Search Items', 'bli-theme' ),
        'not_found'                  => __( 'Not Found', 'bli-theme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'query_var'                  => 'merchants',
    );
    register_taxonomy( 'merchants', array( 'merchants', ' post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'merchants_taxonomy', 0 );


// Register Custom Post Type for Attractions
function bli_attractions_custom_post_type() {

    $labels = array(
        'name'                => _x( 'Attractions', 'Post Type General Name', 'bli-theme' ),
        'singular_name'       => _x( 'Attraction', 'Post Type Singular Name', 'bli-theme' ),
        'menu_name'           => __( 'Attractions', 'bli-theme' ),
        'name_admin_bar'      => __( 'Attractions', 'bli-theme' ),
        'parent_item_colon'   => __( 'Parent Attraction:', 'bli-theme' ),
        'all_items'           => __( 'All Attractions', 'bli-theme' ),
        'add_new_item'        => __( 'Add New Attraction', 'bli-theme' ),
        'add_new'             => __( 'Add New', 'bli-theme' ),
        'new_item'            => __( 'New Attraction', 'bli-theme' ),
        'edit_item'           => __( 'Edit Attraction', 'bli-theme' ),
        'update_item'         => __( 'Update Attractions', 'bli-theme' ),
        'view_item'           => __( 'View Attraction', 'bli-theme' ),
        'search_items'        => __( 'Search Attraction', 'bli-theme' ),
        'not_found'           => __( 'Not found', 'bli-theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bli-theme' ),
    );
    $args = array(
        'label'               => __( 'attractions', 'bli-theme' ),
        'description'         => __( 'Attractions', 'bli-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-star-empty',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'attractions', $args );

}

// Hook into the 'init' action
add_action( 'init', 'bli_attractions_custom_post_type', 0 );


// Register Custom Taxonomy for Attractions
function attractions_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Type of Attractions', 'Taxonomy General Name', 'bli-theme' ),
        'singular_name'              => _x( 'Type of Attraction', 'Taxonomy Singular Name', 'bli-theme' ),
        'menu_name'                  => __( 'Types of Attractions', 'bli-theme' ),
        'all_items'                  => __( 'All Attractions Types', 'bli-theme' ),
        'parent_item'                => __( 'Parent Item', 'bli-theme' ),
        'parent_item_colon'          => __( 'Parent Item:', 'bli-theme' ),
        'new_item_name'              => __( 'New Attraction Type', 'bli-theme' ),
        'add_new_item'               => __( 'Add New Attraction Type', 'bli-theme' ),
        'edit_item'                  => __( 'Edit Attraction Type', 'bli-theme' ),
        'update_item'                => __( 'Update Attraction Type', 'bli-theme' ),
        'view_item'                  => __( 'View Attraction Type', 'bli-theme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'bli-theme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'bli-theme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'bli-theme' ),
        'popular_items'              => __( 'Popular Items', 'bli-theme' ),
        'search_items'               => __( 'Search Items', 'bli-theme' ),
        'not_found'                  => __( 'Not Found', 'bli-theme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'query_var'                  => 'attractions',
    );
    register_taxonomy( 'attractions', array( 'attractions', ' post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'attractions_taxonomy', 0 );


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


// Register Custom Post Type for Events
function bli_event_post_type() {

    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'bli-theme' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'bli-theme' ),
        'menu_name'           => __( 'Events', 'bli-theme' ),
        'name_admin_bar'      => __( 'Events', 'bli-theme' ),
        'parent_item_colon'   => __( 'Parent Item:', 'bli-theme' ),
        'all_items'           => __( 'All Events', 'bli-theme' ),
        'add_new_item'        => __( 'Add New Event', 'bli-theme' ),
        'add_new'             => __( 'Add New', 'bli-theme' ),
        'new_item'            => __( 'New Event', 'bli-theme' ),
        'edit_item'           => __( 'Edit Event', 'bli-theme' ),
        'update_item'         => __( 'Update Event', 'bli-theme' ),
        'view_item'           => __( 'View Event', 'bli-theme' ),
        'search_items'        => __( 'Search Event', 'bli-theme' ),
        'not_found'           => __( 'Not found', 'bli-theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bli-theme' ),
    );
    $rewrite = array(
        'slug'                => 'event',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'event_post_type', 'bli-theme' ),
        'description'         => __( 'Event Post Type', 'bli-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
        'taxonomies'          => array( 'event_type', 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-calendar-alt',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'page',
    );
    register_post_type( 'event_post_type', $args );

}

// Hook into the 'init' action
add_action( 'init', 'bli_event_post_type', 0 );


// Register Custom Taxonomy for Events
function bli_event_category_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Event Category', 'Taxonomy General Name', 'bli-theme' ),
        'singular_name'              => _x( 'Event Category', 'Taxonomy Singular Name', 'bli-theme' ),
        'menu_name'                  => __( 'Event Category', 'bli-theme' ),
        'all_items'                  => __( 'All Event Categories', 'bli-theme' ),
        'parent_item'                => __( 'Parent Event Category', 'bli-theme' ),
        'parent_item_colon'          => __( 'Parent Category:', 'bli-theme' ),
        'new_item_name'              => __( 'New Event Category Name', 'bli-theme' ),
        'add_new_item'               => __( 'Add Event Category', 'bli-theme' ),
        'edit_item'                  => __( 'Edit Event Category', 'bli-theme' ),
        'update_item'                => __( 'Update Event Category', 'bli-theme' ),
        'view_item'                  => __( 'View Event Category', 'bli-theme' ),
        'separate_items_with_commas' => __( 'Separate Event Categories with commas', 'bli-theme' ),
        'add_or_remove_items'        => __( 'Add or remove Event Categories', 'bli-theme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'bli-theme' ),
        'popular_items'              => __( 'Popular Event Categories', 'bli-theme' ),
        'search_items'               => __( 'Search Event Categories', 'bli-theme' ),
        'not_found'                  => __( 'Not Found', 'bli-theme' ),
    );
    $rewrite = array(
        'slug'                       => 'event_category',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
        'query_var'                  => 'event_category',
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'event_category', array( 'event_post_type', 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'bli_event_category_taxonomy', 0 );



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
