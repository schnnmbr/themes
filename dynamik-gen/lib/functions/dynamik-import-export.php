<?php
/**
 * Handels all the Import/Export functionality in Dynamik
 * and the Dynamik Child Theme.
 *
 * @package Dynamik
 */
 
/**
 * Create a string that represnts the current date and time.
 *
 * @since 1.0
 * @return string that represnts the current date and time.
 */
function dynamik_time()
{
	$time = gmdate( 'Y-m-d H:i:s', ( time() + ( get_option( 'gmt_offset' ) * 3600 ) ) );
	return strtotime( $time );
}

/**
 * Create all the appropriate files and content that reflect the exported Child Theme
 * and then zip it up and spit it out into the browser for download.
 *
 * @since 1.0
 */
function child_export( $child_name, $author = 'Genesis Theme', $author_uri = 'http://dynamik.catalysttheme.com/genesis/', $at_style = 'no', $include_settings = 'no', $include_design = 'yes', $include_css = 'yes', $include_functions = 'yes', $include_js = 'yes', $include_templates = 'yes', $include_labels = 'yes', $include_widget_areas = 'yes', $include_hook_boxes = 'yes' )
{
	dynamik_folders_open_permissions();
	require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php' );
	
	$custom_functions = get_option( 'dynamik_gen_custom_functions' );
	$child_export_zip = strtolower( str_replace( ' ', '-', $child_name ) ) . '.zip';
	$tmp_path = dynamik_get_stylesheet_location( 'path' ) . 'tmp';
	$tmp_child = $tmp_path . '/child';
	$tmp_image_folder = $tmp_child . '/images';
	$tmp_post_formats_image_folder = $tmp_image_folder . '/post-formats';
	$tmp_my_templates_folder = $tmp_child . '/my-templates';
	$tmp_metaboxes_folder = $tmp_child . '/metaboxes';
	$tmp_js_folder = $tmp_child . '/js';
	$dollar_sign = '$';
	$new_line = '"\n"';
	
	$image_folder = dynamik_get_stylesheet_location( 'path' ) . 'images';
	$dynamik_image_folder = dynamik_get_stylesheet_location( 'path' ) . 'default-images';
	$dynamik_post_formats_image_folder = dynamik_get_stylesheet_location( 'path' ) . 'default-images/post-formats';
	$dynamik_my_templates_folder = CHILD_DIR . '/my-templates';
	$dynamik_metaboxes_folder = CHILD_DIR . '/lib/admin/metaboxes';
		
	if( !is_dir( $tmp_path ) )
	{
		@mkdir( $tmp_path, 0755, true );
	}
	if( !is_dir( $tmp_child ) )
	{
		@mkdir( $tmp_child, 0755, true );
	}
	if( !is_dir( $tmp_image_folder ) )
	{
		@mkdir( $tmp_image_folder, 0755, true );
	}
	if( !is_dir( $tmp_post_formats_image_folder ) && dynamik_get_settings( 'post_formats_active' ) )
	{
		@mkdir( $tmp_post_formats_image_folder, 0755, true );
	}
	if( !is_dir( $tmp_my_templates_folder ) && $include_templates == 'yes' )
	{
		@mkdir( $tmp_my_templates_folder, 0755, true );
	}
	if( $include_labels == 'yes' && get_option( 'dynamik_gen_custom_labels' ) != array() )
	{
		if( !is_dir( $tmp_metaboxes_folder ) )
		{
			@mkdir( $tmp_metaboxes_folder, 0755, true );
		}
		if( !is_dir( $tmp_metaboxes_folder . '/js' ) )
		{
			@mkdir( $tmp_metaboxes_folder . '/js', 0755, true );
		}
		if( !is_dir( $tmp_metaboxes_folder . '/images' ) )
		{
			@mkdir( $tmp_metaboxes_folder . '/images', 0755, true );
		}
	}
	if( !is_dir( $tmp_js_folder ) )
	{
		@mkdir( $tmp_js_folder, 0755, true );
	}
	
	$style_css = '/*
Theme Name:     ' . $child_name . '
Theme URI:      http: //studiopress.com/
Description:    A Genesis Child Theme 
Author:         ' . $author . '
Author URI:     ' . $author_uri . '
Template:       genesis
Version:        1.0
*/
';

	if( $at_style == 'yes' )
	{
		$style_css .= '

/* Import Genesis Parent Styles
------------------------------------------------------------ */

@import url(../genesis/style.css);
';
	}
	
	if( $include_design == 'yes' )
	{
		$style_css .= dynamik_build_design_styles( 'yes' );
	}
	
	if( $include_css == 'yes' && dynamik_get_custom_css( 'custom_css' ) != '' )
	{
		$custom_css_prefix = "\n\n" . '/* ' . __( 'Custom CSS', 'dynamik' ) . "\n" . '------------------------------------------------------------ */' . "\n\n";
		$custom_css = dynamik_get_custom_css( 'custom_css' ) . "\n";
		if( $include_design == 'yes' && dynamik_get_settings( 'responsive_enabled' ) )
		{
			$custom_mq_css_prefix = "\n" . '/* ' . __( 'Custom Responsive CSS', 'dynamik' ) . "\n" . '------------------------------------------------------------ */' . "\n";
			$media_query_css = '
@media only screen and (max-width: ' . dynamik_get_responsive( 'media_wrap_width' ) . 'px) {
' . dynamik_get_responsive( 'media_query_large_cascading_content' ) . '
}
@media only screen and (min-width: 768px) and (max-width: ' . dynamik_get_responsive( 'media_wrap_width' ) . 'px) {
' . dynamik_get_responsive( 'media_query_large_content' ) . '
}
@media only screen and (min-width: 480px) and (max-width: ' . dynamik_get_responsive( 'media_wrap_width' ) . 'px) {
' . dynamik_get_responsive( 'media_query_medium_large_content' ) . '
}
@media only screen and (max-width: 767px) {
' . dynamik_get_responsive( 'media_query_medium_cascading_content' ) . '
}
@media only screen and (min-width: 480px) and (max-width: 767px) {
' . dynamik_get_responsive( 'media_query_medium_content' ) . '
}
@media only screen and (max-width: 479px) {
' . dynamik_get_responsive( 'media_query_small_content' ) . '
}';
		}
		else
		{
			$custom_mq_css_prefix = '';
			$media_query_css = '';
		}
		$style_css .= $custom_css_prefix . $custom_css . $custom_mq_css_prefix . $media_query_css;
	}
	
	$nav_placement_comment = "
/**
 * Manage the placement of navbars.
 */
";
	
	if( dynamik_get_settings( 'responsive_enabled' ) && dynamik_get_responsive( 'navbar_media_query_default' ) == 'vertical_toggle' )
	{
		if( dynamik_get_design( 'nav1_location' ) == "Above Header" ) { $nav_1_action = "add_action( 'genesis_before_header', 'child_mobile_nav_1' );\nremove_action( 'genesis_after_header', 'genesis_do_nav' );\nadd_action( 'genesis_before_header', 'genesis_do_nav' );\n"; }
		elseif( dynamik_get_design( 'nav1_location' ) == "Below Header" ) { $nav_1_action = "add_action( 'genesis_after_header', 'child_mobile_nav_1', 9 );\n"; }
		
		if( dynamik_get_design( 'nav2_location' ) == "Above Header" ) { $nav_2_action = "add_action( 'genesis_before_header', 'child_mobile_nav_2' );\nremove_action( 'genesis_after_header', 'genesis_do_subnav' );\nadd_action( 'genesis_before_header', 'genesis_do_subnav' );\n"; }
		elseif( dynamik_get_design( 'nav2_location' ) == "Below Header" ) { $nav_2_action = "add_action( 'genesis_after_header', 'child_mobile_nav_2' );\nremove_action( 'genesis_after_header', 'genesis_do_subnav' );\nadd_action( 'genesis_after_header', 'genesis_do_subnav' );\n"; }

		if( true == dynamik_get_responsive( 'vertical_toggle_sub_page_reveal' ) )
			$dynamik_reveal_sub_pages = 'true';
		else
			$dynamik_reveal_sub_pages = 'false';

		$mobile_nav_functions = '
/**
 * Build Nav Mobile Menu HTML.
 *
 * @since 1.0
 */
function child_mobile_nav_1()
{
	if ( ! has_nav_menu( \'primary\' ) )
		return;
?>
	<div class="responsive-primary-menu-container">
		<div class="responsive-menu-icon">
			<span class="responsive-icon-bar"></span>
			<span class="responsive-icon-bar"></span>
			<span class="responsive-icon-bar"></span>
		</div>
		<h3 class="mobile-primary-toggle">' . dynamik_get_responsive( "dropdown_menu_1_text" ) . '</h3>
	</div>
<?php
}

/**
 * Build Subnav Mobile Menu HTML.
 *
 * @since 1.0
 */
function child_mobile_nav_2()
{
	if ( ! has_nav_menu( \'secondary\' ) )
		return;
?>
	<div class="responsive-secondary-menu-container">
		<div class="responsive-menu-icon">
			<span class="responsive-icon-bar"></span>
			<span class="responsive-icon-bar"></span>
			<span class="responsive-icon-bar"></span>
		</div>
		<h3 class="mobile-secondary-toggle">' . dynamik_get_responsive( "dropdown_menu_2_text" ) . '</h3>
	</div>
<?php
}

add_action( \'wp_head\', \'child_responsive_php_vars\' );
/**
 * Build the javascript variables that are used with Responsive Design.
 *
 * @since 1.0
 */
function child_responsive_php_vars() { ?>
<script type="text/javascript">
<?php
if( genesis_superfish_enabled() )
	echo \'var dynamik_sf_enabled = true;\' . "\n";
else
	echo \'var dynamik_sf_enabled = false;\' . "\n";

	echo \'var dynamik_reveal_sub_pages = ' . $dynamik_reveal_sub_pages . ';\' . "\n";
	echo \'var media_query_small_width = ' . dynamik_get_responsive( 'media_query_small_width' ) . ';\' . "\n";
?>
</script>
<?php
}
';

		$dropdown_menu_register = '';
		$nav_dropdown_functions = '';
	}
	elseif( dynamik_get_settings( 'responsive_enabled' ) && ( dynamik_get_responsive( 'navbar_media_query_default' ) == 'tablet_dropdown' || dynamik_get_responsive( 'navbar_media_query_default' ) == 'mobile_dropdown' ) )
	{
		if( dynamik_get_design( 'nav1_location' ) == "Above Header" ){ $nav_1_action = "remove_action( 'genesis_after_header', 'genesis_do_nav' );\nadd_action( 'genesis_before_header', 'genesis_do_nav' ); add_action( 'genesis_before_header', 'child_dropdown_nav_1' );\n"; }
		elseif( dynamik_get_design( 'nav1_location' ) == "Below Header" ){ $nav_1_action = "add_action( 'genesis_after_header', 'child_dropdown_nav_1' );\n"; }
		
		if( dynamik_get_design( 'nav2_location' ) == "Above Header" ){ $nav_2_action = "remove_action( 'genesis_after_header', 'genesis_do_subnav' );\nadd_action( 'genesis_before_header', 'genesis_do_subnav' ); add_action( 'genesis_before_header', 'child_dropdown_nav_2' );\n"; }
		elseif( dynamik_get_design( 'nav2_location' ) == "Below Header" ){ $nav_2_action = "add_action( 'genesis_after_header', 'child_dropdown_nav_2' );\n"; }

		$mobile_nav_functions = '';

		$dropdown_menu_register = "
/**
 * Register the additional Responsive Dropdown Menus.
 */
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'dynamik' ), 'secondary' => __( 'Secondary Navigation Menu', 'dynamik' ), 'primary_dropdown' => __( 'Responsive Dropdown 1', 'dynamik' ), 'secondary_dropdown' => __( 'Responsive Dropdown 2', 'dynamik' ) ) );
";
		
		$nav_dropdown_functions = '
/**
 * Build Nav Dropdown HTML.
 *
 * @since 1.0
 */
function child_dropdown_nav_1() {
	if ( ! has_nav_menu( \'primary_dropdown\' ) )
		return;
?>
	<div id="dropdown-nav-wrap">
		<!-- dropdown nav for responsive design -->
		<nav id="dropdown-nav" role="navigation">
			<?php dynamik_dropdown_menu_1( array( \'theme_location\' => \'primary_dropdown\', \'dropdown_title\' => \'' . dynamik_get_responsive( 'dropdown_menu_1_text' ) . '\' ) ); ?>
			<div class="responsive-menu-icon">
				<span class="responsive-icon-bar"></span>
				<span class="responsive-icon-bar"></span>
				<span class="responsive-icon-bar"></span>
			</div>
		</nav><!-- #dropdown-nav -->
		<!-- /end dropdown nav -->
	</div>
<?php
}

/**
 * Build Subnav Dropdown HTML.
 *
 * @since 1.0
 */
function child_dropdown_nav_2() {
	if ( ! has_nav_menu( \'secondary_dropdown\' ) )
		return;
?>
	<div id="dropdown-subnav-wrap">	
		<!-- dropdown nav for responsive design -->
		<nav id="dropdown-subnav" role="navigation">
			<?php dynamik_dropdown_menu_2( array( \'theme_location\' => \'secondary_dropdown\', \'dropdown_title\' => \'' . dynamik_get_responsive( 'dropdown_menu_2_text' ) . '\' ) ); ?>
			<div class="responsive-menu-icon">
				<span class="responsive-icon-bar"></span>
				<span class="responsive-icon-bar"></span>
				<span class="responsive-icon-bar"></span>
			</div>
		</nav><!-- #dropdown-subnav -->
		<!-- /end dropdown subnav -->
	</div>
<?php
}

/**
 * The following edited dropdown menu code was
 * pulled from the following WordPress Plugin:
 * http://wordpress.org/plugins/dropdown-menus/
 */

/**
 * Tack on the blank option for urls not in the menu
 */
add_filter( \'wp_nav_menu_items\', \'dropdown_add_blank_item\', 10, 2 );
function dropdown_add_blank_item( $items, $args ) {
	if ( isset( $args->walker ) && is_object( $args->walker ) && method_exists( $args->walker, \'is_dropdown\' ) ) {
		if ( ( ! isset( $args->menu ) || empty( $args->menu ) ) && isset( $args->theme_location ) ) {
			$theme_locations = get_nav_menu_locations();
			$args->menu = wp_get_nav_menu_object( $theme_locations[ $args->theme_location ] );
		}
		$title = isset( $args->dropdown_title ) ? wptexturize( $args->dropdown_title ) : \'&mdash; \' . $args->menu->name . \' &mdash;\';
		if ( ! empty( $title ) )
			$items = \'<option value="" class="blank">\' . apply_filters( \'dropdown_blank_item_text\', $title, $args ) . \'</option>\' . $items;
	}
	return $items;
}

/**
 * Remove empty options created in the sub levels output
 */
add_filter( \'wp_nav_menu_items\', \'dropdown_remove_empty_items\', 10, 2 );
function dropdown_remove_empty_items( $items, $args ) {
	if ( isset( $args->walker ) && is_object( $args->walker ) && method_exists( $args->walker, \'is_dropdown\' ) )
		$items = str_replace( "<option></option>", "", $items );
	return $items;
}

/**
 * Overrides the walker argument and container argument then calls wp_nav_menu
 */
function dynamik_dropdown_menu_1( $args ) {
	// if non array supplied use as theme location
	if ( ! is_array( $args ) )
		$args = array( \'menu\' => $args );

	// enforce these arguments so it actually works
	$args[ \'walker\' ] = new Dynamik_DropDown_Nav_Menu();
	$args[ \'items_wrap\' ] = \'<select id="%1$s" class="%2$s mobile-dropdown-menu nav-chosen-select">%3$s</select>\';

	// custom args for controlling indentation of sub menu items
	$args[ \'indent_string\' ] = isset( $args[ \'indent_string\' ] ) ? $args[ \'indent_string\' ] : \'&ndash;&nbsp;\';
	$args[ \'indent_after\' ] =  isset( $args[ \'indent_after\' ] ) ? $args[ \'indent_after\' ] : \'\';

	return wp_nav_menu( $args );
}

/**
 * Overrides the walker argument and container argument then calls wp_nav_menu
 */
function dynamik_dropdown_menu_2( $args ) {
	// if non array supplied use as theme location
	if ( ! is_array( $args ) )
		$args = array( \'menu\' => $args );

	// enforce these arguments so it actually works
	$args[ \'walker\' ] = new Dynamik_DropDown_Nav_Menu();
	$args[ \'items_wrap\' ] = \'<select id="%1$s" class="%2$s mobile-dropdown-menu subnav-chosen-select">%3$s</select>\';

	// custom args for controlling indentation of sub menu items
	$args[ \'indent_string\' ] = isset( $args[ \'indent_string\' ] ) ? $args[ \'indent_string\' ] : \'&ndash;&nbsp;\';
	$args[ \'indent_after\' ] =  isset( $args[ \'indent_after\' ] ) ? $args[ \'indent_after\' ] : \'\';

	return wp_nav_menu( $args );
}

class Dynamik_DropDown_Nav_Menu extends Walker_Nav_Menu {

	// easy way to check it\'s this walker we\'re using to mod the output
	function is_dropdown() {
		return true;
	}

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "</option>";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "<option>";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : \'\';

		$class_names = $value = \'\';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = \'menu-item-\' . $item->ID;
		$classes[] = \'menu-item-depth-\' . $depth;

		$class_names = join( \' \', apply_filters( \'nav_menu_css_class\', array_unique( array_filter( $classes ) ), $item, $args ) );
		$class_names = \' class="\' . esc_attr( $class_names ) . \'"\';

		$selected = \'\';

		// select current item
		if ( apply_filters( \'dropdown_menus_select_current\', true ) )
			$selected = in_array( \'current-menu-item\', $classes ) ? \' selected="selected"\' : \'\';

		$output .= $indent . \'<option\' . $class_names .\' value="\'. $item->url .\'"\'. $selected .\'>\';

		// push sub-menu items in as we can\'t nest optgroups
		$indent_string = str_repeat( apply_filters( \'dropdown_menus_indent_string\', $args->indent_string, $item, $depth, $args ), ( $depth ) ? $depth : 0 );
		$indent_string .= !empty( $indent_string ) ? apply_filters( \'dropdown_menus_indent_after\', $args->indent_after, $item, $depth, $args ) : \'\';

		$item_output = $args->before . $indent_string;
		$item_output .= $args->link_before . apply_filters( \'the_title\', $item->title, $item->ID ) . $args->link_after;
		$item_output .= $args->after;

		$output .= apply_filters( \'walker_nav_menu_dropdown_start_el\', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= apply_filters( \'walker_nav_menu_dropdown_end_el\', "</option>\n", $item, $depth);
	}
}

add_filter( \'dropdown_menus_select_current\', create_function( \'$bool\', \'return false;\' ) );

/**
 * END WordPress dropdown Plugin code.
 */
';
	}
	else
	{
		if( dynamik_get_design( 'nav1_location' ) == "Above Header" ){ $nav_1_action = "remove_action( 'genesis_after_header', 'genesis_do_nav' );\nadd_action( 'genesis_before_header', 'genesis_do_nav' );\n"; }
		elseif( dynamik_get_design( 'nav1_location' ) == "Below Header" ){ $nav_1_action = ""; }
		
		if( dynamik_get_design( 'nav2_location' ) == "Above Header" ){ $nav_2_action = "remove_action( 'genesis_after_header', 'genesis_do_subnav' );\nadd_action( 'genesis_before_header', 'genesis_do_subnav' );\n"; }
		elseif( dynamik_get_design( 'nav2_location' ) == "Below Header" ){ $nav_2_action = ""; }
		
		if( dynamik_get_design( 'nav1_location' ) == "Below Header" && dynamik_get_design( 'nav2_location' ) == "Below Header" ){ $nav_placement_comment = ""; }
		
		$mobile_nav_functions = '';
		$dropdown_menu_register = '';
		$nav_dropdown_functions = '';
	}
	
	if( dynamik_get_settings( 'responsive_enabled' ) )
	{
		$responsive_viewport_meta = '<meta name="viewport" content="' . dynamik_get_responsive( 'viewport_meta_content' ) . '"/>';
	
		$responsive_viewport = "
add_action( 'genesis_meta', 'child_responsive_viewport' );
/**
 * Add viewport meta tag to the genesis_meta hook
 * to force 'real' scale of site when viewed in mobile devices.
 *
 * @since 1.0
 */
function child_responsive_viewport() {
echo '$responsive_viewport_meta' . $new_line;
}";

		$responsive_js_enqueue = "
add_action( 'get_header', 'child_enqueue_responsive_scripts' );
/**
 * Enqueue Responsive Design javascript code.
 *
 * @since 1.0
 */
function child_enqueue_responsive_scripts() {	
	wp_enqueue_script( 'responsive', CHILD_URL . '/js/responsive.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
}";
	}
	else
	{
		$responsive_viewport_meta = '';
		$responsive_viewport = '';
		$responsive_js_enqueue = '';
	}

	if( $include_js == 'yes' && file_exists( dynamik_get_custom_js_path() ) && 0 != filesize( dynamik_get_custom_js_path() ) )
	{
		$custom_js = get_option( 'dynamik_gen_custom_js' );
		if( !empty( $custom_js['custom_js_in_head'] ) )
			$in_footer = 'false';
		else
			$in_footer = 'true';

		$custom_js_enqueue = "
add_action( 'get_header', 'child_enqueue_custom_scripts' );
/**
 * Enqueue Custom javascript code.
 *
 * @since 1.0
 */
function child_enqueue_custom_scripts() {	
	wp_enqueue_script( 'custom-scripts', CHILD_URL . '/js/custom-scripts.js', array( 'jquery' ), CHILD_THEME_VERSION, " . $in_footer . " );
}";
	}
	else
	{
		$custom_js_enqueue = '';
	}

	if( $include_settings == 'yes' )
	{
		if( dynamik_get_settings( 'custom_image_size_one_mode' ) != '' )
		{
			if( dynamik_get_settings( 'custom_image_size_one_mode' ) != '' )
			{
				$custom_image_size_one_crop = dynamik_get_settings( 'custom_image_size_one_mode' ) == 'crop' ? 'true' : 'false';
				$custom_image_size_one = "

/**
 * Add custom thumbnail sizes.
 */
add_image_size( 'custom-thumb-1', " . dynamik_get_settings( 'custom_image_size_one_width' ) . ", " . dynamik_get_settings( 'custom_image_size_one_height' ) . ", " . $custom_image_size_one_crop . " );";
			}
			else
			{
				$custom_image_size_one = '';
			}
			
			if( dynamik_get_settings( 'custom_image_size_two_mode' ) != '' )
			{
				$custom_image_size_two_crop = dynamik_get_settings( 'custom_image_size_two_mode' ) == 'crop' ? 'true' : 'false';
				$custom_image_size_two = "
add_image_size( 'custom-thumb-2', " . dynamik_get_settings( 'custom_image_size_two_width' ) . ", " . dynamik_get_settings( 'custom_image_size_two_height' ) . ", " . $custom_image_size_two_crop . " );";
			}
			else
			{
				$custom_image_size_two = '';
			}
			
			if( dynamik_get_settings( 'custom_image_size_three_mode' ) != '' )
			{
				$custom_image_size_three_crop = dynamik_get_settings( 'custom_image_size_three_mode' ) == 'crop' ? 'true' : 'false';
				$custom_image_size_three = "
add_image_size( 'custom-thumb-3', " . dynamik_get_settings( 'custom_image_size_three_width' ) . ", " . dynamik_get_settings( 'custom_image_size_three_height' ) . ", " . $custom_image_size_three_crop . " );";
			}
			else
			{
				$custom_image_size_three = '';
			}
			
			if( dynamik_get_settings( 'custom_image_size_four_mode' ) != '' )
			{
				$custom_image_size_four_crop = dynamik_get_settings( 'custom_image_size_four_mode' ) == 'crop' ? 'true' : 'false';
				$custom_image_size_four = "
add_image_size( 'custom-thumb-4', " . dynamik_get_settings( 'custom_image_size_four_width' ) . ", " . dynamik_get_settings( 'custom_image_size_four_height' ) . ", " . $custom_image_size_four_crop . " );";
			}
			else
			{
				$custom_image_size_four = '';
			}
			
			if( dynamik_get_settings( 'custom_image_size_five_mode' ) != '' )
			{
				$custom_image_size_five_crop = dynamik_get_settings( 'custom_image_size_five_mode' ) == 'crop' ? 'true' : 'false';
				$custom_image_size_five = "
add_image_size( 'custom-thumb-5', " . dynamik_get_settings( 'custom_image_size_five_width' ) . ", " . dynamik_get_settings( 'custom_image_size_five_height' ) . ", " . $custom_image_size_five_crop . " );";
			}
			else
			{
				$custom_image_size_five = '';
			}
		}
	
		$post_title_hook = dynamik_get_settings( 'html_five_active' ) ? 'genesis_entry_header' : 'genesis_post_title';

		if( dynamik_get_settings( 'remove_all_page_titles' ) )
		{
			$remove_page_titles = "
			
add_action( 'get_header', 'child_remove_page_titles' );
/**
 * Remove all page titles.
 *
 * @since 1.0
 */
function child_remove_page_titles() {
    if ( is_page() && ! is_page_template( 'page_blog.php' ) )
        remove_action( '" . $post_title_hook . "', 'genesis_do_post_title' );
}";
		}
		elseif( dynamik_get_settings( 'remove_page_titles_ids' ) != '' )
		{
			$remove_page_titles = "
			
add_action( 'get_header', 'child_remove_page_titles' );
/**
 * Remove specific page titles.
 *
 * @since 1.0
 */
function child_remove_page_titles() {
	global " . $dollar_sign  . "post;
	" . $dollar_sign  . "page_ids = explode( ',', '" . dynamik_get_settings( 'remove_page_titles_ids' ) . "' );
	if ( is_page() && ! is_page_template( 'page_blog.php' ) ) {
		foreach ( " . $dollar_sign  . "page_ids as " . $dollar_sign  . "page_id ) {
			if ( " . $dollar_sign  . "post->ID == " . $dollar_sign  . "page_id )
				remove_action( '" . $post_title_hook . "', 'genesis_do_post_title' );
		}
	}
}";
		}
		else
		{
			$remove_page_titles = '';
		}
		
		if( dynamik_get_settings( 'include_inpost_cpt_all' ) )
		{
			$include_inpost_cpt_names = "

add_action( 'init', 'child_add_post_type_support' );
/**
 * Add Genesis In-Post options into ALL Custom Post Types.
 *
 * @since 1.0
 */
function child_add_post_type_support() {
	foreach( get_post_types( array( 'public' => true ) ) as " . $dollar_sign  . "post_type ) {
		add_post_type_support( " . $dollar_sign  . "post_type, array( 'genesis-seo', 'genesis-scripts', 'genesis-layouts' ) );
	}
}";
		}
		elseif( dynamik_get_settings( 'include_inpost_cpt_names' ) != '' )
		{
			$include_inpost_cpt_names = "

add_action( 'init', 'child_add_post_type_support' );
/**
 * Add Genesis In-Post options into specified Custom Post Types.
 *
 * @since 1.0
 */
function child_add_post_type_support() {
	" . $dollar_sign  . "post_types = explode( ',', '" . dynamik_get_settings( 'include_inpost_cpt_names' ) . "' );
	
	foreach ( " . $dollar_sign  . "post_types as " . $dollar_sign  . "post_type ) {
		add_post_type_support( " . $dollar_sign  . "post_type, array( 'genesis-seo', 'genesis-scripts', 'genesis-layouts' ) );
	}
}";
		}
		else
		{
			$include_inpost_cpt_names = '';
		}

		if( dynamik_get_settings( 'post_formats_active' ) )
		{
			$post_formats = "

/**
 * Enable Custom Post Format functionality.
 */
add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
add_theme_support( 'genesis-post-format-images' );";
		}
		else
		{
			$post_formats = '';
		}

	if( dynamik_get_settings( 'html_five_active' ) )
	{
		$html_five = "

/**
 * Add support for Genesis HTML5 Markup.
 */
add_theme_support( 'html5' );";
	}
	else
	{
		$html_five = '';
	}

		if( dynamik_get_settings( 'html_five_active' ) && dynamik_get_settings( 'fancy_dropdowns_active' ) )
		{
			$fancy_dropdowns = "

/**
 * Add support for Genesis 'Fancy Dropdowns'.
 */
add_filter( 'genesis_superfish_enabled', '__return_true' );";
		}
		else
		{
			$fancy_dropdowns = '';
		}
	}

	$conditional_functions = "

/**
 * This is altered version of the genesis_get_custom_field() function
 * which includes the additional ability to work with array() values.
 *
 * @since 1.0
 */
function dynamik_get_custom_field( " . $dollar_sign  . "field, " . $dollar_sign  . "single = true, " . $dollar_sign  . "explode = false )
{
	if( null === get_the_ID() )
		return '';

	" . $dollar_sign  . "custom_field = get_post_meta( get_the_ID(), " . $dollar_sign  . "field, " . $dollar_sign  . "single );

	if( !" . $dollar_sign  . "custom_field )
		return '';

	if( !" . $dollar_sign  . "single )
	{
		" . $dollar_sign  . "custom_field_string = implode( ',', " . $dollar_sign  . "custom_field );
		if( " . $dollar_sign  . "explode )
		{
			" . $dollar_sign  . "custom_field_array_pre = explode( ',', " . $dollar_sign  . "custom_field_string );
			foreach( " . $dollar_sign  . "custom_field_array_pre as " . $dollar_sign  . "key => " . $dollar_sign  . "value )
			{
				" . $dollar_sign  . "custom_field_array[" . $dollar_sign  . "value] = " . $dollar_sign  . "value;
			}
			return " . $dollar_sign  . "custom_field_array;
		}
		return " . $dollar_sign  . "custom_field_string;
	}

	return is_array( " . $dollar_sign  . "custom_field ) ? stripslashes_deep( " . $dollar_sign  . "custom_field ) : stripslashes( wp_kses_decode_entities( " . $dollar_sign  . "custom_field ) );
}

/**
 * Create a Dynamik Label conditional tag which
 * allows content to be conditionally placed on pages and posts
 * that have specific Dynamik Labels assigned to them.
 *
 * @since 1.0
 */
function dynamik_has_label( " . $dollar_sign  . "label = 'label' )
{
	" . $dollar_sign  . "labels_meta_array = dynamik_get_custom_field( '_dyn_labels', false, true ) != '' ? dynamik_get_custom_field( '_dyn_labels', false, true ) : array();

	if( is_singular() )
	{
		if( in_array( " . $dollar_sign  . "label, " . $dollar_sign  . "labels_meta_array ) ) return true;
	}

	return false;
}

/**
 * Create a Genesis Simple Sidebars conditional tag which
 * allows content to be conditionally placed on pages and posts
 * that have specific simple sidebars assigned to them.
 *
 * @since 1.0
 */
function dynamik_is_ss( " . $dollar_sign  . "sidebar_id = 'sb-id' )
{
	if( !defined( 'SS_SETTINGS_FIELD' ) )
		return false;

	static " . $dollar_sign  . "taxonomies = null;

	if( is_singular() )
	{
		if( " . $dollar_sign  . "sidebar_id == genesis_get_custom_field( '_ss_sidebar' ) ) return true;
	}

	if( is_category() )
	{
		" . $dollar_sign  . "term = get_term( get_query_var( 'cat' ), 'category' );
		if( isset( " . $dollar_sign  . "term->meta['_ss_sidebar'] ) && " . $dollar_sign  . "sidebar_id == " . $dollar_sign  . "term->meta['_ss_sidebar'] ) return true;
	}

	if( is_tag() )
	{
		" . $dollar_sign  . "term = get_term( get_query_var( 'tag_id' ), 'post_tag' );
		if( isset( " . $dollar_sign  . "term->meta['_ss_sidebar'] ) && " . $dollar_sign  . "sidebar_id == " . $dollar_sign  . "term->meta['_ss_sidebar'] ) return true;
	}

	if( is_tax() )
	{
		if ( null === " . $dollar_sign  . "taxonomies )
			" . $dollar_sign  . "taxonomies = ss_get_taxonomies();

		foreach ( " . $dollar_sign  . "taxonomies as " . $dollar_sign  . "tax )
		{
			if ( 'post_tag' == " . $dollar_sign  . "tax || 'category' == " . $dollar_sign  . "tax )
				continue;

			if ( is_tax( " . $dollar_sign  . "tax ) )
			{
				" . $dollar_sign  . "obj = get_queried_object();
				" . $dollar_sign  . "term = get_term( " . $dollar_sign  . "obj->term_id, " . $dollar_sign  . "tax );
				if( isset( " . $dollar_sign  . "term->meta['_ss_sidebar'] ) && " . $dollar_sign  . "sidebar_id == " . $dollar_sign  . "term->meta['_ss_sidebar'] ) return true;
				break;
			}
		}
	}

	return false;
}
";
	
	$do_shortcode_text_widget = "
/**
 * Enable Shortcodes in Text Widgets.
 */
add_filter( 'widget_text', 'do_shortcode' );";

		if( $include_labels == 'yes' && get_option( 'dynamik_gen_custom_labels' ) != array() )
		{
			if( dynamik_get_settings( 'include_inpost_cpt_all' ) )
			{
				foreach( get_post_types( array( 'public' => true ) ) as $post_type )
				{
					$post_types[] = $post_type;
				}
			}
			else
			{
				$post_types = dynamik_get_settings( 'include_inpost_cpt_names' ) != '' ? explode( ',', 'page,post,' . dynamik_get_settings( 'include_inpost_cpt_names' ) ) : array( 'page','post' );
			}
			$post_type_string = implode( ',', $post_types );

			$labels = get_option( 'dynamik_gen_custom_labels' );
			asort( $labels );
			$labels_array = '';
			foreach( $labels as $key => $value )
			{
				$labels_array .= "'" . $value['label_id'] . "' => '" . $value['label_name'] . "',";
			}
			$custom_labels = "

if( is_admin() )
{
	add_filter( 'cmb_meta_boxes', 'child_lables_metabox' );
	/**
	 * Define the metabox and field configurations.
	 *
	 * @since 1.0
	 * @return array
	 */
	function child_lables_metabox( array " . $dollar_sign  . "meta_boxes )
	{
		// Start with an underscore to hide fields from custom fields list
		" . $dollar_sign  . "prefix = '_dyn_';
		" . $dollar_sign  . "post_type_array = explode( ',', '" . $post_type_string . "' );

		" . $dollar_sign  . "meta_boxes[] = array(
			'id'         => 'dynamik_labels',
			'title'      => 'Dynamik Labels',
			'pages'      => " . $dollar_sign  . "post_type_array, // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'fields'     => array(
				array(
					'name'    => 'Select Labels',
					'desc'    => 'Select labels appropriate to this page/post.',
					'id'      => " . $dollar_sign  . "prefix . 'labels',
					'type'    => 'multicheck',
					'options' => array(
						" . $labels_array . "
					),
				),
			),
		);

		return " . $dollar_sign  . "meta_boxes;
	}

	add_action( 'init', 'child_initialize_cmb_meta_boxes', 9999 );
	/**
	 * Initialize the metabox class.
	 * @since 1.0
	 */
	function child_initialize_cmb_meta_boxes()
	{
		if( !class_exists( 'cmb_Meta_Box' ) )
			require_once CHILD_DIR . '/metaboxes/init.php';
	}
}";

			$custom_labels_classes = "

	if( is_singular() && dynamik_get_custom_field( '_dyn_labels', false, true ) != '' )
	{
		foreach ( dynamik_get_custom_field( '_dyn_labels', false, true ) as " . $dollar_sign  . "key => " . $dollar_sign  . "value )
		{
			" . $dollar_sign  . "classes[] = 'label-' . " . $dollar_sign  . "key;
		}
	}

	if( defined( 'DYNAMIK_LABEL_WIDTH' ) )
		" . $dollar_sign  . "classes[] = DYNAMIK_LABEL_WIDTH;";
		}
		else
		{
			$custom_labels = '';
			$custom_labels_classes = '';
		}

	/**
	 * Build the EZ Structures file if it exists.
	 */
	if( file_exists( dynamik_get_ez_structure_path() ) &&
		( dynamik_get_design_alt( 'dynamik_homepage_type' ) == 'static_home' ||
		dynamik_get_design_alt( 'ez_home_slider_display' ) ||
		dynamik_get_design_alt( 'ez_feature_top_select' ) != 'disabled' ||
		dynamik_get_design_alt( 'ez_fat_footer_select' ) != 'disabled' ) )
	{
		$ez_structures = substr( file_get_contents( dynamik_get_ez_structure_path() ), 67, -64 ) . "\n";
	}
	else
	{
		$ez_structures = '';
	}

	/**
	 * EZ Static Homepage.
	 */
	if( $ez_structures != '' &&
		dynamik_get_design( 'dynamik_homepage_type' ) == 'static_home' )
	{
		$ez_home_structure_classes = '$classes[] = "ez-home";';
	
		$ez_home_code = "
/**
 * Hook the EZ Home Structure function into the 'dynamik_hook_home' Hook.
 */
add_action( 'dynamik_hook_home', 'ez_home' );\n";
	}
	else
	{
		$ez_home_structure_classes = "";
		$ez_home_code = "";
	}
	
	/**
	 * EZ Home Sidebar.
	 */
	if( $ez_structures != '' &&
		dynamik_get_design( 'dynamik_homepage_type' ) == 'static_home' &&
		dynamik_get_design( 'ez_static_home_sb_display' ) )
	{
		$ez_home_sidebar_active_classes = '$classes[] = "ez-home-sidebar";';
		
		if( dynamik_get_design( 'ez_static_home_sb_location' ) == 'left' )
		{
			$ez_home_sidebar_left_classes = '$classes[] = "home-sidebar-left";';
		}
		else
		{
			$ez_home_sidebar_left_classes = "";
		}

		$ez_home_sidebar_code = "
/**
 * Hook the Homepage Sidebar Structure function into the 'dynamik_hook_home' Hook.
 */
add_action( 'dynamik_hook_home', 'ez_home_sidebar' );\n";
	}
	else
	{
		$ez_home_sidebar_active_classes = "";
		$ez_home_sidebar_left_classes = "";
		$ez_home_sidebar_code = "";
	}
	
	if( $ez_structures != '' &&
		dynamik_get_design( 'ez_home_slider_display' ) )
	{
		$ez_home_slider_active_classes = '$classes[] = "ez-home-slider";';

		/**
		 * Determine where to hook in the Home Image Slider based on
		 * whether or not the Static Homepage is active.
		 */
		if( dynamik_get_design( 'dynamik_homepage_type' ) == 'default_home' )
		{
			/**
			 * Determine where to hook in the Home Image Slider based on
			 * Home Slider Layout option setting.
			 */
			if( dynamik_get_design( 'ez_home_slider_location' ) == 'outside' )
			{
				$ez_home_slider_inside_classes = '';

				$ez_home_slider_code = "
/**
 * Hook the Home Slider structure function into the 'genesis_before_content_sidebar_wrap' Hook.
 */
add_action( 'genesis_before_content_sidebar_wrap', 'ez_home_slider' );\n";
			}
			else
			{
				$ez_home_slider_inside_classes = '$classes[] = "slider-inside";';

				$ez_home_slider_code = "
/**
 * Hook the Home Slider structure function into the 'genesis_before_loop' Hook.
 */
add_action( 'genesis_before_loop', 'ez_home_slider' );\n";
			}
		}
		else
		{
			/**
			 * Determine where to hook in the Home Image Slider based on
			 * Home Slider Layout option setting.
			 */
			if( dynamik_get_design( 'ez_home_slider_location' ) == 'outside' )
			{
				$ez_home_slider_inside_classes = '';

				$ez_home_slider_code = "
/**
 * Hook the Home Slider structure function into the 'dynamik_hook_home' Hook.
 */
add_action( 'dynamik_hook_home', 'ez_home_slider', 6 );\n";
			}
			else
			{
				$ez_home_slider_inside_classes = '$classes[] = "slider-inside";';

				$ez_home_slider_code = "
/**
 * Hook the Home Slider structure function into the 'dynamik_hook_before_ez_home' Hook.
 */
add_action( 'dynamik_hook_before_ez_home', 'ez_home_slider' );\n";
			}
		}
	}
	else
	{
		$ez_home_slider_active_classes = '';
		$ez_home_slider_inside_classes = '';
		$ez_home_slider_code = "";
	}

	/**
	 * EZ Feature Top.
	 */
	if( !dynamik_get_design( 'ez_feature_top_display_front_page' ) )
	{
		$ez_feature_top_front_page = 'if ( is_front_page() ) { return; }';
	}
	else
	{
		$ez_feature_top_front_page = '';
	}
	if( !dynamik_get_design( 'ez_feature_top_display_posts' ) )
	{
		$ez_feature_top_posts = 'if ( is_single() ) { return; }';
	}
	else
	{
		$ez_feature_top_posts = '';
	}
	if( !dynamik_get_design( 'ez_feature_top_display_pages' ) )
	{
		$ez_feature_top_pages = "if ( ( is_page() || is_404() ) && ! is_front_page() && ! is_page_template( 'page_blog.php' ) ) { return; }";
	}
	else
	{
		$ez_feature_top_pages = '';
	}
	if( !dynamik_get_design( 'ez_feature_top_display_archives' ) )
	{
		$ez_feature_top_archives = 'if ( is_archive() || is_search() ) { return; }';
	}
	else
	{
		$ez_feature_top_archives = '';
	}
	if( !dynamik_get_design( 'ez_feature_top_display_blog' ) )
	{
		$ez_feature_top_blog = "if ( is_page_template( 'page_blog.php' ) ) { return; }";
	}
	else
	{
		$ez_feature_top_blog = '';
	}
	
	if( dynamik_get_design( 'ez_feature_top_position' ) == 'outside_inner' )
	{
		$ez_feature_top_add_action = "add_action( 'genesis_after_header', 'ez_feature_top' );";
	}
	elseif( dynamik_get_design( 'dynamik_homepage_type' ) != 'static_home' && dynamik_get_design( 'ez_feature_top_position' ) == 'inside_inner' )
	{
		$ez_feature_top_add_action = "add_action( 'genesis_before_content_sidebar_wrap', 'ez_feature_top', 5 );";
	}
	else
	{
		$ez_feature_top_add_action = "is_front_page() ? add_action( 'dynamik_hook_home', 'ez_feature_top', 5 ) : add_action( 'genesis_before_content_sidebar_wrap', 'ez_feature_top', 5 );";
	}
	
	if( $ez_structures != '' &&
		dynamik_get_design( 'ez_feature_top_select' ) != 'disabled' )
	{
		$ez_feature_top_classes = dynamik_get_design( 'ez_feature_top_position' ) == 'outside_inner' ? '$classes[] = "feature-top-outside";' : '';

$ez_feature_top_code = "
/**
 * Hook the Feature Top Structure function into the 'wp_head' Hook.
 */
add_action( 'wp_head', 'child_feature_top' );

/**
 * Determine where NOT to display the Feature Top section before hooking it in.
 *
 * @since 1.0
 */
function child_feature_top() {
	/**
	 * Add conditional tags to control where the Feature Top Widget Area displays.
	 */
	if ( is_page_template( 'landing.php' ) ) { return; }
	" . $ez_feature_top_front_page . " " . $ez_feature_top_posts . " " . $ez_feature_top_pages . " " . $ez_feature_top_archives . " " . $ez_feature_top_blog . "
	
	/**
	 * Hook the Feature Top Structure function into the appropriate Genesis Hook.
	 */
	" . $ez_feature_top_add_action . "
}
";
	}
	else
	{
		$ez_feature_top_classes = "";
		$ez_feature_top_code = "";
	}
	
	/**
	 * EZ Fat Footer.
	 */
	if( !dynamik_get_design( 'ez_fat_footer_display_front_page' ) )
	{
		$ez_fat_footer_front_page = 'if ( is_front_page() ) { return; }';
	}
	else
	{
		$ez_fat_footer_front_page = '';
	}
	if( !dynamik_get_design( 'ez_fat_footer_display_posts' ) )
	{
		$ez_fat_footer_posts = 'if ( is_single() ) { return; }';
	}
	else
	{
		$ez_fat_footer_posts = '';
	}
	if( !dynamik_get_design( 'ez_fat_footer_display_pages' ) )
	{
		$ez_fat_footer_pages = "if ( ( is_page() || is_404() ) && ! is_front_page() && ! is_page_template( 'page_blog.php' ) ) { return; }";
	}
	else
	{
		$ez_fat_footer_pages = '';
	}
	if( !dynamik_get_design( 'ez_fat_footer_display_archives' ) )
	{
		$ez_fat_footer_archives = 'if ( is_archive() || is_search() ) { return; }';
	}
	else
	{
		$ez_fat_footer_archives = '';
	}
	if( !dynamik_get_design( 'ez_fat_footer_display_blog' ) )
	{
		$ez_fat_footer_blog = "if ( is_page_template( 'page_blog.php' ) ) { return; }";
	}
	else
	{
		$ez_fat_footer_blog = '';
	}

	if( dynamik_get_design( 'ez_fat_footer_position' ) == 'outside_inner' )
	{
		$ez_fat_footer_add_action = "add_action( 'genesis_before_footer', 'ez_fat_footer' );";
	}
	elseif( dynamik_get_design( 'dynamik_homepage_type' ) != 'static_home' && dynamik_get_design( 'ez_fat_footer_position' ) == 'inside_inner' )
	{
		$ez_fat_footer_add_action = "add_action( 'genesis_after_content_sidebar_wrap', 'ez_fat_footer' );";
	}
	else
	{
		$ez_fat_footer_add_action = "is_front_page() ? add_action( 'dynamik_hook_home', 'ez_fat_footer' ) : add_action( 'genesis_after_content_sidebar_wrap', 'ez_fat_footer' );";
	}
	
	if( $ez_structures != '' &&
		dynamik_get_design( 'ez_fat_footer_select' ) != 'disabled' )
	{
		$ez_fat_footer_classes = dynamik_get_design( 'ez_fat_footer_position' ) == 'inside_inner' ? '$classes[] = \'fat-footer-inside\';' : '';

$ez_fat_footer_code = "
/**
 * Hook the Fat Footer Structure function into the 'wp_head' Hook.
 */
add_action( 'wp_head', 'child_fat_footer' );

/**
 * Determine where NOT to display the Fat Footer section before hooking it in.
 *
 * @since 1.0
 */
function child_fat_footer() {
	/**
	 * Add conditional tags to control where the Fat Footer Widget Area displays.
	 */
	if ( is_page_template( 'landing.php' ) ) { return; }
	" . $ez_fat_footer_front_page . " " . $ez_fat_footer_posts . " " . $ez_fat_footer_pages . " " . $ez_fat_footer_archives . " " . $ez_fat_footer_blog . "
	
	/**
	 * Hook the Fat Footer Structure function into the appropriate Genesis Hook.
	 */
	" . $ez_fat_footer_add_action . "
}
";
	}
	else
	{
		$ez_fat_footer_classes = '';
		$ez_fat_footer_code = '';
	}

	if( dynamik_get_design( 'wrap_structure' ) == 'fluid' )
	{
		$site_fluid_classes = '$classes[] = \'site-fluid\';';
	}
	else
	{
		$site_fluid_classes = '';
	}
	
	$custom_fucntions_content = ( $include_functions == 'yes' ) ? substr( stripslashes( wp_kses_decode_entities( $custom_functions['custom_functions'] ) ), 64 ) : '';
	$custom_widget_areas = ( $include_widget_areas == 'yes' ) ? substr( file_get_contents( dynamik_get_custom_widget_areas_register_path() ), 5 ) . substr( file_get_contents( dynamik_get_custom_widget_areas_path() ), 5 ) : '';
	$custom_hook_boxes = ( $include_hook_boxes == 'yes' ) ? substr( file_get_contents( dynamik_get_custom_hook_boxes_path() ), 5 ) : '';

	$functions_php ="<?php
/**
 * Define and require all the necessary 'bits and pieces'
 * and build all necessary Static Homepage and Featured area functions.
 *
 * @package Dynamik
 */

/**
 * Call Genesis's core functions.
 */
require_once( get_template_directory() . '/lib/init.php' );

/**
 * Define child theme constants.
 */
define( 'CHILD_THEME_NAME', '" . $child_name . "' );
define( 'CHILD_THEME_URL', '" . $author_uri . "' );
define( 'CHILD_THEME_VERSION', '1.0' );

add_filter( 'avatar_defaults', 'child_default_avatar' );
/**
 * Display a Custom Avatar if one exists with the correct name
 * and in the correct images directory.
 *
 * @since 1.0
 * @return custom avatar.
 */
function child_default_avatar( {$dollar_sign}avatar_defaults )
{
	{$dollar_sign}custom_avatar_image = '';
	if( file_exists( CHILD_DIR . '/images/custom-avatar.png' ) )
		{$dollar_sign}custom_avatar_image = CHILD_URL . '/images/custom-avatar.png';
	elseif( file_exists( CHILD_DIR . '/images/custom-avatar.jpg' ) )
		{$dollar_sign}custom_avatar_image = CHILD_URL . '/images/custom-avatar.jpg';
	elseif( file_exists( CHILD_DIR . '/images/custom-avatar.gif' ) )
		{$dollar_sign}custom_avatar_image = CHILD_URL . '/images/custom-avatar.gif';
	elseif( file_exists( CHILD_DIR . '/images/custom-avatar.jpg' ) )
		{$dollar_sign}custom_avatar_image = CHILD_URL . '/images/custom-avatar.jpg';

	{$dollar_sign}custom_avatar = apply_filters( 'child_custom_avatar_path', {$dollar_sign}custom_avatar_image );
	{$dollar_sign}avatar_defaults[{$dollar_sign}custom_avatar] = 'Custom Avatar';
	
	return {$dollar_sign}avatar_defaults;
}
{$nav_placement_comment}{$nav_1_action}{$nav_2_action}{$mobile_nav_functions}{$dropdown_menu_register}{$nav_dropdown_functions}{$responsive_viewport}{$custom_image_size_one}{$custom_image_size_two}{$custom_image_size_three}{$custom_image_size_four}{$custom_image_size_five}{$remove_page_titles}{$include_inpost_cpt_names}{$post_formats}{$html_five}{$fancy_dropdowns}{$conditional_functions}{$do_shortcode_text_widget}{$custom_labels}
{$ez_home_code}{$ez_home_sidebar_code}{$ez_home_slider_code}{$ez_feature_top_code}{$ez_fat_footer_code}{$ez_structures}{$custom_widget_areas}{$custom_hook_boxes}
/**
 * Filter in specific body classes based on option values.
 */
add_filter( 'body_class', 'child_body_classes' );
/**
 * Determine which classes will be filtered into the body class.
 *
 * @since 1.0
 * @return array of all classes to be filtered into the body class.
 */
function child_body_classes( {$dollar_sign}classes ) {
	if ( is_front_page() ) {
		{$ez_home_structure_classes}
		{$ez_home_sidebar_active_classes}
		{$ez_home_sidebar_left_classes}
		{$ez_home_slider_active_classes}
		{$ez_home_slider_inside_classes}
	}
	
	{$ez_feature_top_classes}
	{$ez_fat_footer_classes}
	{$site_fluid_classes}
	{$custom_labels_classes}

	{$dollar_sign}classes[] = 'override';
	
	return {$dollar_sign}classes;
}

add_filter( 'post_class', 'child_post_classes' );
/**
 * Create an array of useful post classes.
 *
 * @since 1.0
 * @return an array of child post classes.
 */
function child_post_classes( {$dollar_sign}classes )
{
	{$dollar_sign}classes[] = 'override';

	return {$dollar_sign}classes;
}

{$responsive_js_enqueue}
{$custom_js_enqueue}
{$custom_fucntions_content}

//end functions.php";

	if( dynamik_get_settings( 'responsive_enabled' ) )
		$responsive_js = file_get_contents( CHILD_DIR . '/lib/js/dynamik-responsive.js' );

	if( $include_js == 'yes' && file_exists( dynamik_get_custom_js_path() ) && 0 != filesize( dynamik_get_custom_js_path() ) )
		$custom_js = file_get_contents( dynamik_get_stylesheet_location( 'url' ) . 'custom-scripts.js' );

	$home_php ='<?php
/**
 * Build the basic structural wrap for the EZ Static Homepage.
 *
 * @package Dynamik
 */
 
get_header();
?>
<div id="home-hook-wrap" class="clearfix">
	<?php do_action( \'dynamik_hook_home\' ); ?>
</div><!-- end #home-hook-wrap -->
<?php
get_footer();

//end home.php';

	$style_file = $tmp_child . '/style.css';
	$make_style = fopen( $style_file, 'x' );
	fwrite( $make_style, $style_css );
	fclose ( $make_style );
	
	$functions_file = $tmp_child . '/functions.php';
	$make_functions = fopen( $functions_file, 'x' );
	fwrite( $make_functions, $functions_php );
	fclose ( $make_functions );
	
	if( dynamik_get_settings( 'responsive_enabled' ) )
	{
		$responsive_js_file = $tmp_js_folder . '/responsive.js';
		$make_responsive_js = fopen( $responsive_js_file, 'x' );
		fwrite( $make_responsive_js, $responsive_js );
		fclose ( $make_responsive_js );
	}

	if( $include_js == 'yes' && file_exists( dynamik_get_custom_js_path() ) && 0 != filesize( dynamik_get_custom_js_path() ) )
	{
		$custom_js_file = $tmp_js_folder . '/custom-scripts.js';
		$make_custom_js = fopen( $custom_js_file, 'x' );
		fwrite( $make_custom_js, $custom_js );
		fclose ( $make_custom_js );
	}
	else
	{
		$custom_js_file = '';
	}
	
	if( dynamik_get_design( 'dynamik_homepage_type' ) == 'static_home' )
	{
		$home_file = $tmp_child . '/home.php';
		$make_home = fopen( $home_file, 'x' );
		fwrite( $make_home, $home_php );
		fclose ( $make_home );
	}
	else
	{
		$home_file = '';
	}
	
	$handle = opendir( $image_folder );
	while( false !== ( $file = readdir( $handle ) ) )
	{
		$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
		if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
		{
			if( $file != 'screenshot.png' )
			{
				copy( $image_folder . '/' . $file, $tmp_image_folder . '/' . $file );
			}
			else
			{
				$screenshot = $file;
				copy( $image_folder . '/' . $file, $tmp_child . '/' . $file );
			}
		}
	}
	closedir( $handle );
	
	$handle2 = opendir( $dynamik_image_folder );
	while( false !== ( $file = readdir( $handle2 ) ) )
	{
		$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
		if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
		{
			if( $file != 'screenshot.png' )
				copy( $dynamik_image_folder . '/' . $file, $tmp_image_folder . '/' . $file );
			elseif( $file == 'screenshot.png' && empty( $screenshot ) )
				copy( $dynamik_image_folder . '/' . $file, $tmp_child . '/' . $file );
		}
	}
	closedir( $handle2 );
	
	if( dynamik_get_settings( 'post_formats_active' ) )
	{
		$handle3 = opendir( $dynamik_post_formats_image_folder );
		while( false !== ( $file = readdir( $handle3 ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
				copy( $dynamik_post_formats_image_folder . '/' . $file, $tmp_post_formats_image_folder . '/' . $file );
		}
		closedir( $handle3 );
	}

	if( $include_templates == 'yes' )
	{
		$handle4 = opendir( $dynamik_my_templates_folder );
		while( false !== ( $file = readdir( $handle4 ) ) )
		{
			if( $file !== "." && $file !== ".." )
				copy( $dynamik_my_templates_folder . '/' . $file, $tmp_my_templates_folder . '/' . $file );
		}
		closedir( $handle4 );

		$handle5 = opendir( CHILD_DIR );
		while( false !== ( $file = readdir( $handle5 ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'php' && $file != 'functions.php' && $file != 'home.php' )
			{
				$wp_templates_files = true;
				copy( CHILD_DIR . '/' . $file, $tmp_child . '/' . $file );
				$wp_template_files_array[] = $tmp_child . '/' . $file;
			}
		}
		closedir( $handle5 );
	}

	if( $include_labels == 'yes' && get_option( 'dynamik_gen_custom_labels' ) != array() )
	{
		$handle6 = opendir( $dynamik_metaboxes_folder );
		while( false !== ( $file = readdir( $handle6 ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'php' || $ext == 'css' || $ext == 'md' )
				copy( $dynamik_metaboxes_folder . '/' . $file, $tmp_metaboxes_folder . '/' . $file );
		}
		closedir( $handle6 );
		$handle7 = opendir( $dynamik_metaboxes_folder . '/js' );
		while( false !== ( $file = readdir( $handle7 ) ) )
		{
			if( $file !== "." && $file !== ".." )
				copy( $dynamik_metaboxes_folder . '/js/' . $file, $tmp_metaboxes_folder . '/js/' . $file );
		}
		closedir( $handle7 );
		$handle8 = opendir( $dynamik_metaboxes_folder . '/images' );
		while( false !== ( $file = readdir( $handle8 ) ) )
		{
			if( $file !== "." && $file !== ".." )
				copy( $dynamik_metaboxes_folder . '/images/' . $file, $tmp_metaboxes_folder . '/images/' . $file );
		}
		closedir( $handle8 );
	}
	
	$export_files = array( $style_file, $functions_file, $responsive_js_file, $custom_js_file, $home_file, $dat_file, $tmp_image_folder );
	if( count( scandir( $tmp_my_templates_folder ) ) > 2 )
	{
		$export_files[] = $tmp_my_templates_folder;
	}
	if( true == $wp_templates_files )
	{
		foreach( $wp_template_files_array as $key => $value )
		{
			$export_files[] = $value;
		}
	}
	if( $include_labels == 'yes' && get_option( 'dynamik_gen_custom_labels' ) != array() )
	{
		$export_files[] = $tmp_metaboxes_folder;
	}
	if( !empty( $screenshot ) )
	{
		$export_files[] = $tmp_child . '/' . $screenshot;
	}
	else
	{
		$export_files[] = $tmp_child . '/screenshot.png';
	}
	$dynamik_pclzip = new PclZip( $tmp_child . '/' . $child_export_zip );
	$dynamik_zipped = $dynamik_pclzip->create( $export_files, PCLZIP_OPT_REMOVE_PATH, $tmp_child );
	if( $dynamik_zipped == 0 )
	{
		die("Error : ".$dynamik_pclzip->errorInfo(true) );
	}
	
	if( ob_get_level() )
	{
		ob_end_clean();
	}
	header("Cache-Control: public, must-revalidate");
	header("Pragma: hack");
	header("Content-Type: application/zip");
	header("Content-Disposition: attachment; filename=$child_export_zip");
	readfile( $tmp_child . '/' . $child_export_zip );
	dynamik_delete_dir( $tmp_child );
	dynamik_folders_close_permissions();
	exit();
}

/**
 * Export the Dynamik Design settings.
 *
 * @since 1.0
 */
function dynamik_design_export( $export_name = false, $include_images = 'no' )
{
	$export_data = array();
	
	$export_data['dynamik_gen_design_options'] = get_option( 'dynamik_gen_design_options' );
	$export_data['dynamik_gen_responsive_options'] = get_option( 'dynamik_gen_responsive_options' );

	$dynamik_datestamp = date( 'YmdHis', dynamik_time() );
	if( $export_name )
	{
		$dynamik_export_dat = $export_name . '.dat';
	}
	else
	{
		$dynamik_export_dat = 'dynamik_design_' . $dynamik_datestamp . '.dat';
	}
	$cheerios = serialize( $export_data );
	
	if( $include_images == 'no' )
	{
		header( "Content-type: text/plain" );
		header( "Content-disposition: attachment; filename=$dynamik_export_dat" );
		header( "Content-Transfer-Encoding: binary" );
		header( "Pragma: no-cache" );
		header( "Expires: 0" );
		echo $cheerios; 
		exit();
	}
	else
	{
		dynamik_folders_open_permissions();
		require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php' );
		if( $export_name )
		{
			$dynamik_export_zip = $export_name . '.zip';
		}
		else
		{
			$dynamik_export_zip = 'dynamik_design_' . $dynamik_datestamp . '.zip';
		}
		$tmp_path = dynamik_get_stylesheet_location( 'path' ) . 'tmp';
		$dat_filename = $tmp_path . '/' . $dynamik_export_dat;
		$tmp_image_folder = $tmp_path . '/images';
		$tmp_adthumbs_folder = $tmp_image_folder . '/adminthumbnails';
		$image_folder = dynamik_get_stylesheet_location( 'path' ) . 'images';
		$adthumbs_folder = $image_folder . '/adminthumbnails';
		
		if( !is_dir( $tmp_path ) )
		{
			@mkdir( $tmp_path, 0755, true );
		}
		if( !is_dir( $tmp_image_folder ) )
		{
			@mkdir( $tmp_image_folder, 0755, true );
		}
		if( !is_dir( $tmp_adthumbs_folder ) )
		{
			@mkdir( $tmp_adthumbs_folder, 0755, true );
		}
		
		$dat_file = fopen( $dat_filename, 'x' );
		fwrite( $dat_file, $cheerios );
		fclose ( $dat_file );
		
		$handle = opendir( $image_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $image_folder . '/' . $file, $tmp_image_folder . '/' . $file );
			}
		}
		closedir( $handle );
		
		$handle = opendir( $adthumbs_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $adthumbs_folder . '/' . $file, $tmp_adthumbs_folder . '/' . $file );
			}
		}
		closedir( $handle );
	
		if( is_dir( $tmp_image_folder ) )
		{
			$export_files = array( $dat_filename, $tmp_image_folder );
		}
		else
		{
			$export_files = $dat_filename;
		}
		
		$dynamik_pclzip = new PclZip( $tmp_path . '/' . $dynamik_export_zip );
		$dynamik_zipped = $dynamik_pclzip->create( $export_files, PCLZIP_OPT_REMOVE_PATH, $tmp_path );
		if( $dynamik_zipped == 0 )
		{
			die( "Error : " . $dynamik_pclzip->errorInfo( true ) );
		}
		
		if( ob_get_level() )
		{
			ob_end_clean();
		}
		header( "Cache-Control: public, must-revalidate" );
		header( "Pragma: hack" );
		header( "Content-Type: application/zip" );
		header( "Content-Disposition: attachment; filename=$dynamik_export_zip" );
		readfile( $tmp_path . '/' . $dynamik_export_zip );
		unlink( $tmp_path . '/' . $dynamik_export_dat );
		unlink( $tmp_path . '/' . $dynamik_export_zip );
		dynamik_delete_images( $tmp_image_folder );
		dynamik_delete_images( $tmp_adthumbs_folder );
		dynamik_folders_close_permissions();
		exit();
	}
}

/**
 * Import the Dynamik Design settings.
 *
 * @since 1.0
 */
function dynamik_design_import( $import_file )
{
	$import_notice = 'import-complete';
	$pre_rem_import = false;
	
	if( 'zip' == strtolower( substr( strrchr( $import_file['name'], '.' ), 1 ) ) )
	{
		dynamik_folders_open_permissions();
		require_once( ABSPATH . 'wp-admin/includes/class-pclzip.php' );

		$tmp_path = dynamik_get_stylesheet_location( 'path' ) . 'tmp';
		$tmp_import_folder = $tmp_path . '/import';
		$tmp_image_folder = $tmp_import_folder . '/images';
		$tmp_adthumbs_folder = $tmp_image_folder . '/adminthumbnails';
		$image_folder = dynamik_get_stylesheet_location( 'path' ) . 'images';
		$adthumbs_folder = $image_folder . '/adminthumbnails';
		
		if( !is_dir( $tmp_path ) )
		{
			@mkdir( $tmp_path, 0755, true );
		}
		if( !is_dir( $tmp_import_folder ) )
		{
			@mkdir( $tmp_import_folder, 0755, true );
		}
		
		$import_tmp_name = $import_file['tmp_name'];
		$zip_file = new PclZip( $import_tmp_name );
		
		if( ( $unzip_result_list = $zip_file->extract( PCLZIP_OPT_PATH, $tmp_import_folder ) ) == 0 )
		{
			die("Error : " . $zip_file->errorInfo( true ) );
		}		
		
		$handle = opendir( $tmp_import_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'dat' )
			{				
				$import_data = file_get_contents( $tmp_import_folder . '/' . $file );
				$dynamik_design_import = unserialize( $import_data );
				
				/* If the Dynamik Design Import file is from a Catalyst/Dynamik Export */
				if( isset( $dynamik_design_import['catalyst_dynamik_options']['body_bg_type'] ) )
				{
					$ez_select_find = array( 'wide_left', 'wide_right' );
					$ez_select_replace = array( 'wl', 'wr' );
					$ez_homepage_select = str_replace( $ez_select_find, $ez_select_replace, $dynamik_design_import['catalyst_dynamik_options']['ez_homepage_select'] );
					$ez_feature_top_select = str_replace( $ez_select_find, $ez_select_replace, $dynamik_design_import['catalyst_dynamik_options']['ez_feature_top_select'] );
					$ez_fat_footer_select = str_replace( $ez_select_find, $ez_select_replace, $dynamik_design_import['catalyst_dynamik_options']['ez_fat_footer_select'] );
					
					if( $dynamik_design_import['catalyst_dynamik_options']['ez_widget_footer_border_type'] == 'Top' )
					{
						$ez_widget_footer_border_type = 'Bottom';
					}
					elseif( $dynamik_design_import['catalyst_dynamik_options']['ez_widget_footer_border_type'] == 'Bottom' )
					{
						$ez_widget_footer_border_type = 'Top';
					}
					else
					{
						$ez_widget_footer_border_type = $dynamik_design_import['catalyst_dynamik_options']['ez_widget_footer_border_type'];
					}

					$unique_to_genesis = array(
						'inner_tb_padding' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_tb_padding'],
						'inner_lr_padding' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_lr_padding'],
						'header_title_area_width' => $dynamik_design_import['catalyst_dynamik_options']['header_left_width'],
						'header_widget_width' => $dynamik_design_import['catalyst_dynamik_options']['header_right_width'],
						'nav1_extras_font_size' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_font_size'],
						'nav1_extras_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_font_color'],
						'nav1_extras_font_css' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_font_css'],
						'nav1_extras_link_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_link_color'],
						'nav1_extras_link_hover_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_link_hover_color'],
						'nav1_extras_link_underline' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_link_underline'],
						'nav1_extras_px_em' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_px_em'],
						'nav3_font_size' => $dynamik_design_import['catalyst_dynamik_options']['nav1_font_size'],
						'nav3_px_em' => $dynamik_design_import['catalyst_dynamik_options']['nav1_px_em'],
						'nav3_font_css' => $dynamik_design_import['catalyst_dynamik_options']['nav1_font_css'],
						'nav3_link_underline' => $dynamik_design_import['catalyst_dynamik_options']['nav1_link_underline'],
						'nav3_page_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_font_color'],
						'nav3_page_hover_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_font_color'],
						'nav3_page_active_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_font_color'],
						'nav3_sub_page_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_font_color'],
						'nav3_sub_page_hover_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_font_color'],
						'nav3_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_type'],
						'nav3_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_no_color'] ) ? 1 : 0,
						'nav3_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_color'],
						'nav3_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_image'],
						'nav3_page_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_type'],
						'nav3_page_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_no_color'] ) ? 1 : 0,
						'nav3_page_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_color'],
						'nav3_page_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_image'],
						'nav3_page_hover_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_type'],
						'nav3_page_hover_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_no_color'] ) ? 1 : 0,
						'nav3_page_hover_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_color'],
						'nav3_page_hover_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_image'],
						'nav3_page_active_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_type'],
						'nav3_page_active_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_no_color'] ) ? 1 : 0,
						'nav3_page_active_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_color'],
						'nav3_page_active_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_image'],
						'nav3_sub_page_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_type'],
						'nav3_sub_page_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_no_color'] ) ? 1 : 0,
						'nav3_sub_page_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_color'],
						'nav3_sub_page_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_image'],
						'nav3_sub_page_hover_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_type'],
						'nav3_sub_page_hover_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_no_color'] ) ? 1 : 0,
						'nav3_sub_page_hover_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_color'],
						'nav3_sub_page_hover_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_image'],
						'nav3_border_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_type'],
						'nav3_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_thickness'],
						'nav3_border_style' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_style'],
						'nav3_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_color'],
						'nav3_page_top_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_top_border_thickness'],
						'nav3_page_bottom_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bottom_border_thickness'],
						'nav3_page_left_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_left_border_thickness'],
						'nav3_page_right_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_right_border_thickness'],
						'nav3_page_border_style' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_border_style'],
						'nav3_page_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_border_color'],
						'nav3_page_hover_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_border_color'],
						'nav3_page_active_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_border_color'],
						'nav3_wrap_top_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_wrap_top_margin'],
						'nav3_wrap_bottom_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_wrap_bottom_margin'],
						'nav3_page_left_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_left_margin'],
						'nav3_page_right_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_right_margin'],
						'nav3_page_tb_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_tb_padding'],
						'nav3_page_lr_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_lr_padding'],
						'nav3_submenu_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_border_color'],
						'nav3_submenu_width' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_width'],
						'nav3_submenu_tb_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_tb_padding'],
						'nav3_submenu_lr_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_lr_padding'],
						'nav3_sub_indicator_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_type'],
						'nav3_sub_indicator_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_image'],
						'nav3_sub_indicator_width' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_width'],
						'nav3_sub_indicator_height' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_height'],
						'nav3_sub_indicator_top' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_top'],
						'nav3_sub_indicator_right' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_right'],
						'content_padding_top' => '0',
						'content_padding_right' => '0',
						'content_padding_bottom' => '0',
						'content_padding_left' => '0',
						'cc_width_dbl_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
						'sb1_width_dbl_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
						'sb2_width_dbl_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb2_width'],
						'cc_width_dbl_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
						'sb1_width_dbl_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
						'sb2_width_dbl_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb2_width'],
						'cc_width_dbl_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
						'sb1_width_dbl_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
						'sb2_width_dbl_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb2_width'],
						'cc_width_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
						'sb1_width_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
						'cc_width_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
						'sb1_width_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
						'cc_width_no_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
						'ez_homepage_select' => preg_replace( '/\.php$/', '', $ez_homepage_select ),
						'ez_home_slider_height' => $dynamik_design_import['catalyst_dynamik_options']['ez_home_slider_height'] . 'px',
						'ez_feature_top_position' => $dynamik_design_import['catalyst_dynamik_options']['ez_feature_top_position'] == 'inside_wrap' ? 'inside_inner' : 'outside_inner',
						'ez_feature_top_select' => preg_replace( '/\.php$/', '', $ez_feature_top_select ),
						'ez_fat_footer_position' => $dynamik_design_import['catalyst_dynamik_options']['ez_fat_footer_position'] == 'inside_footer' ? 'outside_inner' : 'inside_inner',
						'ez_fat_footer_select' => preg_replace( '/\.php$/', '', $ez_fat_footer_select ),
						'ez_widget_footer_border_type' => $ez_widget_footer_border_type,
						'taxonomy_box_heading_font_size' => $dynamik_design_import['catalyst_dynamik_options']['breadcrumbs_font_size'],
						'taxonomy_box_content_font_size' => $dynamik_design_import['catalyst_dynamik_options']['breadcrumbs_font_size'],
						'taxonomy_box_heading_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
						'taxonomy_box_content_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
						'featured_widget_heading_font_size' => $dynamik_design_import['catalyst_dynamik_options']['excerpt_widget_heading_font_size'],
						'featured_widget_byline_font_size' => $dynamik_design_import['catalyst_dynamik_options']['excerpt_widget_byline_font_size'],
						'featured_widget_p_font_size' => $dynamik_design_import['catalyst_dynamik_options']['excerpt_widget_p_font_size'],
						'dynamik_widget_title_font_size' => $dynamik_design_import['catalyst_dynamik_options']['catalyst_widget_title_font_size'],
						'dynamik_widget_content_font_size' => $dynamik_design_import['catalyst_dynamik_options']['catalyst_widget_content_font_size'],
						'featured_widget_heading_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
						'featured_widget_byline_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
						'featured_widget_p_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
						'dynamik_widget_title_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
						'dynamik_widget_content_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
						'author_box_title_font_size' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_font_size'],
						'author_box_title_font_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_font_color'],
						'author_box_title_font_css' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_font_css'],
						'author_box_font_size' => $dynamik_design_import['catalyst_dynamik_options']['author_info_font_size'],
						'author_box_font_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_font_color'],
						'author_box_font_css' => $dynamik_design_import['catalyst_dynamik_options']['author_info_font_css'],
						'author_box_link_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_link_color'],
						'author_box_link_hover_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_link_hover_color'],
						'author_box_link_underline' => $dynamik_design_import['catalyst_dynamik_options']['author_info_link_underline'],
						'author_box_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_type'],
						'author_box_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_no_color'] ) ? 1 : 0,
						'author_box_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_color'],
						'author_box_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_image'],
						'author_box_avatar_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_type'],
						'author_box_avatar_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_no_color'] ) ? 1 : 0,
						'author_box_avatar_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_color'],
						'author_box_avatar_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_image'],
						'author_box_border_type' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_type'],
						'author_box_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_thickness'],
						'author_box_border_style' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_style'],
						'author_box_border_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_color'],
						'author_box_avatar_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_border_thickness'],
						'author_box_avatar_border_style' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_border_style'],
						'author_box_avatar_border_color' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_border_color'],
						'author_box_avatar_size' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_size'],
						'author_box_avatar_padding' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_padding'],
						'author_box_margin_top' => $dynamik_design_import['catalyst_dynamik_options']['author_info_margin_top'],
						'author_box_margin_bottom' => $dynamik_design_import['catalyst_dynamik_options']['author_info_margin_bottom'],
						'author_box_padding_top' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_top'],
						'author_box_padding_right' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_right'],
						'author_box_padding_bottom' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_bottom'],
						'author_box_padding_left' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_left'],
						'author_box_title_px_em' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_px_em'],
						'author_box_px_em' => $dynamik_design_import['catalyst_dynamik_options']['author_info_px_em']
					);
			
					if( $dynamik_design_import['catalyst_dynamik_options']['wrap_open_placement'] == 'wrap_open_after_after_header' &&
					$dynamik_design_import['catalyst_dynamik_options']['wrap_close_placement'] == 'wrap_close_before_before_footer' )
					{
						/* Wrap Structure is 'fluid' */
						$unique_to_genesis_fixed_fluid = array(
							'wrap_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['body_bg_type'],
							'wrap_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['body_bg_no_color'] ) ? 1 : 0,
							'wrap_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['body_bg_color'],
							'wrap_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['body_bg_image'],
							'inner_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_type'],
							'inner_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_no_color'] ) ? 1 : 0,
							'inner_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_color'],
							'inner_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_image'],
							'inner_border_type' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_type'],
							'inner_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_thickness'],
							'inner_border_style' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_style'],
							'inner_border_color' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_color'],
							'inner_shadow_active' => !empty( $dynamik_design_import['catalyst_dynamik_options']['wrap_shadow_active'] ) ? 1 : 0,
							'inner_shadow_style' => $dynamik_design_import['catalyst_dynamik_options']['wrap_shadow_style'],
							'inner_radius_active' => !empty( $dynamik_design_import['catalyst_dynamik_options']['wrap_radius_active'] ) ? 1 : 0,
							'inner_radius_style' => $dynamik_design_import['catalyst_dynamik_options']['wrap_radius_style'],
							'inner_top_margin' => $dynamik_design_import['catalyst_dynamik_options']['wrap_top_margin'],
							'inner_bottom_margin' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bottom_margin'],
							'wrap_structure' => 'fluid'
						);
					}
					else
					{
						/* Wrap Structure is 'fixed' */
						$unique_to_genesis_fixed_fluid = array(
							'inner_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_type'],
							'inner_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_no_color'] ) ? 1 : 0,
							'inner_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_color'],
							'inner_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_image'],
							'wrap_structure' => 'fixed'
						);
					}
					$unique_to_genesis = array_merge( $unique_to_genesis, $unique_to_genesis_fixed_fluid );
					
					$dynamik_design_options_defaults = dynamik_design_options_defaults();
					
					$dynamik_design_import['catalyst_dynamik_options']['font_type'] = array_merge( $dynamik_design_options_defaults['font_type'], $dynamik_design_import['catalyst_dynamik_options']['font_type'] );
					$design_import_merge_unique = array_merge( $dynamik_design_import['catalyst_dynamik_options'], $unique_to_genesis );
					$design_import_catalyst = array_merge( dynamik_design_options_defaults(), $design_import_merge_unique );
					$pre_rem_import = true;
					$design_import = array_merge( dynamik_design_options_defaults( false, false, $design_import_catalyst ), $design_import_catalyst );	

					// With the addition of the Media Query Width Options we now need to pull in the
					// Imported version of the media_wrap_width value to ensure a proper Import
					$media_wrap_width = $dynamik_design_import['catalyst_responsive_options']['media_wrap_width'];
					$responsive_media_query_widths = array(
						'media_query_large_cascading_width' => $media_wrap_width,
						'dynamik_media_query_large_max_width' => $media_wrap_width,
						'dynamik_media_query_medium_large_max_width' => $media_wrap_width
					);
					$responsive_pre_import = array_merge( $dynamik_design_import['catalyst_responsive_options'], $responsive_media_query_widths );
					$responsive_import = array_merge( dynamik_responsive_options_defaults(), $responsive_pre_import );
					$import_notice = 'import-catalyst-complete';
				} /* ElseIf the Dynamik Design Import file is from an older/incompatible Catalyst/Dynamik Export */
				elseif( isset( $dynamik_design_import['body_bg_type'] ) )
				{
					$import_notice = 'import-error-catalyst';
				}
				else
				{
					$pre_rem_import = !empty( $dynamik_design_import['dynamik_gen_design_options']['content_p_px_em'] ) ? true : false;
					$design_import = array_merge( dynamik_design_options_defaults( false, false, $dynamik_design_import['dynamik_gen_design_options'] ), $dynamik_design_import['dynamik_gen_design_options'] );
					
					if( true == $pre_rem_import )
					{
						// With the addition of the Media Query Width Options we now need to pull in the
						// Imported version of the media_wrap_width value to ensure a proper Import
						$media_wrap_width = $dynamik_design_import['dynamik_gen_responsive_options']['media_wrap_width'];
						$responsive_media_query_widths = array(
							'media_query_large_cascading_width' => $media_wrap_width,
							'dynamik_media_query_large_max_width' => $media_wrap_width,
							'dynamik_media_query_medium_large_max_width' => $media_wrap_width
						);
						$responsive_pre_import = array_merge( dynamik_responsive_options_defaults(), $dynamik_design_import['dynamik_gen_responsive_options'] );
						$responsive_import = array_merge( $responsive_pre_import, $responsive_media_query_widths );
					}
					else
					{
						$responsive_import = array_merge( dynamik_responsive_options_defaults(), $dynamik_design_import['dynamik_gen_responsive_options'] );
					}
				}
				
				if( $import_notice != 'import-error-catalyst' )
				{
					// If the Import file is a pre-rem import then update Design Options
					// while converting font sizes accordingly, otherwise perform a basic update_option
					if( true == $pre_rem_import )
						dynamik_update_design_px_em_conversion( $design_import );
					else
						update_option( 'dynamik_gen_design_options', $design_import );

					update_option( 'dynamik_gen_responsive_options', $responsive_import );
				}
			}
		}
		closedir( $handle );
		
		$handle = opendir( $tmp_image_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $tmp_image_folder . '/' . $file, $image_folder . '/' . $file );
			}
		}
		closedir( $handle );
		
		$handle = opendir( $tmp_adthumbs_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $tmp_adthumbs_folder . '/' . $file, $adthumbs_folder . '/' . $file );
			}
		}
		closedir( $handle );
		
		dynamik_delete_dir( $tmp_import_folder );
		dynamik_folders_close_permissions();
		
		if( $import_notice != 'import-error-catalyst' )
		{
			dynamik_write_files( $css = true, $ez = true, $custom = false );
		}
		wp_redirect( admin_url( 'admin.php?page=dynamik-design&activetab=dynamik-design-options-nav-import-export&notice=' . $import_notice ) );
		exit();
	}	
	elseif( 'dat' == strtolower( substr( strrchr( $import_file['name'], '.' ), 1 ) ) )
	{
		$import_data = file_get_contents( $import_file['tmp_name'] );
		$dynamik_design_import = unserialize( $import_data );

		/* If the Dynamik Design Import file is from a Catalyst/Dynamik Export */
		if( isset( $dynamik_design_import['catalyst_dynamik_options']['body_bg_type'] ) )
		{
			$ez_select_find = array( 'wide_left', 'wide_right' );
			$ez_select_replace = array( 'wl', 'wr' );
			$ez_homepage_select = str_replace( $ez_select_find, $ez_select_replace, $dynamik_design_import['catalyst_dynamik_options']['ez_homepage_select'] );
			$ez_feature_top_select = str_replace( $ez_select_find, $ez_select_replace, $dynamik_design_import['catalyst_dynamik_options']['ez_feature_top_select'] );
			$ez_fat_footer_select = str_replace( $ez_select_find, $ez_select_replace, $dynamik_design_import['catalyst_dynamik_options']['ez_fat_footer_select'] );
			
			if( $dynamik_design_import['catalyst_dynamik_options']['ez_widget_footer_border_type'] == 'Top' )
			{
				$ez_widget_footer_border_type = 'Bottom';
			}
			elseif( $dynamik_design_import['catalyst_dynamik_options']['ez_widget_footer_border_type'] == 'Bottom' )
			{
				$ez_widget_footer_border_type = 'Top';
			}
			else
			{
				$ez_widget_footer_border_type = $dynamik_design_import['catalyst_dynamik_options']['ez_widget_footer_border_type'];
			}

			$unique_to_genesis = array(
				'inner_tb_padding' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_tb_padding'],
				'inner_lr_padding' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_lr_padding'],
				'header_title_area_width' => $dynamik_design_import['catalyst_dynamik_options']['header_left_width'],
				'header_widget_width' => $dynamik_design_import['catalyst_dynamik_options']['header_right_width'],
				'nav1_extras_font_size' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_font_size'],
				'nav1_extras_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_font_color'],
				'nav1_extras_font_css' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_font_css'],
				'nav1_extras_link_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_link_color'],
				'nav1_extras_link_hover_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_link_hover_color'],
				'nav1_extras_link_underline' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_link_underline'],
				'nav1_extras_px_em' => $dynamik_design_import['catalyst_dynamik_options']['nav1_right_px_em'],
				'nav3_font_size' => $dynamik_design_import['catalyst_dynamik_options']['nav1_font_size'],
				'nav3_px_em' => $dynamik_design_import['catalyst_dynamik_options']['nav1_px_em'],
				'nav3_font_css' => $dynamik_design_import['catalyst_dynamik_options']['nav1_font_css'],
				'nav3_link_underline' => $dynamik_design_import['catalyst_dynamik_options']['nav1_link_underline'],
				'nav3_page_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_font_color'],
				'nav3_page_hover_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_font_color'],
				'nav3_page_active_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_font_color'],
				'nav3_sub_page_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_font_color'],
				'nav3_sub_page_hover_font_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_font_color'],
				'nav3_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_type'],
				'nav3_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_no_color'] ) ? 1 : 0,
				'nav3_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_color'],
				'nav3_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_bg_image'],
				'nav3_page_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_type'],
				'nav3_page_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_no_color'] ) ? 1 : 0,
				'nav3_page_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_color'],
				'nav3_page_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bg_image'],
				'nav3_page_hover_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_type'],
				'nav3_page_hover_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_no_color'] ) ? 1 : 0,
				'nav3_page_hover_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_color'],
				'nav3_page_hover_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_bg_image'],
				'nav3_page_active_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_type'],
				'nav3_page_active_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_no_color'] ) ? 1 : 0,
				'nav3_page_active_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_color'],
				'nav3_page_active_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_bg_image'],
				'nav3_sub_page_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_type'],
				'nav3_sub_page_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_no_color'] ) ? 1 : 0,
				'nav3_sub_page_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_color'],
				'nav3_sub_page_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_bg_image'],
				'nav3_sub_page_hover_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_type'],
				'nav3_sub_page_hover_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_no_color'] ) ? 1 : 0,
				'nav3_sub_page_hover_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_color'],
				'nav3_sub_page_hover_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_page_hover_bg_image'],
				'nav3_border_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_type'],
				'nav3_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_thickness'],
				'nav3_border_style' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_style'],
				'nav3_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_border_color'],
				'nav3_page_top_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_top_border_thickness'],
				'nav3_page_bottom_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_bottom_border_thickness'],
				'nav3_page_left_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_left_border_thickness'],
				'nav3_page_right_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_right_border_thickness'],
				'nav3_page_border_style' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_border_style'],
				'nav3_page_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_border_color'],
				'nav3_page_hover_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_hover_border_color'],
				'nav3_page_active_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_active_border_color'],
				'nav3_wrap_top_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_wrap_top_margin'],
				'nav3_wrap_bottom_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_wrap_bottom_margin'],
				'nav3_page_left_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_left_margin'],
				'nav3_page_right_margin' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_right_margin'],
				'nav3_page_tb_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_tb_padding'],
				'nav3_page_lr_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_page_lr_padding'],
				'nav3_submenu_border_color' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_border_color'],
				'nav3_submenu_width' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_width'],
				'nav3_submenu_tb_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_tb_padding'],
				'nav3_submenu_lr_padding' => $dynamik_design_import['catalyst_dynamik_options']['nav1_submenu_lr_padding'],
				'nav3_sub_indicator_type' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_type'],
				'nav3_sub_indicator_image' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_image'],
				'nav3_sub_indicator_width' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_width'],
				'nav3_sub_indicator_height' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_height'],
				'nav3_sub_indicator_top' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_top'],
				'nav3_sub_indicator_right' => $dynamik_design_import['catalyst_dynamik_options']['nav1_sub_indicator_right'],
				'content_padding_top' => '0',
				'content_padding_right' => '0',
				'content_padding_bottom' => '0',
				'content_padding_left' => '0',
				'cc_width_dbl_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
				'sb1_width_dbl_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
				'sb2_width_dbl_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb2_width'],
				'cc_width_dbl_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
				'sb1_width_dbl_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
				'sb2_width_dbl_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb2_width'],
				'cc_width_dbl_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
				'sb1_width_dbl_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
				'sb2_width_dbl_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb2_width'],
				'cc_width_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
				'sb1_width_rt_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
				'cc_width_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
				'sb1_width_lft_sb' => $dynamik_design_import['catalyst_dynamik_options']['sb1_width'],
				'cc_width_no_sb' => $dynamik_design_import['catalyst_dynamik_options']['cc_width'],
				'ez_homepage_select' => preg_replace( '/\.php$/', '', $ez_homepage_select ),
				'ez_home_slider_height' => $dynamik_design_import['catalyst_dynamik_options']['ez_home_slider_height'] . 'px',
				'ez_feature_top_position' => $dynamik_design_import['catalyst_dynamik_options']['ez_feature_top_position'] == 'inside_wrap' ? 'inside_inner' : 'outside_inner',
				'ez_feature_top_select' => preg_replace( '/\.php$/', '', $ez_feature_top_select ),
				'ez_fat_footer_position' => $dynamik_design_import['catalyst_dynamik_options']['ez_fat_footer_position'] == 'inside_footer' ? 'outside_inner' : 'inside_inner',
				'ez_fat_footer_select' => preg_replace( '/\.php$/', '', $ez_fat_footer_select ),
				'ez_widget_footer_border_type' => $ez_widget_footer_border_type,
				'taxonomy_box_heading_font_size' => $dynamik_design_import['catalyst_dynamik_options']['breadcrumbs_font_size'],
				'taxonomy_box_content_font_size' => $dynamik_design_import['catalyst_dynamik_options']['breadcrumbs_font_size'],
				'taxonomy_box_heading_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
				'taxonomy_box_content_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
				'featured_widget_heading_font_size' => $dynamik_design_import['catalyst_dynamik_options']['excerpt_widget_heading_font_size'],
				'featured_widget_byline_font_size' => $dynamik_design_import['catalyst_dynamik_options']['excerpt_widget_byline_font_size'],
				'featured_widget_p_font_size' => $dynamik_design_import['catalyst_dynamik_options']['excerpt_widget_p_font_size'],
				'dynamik_widget_title_font_size' => $dynamik_design_import['catalyst_dynamik_options']['catalyst_widget_title_font_size'],
				'dynamik_widget_content_font_size' => $dynamik_design_import['catalyst_dynamik_options']['catalyst_widget_content_font_size'],
				'featured_widget_heading_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
				'featured_widget_byline_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
				'featured_widget_p_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
				'dynamik_widget_title_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
				'dynamik_widget_content_px_em' => $dynamik_design_import['catalyst_dynamik_options']['content_p_px_em'],
				'author_box_title_font_size' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_font_size'],
				'author_box_title_font_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_font_color'],
				'author_box_title_font_css' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_font_css'],
				'author_box_font_size' => $dynamik_design_import['catalyst_dynamik_options']['author_info_font_size'],
				'author_box_font_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_font_color'],
				'author_box_font_css' => $dynamik_design_import['catalyst_dynamik_options']['author_info_font_css'],
				'author_box_link_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_link_color'],
				'author_box_link_hover_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_link_hover_color'],
				'author_box_link_underline' => $dynamik_design_import['catalyst_dynamik_options']['author_info_link_underline'],
				'author_box_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_type'],
				'author_box_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_no_color'] ) ? 1 : 0,
				'author_box_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_color'],
				'author_box_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['author_info_bg_image'],
				'author_box_avatar_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_type'],
				'author_box_avatar_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_no_color'] ) ? 1 : 0,
				'author_box_avatar_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_color'],
				'author_box_avatar_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_bg_image'],
				'author_box_border_type' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_type'],
				'author_box_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_thickness'],
				'author_box_border_style' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_style'],
				'author_box_border_color' => $dynamik_design_import['catalyst_dynamik_options']['author_info_border_color'],
				'author_box_avatar_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_border_thickness'],
				'author_box_avatar_border_style' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_border_style'],
				'author_box_avatar_border_color' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_border_color'],
				'author_box_avatar_size' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_size'],
				'author_box_avatar_padding' => $dynamik_design_import['catalyst_dynamik_options']['author_avatar_padding'],
				'author_box_margin_top' => $dynamik_design_import['catalyst_dynamik_options']['author_info_margin_top'],
				'author_box_margin_bottom' => $dynamik_design_import['catalyst_dynamik_options']['author_info_margin_bottom'],
				'author_box_padding_top' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_top'],
				'author_box_padding_right' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_right'],
				'author_box_padding_bottom' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_bottom'],
				'author_box_padding_left' => $dynamik_design_import['catalyst_dynamik_options']['author_info_padding_left'],
				'author_box_title_px_em' => $dynamik_design_import['catalyst_dynamik_options']['author_info_title_px_em'],
				'author_box_px_em' => $dynamik_design_import['catalyst_dynamik_options']['author_info_px_em']
			);
			
			if( $dynamik_design_import['catalyst_dynamik_options']['wrap_open_placement'] == 'wrap_open_after_after_header' &&
			$dynamik_design_import['catalyst_dynamik_options']['wrap_close_placement'] == 'wrap_close_before_before_footer' )
			{
				/* Wrap Structure is 'fluid' */
				$unique_to_genesis_fixed_fluid = array(
					'wrap_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['body_bg_type'],
					'wrap_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['body_bg_no_color'] ) ? 1 : 0,
					'wrap_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['body_bg_color'],
					'wrap_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['body_bg_image'],
					'inner_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_type'],
					'inner_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_no_color'] ) ? 1 : 0,
					'inner_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_color'],
					'inner_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bg_image'],
					'inner_border_type' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_type'],
					'inner_border_thickness' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_thickness'],
					'inner_border_style' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_style'],
					'inner_border_color' => $dynamik_design_import['catalyst_dynamik_options']['wrap_border_color'],
					'inner_shadow_active' => !empty( $dynamik_design_import['catalyst_dynamik_options']['wrap_shadow_active'] ) ? 1 : 0,
					'inner_shadow_style' => $dynamik_design_import['catalyst_dynamik_options']['wrap_shadow_style'],
					'inner_radius_active' => !empty( $dynamik_design_import['catalyst_dynamik_options']['wrap_radius_active'] ) ? 1 : 0,
					'inner_radius_style' => $dynamik_design_import['catalyst_dynamik_options']['wrap_radius_style'],
					'inner_top_margin' => $dynamik_design_import['catalyst_dynamik_options']['wrap_top_margin'],
					'inner_bottom_margin' => $dynamik_design_import['catalyst_dynamik_options']['wrap_bottom_margin'],
					'wrap_structure' => 'fluid'
				);
			}
			else
			{
				/* Wrap Structure is 'fixed' */
				$unique_to_genesis_fixed_fluid = array(
					'inner_bg_type' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_type'],
					'inner_bg_no_color' => !empty( $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_no_color'] ) ? 1 : 0,
					'inner_bg_color' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_color'],
					'inner_bg_image' => $dynamik_design_import['catalyst_dynamik_options']['container_wrap_bg_image'],
					'wrap_structure' => 'fixed'
				);
			}
			$unique_to_genesis = array_merge( $unique_to_genesis, $unique_to_genesis_fixed_fluid );
			
			$dynamik_design_options_defaults = dynamik_design_options_defaults();
			
			$dynamik_design_import['catalyst_dynamik_options']['font_type'] = array_merge( $dynamik_design_options_defaults['font_type'], $dynamik_design_import['catalyst_dynamik_options']['font_type'] );
			$design_import_merge_unique = array_merge( $dynamik_design_import['catalyst_dynamik_options'], $unique_to_genesis );
			$design_import_catalyst = array_merge( dynamik_design_options_defaults(), $design_import_merge_unique );
			$pre_rem_import = true;
			$design_import = array_merge( dynamik_design_options_defaults( false, false, $design_import_catalyst ), $design_import_catalyst );	

			// With the addition of the Media Query Width Options we now need to pull in the
			// Imported version of the media_wrap_width value to ensure a proper Import
			$media_wrap_width = $dynamik_design_import['catalyst_responsive_options']['media_wrap_width'];
			$responsive_media_query_widths = array(
				'media_query_large_cascading_width' => $media_wrap_width,
				'dynamik_media_query_large_max_width' => $media_wrap_width,
				'dynamik_media_query_medium_large_max_width' => $media_wrap_width
			);
			$responsive_pre_import = array_merge( $dynamik_design_import['catalyst_responsive_options'], $responsive_media_query_widths );
			$responsive_import = array_merge( dynamik_responsive_options_defaults(), $responsive_pre_import );
			$import_notice = 'import-catalyst-complete';
		} /* ElseIf the Dynamik Design Import file is from an older/incompatible Catalyst/Dynamik Export */
		elseif( isset( $dynamik_design_import['body_bg_type'] ) )
		{
			$import_notice = 'import-error-catalyst';
		}
		else
		{
			$pre_rem_import = !empty( $dynamik_design_import['dynamik_gen_design_options']['content_p_px_em'] ) ? true : false;
			$design_import = array_merge( dynamik_design_options_defaults( false, false, $dynamik_design_import['dynamik_gen_design_options'] ), $dynamik_design_import['dynamik_gen_design_options'] );
			
			if( true == $pre_rem_import )
			{
				// With the addition of the Media Query Width Options we now need to pull in the
				// Imported version of the media_wrap_width value to ensure a proper Import
				$media_wrap_width = $dynamik_design_import['dynamik_gen_responsive_options']['media_wrap_width'];
				$responsive_media_query_widths = array(
					'media_query_large_cascading_width' => $media_wrap_width,
					'dynamik_media_query_large_max_width' => $media_wrap_width,
					'dynamik_media_query_medium_large_max_width' => $media_wrap_width
				);
				$responsive_pre_import = array_merge( dynamik_responsive_options_defaults(), $dynamik_design_import['dynamik_gen_responsive_options'] );
				$responsive_import = array_merge( $responsive_pre_import, $responsive_media_query_widths );
			}
			else
			{
				$responsive_import = array_merge( dynamik_responsive_options_defaults(), $dynamik_design_import['dynamik_gen_responsive_options'] );
			}
		}

		if( $import_notice != 'import-error-catalyst' )
		{
			// If the Import file is a pre-rem import then update Design Options
			// while converting font sizes accordingly, otherwise perform a basic update_option
			if( true == $pre_rem_import )
				dynamik_update_design_px_em_conversion( $design_import );
			else
				update_option( 'dynamik_gen_design_options', $design_import );

			update_option( 'dynamik_gen_responsive_options', $responsive_import );
		
			dynamik_write_files( $css = true, $ez = true, $custom = false );
		}
		wp_redirect( admin_url( 'admin.php?page=dynamik-design&activetab=dynamik-design-options-nav-import-export&notice=' . $import_notice ) );
		exit();
	}
	else
	{
		wp_redirect( admin_url( 'admin.php?page=dynamik-design&activetab=dynamik-design-options-nav-import-export&notice=import-error' ) );
		exit();
	}
}

