<div class="wrap">
	<h2>Setting option links</h2>
	<form class="form-slider" method="post" action="options.php">
	    <?php settings_fields( 'slider-settings-group' ); ?>
	    <?php do_settings_sections( 'slider-settings-group' ); ?>
	    <table class="form-table-slider" style="width: 100%">
	        <tr>
	        <td>
	        	<p>
	        		<label for="images_slider" class="prfx-row-title"><?php _e( 'option', 'prfx-textdomain' )?></label>
	        		<input type="text" name="option" value="<?php echo esc_attr( get_option('option') ); ?>" /></td>
	        	</p>
	        </tr>
	     	<tr><td>
	    		<p>
			        <label for="images_slider" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_slider form-control int-pop1" type="text" name="images_slider1" value="<?php echo esc_attr( get_option('images_slider1') ); ?>" />
			        <input type="button" name="images_slider-button" class="button images_slider-button b1" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_slider" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_images_slider1 form-control" type="text" name="link_images_slider1" value="<?php echo esc_attr( get_option('link_images_slider1') ); ?>" /></p>
	    		
	    		<p><img class="img_set img1" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_slider1') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_slider" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_slider form-control int-pop2" type="text" name="images_slider2" value="<?php echo esc_attr( get_option('images_slider2') ); ?>" />
			        <input type="button" name="images_slider-button" class="button images_slider-button b2" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_slider" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_images_slider2 form-control" type="text" name="link_images_slider2" value="<?php echo esc_attr( get_option('link_images_slider2') ); ?>" /></p>
	    		
	    		<p><img class="img_set img2" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_slider2') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_slider" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_slider form-control int-pop3" type="text" name="images_slider3" value="<?php echo esc_attr( get_option('images_slider3') ); ?>" />
			        <input type="button" name="images_slider-button" class="button images_slider-button b3" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_slider" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_images_slider3 form-control" type="text" name="link_images_slider3" value="<?php echo esc_attr( get_option('link_images_slider3') ); ?>" /></p>
	    		
	    		<p><img class="img_set img3" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_slider3') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_slider" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_slider form-control int-pop4" type="text" name="images_slider4" value="<?php echo esc_attr( get_option('images_slider4') ); ?>" />
			        <input type="button" name="images_slider-button" class="button images_slider-button b4" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_slider" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="link_images_slider4 form-control" type="text" name="link_images_slider4" value="<?php echo esc_attr( get_option('link_images_slider4') ); ?>" /></p>
	    		
	    		<p><img class="img_set img4" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_slider4') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<!--option icon promotion -->
	    	<tr><td>
	    		<p>
			        <label for="images_slider" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_slider form-control" type="text" name="images_icon_pro1" value="<?php echo esc_attr( get_option('images_icon_pro1') ); ?>" />
			        <input type="button" name="bnt_icon_pro" class="button images_slider-button b4" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_slider" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="form-control" type="text" name="link_icon_pro1" value="<?php echo esc_attr( get_option('link_icon_pro1') ); ?>" /></p>
	    		
	    		<p><img class="img_set" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_icon_pro1') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_slider" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_slider form-control" type="text" name="images_icon_pro2" value="<?php echo esc_attr( get_option('images_icon_pro2') ); ?>" />
			        <input type="button" name="bnt_icon_pro2" class="button images_slider-button b4" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_slider" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="form-control" type="text" name="link_icon_pro2" value="<?php echo esc_attr( get_option('link_icon_pro2') ); ?>" /></p>		
	    		<p><img class="img_set" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_icon_pro2') ); ?>"></p>
	    		</td>
	    	</tr>
	    	<tr><td>
	    		<p>
			        <label for="images_slider" class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_slider form-control" type="text" name="images_icon_pro3" value="<?php echo esc_attr( get_option('images_icon_pro3') ); ?>" />
			        <input type="button" name="bnt_icon_pro3" class="button images_slider-button b4" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><label for="images_slider" class="prfx-row-title"><?php _e( 'link banner', 'prfx-textdomain' )?></label>
			        <input class="form-control" type="text" name="link_icon_pro2" value="<?php echo esc_attr( get_option('link_icon_pro3') ); ?>" /></p>		
	    		<p><img class="img_set" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_icon_pro3') ); ?>"></p>
	    		</td>
	    	</tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
	</div>