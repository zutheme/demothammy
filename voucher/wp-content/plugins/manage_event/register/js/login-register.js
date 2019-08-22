
function Validate(mobile) {

        var pattern = /^[0-9]*$/gm;

        if (pattern.test(mobile)) {

            return true;

        }       

        return false;

    }

jQuery(document).ready(function($) {

    var pass_valid = false;

    var select_place = 0;

    var btn_close = $(".hatazu_event_bsnhatoi").find(".modal").find(".modal-dialog").find(".modal-content").find(".modal-header").find("button.close");

    btn_close.click(function(){            

        //setCookieByMinutes("event_droh", 1, 10);  

    });

    

    var frm_register = $(".hatazu_event_bsnhatoi").find("#myModalevent").find(".modal-dialog").find(".modal-content").find(".modal-body").find("form#form_register_event");     

     //valid phone

     var pass_valid = false;

     frm_register.find('input#phone').keyup(function(){

        var len = $(this).val().length;

        var strfield = $(this).val();

       

        if(!Validate(strfield)){

            pass_valid = false;

            frm_register.find(".alert-danger").show();

        }else{

            //console.log("number");

            frm_register.find(".alert-danger").hide();

        }

        //console.log(result);     

        if(len <10 ){

            pass_valid = false;

            frm_register.find(".alert-border").css({'border-color': '#D93944'});       

        }else if(len > 12){

            frm_register.find(".alert-danger").show();

        }

        else{

            pass_valid = true;

            frm_register.find(".alert-border").css({'border-color': '#50D888'});

            frm_register.find(".alert-danger").hide();          

        }

     });

     frm_register.find('input#phone').change(function(){

        if(!pass_valid){

            frm_register.find(".alert-danger").show();

            return false;

        }else{



        }

      });

     function number_join_event_over_one(){    

        var phone = frm_register.find('input#phone').val();         

        var data = {

                action: 'number_join_event_over_one',

                security : MyAjax.security,

                _phone:phone

        };

        $.post(MyAjax.ajaxurl, data, function(response) {

                var parsed_json = jQuery.parseJSON(response);

                console.log(parsed_json);

                //var error = parsed_json['error'];

                //frm_register.find('.loading').hide();

                //if(error != ''){

                    //frm_register.find(".response").html(error); 

                //}else{

                    //frm_register.find(".response").html('<span style="font-size:16px;color:#fff">Chúc mừng bạn đã đăng ký thành công</span>');                

                //}          

        });

        return false;        

      } 

     //select place

     // frm_register.find('select.sel-service-care').change(function(){

     //    var selected = $(this).find(':selected').text();

     //    alert(selected);

     // });

     function hatazu_plug_user_register_event(){      

        var firstname = frm_register.find('input#firstname').val();

        //var lastname = frm_register.find('input#lastname').val();

        var phone = frm_register.find('input#phone').val();

        var email = frm_register.find('input#email').val();

        var selected = frm_register.find(".sel-service-care").find(':selected').val();

        var gift = voucher[rand];
        var e_img_voucher = e_gift.getElementsByClassName("hidden-voucher")[rand];
        var url_voucher = e_img_voucher.src;
        var address = frm_register.find('input#address').val();
        //console.log(gift); 
        var _data = {
                //action: 'hatazu_user_register_event',
                action: 'hatazu_user_register_event',
                security : MyAjax.security,
                _firstname:firstname,
                //_lastname:lastname,
                _phone:phone,
                _email:email,
                _gift:gift,
                _selected:selected,
                _address : address,
                _url_voucher : url_voucher
        };
        var formData = new FormData();
        formData.append('action', 'hatazu_user_register_event');
        formData.append('_firstname', firstname);
        formData.append('_address', address);
        formData.append('_email', email);
        formData.append('_phone', phone);
        formData.append('_gift', gift);
        formData.append('_selected', selected);
        formData.append('_url_voucher', url_voucher);
        $.ajax({
          type: 'POST',
          url: MyAjax.ajaxurl,
          data: formData,
          contentType: false,
          processData: false,
          success: function (data) {

            frm_register.find('.loading').hide();
            if(!data){

                frm_register.find(".response").html(data); 

            }else{

                setTimeout(function(){

                  $(".hatazu_event_bsnhatoi").find("#myModalevent").modal('hide'); 

                  frm_register.find(".response").html('');

                },3000);

                setCookieByHours("event_droh", 1, 24);

                frm_register.find(".response").html('<span style="font-size:16px;color:#451512">Chúc mừng bạn đã đăng ký thành công</span>');                

            }        
            return false;
          },
          error: function (data) {
            alert('There was an error uploading your file!');
          }
        });
        
        // $.post(MyAjax.ajaxurl, data, function(response) {

        //         var parsed_json = jQuery.parseJSON(response);

        //         console.log(parsed_json);

        //         var error = parsed_json['error'];

        //         frm_register.find('.loading').hide();

        //         if(error != ''){

        //             frm_register.find(".response").html(error); 

        //         }else{

        //             setTimeout(function(){

        //               $(".hatazu_event_bsnhatoi").find("#myModalevent").modal('hide'); 

        //               frm_register.find(".response").html('');

        //             },3000);

        //             setCookieByHours("event_droh", 1, 24);

        //             frm_register.find(".response").html('<span style="font-size:16px;color:#451512">Chúc mừng bạn đã đăng ký thành công</span>');                

        //         }          

        // });

        return false;        

        }   

        //frm_register.submit( function(){ 

        //frm_register.find("button.btn-join").click(function(){    
        frm_register.submit( function(){ 
          if(pass_valid==false) {    

              return false;

          }

          frm_register.find('.loading').show();

          frm_register.find(".response").html('');

          hatazu_plug_user_register_event();

          return false;

      }); 

});

