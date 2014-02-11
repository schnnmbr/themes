<?php
/**
 * Builds the Dynamik Subnav admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-<?php echo $nav_alt_id; ?>nav2-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Subnav', 'dynamik' ); ?></h3>
		
		<div class="dynamik-structure-settings-hide">
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Main Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select class="dynamik-universal-font-type-child" id="dynamik-nav2-font-type" name="dynamik[font_type][nav2]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['nav2'] ); ?></select>
				<input type="text" id="dynamik-nav2-font-size" name="dynamik[nav2_font_size]" value="<?php dynamik_design_options_defaults( true, 'nav2_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-nav2-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Link Underline', 'dynamik' ); ?> <select class="dynamik-universal-link-underline-child" id="dynamik-nav2-link-underline" name="dynamik[nav2_link_underline]" size="1" style="width:90px;">
					<option value="Never"<?php if( dynamik_get_design( 'nav2_link_underline' ) == 'Never' ) echo ' selected="selected"'; ?>><?php _e( 'Never', 'dynamik' ); ?></option>
					<option value="On Hover"<?php if( dynamik_get_design( 'nav2_link_underline' ) == 'On Hover' ) echo ' selected="selected"'; ?>><?php _e( 'On Hover', 'dynamik' ); ?></option>
					<option value="Off Hover"<?php if( dynamik_get_design( 'nav2_link_underline' ) == 'Off Hover' ) echo ' selected="selected"'; ?>><?php _e( 'Off Hover', 'dynamik' ); ?></option>
					<option value="Always"<?php if( dynamik_get_design( 'nav2_link_underline' ) == 'Always' ) echo ' selected="selected"'; ?>><?php _e( 'Always', 'dynamik' ); ?></option>
				</select>
				<input type="checkbox" class="universal-check" id="dynamik-nav2-font-universal" name="dynamik[nav2_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'nav2_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-nav2-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-nav2-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Subnav Font Custom CSS | <code>' . dynamik_html_markup( 'nav_secondary' ) . ' { }</code>', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css dynamik-universal-font-css-child" id="dynamik-nav2-font-css" name="dynamik[nav2_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'nav2_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Inactive/Hover/Active Page Fonts', 'dynamik' ); ?></p>
		</div>

		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Inactive Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-font-color" name="dynamik[nav2_page_font_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_font_color' ); ?>" />
				<?php _e( 'Hover Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-link-hover-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-hover-font-color" name="dynamik[nav2_page_hover_font_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_hover_font_color' ); ?>" />
				<?php _e( 'Active Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-active-font-color" name="dynamik[nav2_page_active_font_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_active_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-nav2-page-font-universal" name="dynamik[nav2_page_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'nav2_page_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Sub-Page Fonts', 'dynamik' ); ?></p>
		</div>

		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-sub-page-font-color" name="dynamik[nav2_sub_page_font_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_page_font_color' ); ?>" />
				<?php _e( 'Hover Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-link-hover-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-sub-page-hover-font-color" name="dynamik[nav2_sub_page_hover_font_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_page_hover_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-nav2-sub-page-font-universal" name="dynamik[nav2_sub_page_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'nav2_sub_page_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Main Background', 'dynamik' ); ?></p>
		</div>

		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-nav2-bg-type" class="dynamik-bg-type" name="dynamik[nav2_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'nav2_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-nav2-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-nav2-bg-no-color" name="dynamik[nav2_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'nav2_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-bg-color" name="dynamik[nav2_bg_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-nav2-bg-image" name="dynamik[nav2_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'nav2_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Inactive Page Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-nav2-page-bg-type" class="dynamik-bg-type" name="dynamik[nav2_page_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'nav2_page_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-nav2-page-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-nav2-page-bg-no-color" name="dynamik[nav2_page_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'nav2_page_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-bg-color" name="dynamik[nav2_page_bg_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-nav2-page-bg-image" name="dynamik[nav2_page_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'nav2_page_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Page Hover Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-nav2-page-hover-bg-type" class="dynamik-bg-type" name="dynamik[nav2_page_hover_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'nav2_page_hover_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-nav2-page-hover-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-nav2-page-hover-bg-no-color" name="dynamik[nav2_page_hover_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'nav2_page_hover_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-hover-bg-color" name="dynamik[nav2_page_hover_bg_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_hover_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-nav2-page-hover-bg-image" name="dynamik[nav2_page_hover_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'nav2_page_hover_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Active Page Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-nav2-page-active-bg-type" class="dynamik-bg-type" name="dynamik[nav2_page_active_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'nav2_page_active_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-nav2-page-active-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-nav2-page-active-bg-no-color" name="dynamik[nav2_page_active_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'nav2_page_active_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-active-bg-color" name="dynamik[nav2_page_active_bg_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_active_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-nav2-page-active-bg-image" name="dynamik[nav2_page_active_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'nav2_page_active_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Sub-Page Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-nav2-sub-page-bg-type" class="dynamik-bg-type" name="dynamik[nav2_sub_page_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'nav2_sub_page_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-nav2-sub-page-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-nav2-sub-page-bg-no-color" name="dynamik[nav2_sub_page_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'nav2_sub_page_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-sub-page-bg-color" name="dynamik[nav2_sub_page_bg_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_page_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-nav2-sub-page-bg-image" name="dynamik[nav2_sub_page_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'nav2_sub_page_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Sub-Page Hover Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-nav2-sub-page-hover-bg-type" class="dynamik-bg-type" name="dynamik[nav2_sub_page_hover_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'nav2_sub_page_hover_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-nav2-sub-page-hover-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-nav2-sub-page-hover-bg-no-color" name="dynamik[nav2_sub_page_hover_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'nav2_sub_page_hover_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-sub-page-hover-bg-color" name="dynamik[nav2_sub_page_hover_bg_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_page_hover_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-nav2-sub-page-hover-bg-image" name="dynamik[nav2_sub_page_hover_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'nav2_sub_page_hover_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Main Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-nav2-border-type" name="dynamik[nav2_border_type]" size="1" style="width:98px;">
					<option value="Full"<?php if (dynamik_get_design( 'nav2_border_type' ) == 'Full') echo ' selected="selected"'; ?>><?php _e( 'Full', 'dynamik' ); ?></option>
					<option value="Top/Bottom"<?php if (dynamik_get_design( 'nav2_border_type' ) == 'Top/Bottom') echo ' selected="selected"'; ?>><?php _e( 'Top/Bottom', 'dynamik' ); ?></option>
					<option value="Top"<?php if (dynamik_get_design( 'nav2_border_type' ) == 'Top') echo ' selected="selected"'; ?>><?php _e( 'Top', 'dynamik' ); ?></option>
					<option value="Bottom"<?php if (dynamik_get_design( 'nav2_border_type' ) == 'Bottom') echo ' selected="selected"'; ?>><?php _e( 'Bottom', 'dynamik' ); ?></option>
					<option value="Left/Right"<?php if (dynamik_get_design( 'nav2_border_type' ) == 'Left/Right') echo ' selected="selected"'; ?>><?php _e( 'Left/Right', 'dynamik' ); ?></option>
				</select>
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-border-thickness" name="dynamik[nav2_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'nav2_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-nav2-border-style" name="dynamik[nav2_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'nav2_border_style' ) ); ?>
				</select>
				<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-border-color" name="dynamik[nav2_border_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Individual Page Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Thickness:', 'dynamik' ); ?>
				<?php _e( 'Top', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-top-border-thickness" name="dynamik[nav2_page_top_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_top_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Btm', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-bottom-border-thickness" name="dynamik[nav2_page_bottom_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_bottom_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Lft', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-left-border-thickness" name="dynamik[nav2_page_left_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_left_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Rt', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-right-border-thickness" name="dynamik[nav2_page_right_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_right_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-nav2-page-border-style" name="dynamik[nav2_page_border_style]" size="1" style="width:70px;">
					<?php dynamik_list_borders( dynamik_get_design( 'nav2_page_border_style' ) ); ?>
				</select>
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Individual Page Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Colors: Inactive', 'dynamik' ); ?> <input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-border-color" name="dynamik[nav2_page_border_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_border_color' ); ?>" />
				<?php _e( 'Hover', 'dynamik' ); ?> <input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-hover-border-color" name="dynamik[nav2_page_hover_border_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_hover_border_color' ); ?>" />
				<?php _e( 'Active', 'dynamik' ); ?> <input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-page-active-border-color" name="dynamik[nav2_page_active_border_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_active_border_color' ); ?>" />
			</p>
		</div>
		
		</div><!-- End .dynamik-structure-settings-hide -->
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Subnav Placement', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Location Of Subnav', 'dynamik' ); ?> <select id="dynamik-nav2-location" name="dynamik[nav2_location]" size="1" style="width:115px;">
					<option value="Above Header"<?php if( dynamik_get_design( 'nav2_location' ) == 'Above Header' ) echo ' selected="selected"'; ?>><?php _e( 'Above Header', 'dynamik' ); ?></option>
					<option value="Below Header"<?php if( dynamik_get_design( 'nav2_location' ) == 'Below Header' ) echo ' selected="selected"'; ?>><?php _e( 'Below Header', 'dynamik' ); ?></option>
				</select> <span id="nav2-location-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
				
				<div class="tooltip tooltip-400">
					<h5><?php _e( 'Moving Your Navbar Around', 'dynamik' ); ?></h5>
					
					<p>
						<?php _e( 'This option makes it super easy for you to change the physcial location of the Subnavbar. When you change the location Dynamik changes the hook in which this Navbar is hooked into. For "Above Header" this Navbar is hooked into the genesis_before_header hook. For "Below Header" it is hooked into the genesis_after_header hook.', 'dynamik' ); ?>
					</p>
				</div>
			</p>
		</div>
		
		<div class="dynamik-structure-settings-hide">
		
		<div class="dynamik-design-standard-hide">
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Subnav Wrap Margins', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p>
				<?php _e( 'Top Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-nav2-wrap-top-margin" name="dynamik[nav2_wrap_top_margin]" value="<?php dynamik_design_options_defaults( true, 'nav2_wrap_top_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-nav2-wrap-bottom-margin" name="dynamik[nav2_wrap_bottom_margin]" value="<?php dynamik_design_options_defaults( true, 'nav2_wrap_bottom_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Individual Page Margins/Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Margin: Left', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-left-margin" name="dynamik[nav2_page_left_margin]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_left_margin' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Right', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-right-margin" name="dynamik[nav2_page_right_margin]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_right_margin' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Padding: Top/Btm', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-tb-padding" name="dynamik[nav2_page_tb_padding]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_tb_padding' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Lft/Rt', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-page-lr-padding" name="dynamik[nav2_page_lr_padding]" value="<?php dynamik_design_options_defaults( true, 'nav2_page_lr_padding' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		</div><!-- End .dynamik-design-standard-hide -->
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Submenu', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Border Color', 'dynamik' ); ?> <input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-nav2-submenu-border-color" name="dynamik[nav2_submenu_border_color]" value="<?php dynamik_design_options_defaults( true, 'nav2_submenu_border_color' ); ?>" />
				<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-submenu-width" name="dynamik[nav2_submenu_width]" value="<?php dynamik_design_options_defaults( true, 'nav2_submenu_width' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
				<span class="dynamik-design-standard-hide">
				<?php _e( 'Padding: Top/Btm', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-submenu-tb-padding" name="dynamik[nav2_submenu_tb_padding]" value="<?php dynamik_design_options_defaults( true, 'nav2_submenu_tb_padding' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Lft/Rt', 'dynamik' ); ?> <input type="text" id="dynamik-nav2-submenu-lr-padding" name="dynamik[nav2_submenu_lr_padding]" value="<?php dynamik_design_options_defaults( true, 'nav2_submenu_lr_padding' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				</span><!-- End .dynamik-design-standard-hide -->
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Sub-Indicator', 'dynamik' ); ?> <span id="nav2-sub-indicator-tooltip" class="tooltip-mark tooltip-top-right">[?]</span></p>
			
			<div class="tooltip tooltip-400">
				<p>
					<?php _e( 'When the Sub Indicator is set to "Image" and there is no image selected, the default dark gray "+" icon will be used.', 'dynamik' ); ?>
				</p>
			</div>
		</div>

		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<select id="dynamik-nav2-sub-indicator-type" class="dynamik-nav-sub-indicator-type" name="dynamik[nav2_sub_indicator_type]" size="1" style="width:65px;">
					<option value="Text"<?php if( dynamik_get_design( 'nav2_sub_indicator_type' ) == 'Text' ) echo ' selected="selected"'; ?>><?php _e( 'Text', 'dynamik' ); ?></option>
					<option value="Image"<?php if( dynamik_get_design( 'nav2_sub_indicator_type' ) == 'Image' ) echo ' selected="selected"'; ?>><?php _e( 'Image', 'dynamik' ); ?></option>
					<option value="None"<?php if( dynamik_get_design( 'nav2_sub_indicator_type' ) == 'None' ) echo ' selected="selected"'; ?>><?php _e( 'None', 'dynamik' ); ?></option>
				</select>
				<span style="display: none;" id="dynamik-nav2-sub-indicator-type-options">
				<select id="dynamik-nav2-sub-indicator-image" name="dynamik[nav2_sub_indicator_image]" size="1" style="width:85px;"><?php dynamik_list_images( dynamik_get_design( 'nav2_sub_indicator_image' ) ); ?></select>
				<?php _e( 'Width', 'dynamik' ); ?>
				<input type="text" id="dynamik-nav2-sub-indicator-width" name="dynamik[nav2_sub_indicator_width]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_indicator_width' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Height', 'dynamik' ); ?>
				<input type="text" id="dynamik-nav2-sub-indicator-height" name="dynamik[nav2_sub_indicator_height]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_indicator_height' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Top', 'dynamik' ); ?>
				<input type="text" id="dynamik-nav2-sub-indicator-top" name="dynamik[nav2_sub_indicator_top]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_indicator_top' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Right', 'dynamik' ); ?>
				<input type="text" id="dynamik-nav2-sub-indicator-right" name="dynamik[nav2_sub_indicator_right]" value="<?php dynamik_design_options_defaults( true, 'nav2_sub_indicator_right' ); ?>" style="width:30px;" /><code class="dynamik-px-unit">px</code>
				</span>
			</p>
		</div>
		
		</div><!-- End .dynamik-structure-settings-hide -->
		
	</div>
</div>