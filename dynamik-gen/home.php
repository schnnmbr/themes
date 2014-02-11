<?php

/**
 * Display either the EZ Static Homepage, a custom home.php page template, if found
 * in /wp-content/uploads/dynamik-gen/, or call to the genesis() Framework function.
 *
 * @package Dynamik
 */
 
if( is_front_page() && dynamik_get_design_alt( 'dynamik_homepage_type' ) == 'static_home' )
{
	get_header();
	?>
	<div id="home-hook-wrap" class="clearfix">
		<?php do_action( 'dynamik_hook_home' ); ?>
	</div><!-- end #home-hook-wrap -->
	<?php
	get_footer();
}
elseif( is_front_page() && file_exists( dynamik_get_stylesheet_location( 'path', $root = true ) . 'home.php' ) )
{
	require_once( dynamik_get_stylesheet_location( 'path', $root = true ) . 'home.php' );
}
else
{
	genesis();
}