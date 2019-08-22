<div class="wrap">

	<h2>Setting share theme</h2>

	<form method="post" action="shares.php">

	    <?php settings_fields( 'share-menu-settings-share' ); ?>

	    <?php do_settings_sections( 'share-menu-settings-share' ); ?>

	    <?php if ( isset( $_POST['share'] ) ) {

		    $foo = (string) $_POST['share'];

		    // apply more sanitizations here if needed

		} ?>

	    <table class="form-table">

	    	<tr><td>--share share---</td></tr>

	        <tr valign="top">

	        <th scope="row">share</th>

	        <td><input class="opt form-control" type="text" name="share" value="<?php echo esc_attr( get_share('share') ); ?>" /></td>

	        </tr>
	      
	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>