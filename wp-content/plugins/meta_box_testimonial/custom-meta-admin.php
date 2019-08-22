<div class="wrap">
	<h2>Comment setting</h2>
	<form method="post" action="options.php">
	    <?php settings_fields( 'custom-meta-settings-group' ); ?>
	    <?php do_settings_sections( 'custom-meta-settings-group' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">meta Name</th>
	        <td><input type="text" name="meta_name" value="<?php echo esc_attr( get_option('meta_name') ); ?>" /></td>
	        </tr>
	         
	        <tr valign="top">
	        <th scope="row">meta Phone Number</th>
	        <td><input type="text" name="meta_phone" value="<?php echo esc_attr( get_option('meta_phone') ); ?>" /></td>
	        </tr>
	        
	        <tr valign="top">
	        <th scope="row">meta Email</th>
	        <td><input type="text" name="meta_email" value="<?php echo esc_attr( get_option('meta_email') ); ?>" /></td>
	        </tr>
	    </table>
	    
	    <?php submit_button(); ?>

	</form>
	</div>