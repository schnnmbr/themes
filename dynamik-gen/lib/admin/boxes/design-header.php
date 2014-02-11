<?php
/**
 * Builds the Dynamik Header admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-header-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Header | Logo', 'dynamik' ); ?></h3>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Header Title Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select class="dynamik-universal-font-type-child dynamik-universal-heading-font-type-child" id="dynamik-title-font-type" name="dynamik[font_type][title]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['title'] ); ?></select>
				<?php _e( 'Size', 'dynamik' ); ?>
				<input type="text" id="dynamik-title-font-size" name="dynamik[title_font_size]" value="<?php dynamik_design_options_defaults( true, 'title_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-title-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child dynamik-universal-heading-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-title-font-color" name="dynamik[title_font_color]" value="<?php dynamik_design_options_defaults( true, 'title_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-title-font-universal" name="dynamik[title_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'title_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-title-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-title-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Title Font Custom CSS | <code>' . dynamik_html_markup( 'site_title' ) . ' { }</code>', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css dynamik-universal-font-css-child dynamik-universal-heading-font-css-child" id="dynamik-title-font-css" name="dynamik[title_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'title_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Header Title Link', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Link Hover Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-link-hover-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-title-link-color" name="dynamik[title_link_color]" value="<?php dynamik_design_options_defaults( true, 'title_link_color' ); ?>" />
				<?php _e( 'Link Underline', 'dynamik' ); ?> <select class="dynamik-universal-link-underline-child" id="dynamik-title-link-underline" name="dynamik[title_link_underline]" size="1" style="width:90px;">
					<option value="Never"<?php if (dynamik_get_design( 'title_link_underline' ) == 'Never') echo ' selected="selected"'; ?>><?php _e( 'Never', 'dynamik' ); ?></option>
					<option value="On Hover"<?php if (dynamik_get_design( 'title_link_underline' ) == 'On Hover') echo ' selected="selected"'; ?>><?php _e( 'On Hover', 'dynamik' ); ?></option>
					<option value="Off Hover"<?php if (dynamik_get_design( 'title_link_underline' ) == 'Off Hover') echo ' selected="selected"'; ?>><?php _e( 'Off Hover', 'dynamik' ); ?></option>
					<option value="Always"<?php if (dynamik_get_design( 'title_link_underline' ) == 'Always') echo ' selected="selected"'; ?>><?php _e( 'Always', 'dynamik' ); ?></option>
				</select>
				<input type="checkbox" class="universal-check" id="dynamik-title-link-universal" name="dynamik[title_link_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'title_link_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Header Tagline Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select class="dynamik-universal-font-type-child dynamik-universal-content-font-type-child" id="dynamik-tagline-font-type" name="dynamik[font_type][tagline]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['tagline'] ); ?></select>
				<?php _e( 'Size', 'dynamik' ); ?>
				<input type="text" id="dynamik-tagline-font-size" name="dynamik[tagline_font_size]" value="<?php dynamik_design_options_defaults( true, 'tagline_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-tagline-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child dynamik-universal-content-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-tagline-font-color" name="dynamik[tagline_font_color]" value="<?php dynamik_design_options_defaults( true, 'tagline_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-tagline-font-universal" name="dynamik[tagline_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'tagline_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-tagline-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-tagline-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Tagline Font Custom CSS | <code>' . dynamik_html_markup( 'site_description' ) . ' { }</code>', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css dynamik-universal-font-css-child dynamik-universal-content-font-css-child" id="dynamik-tagline-font-css" name="dynamik[tagline_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'tagline_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Header Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-header-bg-type" class="dynamik-bg-type" name="dynamik[header_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'header_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-header-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-header-bg-no-color" name="dynamik[header_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'header_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-header-bg-color" name="dynamik[header_bg_color]" value="<?php dynamik_design_options_defaults( true, 'header_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-header-bg-image" name="dynamik[header_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'header_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Header Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-header-border-type" name="dynamik[header_border_type]" size="1" style="width:98px;">
					<option value="Full"<?php if( dynamik_get_design( 'header_border_type' ) == 'Full' ) echo ' selected="selected"'; ?>><?php _e( 'Full', 'dynamik' ); ?></option>
					<option value="Top/Bottom"<?php if( dynamik_get_design( 'header_border_type' ) == 'Top/Bottom' ) echo ' selected="selected"'; ?>><?php _e( 'Top/Bottom', 'dynamik' ); ?></option>
					<option value="Top"<?php if( dynamik_get_design( 'header_border_type' ) == 'Top' ) echo ' selected="selected"'; ?>><?php _e( 'Top', 'dynamik' ); ?></option>
					<option value="Bottom"<?php if( dynamik_get_design( 'header_border_type' ) == 'Bottom' ) echo ' selected="selected"'; ?>><?php _e( 'Bottom', 'dynamik' ); ?></option>
					<option value="Left/Right"<?php if( dynamik_get_design( 'header_border_type' ) == 'Left/Right' ) echo ' selected="selected"'; ?>><?php _e( 'Left/Right', 'dynamik' ); ?></option>
				</select>
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-header-border-thickness" name="dynamik[header_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'header_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-header-border-style" name="dynamik[header_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'header_border_style' ) ); ?>
				</select>
				<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-header-border-color" name="dynamik[header_border_color]" value="<?php dynamik_design_options_defaults( true, 'header_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Select Logo Type', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design" style="padding-top:8px;">
				<?php _e( 'Select a Logo Type', 'dynamik' ); ?>
				<b><a href="<?php echo admin_url( 'admin.php?page=genesis' ); ?>"><?php _e( 'HERE', 'dynamik' ); ?></a></b>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Select Logo Image', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Logo Image', 'dynamik' ); ?> <select id="dynamik-logo-image" name="dynamik[logo_image]" size="1" style="width:175px;"><?php dynamik_list_images( dynamik_get_design( 'logo_image' ) ); ?></select>
				<?php _e( 'Add Retina-Ready Logo', 'dynamik' ); ?> <input type="checkbox" id="dynamik-retina-logo-active" name="dynamik[retina_logo_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'retina_logo_active' ) ) ); ?> />
				<span id="dynamik-retina-logo-active-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
			</p>

			<div class="tooltip tooltip-600">
				<h5><?php _e( 'What Is A "Retina-Ready" Logo?', 'dynamik' ); ?></h5>
				
				<p>
					<?php _e( 'Many devices these days use Retina or some form of high definition screen (eg. iPhone, iPad, MacBook Pro, Google Nexus Devices, etc..) which use four times the pixels found in standard definition screens. Because of this you may find images on such HD screens to look blurry or grainy.', 'dynamik' ); ?>
				</p>

				<p>
					<?php _e( 'To address this you will find various solutions involving tools such as javascript and/or CSS, properly scaling larger images to maintain their proper dimension while providing more crisp and clear renderings of such media, both on standard AND HD displays.', 'dynamik' ); ?>
				</p>

				<p>
					<?php _e( 'In this particular case Dynamik will use your "Retina-Ready" logo image (selected below) to provide such a solution. Please note that your HD logo image should be a version of your logo that is exactly twice the dimensions as your standard logo (selected in the "Logo Image" drop-down). So if your standard logo image has a dimension of 250px by 100px then your HD version should be 500px by 200px.', 'dynamik' ); ?>
				</p>

				<p>
					<?php _e( 'Dynamik will then add the proper CSS code to scale this HD logo to fit the same space as your standard logo, but in a way that will look nice and clear on HD displays. Note that this is fully Internet Explorer 7/8 backward compatible. Also note that the larger HD logo will only be used on HD displays, with your SD logo image being utilized in all other cases.', 'dynamik' ); ?>
				</p>

				<h5><?php _e( 'Naming Convention', 'dynamik' ); ?></h5>
				
				<p>
					<?php _e( 'A pretty standard way to name your two logo images when including one standard definition version and one high definition version is something like this: my-logo.png (for your SD version) and my-logo@2x.png (for your HD version).', 'dynamik' ); ?>
				</p>

				<h5><?php _e( 'Reducing Your Logo File Size', 'dynamik' ); ?></h5>

				<p>
					<?php _e( 'Using an HD version of your logo image will increase its file size, but this can be effectively addressed by reducing the file size with online tools such as the sites linked to below.', 'dynamik' ); ?>
				</p>

				<span class="tooltip-credit">
					<a href="https://tinypng.com/" target="_blank"><?php _e( 'Reduce Your PNG Logo Image Size', 'dynamik' ); ?></a>
				</span>

				<span class="tooltip-credit" style="float:right;">
					<a href="http://tools.shadowdev.com/tinyjpg/" target="_blank"><?php _e( 'Reduce Your JPG Logo Image Size', 'dynamik' ); ?></a>
				</span>
			</div>
		</div>

		<div style="display:none;" class="dynamik-design-option-desc dynamik-retina-logo-active-box">
			<p><?php _e( 'Select Retina Logo Image', 'dynamik' ); ?></p>
		</div>
		
		<div style="display:none;" class="dynamik-design-option dynamik-retina-logo-active-box">
			<p class="bg-box-design">
				<?php _e( 'Retina Logo Image', 'dynamik' ); ?> <select id="dynamik-retina-logo-image" name="dynamik[retina_logo_image]" size="1" style="width:175px;"><?php dynamik_list_images( dynamik_get_design( 'retina_logo_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Header Dimensions', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Header Title Area Width', 'dynamik' ); ?> <input type="text" id="dynamik-header-title-area-width" name="dynamik[header_title_area_width]" value="<?php dynamik_design_options_defaults( true, 'header_title_area_width' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Header Height', 'dynamik' ); ?> <input type="text" id="dynamik-header-height" name="dynamik[header_height]" value="<?php dynamik_design_options_defaults( true, 'header_height' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Header Text Title Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Top Padding', 'dynamik' ); ?> <input type="text" id="dynamik-text-logo-top-padding" name="dynamik[text_logo_top_padding]" value="<?php dynamik_design_options_defaults( true, 'text_logo_top_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left Padding', 'dynamik' ); ?> <input type="text" id="dynamik-text-logo-left-padding" name="dynamik[text_logo_left_padding]" value="<?php dynamik_design_options_defaults( true, 'text_logo_left_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Tagline Top Padding', 'dynamik' ); ?> <input type="text" id="dynamik-tagline-top-padding" name="dynamik[tagline_top_padding]" value="<?php dynamik_design_options_defaults( true, 'tagline_top_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Header Image Logo Margins', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Top Margin', 'dynamik' ); ?> <input type="text" id="dynamik-image-logo-top-margin" name="dynamik[image_logo_top_margin]" value="<?php dynamik_design_options_defaults( true, 'image_logo_top_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left Margin', 'dynamik' ); ?> <input type="text" id="dynamik-image-logo-left-margin" name="dynamik[image_logo_left_margin]" value="<?php dynamik_design_options_defaults( true, 'image_logo_left_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Header Widget Area Styles', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-header-widget-width" name="dynamik[header_widget_width]" value="<?php dynamik_design_options_defaults( true, 'header_widget_width' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Top Padding', 'dynamik' ); ?> <input type="text" id="dynamik-header-widget-top-padding" name="dynamik[header_widget_top_padding]" value="<?php dynamik_design_options_defaults( true, 'header_widget_top_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Right Padding', 'dynamik' ); ?> <input type="text" id="dynamik-header-widget-right-padding" name="dynamik[header_widget_right_padding]" value="<?php dynamik_design_options_defaults( true, 'header_widget_right_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Text Align', 'dynamik' ); ?> <select id="dynamik-header-widget-text-align" name="dynamik[header_widget_text_align]" size="1" style="width:65px;">
					<option value="left"<?php if( dynamik_get_design( 'header_widget_text_align' ) == 'left' ) echo ' selected="selected"'; ?>><?php _e( 'Left', 'dynamik' ); ?></option>
					<option value="right"<?php if( dynamik_get_design( 'header_widget_text_align' ) == 'right' ) echo ' selected="selected"'; ?>><?php _e( 'Right', 'dynamik' ); ?></option>
				</select>
			</p>
		</div>
	</div>
</div>