/**
 * Update the dynamik_gen_design_snapshot_options array with the latest Dynamik Settings.
 *
 * @since 1.0
 */
function dynamik_design_snapshot_update( $activation = false )
{
	$dynamik_design_snapshot_options['design_options'] = dynamik_get_design( null, $args = array( 'cached' => true, 'array' => true ) );
	$dynamik_design_snapshot_options['responsive_options'] = dynamik_get_responsive( null, $args = array( 'cached' => true, 'array' => true ) );
	$dynamik_design_snapshot_options['timestamp'] = gmdate( 'Y-m-d H:i:s', ( time() + ( get_option( 'gmt_offset' ) * 3600 ) ) );
	$dynamik_design_snapshot_options['dynamik_snapshot_options'] = !$activation ? $_POST['dynamik'] : ' ';

	update_option( 'dynamik_gen_design_snapshot_options', $dynamik_design_snapshot_options );
	
	if( !$activation )
	{
		wp_redirect( admin_url( 'admin.php?page=dynamik-design&activetab=dynamik-design-options-nav-import-export&notice=snapshot-update-complete' ) );
		exit();
	}
}

/**
 * Restore the dynamik_gen_design_snapshot_options array with the most recent Dynamik Settings Snapshot.
 *
 * @since 1.0
 */
