jQuery(document).ready(function($) {
	var e_frmcontact = $("htz_form_contact").find(".htz_form_contact");
	var btn = e_frmcontact.find("button.btn-submit");
	btn.click(function(){
		alert("hi");
	});
	
	var vname = e_frmcontact.find("input.htz_fullname").val();
	var vphone = e_frmcontact.find("input.htz_phone").val();
	var vemail = e_frmcontact.find("input.htz_email").val();
	var vmessage = e_frmcontact.find("input.htz_message").val();

   	function htz_send_mail(){
   		
   		console.log(vname+","+vphone+","+vemail+","+vmessage);
		var name = vname;
		var phone = vphone;
		var email = vemail;
		var message = vmessage;
		var data = {
			action : 'htz_send_mail',
			security : MyAjax.security,
			_name : name,
			_phone : vphone,
			_email : email,
			_message : message  
		};
		$.post(MyAjax.ajaxurl, data, function(response){
			var parsed_json = jQuery.parseJSON(response);
			console.log(parsed_json);
			//$('#result_response').html(parsed_json);
			//$('#loading_response').hide();
		});
		return false;
}
e_frmcontact.find("button.btn-submit").click(function(){
//$('#result_response').html('');
//$('#loading_response').show();
alert("submit");
	//htz_send_mail();
	});
});