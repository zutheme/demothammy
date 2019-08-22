<?php function upload_file(){
   global $post;
   $id_post = get_the_ID();
   $current_user = wp_get_current_user();
   $iduser_login = $current_user->ID;
   $iduser = $post->post_author;
   if($iduser == $iduser_login) {
?>
<div class="frm-area-file">
  <!-- <script>var ajax_url = "<?php //echo admin_url('admin-ajax.php'); ?>"</script> --> 
  <form id="frm_quick_file" method="post" enctype="multipart/form-data" class="frm_quick_file">
    <?php //wp_nonce_field('ajax_file_nonce', 'security'); ?>
      <!-- <input type="hidden" name="action" value="send_files">  -->
       <input type="hidden" id="idpost" name="idpost" value="<?php echo $id_post; ?>">
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
 <?php } 
} ?>

 <?php function list_file(){
 global $post;
 $idpost = get_the_ID();
 $current_user = wp_get_current_user();
 $idauthor = $post->post_author;
 $rec = new receive();
 $l_file = $rec->receive_list($idauthor,$idpost);
 //$sql = $rec->get_sql();
 //echo $sql;
 //var_dump($l_file);
 if($l_file){
   echo '<ul class="list-inline mt-20 mb-15">';
   foreach ($l_file as $item) {
    $url = $item['url'];
    $name = $item['name'];
    $type = $item['type'];
    switch ($type) {
    case 'png':
         echo '<li class="thumb-li"><a class="thumb-attach" download target="_blank" href="'.$url.'"><img class="thumb-img" src='.$url.'></a></li>';
        break;
    case 'jpg':
        echo '<li class="thumb-li"><a class="thumb-attach" download target="_blank" href="'.$url.'"><img class="thumb-img" src='.$url.'></a></li>';
        break;
   
    default:
        echo '<li><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;<a download target="_blank" href="'.$url.'">'.$name.'</a></li>';
    }
   
   }
  echo '</ul>';
  }
 } ?>