function dynamik_design_snapshot_restore()
{
	$dynamik_design_snapshot_options = get_option( 'dynamik_gen_design_snapshot_options' );
	$dynamik_design_options_restore = array_merge( dynamik_design_options_defaults( false, false, $dynamik_design_snapshot_options['design_options'] ), $dynamik_design_snapshot_options['design_options'] );
	update_option( 'dynamik_gen_design_options', $dynamik_design_options_restore );
	$responsive_options_restore = array_merge( dynamik_responsive_options_defaults(), $dynamik_design_snapshot_options['responsive_options'] );
	update_option( 'dynamik_gen_responsive_options', $responsive_options_restore );
	
	dynamik_write_files( $css = true, $ez = true, $custom = false );
	wp_redirect( admin_url( 'admin.php?page=dynamik-design&activetab=dynamik-design-options-nav-import-export&notice=snapshot-restore-complete' ) );
	exit();
}

/**
 * Export the specified Custom Option settings.
 *
 * @since 1.0
 */
function dynamik_custom_export( $export_name = false, $theme_settings = '', $custom_css = '', $custom_functions = '', $custom_js = '', $custom_templates = '', $custom_labels = '', $conditionals = '', $widget_areas = '', $hook_boxes = '' )
{
	$export_data = array();
	
	if( !empty( $theme_settings ) )
	{
		$export_data['dynamik_theme_settings'] = get_option( 'dynamik_gen_theme_settings' );
	}
	
	if( !empty( $custom_css ) )
	{
		$export_data['dynamik_custom_css'] = get_option( 'dynamik_gen_custom_css' );
	}
	
	if( !empty( $custom_functions ) )
	{
		$export_data['dynamik_custom_functions'] = get_option( 'dynamik_gen_custom_functions' );
	}

	if( !empty( $custom_js ) )
	{
		$export_data['dynamik_custom_js'] = get_option( 'dynamik_gen_custom_js' );
	}

	if( !empty( $custom_templates ) )
	{
		$export_data['dynamik_templates'] = get_option( 'dynamik_gen_custom_templates' );
	}

	if( !empty( $custom_labels ) )
	{
		$export_data['dynamik_labels'] = get_option( 'dynamik_gen_custom_labels' );
	}
	
	if( !empty( $conditionals ) )
	{
		$export_data['dynamik_conditionals'] = get_option( 'dynamik_gen_custom_conditionals' );
	}
	
	if( !empty( $widget_areas ) )
	{
		$export_data['dynamik_widgets'] = get_option( 'dynamik_gen_custom_widget_areas' );
	}
	
	if( !empty( $hook_boxes ) )
	{
		$export_data['dynamik_hooks'] = get_option( 'dynamik_gen_custom_hook_boxes' );
	}

	$dynamik_datestamp = date( 'YmdHis', dynamik_time() );
	if( $export_name )
	{
		$dynamik_export_dat = $export_name . '.dat';
	}
	else
	{
		$dynamik_export_dat = 'dynamik_custom_' . $dynamik_datestamp . '.dat';
	}
	
	$cheerios = serialize( $export_data );
	
	header( "Content-type: text/plain" );
	header( "Content-disposition: attachment; filename=$dynamik_export_dat" );
	header( "Content-Transfer-Encoding: binary" );
	header( "Pragma: no-cache" );
	header( "Expires: 0" );
	echo $cheerios; 
	exit();
}

