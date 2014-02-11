<?php
/**
 * Builds the Dynamik Body admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-body-box" class="dynamik-optionbox-outer-1col dynamik-all-options<?php echo $body_display; ?>">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Body', 'dynamik' ); ?></h3>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Universal Font Control', 'dynamik' ); ?> <span id="universal-font-control-tooltip" class="tooltip-mark tooltip-bottom-right">[?]</span></p>
		
			<div class="tooltip tooltip-500">
				<h5><?php _e( 'Control all your Font Settings with Universal Font Control.', 'dynamik' ); ?></h5>
				
				<p>
					<?php _e( 'Any change you make to one of these options will be applied to all Font options of the same kind. For instance, changing the Universal Font Type Georgia does the same thing as if you were to change each of Dynamik\'s Font Type dropdowns to Georgia one-by-one.', 'dynamik' ); ?>
				</p>
				
				<p>
					<?php _e( 'All of the Design Option Sets that contain font options have a checkbox followed by "(U)". The "(U)" is shorthand for "Under Universal Control". If you do not want changes to the Universal Control options to be reflected in a particular Design Option Set, uncheck the box next to the "(U)" in that option set.', 'dynamik' ); ?>
				</p>
				
				<h5><?php _e( 'Note About Switching Fonts From One Unit To The Other', 'dynamik' ); ?></h5>
				
				<p>
					<?php _e( 'When you switch from REM to PX and vise versa your font size values will automatically adjust accordingly, reflecting their equivalent REM or PX value. The way Dynamik does this is by either multiplying or dividing your current font size values by the REM or PX value of the font size being adjusted.', 'dynamik' ); ?>
				</p>
				
				<p>
					<?php _e( '<strong>Please Note:</strong> Every REM value is relative to the current HTML font-size value. So with the default HTML font-size of 62.5%, which is the 10px browser default, you can easily adjust your REM font sizes based on the fact that they are one-tenth the value of their PX counterparts. So 10px = 1rem and 16px = 1.6rem, etc..', 'dynamik' ); ?>
				</p>
			</div>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-universal-font-type" class="universal-font-master" name="dynamik[font_type][universal]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['universal'] ); ?></select> <a href="http://www.google.com/fonts/" target="_blank" title="Click to view the Google Font Directory">[G]</a>
				<?php _e( 'Unit', 'dynamik' ); ?> <select id="dynamik-universal-px-em" class="universal-font-master" name="dynamik[universal_px_em]" size="1" style="width:55px;">
					<option value="px"<?php echo ( dynamik_get_design( 'universal_px_em' ) == 'px' ) ? ' selected="selected"' : ''; ?>>px</option>
					<option value="em"<?php echo ( dynamik_get_design( 'universal_px_em' ) == 'em' ) ? ' selected="selected"' : ''; ?>>rem</option>
				</select>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="universal-font-master color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-universal-font-color" name="dynamik[universal_font_color]" value="<?php dynamik_design_options_defaults( true, 'universal_font_color' ); ?>" />
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-universal-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-universal-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Universal Font Custom CSS', 'dynamik' ); ?><br />
				<textarea id="dynamik-universal-font-css" class="dynamik-custom-font-css universal-font-master dynamik-universal-font-css-child" name="dynamik[universal_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'universal_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Universal Heading Font Control', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-universal-heading-font-type" class="universal-font-master" name="dynamik[font_type][universal_heading]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['universal_heading'] ); ?></select>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="universal-font-master color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-universal-heading-font-color" name="dynamik[universal_heading_font_color]" value="<?php dynamik_design_options_defaults( true, 'universal_heading_font_color' ); ?>" />
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-universal-heading-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-universal-heading-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Universal Heading Font Custom CSS', 'dynamik' ); ?><br />
				<textarea id="dynamik-universal-heading-font-css" class="dynamik-custom-font-css universal-font-master dynamik-universal-font-css-child" name="dynamik[universal_heading_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'universal_heading_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Universal Content Font Control', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-universal-content-font-type" class="universal-font-master" name="dynamik[font_type][universal_content]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['universal_content'] ); ?></select>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="universal-font-master color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-universal-content-font-color" name="dynamik[universal_content_font_color]" value="<?php dynamik_design_options_defaults( true, 'universal_content_font_color' ); ?>" />
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-universal-content-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-universal-content-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Universal Content Font Custom CSS', 'dynamik' ); ?><br />
				<textarea id="dynamik-universal-content-font-css" class="dynamik-custom-font-css universal-font-master dynamik-universal-font-css-child" name="dynamik[universal_content_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'universal_content_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Universal Link Control', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Link', 'dynamik' ); ?><input type="text" class="universal-font-master color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-universal-link-color" name="dynamik[universal_link_color]" value="<?php dynamik_design_options_defaults( true, 'universal_link_color' ); ?>" />
				<?php _e( 'Link Hover', 'dynamik' ); ?><input type="text" class="universal-font-master color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-universal-link-hover-color" name="dynamik[universal_link_hover_color]" value="<?php dynamik_design_options_defaults( true, 'universal_link_hover_color' ); ?>" />
				<?php _e( 'Link Underline', 'dynamik' ); ?> <select id="dynamik-universal-link-underline" class="universal-font-master" name="dynamik[universal_link_underline]" size="1" style="width:90px;">
					<option value="Never"<?php if( dynamik_get_design( 'universal_link_underline' ) == 'Never' ) echo ' selected="selected"'; ?>><?php _e( 'Never', 'dynamik' ); ?></option>
					<option value="On Hover"<?php if( dynamik_get_design( 'universal_link_underline' ) == 'On Hover' ) echo ' selected="selected"'; ?>><?php _e( 'On Hover', 'dynamik' ); ?></option>
					<option value="Off Hover"<?php if( dynamik_get_design( 'universal_link_underline' ) == 'Off Hover' ) echo ' selected="selected"'; ?>><?php _e( 'Off Hover', 'dynamik' ); ?></option>
					<option value="Always"<?php if( dynamik_get_design( 'universal_link_underline' ) == 'Always' ) echo ' selected="selected"'; ?>><?php _e( 'Always', 'dynamik' ); ?></option>
				</select>
			</p>
		</div>

		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Universal Link Transition', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Enable Link Transition', 'dynamik' ); ?> <input type="checkbox" id="dynamik-universal-link-transition-active" name="dynamik[universal_link_transition_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'universal_link_transition_active' ) ) ); ?> />
				<?php _e( 'Style', 'dynamik' ); ?> <input type="text" id="dynamik-universal-link-transition-style" name="dynamik[universal_link_transition_style]" value="<?php dynamik_design_options_defaults( true, 'universal_link_transition_style' ); ?>" style="width:220px;" />
				<span id="universal-link-transition-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
			</p>
			
			<div class="tooltip tooltip-400">
				<p>
					<?php _e( 'A Link Transition is a CSS3 property that, in its simplest form like what we have here, provides a subtle delay and transition effect from the link color to the link hover color. <strong>Note</strong> that this also affects buttons (as well as anything with the .button class assigned to it) and inputs as well as textarea focus. <strong>Also note</strong> that older browsers do not support this CSS property.', 'dynamik' ); ?>
				</p>
			</div>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Body Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Size', 'dynamik' ); ?>
				<input type="text" id="dynamik-body-font-size" name="dynamik[body_font_size]" value="<?php dynamik_design_options_defaults( true, 'body_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-body-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Line Height', 'dynamik' ); ?> <input type="text" id="dynamik-universal-line-height" name="dynamik[universal_line_height]" value="<?php dynamik_design_options_defaults( true, 'universal_line_height' ); ?>" style="width:50px;" />
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-body-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-body-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Body Font Custom CSS | <code>body { }</code>', 'dynamik' ); ?><br />
				<textarea id="dynamik-body-font-css" class="dynamik-custom-font-css dynamik-universal-font-css-child" name="dynamik[body_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'body_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Body Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-body-bg-type" name="dynamik[body_bg_type]" class="iewide bg-option" style="width:175px;">
					<option value="color"<?php if( dynamik_get_design( 'body_bg_type' ) == 'color' ) echo ' selected="selected"'; ?>><?php _e( 'Color', 'dynamik' ); ?></option>
					<option value="top left no-repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top left no-repeat' ) echo ' selected="selected"'; ?>><?php _e( 'No-Repeat Image (Left)', 'dynamik' ); ?></option>
					<option value="top center no-repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top center no-repeat' ) echo ' selected="selected"'; ?>><?php _e( 'No-Repeat Image (Center)', 'dynamik' ); ?></option>
					<option value="top right no-repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top right no-repeat' ) echo ' selected="selected"'; ?>><?php _e( 'No-Repeat Image (Right)', 'dynamik' ); ?></option>
					<option value="top left fixed no-repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top left fixed no-repeat' ) echo ' selected="selected"'; ?>><?php _e( 'No-Repeat Image (Left Fixed)', 'dynamik' ); ?></option>
					<option value="top center fixed no-repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top center fixed no-repeat' ) echo ' selected="selected"'; ?>><?php _e( 'No-Repeat Image (Center Fixed)', 'dynamik' ); ?></option>
					<option value="top right fixed no-repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top right fixed no-repeat' ) echo ' selected="selected"'; ?>><?php _e( 'No-Repeat Image (Right Fixed)', 'dynamik' ); ?></option>
					<option value="top left repeat-x"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top left repeat-x' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal-Repeat Image (Left)', 'dynamik' ); ?></option>
					<option value="top center repeat-x"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top center repeat-x' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal-Repeat Image (Center)', 'dynamik' ); ?></option>
					<option value="top right repeat-x"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top right repeat-x' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal-Repeat Image (Right)', 'dynamik' ); ?></option>
					<option value="top left fixed repeat-x"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top left fixed repeat-x' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal-Repeat Image (Left Fixed)', 'dynamik' ); ?></option>
					<option value="top center fixed repeat-x"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top center fixed repeat-x' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal-Repeat Image (Center Fixed)', 'dynamik' ); ?></option>
					<option value="top right fixed repeat-x"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top right fixed repeat-x' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal-Repeat Image (Right Fixed)', 'dynamik' ); ?></option>
					<option value="top left repeat-y"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top left repeat-y' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical-Repeat Image (Left)', 'dynamik' ); ?></option>
					<option value="top center repeat-y"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top center repeat-y' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical-Repeat Image (Center)', 'dynamik' ); ?></option>
					<option value="top right repeat-y"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top right repeat-y' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical-Repeat Image (Right)', 'dynamik' ); ?></option>
					<option value="top left fixed repeat-y"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top left fixed repeat-y' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical-Repeat Image (Left Fixed)', 'dynamik' ); ?></option>
					<option value="top center fixed repeat-y"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top center fixed repeat-y' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical-Repeat Image (Center Fixed)', 'dynamik' ); ?></option>
					<option value="top right fixed repeat-y"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top right fixed repeat-y' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical-Repeat Image (Right Fixed)', 'dynamik' ); ?></option>
					<option value="top repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top repeat' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal & Vertical-Repeat Image', 'dynamik' ); ?></option>
					<option value="top fixed repeat"<?php if( dynamik_get_design( 'body_bg_type' ) == 'top fixed repeat' ) echo ' selected="selected"'; ?>><?php _e( 'Horizontal & Vertical-Repeat Image (Fixed)', 'dynamik' ); ?></option>
				</select><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-body-bg-color" name="dynamik[body_bg_color]" value="<?php dynamik_design_options_defaults( true, 'body_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-body-bg-image" name="dynamik[body_bg_image]" size="1" style="width:175px;"><?php dynamik_list_images( dynamik_get_design( 'body_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Dynamik CSS', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design" style="padding-top:8px;">
				<input type="checkbox" id="dynamik-minify-css" name="dynamik[minify_css]" value="1" <?php if( checked( 1, dynamik_get_design( 'minify_css' ) ) ); ?> /> <?php _e( 'Minify the Dynamik Stylesheet', 'dynamik' ); ?>
				<span id="dynamik-css-options-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
				<span class="tooltip tooltip-400" style="color: #666666 !important;">
					<?php _e( 'This option should be active for general use. When the option is checked, style.css, dynamik.css and any Dynamik Custom CSS are merged into one stylesheet (dynamik-min.css) and minified for effeciency. When unchecked the un-minified stylesheets are called separately, which is ideal for testing purposes only.', 'dynamik' ); ?>
				</span>
				| <a href="<?php echo dynamik_get_stylesheet_location( 'url' ) . 'dynamik.css';?>" target="_blank"><span style="font-style:underline;"><?php _e( 'Click here to view the dynamik.css stylesheet', 'dynamik' ); ?></a> 
			</p>
		</div>
	</div>
</div>