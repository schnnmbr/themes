<?php
/**
 * Builds the Dynamik Wrap admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-wrap-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Wrap', 'dynamik' ); ?></h3>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Wrap Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-wrap-bg-type" class="dynamik-bg-type" name="dynamik[wrap_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'wrap_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-wrap-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-wrap-bg-no-color" name="dynamik[wrap_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'wrap_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-wrap-bg-color" name="dynamik[wrap_bg_color]" value="<?php dynamik_design_options_defaults( true, 'wrap_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-wrap-bg-image" name="dynamik[wrap_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'wrap_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Inner Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-container-wrap-bg-type" class="dynamik-bg-type" name="dynamik[inner_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'inner_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-container-wrap-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-container-wrap-bg-no-color" name="dynamik[inner_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'inner_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-container-wrap-bg-color" name="dynamik[inner_bg_color]" value="<?php dynamik_design_options_defaults( true, 'inner_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-container-wrap-bg-image" name="dynamik[inner_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'inner_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Wrap Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-wrap-border-type" name="dynamik[wrap_border_type]" size="1" style="width:100px;">
					<option value="Full"<?php if( dynamik_get_design( 'wrap_border_type' ) == 'Full' ) echo ' selected="selected"'; ?>><?php _e( 'Full', 'dynamik' ); ?></option>
					<option value="Top/Bottom"<?php if( dynamik_get_design( 'wrap_border_type' ) == 'Top/Bottom' ) echo ' selected="selected"'; ?>><?php _e( 'Top/Bottom', 'dynamik' ); ?></option>
					<option value="Left/Right"<?php if( dynamik_get_design( 'wrap_border_type' ) == 'Left/Right' ) echo ' selected="selected"'; ?>><?php _e( 'Left/Right', 'dynamik' ); ?></option>
				</select>
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-wrap-border-thickness" name="dynamik[wrap_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'wrap_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-wrap-border-style" name="dynamik[wrap_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'wrap_border_style' ) ); ?>
				</select><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-wrap-border-color" name="dynamik[wrap_border_color]" value="<?php dynamik_design_options_defaults( true, 'wrap_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Inner Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-inner-border-type" name="dynamik[inner_border_type]" size="1" style="width:100px;">
					<option value="Full"<?php if( dynamik_get_design( 'inner_border_type' ) == 'Full' ) echo ' selected="selected"'; ?>><?php _e( 'Full', 'dynamik' ); ?></option>
					<option value="Top/Bottom"<?php if( dynamik_get_design( 'inner_border_type' ) == 'Top/Bottom' ) echo ' selected="selected"'; ?>><?php _e( 'Top/Bottom', 'dynamik' ); ?></option>
					<option value="Left/Right"<?php if( dynamik_get_design( 'inner_border_type' ) == 'Left/Right' ) echo ' selected="selected"'; ?>><?php _e( 'Left/Right', 'dynamik' ); ?></option>
				</select>
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-inner-border-thickness" name="dynamik[inner_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'inner_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-inner-border-style" name="dynamik[inner_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'inner_border_style' ) ); ?>
				</select><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-inner-border-color" name="dynamik[inner_border_color]" value="<?php dynamik_design_options_defaults( true, 'inner_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Wrap Box Shadow', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Enable Wrap Box Shadow', 'dynamik' ); ?> <input type="checkbox" id="dynamik-wrap-shadow-active" name="dynamik[wrap_shadow_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'wrap_shadow_active' ) ) ); ?> />
				<?php _e( 'Style', 'dynamik' ); ?> <input type="text" id="dynamik-wrap-shadow-style" name="dynamik[wrap_shadow_style]" value="<?php dynamik_design_options_defaults( true, 'wrap_shadow_style' ); ?>" style="width:220px;" />
				<span id="wrap-border-shadow-radius" class="tooltip-mark tooltip-center-left">[?]</span>
			</p>
			
			<div class="tooltip tooltip-500">
				<h5><?php _e( 'Adding Style To Your Wrap Border', 'dynamik' ); ?></h5>
				
				<p>
					<?php _e( 'Box Shadow and Border Radius are two Styles that can be tweaked to add more depth and refinement to your Wrap and/or Inner border. Just keep in mind that only CSS3 compatible web browsers will render these styles (eg. Firefox, Chrome, Safari, Opera and Internet Explorer 9).', 'dynamik' ); ?>
				</p>
				
				<h5><?php _e( 'On/Off & Style:', 'dynamik' ); ?></h5>
				
				<p>
					<?php _e( 'You can easily turn these styles On or Off with the checkbox options. If you want to tweak the actual styles you can do so by adjusting the default styles in the textareas provided.', 'dynamik' ); ?>
				</p>
				
				<span class="tooltip-credit">
					<?php _e( 'Read more about:', 'dynamik' ); ?>
					<a href="http://www.w3.org/TR/css3-background/#the-box-shadow" target="_blank"><?php _e( 'Box Shadow', 'dynamik' ); ?></a>
				</span>
				
				<span class="tooltip-credit" style="float:right;">
					<?php _e( 'Read more about:', 'dynamik' ); ?>
					<a href="http://www.w3.org/TR/css3-background/#the-border-radius" target="_blank"><?php _e( 'Border Radius', 'dynamik' ); ?></a>
				</span>
			</div>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Inner Box Shadow', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Enable Inner Box Shadow', 'dynamik' ); ?> <input type="checkbox" id="dynamik-inner-shadow-active" name="dynamik[inner_shadow_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'inner_shadow_active' ) ) ); ?> />
				<?php _e( 'Style', 'dynamik' ); ?> <input type="text" id="dynamik-inner-shadow-style" name="dynamik[inner_shadow_style]" value="<?php dynamik_design_options_defaults( true, 'inner_shadow_style' ); ?>" style="width:220px;" />
			</p>
		</div>

		<div class="dynamik-border-option-desc">
			<p><?php _e( 'General Box Shadow', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Enable General Box Shadow', 'dynamik' ); ?> <input type="checkbox" id="dynamik-general-shadow-active" name="dynamik[general_shadow_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'general_shadow_active' ) ) ); ?> />
				<?php _e( 'Style', 'dynamik' ); ?> <input type="text" id="dynamik-general-shadow-style" name="dynamik[general_shadow_style]" value="<?php dynamik_design_options_defaults( true, 'general_shadow_style' ); ?>" style="width:206px;" />
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-general-shadow-elements" class="dynamik-custom-fonts-button button">#Elements</span></span>
				<div style="display:none;" id="show-general-shadow-elements-box" class="dynamik-custom-fonts-box">
				<?php _e( 'General Box Shadow Elements', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css" id="dynamik-general-shadow-elements" name="dynamik[general_shadow_elements]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'general_shadow_elements' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Wrap Border Radius', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Enable Wrap Border Radius', 'dynamik' ); ?> <input type="checkbox" id="dynamik-wrap-radius-active" name="dynamik[wrap_radius_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'wrap_radius_active' ) ) ); ?> />
				<?php _e( 'Style', 'dynamik' ); ?> <input type="text" id="dynamik-wrap-radius-style" name="dynamik[wrap_radius_style]" value="<?php dynamik_design_options_defaults( true, 'wrap_radius_style' ); ?>" style="width:210px;" />
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Inner Border Radius', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Enable Inner Border Radius', 'dynamik' ); ?> <input type="checkbox" id="dynamik-inner-radius-active" name="dynamik[inner_radius_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'inner_radius_active' ) ) ); ?> />
				<?php _e( 'Style', 'dynamik' ); ?> <input type="text" id="dynamik-inner-radius-style" name="dynamik[inner_radius_style]" value="<?php dynamik_design_options_defaults( true, 'inner_radius_style' ); ?>" style="width:210px;" />
			</p>
		</div>

		<div class="dynamik-border-option-desc">
			<p><?php _e( 'General Border Radius', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Enable General Border Radius', 'dynamik' ); ?> <input type="checkbox" id="dynamik-general-radius-active" name="dynamik[general_radius_active]" value="1" <?php if( checked( 1, dynamik_get_design( 'general_radius_active' ) ) ); ?> />
				<?php _e( 'Style', 'dynamik' ); ?> <input type="text" id="dynamik-general-radius-style" name="dynamik[general_radius_style]" value="<?php dynamik_design_options_defaults( true, 'general_radius_style' ); ?>" style="width:196px;" />
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-general-radius-elements" class="dynamik-custom-fonts-button button">#Elements</span></span>
				<div style="display:none;" id="show-general-radius-elements-box" class="dynamik-custom-fonts-box">
				<?php _e( 'General Border Radius Elements', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css" id="dynamik-general-radius-elements" name="dynamik[general_radius_elements]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'general_radius_elements' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Wrap Margin', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Top Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-wrap-top-margin" name="dynamik[wrap_top_margin]" value="<?php dynamik_design_options_defaults( true, 'wrap_top_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-wrap-bottom-margin" name="dynamik[wrap_bottom_margin]" value="<?php dynamik_design_options_defaults( true, 'wrap_bottom_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Inner Margin', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Top Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-inner-top-margin" name="dynamik[inner_top_margin]" value="<?php dynamik_design_options_defaults( true, 'inner_top_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-inner-bottom-margin" name="dynamik[inner_bottom_margin]" value="<?php dynamik_design_options_defaults( true, 'inner_bottom_margin' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Wrap Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Top/Bottom Padding', 'dynamik' ); ?>
				<input type="text" id="dynamik-wrap-tb-padding" name="dynamik[wrap_tb_padding]" value="<?php dynamik_design_options_defaults( true, 'wrap_tb_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left/Right Padding', 'dynamik' ); ?>
				<input type="text" id="dynamik-wrap-lr-padding" name="dynamik[wrap_lr_padding]" value="<?php dynamik_design_options_defaults( true, 'wrap_lr_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Inner Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Top/Bottom', 'dynamik' ); ?>
				<input type="text" id="dynamik-container-wrap-tb-padding" name="dynamik[inner_tb_padding]" value="<?php dynamik_design_options_defaults( true, 'inner_tb_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left/Right', 'dynamik' ); ?>
				<input type="text" class="dynamik-width-option" id="dynamik-container-wrap-lr-padding" name="dynamik[inner_lr_padding]" value="<?php dynamik_design_options_defaults( true, 'inner_lr_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Sidebar Separation', 'dynamik' ); ?>
				<input type="text" class="dynamik-width-option" id="dynamik-sb-separation-padding" name="dynamik[sb_separation_padding]" value="<?php dynamik_design_options_defaults( true, 'sb_separation_padding' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
	</div>

	<div style="float:left; width:802px;">
		<div class="dynamik-optionbox-2col-left-wrap">
			<div class="dynamik-optionbox-outer-2col">
				<div class="dynamik-optionbox-inner-2col">
					<h4><?php _e( 'Site Structure Preview', 'dynamik' ); ?> <span id="site-structure-preview" class="tooltip-mark tooltip-center-right">[?]</span></h4>
					
					<div class="tooltip tooltip-500">
						<h5><?php _e( 'The Difference Between Fixed and Fluid:', 'dynamik' ); ?></h5>
						<p>
							<?php _e( 'What this dynamically changing image does for you is provide a quick reference as to what the "Site Structure Options" to the right will do based on their settings.', 'dynamik' ); ?>
						</p>
						
						<p>
							<?php _e( 'The horizontal strips of dark and medium gray represent the Header, Navbar and Footer areas. As you can see, if "Fixed Design" is selected the #wrap width is fixed resulting in the Header, Navbar and Footer areas being "fixed" inside it, but if "Fluid Design" is selected then the #wrap width is set to 100% resulting in these areas becoming fully fluid.', 'dynamik' ); ?>
						</p>
					</div>
					
					<div id="dynamik-wrap-preview"><img id="dynamik-wrap-preview-img" src=""/></div>
				</div>
			</div>
		</div>
			
		<div class="dynamik-optionbox-2col-right-wrap">
			<div class="dynamik-optionbox-outer-2col">
				<div class="dynamik-optionbox-inner-2col">
					<h4><?php _e( 'Wrap Structure Options', 'dynamik' ); ?> <span id="wrap-structure" class="tooltip-mark tooltip-center-left">[?]</span></h4>

					<div class="tooltip tooltip-500">
						<h5><?php _e( 'Fixed vs Fluid:', 'dynamik' ); ?></h5>
						<p>
							<?php _e( 'If "Fixed Design" is selected the #wrap width is fixed resulting in the Header, Navbar and Footer areas being "fixed" inside it, but if "Fluid Design" is selected then the #wrap width is set to 100% resulting in these areas becoming fully fluid.', 'dynamik' ); ?>
						</p>
					</div>
					
					<div class="bg-box" style="float:left;">
						<p style="width:175px; float:left; margin:10px 0; line-height:170%;">
							<input type="radio" class="fixed-fluid-option" name="dynamik[wrap_structure]" value="fixed" <?php if( dynamik_get_design( 'wrap_structure' ) == 'fixed' ) echo 'checked="checked" '; ?>/><input type="hidden" value="wrap-fixed-x2"><label> <?php _e( 'Fixed Design', 'dynamik' ); ?></label>
						</p>

						<p style="width:175px; float:left; margin:10px 0; line-height:170%;">
							<input type="radio" class="fixed-fluid-option" name="dynamik[wrap_structure]" value="fluid" <?php if( dynamik_get_design( 'wrap_structure' ) == 'fluid' ) echo 'checked="checked" '; ?>/><input type="hidden" value="wrap-fluid-x2"><label> <?php _e( 'Fluid Design', 'dynamik' ); ?></label>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>