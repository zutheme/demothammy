<?php
function form_consult(){ ?>
<div class="modal-consultant-form">
  <div class="modal-consult">
    <div class="modal-content-consult">
     <!--  <span class="close">&times;</span> -->
      	<form class="frm-info">
 			    <a href="#"><img class="loading" style="display:none;width:100%;" src="<?php echo plugin_dir_url(__FILE__); ?>images/loader1.gif"></a>
          <div class="result"></div>
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
<?php } ?>