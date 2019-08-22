jQuery(document).ready(function($) {

    var wrap = $(".wrap").find(".tab-content").find(".tab-pane").find(".wrap-form");

    //console.log(frm_event);

    var frm_event = wrap.find("form.contact"); 

    //test required name event

    var name_event = frm_event.find('input#hatazu_event_name');

     //valid phone

     var pass_valid = false;

     name_event.keyup(function(){

        var len = $(this).val().length;

        if(len<5){

            pass_valid = false;

            frm_event.find(".alert-border").css({'border-color': '#D93944'});

        }else{

            pass_valid = true;

            frm_event.find(".alert-border").css({'border-color': '#50D888'});

            frm_event.find(".alert-danger").hide();

        }

     });

     name_event.change(function(){

        if(!pass_valid){

            frm_event.find(".alert-danger").show();

            return false;

        }

      });



    function hatazu_create_new_event(){      

        var name_event = frm_event.find('input#hatazu_event_name').val();

        var date_start = frm_event.find("input#datebook_start").val();

        var date_finish = frm_event.find("input#datebook_finish").val();    

        var data = {

                action: 'hatazu_create_new_event',

                _name_event:name_event,

                _time_start:date_start,

                _time_finish:date_finish

        };

        $.post(ajaxurl, data, function(response) {

                var parsed_json = jQuery.parseJSON(response);

                //console.log(parsed_json);

                var error = parsed_json['error'];

                frm_event.find("#response").html(error);

                frm_event.find('#loading').hide();

                if(error != null){

                    frm_event.find("#response").html(error); 

                }else{

                    frm_event.find("#response").html('');            

                }

                load_all_event_tb();          

            });

            return false;        

        }   

        frm_event.find("#btn-submit").click( function(){

            if(!pass_valid){

                alert("Tên sự kiện chưa hợp lệ");

                return false;

            }       

            frm_event.find('#loading').show();

            frm_event.find("#response").html('');

            hatazu_create_new_event();

            

            return false;

        });



    frm_event.find(".form_datetime_start").datetimepicker({

            format: "yyyy-mm-dd hh:ii",

            language: 'fr',

            //showMeridian: true,

            autoclose: true,

            todayBtn: true

    });

    frm_event.find(".form_datetime_finish").datetimepicker({

            format: "yyyy-mm-dd hh:ii",

            language: 'fr',

            //showMeridian: true,

            autoclose: true,

            todayBtn: true

    });

    var d = new Date();

	var month = d.getMonth()+1;

	var day = d.getDate();

	var output = d.getFullYear() + '-' +

	(month<10 ? '0' : '') + month + '-' +

	(day<10 ? '0' : '') + day;



	frm_event.find("#datebook_start").val(output + " 00:01:00");

	frm_event.find("#datebook_finish").val(output + " 00:01:00");



    var list_event = wrap.find(".list_event").find("#tb_event");



    //event

    var data_tb_event;

    function load_all_event_tb(){

            data_tb_event = list_event.DataTable( {

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

                        'action': 'load_all_event_tb'

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

     load_all_event_tb();

     var pop_event = $(".popup_event").find(".modal").find(".modal-dialog").find(".modal-content");

     var form_event = pop_event.find(".modal-body").find("#frm_delete_event");



         list_event.find('tbody').on('click', 'button', function (){                 

            var obj = data_tb_event.row( $(this).parents('tr') ).data();    

            form_event.find("input#id_event").val(obj[0]);

            pop_event.find("modal-footer").find('#response').html('');

            $('.popup_event').find("#popup_event").modal('show');

        });



        function delete_event(){

            var id_event = form_event.find("input#id_event").val();

            var data = {

                action : 'remove_event',

                dataType: 'JSON',

                _id_event : id_event        

            };

        

             $.post(ajaxurl, data, function(response){

                var parsed_json = jQuery.parseJSON(response);

                 var error = parsed_json['error'];

                 console.log(parsed_json);

                 pop_event.find(".modal-footer").find('#loading').hide();

                 //if(error!=''){

                     pop_event.find(".modal-footer").find('#response').show();

                     pop_event.find(".modal-footer").find('#response').html(error);

                     //return false;

                 //}

                 data_tb_event.row( $(this).parents('tr') ).remove().draw();

                 $('.popup_event').find("#popup_event").modal('toggle');                

            });

            return false;

        }

        form_event.submit(function(){

            pop_event.find(".modal-footer").find('#loading').show();

            pop_event.find(".modal-footer").find('#response').html('');

            delete_event();

            return false;

        });

          

     //end event

    $(".nav-tabs a").click(function(){

        $(this).tab('show');

    });

    $('.nav-tabs a').on('shown.bs.tab', function(event){

        var x = $(event.target).text();         // active tab

        var y = $(event.relatedTarget).text();  // previous tab

        // $(".act span").text(x);

        // $(".prev span").text(y);

    });

   

});

//cusomer join events

 

 $(document).ready(function() {

        var menu_join_event = $(".wrap").find(".tab-content").find("#menu3");

        var frm_sel = menu_join_event.find("form#frm_join_event");

         var tb_join_event = menu_join_event.find("table#tb_customers_join_event");

            //table join event 

            var data_join_event;          

            function customers_join_event(){

                //$('#sel-event-waiting').hide();

                var _idevent = frm_sel.find("#sel_event").find("option:selected").val();

                //alert( _idevent+"has change"); 

                if(_idevent ==''){

                    _idevent='2';

                }

                 data_join_event = tb_join_event.DataTable( {

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

                                'action': 'customer_join_event',

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

            }

            //end load event

            //select row table

            customers_join_event();

            var customer_event = $(".customer_event").find(".modal").find(".modal-dialog").find(".modal-content");

            var form_join = customer_event.find(".modal-body").find("form#frm_delete_join");    



         tb_join_event.find('tbody').on('click', 'button', function (){              

            var obj = data_join_event.row( $(this).parents('tr') ).data();

            //console.log(obj);    

            form_join.find("input#id_join").val(obj[0]);

            customer_event.find("modal-footer").find('#response').html('');

            $('.customer_event').find("#modal_popup").modal('show');

        });



        function delete_customer_join(){

            var id_join = form_join.find("input#id_join").val();

            var data = {

                action : 'delete_customer_join',

                _id_join : id_join 

            };

        

             $.post(ajaxurl, data, function(response){

                var parsed_json = jQuery.parseJSON(response);

                var error = parsed_json['error'];

                console.log(parsed_json);

                customer_event.find(".modal-footer").find('#loading').hide();

                 if(error != null){

                     customer_event.find(".modal-footer").find('#response').show();

                     customer_event.find(".modal-footer").find('#response').html(error);

                     return false;

                 }

                   data_join_event.row( $(this).parents('tr') ).remove().draw();

                    $('.customer_event').find("#modal_popup").modal('toggle');

                         

                    });

                    return false;

                }

                form_join.submit(function(){

                    customer_event.find(".modal-footer").find('#loading').show();

                    customer_event.find(".modal-footer").find('#response').html('');

                    delete_customer_join();

                    return false;

                });



                  //end delete

                  //select dropdown list event

                 frm_sel.find("#sel_event").change(function() {  

                     

                    $('#sel_change').html();

                    customers_join_event();     

                });

                 //end dropdown list

        //load all event   
    function load_all_event(){
       var data = {

        action : 'all_event'   

        };

        $.post(ajaxurl, data, function(response){

            var parsed_json = jQuery.parseJSON(response);

            $('#sel-event-waiting').hide();    

            frm_sel.find("#sel_event").empty(); //To reset cities

            frm_sel.find("#sel_event").append("<option>--Select--</option>");

            $(parsed_json).each(function(i) { //to list cities

                frm_sel.find("#sel_event").append("<option value=\"" + parsed_json[i].id + "\">" + parsed_json[i].name_event + "</option>")

            });

        });
    }

     //end load all event    

});