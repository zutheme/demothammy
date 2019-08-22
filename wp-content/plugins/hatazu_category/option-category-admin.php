<div class="wrap">

	<h2>Setting option latest</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'option-latest-settings' ); ?>

	    <?php do_settings_sections( 'option-latest-settings' ); ?>

	    <?php if ( isset( $_POST['latest-option'] ) ) {

		    $foo = (string) $_POST['latest-option'];

		    // apply more sanitizations here if needed

		} ?>

	    <table class="form-table">

	    	<tr><td>--option latest---</td></tr>

	        <tr valign="top">

	        <th scope="row">option latest</th>

	        <td><input class="opt form-control" type="text" name="latest-option" value="<?php echo esc_attr( get_option('latest-option') ); ?>" /></td>

	        </tr>
	         
	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>