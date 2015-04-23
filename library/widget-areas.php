<?php
if (!function_exists('bliTheme_sidebar_widgets')) :
function bliTheme_sidebar_widgets() {
	register_sidebar(array(
			'id' => 'sidebar-widgets',
			'name' => __('Sidebar Widgets', 'bli-theme'),
			'description' => __('Drag widgets to this sidebar container.', 'bli-theme'),
			'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
			'after_widget' => '</div></article>',
			'before_title' => '<h6>',
			'after_title' => '</h6>'
	));

	register_sidebar(array(
			'id' => 'footer-widgets',
			'name' => __('Footer Widgets', 'bli-theme'),
			'description' => __('Drag widgets to this footer container', 'bli-theme'),
			'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
			'after_widget' => '</article>',
			'before_title' => '<h6>',
			'after_title' => '</h6>'      
	));

	register_sidebar(array(
			'id' => 'homepage-facebook',
			'name' => __('Facebook Homepage', 'bli-theme'),
			'description' => __('Widget Area for Homepage Facebook Feed', 'bli-theme'),     
	));
}

add_action( 'widgets_init', 'bliTheme_sidebar_widgets' );
endif;
?>
