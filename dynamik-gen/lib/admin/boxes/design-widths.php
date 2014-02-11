<?php
/**
 * Builds the Dynamik Widths admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-widths-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">		
		<h3><?php _e( 'Layout Widths', 'dynamik' ); ?> <span id="wrap-width-calc-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		
		<div class="tooltip tooltip-400">
			<h5><?php _e( 'Wrap Width:', 'dynamik' ); ?></h5>
			
			<p>
				<?php _e( 'This "Wrap Width" value is calculated by adding together the Content Width, Sidebar Widths (if any) and the following horizontal border/padding widths:', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( '- Dynamik Design > Wrap > Inner Border > Thickness x 2 (only included if "Type" is set to either "Left/Right" or "Full")', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( '- Dynamik Design > Wrap > Inner Padding > Left/Right x 2', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( '- Dynamik Design > Wrap > Inner Padding > Sidebar Separation x The Number of Sidebars In The Layout', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( '- Dynamik Design > Content > Content Wrap Padding > Right + Left', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( 'So, for example, if you had a Sidebar-Content-Sidebar Layout with a Content Width of 400px, a Primary Sidebar Width of 280px, a Secondary Sidebar Width of 150px, a Full Inner Border value of 5px, a Left/Right Inner Padding value of 20px, a Sidebar Separation value of 20px and a Content Wrap Left/Right padding of 20px each the Wrap Width would be calculated as follows:', 'dynamik' ); ?>
			</p>
			
			<p>
				<?php _e( '400 + 280 + 150 + (5 x 2) + (20 x 2) + (20 x 2) + (20 x 2) = 960', 'dynamik' ); ?>
			</p>
		</div>
		
		<div id="dynamik-width-option-wrap-dbl-rt-sb" class="dynamik-width-option-wrap">
			<div class="dynamik-design-option-desc">
				<p><?php _e( 'Content-Sidebar-Sidebar Layout', 'dynamik' ); ?></p>
			</div>
			
			<div class="dynamik-design-option">
				<p>
					<?php _e( 'Content', 'dynamik' ); ?>
					<input type="text" id="dynamik-content-width-dbl-rt-sb" class="dynamik-width-option" name="dynamik[cc_width_dbl_rt_sb]" value="<?php echo dynamik_design_options_defaults( true, 'cc_width_dbl_rt_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Prim. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb1-width-dbl-rt-sb" class="dynamik-width-option" name="dynamik[sb1_width_dbl_rt_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb1_width_dbl_rt_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Sec. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb2-width-dbl-rt-sb" class="dynamik-width-option" name="dynamik[sb2_width_dbl_rt_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb2_width_dbl_rt_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Wrap Width: ', 'dynamik' ); ?>
					<strong><span id="calculated-width-dbl-rt-sb" <?php if( genesis_site_layout() == 'content-sidebar-sidebar' ) { echo 'class="default-layout-wrap-width"'; } ?>>960</span></strong>px
				</p>
			</div>
		</div>
		
		<div id="dynamik-width-option-wrap-dbl-lft-sb" class="dynamik-width-option-wrap">
			<div class="dynamik-design-option-desc">
				<p><?php _e( 'Sidebar-Sidebar-Content Layout', 'dynamik' ); ?></p>
			</div>
			
			<div class="dynamik-design-option">
				<p>
					<?php _e( 'Content', 'dynamik' ); ?>
					<input type="text" id="dynamik-content-width-dbl-lft-sb" class="dynamik-width-option" name="dynamik[cc_width_dbl_lft_sb]" value="<?php echo dynamik_design_options_defaults( true, 'cc_width_dbl_lft_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Prim. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb1-width-dbl-lft-sb" class="dynamik-width-option" name="dynamik[sb1_width_dbl_lft_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb1_width_dbl_lft_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Sec. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb2-width-dbl-lft-sb" class="dynamik-width-option" name="dynamik[sb2_width_dbl_lft_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb2_width_dbl_lft_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Wrap Width: ', 'dynamik' ); ?>
					<strong><span id="calculated-width-dbl-lft-sb" <?php if( genesis_site_layout() == 'sidebar-sidebar-content' ) { echo 'class="default-layout-wrap-width"'; } ?>>960</span></strong>px
				</p>
			</div>
		</div>
		
		<div id="dynamik-width-option-wrap-dbl-sb" class="dynamik-width-option-wrap">
			<div class="dynamik-design-option-desc">
				<p><?php _e( 'Sidebar-Content-Sidebar Layout', 'dynamik' ); ?></p>
			</div>
			
			<div class="dynamik-design-option">
				<p>
					<?php _e( 'Content', 'dynamik' ); ?>
					<input type="text" id="dynamik-content-width-dbl-sb" class="dynamik-width-option" name="dynamik[cc_width_dbl_sb]" value="<?php echo dynamik_design_options_defaults( true, 'cc_width_dbl_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Prim. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb1-width-dbl-sb" class="dynamik-width-option" name="dynamik[sb1_width_dbl_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb1_width_dbl_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Sec. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb2-width-dbl-sb" class="dynamik-width-option" name="dynamik[sb2_width_dbl_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb2_width_dbl_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Wrap Width: ', 'dynamik' ); ?>
					<strong><span id="calculated-width-dbl-sb" <?php if( genesis_site_layout() == 'sidebar-content-sidebar' ) { echo 'class="default-layout-wrap-width"'; } ?>>960</span></strong>px
				</p>
			</div>
		</div>
		
		<div id="dynamik-width-option-wrap-rt-sb" class="dynamik-width-option-wrap">
			<div class="dynamik-design-option-desc">
				<p><?php _e( 'Content-Sidebar Layout', 'dynamik' ); ?></p>
			</div>
			
			<div class="dynamik-design-option">
				<p>
					<?php _e( 'Content', 'dynamik' ); ?>
					<input type="text" id="dynamik-content-width-rt-sb" class="dynamik-width-option" name="dynamik[cc_width_rt_sb]" value="<?php echo dynamik_design_options_defaults( true, 'cc_width_rt_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Prim. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb1-width-rt-sb" class="dynamik-width-option" name="dynamik[sb1_width_rt_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb1_width_rt_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Wrap Width: ', 'dynamik' ); ?>
					<strong><span id="calculated-width-rt-sb" <?php if( genesis_site_layout() == 'content-sidebar' ) { echo 'class="default-layout-wrap-width"'; } ?>>960</span></strong>px
				</p>
			</div>
		</div>
		
		<div id="dynamik-width-option-wrap-lft-sb" class="dynamik-width-option-wrap">
			<div class="dynamik-design-option-desc">
				<p><?php _e( 'Sidebar-Content Layout', 'dynamik' ); ?></p>
			</div>
			
			<div class="dynamik-design-option">
				<p>
					<?php _e( 'Content', 'dynamik' ); ?>
					<input type="text" id="dynamik-content-width-lft-sb" class="dynamik-width-option" name="dynamik[cc_width_lft_sb]" value="<?php echo dynamik_design_options_defaults( true, 'cc_width_lft_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Prim. Sidebar', 'dynamik' ); ?>
					<input type="text" id="dynamik-sb1-width-lft-sb" class="dynamik-width-option" name="dynamik[sb1_width_lft_sb]" value="<?php echo dynamik_design_options_defaults( true, 'sb1_width_lft_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Wrap Width: ', 'dynamik' ); ?>
					<strong><span id="calculated-width-lft-sb" <?php if( genesis_site_layout() == 'sidebar-content' ) { echo 'class="default-layout-wrap-width"'; } ?>>960</span></strong>px
				</p>
			</div>
		</div>
		
		<div id="dynamik-width-option-wrap-no-sb" class="dynamik-width-option-wrap">
			<div class="dynamik-design-option-desc">
				<p><?php _e( 'Full Width Content Layout', 'dynamik' ); ?></p>
			</div>
			
			<div class="dynamik-design-option">
				<p>
					<?php _e( 'Content', 'dynamik' ); ?>
					<input type="text" id="dynamik-content-width-no-sb" class="dynamik-width-option" name="dynamik[cc_width_no_sb]" value="<?php echo dynamik_design_options_defaults( true, 'cc_width_no_sb' ); ?>" style="width:40px;" /><code class="dynamik-px-unit">px</code>
					<?php _e( 'Wrap Width: ', 'dynamik' ); ?>
					<strong><span id="calculated-width-no-sb" <?php if( genesis_site_layout() == 'full-width-content' ) { echo 'class="default-layout-wrap-width"'; } ?>>960</span></strong>px
				</p>
			</div>
		</div>
	</div>
</div>