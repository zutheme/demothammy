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
<div class="modal-popup-box">
  <div class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
	  	<div class="custom">
	    	<a class="bg-size" target="_blank" href="<?php echo esc_attr( get_option('link_images_popup1') ); ?>"><img class="img_bg" src="<?php echo esc_attr( get_option('images_popup1') ); ?>"></a>
		</div>
    </div>
  </div>
</div>
<!--end modal javascrip -->
<?php } ?>

