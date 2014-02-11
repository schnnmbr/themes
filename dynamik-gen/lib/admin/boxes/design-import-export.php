<?php
/**
 * Builds the Dynamik Import/Export admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-<?php echo $nav_alt_id; ?>import-export-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Dynamik Design Import/Export Options', 'dynamik' ); ?></h3>
		
<?php	if( !empty( $_GET['notice'] ) )
		{
			if( $_GET['notice'] == 'import-error' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Design Import Error: Import File Must Be In .zip or .dat Format (ie. my_backup.zip or my_backup.dat)', 'dynamik' ); ?></strong></div>
<?php		}
			elseif( $_GET['notice'] == 'import-error-catalyst' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Design Import Error: It appears you are trying to Import an older/incompatible Catalyst/Dynamik Skin.', 'dynamik' ); ?></strong></div>
<?php		}
			elseif( $_GET['notice'] == 'import-catalyst-complete' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Design Import Complete: Please note that since this was a Catalyst/Dynamik Skin, and therefore not 100% transferable, you may need to tweak the options a bit to get the design just right.', 'dynamik' ); ?></strong></div>
<?php		}
			elseif( $_GET['notice'] == 'import-complete' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Design Import Complete', 'dynamik' ); ?></strong></div>
<?php		}
		}
?>		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Dynamik Design Export', 'dynamik' ); ?></p>
		</div>
		
		<form method="post">
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<strong><?php _e( 'Export File Name:', 'dynamik' ); ?></strong> <input type="text" id="design-export-name" name="design_export_name" value="" style="width:200px; margin-bottom:5px;" class="forbid-chars" />
				<input type="checkbox" value="include_images" name="include_images[]" value="1" checked > <?php _e( 'Include Images?', 'dynamik' ); ?>
				<input type="submit" name="clicked_button" value="<?php _e( 'Export Design', 'dynamik' ); ?>" style="margin:0 -5px 0 0 !important;" class="button-highlighted button"/>
				<input type="hidden" name="action" value="dynamik_design_export">
			</p>
		</div>
		</form>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Dynamik Design Import', 'dynamik' ); ?></p>
		</div>
		
		<form method="post" style="padding-bottom:10px;" enctype="multipart/form-data">
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<strong><?php _e( 'Design Import File:', 'dynamik' ); ?></strong> <input style="width:225px;" name="design_import_file" type="file" />
				<input type="submit" name="clicked_button" value="<?php _e( 'Import Design', 'dynamik' ); ?>" style="margin:0 -5px 0 0 !important;" class="button-highlighted button"/>
				<input type="hidden" name="action" value="dynamik_design_import">	
			</p>
		</div>
		</form>
	</div>
	
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Dynamik Design Snapshot', 'dynamik' ); ?> <span id="dynamik-design-snapshot-tooltip" class="tooltip-mark tooltip-center-left">[?]</span></h3>
		
		<div class="tooltip tooltip-400">
			<h5><?php _e( 'Creating A Snapshot of Your Dynamik Design:', 'dynamik' ); ?></h5>
			<p style="padding-top:10px !important;">
				<?php _e( 'These Snapshot options allow you to take a snapshot of your current Dynamik Design settings, locking them down in case you ever want or need to revert back to them.', 'dynamik' ); ?>
			</p>
			<p style="padding-top:0 !important;">
				<?php _e( 'It\'s easy to do. Just type into the "Snapshot Notes" box a simple reminder of what your current Design Settings reflect (eg. "Light blue background with thick gray #wrap border" etc..) then click the "Update Snapshot" button below. The "Snapshot Notes" are totally optional, there if you need them, but the timestamp will update as well which may be all the info you need.', 'dynamik' ); ?>
			</p>
			
			<p style="padding-top:0 !important;">
				<?php _e( 'Restoring to your current Snapshot is even easier. Just click the "Restore From Snapshot" button and you\'re done.', 'dynamik' ); ?>
			</p>
			
			<p style="padding-top:0 !important;">
				<?php _e( '<strong>TIP #1:</strong> This is a great tool for getting to a good place in your design, taking a Snapshot and then trying some different design changes that may or may not work out. If they do, great! If not, just restore back to your Snapshot and move on.', 'dynamik' ); ?>
			</p>
			
			<p style="padding-top:0 !important;">
				<?php _e( '<strong>TIP #2:</strong> Though this can certainly be used as a simple backup solution for your Dynamik Design Settings it\'s really not ideal for this. If your website\'s database were to ever become corrupt this would most likely effect ALL your Dynamik/WordPress settings, destroying this Snapshot. The best way to backup your Design Options using the tools Dynamik provides is with a Dynamik Design Export.', 'dynamik' ); ?>
			</p>
		</div>
		
<?php	if( !empty( $_GET['notice'] ) )
		{
			if( $_GET['notice'] == 'snapshot-update-complete' )
			{
?>				<div id="notice-box" style="background-color:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Dynamik Design Snapshot Update Complete', 'dynamik' ); ?></strong></div>
<?php		}
			elseif( $_GET['notice'] == 'snapshot-restore-complete' )
			{
?>				<div id="notice-box" style="background-color:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Dynamik Design Snapshot Restore Complete', 'dynamik' ); ?></strong></div>
<?php		}
		}
?>		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Update Dynamik Design Snapshot', 'dynamik' ); ?></p>
		</div>
		
		<form method="post">
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<input type="submit" name="clicked_button" value="<?php _e( 'Update Snapshot', 'dynamik' ); ?>" onClick='return confirm("<?php _e( 'Note: This will overwrite your previous Snapshot state with your current Design settings. Click OK to proceed?', 'dynamik' ); ?>")' style="margin:0 5px 0 -5px !important; float:left !important;" class="button-highlighted button"/>
				<input type="hidden" name="action" value="dynamik_design_snapshot_update">
				<span style="line-height:2.5;"><?php _e( 'Current Snapshot Timestamp: ', 'dynamik' ); echo $dynamik_design_snapshot_options['timestamp']; ?></span>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-dynamik-snapshot-notes" class="dynamik-custom-fonts-button button">Snapshot Notes</span></span>
				<div style="display:none;" id="show-dynamik-snapshot-notes-box" class="dynamik-custom-fonts-box">
				<textarea id="dynamik-design-snapshot-notes" name="dynamik[dynamik_snapshot_notes]" style="width:100%; margin-bottom:-3px;" rows="10"><?php if( $dynamik_design_snapshot_options['dynamik_snapshot_options']['dynamik_snapshot_notes'] ) echo stripslashes( $dynamik_design_snapshot_options['dynamik_snapshot_options']['dynamik_snapshot_notes'] ); ?></textarea>
				</div>
			</p>
		</div>
		</form>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Restore Dynamik Design Snapshot', 'dynamik' ); ?></p>
		</div>
		
		<form method="post">
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<input type="submit" name="clicked_button" value="<?php _e( 'Restore From Snapshot', 'dynamik' ); ?>" onClick='return confirm("<?php _e( 'Are you sure your want to restore your Dynamik Design settings to your current Snapshot state?', 'dynamik' ); ?>")' style="margin:0 0 0 -5px !important; float:left !important;" class="button-highlighted button"/>
				<input type="hidden" name="action" value="dynamik_design_snapshot_restore">
			</p>
		</div>
		</form>
	</div>
		
	<div class="dynamik-optionbox-inner-1col" style="border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05);">
		<h3 style="border:0;"><?php _e( 'Genesis Child Theme Export', 'dynamik' ); ?> <span id="child-theme-export-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		
		<div class="tooltip tooltip-400">
			<h5><?php _e( 'Exporting Your Dynamik Designs as Genesis Child Themes:', 'dynamik' ); ?></h5>
			<p style="padding-top:10px !important;">
				<?php _e( 'This feature allows you to export your design from Dynamik as a Genesis Child Theme which can then be installed and activated on any site that has Genesis installed. You can use the exported Child Theme "as-is", or as a starting point for refining styles and adding custom functionality.', 'dynamik' ); ?>
			</p>
			<span class="tooltip-credit">
				<?php _e( 'You can read more about WordPress Child Themes here:', 'dynamik' ); ?>
				<br /><a href="http://codex.wordpress.org/Child_Themes">http://codex.wordpress.org/Child_Themes</a>
			</span>
		</div>
				
		<div style="width:794px; float:left; padding:10px 10px 10px 0; border-top:1px solid #F0F0F0; background:#FFFFFF;">
			<div style="width:60%; float:left;">
				<div id="readme-box" style="margin-right:0; margin-bottom:0; height:315px;">
					<h5 style="padding-bottom:10px;"><?php _e( 'How To Use Genesis Child Theme Export:', 'dynamik' ); ?></h5>
					<p style="margin-top:-15px;">
						<?php _e( '<span style="font-family:verdana, sans-serif; font-weight:bold; font-size:14px; color:#014662;">Step 1:</span> Fill in the Form Fields.', 'dynamik' ); ?>
						<span id="child-theme-export-step1-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
								
					<div class="tooltip tooltip-400">							
						<h5><?php _e( 'Filling In The Form Fields:', 'dynamik' ); ?></h5>
						
						<p>
							<?php _e( '<strong>Theme Name:</strong> Pick a name for your Child Theme.<br /><strong>Author:</strong> This is for your name or the name of your organization.<br /><strong>Author URI:</strong> Place your website address here.', 'dynamik' ); ?>
						</p>
						
						<h5><?php _e( 'Including Child Theme Images:', 'dynamik' ); ?></h5>
						
						<p>
							<?php _e( 'In order to be included in the export, your Child Theme\'s images must all be uploaded using the Dynamik Image Uploader.', 'dynamik' ); ?>
						</p>
						<p>
							<?php _e( 'If you want to have a custom image appear for your Child Theme in Appearance > Themes (once your Child Theme has been uploaded for activation), create a .png image 300 pixels wide by 225 pixels tall, and name it screenshot.png.', 'dynamik' ); ?>
						</p>
						<p>
							<?php _e( 'Note that this image will be automatically separated by Dynamik upon Child Theme Export so it will not be included in your Exported Child Theme\'s /images/ folder.', 'dynamik' ); ?>
						</p>
					</div>
					
					<p>
						<?php _e( '<span style="font-family:verdana, sans-serif; font-weight:bold; font-size:14px; color:#014662;">Step 2:</span> Choose whether or not to include a reference to the Genesis style.css file in your Child Theme\'s stylesheet.', 'dynamik' ); ?>
						<span id="child-theme-export-step2-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>

					<div class="tooltip tooltip-400">							
						<p>
							<?php _e( 'If checked, this pulls in Genesis\'s default CSS styles as a fallback for your child theme/custom styles. If you are not sure then it is recommended that you leave this unchecked as by default Dynamik already provides all the necessary styles.', 'dynamik' ); ?>
						</p>
					</div>
					
					<p>
						<?php _e( '<span style="font-family:verdana, sans-serif; font-weight:bold; font-size:14px; color:#014662;">Step 3:</span> Choose whether or not to include your current Dynamik "Theme Settings".', 'dynamik' ); ?>
						<span id="child-theme-export-step3-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-400">							
						<p>
							<?php _e( 'If checked, your current "Theme Settings" (the settings found in Dynmik Settings > General Settings) will be reflected in the Exported Child Theme.', 'dynamik' ); ?>
						</p>
					</div>
					
					<p>
						<?php _e( '<span style="font-family:verdana, sans-serif; font-weight:bold; font-size:14px; color:#014662;">Step 4:</span> Choose whether or not to include any or all of your current Dynamik Design and/or Custom content.', 'dynamik' ); ?>
						<span id="child-theme-export-step4-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-400">							
						<p>
							<?php _e( 'If checked, your current Dynamik Design as well as anything you\'ve added in Dynamik Custom will be reflected in your Child Theme (depending on the checked items, of course).', 'dynamik' ); ?>
						</p>
					</div>
					
					<p>
						<?php _e( '<span style="font-family:verdana, sans-serif; font-weight:bold; font-size:14px; color:#014662;">Step 5:</span> Click the "Export Genesis Child Theme" button.', 'dynamik' ); ?>
					</p>
				</div>
			</div>
			
			<div style="width:40%; float:right;">
				<div class="bg-box" style="margin-right:0; margin-bottom:0; height:315px;">
				<form method="post" enctype="multipart/form-data">
					<p>
						<input type="text" id="child-name" name="child_name" value="" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Theme Name', 'dynamik' ); ?><br />
						<input type="text" id="child-author" name="child_author" value="" style="width:190px; margin-bottom:5px;" /> <?php _e( 'Author', 'dynamik' ); ?><br />
						<input type="text" id="child-author-uri" name="child_author_uri" value="" style="width:190px;" /> <?php _e( 'Author URI', 'dynamik' ); ?><br /><br />

						<input type="checkbox" id="parent-at-style" name="parent_at_style" value="1" > <?php _e( 'Include Reference To Genesis style.css? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-theme-settings" name="include_theme_settings" value="1" checked > <?php _e( 'Include Dynamik "Theme Settings"? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-dynamik-design" name="include_dynamik_design" value="1" checked > <?php _e( 'Include Dynamik "Design Options"? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-custom-css" name="include_custom_css" value="1" checked > <?php _e( 'Include Dynamik Custom > Custom CSS? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-custom-functions" name="include_custom_functions" value="1" checked > <?php _e( 'Include Dynamik Custom > Custom Functions? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-custom-templates" name="include_custom_templates" value="1" checked > <?php _e( 'Include Dynamik Custom > Custom Templates? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-custom-labels" name="include_custom_labels" value="1" checked > <?php _e( 'Include Dynamik Custom > Custom Labels? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-custom-widget-areas" name="include_custom_widget_areas" value="1" checked > <?php _e( 'Include Dynamik Custom > Custom Widget Areas? ', 'dynamik' ); ?><br />
						<input type="checkbox" id="include-custom-hook-boxes" name="include_custom_hook_boxes" value="1" checked > <?php _e( 'Include Dynamik Custom > Custom Hook Boxes? ', 'dynamik' ); ?><br /><br />
						
						<input type="submit" name="clicked_button" value="<?php _e( 'Export Genesis Child Theme', 'dynamik' ); ?>" style="margin:0 !important; float:left !important;" class="button-highlighted button"/>
						<input type="hidden" name="action" value="child_export">
					</p>
				</form>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>