/**
 * Import the specified Custom Option settings into
 * their appropriate sections of the wp_options table.
 *
 * @since 1.0
 */
function dynamik_custom_import( $import_file, $theme_settings = '', $custom_css = '', $custom_functions = '', $custom_js = '', $custom_templates = '', $custom_labels = '', $conditionals = '', $widget_areas = '', $hook_boxes = '' )
{
	$dynamik_templates = get_option( 'dynamik_gen_custom_templates' );
	$dynamik_labels = get_option( 'dynamik_gen_custom_labels' );
	$dynamik_conditionals = get_option( 'dynamik_gen_custom_conditionals' );
	$dynamik_widgets = get_option( 'dynamik_gen_custom_widget_areas' );
	$dynamik_hooks = get_option( 'dynamik_gen_custom_hook_boxes' );
	
	if( 'dat' == strtolower( substr( strrchr( $import_file['name'], '.' ), 1 ) ) )
	{
		$import_data = file_get_contents( $import_file['tmp_name'] );
		$dynamik_import = unserialize( $import_data );
		
		if( !empty( $theme_settings ) )
		{
			if( !empty( $dynamik_import['dynamik_theme_settings'] ) )
			{
				$theme_settings_import = array_merge( dynamik_theme_settings_defaults( false, $dynamik_import['dynamik_theme_settings'] ), $dynamik_import['dynamik_theme_settings'] );
				update_option( 'dynamik_gen_theme_settings', $theme_settings_import );
			}
		}
		
		if( !empty( $custom_css ) )
		{
			if( !empty( $dynamik_import['dynamik_custom_css'] ) )
			{
				$custom_css_import = array_merge( dynamik_custom_css_options_defaults(), $dynamik_import['dynamik_custom_css'] );
				update_option( 'dynamik_gen_custom_css', $custom_css_import );
			}
		}
		
		if( !empty( $custom_functions ) )
		{
			if( !empty( $dynamik_import['dynamik_custom_functions'] ) )
			{
				$custom_functions_import = array_merge( dynamik_custom_functions_options_defaults(), $dynamik_import['dynamik_custom_functions'] );
				update_option( 'dynamik_gen_custom_functions', $custom_functions_import );
			}
		}

		if( !empty( $custom_js ) )
		{
			if( !empty( $dynamik_import['dynamik_custom_js'] ) )
			{
				$custom_js_import = array_merge( dynamik_custom_js_options_defaults(), $dynamik_import['dynamik_custom_js'] );
				update_option( 'dynamik_gen_custom_js', $custom_js_import );
			}
		}

		if( !empty( $custom_templates ) )
		{
			if( !empty( $dynamik_import['dynamik_templates'] ) )
			{
				$dynamik_templates_array = array();
				foreach( $dynamik_templates as $key => $value )
				{
					if( !in_array( $dynamik_templates[$key]['template_file_name'], $dynamik_templates_array ) )
					{
						$dynamik_templates_array[] = $dynamik_templates[$key]['template_file_name'];
					}
				}
				foreach( $dynamik_import['dynamik_templates'] as $key => $value )
				{	
					if( in_array( $dynamik_import['dynamik_templates'][$key]['template_file_name'], $dynamik_templates_array ) )
					{
						unset( $dynamik_import['dynamik_templates'][$key] );
					}
				}
				$templates_import = array_merge( $dynamik_templates, $dynamik_import['dynamik_templates'] );
				update_option( 'dynamik_gen_custom_templates', $templates_import );
			}
		}

		if( !empty( $custom_labels ) )
		{
			if( !empty( $dynamik_import['dynamik_labels'] ) )
			{
				$dynamik_labels_array = array();
				foreach( $dynamik_labels as $key => $value )
				{
					if( !in_array( $dynamik_labels[$key]['label_name'], $dynamik_labels_array ) )
					{
						$dynamik_labels_array[] = $dynamik_labels[$key]['label_name'];
					}
				}
				foreach( $dynamik_import['dynamik_labels'] as $key => $value )
				{	
					if( in_array( $dynamik_import['dynamik_labels'][$key]['label_name'], $dynamik_labels_array ) )
					{
						unset( $dynamik_import['dynamik_labels'][$key] );
					}
				}
				$labels_import = array_merge( $dynamik_labels, $dynamik_import['dynamik_labels'] );
				update_option( 'dynamik_gen_custom_labels', $labels_import );
			}
		}
		
		if( !empty( $conditionals ) )
		{
			if( !empty( $dynamik_import['dynamik_conditionals'] ) )
			{
				$dynamik_conditionals_array = array();
				foreach( $dynamik_conditionals as $key => $value )
				{
					$dynamik_conditionals_array[] = $dynamik_conditionals[$key]['conditional_id'];
				}
				foreach( $dynamik_import['dynamik_conditionals'] as $key => $value )
				{	
					if( in_array( $dynamik_import['dynamik_conditionals'][$key]['conditional_id'], $dynamik_conditionals_array ) )
					{
						unset( $dynamik_import['dynamik_conditionals'][$key] );
					}
				}
				$conditionals_import = array_merge( $dynamik_conditionals, $dynamik_import['dynamik_conditionals'] );
				update_option( 'dynamik_gen_custom_conditionals', $conditionals_import );
			}
		}
		
		if( !empty( $widget_areas ) )
		{
			if( !empty( $dynamik_import['dynamik_widgets'] ) )
			{
				$dynamik_widgets_array = array();
				foreach( $dynamik_widgets as $key => $value )
				{
					if( !in_array( $dynamik_widgets[$key]['widget_name'], $dynamik_widgets_array ) )
					{
						$dynamik_widgets_array[] = $dynamik_widgets[$key]['widget_name'];
					}
				}
				foreach( $dynamik_import['dynamik_widgets'] as $key => $value )
				{	
					if( in_array( $dynamik_import['dynamik_widgets'][$key]['widget_name'], $dynamik_widgets_array ) )
					{
						unset( $dynamik_import['dynamik_widgets'][$key] );
					}
				}
				$widgets_import = array_merge( $dynamik_widgets, $dynamik_import['dynamik_widgets'] );
				update_option( 'dynamik_gen_custom_widget_areas', $widgets_import );
			}
		}
		
		if( !empty( $hook_boxes ) )
		{
			if( !empty( $dynamik_import['dynamik_hooks'] ) )
			{
				$dynamik_hooks_array = array();
				foreach( $dynamik_hooks as $key => $value )
				{
					if( !in_array( $dynamik_hooks[$key]['hook_name'], $dynamik_hooks_array ) )
					{
						$dynamik_hooks_array[] = $dynamik_hooks[$key]['hook_name'];
					}
				}
				foreach( $dynamik_import['dynamik_hooks'] as $key => $value )
				{	
					if( in_array( $dynamik_import['dynamik_hooks'][$key]['hook_name'], $dynamik_hooks_array ) )
					{
						unset( $dynamik_import['dynamik_hooks'][$key] );
					}
				}
				$hooks_import = array_merge( $dynamik_hooks, $dynamik_import['dynamik_hooks'] );
				update_option( 'dynamik_gen_custom_hook_boxes', $hooks_import );
			}
		}
		
		dynamik_write_files( $css = true, $ez = false );
		wp_redirect( admin_url( 'admin.php?page=dynamik-settings&activetab=dynamik-theme-settings-nav-import-export&notice=import-complete' ) );
		exit();
	}	
	else
	{
		wp_redirect( admin_url( 'admin.php?page=dynamik-settings&activetab=dynamik-theme-settings-nav-import-export&notice=import-error' ) );
		exit();
	}
}

