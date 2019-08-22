<div class="wrap">
	<h2>Setting option links</h2>
	<form class="form-home" method="post" action="options.php">
	    <?php settings_fields( 'home-settings-group' ); ?>
	    <?php do_settings_sections( 'home-settings-group' ); ?>
	    <table class="form-table-home" style="width: 100%">
	    
	     	<tr><td>
	    		<p>
			        <label  class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_home form-control int-pop1" type="text" name="images_home1" value="<?php echo esc_attr( get_option('images_home1') ); ?>" />
			        <input type="button" name="images_home-button" class="button images_home-button b1" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    		<p><img class="img_set img1" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_home1') ); ?>"></p>
	    		<p><label  class="prfx-row-title"><?php _e( 'title', 'prfx-textdomain' )?></label>
			        <input class="link_images_home1 form-control" type="text" name="title_home1" value="<?php echo esc_attr( get_option('title_home1') ); ?>" /></p>
			      <p><label  class="prfx-row-title"><?php _e( 'description', 'prfx-textdomain' )?></label></p>
			       <p><textarea rows="4" cols="50" class="form-control" name="desc_home1"><?php echo esc_attr( get_option('desc_home1') ); ?></textarea></p>
			     <p><label for="images_home" class="prfx-row-title"><?php _e( 'link post', 'prfx-textdomain' )?></label>
			        <input class="link_images_home1 form-control" type="text" name="link_home1" value="<?php echo esc_attr( get_option('link_home1') ); ?>" /></p>
	    		</td>
	    	</tr>
	    	<tr><td>------------------------------------------------------------------------</td></tr>
	    	<tr><td>
	    		<p>
			        <label  class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_home form-control int-pop1" type="text" name="images_home2" value="<?php echo esc_attr( get_option('images_home2') ); ?>" />
			        <input type="button" name="images_home-button" class="button images_home-button b1" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    		<p><img class="img_set img1" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_home2') ); ?>"></p>
	    		<p><label  class="prfx-row-title"><?php _e( 'title', 'prfx-textdomain' )?></label>
			        <input class="link_images_home2 form-control" type="text" name="title_home2" value="<?php echo esc_attr( get_option('title_home2') ); ?>" /></p>
			      <p><label  class="prfx-row-title"><?php _e( 'description', 'prfx-textdomain' )?></label></p>
			       <p><textarea rows="4" cols="50" class="form-control" name="desc_home2"><?php echo esc_attr( get_option('desc_home2') ); ?></textarea></p>
			     <p><label for="images_home" class="prfx-row-title"><?php _e( 'link post', 'prfx-textdomain' )?></label>
			        <input class="link_images_home2 form-control" type="text" name="link_home2" value="<?php echo esc_attr( get_option('link_home2') ); ?>" /></p>
	    		</td>
	    	</tr>
	    	<tr><td>------------------------------------------------------------------------</td></tr>
	    	<tr><td>
	    		<p>
			        <label  class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_home form-control int-pop1" type="text" name="images_home3" value="<?php echo esc_attr( get_option('images_home3') ); ?>" />
			        <input type="button" name="images_home-button" class="button images_home-button b1" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    		<p><img class="img_set img1" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_home3') ); ?>"></p>
	    		<p><label  class="prfx-row-title"><?php _e( 'title', 'prfx-textdomain' )?></label>
			        <input class="link_images_home3 form-control" type="text" name="title_home3" value="<?php echo esc_attr( get_option('title_home3') ); ?>" /></p>
			      <p><label  class="prfx-row-title"><?php _e( 'description', 'prfx-textdomain' )?></label></p>
			       <p><textarea rows="4" cols="50" class="form-control" name="desc_home3"><?php echo esc_attr( get_option('desc_home3') ); ?></textarea></p>
			     <p><label for="images_home" class="prfx-row-title"><?php _e( 'link post', 'prfx-textdomain' )?></label>
			        <input class="link_images_home3 form-control" type="text" name="link_home3" value="<?php echo esc_attr( get_option('link_home3') ); ?>" /></p>
	    		</td>
	    	</tr>
	    	<tr><td>------------------------------------------------------------------------</td></tr>
	    	<tr>
	    		<td>
	    		<p>
			        <label  class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_home form-control int-pop1" type="text" name="images_home4" value="<?php echo esc_attr( get_option('images_home4') ); ?>" />
			        <input type="button" name="images_home-button" class="button images_home-button b1" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    		<p><img class="img_set img1" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_home4') ); ?>"></p>
	    		<p><label  class="prfx-row-title"><?php _e( 'title', 'prfx-textdomain' )?></label>
			        <input class="link_images_home4 form-control" type="text" name="title_home4" value="<?php echo esc_attr( get_option('title_home4') ); ?>" /></p>
			      <p><label  class="prfx-row-title"><?php _e( 'description', 'prfx-textdomain' )?></label></p>
			       <p><textarea rows="4" cols="50" class="form-control" name="desc_home4"><?php echo esc_attr( get_option('desc_home4') ); ?></textarea></p>
			     <p><label for="images_home" class="prfx-row-title"><?php _e( 'link post', 'prfx-textdomain' )?></label>
			        <input class="link_images_home4 form-control" type="text" name="link_home4" value="<?php echo esc_attr( get_option('link_home4') ); ?>" /></p>
	    		</td>
	    	</tr>
	    	<tr><td>--------------------------------tai sao chọn chúng tôi------------------------------------</td></tr>
	    	<tr>
	    		<td>
	    		<p>
			        <label  class="prfx-row-title"><?php _e( 'File Upload', 'prfx-textdomain' )?></label>
			        <input class="images_home form-control" type="text" name="images_choose" value="<?php echo esc_attr( get_option('images_choose') ); ?>" />
			        <input type="button" name="images_home-button" class="button images_home-button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    		<p><img class="img_set" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_choose') ); ?>"></p>
	    		<p><label  class="prfx-row-title"><?php _e( 'title', 'prfx-textdomain' )?></label>
			        <input class="link_images_home4 form-control" type="text" name="title_choose" value="<?php echo esc_attr( get_option('title_choose') ); ?>" /></p>
			      <p><label  class="prfx-row-title"><?php _e( 'description 1', 'prfx-textdomain' )?></label></p>
			       <p><textarea rows="4" cols="50" class="form-control" name="desc_choose1"><?php echo esc_attr( get_option('desc_choose1') ); ?></textarea></p>
			      <p><label  class="prfx-row-title"><?php _e( 'description 2', 'prfx-textdomain' )?></label></p>
			       <p><textarea rows="4" cols="50" class="form-control" name="desc_choose2"><?php echo esc_attr( get_option('desc_choose2') ); ?></textarea></p>
			     <p><label for="images_home" class="prfx-row-title"><?php _e( 'link youtube', 'prfx-textdomain' )?></label>
			        <input class="link_images_home4 form-control" type="text" name="linkyoutube_choose" value="<?php echo esc_attr( get_option('linkyoutube_choose') ); ?>" /></p>
	    		</td>
	    	</tr>
	    	<tr><td>--------------------------------before after------------------------------------</td></tr>
	    	<tr>
	    		<td>
	    		<p>
			        <label  class="prfx-row-title"><?php _e( 'Before image', 'prfx-textdomain' )?></label>
			        <input class="images_home form-control" type="text" name="images_before" value="<?php echo esc_attr( get_option('images_before') ); ?>" />
			        <input type="button" name="images_before-button" class="button images_home-button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
			    <p><img class="img_set" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_before') ); ?>"></p>
				</td>
			</tr>
			<tr><td>    
			    <p>
			        <label  class="prfx-row-title"><?php _e( 'After image', 'prfx-textdomain' )?></label>
			        <input class="images_home form-control" type="text" name="images_after" value="<?php echo esc_attr( get_option('images_after') ); ?>" />
			        <input type="button" name="images_before-button" class="button images_home-button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			    </p>
	    		<p><img class="img_set" style="max-height: 100px; min-width: auto" src="<?php echo esc_attr( get_option('images_after') ); ?>"></p>
	    		<p><label  class="prfx-row-title"><?php _e( 'title', 'prfx-textdomain' )?></label>
			        <input class="link_images_home4 form-control" type="text" name="title_before_after" value="<?php echo esc_attr( get_option('title_before_after') ); ?>" /></p>
			      <p><label  class="prfx-row-title"><?php _e( 'description before after', 'prfx-textdomain' )?></label></p>
			       <p><textarea rows="4" cols="50" class="form-control" name="desc_before_after"><?php echo esc_attr( get_option('desc_before_after') ); ?></textarea></p>
	    		</td>
	    	</tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
	</div>