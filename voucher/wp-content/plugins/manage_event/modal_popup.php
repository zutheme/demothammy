<?php



function popup_event_bsnhatoi() { ?>



<!--<button type="button" class="btn btn-info btn-lg btn-modal">Open Modal</button>-->



<div class="hatazu_event_bsnhatoi myModal mdgame">



 <div class="modal fade" id="myModalevent" role="dialog">



     <div class="modal-dialog" role="document">



    <div class="modal-content">



      <div class="modal-header">



        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>  



         <div class="head"><h4><span class="first">TAY "THƠM" MỞ QUÀ MAY MẮN</span></br> 



         <span class="second">TRÚNG VOUCHER CỰC KHỦNG!</span></h4></div>



      </div>



      <div class="modal-body">



        <div class="row">



          <div class="game" style="display:block">



               <div class="col-sm-12 random text-center">



                  <ul>



                    <li><a href="#">



                      <canvas id="can0" class="canvas can1" width="100%" height="100%">



                        1. Your browser does not support the HTML5 canvas tag.



                      </canvas>



                    </a></li>



                     <li><a href="#">



                      <canvas id="can1"  class="canvas can2"  width="100" height="100" style="display:block">



                        2. Your browser does not support the HTML5 canvas tag.



                      </canvas>



                    </a></li>



                    <li><a href="#">



                     <canvas id="can2"  class="canvas can3"  width="100" height="100" style="display:block">



                        3. Your browser does not support the HTML5 canvas tag.



                      </canvas>



                    </a></li>



                    <li><a href="#">



                      <canvas id="can3" class="canvas can4" width="100" height="100" style="display:block">



                        4. Your browser does not support the HTML5 canvas tag.



                      </canvas>



                    </a></li>



                  </ul>                    

                  

                  <img class="hidden-image" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/gift_box1.png";?>" alt="gift thien khue">



                  <input type="hidden" id="url_gift" value="<?php echo plugin_dir_url(__FILE__)."game/images/gift_box1.png";?>">



                  <img class="hidden-gift-open" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/gift_open2.png";?>" alt="gift thien khue">



                  <img class="hidden-gift-unluck" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/gift_unluck.png";?>" alt="gift thien khue">



                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-0tr.jpg";?>" alt="gift thien khue">



                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-1tr.jpg";?>" alt="gift thien khue">



                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-2tr.jpg";?>" alt="gift thien khue">



                  <img class="hidden-voucher" style="display:none" width="100%" height="100%" src="<?php echo plugin_dir_url(__FILE__)."game/images/voucher-3tr.jpg";?>" alt="gift thien khue">

                   

              </div>

                       

          </div>   

         

        </div>

         <div class="row rule">



               <div class="col-sm-12 text-center">

                  <p><a class="btn btn-default btn-play-again" style="display: none" onclick="playagain()">Chơi lại</a></p>

               </div>

                <div class="col-sm-12 more text-center">

                      <a class="link" target="_blank" href="http://thammyvienthienkhue.vn/mo-qua-may-man/">Thể lệ trò chơi</a>

               </div>

               <div class="col-md-12 col-sm-12 animation text-center">

                  <p><a class="lucky" style="display: none;" href="#"><img class="thumbimg" src="<?php echo plugin_dir_url(__FILE__)."game/images/anh-gif-tay-thom.gif"; ?>"></a></p>
                  <p><a class="unluck" style="display: none;" href="#"><img class="thumbimg" src="<?php echo plugin_dir_url(__FILE__)."game/images/anh-gif-cho-thui.gif"; ?>"></a></p>

               </div>

          </div>

        <div class="row">      



          <div class="register" style="display:none">



                  <div class="col-sm-12">



                    <form id="form_register_event" class="frm_register"> 



                      <!--<input type="hidden" name="id_event" id="id_event" value="4" />-->



                      <div class="form-group title">



                        <h4>Vui lòng cung cấp thông tin hợp lệ để nhận quà tặng</h4>



                      </div>                                    



                      <div class="form-group"> 



                        <div class="input-group"> 



                        <span class="input-group-addon"><i class="fa fa-user-o"></i></span>                                



                           <input type="text" name="firstname" id="firstname" class = "form-control" placeholder="Họ tên" required />



                        </div>



                      </div>  



                      <div class="form-group"> 



                            <div class="input-group"> 



                              <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>    



                              <input type="text" name="phone"  id="phone" class="form-control"  placeholder="<?php _e('Điện thoại', 'framework'); ?>"  title="<?php _e('Điện thoại', 'framework'); ?>" required />                          



                            </div>



                             <div class="alert alert-danger" style="display:none">



                                  <strong>Số điện thoại</strong> không hợp lệ



                            </div>  



                      </div>  



                      <div class="form-group"> 



                      <div class="input-group">



                       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>   



                        <input id="email" type="email" class="form-control" name="email" placeholder="Email">



                       </div>



                      </div>



                      <div class="form-group">



                        <div class="input-group">



                          <select name="dich_vu_care" class="sel-service-care form-control">



                          <option value="-1">Dịch vụ bạn quan tâm *</option>



                          <option value="1">Điều Tri CNC</option>



                          <option value="2">Điều Trị Da</option>



                          <option value="3">Phun Xăm </option>



                          <option value="4">Thẩm Mỹ Nội Khoa</option>



                          <option value="5">Dịch Vụ Trọn Gói</option>



                          <option value="6">Dịch vụ Hi-Ulther</option>



                          <option value="7">Điều Trị Mụn</option>



                          <option value="8">Điều Trị Nám</option>



                          <option value="9">Chưa phát sinh dv</option>



                          </select>



                        </div>



                      </div>                     

                      <div class="form-group"> 

                        <div class="input-group"> 

                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                           <input type="text" name="address" id="address" class = "form-control" placeholder="Địa chỉ" />

                        </div>

                      </div> 

                     <div class="form-group">                    

                         <button type="submit" class="btn btn-default form-control btn-join" name="submit">THAM GIA</button>                         

                          <img class="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."register/images/loader.gif";?>"/>

                          <p class="response"></p>                                                  

                     </div>             



                    </form>



                  </div>               

                  

          </div>



        </div>



      </div>



      <div class="modal-footer">



        </div>



    </div>



  </div>



</div>



</div>



<?php } ?>