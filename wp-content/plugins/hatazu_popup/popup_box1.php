<?php function popup_box(){ ?>
<!--modal javascript reg-survey-->
<div class="modal-popup">
  <div class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      	<form class="frm-popup">
 				<div class="popup">
 					<a href="#"><img class="logo" src="<?php echo plugin_dir_url(__FILE__); ?>images/logo-thienkhue.png"></a>
 					<!-- <h2>Đăng ký</h2> -->
 					<h3><span class="promotion"></span></h3>			
					<!-- <p>Trải nghiệm chỉ 800k (giá gốc 3tr5)</p> -->
					<!-- <h3><span class="promotion"></span>Tháng 10 đặc quyền phái đẹp Vì phụ nữ xứng đáng</h3>	 -->
 				</div>		

				<div class="input-group">

				<input type="text" class="form-control fullname" name="fullname" placeholder="Họ và tên" required>

			  	</div>

				<div class="input-group">

					<input type="number" class="form-control phone" name="phone" placeholder="Điện thoại" required>

				</div>

				<div class="input-group">
					<input type="email" class="form-control email" name="email" placeholder="Nhập E-mail để nhận thông tin khuyến mãi khác" required>
				</div>	 		 
				<div class="input-group">

			  		<select id="select-service" name="dich_vu" class="select-service">

			  		<option value="-1">Vui lòng chọn dịch vụ *</option>

			  		<option value="19">Trị mụn Biolight</option>

			  		<option value="24">Trị nám Laser Platinum</option>

			  		<option value="25">Giảm béo Body Trim</option>

			  		<option value="26">Vitamin C cấp ẩm sáng da </option>

			  		<option value="27">Tách sẹo mịn da</option>
			  		</select>

			  </div>
				<div class="input-group payonline">
					<label><input class="messageCheckbox" type="checkbox" name="messageCheckbox">Thanh toán online giá chỉ còn <span class="discount"></span></label> 
			  	</div>
			  <div class="input-group area-btn">
					<a class="btn btn-default btn-reg-survey">Xác nhận</a>
			  </div>

			  <div class="input-group">

			  	<p><img width="30px" class="loading" style="display:none" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif"></p>

			  	<div class="result"></div>
			  	<div class="thanks-checkout" style="display: none">
			  		<label>Chúng tôi sẽ liên hệ để hướng dẫn thanh toán chuyển khoản</br>Cảm ơn quý khách!</label> 
			  	</div>
			  	<div class="thanks-normal" style="display: none">
			  		<label>Chúng tôi sẽ liên hệ quý khách để hướng dẫn đặt lịch</br>Cảm ơn quý khách!</label> 	  		
			  	</div>
			  </div>
                <input class="name_service" type="hidden" name="name_service" value="" />
                <input class="checkout_medthod" type="hidden" name="checkout_medthod" value="" />
			</form>	  	
    </div>
  </div>
</div>
<!--end modal javascrip reg-survey -->
<!--modal javascript-->
<div class="modal-form">
  <div class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Tiếc quá mất cơ hội rồi!</h2>
	  	<div class="panel panel-default custom">
	    	<a class="btn btn-default btn-link" target="_blank" href="https://kmt10.thammyvienthienkhue.vn/"><h2>Click xem ngay ưu đãi <span class="khuyenmai"></span></h2></a>
		</div>
    </div>
  </div>
</div>
<!--end modal javascrip -->
<?php } 
function short_form_reg_widget(){ ?>
	<div class="frm-shorcort-reg">
		<div class="col-sm-6 bg-reg">
			<a href="#"><img src="<?php echo plugin_dir_url(__FILE__) . "images/lienhe1.jpg" ?>"></a>
		</div>
		<div class="col-sm-6">
      		<form class="frm-popup">
 				<div class="popup">
 				   <h2>ĐĂNG KÝ</h2>
 					<h3>Deal chớp nhoáng</h3>			
					<p>Làm đẹp 99k với chuyên gia</p>
 				</div>		

				<div class="input-group">

				<input type="text" class="form-control fullname" name="fullname" placeholder="Họ và tên" required>

			  	</div>

				<div class="input-group">

					<input type="number" class="form-control phone" name="phone" placeholder="Điện thoại" required>

				</div>

				<div class="input-group">
					<input type="email" class="form-control email" name="email" placeholder="Nhập E-mail để nhận thông tin khuyến mãi khác" required>
				</div>	 		 
				
				<div class="input-group">

			  		<select name="dich_vu" class="sel-service">

			  		<option value="0">Vui lòng chọn dịch vụ *</option>

			  		<option value="1">Trẻ hóa sáng da với công nghệ laser whitening</option>

			  		<option value="2">Điều trị mụn công nghệ Biolight</option>

			  		<option value="3">Giảm béo công nghệ Body trim</option>

			  		<option value="4">Trắng sáng body công nghệ thanh tẩy TBC </option>
			  		</select>

			  </div>
			  <div class="input-group area-btn">
					<a onclick="reg_survey(this)" class="btn btn-default btn-reg-survey">Đăng ký ngay</a>
			  </div>

			  <div class="input-group">

			  	<p><img width="30px" class="loading" style="display:none" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader.gif"></p>
			  	<div class="result"></div>
			  	<div class="thanks-checkout" style="display: none">
			  		<label>Chúng tôi sẽ liên hệ để hướng dẫn thanh toán chuyển khoản</br>Cảm ơn quý khách!</label> 
			  	</div>
			  	<div class="thanks-normal" style="display: none">
			  		<label>Thiên khuê sẽ liên hệ xác nhận và gởi mã số đăng ký cho bạn</label>
			  	</div>
			  </div>
                <input class="name_service" type="hidden" name="name_service" value="" />
                <input class="checkout_medthod" type="hidden" name="checkout_medthod" value="" />
			</form>	
		</div>
	</div>
<?php } ?>

