<?php
/*
 * Template Name: wide
 */
?>


<?php 
add_theme_support( 'post-thumbnails' ); 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


genesis();
?>