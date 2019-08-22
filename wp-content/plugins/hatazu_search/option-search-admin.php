<div class="wrap">

	<h2>Setting option search</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'option-search-settings' ); ?>

	    <?php do_settings_sections( 'option-search-settings' ); ?>

	    <?php if ( isset( $_POST['search-option'] ) ) {

		    $foo = (string) $_POST['search-option'];

		    // apply more sanitizations here if needed

		} ?>

	    <table class="form-table">

	    	<tr><td>--option search---</td></tr>

	        <tr valign="top">

	        <th scope="row">option search</th>

	        <td><input class="opt form-control" type="text" name="search-option" value="<?php echo esc_attr( get_option('search-option') ); ?>" /></td>

	        </tr>
	         
	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>