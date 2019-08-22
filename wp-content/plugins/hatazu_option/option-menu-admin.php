<div class="wrap">

	<h2>Setting option theme</h2>

	<form method="post" action="options.php">

	    <?php settings_fields( 'option-menu-settings-slider' ); ?>

	    <?php do_settings_sections( 'option-menu-settings-slider' ); ?>

	    <?php if ( isset( $_POST['slider-1'] ) ) {

		    $foo = (string) $_POST['slider-1'];

		    // apply more sanitizations here if needed

		} ?>

	    <table class="form-table">

	    	<tr><td>--option slider---</td></tr>

	        <tr valign="top">

	        <th scope="row">slider-1</th>

	        <td><input class="opt form-control" type="text" name="slider-1" value="<?php echo esc_attr( get_option('slider-1') ); ?>" /></td>

	        </tr>
	         <tr valign="top">

	        <th scope="row">slider-2</th>

	        <td><input type="text" class="opt form-control" name="slider-2" value="<?php echo esc_attr( get_option('slider-2') ); ?>" /></td>

	        </tr>

	        <tr valign="top">

	        <th scope="row">slider-3</th>

	        <td><input class="opt form-control" name="slider-3" type="text" value="<?php echo esc_attr( get_option('slider-3') ); ?>" /></td>

	        </tr>
	        <tr valign="top">

	        <th scope="row">slider-4</th>

	        <td><input class="opt form-control" name="slider-4" value="<?php echo esc_attr( get_option('slider-4') ); ?>"/></td>
	        </tr>
	        <tr valign="top">

	        <th scope="row">banner sidebar</th>

	        <td><input class="opt form-control" name="banner-sidebar" value="<?php echo esc_attr( get_option('banner-sidebar') ); ?>"/></td>
	        </tr>
	        <th scope="row">Link</th>

	        <td><input class="opt form-control" name="banner-link" value="<?php echo esc_attr( get_option('banner-link') ); ?>"/></td>
	        </tr>
	    </table>

	    <?php submit_button(); ?>

	</form>

	</div>