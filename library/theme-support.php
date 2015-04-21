<?php

if (!function_exists('bliTheme_theme_support')) :
function bliTheme_theme_support() {
    // Add language support
    load_theme_textdomain('bli-theme', get_template_directory() . '/languages');

    // Add menu support
    add_theme_support('menus');

    // Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);

    // rss thingy
    add_theme_support('automatic-feed-links');

    // Add post formarts support: http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

}

add_action('after_setup_theme', 'bliTheme_theme_support'); 
endif;

/* ------------------------------------------
        
    Move wpautop filter to AFTER shortcode is processed

-------------------------------------------*/

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );


/* ------------------------------------------
        
            BLI Theme Thumbnails 

-------------------------------------------*/

add_theme_support( 'post-thumbnails' ); 

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'single-post-thumb', 793, 309, true ); // (cropped)
    add_image_size( 'featured-img', 1800, 375, true ); // (cropped)
    add_image_size( 'gallery', 300, 200, true ); // (cropped)
    //add_image_size( 'small', 128, 128, true ); // (cropped)
    //add_image_size( 'large', 500, 500, true ); // (cropped)
}


?>