/**
 * Clone the Dynamik Child Theme Settings & Images over to the Genesis Extender Plugin.
 *
 * @since 1.0.2
 */
function dynamik_theme_clone( $clone_theme_settings = '', $clone_theme_metadata = '', $clone_theme_images = '' )
{
	if( !empty( $clone_theme_settings ) )
	{
		$plugin_settings_clone = array_merge( genesis_extender_settings_defaults(), get_option( 'dynamik_gen_theme_settings' ) );
		update_option( 'genesis_extender_settings', $plugin_settings_clone );

		$custom_css_clone = array_merge( genesis_extender_custom_css_options_defaults(), get_option( 'dynamik_gen_custom_css' ) );
		update_option( 'genesis_extender_custom_css', $custom_css_clone );

		$custom_functions_clone = array_merge( genesis_extender_custom_functions_options_defaults(), get_option( 'dynamik_gen_custom_functions' ) );
		update_option( 'genesis_extender_custom_functions', $custom_functions_clone );

		$custom_js_clone = array_merge( genesis_extender_custom_js_options_defaults(), get_option( 'dynamik_gen_custom_js' ) );
		update_option( 'genesis_extender_custom_js', $custom_js_clone );

		update_option( 'genesis_extender_custom_templates', get_option( 'dynamik_gen_custom_templates' ) );
		update_option( 'genesis_extender_custom_labels', get_option( 'dynamik_gen_custom_labels' ) );
		$dynamik_custom_conditionals = get_option( 'dynamik_gen_custom_conditionals' );
		foreach( $dynamik_custom_conditionals as $key => $value )
		{
			if( substr( $value['conditional_tag'], 0, 7 ) == 'dynamik' )
			{
				$dynamik_custom_conditionals[$key]['conditional_tag'] = str_replace( substr( $value['conditional_tag'], 0, 7 ), 'extender', $value['conditional_tag'] );
			}
		}
		update_option( 'genesis_extender_custom_conditionals', $dynamik_custom_conditionals );
		update_option( 'genesis_extender_custom_widget_areas', get_option( 'dynamik_gen_custom_widget_areas' ) );
		update_option( 'genesis_extender_custom_hook_boxes', get_option( 'dynamik_gen_custom_hook_boxes' ) );
	}

	if( !empty( $clone_theme_metadata ) )
	{
		global $wpdb;

		$wpdb->update( $wpdb->postmeta, array( 'meta_key' => '_genext_labels' ), array( 'meta_key' => '_dyn_labels' ) );
	}

	if( !empty( $clone_theme_images ) )
	{
		dynamik_folders_open_permissions();

		$theme_image_folder = dynamik_get_stylesheet_location( 'path' ) . 'images';
		$theme_adthumbs_folder = $theme_image_folder . '/adminthumbnails';

		$plugin_image_folder = genesis_extender_get_stylesheet_location( 'path' ) . 'images';
		$plugin_adthumbs_folder = $plugin_image_folder . '/adminthumbnails';

		dynamik_delete_images( $plugin_image_folder );
		dynamik_delete_images( $plugin_adthumbs_folder );

		$handle = opendir( $theme_image_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $theme_image_folder . '/' . $file, $plugin_image_folder . '/' . $file );
			}
		}
		closedir( $handle );
		
		$handle = opendir( $theme_adthumbs_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $theme_adthumbs_folder . '/' . $file, $plugin_adthumbs_folder . '/' . $file );
			}
		}
		closedir( $handle );

		dynamik_folders_close_permissions();
	}
	
	genesis_extender_write_files();
	wp_redirect( admin_url( 'admin.php?page=dynamik-settings&activetab=dynamik-theme-settings-nav-import-export&notice=theme-clone-complete' ) );
	exit();
}

