<?php
/**
 * Builds the Dynamik Responsive admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-<?php echo $nav_alt_id; ?>responsive-box" class="dynamik-all-options">
	<h3 style="margin-bottom:15px;"><?php _e( 'Responsive', 'dynamik' ); ?> <span id="show-hide-responsive-options" class="dynamik-custom-fonts-button button dynamik-structure-settings-hide" style="float:none !important;"><?php _e( 'Show/Hide Options', 'dynamik' ); ?></span> <span id="responsive-design-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
	<div class="tooltip tooltip-500">
		<h5><?php _e( 'What Is Responsive Web Design?', 'dynamik' ); ?></h5>
		<p>
			<?php _e( 'Responsive Web Design is a type of web design practice which involves the use of certain types of CSS code (as well as js code in many cases) to allow a website to "respond" to different browser widths.', 'dynamik' ); ?>
		</p>
		
		<p>
			<?php _e( 'Responsive Design is a great way to make your website more mobile friendly, adjusting to the size of the different smart phone and tablet browser sizes while still looking great in a regular desktop browser.', 'dynamik' ); ?>
		</p>
		
		<p>
			<?php _e( 'The options below provide you with the ability to easily add your own Custom CSS for each media query (transition point), allowing you to refine the responsive styles which have already been added. Just click the icon below that represents the transition point you would like your styles to focus on and that particular textarea will be displayed.', 'dynamik' ); ?>
		</p>
			
		<span class="tooltip-credit">
			<?php _e( 'Learn more about Responsive Design here:', 'dynamik' ); ?>
			<a href="http://thinkvitamin.com/design/beginners-guide-to-responsive-web-design/" target="_blank">Beginner's Guide to Responsive Web Design</a>
		</span>
	</div>
	
	<form action="/" id="responsive-options-form" name="responsive-options-form">
	<input type="hidden" name="action" value="dynamik_responsive_options_save" />
	<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'responsive-options' ); ?>" />
	<div id="show-hide-responsive-options-box" class="dynamik-custom-fonts-box" style="background:none; border:none; width:804px; padding:0; float:left; display:none; position:inherit;">
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Meta/Script Options', 'dynamik' ); ?></h3>
		<div style="padding-top:10px; margin-bottom:15px; border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05); border-top:0; background:#FFFFFF; width:804px;">
			<div class="bg-box">
				<p style="margin:0;">
					<code>&#60;meta name=&#34;viewport&#34; content=&#34;</code><input type="text" id="dynamik-viewport-meta-content" class="responsive-option" name="dynamik[viewport_meta_content]" value="<?php if( dynamik_get_responsive( 'viewport_meta_content' ) != '' ) { echo dynamik_get_responsive( 'viewport_meta_content' ); } else { echo 'width=device-width, initial-scale=1.0'; } ?>" style="width:450px;" /><code>&#34;&#62;</code>
					<span id="viewport-meta-content-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
				</p>
				
				<div class="tooltip tooltip-500">
					<h5><?php _e( 'What Is The Viewport Meta Tag?', 'dynamik' ); ?></h5>
					<p>
						<?php _e( 'The Viewport Meta Tag, which is added to the <code>&lt;head&gt;</code> of your site, provides a means to specify to mobile browsers how your site should be displayed with regard to its scale.', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( 'The default settings provided below, for example, tell mobile browsers to display your site in it\'s actual scale as apposed to zooming in or out to compensate for the smaller browser dimensions. This is ideal for a responsive site because without it your site would most likely be displayed in it\'s desktop browser form, but much smaller in size.', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( 'In most cases you can just leave the default setting as is.', 'dynamik' ); ?>
					</p>
						
					<span class="tooltip-credit">
						<?php _e( 'Learn more about the Viewport Meta Tag here:', 'dynamik' ); ?>
						<a href="https://developer.mozilla.org/en/Mobile/Viewport_meta_tag#section_1" target="_blank">Using the viewport meta tag to control layout on mobile browsers</a>
					</span>
					
					<p style="float:left; margin-bottom:0;"><?php _e( '<strong>Default Value: <code>width=device-width, initial-scale=1.0</code></strong>', 'dynamik' ); ?></p>
				</div>
			</div>
		</div>
		
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Default Media Query Options', 'dynamik' ); ?></h3>
		<div style="padding-top:10px; margin-bottom:15px; border: 1px solid #DFDFDF; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); box-shadow: 0 1px 2px rgba(0,0,0,.05); border-top:0; background:#FFFFFF; width:804px;">
			<div class="bg-box" style="width:364px; margin-right:0; float:left;">
				<p>
					<?php _e( 'Site #wrap Media Query Styles:', 'dynamik' ); ?> <select id="dynamik-wrap-media-query-default" class="responsive-option" name="dynamik[wrap_media_query_default]" size="1" style="width:130px;">
						<option value="default"<?php if( dynamik_get_responsive( 'wrap_media_query_default' ) == 'default' ) echo ' selected="selected"'; ?>><?php _e( 'Default', 'dynamik' ); ?></option>
						<option value="none"<?php if( dynamik_get_responsive( 'wrap_media_query_default' ) == 'none' ) echo ' selected="selected"'; ?>><?php _e( 'None', 'dynamik' ); ?></option>
					</select>
					<span id="wrap-media-query-default-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
				</p>
				
				<div class="tooltip tooltip-400">
					<h5><?php _e( 'Site #wrap "Default" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger point:</strong> 1st', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Default styles:</strong> <strong>1st trigger point</strong> = Your site #wrap margins, borders and box shadow styles are stripped to reduce unnecessary spacing around your site.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Default Code:', 'dynamik' ); ?></h5>
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">.site-container { border: 0; margin: 0 auto; -webkit-border-radius: 0; border-radius: 0; -webkit-box-shadow: none; box-shadow: none; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">#wrap { border: 0; margin: 0 auto; -webkit-border-radius: 0; border-radius: 0; -webkit-box-shadow: none; box-shadow: none; }</textarea>
						<?php } ?>
					</p>
				</div>
			</div>

			<div class="bg-box" style="width:364px; margin-left:0; float:right;">
				<p>
					<?php _e( 'Navbar Media Query Styles:', 'dynamik' ); ?> <select id="dynamik-navbar-media-query-default" class="responsive-option" name="dynamik[navbar_media_query_default]" size="1" style="width:130px;">
						<option value="default"<?php if( dynamik_get_responsive( 'navbar_media_query_default' ) == 'default' ) echo ' selected="selected"'; ?>><?php _e( 'Default', 'dynamik' ); ?></option>
						<option value="vertical"<?php if( dynamik_get_responsive( 'navbar_media_query_default' ) == 'vertical' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical Menu', 'dynamik' ); ?></option>
						<option value="vertical_toggle"<?php if( dynamik_get_responsive( 'navbar_media_query_default' ) == 'vertical_toggle' ) echo ' selected="selected"'; ?>><?php _e( 'Vertical Toggle', 'dynamik' ); ?></option>
						<option value="tablet_dropdown"<?php if( dynamik_get_responsive( 'navbar_media_query_default' ) == 'tablet_dropdown' ) echo ' selected="selected"'; ?>><?php _e( 'Tablet Dropdown', 'dynamik' ); ?></option>
						<option value="mobile_dropdown"<?php if( dynamik_get_responsive( 'navbar_media_query_default' ) == 'mobile_dropdown' ) echo ' selected="selected"'; ?>><?php _e( 'Mobile Dropdown', 'dynamik' ); ?></option>
						<option value="none"<?php if( dynamik_get_responsive( 'navbar_media_query_default' ) == 'none' ) echo ' selected="selected"'; ?>><?php _e( 'None', 'dynamik' ); ?></option>
					</select>
					<?php _e( 'Delay?', 'dynamik' ); ?> <input type="checkbox" id="dynamik-navbar-media-query-delayed" class="responsive-option" name="dynamik[navbar_media_query_delayed]" value="1" <?php if( checked( 1, dynamik_get_responsive( 'navbar_media_query_delayed' ) ) ); ?> />
					<span id="navbar-media-query-default-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
				</p>
				
				<div class="tooltip tooltip-400 tooltip-scroll-400">
					<p>
						<?php _e( '<em><strong>Note</strong> that both the Primary and Secondary Navbars are affected by everything mentioned below while the Header menu area is only affected by some.</em>', 'dynamik' ); ?>
					</p>

					<h5><?php _e( 'Delay?', 'dynamik' ); ?></h5>
					<p>
						<?php _e( 'When the "Delay?" option is selected your Navbars will remain in their non-Responsive positions through the first set of @media query trigger points.', 'dynamik' ); ?>
					</p>

					<h5><?php _e( 'Delay Code:', 'dynamik' ); ?></h5>
					
					<p style="margin-bottom:0;">
						<?php _e( '2nd trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary { width: 100%; } .site-header .genesis-nav-menu { width: auto; max-width: 680px; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary { width: 100%; } #header .genesis-nav-menu { width: auto; max-width: 680px; }</textarea>
						<?php } ?>
					</p>

					<p>
						<?php _e( '<em><strong>Note</strong> that when "Delay" is enabled you not only get the above @media query styles added to the 2nd trigger point, but the following changes occur to the other specified styles below: 1st trigger point CSS gets moved to the 4th trigger point and 3rd trigger point CSS gets moved to the 5th trigger point.</em>', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Navbar "Default" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger point:</strong> 1st', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Default styles:</strong> <strong>1st trigger point</strong> = Primary Navigation "Extras" (if enabled) are removed (eg. Blog Feeds, Twitter, Search, etc..). Navbar pages/text are centered.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Default Code:', 'dynamik' ); ?></h5>
					
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">body.override .menu-primary, body.override .menu-secondary, .site-header .widget-area, .site-header .genesis-nav-menu { width: 100%; } .site-header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, .site-header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, .site-header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, .site-header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">body.override .menu-primary, body.override .menu-secondary, #header .widget-area, #header .genesis-nav-menu { width: 100%; } #header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, #header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, #header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, #header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } ?>
					</p>
					
					<h5><?php _e( '"Vertical Menu" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger points:</strong> 1st & 6th', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Vertical Menu styles:</strong> <strong>1st trigger point</strong> = Primary Navigation "Extras" (if enabled) are removed (eg. Blog Feeds, Twitter, Search, etc..). Navbar pages/text are centered. <strong>6th trigger point</strong> = Navbar is turned into a vertical menu.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Vertical Menu Code:', 'dynamik' ); ?></h5>
					
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary, .site-header .widget-area, .site-header .genesis-nav-menu { width: 100%; } .site-header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, .site-header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, .site-header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, .site-header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary, #header .widget-area, #header .genesis-nav-menu { width: 100%; } #header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, #header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, #header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, #header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } ?>
					</p>
					
					<p style="margin-bottom:0;">
						<?php _e( '6th trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">.nav-primary, .nav-secondary, .site-header .widget-area, .site-header .genesis-nav-menu { height: 100%; border-bottom: 0; } .menu-primary, .menu-secondary, .site-header .menu, .menu-primary li, .menu-secondary li, .site-header .genesis-nav-menu li, .menu-primary li ul, .menu-secondary li ul, .site-header .genesis-nav-menu li ul { width: 100%; } .menu-primary li ul, .menu-secondary li ul, .site-header .genesis-nav-menu li ul { display: block; visibility: visible; height: 100%; left: 0; position: relative; } .menu-primary a { border-right: 0 !important; border-bottom: 1px solid #DDDDDD !important; } .menu-secondary a { border-right: 0 !important; border-bottom: 1px solid #DDDDDD !important; } .site-header .genesis-nav-menu a { border-right: 0 !important; border-bottom: 1px solid #DDDDDD !important; } .menu-primary li li, .menu-secondary li li, .site-header .genesis-nav-menu li li { text-align: center; } .menu-primary li li a, .menu-primary li li a:link, .menu-primary li li a:visited, .menu-secondary li li a, .menu-secondary li li a:link, .menu-secondary li li a:visited, .site-header .genesis-nav-menu li li a, .site-header .genesis-nav-menu li li a:link, .site-header .genesis-nav-menu li li a:visited { width: auto; } .menu-primary li ul ul, .menu-secondary li ul ul, .site-header .genesis-nav-menu li ul ul { margin: 0; } ul.genesis-nav-menu, .genesis-nav-menu li  { text-align: left !important; } .genesis-nav-menu .sub-menu a::before { content: "- "; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">#nav, #subnav, #header .widget-area, #header .genesis-nav-menu { height: 100%; border-bottom: 0; } .menu-primary, .menu-secondary, #header .menu, .menu-primary li, .menu-secondary li, #header .genesis-nav-menu li, .menu-primary li ul, .menu-secondary li ul, #header .genesis-nav-menu li ul { width: 100%; } .menu-primary li ul, .menu-secondary li ul, #header .genesis-nav-menu li ul { display: block; visibility: visible; height: 100%; left: 0; position: relative; } .menu-primary a { border-right: 0 !important; border-bottom: 1px solid #DDDDDD !important; } .menu-secondary a { border-right: 0 !important; border-bottom: 1px solid #DDDDDD !important; } #header .genesis-nav-menu a { border-right: 0 !important; border-bottom: 1px solid #DDDDDD !important; } .menu-primary li li, .menu-secondary li li, #header .genesis-nav-menu li li { text-align: center; } .menu-primary li li a, .menu-primary li li a:link, .menu-primary li li a:visited, .menu-secondary li li a, .menu-secondary li li a:link, .menu-secondary li li a:visited, #header .genesis-nav-menu li li a, #header .genesis-nav-menu li li a:link, #header .genesis-nav-menu li li a:visited { width: auto; } .menu-primary li ul ul, .menu-secondary li ul ul, #header .genesis-nav-menu li ul ul { margin: 0; } ul.genesis-nav-menu, .genesis-nav-menu li  { text-align: left !important; } .genesis-nav-menu .sub-menu a::before { content: "- "; }</textarea>
						<?php } ?>
					</p>

					<h5><?php _e( '"Vertical Toggle" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger points:</strong> 1st, 3rd & 6th', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Vertical Toggle styles:</strong> <strong>1st trigger point</strong> = Primary Navigation "Extras" (if enabled) are removed (eg. Blog Feeds, Twitter, Search, etc..). Navbar pages/text are centered. <strong>3rd trigger point</strong> = Navbars and Vertical Toggle Buttons are given specific display attributes for jQuery purposes. <strong>6th trigger point</strong> = Navbar is turned into a vertical menu.', 'dynamik' ); ?>
					</p>

					<h5><?php _e( 'Vertical Toggle Code:', 'dynamik' ); ?></h5>
					
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary, .site-header .widget-area, .site-header .genesis-nav-menu { width: 100%; } .site-header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, .site-header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, .site-header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, .site-header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary, #header .widget-area, #header .genesis-nav-menu { width: 100%; } #header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, #header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, #header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, #header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } ?>
					</p>

					<p style="margin-bottom:0;">
						<?php _e( '3rd trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">.nav-primary, .nav-secondary { display: block; } .responsive-primary-menu-container, .responsive-secondary-menu-container { display: none; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">#nav, #subnav { display: block; } .responsive-primary-menu-container, .responsive-secondary-menu-container { display: none; }</textarea>
						<?php } ?>
					</p>
					
					<p style="margin-bottom:0;">
						<?php _e( '6th trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">.nav-primary, .nav-secondary, .site-header .widget-area, .site-header .genesis-nav-menu { height: 100%; border-bottom: 0; } .menu-primary, .menu-secondary, .site-header .menu, .menu-primary li, .menu-secondary li, .site-header .genesis-nav-menu li, .menu-primary li ul, .menu-secondary li ul, .site-header .genesis-nav-menu li ul { width: 100%; } .menu-primary li ul, .menu-secondary li ul, .site-header .genesis-nav-menu li ul { display: block; visibility: visible; height: 100%; left: 0; position: relative; } .menu-primary a { border-right: 0 !important; border-bottom: 2px solid #DDDDDD !important; } .menu-secondary a { border-right: 0 !important; border-bottom: 2px solid #DDDDDD !important; } .site-header .genesis-nav-menu a { border-right: 0 !important; border-bottom: 0px solid #DDDDDD !important; } .menu-primary li li, .menu-secondary li li, .site-header .genesis-nav-menu li li { text-align: center; } .menu-primary li li a, .menu-primary li li a:link, .menu-primary li li a:visited, .menu-secondary li li a, .menu-secondary li li a:link, .menu-secondary li li a:visited, .site-header .genesis-nav-menu li li a, .site-header .genesis-nav-menu li li a:link, .site-header .genesis-nav-menu li li a:visited { width: auto; } .menu-primary li ul ul, .menu-secondary li ul ul, .site-header .genesis-nav-menu li ul ul { margin: 0; } ul.genesis-nav-menu, .genesis-nav-menu li  { text-align: left !important; } .genesis-nav-menu .sub-menu a::before { content: "- "; } .menu-primary li:hover ul ul, .menu-secondary li:hover ul ul { left: 0; } .menu-primary .sub-menu a, .menu-primary .sub-menu a:link { padding: 17px 20px; } .menu-primary .sub-menu li li a, .menu-primary .sub-menu li li a:link { padding: 17px 30px; } .menu-primary .sub-menu li li ul li a, .menu-primary .sub-menu li li ul li a:link { padding: 17px 40px; } .menu-secondary .sub-menu a, .menu-secondary .sub-menu a:link { padding: 17px 20px; } .menu-secondary .sub-menu li li a, .menu-secondary .sub-menu li li a:link { padding: 17px 30px; } .menu-secondary .sub-menu li li ul li a, .menu-secondary .sub-menu li li ul li a:link { padding: 17px 40px; } .nav-primary, .nav-secondary { display: none; } .responsive-primary-menu-container, .responsive-secondary-menu-container, .mobile-primary-toggle, .mobile-secondary-toggle { display: block; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">#nav, #subnav, #header .widget-area, #header .genesis-nav-menu { height: 100%; border-bottom: 0; } .menu-primary, .menu-secondary, #header .menu, .menu-primary li, .menu-secondary li, #header .genesis-nav-menu li, .menu-primary li ul, .menu-secondary li ul, #header .genesis-nav-menu li ul { width: 100%; } .menu-primary li ul, .menu-secondary li ul, #header .genesis-nav-menu li ul { display: block; visibility: visible; height: 100%; left: 0; position: relative; } .menu-primary a { border-right: 0 !important; border-bottom: 2px solid #DDDDDD !important; } .menu-secondary a { border-right: 0 !important; border-bottom: 2px solid #DDDDDD !important; } #header .genesis-nav-menu a { border-right: 0 !important; border-bottom: 0px solid #DDDDDD !important; } .menu-primary li li, .menu-secondary li li, #header .genesis-nav-menu li li { text-align: center; } .menu-primary li li a, .menu-primary li li a:link, .menu-primary li li a:visited, .menu-secondary li li a, .menu-secondary li li a:link, .menu-secondary li li a:visited, #header .genesis-nav-menu li li a, #header .genesis-nav-menu li li a:link, #header .genesis-nav-menu li li a:visited { width: auto; } .menu-primary li ul ul, .menu-secondary li ul ul, #header .genesis-nav-menu li ul ul { margin: 0; } ul.genesis-nav-menu, .genesis-nav-menu li  { text-align: left !important; } .genesis-nav-menu .sub-menu a::before { content: "- "; } .menu-primary li:hover ul ul, .menu-secondary li:hover ul ul { left: 0; } .menu-primary .sub-menu a, .menu-primary .sub-menu a:link { padding: 17px 20px; } .menu-primary .sub-menu li li a, .menu-primary .sub-menu li li a:link { padding: 17px 30px; } .menu-primary .sub-menu li li ul li a, .menu-primary .sub-menu li li ul li a:link { padding: 17px 40px; } .menu-secondary .sub-menu a, .menu-secondary .sub-menu a:link { padding: 17px 20px; } .menu-secondary .sub-menu li li a, .menu-secondary .sub-menu li li a:link { padding: 17px 30px; } .menu-secondary .sub-menu li li ul li a, .menu-secondary .sub-menu li li ul li a:link { padding: 17px 40px; } #nav, #subnav { display: none; } .responsive-primary-menu-container, .responsive-secondary-menu-container, .mobile-primary-toggle, .mobile-secondary-toggle { display: block; }</textarea>
						<?php } ?>
					</p>
					
					<h5><?php _e( '"Tablet Dropdown" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger point:</strong> 1st', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Tablet Dropdown styles:</strong> <strong>1st trigger point</strong> = The regular navbar is replaced with a dropdown menu. (Note that if a Custom Menu is added to the Header Widget Area it will not be replaced by a dropdown menu, but instead it will just center the pages/text.)', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Tablet Dropdown Code:', 'dynamik' ); ?></h5>
					
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">.nav-primary, .nav-secondary { display: none; } .site-header .widget-area, .site-header .genesis-nav-menu { width: 100%; } .site-header .widget-area { float: none; } .site-header ul.genesis-nav-menu { float: none; text-align: center; } .site-header .genesis-nav-menu li { display: inline-block; float: none; } .site-header .genesis-nav-menu li li { text-align: left; } #dropdown-nav-wrap, #dropdown-subnav-wrap { padding: 0 20px 0 20px; display: block; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">#nav, #subnav { display: none; } #header .widget-area, #header .genesis-nav-menu { width: 100%; } #header .widget-area { float: none; } #header ul.genesis-nav-menu { float: none; text-align: center; } #header .genesis-nav-menu li { display: inline-block; float: none; } #header .genesis-nav-menu li li { text-align: left; } #dropdown-nav-wrap, #dropdown-subnav-wrap { padding: 0 20px 0 20px; display: block; }</textarea>
						<?php } ?>
					</p>
					
					<h5><?php _e( '"Mobile Dropdown" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger points:</strong> 1st & 6th', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Mobile Dropdown styles:</strong> <strong>1st trigger point</strong> = Primary Navigation "Extras" (if enabled) are removed (eg. Blog Feeds, Twitter, Search, etc..). Navbar pages/text are centered. <strong>6th trigger point</strong> = The regular navbar is replaced with a dropdown menu. (Note that if a Custom Menu is added to the Header Widget Area it will not be replaced by a dropdown menu, but instead it will just center the pages/text.)', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Mobile Dropdown Code:', 'dynamik' ); ?></h5>
					
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary, .site-header .widget-area, .site-header .genesis-nav-menu { width: 100%; } .site-header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, .site-header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, .site-header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, .site-header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .menu-primary, body.override .menu-secondary, #header .widget-area, #header .genesis-nav-menu { width: 100%; } #header .widget-area { float: none; } .genesis-nav-menu li.right { display: none; } ul.menu-primary, ul.menu-secondary, #header ul.genesis-nav-menu { float: none; text-align: center; } .menu-primary li, .menu-secondary li, #header .genesis-nav-menu li { display: inline-block; float: none; } .menu-primary li li, .menu-secondary li li, #header .genesis-nav-menu li li { text-align: left; }</textarea>
						<?php } ?>
					</p>
					
					<p style="margin-bottom:0;">
						<?php _e( '6th trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">.nav-primary, .nav-secondary { display: none; } #dropdown-nav-wrap, #dropdown-subnav-wrap { padding: 0 20px 0 20px; display: block; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">#nav, #subnav { display: none; } #dropdown-nav-wrap, #dropdown-subnav-wrap { padding: 0 20px 0 20px; display: block; }</textarea>
						<?php } ?>
					</p>
				</div>
			</div>
			
			<div style="clear:both;"></div>
			
			<div class="bg-box" style="width:364px; margin-right:0; float:left;">
				<p>
					<?php _e( 'Header Media Query Styles:', 'dynamik' ); ?> <select id="dynamik-header-media-query-default" class="responsive-option" name="dynamik[header_media_query_default]" size="1" style="width:130px;">
						<option value="default"<?php if( dynamik_get_responsive( 'header_media_query_default' ) == 'default' ) echo ' selected="selected"'; ?>><?php _e( 'Default', 'dynamik' ); ?></option>
						<option value="delayed"<?php if( dynamik_get_responsive( 'header_media_query_default' ) == 'delayed' ) echo ' selected="selected"'; ?>><?php _e( 'Delayed', 'dynamik' ); ?></option>
						<option value="none"<?php if( dynamik_get_responsive( 'header_media_query_default' ) == 'none' ) echo ' selected="selected"'; ?>><?php _e( 'None', 'dynamik' ); ?></option>
					</select>
					<span id="header-media-query-default-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
				</p>
				
				<div class="tooltip tooltip-400 tooltip-scroll-400">
					<h5><?php _e( 'Header "Default" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger point:</strong> 1st', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Default styles:</strong> <strong>1st trigger point</strong> = The Header Title Area and Header Right (Widget Area) will span the full width of your Header with the Header Right area displaying below the Header Title Area, ensuring the Title Area and Widget Area content have room to display. The Title and Tagline (or logo image) will be centered.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Default Code:', 'dynamik' ); ?></h5>
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">body.override .site-header .wrap, .title-area, .site-header .widget-area { width: 100%; } .title-area { height: 84px; padding-left: 0; text-align: center; float: none; } .site-header .widget-area { padding: 0; } .header-image .site-header .wrap .title-area { margin: 0 auto; float: none; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">body.override #header .wrap, #title-area, #header .widget-area { width: 100%; } #title-area { height: 84px; padding-left: 0; text-align: center; float: none; } #header .widget-area { padding: 0; } .header-image #header .wrap #title-area { margin: 0 auto; float: none; }</textarea>
						<?php } ?>
					</p>

					<h5><?php _e( 'Header "Delayed" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger point:</strong> 2nd & 4th', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Delayed styles:</strong> <strong>2nd trigger point</strong> = The Header Right (Widget Area) remains next to the Header Title Area allowing your Header content to display side-by-side on larger mobile devices. <strong>4th trigger point</strong> = The Header Title Area and Header Right (Widget Area) will span the full width of your Header with the Header Right area displaying below the Header Title Area, ensuring the Title Area and Widget Area content have room to display. The Title and Tagline (or logo image) will be centered.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Delayed Code:', 'dynamik' ); ?></h5>
					<p style="margin-bottom:0;">
						<?php _e( '2nd trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .site-header .wrap { width: 100%; } .title-area { width: 320px; } .site-header .widget-area { width: auto; max-width: 680px; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override #header .wrap { width: 100%; } #title-area { width: 320px; } #header .widget-area { width: auto; max-width: 680px; }</textarea>
						<?php } ?>
					</p>

					<p style="margin-bottom:0;">
						<?php _e( '4th trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .site-header .wrap, .title-area, .site-header .widget-area { width: 100%; } .title-area { height: 88px; padding-left: 0; text-align: center; float: none; } .site-header .widget-area { padding: 0; } .header-image .site-header .wrap .title-area { margin: 0 auto; float: none; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override #header .wrap, #title-area, #header .widget-area { width: 100%; } #title-area { height: 88px; padding-left: 0; text-align: center; float: none; } #header .widget-area { padding: 0; } .header-image #header .wrap #title-area { margin: 0 auto; float: none; }</textarea>
						<?php } ?>
					</p>
				</div>
			</div>
			
			<div class="bg-box" style="width:364px; margin-left:0; float:right;">
				<p>
					<?php _e( 'Content/Sidebar Media Query Styles:', 'dynamik' ); ?> <select id="dynamik-content-media-query-default" class="responsive-option" name="dynamik[content_media_query_default]" size="1" style="width:130px;">
						<option value="default"<?php if( dynamik_get_responsive( 'content_media_query_default' ) == 'default' ) echo ' selected="selected"'; ?>><?php _e( 'Default', 'dynamik' ); ?></option>
						<option value="delayed"<?php if( dynamik_get_responsive( 'content_media_query_default' ) == 'delayed' ) echo ' selected="selected"'; ?>><?php _e( 'Delayed', 'dynamik' ); ?></option>
						<option value="none"<?php if( dynamik_get_responsive( 'content_media_query_default' ) == 'none' ) echo ' selected="selected"'; ?>><?php _e( 'None', 'dynamik' ); ?></option>
					</select>
					<span id="content-media-query-default-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
				</p>
				
				<div class="tooltip tooltip-400 tooltip-scroll-400">
					<h5><?php _e( 'Content/Sidebar "Default" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger points:</strong> 1st, 3rd & 6th', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Default styles:</strong> <strong>1st trigger point</strong> = The sidebars get pushed below the content, with both the main content and sidebars stretching to full width, enabling both Content and Sidebars ample room to display in any browser width. <strong>3rd trigger point</strong> = Horizontal margins/padding gets added to elements inside the main content area to maintain nicely spaced out content. <strong>6th trigger point</strong> = Content article and Breadcrumb horizontal margins/padding get removed to better accommodate smaller mobile devices.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Default Code:', 'dynamik' ); ?></h5>
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .content-sidebar-wrap, body.override .content { width: 100%; } body.override .site-inner { padding-bottom: 10px; } .content { padding: 0; } .content .override { padding: 0 10px; } body.override .breadcrumb { margin: 0 0 30px; } body.override .sidebar-primary, body.override .sidebar-secondary { width: 100%; float: left; } .sidebar-primary { margin: 20px 0 0; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override #content-sidebar-wrap, body.override #content { width: 100%; } body.override #inner { padding-bottom: 10px; } #content { padding: 0; } #content .override { padding: 0 10px; } body.override .breadcrumb { margin: 0 0 30px; } body.override #sidebar, body.override #sidebar-alt { width: 100%; float: left; } #sidebar { margin: 20px 0 0; }</textarea>
						<?php } ?>
					</p>

					<p style="margin-bottom:0;">
						<?php _e( '3rd trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">.content .override { padding: 10px 20px 0; } body.override .breadcrumb { margin: 0 20px 20px; } .author-box { margin: 0px 20px 40px; } #comments { margin: 0px 20px 15px; } .entry-pings { margin: 0 20px; } #respond { margin: 0 20px 15px; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">#content .override { padding: 10px 20px 0; } body.override .breadcrumb { margin: 0 20px 20px; } .author-box { margin: 0px 20px 40px; } #comments { margin: 0px 20px 15px; } #pings { margin: 0 20px; } #respond { margin: 0 20px 15px; }</textarea>
						<?php } ?>
					</p>

					<p style="margin-bottom:0;">
						<?php _e( '6th trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">.content .override { padding: 0; } body.override .content-sidebar-wrap, body.override .content { width: 100%; } body.override .site-inner { padding-bottom: 10px; } .content { padding: 0; } .content .override { padding: 0 10px; } body.override .breadcrumb { margin: 0 0 30px; } body.override .sidebar-primary, body.override .sidebar-secondary { width: 100%; float: left; } .sidebar-primary { margin: 20px 0 0; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin-bottom:20px;">#content .override { padding: 0; } body.override #content-sidebar-wrap, body.override #content { width: 100%; } body.override #inner { padding-bottom: 10px; } #content { padding: 0; } #content .override { padding: 0 10px; } body.override .breadcrumb { margin: 0 0 30px; } body.override #sidebar, body.override #sidebar-alt { width: 100%; float: left; } #sidebar { margin: 20px 0 0; }</textarea>
						<?php } ?>
					</p>

					<h5><?php _e( 'Content/Sidebar "Delayed" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger points:</strong> 2nd, 3rd, 4th & 6th', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Delayed styles:</strong> <strong>2nd trigger point</strong> = The Primary Sidebar gets resized to the "Progressive Sidebar Width" (set below) and remains next to the main content area allowing your full content to display on larger mobile devices. The Secondary Sidebar, if one exists, will be pushed below the main content area and set to a full width. <strong>3rd trigger point</strong> = Horizontal margins/padding gets added to elements inside the main content area to maintain nicely spaced out content. <strong>4th trigger point</strong> = The sidebars get pushed below the content, with both the main content and sidebars stretching to full width, enabling both Content and Sidebars ample room to display in any browser width. <strong>6th trigger point</strong> = Content article and Breadcrumb horizontal margins/padding get removed to better accommodate smaller mobile devices.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Delayed Code:', 'dynamik' ); ?></h5>
					<p style="margin-bottom:0;">
						<?php _e( '2nd trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .site-inner { padding-bottom: 10px; } body.override .content-sidebar-wrap { width: 100%; } body.override .content { width: auto; max-width: 100%; padding: 0; } .content .override { padding: 0 10px; } body.content-sidebar-sidebar .content, body.sidebar-content-sidebar .content, body.content-sidebar .content { margin-right: 300px; } body.sidebar-sidebar-content .content, body.sidebar-content .content { margin-left: 300px; } body.full-width-content .content { margin: 0; } body.override .breadcrumb { margin: 0 0 30px; } body.override .sidebar-primary { width: 280px; } body.content-sidebar-sidebar .sidebar-primary, body.sidebar-content-sidebar .sidebar-primary, body.content-sidebar .sidebar-primary { margin-left: -280px; } body.sidebar-sidebar-content .sidebar-primary, body.sidebar-content .sidebar-primary { margin-right: -280px; } body.override .sidebar-secondary { width: 100%; margin: 20px 0 0; float: left; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override #inner { padding-bottom: 10px; } body.override #content-sidebar-wrap { width: 100%; } body.override #content { width: auto; max-width: 100%; padding: 0; } #content .override { padding: 0 10px; } body.content-sidebar-sidebar #content, body.sidebar-content-sidebar #content, body.content-sidebar #content { margin-right: 300px; } body.sidebar-sidebar-content #content, body.sidebar-content #content { margin-left: 300px; } body.full-width-content #content { margin: 0; } body.override .breadcrumb { margin: 0 0 30px; } body.override #sidebar { width: 280px; } body.content-sidebar-sidebar #sidebar, body.sidebar-content-sidebar #sidebar, body.content-sidebar #sidebar { margin-left: -280px; } body.sidebar-sidebar-content #sidebar, body.sidebar-content #sidebar { margin-right: -280px; } body.override #sidebar-alt { width: 100%; margin: 20px 0 0; float: left; }</textarea>
						<?php } ?>
					</p>

					<p style="margin-bottom:0;">
						<?php _e( '3rd trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">.content .override { padding: 10px 20px 0; } body.override .breadcrumb { margin: 0 20px 20px; } .author-box { margin: 0px 20px 40px; } #comments { margin: 0px 20px 15px; } .entry-pings { margin: 0 20px; } #respond { margin: 0 20px 15px; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">#content .override { padding: 10px 20px 0; } body.override .breadcrumb { margin: 0 20px 20px; } .author-box { margin: 0px 20px 40px; } #comments { margin: 0px 20px 15px; } #pings { margin: 0 20px; } #respond { margin: 0 20px 15px; }</textarea>
						<?php } ?>
					</p>

					<p style="margin-bottom:0;">
						<?php _e( '4th trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override .site-inner { padding-bottom: 10px; } body.override .content-sidebar-wrap, body.override .content { width: 100%; } .content { padding: 0; } .content .override { padding: 0 10px; } body.override .breadcrumb { margin: 0 0 30px; } body.override .sidebar-primary, body.override .sidebar-secondary { width: 100%; float: left; } .sidebar-primary { margin: 20px 0 0; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">body.override #inner { padding-bottom: 10px; } body.override #content-sidebar-wrap, body.override #content { width: 100%; } #content { padding: 0; } #content .override { padding: 0 10px; } body.override .breadcrumb { margin: 0 0 30px; } body.override #sidebar, body.override #sidebar-alt { width: 100%; float: left; } #sidebar { margin: 20px 0 0; }</textarea>
						<?php } ?>
					</p>

					<p style="margin-bottom:0;">
						<?php _e( '6th trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">.content .override { padding: 0; } body.override .breadcrumb { margin: 0 0 20px; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:70px; margin:0;">#content .override { padding: 0; } body.override .breadcrumb { margin: 0 0 20px; }</textarea>
						<?php } ?>
					</p>
				</div>
			</div>
			
			<div style="clear:both;"></div>

			<div id="dynamik-display-delayed-header-title-area-width-box" class="bg-box" style="width:364px; float:left; display:none;">
				<p>
					<?php _e( 'Delayed Title Area Width:', 'dynamik' ); ?>
					<input type="text" id="dynamik-delayed-header-title-area-width" class="responsive-option" name="dynamik[delayed_header_title_area_width]" value="<?php echo dynamik_get_responsive( 'delayed_header_title_area_width' ) ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<span id="content-delayed-header-title-area-width-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
				</p>
				
				<div class="tooltip tooltip-400">
					<p>
						<?php _e( 'This is the width of your Header Title/Logo Area when your "Header Media Query Styles" are set to "Delayed", right before it receives a 100% width and is centered in the Header.', 'dynamik' ); ?>
					</p>
				</div>
			</div>

			<div id="dynamik-display-delayed-sidebar-width-box" class="bg-box" style="width:364px; margin-left:0; float:right; display:none;">
				<p>
					<?php _e( 'Delayed Sidebar Width:', 'dynamik' ); ?>
					<input type="text" id="dynamik-delayed-sidebar-width" class="responsive-option" name="dynamik[delayed_sidebar_width]" value="<?php echo dynamik_get_responsive( 'delayed_sidebar_width' ) ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<span id="content-delayed-sidebar-width-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
				</p>
				
				<div class="tooltip tooltip-400">
					<p>
						<?php _e( 'This is the width of your Primary Sidebar when your "Content/Sidebar Media Query Styles" are set to "Delayed", right before it drops below your main content area and receives a 100% width.', 'dynamik' ); ?>
					</p>
				</div>
			</div>
			
			<div style="clear:both;"></div>
			
			<div class="bg-box" style="width:364px; margin-right:0; float:left;">
				<p>
					<?php _e( 'EZ Widget Area Media Query Styles:', 'dynamik' ); ?> <select id="dynamik-ez-media-query-default" class="responsive-option" name="dynamik[ez_media_query_default]" size="1" style="width:130px;">
						<option value="default"<?php if( dynamik_get_responsive( 'ez_media_query_default' ) == 'default' ) echo ' selected="selected"'; ?>><?php _e( 'Default', 'dynamik' ); ?></option>
						<option value="delayed"<?php if( dynamik_get_responsive( 'ez_media_query_default' ) == 'delayed' ) echo ' selected="selected"'; ?>><?php _e( 'Delayed', 'dynamik' ); ?></option>
						<option value="none"<?php if( dynamik_get_responsive( 'ez_media_query_default' ) == 'none' ) echo ' selected="selected"'; ?>><?php _e( 'None', 'dynamik' ); ?></option>
					</select>
					<span id="ez-media-query-default-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
				</p>
				
				<div class="tooltip tooltip-400 tooltip-scroll-400">
					<h5><?php _e( 'EZ "Default" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger point:</strong> 1st', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Default styles:</strong> <strong>1st trigger point</strong> = The EZ Home Container, the EZ Widget Areas and any content wrapped in Column Classes that have two or more side-by-side columns will be set to full width, displaying one on top of the other. This will ensure that as the browser narrows the content still has adequate horizontal space to properly display.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Default Code:', 'dynamik' ); ?></h5>
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<textarea style="width:100%; min-height:70px; margin-bottom:20px;">#home-hook-wrap { padding: 25px 30px 30px 30px; } #ez-home-container-wrap, #ez-home-sidebar-wrap { width: 100%; max-width: 100%; } #ez-home-sidebar-wrap { margin: 20px 0 0; float: left; } .five-sixths, .four-fifths, .four-sixths, .one-fifth, .one-fourth, .one-half, .one-sixth, .one-third, .three-fifths, .three-fourths, .three-sixths, .two-fifths, .two-fourths, .two-sixths, .two-thirds { width: 100%; margin-left: 0; } .first { padding-top: 0 !important; } #ez-home-slider.ez-widget-area, .slider-inside #ez-home-slider.ez-widget-area { padding-bottom: 0; } #home-hook-wrap { padding-bottom: 0; } #ez-home-container-wrap, .ez-home-container-area, #ez-feature-top-container, #ez-fat-footer-container { margin: 0 auto; padding-bottom: 0; } body.override.fat-footer-inside #ez-fat-footer-container-wrap { margin-top: 0; margin-bottom: 20px; } #ez-home-container-wrap .ez-widget-area, #ez-feature-top-container .ez-widget-area, #ez-fat-footer-container .ez-widget-area { width: 100%; padding-bottom: 20px; padding-left: 0 !important; } #ez-home-sidebar-wrap { margin: 0; }</textarea>
					</p>
					
					<h5><?php _e( 'EZ "Delayed" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger points:</strong> 1st & 4th', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Delayed styles:</strong> <strong>1st trigger point</strong> = The EZ Home Container and the EZ Home Sidebar both stretch to full width with the Home Sidebar displaying below the rest of the EZ Homepage Content (this, of course, has no effect if you are not currently using the EZ Home Sidebar). <strong>4th trigger point</strong> = The EZ Widget Areas and any content wrapped in Column Classes that have two or more side-by-side columns will be set to full width, displaying one on top of the other. This will ensure that as the browser narrows the content still has adequate horizontal space to properly display.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Delayed Code:', 'dynamik' ); ?></h5>
					<p style="margin-bottom:0;">
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<textarea style="width:100%; min-height:70px; margin:0;">#home-hook-wrap { padding: 25px 30px 30px 30px; } #ez-home-container-wrap, #ez-home-sidebar-wrap { width: 100%; max-width: 100%; } #ez-home-sidebar-wrap { margin: 20px 0 0; float: left; }</textarea>
					</p>
					
					<p style="margin-bottom:0;">
						<?php _e( '4th trigger point:', 'dynamik' ); ?><br />
						<textarea style="width:100%; min-height:70px; margin:0;">.five-sixths, .four-fifths, .four-sixths, .one-fifth, .one-fourth, .one-half, .one-sixth, .one-third, .three-fifths, .three-fourths, .three-sixths, .two-fifths, .two-fourths, .two-sixths, .two-thirds { width: 100%; margin-left: 0; } .first { padding-top: 0 !important; } #ez-home-slider.ez-widget-area, .slider-inside #ez-home-slider.ez-widget-area { padding-bottom: 0; } #home-hook-wrap { padding-bottom: 0; } #ez-home-container-wrap, .ez-home-container-area, #ez-feature-top-container, #ez-fat-footer-container { margin: 0 auto; padding-bottom: 0; } body.override.fat-footer-inside #ez-fat-footer-container-wrap { margin-top: 0; margin-bottom: 20px; } #ez-home-container-wrap .ez-widget-area, #ez-feature-top-container .ez-widget-area, #ez-fat-footer-container .ez-widget-area { width: 100%; padding-bottom: 20px; padding-left: 0 !important; } #ez-home-sidebar-wrap { margin: 0; }</textarea>
					</p>
				</div>
			</div>
			
			<div class="bg-box" style="width:364px; margin-left:0; float:right;">
				<p>
					<?php _e( 'Footer Media Query Styles:', 'dynamik' ); ?> <select id="dynamik-footer-media-query-default" class="responsive-option" name="dynamik[footer_media_query_default]" size="1" style="width:130px;">
						<option value="default"<?php if( dynamik_get_responsive( 'footer_media_query_default' ) == 'default' ) echo ' selected="selected"'; ?>><?php _e( 'Default', 'dynamik' ); ?></option>
						<option value="none"<?php if( dynamik_get_responsive( 'footer_media_query_default' ) == 'none' ) echo ' selected="selected"'; ?>><?php _e( 'None', 'dynamik' ); ?></option>
					</select>
					<span id="footer-media-query-default-tooltip" class="tooltip-mark tooltip-center-left">[?]</span>
				</p>
				
				<div class="tooltip tooltip-500">
					<h5><?php _e( 'Footer "Default" Info:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '<strong>@media query trigger point:</strong> 1st', 'dynamik' ); ?>
					</p>
					
					<p>
						<?php _e( '<strong>Effect of Default styles:</strong> <strong>1st trigger point</strong> = Footer text will center, accommodating narrower screens.', 'dynamik' ); ?>
					</p>
					
					<h5><?php _e( 'Default Code:', 'dynamik' ); ?></h5>
					<p>
						<?php _e( '1st trigger point:', 'dynamik' ); ?><br />
						<?php if( dynamik_get_settings( 'html_five_active' ) ) { ?>
							<textarea style="width:100%; min-height:50px; margin:0;">.site-footer .creds, .site-footer .gototop { width: 100%; text-align: center; float: none; }</textarea>
						<?php } else { ?>
							<textarea style="width:100%; min-height:50px; margin:0;">#footer .creds, #footer .gototop { width: 100%; text-align: center; float: none; }</textarea>
						<?php } ?>
					</p>
				</div>
			</div>
			
			<div style="clear:both;"></div>

			<div class="bg-box dynamik-display-vertical-menu-options-box" style="width:364px; float:left; display:none;">
				<p>
					<?php _e( 'Vertical Menu Sub-Page "Pre-Text":', 'dynamik' ); ?>
					<input type="text" id="dynamik-vertical-menu-sub-page-pre-text" class="responsive-option" name="dynamik[vertical_menu_sub_page_pre_text]" value="<?php echo dynamik_get_responsive( 'vertical_menu_sub_page_pre_text' ) ?>" style="width:40px;" />
				</p>
			</div>

			<div class="bg-box dynamik-display-vertical-menu-options-box" style="width:364px; margin-left:0; float:right; display:none;">
				<p>
					<?php _e( 'Vertical Menu Sub-Page Text-Align', 'dynamik' ); ?> <select id="dynamik-vertical-menu-sub-page-text-align" class="responsive-option" name="dynamik[vertical_menu_sub_page_text_align]" size="1" style="width:75px;">
						<option value="left"<?php if( dynamik_get_responsive( 'vertical_menu_sub_page_text_align' ) == 'left' ) echo ' selected="selected"'; ?>><?php _e( 'Left', 'dynamik' ); ?></option>
						<option value="center"<?php if( dynamik_get_responsive( 'vertical_menu_sub_page_text_align' ) == 'center' ) echo ' selected="selected"'; ?>><?php _e( 'Center', 'dynamik' ); ?></option>
					</select>
				</p>
			</div>

			<div style="clear:both;"></div>
			
			<div style="display:none;" id="dynamik-display-dropdown-menu-text-box">
			
				<div class="bg-box" style="width:364px; margin-right:0; float:left;">
					<p>
						<?php _e( 'Toggle/Dropdown Menu 1 Text:', 'dynamik' ); ?>
						<input type="text" id="dynamik-dropdown-menu-1-text" class="responsive-option" name="dynamik[dropdown_menu_1_text]" value="<?php echo dynamik_get_responsive( 'dropdown_menu_1_text' ) ?>" style="width:170px;" />
						<span id="dropdown-menu-1-text-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-300">
						<p>
							<?php _e( 'This is the text that displays in your Vertical Toggle, Tablet or Mobile Dropdown menus by default.', 'dynamik' ); ?>
						</p>
						
						<p>
							<?php _e( '<strong>Please Note:</strong> To assign specific Custom Menus when using the Dropdown Menus go to', 'dynamik' ); ?>
							<a href="<?php echo admin_url( 'nav-menus.php' ); ?>"><?php _e( '<b>(Appearance > Menus)</b>', 'dynamik' ); ?></a>
							<?php _e( 'and set them in the "Theme Locations" section.', 'dynamik' ); ?>
						</p>
					</div>
				</div>
				
				<div class="bg-box" style="width:364px; margin-left:0; float:right;">
					<p>
						<?php _e( 'Toggle/Dropdown Menu 2 Text:', 'dynamik' ); ?>
						<input type="text" id="dynamik-dropdown-menu-2-text" class="responsive-option" name="dynamik[dropdown_menu_2_text]" value="<?php echo dynamik_get_responsive( 'dropdown_menu_2_text' ) ?>" style="width:185px;" />
					</p>
				</div>

				<div class="bg-box dynamik-display-hamburger-icon-margin-box" style="width:760px; float:left; display:none;">
					<p style="text-align:center;">
						<?php _e( 'Be sure to assign your Tablet/Mobile Dropdown Menus a Custom Menu in', 'dynamik' ); ?>
						<a href="<?php echo admin_url( 'nav-menus.php' ) ?>?action=locations"><?php _e( 'Appearance > Menus > Theme Locations', 'dynamik' ); ?></a>
					</p>
				</div>

				<div class="bg-box dynamik-display-hamburger-icon-margin-box" style="width:364px; float:left; display:none;">
					<p>
						<?php _e( 'Dropdown Menu 1 Hamburger Icon Margin Top:', 'dynamik' ); ?>
						<input type="text" id="dynamik-hamburger-icon-1-margin-top" class="responsive-option" name="dynamik[hamburger_icon_1_margin_top]" value="<?php echo dynamik_get_responsive( 'hamburger_icon_1_margin_top' ) ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
						<span id="content-hamburger-icon-margin-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
					</p>
					
					<div class="tooltip tooltip-400">
						<p>
							<?php _e( '<strong>Hamburger Icon?</strong> This is the icon found on the right side of the Dropdown Menus with the three rounded horizontal bars representing a "mobile menu". This is a negative margin value because it essentially merges this icon into the actual dropdown menu. And we provide this adjustment because though it should be vertically centered by default it may need some minor tweaking if/when you change the Navbar font size or vertical padding values.', 'dynamik' ); ?>
						</p>
					</div>
				</div>

				<div class="bg-box dynamik-display-hamburger-icon-margin-box" style="width:364px; margin-left:0; float:right; display:none;">
					<p>
						<?php _e( 'Dropdown Menu 2 Hamburger Icon Margin Top:', 'dynamik' ); ?>
						<input type="text" id="dynamik-hamburger-icon-2-margin-top" class="responsive-option" name="dynamik[hamburger_icon_2_margin_top]" value="<?php echo dynamik_get_responsive( 'hamburger_icon_2_margin_top' ) ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					</p>
				</div>
				
				<div style="clear:both;"></div>

				<div style="display:none;" id="dynamik-display-vertical-toggle-menu-styles-box">

					<div class="bg-box" style="width:760px; float:left;">
						<p style="text-align:center;">
							<?php _e( 'Reveal ALL pages (including sub-pages) upon clicking the Vertical Toggle menu', 'dynamik' ); ?> <input type="checkbox" id="dynamik-vertical-toggle-sub-page-reveal" class="responsive-option" name="dynamik[vertical_toggle_sub_page_reveal]" value="1" <?php if( checked( 1, dynamik_get_responsive( 'vertical_toggle_sub_page_reveal' ) ) ); ?> />
							<?php _e( '(leave unchecked for hover-dropdown effect)', 'dynamik' ); ?><br />
							<?php _e( '<strong>Please Note:</strong> If Dynamik Settings > General > "Fancy Dropdowns" are disabled then ALL pages will be revealed regardless of the above setting.', 'dynamik' ); ?>
						</p>
					</div>

					<div class="bg-box" style="width:364px; margin-right:0; float:left;">
						<p>
							<?php _e( '(Primary Navigation) Vertical Toggle Menu Styles:', 'dynamik' ); ?> <span id="vertical-toggle-menu-styles-tooltip" class="tooltip-mark tooltip-center-right">[?]</span>
							<div class="tooltip tooltip-400 tooltip-scroll-400">
								<p>
									<?php _e( 'Customize both the Primary and Secondary Navigation Vertical Toggle Menu styles.', 'dynamik' ); ?>
								</p>

								<p>
									<?php _e( '<strong>Please Note:</strong> The following textareas provide both the default styles for these options as well as example code for a menu button instead of a menu bar.', 'dynamik' ); ?>
								</p>

								<h5><?php _e( 'Primary Vertical Toggle Menu Style Default Code:', 'dynamik' ); ?></h5>
								<p style="margin-bottom:0;">
									<textarea style="width:100%; min-height:70px; margin-bottom:20px;">.responsive-primary-menu-container {
	background: #333333;
	border-bottom: 2px solid #DDDDDD;
	width: 100%;
	padding: 12px 0;
	overflow: hidden;
	cursor: pointer;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	display: none;
}
.responsive-primary-menu-container h3 {
	padding-left: 15px;
	color: #AAAAAA;
	font-size: 16px; font-size: 1.6rem;
	font-family: \'PT Sans\', sans-serif;
	font-weight: normal;
	float: left;
}
.responsive-primary-menu-container .responsive-menu-icon {
	padding: 5px 15px 0 0;
	float: right;
}
.responsive-primary-menu-container .responsive-icon-bar {
	display: block;
	width: 18px;
	height: 3px;
	background: #AAAAAA;
	margin: 1px 0;
	float: right;
	clear: both;
	-webkit-border-radius: 1px;
	border-radius: 1px;
}</textarea>
								</p>

								<h5><?php _e( 'Secondary Vertical Toggle Menu Style Default Code:', 'dynamik' ); ?></h5>
								<p style="margin-bottom:0;">
									<textarea style="width:100%; min-height:70px; margin-bottom:20px;">.responsive-secondary-menu-container {
	background: #F5F5F5;
	border-bottom: 2px solid #DDDDDD;
	width: 100%;
	padding: 12px 0;
	overflow: hidden;
	cursor: pointer;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	display: none;
}
.responsive-secondary-menu-container h3 {
	padding-left: 15px;
	color: #888888;
	font-size: 16px; font-size: 1.6rem;
	font-family: \'PT Sans\', sans-serif;
	font-weight: normal;
	float: left;
}
.responsive-secondary-menu-container .responsive-menu-icon {
	padding: 5px 15px 0 0;
	float: right;
}
.responsive-secondary-menu-container .responsive-icon-bar {
	display: block;
	width: 18px;
	height: 3px;
	background: #888888;
	margin: 1px 0;
	float: right;
	clear: both;
	-webkit-border-radius: 1px;
	border-radius: 1px;
}</textarea>
								</p>

								<h5><?php _e( 'Primary/Secondary Vertical Toggle Button Style Code:', 'dynamik' ); ?></h5>
								<p style="margin-bottom:0;">
									<textarea style="width:100%; min-height:70px;">.responsive-primary-menu-container,
.responsive-secondary-menu-container {
	display: none;
}
.mobile-primary-toggle,
.mobile-secondary-toggle {
	width: 70px;
	margin: 0 auto;
	padding: 6px 10px;
	font-size: 12px;
	line-height: 1.428571429;
	font-weight: normal;
	color: #777777;
	text-align: center;
	background-color: #E8E8E8;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #F5F5F5, #E8E8E8);
	background-image: -ms-linear-gradient(top, #F5F5F5, #E8E8E8);
	background-image: -webkit-linear-gradient(top, #F5F5F5, #E8E8E8);
	background-image: -o-linear-gradient(top, #F5F5F5, #E8E8E8);
	background-image: linear-gradient(top, #F5F5F5, #E8E8E8);
	border: 1px solid #d2d2d2;
	border-radius: 3px;
	box-shadow: 0 1px 2px rgba(64, 64, 64, 0.1);
	cursor: pointer;
	display: none;
}
.mobile-primary-toggle:hover,
.mobile-secondary-toggle:hover {
	color: #555555;
	background-color: #EBEBEB;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #F9F9F9, #EBEBEB);
	background-image: -ms-linear-gradient(top, #F9F9F9, #EBEBEB);
	background-image: -webkit-linear-gradient(top, #F9F9F9, #EBEBEB);
	background-image: -o-linear-gradient(top, #F9F9F9, #EBEBEB);
	background-image: linear-gradient(top, #F9F9F9, #EBEBEB);
}
.mobile-primary-toggle:active,
.mobile-secondary-toggle:active {
	color: #757575;
	background-color: #E1E1E1;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #EBEBEB, #E1E1E1);
	background-image: -ms-linear-gradient(top, #EBEBEB, #E1E1E1);
	background-image: -webkit-linear-gradient(top, #EBEBEB, #E1E1E1);
	background-image: -o-linear-gradient(top, #EBEBEB, #E1E1E1);
	background-image: linear-gradient(top, #EBEBEB, #E1E1E1);
	box-shadow: inset 0 0 8px 2px #C6C6C6, 0 1px 0 0 #F5F5F5;
	border: none;
}</textarea>
								</p>
							</div>
							<textarea id="dynamik-vertical-toggle-menu-1-styles" class="responsive-option dynamik-tabby-textarea" name="dynamik[vertical_toggle_button_styles]" style="width:100%; height:150px; margin-top:-10px;"><?php if( dynamik_get_responsive( 'vertical_toggle_button_styles' ) ) echo dynamik_get_responsive( 'vertical_toggle_button_styles' ); ?></textarea>
						</p>
					</div>

					<div class="bg-box" style="width:364px; margin-left:0; float:right;">
						<p>
							<?php _e( '(Secondary Navigation) Vertical Toggle Menu Styles:', 'dynamik' ); ?>
							<textarea id="dynamik-vertical-toggle-menu-2-styles" class="responsive-option dynamik-tabby-textarea" name="dynamik[vertical_toggle_button_subnav_styles]" style="width:100%; height:150px;"><?php if( dynamik_get_responsive( 'vertical_toggle_button_subnav_styles' ) ) echo dynamik_get_responsive( 'vertical_toggle_button_subnav_styles' ); ?></textarea>
						</p>
					</div>

				</div>
				
				<div style="clear:both;"></div>
			
			</div>
		</div>
	</div>
	
	<div class="dynamik-structure-settings-hide">
	
	<div id="responsive-nav">
		<span id="query-1" class="responsive-icon responsive-icon-first responsive-hover-first"></span>
		<span id="query-2" class="responsive-icon"></span>
		<span id="query-3" class="responsive-icon"></span>
		<span id="query-4" class="responsive-icon"></span>
		<span id="query-5" class="responsive-icon"></span>
		<span id="query-6" class="responsive-icon"></span>
	</div>
	
	<div id="query-1-box" class="query-box-all">
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Tablet Landscape Cascading @media query <strong>(1st)</strong>', 'dynamik' ); ?> <span id="media-query-large-cascading-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		<div class="tooltip tooltip-400">
			<p>
				<?php _e( 'By default the max-width value below is based on your Dynamik Design > Widths > "Wrap Width" values to help ensure your site responds at the appropriate time. However since these @media query values are customizable (to provide you with the greatest flexibility possible) it is up to you to tweak such values if need be whenever you change your Dynamik Design > Widths, properly matching up these max-widths with the new Wrap Width values.', 'dynamik' ); ?>
			</p>
		</div>
		<div class="dynamik-media-query-box">
			<div class="bg-box">
				<p>
					<strong><code>@media only screen and (max-width:</code><input type="text" id="dynamik-media-query-large-cascading-width" class="responsive-option" name="dynamik[media_query_large_cascading_width]" value="<?php echo dynamik_get_responsive( 'media_query_large_cascading_width' ); ?>" style="width:50px;" /><code>px) { }</code></strong>
					<textarea id="dynamik-media-query-large-cascading-content" class="responsive-option dynamik-tabby-textarea" name="dynamik[media_query_large_cascading_content]" style="width:100%; height:250px;"><?php if( dynamik_get_responsive( 'media_query_large_cascading_content' ) ) echo dynamik_get_responsive( 'media_query_large_cascading_content' ); ?></textarea><br />
				</p>
			</div>
		</div>
	</div>
	
	<div id="query-2-box" class="query-box-all">
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Tablet Landscape Specific @media query <strong>(2nd)</strong>', 'dynamik' ); ?></h3>
		<div class="dynamik-media-query-box">
			<div class="bg-box">
				<p>
					<strong><code>@media only screen and (min-width:</code><input type="text" id="dynamik-media-query-large-min-width" class="responsive-option" name="dynamik[dynamik_media_query_large_min_width]" value="<?php echo dynamik_get_responsive( 'dynamik_media_query_large_min_width' ); ?>" style="width:50px;" /><code>px) and (max-width:</code><input type="text" id="dynamik-media-query-large-max-width" class="responsive-option" name="dynamik[dynamik_media_query_large_max_width]" value="<?php echo dynamik_get_responsive( 'dynamik_media_query_large_max_width' ); ?>" style="width:50px;" /><code>px) { }</code></strong><br />
					<textarea id="dynamik-media-query-large-content" class="responsive-option dynamik-tabby-textarea" name="dynamik[media_query_large_content]" style="width:100%; height:250px;"><?php echo dynamik_get_responsive( 'media_query_large_content' ); ?></textarea><br />
				</p>
			</div>
		</div>
	</div>
	
	<div id="query-3-box" class="query-box-all">
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Tablet Portrait to Tablet Landscape Specific @media query <strong>(3rd)</strong>', 'dynamik' ); ?></h3>
		<div class="dynamik-media-query-box">
			<div class="bg-box">
				<p>
					<strong><code>@media only screen and (min-width:</code><input type="text" id="dynamik-media-query-medium-large-min-width" class="responsive-option" name="dynamik[dynamik_media_query_medium_large_min_width]" value="<?php echo dynamik_get_responsive( 'dynamik_media_query_medium_large_min_width' ); ?>" style="width:50px;" /><code>px) and (max-width:</code><input type="text" id="dynamik-media-query-medium-large-max-width" class="responsive-option" name="dynamik[dynamik_media_query_medium_large_max_width]" value="<?php echo dynamik_get_responsive( 'dynamik_media_query_medium_large_max_width' ); ?>" style="width:50px;" /><code>px) { }</code></strong><br />
					<textarea id="dynamik-media-query-medium-large-content" class="responsive-option dynamik-tabby-textarea" name="dynamik[media_query_medium_large_content]" style="width:100%; height:250px;"><?php echo dynamik_get_responsive( 'media_query_medium_large_content' ); ?></textarea><br />
				</p>
			</div>
		</div>
	</div>
	
	<div id="query-4-box" class="query-box-all">
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Tablet Portrait Cascading @media query <strong>(4th)</strong>', 'dynamik' ); ?></h3>
		<div class="dynamik-media-query-box">
			<div class="bg-box">
				<p>
					<strong><code>@media only screen and (max-width:</code><input type="text" id="dynamik-media-query-medium-large-cascading-width" class="responsive-option" name="dynamik[media_query_medium_cascading_width]" value="<?php echo dynamik_get_responsive( 'media_query_medium_cascading_width' ); ?>" style="width:50px;" /><code>px) { }</code></strong>
					<textarea id="dynamik-media-query-medium-cascading-content" class="responsive-option dynamik-tabby-textarea" name="dynamik[media_query_medium_cascading_content]" style="width:100%; height:250px;"><?php if( dynamik_get_responsive( 'media_query_medium_cascading_content' ) ) echo dynamik_get_responsive( 'media_query_medium_cascading_content' ); ?></textarea><br />
				</p>
			</div>
		</div>
	</div>
	
	<div id="query-5-box" class="query-box-all">
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Mobile Landscape to Tablet Portrait Specific @media query <strong>(5th)</strong>', 'dynamik' ); ?></h3>
		<div class="dynamik-media-query-box">
			<div class="bg-box">
				<p>
					<strong><code>@media only screen and (min-width:</code><input type="text" id="dynamik-media-query-medium-min-width" class="responsive-option" name="dynamik[dynamik_media_query_medium_min_width]" value="<?php echo dynamik_get_responsive( 'dynamik_media_query_medium_min_width' ); ?>" style="width:50px;" /><code>px) and (max-width:</code><input type="text" id="dynamik-media-query-medium-max-width" class="responsive-option" name="dynamik[dynamik_media_query_medium_max_width]" value="<?php echo dynamik_get_responsive( 'dynamik_media_query_medium_max_width' ); ?>" style="width:50px;" /><code>px) { }</code></strong><br />
					<textarea id="dynamik-media-query-medium-content" class="responsive-option dynamik-tabby-textarea" name="dynamik[media_query_medium_content]" style="width:100%; height:250px;"><?php echo dynamik_get_responsive( 'media_query_medium_content' ); ?></textarea><br />
				</p>
			</div>
		</div>
	</div>
	
	<div id="query-6-box" class="query-box-all">
		<h3 class="dynamik-wide-option-heading"><?php _e( 'Mobile Portrait Specific @media query <strong>(6th)</strong>', 'dynamik' ); ?></h3>
		<div class="dynamik-media-query-box">
			<div class="bg-box">
				<p>
					<strong><code>@media only screen and (max-width:</code><input type="text" id="dynamik-media-query-small-width" class="responsive-option" name="dynamik[media_query_small_width]" value="<?php echo dynamik_get_responsive( 'media_query_small_width' ); ?>" style="width:50px;" /><code>px) { }</code></strong>
					<textarea id="dynamik-media-query-small-content" class="responsive-option dynamik-tabby-textarea" name="dynamik[media_query_small_content]" style="width:100%; height:250px;"><?php echo dynamik_get_responsive( 'media_query_small_content' ); ?></textarea><br />
				</p>
			</div>
		</div>
	</div>
	
	</div><!-- End .dynamik-structure-settings-hide -->
	
	</form>
</div>