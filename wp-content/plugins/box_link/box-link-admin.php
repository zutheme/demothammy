<div class="wrap">

	<h2>Setting option links</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'box-link-settings-group' ); ?>

	    <?php do_settings_sections( 'box-link-settings-group' ); ?>


	    <table class="form-table">

	        <tr valign="top">

	        <th scope="row">facebook</th>

	        <td><input type="text" name="box-facebook" value="<?php echo esc_attr( get_option('box-facebook') ); ?>" /></td>

	        </tr>

	        <tr valign="top">

	        <th scope="row">Twiter</th>

	        <td><input type="text" name="box-twiter" value="<?php echo esc_attr( get_option('box-twiter') ); ?>" /></td>

	        </tr>

	        <tr valign="top">

	        <th scope="row">Youtube</th>

	        <td><input type="text" name="box-youtube" value="<?php echo esc_attr( get_option('box-youtube') ); ?>" /></td>

	        </tr>

	        <tr valign="top">

	        <th scope="row">Điện thoại</th>

	        <td><input type="text" name="box-phone" value="<?php echo esc_attr( get_option('box-phone') ); ?>" /></td>

	        </tr>

	         

	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>