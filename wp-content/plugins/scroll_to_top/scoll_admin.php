<div class="wrap">
	<h2>Setting option links</h2>
	<form class="form-popup" method="post" action="options.php">
	    <?php settings_fields( 'scroll-settings-group' ); ?>
	    <?php do_settings_sections( 'scroll-settings-group' ); ?>
	    <table class="form-table-popup" style="width: 100%">
	        <tr>
	        <td>
	        	<p>
	        		<label for="images_popup" class="prfx-row-title"><?php _e( 'option', 'prfx-textdomain' )?></label>
	        		<input type="text" name="option" value="<?php echo esc_attr( get_option('option') ); ?>" /></td>
	        	</p>
	        </tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
	</div>