jQuery(document).ready(function($) {

    var toogle = false;

    var modalbody = $(".hatazu_event_bsnhatoi").find(".modal").find(".modal-dialog").find(".modal-content").find(".modal-body");

    var width = $(window).width();

    if( width < 321){

        modalbody.css({'padding':'0px 1px'});

    }else if( 321 < width && width < 768){

        modalbody.css({'padding':'0px 20px'});

    }

    var condition_detail = $(".hatazu_event_bsnhatoi").find(".modal-footer").find(".detail-condition");

    var link_detail = $(".hatazu_event_bsnhatoi").find(".register").find(".footer-condition").find(".link_condition");

    link_detail.click(function(){

        if(!toogle){

            condition_detail.show();

            toogle = true;

        }else{

            toogle = false;

            condition_detail.hide();

        }

    });

});

jQuery(document).ready(function($) {



    var count_down = $(".hatazu_event_bsnhatoi").find(".count-down");

     // function hatazu_request_time_event(){      

     //    var get = 1;  

     //    var data = {

     //            action: 'hatazu_request_time_event',

     //            security : MyAjax.security,

     //            _get:get

     //    };

     //    $.post(MyAjax.ajaxurl, data, function(response) {

     //            var parsed_json = jQuery.parseJSON(response);

     //            //console.log(parsed_json);

     //            var error = parsed_json['error'];



     //            count_down.find('.loading').hide();

     //            if(error != ''){

     //                count_down.find(".response").html(error); 

     //            }else{   

     //                setTimeout(function(){ show_modal(); }, 1000); 

     //                var exp = parsed_json['end'];             

     //                countdown(exp);                               

     //            }          

     //    });

     //    return false;        

     //    }   

       

     //    setTimeout(function(){ 

     //        hatazu_request_time_event();

     //        count_down.find('.loading').show();

     //        count_down.find(".response").html('');

     //        return false;

     //     }, 2000); 
     setTimeout(function(){ show_modal(); }, 1000);
        function show_modal(){

            var user=getCookie("event_droh");

            //console.log(user);

            if (user == "") {  

                $(".hatazu_event_bsnhatoi").find("#myModalevent").modal();                             

            }

        }       

});

