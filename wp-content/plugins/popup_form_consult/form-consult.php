<?php
function form_consult(){ ?>
<div class="modal-consultant-form">
  <div class="modal-consult">
    <!-- Modal content -->
    <div class="modal-content-consult">   
      	<form class="frm-register">
      		<span class="close">&times;</span>
      		<div class="row">
	      		<div class="column">
	      			<div class="register">
	 					<a class="doctor" href="javascript(0);"><img class="bacsi" src="<?php echo plugin_dir_url(__FILE__); ?>images/chuyen-gia1.jpg"></a>
	 				</div>	
	      		</div>
	      		<div class="column reg">
	      			<div class="form-reg">
		      			<h2>chuyên gia tư vấn </h2>
						<div class="input-group-consult">
							<input type="text" class="form-control-consult fullname" name="fullname" placeholder="Họ và tên" required>
					  	</div>
						<div class="input-group-consult">
							<input type="number" class="form-control-consult phone" name="phone" placeholder="Điện thoại" required>
						</div>			
						<!-- <div class="input-group-consult">
							<input type="text" class="form-control-consult address" name="address" placeholder="Địa chỉ">
						</div>	 -->	 		 
						<div class="input-group-consult">
					  		<select id="sel-service" name="sel-service" class="sel-service">
					  		<option value="-1">Chọn khu vực *</option>
					  		<option value="1">Sài Gòn</option>
					  		<option value="2">Bình Dương</option>
					  		<option value="3">Đồng Nai</option>
					  		</select>
					  	 </div> 
					  <div class="input-group-consult">
							<input type="email" class="form-control-consult email" name="email" placeholder="E-mail (nếu có)">
						</div>
					  <!-- <div class="input-group-consult capture">            				
							<a href="javascript:void(0)" onclick="performClick('file');">Ảnh chụp tình trạng da của bạn<br><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
							<input style="display:none" type="file" name="file_name" id="file" accept="image/*"/>
					  </div> -->
					  <div class="input-group-consult area-btn">
							<a href="javascript:void(0)" class="btn btn-default btn-reg-survey">Đăng ký ngay</a>
					  </div>
					  <p>(* Mọi thông tin được bảo mật)</p>
					  <p><img class="loading" style="display:none;width:30px;" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif"></p>
					  <span class="result"></span>  	
					  <!-- <canvas id="my_canvas_id" width="0px" height="0px"></canvas> -->
					</div>
				</div>
			</div>
		</form>	  	
    </div>
  </div>
</div>
<?php } 
function form_promotion(){ ?>
<div class="modal-promo-form">
  <div class="modal-promo">
    <!-- Modal content -->
    <div class="modal-content-promo">   
      	<form class="frm-promo">
      		<span class="close">&times;</span>
      		<div class="row">
	      		<div class="column">
	      			<div class="pro-logo">
	      				<a class="lg" href="javascript(0);"><img class="lg" src="<?php echo plugin_dir_url(__FILE__); ?>images/thienkhue-logo-250.png"></a>
	      			</div>
	      			<div class="register">
	 					&nbsp;
	 				</div>	
	      		</div>
	      		<div class="column reg">
	      			<div class="receive"><h2>Nhận tư vấn</h2></div>
	      			<div class="form-reg">
						<div class="input-group-promo">
							<input type="text" class="form-control-promo fullname" name="fullname" placeholder="Họ và tên" required>
					  	</div>
						<div class="input-group-promo">
							<input type="number" class="form-control-promo phone" name="phone" placeholder="Điện thoại" required>
						</div>			
						<!-- <div class="input-group-promo">
							<input type="text" class="form-control-promo address" name="address" placeholder="Địa chỉ">
						</div>	 -->	 		 
						<div class="input-group-promo">
					  		<select id="sel-service" name="sel-service" class="sel-service">
					  		<option value="-1">Chọn khu vực *</option>
					  		<option value="1">Sài Gòn</option>
					  		<option value="2">Bình Dương</option>
					  		<option value="3">Đồng Nai</option>
					  		</select>
					  	 </div> 
					  <div class="input-group-promo">
							<input type="email" class="form-control-promo email" name="email" placeholder="E-mail (nếu có)">
						</div>
					  <!-- <div class="input-group-promo capture">            				
							<a href="javascript:void(0)" onclick="performClick('file');">Ảnh chụp tình trạng da của bạn<br><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
							<input style="display:none" type="file" name="file_name" id="file" accept="image/*"/>
					  </div> -->
					  <div class="input-group-promo area-btn">
							<a href="javascript:void(0)" class="btn btn-default btn-reg-survey">Đăng ký ngay</a>
					  </div>
					  <!-- <p>(* Mọi thông tin được bảo mật)</p> -->
					  <p><img class="loading" style="display:none;width:30px;" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif"></p>
					  <span class="result"></span>  	
					  <!-- <canvas id="my_canvas_id" width="0px" height="0px"></canvas> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="bottom-promo">
					<a href="tel:19001768"><i class="fa fa-phone" aria-hidden="true"></i> 1900 1768</a>
				</div>
			</div>
		</form>	  	
    </div>
  </div>
</div>
<?php } 
function form_mobile(){ ?>
<div class="call-mobile">
  <ul>
  	<li><a class="phone" href="tel:19001768">1900 1768</a></li>
  	<li><a class="message btn-consultant" href="#">Tư vấn</a></li>
  </ul>
</div>
<?php } 
function form_floor2(){ ?>
<div class="modal-floor2-form">
  <div class="modal-floor2">
    <div class="modal-content-floor2">
      <span class="close">&times;</span>
      	<form class="frm-floor2">
 				<a  target="_blank" href="http://lamdep350k.thammyvienthienkhue.vn/"><img class="banner" src="<?php echo plugin_dir_url(__FILE__); ?>images/350k-24thang07.jpg"></a>
		</form>	  	
    </div>
  </div>
</div>
<?php }
function form_floor3(){ ?>
<div class="modal-floor3-form">
  <div class="modal-floor3">
    <!-- Modal content -->
    <div class="modal-content-floor3">
      <a href="javascript:void(0);" class="close">&times;</a>
      	<form class="frm-floor3">
 			<a target="_blank" href="http://lamdep149k.thammyvienthienkhue.vn/"><img class="banner" src="<?php echo plugin_dir_url(__FILE__); ?>images/147k-24thang07.jpg"></a>	
		</form>	  	
    </div>
  </div>
</div>
<?php } 
function form_floor4(){ ?>
<div class="modal-floor4-form">
  <div class="modal-floor4">
    <div class="modal-content-floor4">
      <span class="close">&times;</span>
      	<form class="frm-floor4">
 		<a href="https://thammyvienthienkhue.vn/lam-dep-cung-chuyen-gia-199k/"><img class="banner" src="<?php echo plugin_dir_url(__FILE__); ?>images/199k-chuyengia.jpg"></a>		
		</form>	  	
    </div>
  </div>
</div> 
<?php } ?>