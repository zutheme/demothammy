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
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Số điện thoại …">                             
                            <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default btn-submit">Gửi</button>
                            </span>                       
                          </div>
                          <div class="alert alert-danger" style="display:none">
                            <strong>Số điện thoại</strong> không hợp lệ
                          </div>
                       </div>
                       <div class="captchar">
                        <div class="g-recaptcha" data-sitekey="6Lfq1EoUAAAAAE_otZ9Cd0e5Wq55uAXv0FN7a8SR" data-callback="correctCaptcha">
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
<div class="hatazu_event_bsnhatoi myModal mdgame">
 <div class="modal fade" id="myModalevent" role="dialog">
     <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>   
      </div>
      <div class="modal-body">
        <!-- <div class="row getpop">
              <div class="col-sm-12 hidden-xs show-time text-center">
                <div id="demo" class="time">
                  <ul>
                    <li class="days"></li>
                    <li class="hours"></li>
                    <li class="minutes"></li>
                    <li class="seconds"></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-5 col-sm-12 logo text-center">
                <a href="#"><img class="size" src="<?php //echo plugin_dir_url(__FILE__)."game/images/thienkhue.png";?>"></a>
              </div>
              <div class="col-md-7 col-sm-12 gift text-center">
              </div>
        </div> -->
        <div class="row">
          <div class="game">
               <div class="col-sm-12 random text-center">
                  <ul>
                    <li><a href="#">
                      <canvas class="canvas can1" width="100%" height="100%">
                        1. Your browser does not support the HTML5 canvas tag.
                      </canvas>
                    </a></li>
                     <li><a href="#">
                      <canvas  class="canvas can2" width="100%" height="100%">
                        2. Your browser does not support the HTML5 canvas tag.
                      </canvas>
                    </a></li>
                    <li><a href="#">
                      <canvas  class="canvas can3" width="100%" height="100%">
                        3. Your browser does not support the HTML5 canvas tag.
                      </canvas>
                    </a></li>
                    <li><a href="#">
                      <canvas  class="canvas can4" width="100%" height="100%">
                        4. Your browser does not support the HTML5 canvas tag.
                      </canvas>
                    </a></li>
                     
                  </ul>              
                  <img class="hidden-image" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/gift.png";?>" alt="gift thien khue">
                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-2tr.jpg";?>" alt="gift thien khue">
                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-3tr.jpg";?>" alt="gift thien khue">
                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-4tr.jpg";?>" alt="gift thien khue">
                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-0tr.jpg";?>" alt="gift thien khue">
               </div>
          </div>   
        </div>
        <div class="row">      
          <div class="register" style="display:none">
                <div class="col-sm-5">
                  <div class="col-sm-12">
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
                     <div class="form-group">                    
                         <button type="button" class="btn btn-default form-control btn-join" name="submit">THAM GIA</button>                         
                          <img id="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."register/images/loader.gif";?>"/>
                          <p id="response"></p>                                                  
                     </div>
                    
                    </form>
                  </div>               
                </div>
                <div class="col-sm-7">
                </div>
                 <div class="col-sm-12 col-xs-12 footer-condition">
                 <div class="row">
                  <div class="col-sm-6 col-xs-12 condition">
                    <div class="row">
                      <div id="listsprites">
                          <ul>
                              <li class="line1"><a href="#"><img class="icon1" src="<?php echo plugin_dir_url(__FILE__)."register/images/icon1.png";?>"/>Lì xì ngay <span><img class="1trieu" src="<?php echo plugin_dir_url(__FILE__)."register/images/1tr.png";?>"/></span> đồng</a></li>
                              <li class="line2"><a href="#" class="link_condition"><img class="icon2" src="<?php echo plugin_dir_url(__FILE__)."register/images/icon2.png";?>"/>Thông tin chi tiết chương trình</a></li>                             
                          </ul>
                      </div>
                       <p><img id="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."register/images/loader.gif";?>"/></p>
                        <p id="response"></p>               
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <a href=""><img src="<?php echo plugin_dir_url(__FILE__)."register/images/ma-vach.png";?>"/></a>
                  </div>
                   <div class="col-sm-3 col-xs-6">
                    <p><a href="https://itunes.apple.com/vn/app/droh/id1264916712?mt=8"><img src="<?php echo plugin_dir_url(__FILE__)."register/images/appstore.png";?>"/></a></p>
                    <p><a href="https://play.google.com/store/apps/details?id=com.onehealth.DoctorOHApp"><img src="<?php echo plugin_dir_url(__FILE__)."register/images/googleplay.png";?>"/></a></p>
                  </div>
                  </div>
                  <div class="col-sm-12 count-down">
                    <p><img class="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."register/images/loader.gif";?>"/></p>
                    <p class="response"></p>
                  </div> 
                </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <div class="detail-condition" style="display:none">
            <div class="detail">
              <h3 class="title">“Món quà sức khoẻ, gắn kết yêu thương”</h3>
              <h6>- Áp dụng cho tất cả khách hàng đăng kí trực tiếp trên App DR.OH – Bác sĩ nhà tôi</6>
              <h6>- Thể lệ:</h6>
              <ul>
              <li>B1: Khách hàng download ứng dụng Dr.OH – Bác sĩ nhà tôi trên ( CH Play or App Store) ( đối với khách hàng mới).Bằng cách quét mã QR code hoặc click vào icon bên trên để tải App.</li>
              <li>B2: Đăng ký các gói khám bất kỳ trên App tại menu dịch vụ</li>
              <li>B3 : Nhân viên xác nhận đăng ký.</li>
              <li>B4 : Nhân viên đến nhà giao Voucher + lì xì voucher 1,000,000 vnđ gói tắm trắng toàn thân collagen.</li>
              <li>B5: Khách hàng mang Voucher đến bệnh viện khám bệnh tại Bệnh viện Đa Khoa Hồng Đức (32/2 Thống nhất, P.10, Q. Gò vấp, HCM) và sử dụng dịch vụ Spa tại Spa Bống (428 Nguyễn Kiệm, P.3, Q.Phú Nhuận).</li>
              </ul>
              <h6>Lưu ý: </h6>
              <ul>
              <li>Không áp dụng với các chương trình khuyến mãi khác</li>
              <li> Từ ngày 03/02/2018 – 12/02/2018: Nhân viên sẽ giao hàng đến tận nhà (Khu vực HCM, Ngoài tỉnh phí ship: 30,000 vnđ)</li>
              <li>Từ: 13/02 - 28/02/2018: Khách hàng đăng ký trên app DR.OH đến ngày 22/03/2018 nhân viên sẽ xác nhận và giao hàng tận nhà.</li>
          
              <li><a target="_blank" href="https://www.facebook.com/search/top/?q=dr.oh%20b%C3%A1c%20s%C4%A9%20nh%C3%A0%20t%C3%B4i">
                 <i class="fa fa-hand-o-right"></i> Facebook: Dr.OH Bác Sĩ Nhà Tôi</a>            
              </li>
              <li><a href="tel:+842873067777"><i class="fa fa-mobile"></i> Hotline: (028) 7306 7777</a><a href="tel:+8419001851"> - <i class="fa fa-mobile"></i>: 19001851</a><a href="tel:+84902551789"> - <i class="fa fa-mobile"></i>: 0902 55 1789</a></li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
<?php } ?>