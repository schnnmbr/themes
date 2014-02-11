<?php
/**
 * Handels both the activation and update functionality.
 *
 * @package Dynamik
 */
 
if( !empty( $_POST['dynamik_update_check'] ) && $_POST['dynamik_update_check'] == 'trigger' )
{
	delete_transient( 'dynamik-gen-update' );
	set_site_transient( 'update_themes', null );
}
// Debug Auto-Update.
//set_site_transient( 'update_themes', null );

add_filter( 'pre_site_transient_update_themes', 'dynamik_update_push' );
add_filter( 'site_transient_update_themes', 'dynamik_update_push' );
add_filter( 'transient_update_themes', 'dynamik_update_push' );
/**
 * Update Dynamik to latest version.
 *
 * @since 1.0
 * @return latest Dynamik files.
 */
function dynamik_update_push( $data )
{
	$dynamik_update = dynamik_update_check();
	
	if( $dynamik_update )
	{
		if( version_compare( CHILD_THEME_VERSION, $dynamik_update['new_version'], '>=' ) )
			return $data;
		
		$data->response['dynamik-gen'] = $dynamik_update;
	}

	return $data;
}

/**
 * Check to see if a new version of Dynamik is available.
 *
 * @since 1.0
 * @return either response or transient.
 */
function dynamik_update_check()
{
	global $wp_version;
	// Debug Auto-Update.
	//delete_transient( 'dynamik-gen-update' );
	$dynamik_transient = get_transient( 'dynamik-gen-update' );
	
	if( $dynamik_transient == false )
	{
		$api_url = 'http://api.cobaltapps.com/dynamik-update/';
		
		// Start checking for an update
		$send_for_check = array(
			'body' => array(
				'action' => 'theme_update', 
				'request' => array(
					'slug' => 'dynamik-gen',
					'version' => CHILD_THEME_VERSION
				)
			),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url()
		);

		$raw_response = wp_remote_post( $api_url, $send_for_check );
		
		if( !is_wp_error( $raw_response ) && ( $raw_response['response']['code'] == 200 ) && is_serialized( $raw_response['body'] ) )
		{
			$response = unserialize( $raw_response['body'] );			
		}
		else
		{
			set_transient( 'dynamik-gen-update', array( 'new_version' => CHILD_THEME_VERSION ), 60*60*24 ); // store for 24 hours
		}
		
		if( !empty( $response ) )
		{
			set_transient( 'dynamik-gen-update', $response, 60*60*24); // store for 24 hours			
			return $response;
		}
	}
	else
	{
		return $dynamik_transient;
	}
}

add_action( 'admin_notices', 'dynamik_update_nag' );
/**
 * Build Dynamik Update Nag HTML.
 *
 * @since 1.0
 */
function dynamik_update_nag()
{
	$user = wp_get_current_user();
	
	if( get_the_author_meta( 'disable_dynamik_gen_update_nag', $user->ID ) )
		return;
		
	$dynamik_update = dynamik_update_check();
		
	if( !current_user_can( 'update_themes' ) )
		return false;
	
	if( version_compare( CHILD_THEME_VERSION, $dynamik_update['new_version'], '>=' ) || empty( $dynamik_update['package'] ) )
		return false;
	
	$update_url = wp_nonce_url( 'update.php?action=upgrade-theme&amp;theme=dynamik-gen', 'upgrade-theme_dynamik-gen' );
	$update_onclick = __( '** Please Note ** The entire /wp-content/themes/dynamik-gen/ folder will be overwritten. Are you sure you want to continue?', 'dynamik' );
	
	echo '<div id="update-nag">';
	printf( __( '<strong>Dynamik %s</strong> is Available! <a href="%s" onclick="return confirm(\'%s\' );">Update Now</a> or <a href="%s">Find Out More</a>.', 'dynamik' ), esc_html( $dynamik_update['new_version'] ), $update_url, esc_js( $update_onclick ), esc_url( $dynamik_update['url'] ), esc_html( $dynamik_update['new_version'] ) );
	echo '</div>';
}

add_filter( 'update_theme_complete_actions', 'dynamik_update_action_links', 10, 2);
/**
 * Build update action link HTML.
 *
 * @since 1.0
 * @return Dynamik update finalize link.
 */
function dynamik_update_action_links( $actions, $theme )
{
	if( $theme != 'dynamik-gen' )
		return $actions;
		
	return '<a href="' . admin_url( 'admin.php?page=dynamik-settings' ) . '">'. __( 'Click here to complete your Dynamik Update', 'dynamik' ) .'</a>';	
}

