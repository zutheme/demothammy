$(document).ready(function() {	
		
				//cusomer
				var tbcusomer = $(".wrap").find(".tab-content").find("#menu2").find("table#tb_customers");
				var dataTable2 = tbcusomer.DataTable({
							"processing": true,
							"serverSide": true,
						    "bServerSide": true,
							"lengthMenu": [[25, 100,200,1000000, -1], [25, 100,200,1000000, "All"]],
							"pageLength": 25,
							"scrollY": "800px",
							"scrollX": "1200px",
							"scrollCollapse": true,
							// "paging": false,
							"dom": 'Blfrtip',
								buttons: [
									'copyHtml5',
									'excelHtml5',
									'csvHtml5',
									'pdfHtml5'

								],
							"select":true,
							"ajax":{
								url : ajaxurl, // json datasource
								type: "post",  // method  , by default get
								data: {
										'action': 'load_all_customer',
										'whatever': 1234 
								},
								error: function(){  // error handling
									$(".employee-grid-error").html("");
									$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
									$("#employee-grid_processing").css("display","none");
									
								}
								
							},
							
							"bDestroy": true
							
						} );
					//update customer
					var frm_edit_cus = $(".popup_edit_customer").find('#popup_edit_customer').find(".modal-dialog").find(".modal-content").find(".modal-body").find("#frm_edit_customer");	
					 tbcusomer.find('tbody').on('click', 'button.btn-edit', function (){
						    var obj = dataTable2.row( $(this).parents('tr') ).data();
							//console.log(obj);	     	  
						    frm_edit_cus.find("#id_customer").val(obj[0]);
						   	frm_edit_cus.find("#firstname").val(obj[1]);
						   	frm_edit_cus.find("#lastname").val(obj[2]);
						   	frm_edit_cus.find("#email").val(obj[3]);
						   	frm_edit_cus.find("#num_phone").val(obj[4]);
						   	frm_edit_cus.find("#address").val(obj[5]);
						    $(".popup_edit_customer").find('#popup_edit_customer').modal('show');
						});
					 var modal_edit = $('.popup_edit_customer').find("#popup_edit_customer").find(".modal-content").find(".modal-body").find(".modal-footer");
					 
					 function edit_customer(){
			            var id_customer = frm_edit_cus.find("input#id_customer").val();
			            var firstname = frm_edit_cus.find("input#firstname").val();
			            var lastname = frm_edit_cus.find("input#lastname").val();
			            var email = frm_edit_cus.find("input#email").val();
			            var num_phone = frm_edit_cus.find("input#num_phone").val();
			            var address = frm_edit_cus.find("input#address").val();
			            //alert(firstname+","+id_customer);
			            var data = {
			                action : 'update_customer',
			                dataType: 'JSON',
			                _id_customer : id_customer,
			                _firstname : firstname,
			                _lastname : lastname,
			                _email : email,
			                _num_phone : num_phone,
			                _address : address    
			            };
			        
			             $.post(ajaxurl, data, function(response){
				             var parsed_json = jQuery.parseJSON(response);
				             var error = parsed_json['error'];
				             console.log(parsed_json);
				             modal_edit.find('#loading').hide();
			             	 modal_edit.find('#response').show();
			                 modal_edit.find('#response').html(error);
			            	 dataTable2.row( $(this).parents('tr') ).remove().draw();
			             	 $(".popup_edit_customer").find('#popup_edit_customer').modal('toggle');
				                 
				            });
				            return false;
				         }
				        frm_edit_cus.find("#btn-update").click(function(){
				            frm_edit_cus.find('#loading').show();
				            frm_edit_cus.find('#response').html('');
				            edit_customer();
				            return false;
				        });
					
				     //delete customer
				     var frm_delete_cus = $(".popup_delete_customer").find('#popup_delete_customer').find(".modal-dialog").find(".modal-content").find(".modal-body").find("#frm_delete_customer");	
					 tbcusomer.find('tbody').on('click', 'button.btn-trash', function (){
						    var obj = dataTable2.row( $(this).parents('tr') ).data();
							//console.log(obj);	     	  
						    frm_delete_cus.find("#id_customer").val(obj[0]);
							$(".popup_delete_customer").find('#popup_delete_customer').modal('show');
						});
					 var modal_delete = $('.popup_delete_customer').find("#popup_delete_customer").find(".modal-content").find(".modal-body").find(".modal-footer");
					 
					 function delete_customer(){
			            var id_customer = frm_delete_cus.find("input#id_customer").val();
			         	var data = {
			                action : 'delete_customer',
			                dataType: 'JSON',
			                _id_customer : id_customer
			     			};
			        
			             $.post(ajaxurl, data, function(response){
				             var parsed_json = jQuery.parseJSON(response);
				             var error = parsed_json['error'];
				             console.log(parsed_json);
				             modal_delete.find('#loading').hide();
			             	 modal_delete.find('#response').show();
			                 modal_delete.find('#response').html(error);
			            	 dataTable2.row( $(this).parents('tr') ).remove().draw();
			             	 $(".popup_delete_customer").find('#popup_delete_customer').modal('toggle');
				                 
				            });
				            return false;
				         }
				        frm_delete_cus.find("#btn-trash").click(function(){
				            frm_delete_cus.find('#loading').show();
				            frm_delete_cus.find('#response').html('');
				            delete_customer();
				            return false;
				        });
				     //end customer   
					function customers_target_event(){
						//$('#sel-event-waiting').hide();
						var _idevent = $("#sel_target_event option:selected").val();
						var dataTable = $('#tb_target_event').DataTable( {
							"processing": true,
							"serverSide": true,
						    "bServerSide": true,
							"lengthMenu": [[25, 100,200,1000000, -1], [25, 100,200,1000000, "All"]],
							"pageLength": 25,
							"scrollY": "800px",
							"scrollX": "1200px",
							"scrollCollapse": true,
							//"paging":         false,
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
										'action': 'customer_target_event',
										'idevent': _idevent
								},
								error: function(){  // error handling
									$(".employee-grid-error").html("");
									$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
									$("#employee-grid_processing").css("display","none");
								}
							},
							"bDestroy": true
						} );
						return false;
					 }
					 $("#sel_target_event").change(function() {
					 	
					 	$('#sel_target_change').html();
						customers_target_event();
						return false;
					});

					// export email not read
					function customers_not_reach(){
						//$('#sel-event-waiting').hide();
						var _idevent = $("#sel_not_reach option:selected").val();
						//var events = $('#events');
						var table = $('#tb_customers_not_reach').DataTable();
						var dataTable = $('#tb_customers_not_reach').DataTable( {
							"processing": true,
							"serverSide": true,
						    "bServerSide": true,
							"lengthMenu": [[25, 100,200,1000000, -1], [25, 100,200,1000000, "All"]],
							"pageLength": 25,
							"scrollY": "800px",
							"scrollX": "1200px",
							"scrollCollapse": true,
							//"paging":         false,
							
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
										'action': 'customer_not_reach',
										'idevent': _idevent
								},
								error: function(){  // error handling
									$(".employee-grid-error").html("");
									$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
									$("#employee-grid_processing").css("display","none");
								}
							},
							"bDestroy": true
						} );
						return false;
					 }
					 $("#sel_not_reach").change(function() {			 	
					 	//$('#sel_target_change').html();
						customers_not_reach();
						return false;
					});
					

} );

