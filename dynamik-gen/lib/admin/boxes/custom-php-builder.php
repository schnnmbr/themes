<?php
/**
 * Builds the Custom PHP Builder admin content.
 *
 * @package Dynamik
 */
?>

<div style="display:none;" id="dynamik-custom-php-builder" class="dynamik-optionbox-outer-1col">
	<div class="dynamik-optionbox-inner-1col">
		<h3 style="border-bottom:0;"><?php _e( 'Custom PHP Builder', 'dynamik' ); ?> <span id="custom-php-builder-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		
		<div class="tooltip tooltip-500">
			<h5><?php _e( 'A PHP Building Tool', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'The Custom PHP Builder is a handy tool for both learning basic WordPress/Genesis PHP coding as well as quickly creating and grabbing useful PHP code snippets to customize your website.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'About Forcing Layouts', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'By selecting a Layout in the provided drop-down list and then clicking the "Insert Forced Layout" button you will create a PHP code snippet that forces that particular Layout structure on any given page or post. This is especially useful when creating Custom Templates as it allows you to bypass the need for the Layout to be selected on a per-page basis.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'About Defining Label Widths', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'When you create a Custom Label Width it gets added to the "Label Widths" drop-down menu in this PHP Builder. This way you can select any particular Label Width and then click the "Define Label Width" button and have the PHP builder write the code necessary to define a Custom Label Width which is useful for assigning such a width to an area on your website. See "Assigning Custom Layout Widths Conditionally" in the Custom Labels [?]Tooltip for more information about this feature.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'About The genesis() Function', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'When creating Custom Templates, especially, the genesis() function is very commonly used at the end of the custom code. What this function does is call in all the necessary Genesis Framework code to build the page on your WordPress powered website. So what you can do is use your action and filter code to customize the way the page will display and then call this function in to finish the page building process.', 'dynamik' ); ?>
			</p>

			<h5><?php _e( 'Please Note:', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'When adding code to your Custom Functions you don\'t generally need to wrap your code in &#60;?php tags ?&#62;, but when adding PHP code to Custom Templates and Custom Hook Boxes you do need to make sure it\'s wrapped in &#60;?php Tags ?&#62;.', 'dynamik' ); ?>
			</p>
		</div>

		<div id="dynamik-custom-php-builder-wrap">
		<form name="form">
			<div id="dynamik-custom-php-builder-wrap-inner" class="bg-box">
				<div id="dynamik-custom-php-builder-options">
					<p>
						<select id="php_action_or_filter" name="php_action_or_filter" size="1" class="iewide" style="width:125px;">
							<option value="add_action"><?php _e( 'add_action', 'dynamik' ); ?></option>
							<option value="remove_action"><?php _e( 'remove_action', 'dynamik' ); ?></option>
							<option value="replace_action"><?php _e( '"replace"_action', 'dynamik' ); ?></option>
							<option value="add_filter"><?php _e( 'add_filter', 'dynamik' ); ?></option>
						</select>
						<span id="php_actions_wrap" class="php-builder-hidden-option">
						<?php _e( 'Actions', 'dynamik' ); ?>
						<select id="php_actions" class="php-builder-elements-select" name="php_actions" size="1">
						<?php dynamik_build_php_actions_menu(); ?>
						</select>
						</span>
						<span id="php_filters_wrap" class="php-builder-hidden-option">
						<?php _e( 'Filters', 'dynamik' ); ?>
						<select id="php_filters" class="php-builder-elements-select" name="php_filters" size="1">
						<?php dynamik_build_php_filters_menu(); ?>
						</select>
						</span>
						<span id="custom_function_name_wrap" class="php-builder-hidden-option">
						<input type="text" class="default-text forbid-chars" id="custom_function_name" name="custom_function_name" value="" title="Your Custom Function Name" />
						</span>
						<input id="build_add_action_php" class="custom-php-builder-button button" type="button" value="Build Actions" onclick="insertAtCaret(this.form.text, 'add_action'+this.form.php_actions.value+'\n')">
						<input id="build_remove_action_php" class="custom-php-builder-button button" style="display:none;" type="button" value="Build Actions" onclick="insertAtCaret(this.form.text, 'remove_action'+this.form.php_actions.value+'\n')">
						<input id="build_replace_action_php" class="custom-php-builder-button button" style="display:none;" type="button" value="Build Actions" onclick="insertAtCaret(this.form.text, 'remove_action'+this.form.php_actions.value+'\nadd_action( \''+this.form.php_actions.value.match(/'(.*?)'/)[1]+'\', \''+this.form.custom_function_name.value+'\' );\nfunction '+this.form.custom_function_name.value+'() {\n\t// YOUR PHP CODE GOES HERE\n}\n')">
						<input id="build_add_filter_php" class="custom-php-builder-button button" style="display:none;" type="button" value="Build Filters" onclick="insertAtCaret(this.form.text, 'add_filter( \''+this.form.php_filters.value+'\', \''+this.form.custom_function_name.value+'\' );\nfunction '+this.form.custom_function_name.value+'() {\n\t// YOUR PHP CODE GOES HERE\n}\n')">
					</p>
					<p style="width:48%; margin-top:0; float:left;">
						<?php _e( 'Layouts', 'dynamik' ); ?>
						<select id="forced_layouts" class="php-builder-elements-select" name="forced_layouts" size="1">
						<?php dynamik_list_forced_layout_options(); ?>
						</select>
						<input id="build_forced_layout_php" class="button" type="button" value="Insert Forced Layout" onclick="insertAtCaret(this.form.text, this.form.forced_layouts.value+'\n')">
					</p>
					<p style="width:48%; margin-top:0; float:right;">
						<?php _e( 'Label Widths', 'dynamik' ); ?>
						<select id="label_widths" class="php-builder-elements-select" name="label_widths" size="1" style="width:150px;">
						<?php dynamik_list_label_width_options(); ?>
						</select>
						<input id="build_defined_label_width_php" class="button" type="button" value="Define Label Width" onclick="insertAtCaret(this.form.text, 'define( \'DYNAMIK_LABEL_WIDTH\', \''+this.form.label_widths.value+'\' );\n')">
					</p>
					<p style="margin-top:0; float:left;">
						<input id="build_genesis_php" class="button" type="button" value="Insert genesis() Function" onclick="insertAtCaret(this.form.text, 'genesis();\n')">
					</p>
					<p style="margin-top:0; float:right;">
						<input id="wrap_in_php_tags" class="button" type="button" value="&#60;?php Wrap Code ?&#62;">
						<input id="build_new_line_php" class="button" type="button" value="Add New Line" onclick="insertAtCaret(this.form.text, '\n')">
						<input id="build_complex_comment_php" class="button" type="button" value="Add Complex Comment" onclick="insertAtCaret(this.form.text, '/**\n * Your PHP comment text goes here\n */\n')">
						<input id="build_simple_comment_php" class="button" type="button" value="Add Simple Comment" onclick="insertAtCaret(this.form.text, '// Your PHP comment text goes here\n')">
					</p>
				</div>

				<div id="php-builder-output-wrap">
					<textarea wrap="off" id="php-builder-output" class="dynamik-tabby-textarea" name="text"></textarea>
					<input id="php-builder-output-highlight" class="button" type="button" value="Click To Highlight Custom PHP For Copy/Paste">
				</div>
			</div>
		</form>
		</div>
	</div>
</div>