/**
 * Clone the Genesis Extender Plugin Settings & Images over to the Dynamik Child Theme.
 *
 * @since 1.0.2
 */
function genesis_extender_clone( $clone_plugin_settings = '', $clone_plugin_metadata = '', $clone_plugin_images = '' )
{
	if( !empty( $clone_plugin_settings ) )
	{
		$plugin_settings_clone = array_merge( dynamik_theme_settings_defaults(), get_option( 'genesis_extender_settings' ) );
		update_option( 'dynamik_gen_theme_settings', $plugin_settings_clone );

		$custom_css_clone = array_merge( dynamik_custom_css_options_defaults(), get_option( 'genesis_extender_custom_css' ) );
		update_option( 'dynamik_gen_custom_css', $custom_css_clone );

		$custom_functions_clone = array_merge( dynamik_custom_functions_options_defaults(), get_option( 'genesis_extender_custom_functions' ) );
		update_option( 'dynamik_gen_custom_functions', $custom_functions_clone );

		$custom_js_clone = array_merge( dynamik_custom_js_options_defaults(), get_option( 'genesis_extender_custom_js' ) );
		update_option( 'dynamik_gen_custom_js', $custom_js_clone );

		update_option( 'dynamik_gen_custom_templates', get_option( 'genesis_extender_custom_templates' ) );
		update_option( 'dynamik_gen_custom_labels', get_option( 'genesis_extender_custom_labels' ) );
		$genesis_extender_custom_conditionals = get_option( 'genesis_extender_custom_conditionals' );
		foreach( $genesis_extender_custom_conditionals as $key => $value )
		{
			if( substr( $value['conditional_tag'], 0, 8 ) == 'extender' )
			{
				$genesis_extender_custom_conditionals[$key]['conditional_tag'] = str_replace( substr( $value['conditional_tag'], 0, 8 ), 'dynamik', $value['conditional_tag'] );
			}
		}
		update_option( 'dynamik_gen_custom_conditionals', $genesis_extender_custom_conditionals );
		update_option( 'dynamik_gen_custom_widget_areas', get_option( 'genesis_extender_custom_widget_areas' ) );
		update_option( 'dynamik_gen_custom_hook_boxes', get_option( 'genesis_extender_custom_hook_boxes' ) );
	}

	if( !empty( $clone_plugin_metadata ) )
	{
		global $wpdb;

		$wpdb->update( $wpdb->postmeta, array( 'meta_key' => '_dyn_labels' ), array( 'meta_key' => '_genext_labels' ) );
	}

	if( !empty( $clone_plugin_images ) )
	{
		dynamik_folders_open_permissions();

		$plugin_image_folder = genesis_extender_get_stylesheet_location( 'path' ) . 'images';
		$plugin_adthumbs_folder = $plugin_image_folder . '/adminthumbnails';

		$theme_image_folder = dynamik_get_stylesheet_location( 'path' ) . 'images';
		$theme_adthumbs_folder = $theme_image_folder . '/adminthumbnails';

		dynamik_delete_images( $theme_image_folder );
		dynamik_delete_images( $theme_adthumbs_folder );

		$handle = opendir( $plugin_image_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $plugin_image_folder . '/' . $file, $theme_image_folder . '/' . $file );
			}
		}
		closedir( $handle );
		
		$handle = opendir( $plugin_adthumbs_folder );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( $plugin_adthumbs_folder . '/' . $file, $theme_adthumbs_folder . '/' . $file );
			}
		}
		closedir( $handle );

		dynamik_folders_close_permissions();
	}
	
	dynamik_write_files( $css = true, $ez = false );
	wp_redirect( admin_url( 'admin.php?page=dynamik-settings&activetab=dynamik-theme-settings-nav-import-export&notice=plugin-clone-complete' ) );
	exit();
}

