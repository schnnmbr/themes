<?php
/**
 * Builds the Dynamik Search admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-search-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Search / eNews', 'dynamik' ); ?></h3>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Search Form Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select class="dynamik-universal-font-type-child dynamik-universal-content-font-type-child" id="dynamik-search-form-font-type" name="dynamik[font_type][search_form]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['search_form'] ); ?></select>
				<?php _e( 'Size', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-form-font-size" name="dynamik[search_form_font_size]" value="<?php dynamik_design_options_defaults( true, 'search_form_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-search-form-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child dynamik-universal-content-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-form-font-color" name="dynamik[search_form_font_color]" value="<?php dynamik_design_options_defaults( true, 'search_form_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-search-form-font-universal" name="dynamik[search_form_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'search_form_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-search-form-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-search-form-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Search Form Font Custom CSS | <code>' . dynamik_html_markup( 'search_form_search' ) . ' { }</code>', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css dynamik-universal-font-css-child dynamik-universal-content-font-css-child" id="dynamik-search-form-font-css" name="dynamik[search_form_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'search_form_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Search Button Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select class="dynamik-universal-font-type-child dynamik-universal-content-font-type-child" id="dynamik-search-button-font-type" name="dynamik[font_type][search_button]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['search_button'] ); ?></select>
				<?php _e( 'Size', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-button-font-size" name="dynamik[search_button_font_size]" value="<?php dynamik_design_options_defaults( true, 'search_button_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-search-button-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child dynamik-universal-content-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-button-font-color" name="dynamik[search_button_font_color]" value="<?php dynamik_design_options_defaults( true, 'search_button_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-search-button-font-universal" name="dynamik[search_button_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'search_button_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-search-button-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-search-button-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Search Button Font Custom CSS | <code>' . dynamik_html_markup( 'search_form_submit' ) . ' { }</code>', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css dynamik-universal-font-css-child dynamik-universal-content-font-css-child" id="dynamik-search-button-font-css" name="dynamik[search_button_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'search_button_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Search Button Text Hover', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Text Hover', 'dynamik' ); ?><input type="text" class="dynamik-universal-link-hover-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-button-text-hover-color" name="dynamik[search_button_text_hover_color]" value="<?php dynamik_design_options_defaults( true, 'search_button_text_hover_color' ); ?>" />
				<?php _e( 'Text Hover Underline', 'dynamik' ); ?> <select class="dynamik-universal-link-underline-child" id="dynamik-search-button-link-underline" name="dynamik[search_button_text_hover_underline]" size="1" style="width:90px;">
					<option value="Never"<?php if( dynamik_get_design( 'search_button_text_hover_underline' ) == 'Never' ) echo ' selected="selected"'; ?>><?php _e( 'Never', 'dynamik' ); ?></option>
					<option value="On Hover"<?php if( dynamik_get_design( 'search_button_text_hover_underline' ) == 'On Hover' ) echo ' selected="selected"'; ?>><?php _e( 'On Hover', 'dynamik' ); ?></option>
					<option value="Off Hover"<?php if( dynamik_get_design( 'search_button_text_hover_underline' ) == 'Off Hover' ) echo ' selected="selected"'; ?>><?php _e( 'Off Hover', 'dynamik' ); ?></option>
					<option value="Always"<?php if( dynamik_get_design( 'search_button_text_hover_underline' ) == 'Always' ) echo ' selected="selected"'; ?>><?php _e( 'Always', 'dynamik' ); ?></option>
				</select>
				<input type="checkbox" class="universal-check" id="dynamik-search-button-link-universal" name="dynamik[search_button_link_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'search_button_link_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Search Form Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-search-form-bg-type" class="dynamik-bg-type" name="dynamik[search_form_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'search_form_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-search-form-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-search-form-bg-no-color" name="dynamik[search_form_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'search_form_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-form-bg-color" name="dynamik[search_form_bg_color]" value="<?php dynamik_design_options_defaults( true, 'search_form_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-search-form-bg-image" name="dynamik[search_form_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'search_form_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Search Button Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-search-button-bg-type" class="dynamik-bg-type" name="dynamik[search_button_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'search_button_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-search-button-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-search-button-bg-no-color" name="dynamik[search_button_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'search_button_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-button-bg-color" name="dynamik[search_button_bg_color]" value="<?php dynamik_design_options_defaults( true, 'search_button_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-search-button-bg-image" name="dynamik[search_button_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'search_button_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Search Button Hover Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-search-button-hover-bg-type" class="dynamik-bg-type" name="dynamik[search_button_hover_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'search_button_hover_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-search-button-hover-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-search-button-hover-bg-no-color" name="dynamik[search_button_hover_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'search_button_hover_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-button-hover-bg-color" name="dynamik[search_button_hover_bg_color]" value="<?php dynamik_design_options_defaults( true, 'search_button_hover_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-search-button-hover-bg-image" name="dynamik[search_button_hover_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'search_button_hover_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Search Form Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-search-form-border-thickness" name="dynamik[search_form_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'search_form_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-search-form-border-style" name="dynamik[search_form_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'search_form_border_style' ) ); ?>
				</select>
				<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-form-border-color" name="dynamik[search_form_border_color]" value="<?php dynamik_design_options_defaults( true, 'search_form_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Search Button Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-search-button-border-thickness" name="dynamik[search_button_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'search_button_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-search-button-border-style" name="dynamik[search_button_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'search_button_border_style' ) ); ?>
				</select>
				<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-button-border-color" name="dynamik[search_button_border_color]" value="<?php dynamik_design_options_defaults( true, 'search_button_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Search Button Hover Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-search-button-hover-border-thickness" name="dynamik[search_button_hover_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'search_button_hover_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-search-button-hover-border-style" name="dynamik[search_button_hover_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'search_button_hover_border_style' ) ); ?>
				</select>
				<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-search-button-hover-border-color" name="dynamik[search_button_hover_border_color]" value="<?php dynamik_design_options_defaults( true, 'search_button_hover_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Search Form Width', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-search-form-width" name="dynamik[search_form_width]" value="<?php dynamik_design_options_defaults( true, 'search_form_width' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-standard-hide">
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Search Form Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p>
				<?php _e( 'Padding: Top', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-form-padding-top" name="dynamik[search_form_padding_top]" value="<?php dynamik_design_options_defaults( true, 'search_form_padding_top' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Right', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-form-padding-right" name="dynamik[search_form_padding_right]" value="<?php dynamik_design_options_defaults( true, 'search_form_padding_right' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-form-padding-bottom" name="dynamik[search_form_padding_bottom]" value="<?php dynamik_design_options_defaults( true, 'search_form_padding_bottom' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-form-padding-left" name="dynamik[search_form_padding_left]" value="<?php dynamik_design_options_defaults( true, 'search_form_padding_left' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Search Button Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p>
				<?php _e( 'Padding: Top', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-button-padding-top" name="dynamik[search_button_padding_top]" value="<?php dynamik_design_options_defaults( true, 'search_button_padding_top' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Right', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-button-padding-right" name="dynamik[search_button_padding_right]" value="<?php dynamik_design_options_defaults( true, 'search_button_padding_right' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-button-padding-bottom" name="dynamik[search_button_padding_bottom]" value="<?php dynamik_design_options_defaults( true, 'search_button_padding_bottom' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left', 'dynamik' ); ?>
				<input type="text" id="dynamik-search-button-padding-left" name="dynamik[search_button_padding_left]" value="<?php dynamik_design_options_defaults( true, 'search_button_padding_left' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		</div><!-- End .dynamik-design-standard-hide -->
		
	</div>
</div>