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
    add_image_size( 'featured-img-small', 1800, 300, true ); // (cropped)
    add_image_size( 'homeSlider', 1800, 375, true); // (Not cropped)
    add_image_size( 'gallery', 300, 200, false ); // (Not cropped)
    add_image_size( 'media-block', 320, 220, true); // (cropped)
    add_image_size( 'sponsor', 600, 400, true); // (cropped)
}


/* ------------------------------------------
        
        Add Open Graph to wp_head()

-------------------------------------------*/


function open_graph_socials() { ?>
    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
    <!-- the default values -->
    <meta property="fb:app_id" content="1588498188059102" />
    <meta property="fb:admins" content="620420376" />
     
    <!-- if page is content page -->
    <?php if (is_single()) { ?>
    <meta property="og:url" content="<?php the_permalink() ?>"/>
    <meta property="og:title" content="<?php single_post_title(''); ?>" />
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
     
    <!-- if page is others -->
    <?php } else { ?>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="/wp-content/themes/bli-wp-theme/assets/logo.jpg" /> <?php } ?>
<?php }
add_action( 'wp_head', 'open_graph_socials' );


/* ------------------------------------------
        
                Custom Login

-------------------------------------------*/
function bli_login_logo() { ?>
    <style type="text/css">
        .login h1 {
            width: 100%;
            background-color: #fff;
            background-position: 50%;
            padding-top: 10px;
            box-shadow        : 0 1px 1px 0 rgba(0, 0, 0, .1);
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/logo.jpg);
            background-size: 100%;
            width: 185px;
            height: 131px;
            padding-bottom: 10px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'bli_login_logo' );

function bli_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'bli_login_logo_url' );

function bli_login_logo_url_title() {
    return 'Bronx Little Italy | New York\'s Favorite Italian Neighborhood';
}
add_filter( 'login_headertitle', 'bli_login_logo_url_title' );


?>