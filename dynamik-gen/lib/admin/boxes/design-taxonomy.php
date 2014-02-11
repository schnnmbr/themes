<?php
/**
 * Builds the Dynamik Taxonomy admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-taxonomy-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Taxonomy/Author Title Boxes', 'dynamik' ); ?></h3>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Taxonomy Box Heading Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select class="dynamik-universal-font-type-child dynamik-universal-heading-font-type-child" id="dynamik-taxonomy-box-heading-font-type" name="dynamik[font_type][taxonomy_box_heading]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['taxonomy_box_heading'] ); ?></select>
				<input type="text" id="dynamik-taxonomy-box-heading-font-size" name="dynamik[taxonomy_box_heading_font_size]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-taxonomy-box-heading-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child dynamik-universal-heading-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-heading-font-color" name="dynamik[taxonomy_box_heading_font_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-taxonomy-box-heading-font-universal" name="dynamik[taxonomy_box_heading_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'taxonomy_box_heading_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-taxonomy-box-heading-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-taxonomy-box-heading-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Taxonomy Box Heading Font Custom CSS | <code>' . dynamik_html_markup( 'content' ) . ' .taxonomy-description h1 { }</code>', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css dynamik-universal-font-css-child dynamik-universal-heading-font-css-child" id="dynamik-taxonomy-box-heading-font-css" name="dynamik[taxonomy_box_heading_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'taxonomy_box_heading_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Taxonomy Box Content Font', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select class="dynamik-universal-font-type-child dynamik-universal-content-font-type-child" id="dynamik-taxonomy-box-content-font-type" name="dynamik[font_type][taxonomy_box_content]" size="1" style="width:98px;">
				<?php dynamik_build_font_menu( $dynamik_font_type['taxonomy_box_content'] ); ?></select>
				<input type="text" id="dynamik-taxonomy-box-content-font-size" name="dynamik[taxonomy_box_content_font_size]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_font_size' ); ?>" style="width:35px;" />
				<code class="dynamik-universal-px-em-child" id="dynamik-taxonomy-box-content-px-em"><?php echo $px_em_unit_text; ?></code>
				<?php _e( 'Color', 'dynamik' ); ?><input type="text" class="dynamik-universal-font-color-child dynamik-universal-content-font-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-content-font-color" name="dynamik[taxonomy_box_content_font_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_font_color' ); ?>" />
				<input type="checkbox" class="universal-check" id="dynamik-taxonomy-box-content-font-universal" name="dynamik[taxonomy_box_content_font_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'taxonomy_box_content_font_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-taxonomy-box-content-font-css" class="dynamik-custom-fonts-button button">#Custom</span></span>
				<div style="display:none;" id="show-taxonomy-box-content-font-css-box" class="dynamik-custom-fonts-box">
				<?php _e( 'Taxonomy Box Content Font Custom CSS | <code>.taxonomy-description { }</code>', 'dynamik' ); ?><br />
				<textarea class="dynamik-custom-font-css dynamik-universal-font-css-child dynamik-universal-content-font-css-child" id="dynamik-taxonomy-box-content-font-css" name="dynamik[taxonomy_box_content_font_css]" style="width:100%;" rows="10"><?php echo dynamik_get_design( 'taxonomy_box_content_font_css' ); ?></textarea>
				</div>
			</p>
		</div>
		
		<div class="dynamik-font-option-desc">
			<p><?php _e( 'Taxonomy Box Content Link', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Link', 'dynamik' ); ?><input type="text" class="dynamik-universal-link-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-content-link-color" name="dynamik[taxonomy_box_content_link_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_link_color' ); ?>" />
				<?php _e( 'Link Hover', 'dynamik' ); ?><input type="text" class="dynamik-universal-link-hover-color-child color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-content-link-hover-color" name="dynamik[taxonomy_box_content_link_hover_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_link_hover_color' ); ?>" />
				<?php _e( 'Link Underline', 'dynamik' ); ?> <select class="dynamik-universal-link-underline-child" id="dynamik-taxonomy-box-content-link-underline" name="dynamik[taxonomy_box_content_link_underline]" size="1" style="width:90px;">
					<option value="Never"<?php if( dynamik_get_design( 'taxonomy_box_content_link_underline' ) == 'Never' ) echo ' selected="selected"'; ?>><?php _e( 'Never', 'dynamik' ); ?></option>
					<option value="On Hover"<?php if( dynamik_get_design( 'taxonomy_box_content_link_underline' ) == 'On Hover' ) echo ' selected="selected"'; ?>><?php _e( 'On Hover', 'dynamik' ); ?></option>
					<option value="Off Hover"<?php if( dynamik_get_design( 'taxonomy_box_content_link_underline' ) == 'Off Hover' ) echo ' selected="selected"'; ?>><?php _e( 'Off Hover', 'dynamik' ); ?></option>
					<option value="Always"<?php if( dynamik_get_design( 'taxonomy_box_content_link_underline' ) == 'Always' ) echo ' selected="selected"'; ?>><?php _e( 'Always', 'dynamik' ); ?></option>
				</select>
				<input type="checkbox" class="universal-check" id="dynamik-taxonomy-box-content-link-universal" name="dynamik[taxonomy_box_content_link_u]" value="u" <?php if( checked( 'u', dynamik_get_design( 'taxonomy_box_content_link_u' ) ) ); ?> /> <?php _e( '(U)', 'dynamik' ); ?>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Taxonomy Box Heading Background', 'dynamik' ); ?></p>
		</div>
	
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-heading-bg-type" class="dynamik-bg-type" name="dynamik[taxonomy_box_heading_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'taxonomy_box_heading_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-taxonomy-box-heading-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-taxonomy-box-heading-bg-no-color" name="dynamik[taxonomy_box_heading_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'taxonomy_box_heading_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-heading-bg-color" name="dynamik[taxonomy_box_heading_bg_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-heading-bg-image" name="dynamik[taxonomy_box_heading_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'taxonomy_box_heading_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-bg-option-desc">
			<p><?php _e( 'Taxonomy Box Content Background', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-content-bg-type" class="dynamik-bg-type" name="dynamik[taxonomy_box_content_bg_type]" size="1" style="width:150px;">
				<?php dynamik_list_bg_options( dynamik_get_design( 'taxonomy_box_content_bg_type' ) ); ?>
				</select> <span style="display:none;" id="dynamik-taxonomy-box-content-bg-type-checkbox"><?php _e( '(No Color', 'dynamik' ); ?> <input type="checkbox" id="dynamik-taxonomy-box-content-bg-no-color" name="dynamik[taxonomy_box_content_bg_no_color]" value="1" <?php if( checked( 1, dynamik_get_design( 'taxonomy_box_content_bg_no_color' ) ) ); ?> />)</span><input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-content-bg-color" name="dynamik[taxonomy_box_content_bg_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_bg_color' ); ?>" />
				<?php _e( 'Image', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-content-bg-image" name="dynamik[taxonomy_box_content_bg_image]" size="1" style="width:150px;"><?php dynamik_list_images( dynamik_get_design( 'taxonomy_box_content_bg_image' ) ); ?></select>
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Taxonomy Box Heading Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-heading-border-type" name="dynamik[taxonomy_box_heading_border_type]" size="1" style="width:100px;">
					<option value="Full"<?php if (dynamik_get_design( 'taxonomy_box_heading_border_type' ) == 'Full') echo ' selected="selected"'; ?>><?php _e( 'Full', 'dynamik' ); ?></option>
					<option value="Top/Bottom"<?php if (dynamik_get_design( 'taxonomy_box_heading_border_type' ) == 'Top/Bottom') echo ' selected="selected"'; ?>><?php _e( 'Top/Bottom', 'dynamik' ); ?></option>
					<option value="Bottom"<?php if (dynamik_get_design( 'taxonomy_box_heading_border_type' ) == 'Bottom') echo ' selected="selected"'; ?>><?php _e( 'Bottom', 'dynamik' ); ?></option>
				</select>
				<?php _e( 'Thickness', 'dynamik' ); ?> <input type="text" id="dynamik-taxonomy-box-heading-border-thickness" name="dynamik[taxonomy_box_heading_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-heading-border-style" name="dynamik[taxonomy_box_heading_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'taxonomy_box_heading_border_style' ) ); ?>
				</select>
				<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-heading-border-color" name="dynamik[taxonomy_box_heading_border_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-border-option-desc">
			<p><?php _e( 'Taxonomy Box Content Border', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<?php _e( 'Type', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-content-border-type" name="dynamik[taxonomy_box_content_border_type]" size="1" style="width:100px;">
					<option value="Full"<?php if (dynamik_get_design( 'taxonomy_box_content_border_type' ) == 'Full') echo ' selected="selected"'; ?>><?php _e( 'Full', 'dynamik' ); ?></option>
					<option value="Top/Bottom"<?php if (dynamik_get_design( 'taxonomy_box_content_border_type' ) == 'Top/Bottom') echo ' selected="selected"'; ?>><?php _e( 'Top/Bottom', 'dynamik' ); ?></option>
					<option value="Bottom"<?php if (dynamik_get_design( 'taxonomy_box_content_border_type' ) == 'Bottom') echo ' selected="selected"'; ?>><?php _e( 'Bottom', 'dynamik' ); ?></option>
				</select>
				<?php _e( 'Thickness', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-content-border-thickness" name="dynamik[taxonomy_box_content_border_thickness]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_border_thickness' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Style', 'dynamik' ); ?> <select id="dynamik-taxonomy-box-content-border-style" name="dynamik[taxonomy_box_content_border_style]" size="1" style="width:90px; margin-right:5px;">
					<?php dynamik_list_borders( dynamik_get_design( 'taxonomy_box_content_border_style' ) ); ?>
				</select>
				<?php _e( 'Color', 'dynamik' ); ?> <input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box" id="dynamik-taxonomy-box-content-border-color" name="dynamik[taxonomy_box_content_border_color]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_border_color' ); ?>" />
			</p>
		</div>
		
		<div class="dynamik-design-standard-hide">
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Taxonomy Box Margins', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p>
				<?php _e( 'Top Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-margin-top" name="dynamik[taxonomy_box_margin_top]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_margin_top' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom Margin', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-margin-bottom" name="dynamik[taxonomy_box_margin_bottom]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_margin_bottom' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Taxonomy Box Heading Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p>
				<?php _e( 'Padding: Top', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-heading-padding-top" name="dynamik[taxonomy_box_heading_padding_top]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_padding_top' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Right', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-heading-padding-right" name="dynamik[taxonomy_box_heading_padding_right]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_padding_right' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-heading-padding-bottom" name="dynamik[taxonomy_box_heading_padding_bottom]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_padding_bottom' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-heading-padding-left" name="dynamik[taxonomy_box_heading_padding_left]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_heading_padding_left' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Taxonomy Box Content Padding', 'dynamik' ); ?></p>
		</div>
		
		<div class="dynamik-design-option">
			<p>
				<?php _e( 'Padding: Top', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-content-padding-top" name="dynamik[taxonomy_box_content_padding_top]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_padding_top' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Right', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-content-padding-right" name="dynamik[taxonomy_box_content_padding_right]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_padding_right' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Bottom', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-content-padding-bottom" name="dynamik[taxonomy_box_content_padding_bottom]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_padding_bottom' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
				<?php _e( 'Left', 'dynamik' ); ?>
				<input type="text" id="dynamik-taxonomy-box-content-padding-left" name="dynamik[taxonomy_box_content_padding_left]" value="<?php dynamik_design_options_defaults( true, 'taxonomy_box_content_padding_left' ); ?>" style="width:35px;" /><code class="dynamik-px-unit">px</code>
			</p>
		</div>
		
		</div><!-- End .dynamik-design-standard-hide -->
		
	</div>
</div>