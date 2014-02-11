<?php
/**
 * Builds the Custom Functions admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-custom-options-nav-functions-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Custom Functions', 'dynamik' ); ?>
		<span style="color:#777777;">( <?php _e( 'Affect Admin', 'dynamik' ); ?>
		<input type="checkbox" id="dynamik-custom-functions-effect-admin" name="custom_functions[custom_functions_effect_admin]" value="1" <?php if( checked( 1, $custom_functions['custom_functions_effect_admin'] ) ); ?> /> )</span>
		<span id="custom-functions-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		
		<div class="tooltip tooltip-400">
			<h5><?php _e( 'Custom PHP Functions', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'Below you will find a simple solution for adding your own Custom PHP code to your site.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'Affect Admin?', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'By default the Custom Functions you add below will only affect the front-end of your site to help prevent accidentally "breaking" your website with some bad code. But if you\'re confident in your coding abilities you can check this box to have your functions affect the Dashboard area (back-end admin section) as well.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'What If I Do "Break" My Site?', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'If you\'ve enabled the "Affect Admin" option and end up adding some code that temporarily "breaks" your site you can fix this by removing the bad code from your /wp-content/uploads/dynamik-gen/theme/custom-functions.php file.', 'dynamik' ); ?>
			</p>
		</div>

		<p>
			<textarea wrap="off" id="dynamik-custom-functions" class="dynamik-tabby-textarea" name="custom_functions[custom_functions]" rows="20"><?php echo stripslashes( esc_textarea( $custom_functions['custom_functions'] ) ); ?></textarea>
		</p>
	</div>
</div>