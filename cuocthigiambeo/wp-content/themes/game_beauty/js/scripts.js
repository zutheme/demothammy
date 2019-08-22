$(document).ready(function(e) {
	$('#txtck').change(function(e) {
        if(this.checked){
			$('#btnsend').removeAttr('disabled','disabled');
		}else{
			$('#btnsend').attr('disabled','disabled');
		}
    });	
});