add_action( 'admin_init', 'dynamik_import_export_check' );
/**
 * Check for Import/Export $_POST actions and react appropriately.
 *
 * @since 1.0
 */
function dynamik_import_export_check()
{
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'dynamik_design_export' )
	{
		$export_name = $_POST['design_export_name'] != '' ? $_POST['design_export_name'] : false;
		$include_images = isset( $_POST['include_images'] ) ? 'yes' : 'no';
		dynamik_design_export( $export_name, $include_images );
	}
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'dynamik_design_import' )
	{
		dynamik_design_import( $_FILES['design_import_file'] );
	}
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'child_export' )
	{
		$parent_at_style = isset( $_POST['parent_at_style'] ) ? 'yes' : 'no';
		$include_theme_settings = isset( $_POST['include_theme_settings'] ) ? 'yes' : 'no';
		$include_dynamik_design = isset( $_POST['include_dynamik_design'] ) ? 'yes' : 'no';
		$include_custom_css = isset( $_POST['include_custom_css'] ) ? 'yes' : 'no';
		$include_custom_functions = isset( $_POST['include_custom_functions'] ) ? 'yes' : 'no';
		$include_custom_js = isset( $_POST['include_custom_js'] ) ? 'yes' : 'no';
		$include_custom_templates = isset( $_POST['include_custom_templates'] ) ? 'yes' : 'no';
		$include_custom_labels = isset( $_POST['include_custom_labels'] ) ? 'yes' : 'no';
		$include_custom_widget_areas = isset( $_POST['include_custom_widget_areas'] ) ? 'yes' : 'no';
		$include_custom_hook_boxes = isset( $_POST['include_custom_hook_boxes'] ) ? 'yes' : 'no';
		child_export( $_POST['child_name'], $_POST['child_author'], $_POST['child_author_uri'], $parent_at_style, $include_theme_settings, $include_dynamik_design, $include_custom_css, $include_custom_functions, $include_custom_js, $include_custom_templates, $include_custom_labels, $include_custom_widget_areas, $include_custom_hook_boxes );
	}
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'dynamik_design_snapshot_update' )
	{
		dynamik_design_snapshot_update();
	}
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'dynamik_design_snapshot_restore' )
	{
		dynamik_design_snapshot_restore();
	}
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'dynamik_custom_export' )
	{
		$export_name = $_POST['dynamik_export_name'] != '' ? $_POST['dynamik_export_name'] : false;
		$theme_settings = isset( $_POST['export_settings'] ) ? $_POST['export_settings'] : '';
		$custom_css = isset( $_POST['export_css'] ) ? $_POST['export_css'] : '';
		$custom_functions = isset( $_POST['export_functions'] ) ? $_POST['export_functions'] : '';
		$custom_js = isset( $_POST['export_js'] ) ? $_POST['export_js'] : '';
		$custom_templates = isset( $_POST['export_templates'] ) ? $_POST['export_templates'] : '';
		$custom_labels = isset( $_POST['export_labels'] ) ? $_POST['export_labels'] : '';
		$conditionals = isset( $_POST['export_conditionals'] ) ? $_POST['export_conditionals'] : '';
		$widget_areas = isset( $_POST['export_widgets'] ) ? $_POST['export_widgets'] : '';
		$hook_boxes = isset( $_POST['export_hooks'] ) ? $_POST['export_hooks'] : '';

		dynamik_custom_export( $export_name, $theme_settings, $custom_css, $custom_functions, $custom_js, $custom_templates, $custom_labels, $conditionals, $widget_areas, $hook_boxes );
	}
	if( !empty( $_POST['action'] ) && $_POST['action'] == 'dynamik_custom_import' )
	{
		$theme_settings = isset( $_POST['import_settings'] ) ? $_POST['import_settings'] : '';
		$custom_css = isset( $_POST['import_css'] ) ? $_POST['import_css'] : '';
		$custom_functions = isset( $_POST['import_functions'] ) ? $_POST['import_functions'] : '';
		$custom_js = isset( $_POST['import_js'] ) ? $_POST['import_js'] : '';
		$custom_templates = isset( $_POST['import_templates'] ) ? $_POST['import_templates'] : '';
		$custom_labels = isset( $_POST['import_labels'] ) ? $_POST['import_labels'] : '';
		$conditionals = isset( $_POST['import_conditionals'] ) ? $_POST['import_conditionals'] : '';
		$widget_areas = isset( $_POST['import_widgets'] ) ? $_POST['import_widgets'] : '';
		$hook_boxes = isset( $_POST['import_hooks'] ) ? $_POST['import_hooks'] : '';
		
		dynamik_custom_import( $_FILES['custom_import_file'], $theme_settings, $custom_css, $custom_functions, $custom_js, $custom_templates, $custom_labels, $conditionals, $widget_areas, $hook_boxes );
	}
	if( defined( 'GENEXT_VERSION' ) && !empty( $_POST['action'] ) && $_POST['action'] == 'dynamik_theme_clone' )
	{
		$clone_theme_settings = isset( $_POST['clone_theme_settings'] ) ? $_POST['clone_theme_settings'] : '';
		$clone_theme_metadata = isset( $_POST['clone_theme_metadata'] ) ? $_POST['clone_theme_metadata'] : '';
		$clone_theme_images = isset( $_POST['clone_theme_images'] ) ? $_POST['clone_theme_images'] : '';
		dynamik_theme_clone( $clone_theme_settings, $clone_theme_metadata, $clone_theme_images );
	}
	if( defined( 'GENEXT_VERSION' ) && !empty( $_POST['action'] ) && $_POST['action'] == 'genesis_extender_clone' )
	{
		$clone_plugin_settings = isset( $_POST['clone_plugin_settings'] ) ? $_POST['clone_plugin_settings'] : '';
		$clone_plugin_metadata = isset( $_POST['clone_plugin_metadata'] ) ? $_POST['clone_plugin_metadata'] : '';
		$clone_plugin_images = isset( $_POST['clone_plugin_images'] ) ? $_POST['clone_plugin_images'] : '';
		genesis_extender_clone( $clone_plugin_settings, $clone_plugin_metadata, $clone_plugin_images );
	}
}

