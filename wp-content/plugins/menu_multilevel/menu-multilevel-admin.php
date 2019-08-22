<div class="wrap">

	<h2>Setting option latest</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'option-menu_multilevel-settings' ); ?>

	    <?php do_settings_sections( 'option-menu_multilevel-settings' ); ?>

	    <?php if ( isset( $_POST['menu_multilevel-option'] ) ) {

		    $foo = (string) $_POST['menu_multilevel-option'];

		    // apply more sanitizations here if needed

		} ?>

	    <table class="form-table">

	    	<tr><td>--option latest---</td></tr>

	        <tr valign="top">

	        <th scope="row">option latest</th>

	        <td><input class="opt form-control" type="text" name="menu_multilevel-option" value="<?php echo esc_attr( get_option('menu_multilevel-option') ); ?>" /></td>

	        </tr>
	         
	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>