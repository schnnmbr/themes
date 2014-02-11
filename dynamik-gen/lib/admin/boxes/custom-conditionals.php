<?php
/**
 * Builds the Dynamik Custom Conditionals admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-custom-options-nav-conditionals-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Custom Conditionals', 'dynamik' ); ?>
		<span class="button dynamik-add-button add-conditional"><?php _e( 'Add', 'dynamik' ); ?></span><span id="custom-conditionals-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
	
		<div class="tooltip tooltip-500">
			<h5><?php _e( 'What Is A Conditional?', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'These Conditional options are based on WordPress Conditional Tags which allow you to specify where you DO and DO NOT want your content to display. So by specifying is_page(), for example, you are saying I want my content to only display on your WordPress Pages (ie. not Posts, not Archives, etc..).', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'Unlimited Possibilities!', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'The Custom Conditional options, in conjunction with the Custom Widget Areas and Custom Hook Boxes features provide you with truly unlimited possibilities when it comes to displaying your content.', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'How To Use...', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'It couldn\'t be simpler. Just give your Custom Conditional a name and tag value and then click the big, blue "Save Changes" button and you\'re done. Then, when you\'re creating new Custom Widget Areas and Hook Boxes you can select different Conditionals to help fine tune the location of your content (if you do not select any Conditionals when create a Custom Widget Area or Hook Box your content will display on ALL pages by default).', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'Conditional Examples', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'To make things even easier for you we\'ve provided you with an "Examples:" drop-down list to help get you started. Just select a Conditional Example and it will automatically fill in the values for you!', 'dynamik' ); ?>
			</p>
			
			<span class="tooltip-credit">
				<?php _e( 'Learn more here:', 'dynamik' ); ?>
				<a href="http://codex.wordpress.org/Conditional_Tags" target="_blank">WordPress Conditional Tags</a>
			</span>
		</div>
		
<?php	if( !empty( $_GET['notice'] ) )
		{
			if( $_GET['notice'] == 'conditional-added' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Custom Conditional successfully added.', 'dynamik' ); ?></strong></div>
<?php		}
			elseif( $_GET['notice'] == 'conditional-deleted' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Custom Conditional successfully deleted.', 'dynamik' ); ?></strong></div>
<?php		}
		}
?>		
				
		<div id="dynamik-conditionals-wrap">
<?php
		if( !empty( $custom_conditionals ) )
		{
			$conditional_counter = 0;
			foreach( $custom_conditionals as $custom_conditional )
			{
				$conditional_counter++;
?>				<div id="conditional-<?php echo $conditional_counter; ?>">
					<div class="dynamik-custom-conditional-option-desc">
						<p>
							<select id="id-custom-conditional-id-<?php echo $conditional_counter; ?>" class="conditional-examples id-custom-conditional-tag-<?php echo $conditional_counter; ?>" name="conditional_examples" size="1" style="width:165px;"><?php dynamik_list_conditional_examples( 'conditional_examples' ); ?></select>
						</p>
					</div>
					
					<div class="dynamik-custom-conditional-option">
						<p class="bg-box-design">
							<?php _e( 'Name', 'dynamik' ); ?>
							<input type="text" id="custom-conditional-id-<?php echo $conditional_counter; ?>" name="custom_conditional_ids[]" value="<?php echo $custom_conditional['conditional_id']; ?>" style="width:190px;" class="forbid-chars forbid-caps" />
							<?php _e( 'Tag', 'dynamik' ); ?>
							<input type="text" id="custom-conditional-tag-<?php echo $conditional_counter; ?>" name="custom_conditional_tags[]" value="<?php echo $custom_conditional['conditional_tag']; ?>" style="width:240px;" />
							<span id="<?php echo $conditional_counter; ?>" class="button delete-conditional"><?php _e( 'Delete', 'dynamik' ); ?></span>
						</p>
					</div>
				</div>
<?php		}
		}
		else
		{
	?>		<div id="conditional-1">
				<div class="dynamik-custom-conditional-option-desc">
					<p>
						<select id="id-custom-conditional-id-1" class="conditional-examples id-custom-conditional-tag-1" name="conditional_examples" size="1" style="width:165px;"><?php dynamik_list_conditional_examples( 'conditional_examples' ); ?></select>
					</p>
				</div>
				
				<div class="dynamik-custom-conditional-option">
					<p class="bg-box-design">
						<?php _e( 'Name', 'dynamik' ); ?>
						<input type="text" id="custom-conditional-id-1" name="custom_conditional_ids[]" value="" style="width:190px;" class="forbid-chars forbid-caps" />
						<?php _e( 'Tag', 'dynamik' ); ?>
						<input type="text" id="custom-conditional-tag-1" name="custom_conditional_tags[]" value="" style="width:240px;" />
						<span id="1" class="button delete-conditional"><?php _e( 'Delete', 'dynamik' ); ?></span>
					</p>
				</div>
			</div>
<?php	}
?>
		</div>	
	</div>
</div>