function countdown(date_expired){

    // Set the date we're counting down to

    var countDownDate = new Date(date_expired).getTime();



    // Update the count down every 1 second

    var x = setInterval(function() {



      // Get todays date and time

      var now = new Date().getTime();



      // Find the distance between now an the count down date

      var distance = countDownDate - now;



      // Time calculations for days, hours, minutes and seconds

      var days = Math.floor(distance / (1000 * 60 * 60 * 24));

      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

      var seconds = Math.floor((distance % (1000 * 60)) / 1000);



      // Display the result in the element with id="demo"

       //var day = document.getElementById("demo").getElementsByClassName("days");

       //console.log(day);

      

      //document.getElementById("demo").getElementsByClassName("days")[0].innerHTML=days+" <span>ngày</span>";

      //document.getElementById("demo").getElementsByClassName("hours")[0].innerHTML=hours+" <span>giờ</span>";

      //document.getElementById("demo").getElementsByClassName("minutes")[0].innerHTML=minutes+" <span>phút</span>";

      //document.getElementById("demo").getElementsByClassName("seconds")[0].innerHTML=seconds+" <span>giây</span>";

      //document.getElementById("demo1").getElementsByClassName("days")[0].innerHTML=days+" <span>ngày</span>";

      //document.getElementById("demo1").getElementsByClassName("hours")[0].innerHTML=hours+" <span>giờ</span>";

      //document.getElementById("demo1").getElementsByClassName("minutes")[0].innerHTML=minutes+" <span>phút</span>";

      //document.getElementById("demo1").getElementsByClassName("seconds")[0].innerHTML=seconds+" <span>giây</span>";

      //document.getElementById("demo").innerHTML = "<span>"+days + "</span>ngày <span>" + hours + "</span>h <span>"

      //+ minutes + "</span>' <span>" + seconds + "</span>''";



      // If the count down is finished, write some text 

      if (distance < 0) {

        clearInterval(x);

        //document.getElementById("demo").innerHTML = "EXPIRED";

      }

    }, 1000);

}

function setCookie(cname,cvalue,exdays) {

    var d = new Date();

    d.setTime(d.getTime() + (exdays*24*60*60*1000));

    var expires = "expires=" + d.toGMTString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}

function setCookieByHours(cname,cvalue,exdays) {

    var d = new Date();

    d.setTime(d.getTime() + (exdays*60*60*1000));

    //d.setTime(d.getTime() + (exdays*24*60*60*1000));

    var expires = "expires=" + d.toGMTString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}
function setCookieByMinutes(cname,cvalue,minute) {

    var d = new Date();

    d.setTime(d.getTime() + (minute*60*1000));

    //d.setTime(d.getTime() + (exdays*24*60*60*1000));

    var expires = "expires=" + d.toGMTString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}
function setCookieByCount(cname,cvalue) {

    var d = new Date();

    d.setTime(d.getTime() + (1*60*1000));

    //d.setTime(d.getTime() + (exdays*24*60*60*1000));

    var expires = "expires=" + d.toGMTString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}
function getCookie(cname) {

    var name = cname + "=";

    var decodedCookie = decodeURIComponent(document.cookie);

    var ca = decodedCookie.split(';');

    for(var i = 0; i < ca.length; i++) {

        var c = ca[i];

        while (c.charAt(0) == ' ') {

            c = c.substring(1);

        }

        if (c.indexOf(name) == 0) {

            return c.substring(name.length, c.length);

        }

    }

    return "";

}

if (typeof isRealValues == 'function') { 

  function isRealValues(obj)

  {

     return obj && obj !== 'null' && obj !== 'undefined';

   };

}

