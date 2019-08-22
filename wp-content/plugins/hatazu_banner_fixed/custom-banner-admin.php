<div class="wrap-banner">
	<h2>Setting option banner</h2>
	<form method="post" action="options.php">
	    <?php
	     settings_fields( 'custom-banner-settings' ); 
    	 do_settings_sections( 'custom-banner-settings' ); 
	     ?>
	    <table class="form-table">
	    	<tr><td>--option banner---</td></tr>
	    	<tr><td>
	    		<p>
			        <label for="banner-image" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="banner-image form-control" type="text" name="banner-image" value="<?php echo esc_attr( get_option('banner-image') ); ?>" />
			        <input type="button" name="banner-image-button" class="button banner-image-button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    	</td></tr>
	  		<tr><td>
	  			<p>
	  			<label for="banner-image" class="prfx-row-title"><?php _e( 'Link banner', 'prfx-textdomain' )?></label>
	  			<input class="banner-image form-control" type="text" name="banner-link" value="<?php echo esc_attr( get_option('banner-link') ); ?>" />
	  			</p>
	  		</td></tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
	</div>