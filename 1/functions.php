<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );




//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', '1' );
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

/** Add support for custom header **/
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 300 ) );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer'
) );

//*/
 
remove_action ('genesis_entry_header','genesis_post_info');

//footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action ('genesis_footer','my_footer');
function my_footer() {
			echo ('&copy; 2013 shopno2.com - all rights reserved');
}


// Below style included in shopno2-pagebuilder styles plugin

/*
function shopno2_panels_row_styles($styles) {
    $styles['wide-grey'] = __('Wide Grey', 'vantage');
    return $styles;
}
add_filter('siteorigin_panels_row_styles', 'shopno2_panels_row_styles');

