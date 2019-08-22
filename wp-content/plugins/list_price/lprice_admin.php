<div class="wrap">
	<h2>Setting option links</h2>
	<form class="form-lprice" method="post" action="options.php">
	    <?php settings_fields( 'lprice-settings-group' ); ?>
	    <?php do_settings_sections( 'lprice-settings-group' ); ?>
	    <table class="form-table-lprice" style="width: 100%">
	        <tr>
	        <td>
	        	<p>
	        		<label for="images_lprice" class="prfx-row-title"><?php _e( 'option', 'prfx-textdomain' )?></label>
	        		<input type="text" name="option" value="<?php echo esc_attr( get_option('option') ); ?>" /></td>
	        	</p>
	        </tr>
	     	<tr><td>
	    		<p>
			        <label for="images_lprice" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_lprice form-control int-pop1" type="text" name="images_lprice1" value="<?php echo esc_attr( get_option('images_lprice1') ); ?>" />
			        <input type="button" name="images_lprice-button" class="button images_lprice-button b1" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_lprice" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_lprice1 form-control" type="text" name="link_lprice1" value="<?php echo esc_attr( get_option('link_lprice1') ); ?>" /></p>
	    		
	    		<p><img class="img_set img1" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_lprice1') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_lprice" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_lprice form-control int-pop2" type="text" name="images_lprice2" value="<?php echo esc_attr( get_option('images_lprice2') ); ?>" />
			        <input type="button" name="images_lprice-button" class="button images_lprice-button b2" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_lprice" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_lprice2 form-control" type="text" name="link_lprice2" value="<?php echo esc_attr( get_option('link_lprice2') ); ?>" /></p>
	    		
	    		<p><img class="img_set img2" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_lprice2') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_lprice" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_lprice form-control int-pop3" type="text" name="images_lprice3" value="<?php echo esc_attr( get_option('images_lprice3') ); ?>" />
			        <input type="button" name="images_lprice-button" class="button images_lprice-button b3" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_lprice" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_lprice3 form-control" type="text" name="link_lprice3" value="<?php echo esc_attr( get_option('link_lprice3') ); ?>" /></p>
	    		
	    		<p><img class="img_set img3" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_lprice3') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_lprice" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_lprice form-control int-pop4" type="text" name="images_lprice4" value="<?php echo esc_attr( get_option('images_lprice4') ); ?>" />
			        <input type="button" name="images_lprice-button" class="button images_lprice-button b4" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_lprice" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_lprice4 form-control" type="text" name="link_lprice4" value="<?php echo esc_attr( get_option('link_lprice4') ); ?>" /></p>
	    		
	    		<p><img class="img_set img4" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_lprice4') ); ?>"></p>
	    		</td>
	    	</tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
	</div>