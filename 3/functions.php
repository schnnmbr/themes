<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', '2' );
define( 'CHILD_THEME_URL', 'http://www.shopno2.com/' );
define( 'CHILD_THEME_VERSION', '2.0.0' );

//* Enqueue Lato Google font
//add_action( 'wp_enqueue_scripts', 'shopno2_google_fonts' );
//function shopno2_google_fonts() {
//	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
//}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

// 1-1
	register_sidebar( array(
		'name' => __( '1-1', 'shopno2' ),
		'id' => 'area-0',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'shopno2' ),
		'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

add_action( 'genesis_before_content', 'shopno2_do_sidebar' );

function shopno2_do_sidebar() {
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( '1-1' ) ) {
}
}