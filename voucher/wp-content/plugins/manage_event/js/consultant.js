//consultant
 $(document).ready(function() {	
 		var tbmenu = $(".wrap").find("ul").find("li").find('a[href="#menu5"]');
	 	var tb = $(".wrap").find(".tab-content").find("#menu5").find("#tb_consultant");				
		function consultant_customer(){
			//$('#sel-event-waiting').hide();
			var _idevent = 1;		
			 var data_consultant = $("#tb_consultant").DataTable({
				"processing": true,
				"serverSide": true,
			    "bServerSide": true,
				"lengthMenu": [[25, 100,200,1000000, -1], [25, 100,200,1000000, "All"]],
				"pageLength": 25,
				"scrollY": "800px",
				"scrollX": "100%",
				"scrollCollapse": true,
				//"paging":         false,
				"select":true,
				"dom": 'Blfrtip',
					buttons: [
						'copyHtml5',
						'excelHtml5',
						'csvHtml5'
						],
				"ajax":{
					url : ajaxurl, 
					type: "post",  
					data: {
							'action': 'consultant_customer',
							'idevent': _idevent
					},
					// success:function(response){
						
					// 	var parsed_json = jQuery.parseJSON(response);
					// 	console.log(parsed_json);
					// },
					error: function(){  // error handling
						$(".employee-grid-error").html("");
						$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#employee-grid_processing").css("display","none");
					}
				},
				"bDestroy": true
			} );
		 }
		tbmenu.click(function(){
			consultant_customer(); 
		});
		function consultant_test(){
		var name = 1;
		var data = {
			action : 'consultant_test',		
			_name : name		
		};
		$.post(ajaxurl, data, function(response){
			var parsed_json = jQuery.parseJSON(response);
			console.log(parsed_json);
			
		});
		return false;
	}
	
});