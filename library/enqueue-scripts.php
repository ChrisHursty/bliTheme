<?php

if (!function_exists('bliTheme_scripts')) :
  	function bliTheme_scripts() {

		// Deregister the jquery version bundled with wordpress
		wp_deregister_script( 'jquery' );

		// Modernizr is used for polyfills and feature detection. Must be placed in header. (Not required)
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '2.8.3', false );

		// Fastclick removes the 300ms delay on click events in mobile environments. Must be placed in header. (Not required)
		wp_register_script( 'fastclick', get_template_directory_uri() . '/js/vendor/fastclick.js', array(), '1.0.0', false );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );

		// Self hosted jQuery placed in the footer. (Comment the script above and uncomment the script below if you want to switch).
		//wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '2.1.3', true );

		// If you'd like to cherry-pick the foundation components you need in your project, head over to Gruntfile.js and see lines 67-88
		// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
		wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.js', array('jquery'), '5.5.1', true );

		wp_register_script( 'slickslider', get_template_directory_uri() . '/js/vendor/slick.min.js', array(), '', true );
		wp_register_script( 'customslider', get_template_directory_uri() . '/js/app.js', array(), '', false );


		// Enqueue all registered scripts
		wp_enqueue_script('modernizr');
		wp_enqueue_script('fastclick');
		wp_enqueue_script('jquery');
		wp_enqueue_script('foundation');
		wp_enqueue_script('slickslider');
		wp_enqueue_script('customslider');

	}

  	add_action( 'wp_enqueue_scripts', 'bliTheme_scripts' );
endif;


// Added Google Font - 'Lato'
function bli_load_fonts() {
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,700,400italic);');
	wp_enqueue_style('googleFonts');
}
add_action('wp_print_styles', 'bli_load_fonts');

?>