add_action( 'admin_notices', 'dynamik_updated_notice' );
/**
 * Build "Dynamik Update Success" notice HTML.
 *
 * @since 1.0
 */
function dynamik_updated_notice()
{
	if( !isset( $_GET['page'] ) || $_GET['page'] != 'dynamik-settings' )
		return;
	
	if( isset( $_GET['updated'] ) && $_GET['updated'] == 'dynamik-gen' )
	{
		echo '<div id="update-nag">' . sprintf( __( 'Congratulations! Your update to <strong>Dynamik %s</strong> is complete.', 'dynamik' ), get_option( 'dynamik_gen_version_number' ) ) . '</div>';
	}
}

add_action( 'admin_init', 'dynamik_update' );
/**
 * Perform Dynamik updates based on current version number.
 *
 * @since 1.0
 */
function dynamik_update()
{
	if( !get_option( 'dynamik_gen_version_number' ) )
	{
		dynamik_activate();
	}
	else
	{
		// Don't do anything if we're on the latest version.
		if( version_compare( get_option( 'dynamik_gen_version_number' ), CHILD_THEME_VERSION, '>=' ) )
			return;

		// Update to Dynamik 1.0.1
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.0.1', '<' ) )
		{		
			$dynamik_settings = get_option( 'dynamik_gen_theme_settings' );
			$new_dynamik_settings = array(
				'custom_image_size_one_mode' => '',
				'custom_image_size_one_width' => '',
				'custom_image_size_one_height' => '',
				'custom_image_size_two_mode' => '',
				'custom_image_size_two_width' => '',
				'custom_image_size_two_height' => '',
				'custom_image_size_three_mode' => '',
				'custom_image_size_three_width' => '',
				'custom_image_size_three_height' => '',
				'custom_image_size_four_mode' => '',
				'custom_image_size_four_width' => '',
				'custom_image_size_four_height' => '',
				'custom_image_size_five_mode' => '',
				'custom_image_size_five_width' => '',
				'custom_image_size_five_height' => ''
			);
			$dynamik_settings = wp_parse_args( $new_dynamik_settings, $dynamik_settings );
			update_option( 'dynamik_gen_theme_settings', $dynamik_settings );
			
			update_option( 'dynamik_gen_version_number', '1.0.1' );
		}

		// Update to Dynamik 1.0.2
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.0.2', '<' ) )
		{
			$custom_functions = get_option( 'dynamik_gen_custom_functions' );
			$new_custom_functions = array(
				'custom_functions_effect_admin' => 0
			);
			$custom_functions = wp_parse_args( $new_custom_functions, $custom_functions );
			update_option( 'dynamik_gen_custom_functions', $custom_functions );

			update_option( 'dynamik_gen_version_number', '1.0.2' );
		}

		// Update to Dynamik 1.0.3
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.0.3', '<' ) )
		{
			$dynamik_design_settings = get_option( 'dynamik_gen_design_options' );
			$new_dynamik_settings = array(
				'comment_author_link_color' => '0D72C7',
				'comment_author_link_hover_color' => '0D72C7',
				'comment_author_link_underline' => 'On Hover',
				'comment_author_link_u' => 1
			);
			$dynamik_design_settings = wp_parse_args( $new_dynamik_settings, $dynamik_design_settings );
			update_option( 'dynamik_gen_design_options', $dynamik_design_settings );

			update_option( 'dynamik_gen_version_number', '1.0.3' );
		}

		// Update to Dynamik 1.0.4
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.0.4', '<' ) )
		{
			update_option( 'dynamik_gen_version_number', '1.0.4' );
		}

		// Update to Dynamik 1.1
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.1', '<' ) )
		{
			$dynamik_settings = get_option( 'dynamik_gen_theme_settings' );
			$new_dynamik_settings = array(
				'fancy_dropdowns_active' => 1,
				'html_five_active' => 0
			);
			$dynamik_settings = wp_parse_args( $new_dynamik_settings, $dynamik_settings );
			update_option( 'dynamik_gen_theme_settings', $dynamik_settings );

			$dynamik_design_settings = get_option( 'dynamik_gen_design_options' );
			$new_dynamik_design_settings = array(
				'comment_form_allowed_tags_font_size' => '14',
				'comment_form_allowed_tags_font_color' => '888888',
				'comment_form_allowed_tags_font_css' => '',
				'comment_form_allowed_tags_bg_type' => 'color',
				'comment_form_allowed_tags_bg_no_color' => 0,
				'comment_form_allowed_tags_bg_color' => 'F5F5F5',
				'comment_form_allowed_tags_bg_image' => '',
				'comment_form_allowed_tags_border_thickness' => '1',
				'comment_form_allowed_tags_border_style' => 'solid',
				'comment_form_allowed_tags_border_color' => 'DDDDDD',
				'comment_form_allowed_tags_margin_top' => '10',
				'comment_form_allowed_tags_margin_bottom' => '20',
				'comment_form_allowed_tags_padding_top' => '20',
				'comment_form_allowed_tags_padding_right' => '20',
				'comment_form_allowed_tags_padding_bottom' => '20',
				'comment_form_allowed_tags_padding_left' => '20',
				'comment_form_allowed_tags_font_u' => 'u'
			);
			$new_font_type_settings = array(
				'comment_form_allowed_tags' => 'Arial, sans-serif'
			);
			$dynamik_design_settings['font_type'] = wp_parse_args( $new_font_type_settings, $dynamik_design_settings['font_type'] );
			$dynamik_design_settings = wp_parse_args( $new_dynamik_design_settings, $dynamik_design_settings );
			update_option( 'dynamik_gen_design_options', $dynamik_design_settings );

			update_option( 'dynamik_gen_version_number', '1.1' );
		}

		// Update to Dynamik 1.2
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.2', '<' ) )
		{
			$dynamik_settings = get_option( 'dynamik_gen_theme_settings' );
			$new_dynamik_settings = array(
				'include_inpost_cpt_all' => 0
			);
			$dynamik_settings = wp_parse_args( $new_dynamik_settings, $dynamik_settings );
			update_option( 'dynamik_gen_theme_settings', $dynamik_settings );

			$dynamik_responsive_settings = get_option( 'dynamik_gen_responsive_options' );
			$new_dynamik_responsive_settings = array(
				'vertical_toggle_button_styles' => '.mobile-primary-toggle,
.mobile-secondary-toggle {
	width: 70px;
	margin: 0 auto;
	padding: 6px 10px;
	font-size: 13px; font-size: 1.3rem;
	font-weight: normal;
	color: #7c7c7c;
	text-align: center;
	background-color: #e6e6e6;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #f4f4f4, #e6e6e6);
	background-image: -ms-linear-gradient(top, #f4f4f4, #e6e6e6);
	background-image: -webkit-linear-gradient(top, #f4f4f4, #e6e6e6);
	background-image: -o-linear-gradient(top, #f4f4f4, #e6e6e6);
	background-image: linear-gradient(top, #f4f4f4, #e6e6e6);
	border: 1px solid #d2d2d2;
	border-radius: 3px;
	box-shadow: 0 1px 2px rgba(64, 64, 64, 0.1);
	cursor: pointer;
	display: none;
}
.mobile-primary-toggle:hover,
.mobile-secondary-toggle:hover {
	color: #5e5e5e;
	background-color: #ebebeb;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: -ms-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: -webkit-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: -o-linear-gradient(top, #f9f9f9, #ebebeb);
	background-image: linear-gradient(top, #f9f9f9, #ebebeb);
}
.mobile-primary-toggle:active,
.mobile-secondary-toggle:active {
	color: #757575;
	background-color: #e1e1e1;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #ebebeb, #e1e1e1);
	background-image: -ms-linear-gradient(top, #ebebeb, #e1e1e1);
	background-image: -webkit-linear-gradient(top, #ebebeb, #e1e1e1);
	background-image: -o-linear-gradient(top, #ebebeb, #e1e1e1);
	background-image: linear-gradient(top, #ebebeb, #e1e1e1);
	box-shadow: inset 0 0 8px 2px #c6c6c6, 0 1px 0 0 #f4f4f4;
	border: none;
}'
			);
			$dynamik_responsive_settings = wp_parse_args( $new_dynamik_responsive_settings, $dynamik_responsive_settings );
			update_option( 'dynamik_gen_responsive_options', $dynamik_responsive_settings );

			$do_shortcode_find = array( '[', ']' );
			$do_shortcode_replace = array( '&lt;?php echo do_shortcode( \'[', ']\' ); ?&gt;' );
			$updated_dynamik_hook_boxes = array();
			$dynamik_hook_boxes = get_option( 'dynamik_gen_custom_hook_boxes' );
			foreach( $dynamik_hook_boxes as $key => $value )
			{
				$value['hook_textarea'] = str_replace( $do_shortcode_find, $do_shortcode_replace, $value['hook_textarea'] );
				$updated_dynamik_hook_boxes[$key] = $value;
			}
			update_option( 'dynamik_gen_custom_hook_boxes', $updated_dynamik_hook_boxes );

			update_option( 'dynamik_gen_version_number', '1.2' );
		}

		// Update to Dynamik 1.2.1
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.2.1', '<' ) )
		{
			update_option( 'dynamik_gen_version_number', '1.2.1' );
		}

		// Update to Dynamik 1.2.2
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.2.2', '<' ) )
		{
			update_option( 'dynamik_gen_version_number', '1.2.2' );
		}

		// Update to Dynamik 1.3
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.3', '<' ) )
		{
			$dynamik_design_settings = get_option( 'dynamik_gen_design_options' );
			$new_dynamik_design_settings = array(
				'body_font_size' => $dynamik_design_settings['universal_px_em'] == 'em' ? ( $dynamik_design_settings['body_font_size'] / 10 ) : $dynamik_design_settings['body_font_size'],
				'title_font_size' => dynamik_one_three_update_font_size( 'title_font_size' ),
				'tagline_font_size' => dynamik_one_three_update_font_size( 'tagline_font_size' ),
				'nav1_font_size' => dynamik_one_three_update_font_size( 'nav1_font_size' ),
				'nav1_extras_font_size' => dynamik_one_three_update_font_size( 'nav1_extras_font_size' ),
				'nav2_font_size' => dynamik_one_three_update_font_size( 'nav2_font_size' ),
				'nav3_font_size' => dynamik_one_three_update_font_size( 'nav3_font_size' ),
				'content_heading_h1_font_size' => dynamik_one_three_update_font_size( 'content_heading_h1_font_size' ),
				'content_heading_h2_font_size' => dynamik_one_three_update_font_size( 'content_heading_h2_font_size' ),
				'content_heading_h3_font_size' => dynamik_one_three_update_font_size( 'content_heading_h3_font_size' ),
				'content_heading_h4_font_size' => dynamik_one_three_update_font_size( 'content_heading_h4_font_size' ),
				'content_heading_h5_font_size' => dynamik_one_three_update_font_size( 'content_heading_h5_font_size' ),
				'content_heading_h6_font_size' => dynamik_one_three_update_font_size( 'content_heading_h6_font_size' ),
				'content_byline_font_size' => dynamik_one_three_update_font_size( 'content_byline_font_size' ),
				'content_p_font_size' => dynamik_one_three_update_font_size( 'content_p_font_size' ),
				'blockquote_font_size' => dynamik_one_three_update_font_size( 'blockquote_font_size' ),
				'caption_font_size' => dynamik_one_three_update_font_size( 'caption_font_size' ),
				'post_meta_font_size' => dynamik_one_three_update_font_size( 'post_meta_font_size' ),
				'comment_heading_font_size' => dynamik_one_three_update_font_size( 'comment_heading_font_size' ),
				'comment_author_font_size' => dynamik_one_three_update_font_size( 'comment_author_font_size' ),
				'comment_meta_font_size' => dynamik_one_three_update_font_size( 'comment_meta_font_size' ),
				'comment_body_font_size' => dynamik_one_three_update_font_size( 'comment_body_font_size' ),
				'comment_form_font_size' => dynamik_one_three_update_font_size( 'comment_form_font_size' ),
				'comment_submit_font_size' => dynamik_one_three_update_font_size( 'comment_submit_font_size' ),
				'comment_form_allowed_tags_font_size' => dynamik_one_three_update_font_size( 'comment_form_allowed_tags_font_size' ),
				'sb_heading_font_size' => dynamik_one_three_update_font_size( 'sb_heading_font_size' ),
				'sb_content_font_size' => dynamik_one_three_update_font_size( 'sb_content_font_size' ),
				'footer_font_size' => dynamik_one_three_update_font_size( 'footer_font_size' ),
				'ez_widget_home_title_font_size' => dynamik_one_three_update_font_size( 'ez_widget_home_title_font_size' ),
				'ez_widget_home_content_font_size' => dynamik_one_three_update_font_size( 'ez_widget_home_content_font_size' ),
				'ez_widget_feature_title_font_size' => dynamik_one_three_update_font_size( 'ez_widget_feature_title_font_size' ),
				'ez_widget_feature_content_font_size' => dynamik_one_three_update_font_size( 'ez_widget_feature_content_font_size' ),
				'ez_widget_footer_title_font_size' => dynamik_one_three_update_font_size( 'ez_widget_footer_title_font_size' ),
				'ez_widget_footer_content_font_size' => dynamik_one_three_update_font_size( 'ez_widget_footer_content_font_size' ),
				'featured_widget_heading_font_size' => dynamik_one_three_update_font_size( 'featured_widget_heading_font_size' ),
				'featured_widget_byline_font_size' => dynamik_one_three_update_font_size( 'featured_widget_byline_font_size' ),
				'featured_widget_p_font_size' => dynamik_one_three_update_font_size( 'featured_widget_p_font_size' ),
				'dynamik_widget_title_font_size' => dynamik_one_three_update_font_size( 'dynamik_widget_title_font_size' ),
				'dynamik_widget_content_font_size' => dynamik_one_three_update_font_size( 'dynamik_widget_content_font_size' ),
				'search_form_font_size' => dynamik_one_three_update_font_size( 'search_form_font_size' ),
				'search_button_font_size' => dynamik_one_three_update_font_size( 'search_button_font_size' ),
				'breadcrumbs_font_size' => dynamik_one_three_update_font_size( 'breadcrumbs_font_size' ),
				'taxonomy_box_heading_font_size' => dynamik_one_three_update_font_size( 'taxonomy_box_heading_font_size' ),
				'taxonomy_box_content_font_size' => dynamik_one_three_update_font_size( 'taxonomy_box_content_font_size' ),
				'author_box_title_font_size' => dynamik_one_three_update_font_size( 'author_box_title_font_size' ),
				'author_box_font_size' => dynamik_one_three_update_font_size( 'author_box_font_size' ),
				'post_nav_font_size' => dynamik_one_three_update_font_size( 'post_nav_font_size' ),
				'universal_link_transition_active' => 0,
				'universal_link_transition_style' => 'all 0.2s ease-in-out',
				'general_shadow_active' => 0,
				'general_shadow_style' => '0 1px 1px #EEEEEE',
				'general_shadow_elements' => '.taxonomy-description, .content blockquote, .author-description, .author-box, .comment-list li, .ping-list li, a.comment-reply-link, #author, #comment, #email, #url, #respond p.form-allowed-tags, #commentform #submit, .sidebar.widget-area .widget, .breadcrumb, .search-form input[type="submit"], #subbutton, .search-form input[type="search"], #subbox, .pagination li a',
				'general_radius_active' => 0,
				'general_radius_style' => '3px',
				'general_radius_elements' => '.content .taxonomy-description h1, .content .author-description h1, .taxonomy-description, .content blockquote, .author-description, .author-box, .comment-list li, .ping-list li, a.comment-reply-link, #author, #comment, #email, #url, #respond p.form-allowed-tags, #commentform #submit, .sidebar-primary h4, .sidebar-secondary h4, #ez-home-sidebar h4, .sidebar.widget-area .widget, .breadcrumb, .search-form input[type="submit"], #subbutton, .search-form input[type="search"], #subbox, .pagination li a',
				'header_widget_text_align' => 'left',
				'comment_reply_text_font_size' => dynamik_one_three_update_font_size( 'comment_body_font_size' ),
				'comment_reply_text_link_color' => $dynamik_design_settings['comment_link_color'],
				'comment_reply_text_link_hover_color' => $dynamik_design_settings['comment_link_hover_color'],
				'comment_reply_text_link_underline' => $dynamik_design_settings['comment_link_underline'],
				'comment_reply_text_font_css' => $dynamik_design_settings['comment_body_font_css'],
				'comment_reply_text_font_u' => $dynamik_design_settings['comment_body_font_u'],
				'comment_reply_text_link_u' => $dynamik_design_settings['comment_link_u'],
				'comment_reply_text_bg_type' => 'transparent',
				'comment_reply_text_bg_no_color' => 0,
				'comment_reply_text_bg_color' => 'FFFFFF',
				'comment_reply_text_bg_image' => '',
				'comment_reply_text_hover_bg_type' => 'transparent',
				'comment_reply_text_hover_bg_no_color' => 0,
				'comment_reply_text_hover_bg_color' => 'FFFFFF',
				'comment_reply_text_hover_bg_image' => '',
				'comment_list_border_type' => 'Full',
				'comment_list_border_thickness' => '1',
				'comment_list_border_style' => 'solid',
				'comment_list_border_color' => 'DDDDDD',
				'comment_reply_text_border_type' => 'Full',
				'comment_reply_text_border_thickness' => '0',
				'comment_reply_text_border_style' => 'solid',
				'comment_reply_text_border_color' => 'E8E8E8',
				'comment_reply_text_hover_border_type' => 'Full',
				'comment_reply_text_hover_border_thickness' => '0',
				'comment_reply_text_hover_border_style' => 'solid',
				'comment_reply_text_hover_border_color' => 'E8E8E8',
				'comment_reply_text_padding_top' => '0',
				'comment_reply_text_padding_right' => '0',
				'comment_reply_text_padding_bottom' => '0',
				'comment_reply_text_padding_left' => '0',
				'dynamik_widget_column_class_compatible' => 0
			);
			$new_font_type_settings = array(
				'comment_reply_text' => $dynamik_design_settings['font_type']['comment_body']
			);
			$dynamik_design_settings['font_type'] = wp_parse_args( $new_font_type_settings, $dynamik_design_settings['font_type'] );
			$dynamik_design_settings = wp_parse_args( $new_dynamik_design_settings, $dynamik_design_settings );
			update_option( 'dynamik_gen_design_options', $dynamik_design_settings );

			$media_wrap_width = dynamik_get_responsive( 'media_wrap_width' );
			$dynamik_responsive_settings = get_option( 'dynamik_gen_responsive_options' );
			$vertical_toggle_button_styles = $dynamik_responsive_settings['vertical_toggle_button_styles'];
			$vertical_toggle_button_styles_updated = '.responsive-primary-menu-container { display: none; }' . "\n";
			$vertical_toggle_button_styles_updated .= $vertical_toggle_button_styles;
			$vertical_toggle_button_subnav_styles_updated = '.responsive-secondary-menu-container { display: none; }' . "\n";
			$vertical_toggle_button_subnav_styles_updated .= $vertical_toggle_button_styles;
			$new_dynamik_responsive_settings = array(
				'delayed_header_title_area_width' => '320',
				'delayed_sidebar_width' => '280',
				'vertical_menu_sub_page_pre_text' => '',
				'vertical_menu_sub_page_text_align' => 'center',
				'hamburger_icon_1_margin_top' => '-32',
				'hamburger_icon_2_margin_top' => '-32',
				'vertical_toggle_sub_page_reveal' => 0,
				'vertical_toggle_button_styles' => $vertical_toggle_button_styles_updated,
				'vertical_toggle_button_subnav_styles' => $vertical_toggle_button_subnav_styles_updated,
				'media_query_large_cascading_width' => $media_wrap_width,
				'dynamik_media_query_large_min_width' => '768',
				'dynamik_media_query_large_max_width' => $media_wrap_width,
				'dynamik_media_query_medium_large_min_width' => '480',
				'dynamik_media_query_medium_large_max_width' => $media_wrap_width,
				'media_query_medium_cascading_width' => '767',
				'dynamik_media_query_medium_min_width' => '480',
				'dynamik_media_query_medium_max_width' => '767',
				'media_query_small_width' => '479'
			);
			$dynamik_responsive_settings = wp_parse_args( $new_dynamik_responsive_settings, $dynamik_responsive_settings );
			update_option( 'dynamik_gen_responsive_options', $dynamik_responsive_settings );

			update_option( 'dynamik_gen_version_number', '1.3' );
		}

		// Update to Dynamik 1.3.1
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.3.1', '<' ) )
		{
			update_option( 'dynamik_gen_version_number', '1.3.1' );
		}

		// Update to Dynamik 1.4
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.4', '<' ) )
		{
			update_option( 'dynamik_gen_version_number', '1.4' );
		}

		// Update to Dynamik 1.4.1
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.4.1', '<' ) )
		{
			update_option( 'dynamik_gen_version_number', '1.4.1' );
		}

		// Update to Dynamik 1.4.2
		if( version_compare( get_option( 'dynamik_gen_version_number' ), '1.4.2', '<' ) )
		{
			$dynamik_settings = get_option( 'dynamik_gen_theme_settings' );
			$new_dynamik_settings = array(
				'bootstrap_column_classes_active' => 0
			);
			$dynamik_settings = wp_parse_args( $new_dynamik_settings, $dynamik_settings );
			update_option( 'dynamik_gen_theme_settings', $dynamik_settings );

			$dynamik_design_settings = get_option( 'dynamik_gen_design_options' );
			$new_dynamik_design_settings = array(
				'retina_logo_active' =>  0,
				'retina_logo_image' => ''
			);
			$dynamik_design_settings = wp_parse_args( $new_dynamik_design_settings, $dynamik_design_settings );
			update_option( 'dynamik_gen_design_options', $dynamik_design_settings );

			update_option( 'dynamik_gen_version_number', '1.4.2' );
		}
		
		// Finish the update sequence.
		delete_transient( 'dynamik-gen-update' );
		dynamik_activate();
		wp_redirect( admin_url( 'admin.php?page=dynamik-settings&updated=dynamik-gen' ) );
	}
}

/**
 * Perform Dynamik activation actions.
 *
 * @since 1.0
 */
function dynamik_activate()
{
	global $dynamik_folders;
	
	if( !get_option( 'dynamik_gen_version_number' ) )
	{
		update_option( 'dynamik_gen_version_number', '1.4.2' );
	}
	
	if( !get_option( 'dynamik_gen_theme_settings' ) )
	{
		update_option( 'dynamik_gen_theme_settings', dynamik_theme_settings_defaults() );
	}
	if( !get_option( 'dynamik_gen_design_options' ) )
	{
		update_option( 'dynamik_gen_design_options', dynamik_design_options_defaults() );
	}
	if( !get_option( 'dynamik_gen_responsive_options' ) )
	{
		update_option( 'dynamik_gen_responsive_options', dynamik_responsive_options_defaults() );
	}
	if( !get_option( 'dynamik_gen_design_snapshot_options' ) )
	{
		dynamik_design_snapshot_update( $activation = true );
	}
	if( !get_option( 'dynamik_gen_custom_css' ) )
	{
		update_option( 'dynamik_gen_custom_css', dynamik_custom_css_options_defaults() );
	}
	if( !get_option( 'dynamik_gen_custom_functions' ) )
	{
		update_option( 'dynamik_gen_custom_functions', dynamik_custom_functions_options_defaults() );
	}
	if( !get_option( 'dynamik_gen_custom_js' ) )
	{
		update_option( 'dynamik_gen_custom_js', dynamik_custom_js_options_defaults() );
	}
	if( !get_option( 'dynamik_gen_custom_templates' ) )
	{
		update_option( 'dynamik_gen_custom_templates', array() );
	}
	if( !get_option( 'dynamik_gen_custom_labels' ) )
	{
		update_option( 'dynamik_gen_custom_labels', array() );
	}
	if( !get_option( 'dynamik_gen_custom_conditionals' ) )
	{
		update_option( 'dynamik_gen_custom_conditionals', array() );
	}
	if( !get_option( 'dynamik_gen_custom_widget_areas' ) )
	{
		update_option( 'dynamik_gen_custom_widget_areas', array() );
	}
	if( !get_option( 'dynamik_gen_custom_hook_boxes' ) )
	{
		update_option( 'dynamik_gen_custom_hook_boxes', array() );
	}
	if( !is_dir( CHILD_DIR . '/my-templates' ) )
	{
		mkdir( CHILD_DIR . '/my-templates' );
		@chmod( CHILD_DIR . '/my-templates', 0755 );
	}
	if( !is_dir( dynamik_get_stylesheet_location( 'path', $root = true ) ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path', $root = true ) );
		@chmod( dynamik_get_stylesheet_location( 'path', $root = true ), 0755 );
	}
	if( !is_dir( dynamik_get_stylesheet_location( 'path', $root = true ) . 'theme' ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path', $root = true ) . 'theme' );
		@chmod( dynamik_get_stylesheet_location( 'path', $root = true ) . 'theme', 0755 );
	}
	if( !is_dir( dynamik_get_stylesheet_location( 'path' ) . 'default-images' ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path' ) . 'default-images' );
		@chmod( dynamik_get_stylesheet_location( 'path' ) . 'default-images', 0755 );
		
		mkdir( dynamik_get_stylesheet_location( 'path' ) . 'default-images/post-formats' );
		@chmod( dynamik_get_stylesheet_location( 'path' ) . 'default-images/post-formats', 0755 );

		$handle = opendir( CHILD_DIR . '/images' );
		while( false !== ( $file = readdir( $handle ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( CHILD_DIR . '/images/' . $file, dynamik_get_stylesheet_location( 'path' ) . 'default-images/' . $file );
			}
		}
		closedir( $handle );
		
		$handle2 = opendir( CHILD_DIR . '/images/post-formats' );
		while( false !== ( $file = readdir( $handle2 ) ) )
		{
			$ext = strtolower( substr( strrchr( $file, '.' ), 1 ) );
			if( $ext == 'jpg' || $ext == 'gif' || $ext == 'png' )
			{
				copy( CHILD_DIR . '/images/post-formats/' . $file, dynamik_get_stylesheet_location( 'path' ) . 'default-images/post-formats/' . $file );
			}
		}
		closedir( $handle2 );
	}
	$handle3 = opendir( CHILD_DIR . '/images' );
	while( false !== ( $file = readdir( $handle3 ) ) )
	{
		if( $file == 'icon-plus.png' || $file == 'icon-plus-white.png' )
		{
			copy( CHILD_DIR . '/images/' . $file, dynamik_get_stylesheet_location( 'path' ) . 'default-images/' . $file );
		}
	}
	closedir( $handle3 );
	if( !is_dir( dynamik_get_stylesheet_location( 'path' ) . 'images' ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path' ) . 'images' );
		@chmod( dynamik_get_stylesheet_location( 'path' ) . 'images', 0755 );
	}
	if( !is_dir( dynamik_get_stylesheet_location( 'path' ) . 'images/adminthumbnails' ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path' ) . 'images/adminthumbnails' );
		@chmod( dynamik_get_stylesheet_location( 'path' ) . 'images/adminthumbnails', 0755);
	}
	if( !is_dir( dynamik_get_stylesheet_location( 'path' ) . 'tmp' ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path' ) . 'tmp' );
		@chmod( dynamik_get_stylesheet_location( 'path' ) . 'tmp', 0755 );
	}
	if( !is_dir( dynamik_get_stylesheet_location( 'path' ) . 'tmp/images' ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path' ) . 'tmp/images' );
		@chmod( dynamik_get_stylesheet_location( 'path' ) . 'tmp/images', 0755 );
	}
	if( !is_dir( dynamik_get_stylesheet_location( 'path' ) . 'tmp/images/adminthumbnails' ) )
	{
		mkdir( dynamik_get_stylesheet_location( 'path' ) . 'tmp/images/adminthumbnails' );
		@chmod( dynamik_get_stylesheet_location( 'path' ) . 'tmp/images/adminthumbnails', 0755);
	}

	dynamik_write_files();
	dynamik_create_custom_functions_file();
	
	$dynamik_unwritable = false;
	foreach( $dynamik_folders as $dynamik_folder )
	{
		if( is_dir( $dynamik_folder ) && !dynamik_writable( $dynamik_folder ) )
		{
			$dynamik_unwritable = true;
		}
	}
	if( $dynamik_unwritable )
	{
		wp_redirect( admin_url( 'admin.php?page=dynamik-settings&notice=dynamik-unwritable' ) );
	}
}

/**
 * Properly convert font sizes for the 1.3 update.
 *
 * @since 1.3
 */
function dynamik_one_three_update_font_size( $font_size_key )
{
	// Build the necessary variables
	$dynamik_design_settings = get_option( 'dynamik_gen_design_options' );
	// Build the $px_em_key based on either the $font_size_key alone or with the addition
	// of 'content_heading_' to accomodate the different naming convention of the Content Headings
	$px_em_key = substr( $font_size_key, 0, 15 ) == 'content_heading' ? substr( $font_size_key, 16, -10 ) . '_px_em' : substr( $font_size_key, 0, -10 ) . '_px_em';
	$body_font_size = $dynamik_design_settings['body_font_size'];
	$font_size = $dynamik_design_settings[$font_size_key];
	$font_value_conversion_px = $font_size * $body_font_size;
	$font_value_conversion_rem = $font_value_conversion_px / 10;
	if( $dynamik_design_settings['universal_px_em'] == 'em' && $dynamik_design_settings[$px_em_key] == 'em' )
		$new_font_size = round( $font_value_conversion_rem, 1 );
	elseif( $dynamik_design_settings['universal_px_em'] == 'em' && $dynamik_design_settings[$px_em_key] == 'px' )
		$new_font_size = $font_size / 10;
	elseif( $dynamik_design_settings['universal_px_em'] == 'px' && $dynamik_design_settings[$px_em_key] == 'em' )
		$new_font_size = round( $font_value_conversion_px );
	else
		$new_font_size = $font_size;

	return $new_font_size;
}

//end lib/functions/dynamik-update.php