<?php
function list_comment(){ 
  ?>
  <div class="comment-box">
      <ul class="comment-list">
      <?php 
           global $post;
           $idpost = get_the_ID();
           $current_user = wp_get_current_user();
           $id_user = $current_user->ID;
           $idauthor = $post->post_author;
           $sender = new send();
           $l_file = $sender->list_send($idpost);
           //var_dump($l_file);
           if($l_file){
             foreach ($l_file as $item) { 
                $avatar = $item['url_avatar'];
                $firstname = $item['first_name'];
                $comment = $item['comment'];
                $datesend = $item['datesend'];
                $namefile = $item['namefile'];
                $urlfile = $item['url_file'];
              ?>
              <li>
                <div class="media comment-author"> <a class="media-left" href="#"><img  class="media-object img-thumbnail" src="<?php echo $avatar; ?>" alt=""></a>
                  <div class="media-body">
                    <h5 class="media-heading comment-heading"><?php echo $firstname; ?></h5>
                    <div class="comment-date"><?php echo $datasend; ?></div>
                    <p><?php echo $comment; ?></p>
                    <!-- <a class="replay-icon pull-right flip text-theme-colored" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Trả lời</a> </div> -->
                    <ul class="list-inline text-right flip sm-text-center">
                    <li>
                        <?php if(!empty($namefile)){ ?>
                       <a class="replay-icon flip text-theme-colored" download target="_blank" href="<?php echo $urlfile; ?>"> <i class="fa fa-paperclip text-theme-colored"></i> <?php echo $namefile; ?></a>
                       <?php } ?>  
                    </li>
                    <!-- <li><a class="replay-icon flip text-theme-colored repply" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Trả lời</a> &nbsp;
                      <img class="htz-repply-comment-loading"  style="display:none" src="<?php //echo plugin_dir_url(__FILE__); ?>images/loader.gif">&nbsp;
                      <span class="htz-repply-comment-result"></span>
                    </li> -->
                   </ul>
                </div>
              </li>             
             <?php }
           } ?>
          
          <li>
            <?php
            
                $user = new account();
                $pro = new profile();
                $ac_profile = new account_profile();
                $user->set_id_user($id_user);
                $id_profile = $ac_profile->id_profile_by_account($user);
                if($id_profile > 0){
                  $pro->set_id_profile($id_profile);
                  $pro->get_profile();
                  $pro_firstname = $pro->get_first_name();      
                  $url_avatar = $pro->get_url_avatar();
                  //$pro_job = $pro->get_url_avatar();  
                 } else {
                    $url_avatar = no_avatar;
                 }
              ?>
            <div class="media comment-author"> <a class="media-left" href="#"><img class="media-object img-thumbnail" src="<?php echo $url_avatar; ?>" alt=""></a>
              <div class="media-body">
                <form class="frm_comment">        
                  <textarea class="form-control" required name="text-comment" placeholder="Bình luận" rows="3"></textarea>
                   <ul class="list-inline text-right flip sm-text-center">
                    <li>
                      <?php attach_file_comment(); ?>   
                    </li>
                    <li><a class="replay-icon flip text-theme-colored repply" href="#"> <i class="fa fa-commenting-o text-theme-colored"></i> Gởi</a> &nbsp;
                      <img class="htz-repply-comment-loading"  style="display:none" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif">&nbsp;
                      <span class="htz-repply-comment-result"></span>
                    </li>
                   </ul>
                </form>
              </div>
            </div>
          </li>
       </ul>
    </div>
<?php
}
?>
<?php function attach_file_comment(){
   global $post;
   $id_post = get_the_ID();
   $current_user = wp_get_current_user();
   $iduser_login = $current_user->ID;
   $idauthor = $post->post_author;
   $time_reg = date('Y-m-d H:i:s', time());
   $pattern ="/\:|\s/i";
   $replacement="-";
   $time_reg = preg_replace($pattern, $replacement, $time_reg);
?>
  <form name="frm-attach-comment" method="post" enctype="multipart/form-data" class="frm-attach-comment">
      <input type="hidden" class="user-login" name="user-login" value="<?php echo $iduser_login; ?>">
      <input type="hidden" class="author-post" name="author-post" value="<?php echo $idauthor; ?>">
      <input type="hidden" class="idpost" name="idpost" value="<?php echo $id_post; ?>">
      <input type="hidden" class="idfile" name="idfile" value="">
         <!--  <a href="#" onclick="performClick_Class('file-attach-comment',event);"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Đính kèm</a> -->
         <a class="attach_comment" href="#"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Đính kèm</a> 
        <input style="display:none" type="file"  class="file-attach-comment" name="file-attach-comment" multiple/>
        &nbsp;
        <!-- <input style="display:none" type="file" id="<?php //echo $time_reg; ?>" class="file-attach-comment" name="file-attach-comment" onchange="checkfile(this);" multiple/> -->
        <img class="htz-attach-comment-loading"  style="display:none" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif">&nbsp;
        <span class="htz-attach-comment-result"></span>
  </form>

 <?php } ?>
 <?php function attach_file_post(){
   global $post;
   $id_post = get_the_ID();
   $current_user = wp_get_current_user();
   $iduser_login = $current_user->ID;
   $idauthor = $post->post_author;
   $time_reg = date('Y-m-d H:i:s', time());
   $pattern ="/\:|\s/i";
   $replacement="-";
   $time_reg = preg_replace($pattern, $replacement, $time_reg);
   if($iduser_login ==$idauthor){
?>
  <form name="frm-attach-post" method="post" enctype="multipart/form-data" class="frm-attach-post">
      <input type="hidden" class="user-login" name="user-login" value="<?php echo $iduser_login; ?>">
      <input type="hidden" class="author-post" name="author-post" value="<?php echo $idauthor; ?>">
      <input type="hidden" class="idpost-attach" name="idpost-attach" value="<?php echo $id_post; ?>">
      <input type="hidden" class="idfile-actach" name="idfile-attach" value="">
         <!--  <a href="#" onclick="performClick_Class('file-attach-comment',event);"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Đính kèm</a> -->
         <a class="attach-post" href="#"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Đính kèm</a> 
        <input style="display:none" type="file" id="<?php echo $time_reg.$iduser_login; ?>" class="file-attach-post" name="file-attach-post" multiple/>
        &nbsp;
        <!-- <input style="display:none" type="file" id="<?php //echo $time_reg; ?>" class="file-attach-comment" name="file-attach-comment" onchange="checkfile(this);" multiple/> -->
        <img class="htz-attach-post-loading"  style="display:none" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif">&nbsp;
        <span class="htz-attach-post-result"></span>
  </form>
 <?php } 
} ?>
