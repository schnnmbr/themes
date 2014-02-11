<?php
/**
 * Builds the Dynamik Custom Templates admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-custom-options-nav-templates-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Custom Templates', 'dynamik' ); ?><span class="button dynamik-add-button add-template"><?php _e( 'Add', 'dynamik' ); ?></span> <span id="custom-templates-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		
		<div class="tooltip tooltip-500 tooltip-scroll-500">
			<h5><?php _e( 'Custom Page and WordPress Templates the EASY way!', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'When you create a Custom Template you can choose to either create a Page Template or a WordPress Template depending on your specific needs.', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'Page Template vs WordPress Template', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'A Custom', 'dynamik' ); ?>
				<?php _e( '<a href="http://codex.wordpress.org/Page_Templates" target="_blank">"Page Template"</a>', 'dynamik' ); ?>
				<?php _e( 'is one that is selectable on a per-page basis. When this Template Type is selected your template file will be placed in your Child Theme\'s "my-templates" folder where WordPress will recognize it as a Page Template. Then when you create or edit a Page you can select it in the "Page Attributes > Templates" drop-down menu in the area to the right of the WP Page Editor.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( 'A Custom', 'dynamik' ); ?>
				<?php _e( '<a href="http://codex.wordpress.org/Template_Hierarchy" target="_blank">"WordPress Template"</a>', 'dynamik' ); ?>
				<?php _e( 'is a custom version of a default template file found in WordPress. For example you could create a custom version of the single.php file making it so all single posts take on your custom version of that template. Note that these types of templates will be placed in your Child Theme\'s root directory.', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'What Happens When You Change The File Name of A Custom Template?', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'The file name of a Custom Template acts as it\'s ID so when you change that name it does not rename the Template, but instead it creates a duplicate Custom Template with the new file name.', 'dynamik' ); ?>
			</p>
			
			<h5><?php _e( 'Adding PHP Code To My Custom Templates?', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'When you add PHP code to your Custom Templates be sure to wrap it in &lt;?php ?&gt; tags.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( '[do_shortcode] Button', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'To use shortcodes inside a Custom Template you need to wrap the [shortcode] in the', 'dynamik' ); ?>
				<a href="http://codex.wordpress.org/Function_Reference/do_shortcode" target="_blank"><?php _e( 'do_shortcode() function', 'dynamik' ); ?></a>
				<?php _e( '. A quick and easy way to do this is to simply click on the [do_shortcode] button. That will automatically wrap any text it finds wrapped in square brackets with that do_shortcode() function.', 'dynamik' ); ?>
			</p>

			<p>
				<?php _e( '<strong>Note</strong>, however, that there may be cases where square bracketed text is not shortcode text in which case you\'d either need to manually add the do_shortcode() function to any actual shortcodes in that Template or just make sure to remove the do_shortcode() function code that is wrapped around any non-shortcode text.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( '**Important NOTE**', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'Be sure that each of your Custom Templates has a file name given to it. Failure to do this may result in the inability to Save your Custom Option settings.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( '**Important Information About Naming Your Custom Template**', 'dynamik' ); ?></h5>

			<p>
				<?php _e( 'Be sure not to use "functions", "home", or "landing" as your template\'s File Name as this may overwrite such default files found in the root of your Child Theme folder.', 'dynamik' ); ?>
			</p>
		</div>

<?php	if( !empty( $_GET['notice'] ) )
		{
			if( $_GET['notice'] == 'template-added' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Custom Template successfully added.', 'dynamik' ); ?></strong></div>
<?php		}
			elseif( $_GET['notice'] == 'template-deleted' )
			{
?>				<div id="notice-box" style="background:#FFFBCC;border:1px solid #E6DB55;color:#555555;text-align:center;margin:15px 0px 0px 0px;padding:5px;"><strong><?php _e( 'Custom Template successfully deleted.', 'dynamik' ); ?></strong></div>
<?php		}
		}
?>
		
		<div id="dynamik-templates-wrap">
<?php
		if( !empty( $custom_templates ) )
		{
			$template_counter = 0;
			foreach( $custom_templates as $custom_template )
			{
				$template_counter++;
?>				<div id="template-<?php echo $template_counter; ?>" class="dynamik-all-templates">
					<div class="dynamik-custom-template-option">
						<p class="bg-box-design">
							<?php _e( 'File Name', 'dynamik' ); ?> <input type="text" id="custom-template-id-<?php echo $template_counter; ?>" name="custom_template_ids[<?php echo $template_counter; ?>]" value="<?php echo $custom_template['template_file_name']; ?>" style="width:180px;" class="forbid-template-chars forbid-caps forbid-names" /><?php _e( '.php | Template Name', 'dynamik' ); ?> <input type="text" id="custom-template-name-<?php echo $template_counter; ?>" name="custom_template_names[<?php echo $template_counter; ?>]" value="<?php echo $custom_template['template_name']; ?>" style="width:180px;" /> <?php _e( 'Template Type', 'dynamik' ); ?> <select id="custom-template-type-<?php echo $template_counter; ?>" name="custom_template_types[<?php echo $template_counter; ?>]" ><option value="page_template"<?php echo ( $custom_template['template_type'] == 'page_template' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Page Template', 'dynamik' ); ?></option><option value="wp_template"<?php echo ( $custom_template['template_type'] == 'wp_template' ) ? ' selected="selected"' : ''; ?>><?php _e( 'WordPress Template', 'dynamik' ); ?></option></select>
						</p>
						<?php if( $custom_template['template_type'] == 'page_template' ) { ?>
						<p style="width:45%;float:left;">
							<?php _e( "Conditional Tag: <code>is_page_template('my-templates/", 'dynamik' ); ?><?php echo $custom_template['template_file_name']; ?><?php _e( ".php')</code>", 'dynamik' ); ?>
						</p>
						<?php } ?>
						<p style="width:50%;float:right;">
							<span id="<?php echo $template_counter; ?>" class="button delete-template"><?php _e( 'Delete', 'dynamik' ); ?></span> <span class="view-only-template"><?php _e( 'View Only', 'dynamik' ); ?> <span class="button" style="width:120px !important;"><a href="#wpwrap"><?php _e( 'This Template', 'dynamik' ); ?></a></span></span> <span class="view-all-templates"><?php _e( 'View', 'dynamik' ); ?> <span class="button" style="width:120px !important;"><a href="#wpwrap"><?php _e( 'All Templates', 'dynamik' ); ?></a></span></span><span class="do-shortcode button"><?php _e( '[do_shortcode]', 'dynamik' ); ?></span>
						</p>
						<p style="padding-top:3px;">
							<textarea class="resizable dynamik-tabby-textarea" id="custom-template-textarea-<?php echo $template_counter; ?>" name="custom_template_textarea[<?php echo $template_counter; ?>]" style="width:780px;height:100px;text-align:left;margin-top:4px !important;"><?php echo $custom_template['template_textarea']; ?></textarea>
						</p>
					</div>
				</div>
<?php		}
		}
		else
		{
	?>		<div id="template-1" class="dynamik-all-templates">
				<div class="dynamik-custom-template-option">
					<p class="bg-box-design">
						<?php _e( 'File Name', 'dynamik' ); ?> <input type="text" id="custom-template-id-1" name="custom_template_ids[1]" value="" style="width:180px;" class="forbid-template-chars forbid-caps forbid-names" /><?php _e( '.php | Template Name', 'dynamik' ); ?> <input type="text" id="custom-template-name-1" name="custom_template_names[1]" value="" style="width:180px;" /> <?php _e( 'Template Type', 'dynamik' ); ?> <select id="custom-template-type-1" name="custom_template_types[1]" ><option value="page_template"><?php _e( 'Page Template', 'dynamik' ); ?></option><option value="wp_template"><?php _e( 'WordPress Template', 'dynamik' ); ?></option></select>
					<p style="float:right;">
						<span id="1" class="button delete-template"><?php _e( 'Delete', 'dynamik' ); ?></span><span class="do-shortcode button" style="margin-right:192px !important;"><?php _e( '[do_shortcode]', 'dynamik' ); ?></span>
					</p>
					<p style="padding-top:3px;">
						<textarea class="resizable dynamik-tabby-textarea" id="custom-template-textarea-1" name="custom_template_textarea[1]" style="width:780px;height:100px;text-align:left;margin-top:4px !important;"></textarea>
					</p>
				</div>
			</div>
<?php	}
?>		</div>
	</div>
</div>