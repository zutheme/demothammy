<div class="wrap">
	<h2>Setting option links</h2>
	<form method="post" action="options.php">
	    <?php settings_fields( 'quick-link-settings-group' ); ?>
	    <?php do_settings_sections( 'quick-link-settings-group' ); ?>
	    <?php if ( isset( $_POST['cost'] ) ) {
		    $foo = (string) $_POST['cost'];
		    // apply more sanitizations here if needed
		} ?>
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">Bảng giá</th>
	        <td><input type="text" name="cost" value="<?php echo esc_attr( get_option('cost') ); ?>" /></td>
	        </tr>
	        <tr valign="top">
	        <th scope="row">Giới thiệu</th>
	        <td><input type="text" name="about" value="<?php echo esc_attr( get_option('about') ); ?>" /></td>
	        </tr>
	        <tr valign="top">
	        <th scope="row">Hoạt động</th>
	        <td><input type="text" name="activity" value="<?php echo esc_attr( get_option('activity') ); ?>" /></td>
	        </tr>
	        <tr valign="top">
	        <th scope="row">Tư vấn</th>
	        <td><input type="text" name="consultant" value="<?php echo esc_attr( get_option('consultant') ); ?>" /></td>
	        </tr>
	          
	    </table>
	    <?php submit_button(); ?>
	</form>
	</div>