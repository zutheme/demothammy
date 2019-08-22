<div class="wrap">
	<h2>Setting option </h2>
	<form method="post" action="options.php">
	    <?php settings_fields( 'popup-consultant-settings-group' ); ?>
	    <?php do_settings_sections( 'popup-consultant-settings-group' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">option</th>
	        <td><input type="text" name="consultant" value="<?php echo esc_attr( get_option('consultant') ); ?>" /></td>
	        </tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
</div>