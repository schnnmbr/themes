<?php
/**
 * Builds the Custom CSS admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-custom-options-nav-css-box" class="dynamik-optionbox-outer-1col dynamik-all-options dynamik-options-display">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Custom CSS', 'dynamik' ); ?>
		<span style="color:#777777;">( <?php _e( 'Activate Front-end CSS Builder', 'dynamik' ); ?>
		<input type="checkbox" id="dynamik-css-builder-popup-active" name="dynamik[css_builder_popup_active]" value="1" <?php if( checked( 1, dynamik_get_custom_css( 'css_builder_popup_active' ) ) ); ?> />
		<span id="dynamik-css-builder-popup-editor-only-wrap"<?php if( !dynamik_get_custom_css( 'css_builder_popup_active' ) ) { echo 'style="display:none;"'; } ?>><?php _e( 'Editor Only', 'dynamik' ); ?>
		<input type="checkbox" id="dynamik-css-builder-popup-editor-only" name="dynamik[css_builder_popup_editor_only]" value="1" <?php if( checked( 1, dynamik_get_custom_css( 'css_builder_popup_editor_only' ) ) ); ?> /></span> )</span>
		<span id="custom-css-tooltip" class="tooltip-mark tooltip-bottom-left">[?]</span></h3>
		
		<div class="tooltip tooltip-500 tooltip-scroll-500">
			<h5><?php _e( 'Powerful Custom CSS Tools', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'To add Custom CSS to your Dynamik Powered website just add it below or Activate the Front-end CSS Builder feature. This will display a "Show/Hide CSS Builder" tab on the front-end of your website where you can click to display the CSS Builder Tool included with Dynamik.', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( 'With this tool displaying on your site\'s front-end you will be able to utilize both the CSS Builder Tool as well as the Custom CSS Editor. But what makes this feature so intuitive and powerful is the fact that your CSS will result in real-time changes to the style of your website. Just add your Custom Styles and watch the changes take place as you type in the code!', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'CSS Builder vs Custom CSS', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'The "CSS Builder" section is only for helping you create the CSS. It is the "Custom CSS Editor" popup that actually provides a place to add/edit/save Custom CSS that will effect your site\'s design for all visitors.', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( 'The CSS Builder changes are only temporary and the Custom CSS Editor changes are temporary until you click "Save Changes" to write them to your actual Custom Stylesheet. So no one but you will see these changes until you save them in the Custom CSS Editor.', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'Editor Only?', 'catalyst' ); ?></h5>
			
			<p>
				<?php _e( 'Just want a simple Front-end CSS Editor? Then select this option.', 'catalyst' ); ?>
			</p>
			
			<h5><?php _e( 'Who Sees The CSS Builder Tool', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'To be able to see the "Show/Hide CSS Builder" tab, let alone be able to display and use the CSS Builder Tool, the "Activate Front-end CSS Builder" option must be selected and you must be currently logged in as an Administrator. So basically, no one but you will see these items.', 'dynamik' ); ?>
			</p>
		</div>
		
		<div style="display:none;" id="css-builder-click-to-view">
			<a href="<?php echo home_url(); ?>" target="_blank"><?php _e( 'Click To View Front-end', 'dynamik' ); ?></a>
		</div>
		
		<div id="dynamik-custom-css-admin-p" class="dynamik-custom-option">
			<p>
				<textarea wrap="off" id="dynamik-custom-css" class="dynamik-tabby-textarea" name="dynamik[custom_css]" rows="20"><?php echo esc_textarea( dynamik_get_custom_css( 'custom_css' ) ); ?></textarea>
			</p>
		</div>
	</div>
</div>