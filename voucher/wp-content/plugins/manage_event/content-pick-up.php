 <!-- Start Content Block 1-1 -->
 <?php
 function widget_pickup_form() { ?>
    <section id="content-1-1" class="pick-up content-block download-app bg-social">
      <div class="container text-center">
	      <div class="row">
	      	<div class="col-md-4 col-sm-3">
	      		<div class="mobile">
	      		<a href="#"><img src="<?php bloginfo('template_directory');?>/images/background-block/dt.png"></a>
	      		</div>
	      	</div>
	        <div class="col-md-8 col-sm-9 area-form">        
			   <div class="col-sm-12">
			   	<div class="header">
			   		<h2>ĐĂNG KÝ / ĐẶT HẸN</h2>
			   		<h3>DỊCH VỤ KHÁM BỆNH TẠI NHÀ</h3>
			   	</div>		   		
			   </div>
			   	<div class="col-sm-12">
			   			<div class="row">
				   			<form id="form_register_app" class="form-app">
				       			<div class="col-sm-12">	
					            	<div class="col-sm-6">
						              <div class="row">
							            <div class="form-group">
							                <div class="input-group">
							                	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
							                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Họ tên&hellip;" required />        		 	                    
							                </div>
							             </div>
							           	<div class="form-group">
							           		 <div class="input-group alert-border">
							                	<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span> 
							                    <input type="number" name="phone" id="phone" class="form-control" placeholder="Số điện thoại&hellip;" required />				                 
							                </div>
							                <div class="alert alert-danger" style="display:none">
					                            <strong>Số điện thoại</strong> không hợp lệ
					                          </div>
							           	</div>
							           	</div>
						            </div>
						            <div class="col-sm-6">
						   					<div class="form-group">
								           		 <div class="input-group">
								                	<span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span> 
								                    <textarea class="form-control" rows="3" id="message" name="message" required></textarea>				                 
								                </div>
								           	</div>
								    </div>
								</div>
							    <div class="col-sm-12">
							         <div class="row">
								        <div class="col-sm-6">
								        	<button id="btn-pick-up" type="button" class="btn btn-default btn-submit">Xác nhận</button>
											<p><img id="loading" style="float:left; margin:3px; display:none;" src="<?php echo bloginfo('template_directory');?>/images/loader.gif"/></p>
                        					<div id="response"></div> 
										</div>
										<div class="col-sm-6 store text-center">
											
									           <section class="col-sm-6 col-xs-6">
													<a href="#"><img class="icon-image" src="<?php bloginfo('template_directory');?>/images/logo/appstore.png"></a>								
												</section>
												<section class="col-sm-6 col-xs-6">
													<a href="#"><img class="icon-image" src="<?php bloginfo('template_directory');?>/images/logo/googleplay.png"></a>			
												</section>
											
							      		</div>
							      	</div>
							    </div>						
				    		</form>    		   		   
			   			</div>
	          	
	        		</div>
	      </div>
      </div>
      </div>
    </section>
<?php }
?>