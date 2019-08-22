//pick up
(function( $ ) {
 
    "use strict";
     
    // javascript code here. i.e.: $(document).ready( function(){} ); 
   
  //   $(".nav-tabs a").click(function(event){
  //     $(this).tab('show');
  //     event.preventDefault();
  // });
     var frm_pickup = $("#content-pick-up").find(".area-form").find("form#form_register_app"); 
    //console.log(frm_pickup); 
    var pass_valid = false;
     frm_pickup.find('input#phone').keyup(function(){
        var len = $(this).val().length;
        if(len<10){
            pass_valid = false;
            frm_pickup.find(".alert-border").css({'border-color': '#D93944'});
        }else{
            pass_valid = true;
            frm_pickup.find(".alert-border").css({'border-color': '#50D888'});
            frm_pickup.find(".alert-danger").hide();
        }
     });
     frm_pickup.find('input#phone').change(function(){
        if(!pass_valid){
            frm_pickup.find(".alert-danger").show();
            return false;
        }
      });
    function hatazu_plug_register_consultant(){
        var firstname = frm_pickup.find('input#firstname').val(); 
        var phone = frm_pickup.find('input#phone').val();  
        var message = frm_pickup.find('textarea#message').val(); 
        //alert(firstname+","+phone+","+message);   
        var data = {
                action: 'hatazu_plug_register_consultant',
                security : MyAjax.security,
                _firstname : firstname,
                _phone : phone,
                _message : message      
        };
        $.post(MyAjax.ajaxurl, data, function(response) {
                var parsed_json = jQuery.parseJSON(response);
                console.log(parsed_json);
                var error = parsed_json['error'];
                frm_pickup.find('#loading').hide();
                frm_pickup.find("#response").html(error); 
                if(error != null){
                    frm_pickup.find("#response").html(error); 
                }else{
                    frm_pickup.find("#response").html('<span style="font-size:14px;color:#50D787;">Cảm ơn bạn đã tham gia tư vấn</span>');
                    setTimeout(function(){
                        frm_pickup.find("#response").html('');                
                        frm_pickup[0].reset(); 
                    }, 3000);                 
                }          
        });
        return false;    
    }
    //frm_pickup.submit(function(){
    frm_pickup.find("button#btn-pick-up").click(function(){
        //alert("pick-up");
        if(isRealValue(obj)){
            frm_pickup.find(".alert-danger").show();
            alert("Thông tin không hợp lệ");
            return false;
        }
        frm_pickup.find(".alert-danger").hide();
        frm_pickup.find("#loading").show();
        frm_pickup.find("#response").html('');
        hatazu_plug_register_consultant();
        return false;
    });
    //contact
    var frm_contact = $(".content").find("form#fr_sendmessage");    
    var pass = false;
    var _name='',email='',message='';
     frm_contact.find('input#name').change(function(){
       _name = $(this).val();
      });
      frm_contact.find('input#email').change(function(){
        email = $(this).val();     
      });
      frm_contact.find('textarea#message').change(function(){
        message = $(this).val();
      }); 
        //alert(firstname+","+phone+","+message);   
    function hatazu_plug_register_consultant(){  
        var data = {
                action: 'hatazu_plug_register_consultant',
                security : MyAjax.security,
                _firstname : _name,
                _email : email,
                _message : message      
        };
        $.post(MyAjax.ajaxurl, data, function(response) {
                var parsed_json = jQuery.parseJSON(response);
                //console.log(parsed_json);
                var error = parsed_json['error'];
                frm_contact.find('#loading').hide();
                frm_contact.find("#response").html(error); 
                if(error != null){
                    frm_contact.find("#response").html(error); 
                }else{
                    frm_contact.find("#response").html('<span style="font-size:14px;color:#50D787;">Cảm ơn bạn đã tham gia tư vấn</span>');
                    setTimeout(function(){
                        frm_contact.find("#response").html('');                
                        frm_contact[0].reset(); 
                    }, 3000);                 
                }          
        });
        return false;    
    }
    //frm_contact.submit(function(){
    frm_contact.find("button#btn-sendmessage").click(function(){
        if(!isRealValue(_name)||!isRealValue(email)||!isRealValue(message)){
            alert("Thông tin không hợp lệ"+",pass="+pass+",name="+name+",message="+message+",email="+email);
            return false;
        }
        frm_contact.find("#loading").show();
        frm_contact.find("#response").html('');
        hatazu_plug_register_consultant();
        return false;
    });
})(jQuery);

function isRealValue(obj)
{
  return obj && obj !== 'null' && obj !== 'undefined';
}