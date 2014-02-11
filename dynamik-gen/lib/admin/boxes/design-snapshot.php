<?php
/**
 * Builds the Dynamik Design Snapshot admin content.
 *
 * @package Dynamik
 */
?>

<div id="dynamik-design-options-nav-snapshot-box" class="dynamik-optionbox-outer-1col dynamik-all-options">
	<div class="dynamik-optionbox-inner-1col">
		<h3><?php _e( 'Design Snapshot', 'dynamik' ); ?></h3>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Update Dynamik Design Snapshot', 'dynamik' ); ?></p>
		</div>
		
		<form method="post">
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<input type="submit" name="clicked_button" value="<?php _e( 'Update Snapshot', 'dynamik' ); ?>" onClick='return confirm("<?php _e( 'Note: This will overwrite your previous Snapshot state with your current Design settings. Click OK to proceed?', 'dynamik' ); ?>")' class="button-highlighted"/>
				<input type="hidden" name="action" value="dynamik_design_snapshot_update">
				<?php _e( 'Current Snapshot Timestamp: ', 'dynamik' ); echo $dynamik_design_snapshot_options['timestamp']; ?>
				<span class="dynamik-custom-fonts-button-wrap"><span id="show-dynamik-snapshot-notes" class="dynamik-custom-fonts-button button">Snapshot Notes</span></span>
				<div style="display:none;" id="show-dynamik-snapshot-notes-box" class="dynamik-custom-fonts-box">
				<textarea id="dynamik-design-snapshot-notes" name="dynamik[dynamik_snapshot_notes]" style="width:100%; margin-bottom:-3px;" rows="10"><?php if( $dynamik_design_snapshot_options['dynamik_snapshot_options']['dynamik_snapshot_notes'] ) echo stripslashes( $dynamik_design_snapshot_options['dynamik_snapshot_options']['dynamik_snapshot_notes'] ); ?></textarea>
				</div>
			</p>
		</div>
		</form>
		
		<div class="dynamik-design-option-desc">
			<p><?php _e( 'Restore From Dynamik Design Snapshot', 'dynamik' ); ?></p>
		</div>
		
		<form method="post">
		<div class="dynamik-design-option">
			<p class="bg-box-design">
				<input type="submit" name="clicked_button" value="<?php _e( 'Restore From Snapshot', 'dynamik' ); ?>" onClick='return confirm("<?php _e( 'Are you sure your want to restore your Dynamik Design settings to your current Snapshot state?', 'dynamik' ); ?>")' class="button-highlighted"/>
				<input type="hidden" name="action" value="dynamik_design_snapshot_restore">
			</p>
		</div>
		</form>
	</div>
</div>