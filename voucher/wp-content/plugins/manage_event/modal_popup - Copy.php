<?php
function popup_consultant() { ?>
<!--<button type="button" class="btn btn-info btn-lg btn-consultant">Open Modal</button>-->
<div class="hatazu_consultant">
 <div class="modal fade" id="Modal_consultant" role="dialog">
    <div class="modal-dialog">           
     <div class="modal-content">
        <div class="cover"></div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>        
          <div class="header"><h4>&nbsp;&nbsp;&nbsp;&nbsp;</h4></div>
        </div>
         <div class="modal-body" style="padding:0px 50px;">           
                  <div class="bg-before">                   
                      <h4>Chào mừng bạn đến với ứng dụng DrOH - bác sĩ nhà tôi </h4>
                      <p>Một phương pháp khám chữa bệnh trực tuyến, có thể mang các dịch vụ chăm sóc sức khỏe
                      đến với bạn một cách dễ dàng chỉ với một cái chạm tay</p>
                    </div>                  
                    <div class="bg-below">
                    <!-- <div class="cover"></div> -->
                     <form id="form_register_consultant" class="form_event">
                      <h5>Hãy nhập số điện thoại để được hướng dẫn cài đặt ứng dụng ngay bây giờ</h5>
                      <div class="form-group alert-border">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span> 
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Số điện thoại…">                             
                            <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default btn-submit">Gửi</button>
                            </span>                       
                          </div>
                          <div class="alert alert-danger" style="display:none">
                            <strong>Số điện thoại</strong> không hợp lệ
                          </div>
                       </div>
                       <div class="icon-store">
                         <ul>
                           <li><a href="https://itunes.apple.com/vn/app/droh/id1264916712?mt=8"><img class="icon-size" src="<?php echo plugin_dir_url(__FILE__)."register/images/appstore.png";?>"></a></li>
                           <li><a href="https://play.google.com/store/apps/details?id=com.onehealth.DoctorOHApp"><img class="icon-size" src="<?php echo plugin_dir_url(__FILE__)."register/images/googleplay.png";?>"></a></li>
                         </ul>
                       </div>
                       <div class="col-sm-12 text-center">
                         <p><img id="loading" style="float:left; margin:3px; display:none;" src="<?php echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/></p>
                        <div id="response"></div> 
                       </div>                      
                      </form> 
                    </div>                                                                       
          </div>

      </div>
    </div>
    </div>
</div>
<?php } ?>
<?php
function popup_event_bsnhatoi() { ?>
<!--<button type="button" class="btn btn-info btn-lg btn-modal">Open Modal</button>-->
<div class="hatazu_event_bsnhatoi myModal">
 <div class="modal fade" id="myModalevent" role="dialog">
     <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <!-- <h4 class="modal-title" id="myModalLabel">Chương trình khuyến mãi</h4> -->
      </div>
      <div class="modal-body">
        <div class="row getpop">
              <div class="col-md-5 col-sm-12 logo text-center">
                <a href="#"><img class="size" src="<?php bloginfo('template_directory');?>/images/popup/logo.png"></a>
              </div>
              <div class="col-md-7 col-sm-12 gift text-center">
                <!--<a href="#"><img src="<?php //bloginfo('template_directory');?>/images/popup/right-gift.png"></a>-->
              </div>
        </div>
        <div class="row">
          <div class="register">
            <div class="col-sm-5">
                <form id="form_register_event"> 
                      <!--<input type="hidden" name="id_event" id="id_event" value="4" />-->                                    
                      <div class="form-group"> 
                        <div class="input-group"> 
                        <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>                                
                           <input type="text" name="firstname" id="firstname" class = "form-control" placeholder="Họ tên" required />
                        </div>
                      </div>  
                      <div class="form-group"> 
                            <div class="input-group"> 
                              <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>    
                              <input type="text" name="phone"  id="phone" class="form-control"  placeholder="<?php _e('Điện thoại', 'framework'); ?>"  title="<?php _e('Điện thoại', 'framework'); ?>" required />                          
                            </div>
                             <div class="alert alert-danger" style="display:none">
                                  <strong>Số điện thoại</strong> không hợp lệ
                                </div>  
                      </div>  
                      <div class="form-group"> 
                      <div class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>   
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                       </div>
                      </div>
                     
                     <div class="col-sm-12">                         
                         <div class="row">
                         <button id="submit" type="submit" class="btn btn-default form-control btn-join" name="submit">THAM GIA</button>
                         
                          <img id="loading" style="float:left; margin:3px; display:none;" src="<?php bloginfo('template_directory');?>/images/loader.gif"/>
                          <div id="response"></div>               
                          </div>              
                     </div>
                       
                    </form>   
                </div>
                <div class="col-sm-7">
                </div>
                 <div class="col-sm-12 condition">
                 <div class="row">
                  <div class="col-sm-6 border-top">
                      <div class="form-group"> 
                        <div class="input-group">
                          <h6>* Xin liên hệ <strong>(028) 7302 999</strong> để biết thêm chi tiết</h6>
                          <h6>* Vui lòng đọc kỹ điều kiện sử dụng</h6>
                         </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                  </div>
                  </div>
                </div>
             </div>
          </div>
      </div>
    </div>
  </div>

</div>
</div>
<?php } ?>