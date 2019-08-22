<?php function upload_file($atts){
   $id_post = get_the_ID();
?>

<div class="frm-area-file">
	<!-- <script>var ajax_url = "<?php //echo admin_url('admin-ajax.php'); ?>"</script> --> 
	<form id="frm_quick_file" method="post" enctype="multipart/form-data" class="frm_quick_file">
		<?php //wp_nonce_field('ajax_file_nonce', 'security'); ?>
    	<!-- <input type="hidden" name="action" value="send_files">  -->
   		 <input type="hidden" id="idpost_file" name="idpost_file" value="<?php echo $id_post; ?>">
	 	 <div class="form-group">
	     <div class="input-group area-btn">
	     	  	<label>Duyệt file&nbsp;&nbsp;</label>			 
  				<a href="#" onclick="performClick_icon('fileupload',event);"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a>&nbsp;&nbsp;
				<input style="display:none" type="file" id="fileupload" name="fileupload" onchange="checkfile(this);" multiple/>
				&nbsp;&nbsp;<button id="btn-file" type="button" class="btn btn-default btn-file">Tải lên</button>&nbsp;&nbsp;
				<img id="htz_file_loading" class="loading" style="display:none" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif">&nbsp;&nbsp;
				<input id="htz_url_file" type="hidden" name="htz_url_file" value="">
	  			&nbsp;&nbsp;<span id="htz_file_result" class="result"></span>
		  </div>

	  </div>		 	 
	</form>

</div>	
 <?php } ?>

 <?php function list_file(){
 global $post;
 $idpost = get_the_ID();
 $current_user = wp_get_current_user();
 $iduser = $post->post_author;
 $rec = new receive();
 $l_file = $rec->receive_list($iduser,$idpost);
 //var_dump($l_file);
 if($l_file){
	 echo '<ul class="list-inline mt-20 mb-15">';
	 foreach ($l_file as $item) {
	 	$url = $item['url'];
	 	$name = $item['name'];
	 	echo '<li><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;<a href="'.$url.'">'.$name.'</a></li>';
	 }
	echo '</ul>';
	}
 } ?>
<?php
function list_comment(){ ?>
<div class="comments-area">
                <h5 class="comments-title">Thảo luận</h5>
                <ul class="comment-list">
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" src="<?php bloginfo('template_directory');?>/images/blog/comment1.jpg" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                        <div class="comment-date">23/06/2014</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                        <a class="replay-icon pull-right flip text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" src="<?php bloginfo('template_directory');?>/images/blog/comment2.jpg" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                        <div class="comment-date">23/06/2014</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                        <a class="replay-icon pull-right flip text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                        <div class="clearfix"></div>
                        <div class="media comment-author nested-comment"> <a href="#" class="media-left"><img class="media-object img-thumbnail" src="<?php bloginfo('template_directory');?>/images/blog/comment3.jpg" alt=""></a>
                          <div class="media-body p-20 bg-lighter">
                            <h5 class="media-heading comment-heading">John Doe says:</h5>
                            <div class="comment-date">23/06/2014</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                            <a class="replay-icon pull-right flip text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                          </div>
                        </div>
                        <div class="media comment-author nested-comment"> <a href="#" class="media-left"><img class="media-object img-thumbnail" src="<?php bloginfo('template_directory');?>/images/blog/comment2.jpg" alt=""></a>
                          <div class="media-body p-20 bg-lighter">
                            <h5 class="media-heading comment-heading">John Doe says:</h5>
                            <div class="comment-date">23/06/2014</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                            <a class="replay-icon pull-right flip text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" src="<?php bloginfo('template_directory');?>/images/blog/comment2.jpg" alt=""></a>
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">John Doe says:</h5>
                        <div class="comment-date">23/06/2014</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ea commodo consequat...</p>
                        <a class="replay-icon pull-right flip text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Replay</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="comment-box">
	              <ul class="comment-list">
	                  <li>
	                    <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" src="<?php bloginfo('template_directory');?>/images/blog/comment1.jpg" alt=""></a>
	                      <div class="media-body">
	                      	<form class="frm_comment">        
	                        	<textarea class="form-control" required name="contact_message2" id="contact_message2"  placeholder="Bình luận" rows="3"></textarea>
	                        	<a class="replay-icon pull-right flip text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Trả lời</a>
	                        </form>
	                    	</div>
	                    </div>
	                  </li>
	               </ul>
	            </div>
<?php
}
?>
