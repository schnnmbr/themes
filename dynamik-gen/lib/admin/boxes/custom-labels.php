<?php
/**
 * Builds the Dynamik Custom Labels admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-custom-options-nav-labels-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Custom Labels', 'dynamik' ); ?><span class="button dynamik-add-button add-label"><?php _e( 'Add', 'dynamik' ); ?></span> <span id="custom-labels-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		
		<div class="tooltip tooltip-500 tooltip-scroll-500">
			<h5><?php _e( 'Label your Pages and Posts for Ultimate Design Control!', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'This unique feature provides you with the ability to essentially create portable customizations that can then be assigned to pages and posts with the click of your mouse.', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'How They Work', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'To use Custom Labels you simply create a new label below by clicking "Add" and then fill in the "Name" value. Finally you save your change and wait for the page to reload revealing some further information about your new label like the Conditional Tag and Body Class. This information can then be used to create a new Custom Conditional for hooking in Custom Widget Areas and Hook Boxes as well as focusing your Custom CSS on your specific label through its unique Body Class.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( 'After you\'ve create your new Custom Label you can then select it on any individual Page, Post or Custom Post Type Post. Then that particular Page or Post will be uniquely affected by styles and content associated with that particular label.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( 'What makes this Custom Label feature so powerful is that you can not only assign labels to your individual content areas, but you can assign as many labels to these page and posts as you like. Kind of like CSS classes these labels allow you to associate your customizations to multiple areas on your site all by simply checking a few boxes when adding/editing your posts and pages.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'Naming Your Labels', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'When naming your Labels feel free to use whatever naming convention you like. So for example, if your wanted to create a Label for a product page you could name it "My Product Page" or "my product page" or "my-product-page", etc...', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'Setting Custom Layout Widths', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'When you create a Custom Label with the name starting with "Width" and then follow it with a space and then your Content, Primary Sidebar and Secondary Sidebar widths you are creating a label that can be used to force specific Layout widths when a page or post is assigned that particular label.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( 'So for example let\'s say that you have pages and/or posts with a Content/Sidebar/Sidebar layout and would like unique Content/Sidebar/Sidebar widths for that layout. In this case you could create a Custom Label with a name like this: "Width 520 220 180" (520 = Content width, 220 = Primary Sidebar width, 180 = Secondary Sidebar width). Of course the actual number values would vary, but you get the idea. And that same label would work for other double sidebar layout variants like Sidebar/Sidebar/Content or Sidebar/Content/Sidebar.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( '<strong>Note</strong> that if the Layouts that you will assign a particular label to are single sidebar layouts then you would only provide a width value for the Primary Sidebar like so: "Width 520 220". And for no sidebar layouts you would only provide a width value for the Content like so: "Width 520".', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'Assigning Custom Layout Widths Conditionally', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'There may be cases where it would be beneficial to be able to create a Custom Label Width and then instead of assigning it to a single page or post, having it affect multiple areas of your website. To do this you would just "define" your Custom Label Width using a PHP code snippet inside a Custom Hook Box like so: <code>&#60;?php define( \'DYNAMIK_LABEL_WIDTH\', \'label-width-700-300\' ); ?&#62;</code>', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( '<strong>Note</strong> that the above example would need to be tweaked to accommodate the actual Custom Label Body Class. You can find this Body Class information on each Custom Label you\'ve created.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( '<strong>Also note</strong> that this "define" code can be easily created through the Custom PHP Builder above, using the "Label Widths" drop-down and "Define Label Width" button.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( 'Finally in your Custom Hook Box you would select the wp_head Hook Location and then choose any Conditionals that apply. The result should be that any area on your site which is Conditionally affected by this "define" code will take on the Custom Label Width you defined.', 'dynamik' ); ?>
			</p>
		</div>

<?php	if( !empty( $_GET['notice'] ) )
		{
			if( $_GET['notice'] == 'label-added' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Custom Label successfully added.', 'dynamik' ); ?></strong></div>
<?php		}
			elseif( $_GET['notice'] == 'label-deleted' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Custom Label successfully deleted.', 'dynamik' ); ?></strong></div>
<?php		}
		}
?>
		
		<div id="dynamik-labels-wrap">
<?php
		if( !empty( $custom_labels ) )
		{
			$label_counter = 0;
			foreach( $custom_labels as $custom_label )
			{
				$label_counter++;
?>				<div id="label-<?php echo $label_counter; ?>" class="dynamik-all-labels">
					<div class="dynamik-custom-label-option">
						<p class="bg-box-design">
							<?php _e( 'Name', 'dynamik' ); ?> <input type="text" id="custom-label-name-<?php echo $label_counter; ?>" name="custom_label_names[<?php echo $label_counter; ?>]" value="<?php echo $custom_label['label_name']; ?>" style="width:140px;" />
							<?php _e( "Conditional Tag: <code>dynamik_has_label('", 'dynamik' ); ?><?php echo $custom_label['label_id']; ?><?php _e( "')</code>", 'dynamik' ); ?> <?php _e( 'Body Class: <code>label-', 'dynamik' ); ?><?php echo $custom_label['label_id']; ?><?php _e( '</code>', 'dynamik' ); ?>
							<span id="<?php echo $label_counter; ?>" class="button delete-label"> <?php _e( 'Delete', 'dynamik' ); ?></span>
						</p>
					</div>
				</div>
<?php		}
		}
		else
		{
	?>		<div id="label-1" class="dynamik-all-labels">
				<div class="dynamik-custom-label-option">
					<p class="bg-box-design">
						<?php _e( 'Name', 'dynamik' ); ?> <input type="text" id="custom-label-name-1" name="custom_label_names[1]" value="" style="width:140px;" /> ( <?php _e( 'Automatically create a Custom Conditional for this Label', 'dynamik' ); ?> <input type="checkbox" id="custom-label-create-conditional-1" name="custom_label_create_conditionals[1]" value="1" /> )
						<span id="1" class="button delete-label"> <?php _e( 'Delete', 'dynamik' ); ?></span>
					</p>
				</div>
			</div>
<?php	}
?>		</div>
	</div>
</div>