/**
 * Create a call to specified Google fonts for Child Theme Export.
 *
 * @since 1.0
 * @return a call to specified Google fonts.
 */
function dynamik_google_font_call()
{
	$dynamik_font_type = dynamik_get_design( 'font_type' );
	if( $dynamik_font_type )
	{
		foreach( $dynamik_font_type as $key => $value )
		{
			$dynamik_font_type[$key] = $value;
		}
	}
	$dynamik_google_font_array = dynamik_google_font_array();
	$google_fonts = '';
	
	foreach( $dynamik_google_font_array as $google_font => $google_font_data )
	{
		if( in_array( $google_font_data['value'], $dynamik_font_type ) )
		{
			$google_fonts .= $google_font_data['url_string'];
		}
	}
	
	if( !empty( $google_fonts ) )
	{
		$google_font_call = 'http://fonts.googleapis.com/css?family=' . $google_fonts;
		return $google_font_call;
	}
	else
	{
		return false;
	}
}

/**
 * Delete images of specified extension and in specific folders.
 *
 * NOTE: This is used to delete the temporary images created
 * when performing a Dynamik Options export.
 *
 * @since 1.0
 */
function dynamik_delete_images( $dir )
{
	$handle = opendir( $dir );
	while( false !== ( $file = readdir( $handle ) ) )
	{
		$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
		if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
		{
			unlink( $dir . '/' . $file );
		}
	}
	closedir( $handle );
}

/**
 * Delete specific folders.
 *
 * NOTE: This is used to delete the temporary folders created
 * when performing a Dynamik Options or Child Theme export.
 *
 * @since 1.0
 */
function dynamik_delete_dir( $dir )
{
	$handle = opendir( $dir );
	while( false !== ( $file = readdir( $handle ) ) )
	{
		if( is_dir( $dir . '/' . $file ) )
		{
			if( ( $file != '.' ) && ( $file != '..' ) )
			{
				dynamik_delete_dir( $dir . '/' . $file );
			}
		}
		else
		{
			unlink( $dir . '/' . $file );
		}
	}
	closedir( $handle );
	rmdir( $dir );
}

/**
 * This function is not currently in use, but we'll keep it around
 * in case we need it in the future.
 *
 * @since 1.0
 */
function dynamik_copy_dir( $source, $destination )
{
	if( is_dir( $source ) )
	{
		if( !is_dir( $destination ) )
		{
			@mkdir( $destination, 0755, true );
		}
		$handle = opendir( $source );
		while( false !== ( $readdirectory = readdir( $handle ) ) )
		{
			if( $readdirectory == '.' || $readdirectory == '..' )
			{
				continue;
			}
			$pathdir = $source . '/' . $readdirectory; 
			if( is_dir( $pathdir ) )
			{
				dynamik_copy_dir( $pathdir, $destination . '/' . $readdirectory );
				continue;
			}
			copy( $pathdir, $destination . '/' . $readdirectory );
		}
		closedir( $handle );
	}
	else
	{
		copy( $source, $destination );
	}
}

/**
 * Convert pre-1.3 font sizes to their appropriate px or rem values.
 *
 * @since 1.3
 */
function dynamik_update_design_px_em_conversion( $design_options )
{
	// Create font values array
	$font_values = array();

	// Account for a few necessary DWB 1.3 font values
	$design_options['body_px_em'] = 'px';
	$design_options['comment_reply_text_font_size'] = $design_options['comment_body_font_size'];
	$design_options['comment_reply_text_link_color'] = $design_options['comment_link_color'];
	$design_options['comment_reply_text_link_hover_color'] = $design_options['comment_link_hover_color'];
	$design_options['comment_reply_text_link_underline'] = $design_options['comment_link_underline'];
	$design_options['comment_reply_text_font_css'] = $design_options['comment_body_font_css'];
	$design_options['comment_reply_text_px_em'] = $design_options['comment_body_px_em'];
	$design_options['comment_reply_text_font_u'] = $design_options['comment_body_font_u'];
	$design_options['comment_reply_text_link_u'] = $design_options['comment_link_u'];
	$design_options['comment_form_allowed_tags_font_size'] = $design_options['comment_body_font_size'];
	$design_options['comment_form_allowed_tags_px_em'] = $design_options['comment_body_px_em'];

	// Determine the overall direction of font unit implementation
	// based on the content_p_px_em unit value of the imported options
	if( $design_options['content_p_px_em'] == 'em' )
	{
		$font_values['universal_px_em'] = 'em';
		$font_unit = 'rem';
	}
	else
	{
		$font_values['universal_px_em'] = 'px';
		$font_unit = 'px';
	}

	// Cycle through the $design_options array
	foreach( $design_options as $key => $value )
	{
		// Only do stuff with options that have a px or em value
		if( $value == 'px' || $value == 'em' )
		{
			// Create a Font Size Key based on the current px or em value being manipulated
			// First do a check to see if this is an H tag key which has
			// a different font-size naming convention than px_em key
			if( is_numeric( substr( $key, 1, 1 ) ) )
				$font_size_key = 'content_heading_' . substr( $key, 0, -5 ) . 'font_size';
			else
				$font_size_key = substr( $key, 0, -5 ) . 'font_size';

			// Determine how to convert the font size based on the
			// content_p_px_em unit value of the imported options
			if( $font_unit == 'rem' )
			{
				if( $value == 'px' )
				{
					// Create a new value for the current font size by converting it from px to rem
					$new_value = strval( $design_options[$font_size_key] / 10 );					
				}
				else
				{
					// Create a new value for the current font size, giving it a rem value
					// by first converting it from em to px, and then to rem
					$new_value = strval( round( $design_options[$font_size_key] * $design_options['body_font_size'] ) / 10 );
				}
			}
			else
			{
				if( $value == 'px' )
				{
					// Retain the current px value of the font size
					$new_value = strval( $design_options[$font_size_key] );					
				}
				else
				{
					// Create a new value for the current font size by converting it from em to px
					$new_value = strval( round( $design_options[$font_size_key] * $design_options['body_font_size'] ) );
				}
			}

			// Add to the $font_values array based on the $new_value created
			$font_values[$font_size_key] = $new_value;
		}
	}

	// Merge the $font_values array into the current $design_options
	$dynamik_design_settings = wp_parse_args( $font_values, $design_options );

	// Update the Design Options with the merged array
	update_option( 'dynamik_gen_design_options', $dynamik_design_settings );
}

//end lib/functions/dynamik-import-export.php