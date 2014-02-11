<?php
/**
 * Builds the Dynamik General Settings admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-theme-settings-nav-general-box" class="dynamik-all-options">
	<h3 style="margin-bottom:15px; float:left;"><?php _e( 'General Settings', 'dynamik' ); ?></h3>

	<div class="dynamik-optionbox-2col-left-wrap">
		
		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Page Titles', 'dynamik' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="dynamik-remove-all-page-titles" name="dynamik[remove_all_page_titles]" value="1" <?php if( checked( 1, dynamik_get_settings( 'remove_all_page_titles' ) ) ); ?> /> <?php _e( 'Remove All Page Titles', 'dynamik' ); ?>
						<span id="remove-all-page-titles-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-500">
						<h5><?php _e( 'Why Remove Page Titles:', 'dynamik' ); ?></h5>
						<p>
							<?php _e( 'Sometimes you just don\'t want certain Page Titles to display. Maybe you want to add your own H1 wrapped Title or maybe your Page content just doesn\'t need or work well with a Title. Either way, these options provide a quick and easy solution to this need. And note that this does not just Hide your Page Titles from view as the Dynamik Options > Hide option would do, but instead this physically removes your Page Titles from the source code.', 'dynamik' ); ?>
						</p>
						
						<h5><?php _e( 'How To Remove Page Titles:', 'dynamik' ); ?></h5>
						<p>
							<?php _e( 'You have two choices here. Remove ALL Page Titles or just ones specified by their Page ID\'s. Note that you can reference your current Page ID\'s by clicking on the [IDs] link below. Also, be sure to comma separate your ID\'s (with no spaces), but leave off the trailing comma. So if you wanted to remove a Page Title from a Page with an ID of 27 and one with an ID of 113 and one with an ID of 279 you would add this below: <strong>27,113,279</strong>', 'dynamik' ); ?>
						</p>
					</div>
					
					<p style="display:none;" id="dynamik-remove-all-page-titles-box">
						<?php _e( 'Remove Specific Page Titles By IDs: (ie. 2,17 etc.)', 'dynamik' ); ?><br />
						<input type="text" id="dynamik-remove-page-titles-ids" name="dynamik[remove_page_titles_ids]" value="<?php echo dynamik_get_settings( 'remove_page_titles_ids' )?>" style="width:310px;" />
						<span id="content-page-ids" class="tooltip-mark tooltip-center-right">[IDs]</span>
					</p>
					
					<div class="tooltip tooltip-400">
						<h5><?php _e( 'Page ID Reference:', 'dynamik' ); ?></h5>
						<p class="page-cat-id-scrollbox-378">
							<?php $pages = get_pages('orderby=ID&hide_empty=0');
							echo '<strong>Page IDs/Names</strong><br />'; 
								foreach($pages as $page) { 
									echo $page->ID . ' = ' . $page->post_name . '<br />'; 
								} ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Custom Post Types', 'dynamik' ); ?></h4>
				
				<div class="bg-box">
					<p>
						<input type="checkbox" id="dynamik-include-inpost-cpt-all" name="dynamik[include_inpost_cpt_all]" value="1" <?php if( checked( 1, dynamik_get_settings( 'include_inpost_cpt_all' ) ) ); ?> /> <?php _e( 'Include Theme In-Post Options With All Custom Post Types', 'dynamik' ); ?>
						<span id="include-inpost-cpt-all-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-400">
						<h5><?php _e( 'How To Include Genesis/Dynamik In-Post Options With Your Custom Post Types:', 'dynamik' ); ?></h5>
						<p>
							<?php _e( 'With this option you can include Genesis and Dynamik In-Post Options with ALL Custom Post Types. If, however, you would only like to include the In-Post Options with specific Custom Post Types you can do so by including their Custom Post Type Names. Note that you can reference your current Custom Post Type Names by clicking on the [Names] link below.', 'dynamik' ); ?>
						</p>
						
						<span class="tooltip-credit">
							<?php _e( 'Learn more about Custom Post Types here:', 'dynamik' ); ?>
							<a href="http://codex.wordpress.org/Post_Types#Custom_Types" target="_blank">http://codex.wordpress.org/Post_Types#Custom_Types</a>
						</span>
					</div>

					<span style="display:none;" id="dynamik-include-inpost-cpt-all-box">
						<p>
							<?php _e( 'Include Theme In-Post Options With Specific Custom Post Types', 'dynamik' ); ?> <span id="include-inpost-cpt-names-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
						</p>
						
						<div class="tooltip tooltip-400">							
							<p>
								<?php _e( 'Be sure to comma separate your Names (with no spaces), but leave off the trailing comma. So if you wanted to Include Genesis/Dynamik In-Post Options with a Custom Post Type with a Name of product and one with a Name of recipes and one with a Name of songs you would add this below: <strong>products,recipes,songs</strong>', 'dynamik' ); ?>
							</p>
							
							<p>
								<?php _e( '<strong>Note:</strong> Some Plugins use Custom Post Types for their options and functionality so you may see names in the [Names] reference box that are not your own. In these cases just ignore those names and use the ones you know are yours.', 'dynamik' ); ?>
							</p>
						</div>
						
						<p>
							<?php _e( 'Add Custom Post Type Names Below: (ie. products,recipes etc.)', 'dynamik' ); ?><br />
							<input type="text" id="dynamik-include-inpost-cpt-names" name="dynamik[include_inpost_cpt_names]" value="<?php echo dynamik_get_settings( 'include_inpost_cpt_names' )?>" style="width:288px;" />
							<span id="custom-post-type-names" class="tooltip-mark tooltip-center-right">[Names]</span>
						</p>
						
						<div class="tooltip tooltip-400">
							<h5><?php _e( 'Custom Post Type Name Reference', 'dynamik' ); ?></h5>
							<p class="page-cat-id-scrollbox-378">
							<?php
							$args=array(
								'public'   => true,
								'_builtin' => false
							);
							$output = 'names';
							$operator = 'and';
							$post_types = get_post_types( $args, $output, $operator ); 
							echo '<strong>Custom Post Type Names:</strong><br />'; 
							foreach( $post_types as $post_type )
							{
								echo '- ' . $post_type . '<br />';
							} ?>
							</p>
						</div>
					</span>
				</div>
			</div>
		</div>
		
		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'WordPress Post Formats', 'dynamik' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="dynamik-post-formats-active" name="dynamik[post_formats_active]" value="1" <?php if( checked( 1, dynamik_get_settings( 'post_formats_active' ) ) ); ?> /> <?php _e( 'Activate WordPress Post Formats', 'dynamik' ); ?>
						<span id="dynamik-post-formats-active-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-500">
						<p>
							<?php _e( 'By activating this Post Formats Functionality you will be enabling a feature inside your Post Editor that allows the selection of different Post Formats on a Per-Post basis.', 'dynamik' ); ?>
						</p>
						<p>
							<?php _e( 'Activating this feature will also enable a function that looks for a "post-formats" folder inside your /wp-content/themes/dynamik-gen/images/ directory and if it finds this folder it will use any appropriately named icons inside it and display them to the right of your Post Title.', 'dynamik' ); ?>
						</p>
						<p>
							<?php _e( 'By "appropriately named" we mean PNG images given the name of the Post Format (eg. gallery.png, chat.png, etc...)', 'dynamik' ); ?>
						</p>
						<span class="tooltip-credit">
							<?php _e( 'Learn more here:', 'dynamik' ); ?>
							<a href="http://codex.wordpress.org/Post_Formats" target="_blank">WordPress Codex | Post Formats</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Responsive Design', 'dynamik' ); ?></h4>
				<div class="bg-box">
					<p>
						<input type="checkbox" id="dynamik-responsive-enabled" name="dynamik[responsive_enabled]" value="1" <?php if( checked( 1, dynamik_get_settings( 'responsive_enabled' ) ) ); ?> /> <?php _e( 'Enable Responsive Design Options In Dynamik.', 'dynamik' ); ?>
						<span id="responsive-enable-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-400">
						<p>
							<?php _e( 'This checkbox is a kind of "Responsive Kill Switch". When unchecked it completely removes the Responsive Design options/features from Dynamik. This would only be ideal if you either have no desire/need to make your site responsive or have other methods for making your site mobile friendly.', 'dynamik' ); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Design Options Control', 'dynamik' ); ?> <span id="dynamik-design-options-control-tooltip" class="tooltip-mark tooltip-center-right">[?]</span></h4>
				
				<div class="tooltip tooltip-400">
					<h5><?php _e( 'Determine which Design Options to display.', 'dynamik' ); ?></h5>
					
					<p>
						<?php _e( 'Here you can determine how basic or in-depth you want your Dynamik Design Options to be.', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Structure & Settings:</strong> When selected your Design Options will be cut down to only the non-styling options (eg. content structures, placement, settings, etc..).', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Design Standard:</strong> When selected you will find the majority of your Design Options visible with the exception of most of your Margin and Padding options.', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Kitchen Sink:</strong> When selected your Design Options will fully display, including your Margin and Padding options.', 'dynamik' ); ?>
					</p>
				</div>
				
				<div class="bg-box">
					<p>
						<input type="radio" class="design-level-option" name="dynamik[design_options_control]" value="structure_settings" <?php if( dynamik_get_settings( 'design_options_control' ) == 'structure_settings' ) echo 'checked="checked" '; ?>/><label> <?php _e( 'Structure & Settings', 'dynamik' ); ?></label>
						<input type="radio" class="design-level-option" name="dynamik[design_options_control]" value="design_standard" <?php if( dynamik_get_settings( 'design_options_control' ) == 'design_standard' ) echo 'checked="checked" '; ?>/><label> <?php _e( 'Design Standard', 'dynamik' ); ?></label>
						<input type="radio" class="design-level-option" name="dynamik[design_options_control]" value="kitchen_sink" <?php if( dynamik_get_settings( 'design_options_control' ) == 'kitchen_sink' ) echo 'checked="checked" '; ?>/><label> <?php _e( 'Kitchen Sink', 'dynamik' ); ?></label>
					</p>
				</div>
			</div>
		</div>

		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Dynamik Footer Link', 'dynamik' ); ?></h4>
				
				<div class="bg-box">
					<p>
						<?php _e( 'Add Your Dynamik Affiliate Link Below', 'dynamik' ); ?> (<a href="http://cobaltapps.com/affiliates/" /><?php _e( 'Sign Up', 'dynamik' ); ?></a>)<br />
						<input type="text" id="dynamik-affiliate-link" name="dynamik[affiliate_link]" value="<?php echo dynamik_get_settings( 'affiliate_link' ) ?>" style="width:100%;" />
					</p>
				</div>
			</div>
		</div>
		
	</div>
	<div class="dynamik-optionbox-2col-right-wrap">
		
		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Custom Thumbnail Sizes', 'dynamik' ); ?> <span id="custom-thumbnail-option-tooltip" class="tooltip-mark tooltip-bottom-left">[?]</span></h4>
				
				<div class="tooltip tooltip-400">
					<h5><?php _e( 'Creating Different Thumbnail Sizes:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( 'To set a Custom Thumbnail Image Size you just set the Mode (Resize or Crop) and both the Width and Height for each Custom Thumbnail option. You do not have to set any of them or you can just set one or two. They are only there if you need them.', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( 'Once set you will be able to access them through both the Thumbnail Size drop-down menu in any of your Genesis Featured Posts/Page Widgets.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Resize vs Crop:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( 'Both Mode options resize the images, but the Crop option will actually crop your images, if necessary, to ensure your exact image size is obtained. With the Resize option you will retain the aspect ratio of your images, but therefore not see your exact dimensions reached.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Regenerating Thumbnails:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( 'If you set a new Custom Thumbnail Size AFTER an image has been uploaded/added to a WordPress Post/Page then you may need to regenerate your thumbnails to have your new Thumbnail Size take effect. You can easily do this with the <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">Regenerate Thumbnails WordPress Plugin</a>.', 'dynamik' ); ?>
					</p>
				</div>
					
				<div class="bg-box">
					<p>
						<strong><?php _e( 'Please Note The Following For Proper Use:', 'dynamik' ); ?></strong>
					</p>
					<p>
						<?php _e( '- The "Mode" value must be set for the Custom Thumbnail to work.', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '- custom-thumb-1 must be set in order for thumb-2 through 5 to work.', 'dynamik' ); ?>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-1', 'dynamik' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'dynamik' ); ?>
						<select id="dynamik-custom-image-size-one-mode" name="dynamik[custom_image_size_one_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( dynamik_get_settings( 'custom_image_size_one_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'dynamik' ); ?></option>
							<option value="crop"<?php if( dynamik_get_settings( 'custom_image_size_one_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'dynamik' ); ?></option>
						</select>
						<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-one-width" name="dynamik[custom_image_size_one_width]" value="<?php echo dynamik_get_settings( 'custom_image_size_one_width' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code> | 
						<?php _e( 'Height', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-one-height" name="dynamik[custom_image_size_one_height]" value="<?php echo dynamik_get_settings( 'custom_image_size_one_height' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-2', 'dynamik' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'dynamik' ); ?>
						<select id="dynamik-custom-image-size-two-mode" name="dynamik[custom_image_size_two_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( dynamik_get_settings( 'custom_image_size_two_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'dynamik' ); ?></option>
							<option value="crop"<?php if( dynamik_get_settings( 'custom_image_size_two_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'dynamik' ); ?></option>
						</select>
						<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-two-width" name="dynamik[custom_image_size_two_width]" value="<?php echo dynamik_get_settings( 'custom_image_size_two_width' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code> | 
						<?php _e( 'Height', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-two-height" name="dynamik[custom_image_size_two_height]" value="<?php echo dynamik_get_settings( 'custom_image_size_two_height' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-3', 'dynamik' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'dynamik' ); ?>
						<select id="dynamik-custom-image-size-three-mode" name="dynamik[custom_image_size_three_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( dynamik_get_settings( 'custom_image_size_three_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'dynamik' ); ?></option>
							<option value="crop"<?php if( dynamik_get_settings( 'custom_image_size_three_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'dynamik' ); ?></option>
						</select>
						<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-three-width" name="dynamik[custom_image_size_three_width]" value="<?php echo dynamik_get_settings( 'custom_image_size_three_width' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code> | 
						<?php _e( 'Height', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-three-height" name="dynamik[custom_image_size_three_height]" value="<?php echo dynamik_get_settings( 'custom_image_size_three_height' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-4', 'dynamik' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'dynamik' ); ?>
						<select id="dynamik-custom-image-size-four-mode" name="dynamik[custom_image_size_four_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( dynamik_get_settings( 'custom_image_size_four_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'dynamik' ); ?></option>
							<option value="crop"<?php if( dynamik_get_settings( 'custom_image_size_four_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'dynamik' ); ?></option>
						</select>
						<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-four-width" name="dynamik[custom_image_size_four_width]" value="<?php echo dynamik_get_settings( 'custom_image_size_four_width' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code> | 
						<?php _e( 'Height', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-four-height" name="dynamik[custom_image_size_four_height]" value="<?php echo dynamik_get_settings( 'custom_image_size_four_height' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code>
					</p>
				</div>
				<div class="bg-box">
					<p>
						<strong><?php _e( 'custom-thumb-5', 'dynamik' ); ?></strong>
					</p>
					<p>
						<?php _e( 'Mode', 'dynamik' ); ?>
						<select id="dynamik-custom-image-size-five-mode" name="dynamik[custom_image_size_five_mode]" size="1" style="width:70px;">
							<option value="">&nbsp;</option>
							<option value="resize"<?php if( dynamik_get_settings( 'custom_image_size_five_mode' ) == 'resize' ) echo ' selected="selected"'; ?>><?php _e( 'Resize', 'dynamik' ); ?></option>
							<option value="crop"<?php if( dynamik_get_settings( 'custom_image_size_five_mode' ) == 'crop' ) echo ' selected="selected"'; ?>><?php _e( 'Crop', 'dynamik' ); ?></option>
						</select>
						<?php _e( 'Width', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-five-width" name="dynamik[custom_image_size_five_width]" value="<?php echo dynamik_get_settings( 'custom_image_size_five_width' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code> | 
						<?php _e( 'Height', 'dynamik' ); ?> <input type="text" id="dynamik-custom-image-size-five-height" name="dynamik[custom_image_size_five_height]" value="<?php echo dynamik_get_settings( 'custom_image_size_five_height' ) ?>" style="width:50px;" /><code class="dynamik-px-unit">px</code>
					</p>
				</div>
			</div>
		</div>

		<div class="dynamik-optionbox-outer-2col">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Genesis Column Classes', 'dynamik' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="dynamik-bootstrap-column-classes-active" name="dynamik[bootstrap_column_classes_active]" value="1" <?php if( checked( 1, dynamik_get_settings( 'bootstrap_column_classes_active' ) ) ); ?> /> <?php _e( 'Enable Genesis "Twitter Bootstrap" Column Classes', 'dynamik' ); ?>
						<span id="bootstrap-column-classes-active-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
					</p>
					
					<div class="tooltip tooltip-500">
						<p>
							<?php _e( 'With Genesis 2.0 the original "Genesis Column Classes" were replaced by those found in the Twitter Bootstrap responsive grid styles. Since Dynamik was already using the original Column Classes (especially with its EZ Widget areas) it retained those styles for backward compatability.', 'dynamik' ); ?>
						</p>

						<p>
							<?php _e( 'With this option enabled, however, you can have Dynamik use the newer "Bootstrap" Column Classes instead.', 'dynamik' ); ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<?php
		if( PARENT_THEME_VERSION < '2.0' )
			$genesis_pre_two_point_oh = ' style="display:none;"';
		else
			$genesis_pre_two_point_oh = '';
		?>

		<div class="dynamik-optionbox-outer-2col"<?php echo $genesis_pre_two_point_oh; ?>>
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Genesis HTML5 Markup', 'dynamik' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="dynamik-html-five-active" name="dynamik[html_five_active]" value="1" <?php if( checked( 1, dynamik_get_settings( 'html_five_active' ) ) ); ?> /> <?php _e( 'Activate Genesis HTML5 Markup', 'dynamik' ); ?>
						<span id="html-five-active-tooltip" class="tooltip-mark tooltip-top-left">[?]</span>
					</p>
					
					<div class="tooltip tooltip-500">
						<p>
							<?php _e( 'By activating this HTML5 Markup option you will be enabling a Genesis framework feature that outputs HTML5 markup in place of the old XHTML tags.', 'dynamik' ); ?>
						</p>
						<p>
							<?php _e( '<strong>Please Note:</strong> Since the enabling of this feature changes some of the HTML markup of Genesis you may find that some of your Custom CSS, if you have added any at this point, may need to be tweaked to maintain the design changes made by such CSS. In light of this you may find the following link useful: ', 'dynamik' ); ?>
							<a href="http://cobaltapps.com/genesis-xhtml-to-html5-css-converter/" target="_blank"><?php _e( 'GENESIS XHTML TO HTML5 CSS CONVERTER', 'extender' ); ?></a>
						</p>
						<p>
							<?php _e( '<strong>Also Note:</strong> The "Hook" setting for both Custom Widget Areas and Custom Hook Boxes (found in the "Dynamik Custom" admin section) have both "HTML5 Content Hooks" and "Pre-HTML5 Content Hooks". When this HTML5 Markup option is enabled use the "HTML5 Content Hooks". When it is disabled use the "Pre-HTML5 Content Hooks".', 'dynamik' ); ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div id="dynamik-fancy-dropdowns-active-box" class="dynamik-optionbox-outer-2col" style="display:none;">
			<div class="dynamik-optionbox-inner-2col">
				<h4><?php _e( 'Genesis "Fancy Dropdowns"', 'dynamik' ); ?></h4>
				
				<div class="bg-box">	
					<p>
						<input type="checkbox" id="dynamik-fancy-dropdowns-active" name="dynamik[fancy_dropdowns_active]" value="1" <?php if( checked( 1, dynamik_get_settings( 'fancy_dropdowns_active' ) ) ); ?> /> <?php _e( 'Enable Genesis Menu "Fancy Dropdowns"', 'dynamik' ); ?>
						<span id="fancy-dropdowns-tooltip" class="tooltip-mark tooltip-top-left">[?]</span>
					</p>
					
					<div class="tooltip tooltip-500">
						<p>
							<?php _e( 'With this feature enabled your Primary and Secondary Genesis menus, where sub-menus are present, will include sub-indicators as well as the "fancy dropdown" effect.', 'dynamik' ); ?>
						</p>

						<p>
							<?php _e( '<strong>Please Note:</strong> This is only necessary when Genesis HTML5 is active. When HTML5 is not active you can adjust this settings in', 'dynamik' ); ?>
							<a href="<?php echo admin_url( 'admin.php?page=genesis' ); ?>"><?php _e( 'Theme Settings > Navigation > "Load Superfish Script?"', 'dynamik' ); ?></a>
						</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>