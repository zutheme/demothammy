
jQuery(document).ready(function($) {
    $(".consultant").click(function(event){
        event.preventDefault();
        $("#modal-consultant").modal("show");
    });
    // setInterval(function(){ 
    //   $("#modal-consultant").modal("show"); 
    // }, 60000);
});
//test object
function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}
function reach_object(obj_message){
  for (var key in obj_message) {
      // skip loop if the property is from prototype
      if (!obj_message.hasOwnProperty(key)) continue;

      var obj = obj_message[key];
      for (var prop in obj) {
          // skip loop if the property is from prototype
          if(!obj.hasOwnProperty(prop)) continue;
          // your code
          console.log(prop + " = " + obj[prop]);
      }
  }
}
//end object
//begin modal form-survey
var modalreg = document.getElementsByClassName('modal-register')[0];
var _e_frm_reg = modalreg.getElementsByClassName('frm-register')[0];
var e_modal_survey = document.getElementsByClassName('reg-survey');
for (var i = e_modal_survey.length - 1; i >= 0; i--) {
    e_modal_survey[i].addEventListener("click", popup_modal);
}
var _nextlink = "";
var _price_pro = "giảm 10%";
var _e_khuyenmai = document.getElementsByClassName('khuyenmai')[0];
var _link_default = "https://thammyvienthienkhue.vn/mua-le-hoi-mua-lam-dep-duy-nhat-1-muc-gia-199k/";
var _modal = modalreg.getElementsByClassName('modal')[0];
var _a_link = document.getElementsByClassName('btn-link')[0];
var _e_head = _e_frm_reg.getElementsByClassName('promotion')[0];
var _e_discount = _e_frm_reg.getElementsByClassName('discount')[0];
var _e_payonline = _e_frm_reg.getElementsByClassName('payonline')[0];
var _e_select_sv = _e_frm_reg.getElementsByClassName('select-service')[0];
var lb_discount = '0';
var _lb_head = "";
var service = "";
var downlink;
function popup_modal(){
  //console.log(this);
  _modal.style.display = "block";
   var ful = modalreg.getElementsByClassName('fullname')[0].value;
   var classList = this.className.split(' ');
   var len = classList.length;
   var element_last = classList[len-1];
   var reg_survey = classList[0];
   if(element_last=='reg-survey'){
       service = classList[len-2];
       console.log(service);
       if(service=='k3000'){
          if(len > 2) {
            downlink = classList[len-3];
            var re = /[a-zA-Z]/;
            var service = service.replace(re, "");
            var price_sale = parseInt(service);
            var discount = price_sale - (price_sale*0.1);
            lb_discount = discount+"k";
             if(downlink =='d199'){
                 //_nextlink ="https://thammyvienthienkhue.vn/mua-le-hoi-mua-lam-dep-duy-nhat-1-muc-gia-199k/";
                 _nextlink ="https://thammyvienthienkhue.vn/uu-dai-199k/";
                 _price_pro ="199k";
                 _e_khuyenmai.innerHTML ="199k";
             }
          }
       }
       if(service=='k199'){
          if(len > 2) {
            downlink = classList[len-3];
            var re = /[a-zA-Z]/;
            var service = service.replace(re, "");
            var price_sale = parseInt(service);
            var discount = price_sale - (price_sale*0.1);
            lb_discount = discount+"k";
             if(downlink =='d99'){
                 //_nextlink ="https://thammyvienthienkhue.vn/mua-le-hoi-mua-lam-dep-duy-nhat-1-muc-gia-199k/";
                 _nextlink ="https://thammyvienthienkhue.vn/uu-dai-99k/";
                 _price_pro ="99k";
             }
          }
       }
       if(service=='k250'){
          if(len > 2) {
            downlink = classList[len-3];
             if(downlink =='d199'){
                 //_nextlink ="https://thammyvienthienkhue.vn/mua-le-hoi-mua-lam-dep-duy-nhat-1-muc-gia-199k/";
                 _nextlink ="https://thammyvienthienkhue.vn/uu-dai-199k/";
             }
          }
       }
       if(service=='k350'){
          //_lb_head = "Bạn được tặng thêm 4 buổi 350k khi đăng ký tại đây";
          _nextlink ="http://donggiadichvu199k.thammyvienthienkhue.vn/";
          _price_pro = "199k";
          lb_discount = "300k";
       }
       if(service=='d250'){
          //_lb_head = "Bạn được tặng thêm 4 buổi 350k khi đăng ký tại đây";
          _nextlink ="http://km250k.thammyvienthienkhue.vn/";
          _price_pro = "250k";
          lb_discount = "300k";
       }
       if(service=='k850'){
          //_lb_head = "Bạn được tặng thêm 4 buổi 350k khi đăng ký tại đây";
          _nextlink ="http://dk350.thammyvienthienkhue.vn/";
          _price_pro = "350k";
          lb_discount = "600k";
       }
       if(service=='k0'){
          //_lb_head = "Bạn được tặng thêm 4 buổi 350k khi đăng ký tại đây";
          _nextlink ="";
          _price_pro = "0";
          lb_discount = "200k";
       }
       if(service=='d350off'){
          //_lb_head = "Bạn được tặng thêm 4 buổi 350k khi đăng ký tại đây";
          _nextlink ="http://dk350.thammyvienthienkhue.vn/";
          _price_pro = "350k";
          lb_discount = "0";
       }
       if(service=='d0'){
          //_lb_head = "Bạn được tặng thêm 4 buổi 350k khi đăng ký tại đây";
          _nextlink ="#";
          _price_pro = "0";
          lb_discount = "0";
       }              
   }
   // else{
   //    _nextlink = _link_default;
   //    _price_pro = "350k";
   // }
  _a_link.href = _nextlink;
  // if(lb_discount=='0'){
  //   _e_payonline.style.display ="none";
  // }
  //_e_discount.innerHTML = lb_discount;
  //_e_khuyenmai.innerHTML = _price_pro;
  //_e_khuyenmai.innerHTML = "";
  _e_head.innerHTML = _lb_head;
}
var _e_close = modalreg.getElementsByClassName("close")[0];
//_e_close.addEventListener("click", close_pupup);
_e_close.onclick = function(){
     _modal.style.display = "none";
}

// Get the modal
var e_close = modalreg.getElementsByClassName("close")[0];
e_close.addEventListener("click", popup_langding);
var e_modal_floor2 = document.getElementsByClassName('modal-form-popup-floor2')[0];
//console.log(e_modal_floor2);
var modal_floor2 = e_modal_floor2.getElementsByClassName('modal')[0];
var btnclose_floor2 = e_modal_floor2.getElementsByClassName("close")[0];
function popup_langding(){
	//console.log(service);
  if((service=='k0')||(service=='d0')){
    modal_floor2.style.display = "none";
  }else if(downlink=='d199') {
    modal_floor2.getElementsByClassName('orther-link')[0].setAttribute('href',_nextlink);
  	modal_floor2.style.display = "block";
  }else if(downlink=='d99'){
     _nextlink ="https://thammyvienthienkhue.vn/uu-dai-99k/";
    modal_floor2.getElementsByClassName('orther-link')[0].setAttribute('href',_nextlink);
    modal_floor2.style.display = "block";
  }
}
// When the user clicks on <span> (x), close the modal
var e_modal_floor3 = document.getElementsByClassName('modal-form-popup-floor3')[0]
var modal_floor3 = e_modal_floor3.getElementsByClassName('modal')[0];
var btnclose_floor3 = e_modal_floor3.getElementsByClassName("close")[0];
btnclose_floor2.onclick = function() {
  modal_floor2.style.display = "none";
  if(downlink=='d199'){
    modal_floor3.style.display = "block";
  }
}
btnclose_floor3.onclick = function() {
  modal_floor3.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
//end notify
var _address="";
var _job="";
var _check_method;
var ele_survey = _e_frm_reg.getElementsByClassName("btn-reg-survey")[0];
ele_survey.addEventListener("click", reg_survey);
//check checkout
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);
    if (elt.selectedIndex == -1)
        return null;
    return elt.options[elt.selectedIndex].text;
}
function reg_survey(){
  var _e_frm_reg = modalreg.getElementsByClassName('frm-register')[0];
  var _modal = modalreg.getElementsByClassName('modal')[0];
  var _url = document.URL;
  var _e_frm_reg = this.parentElement.parentElement;
  //console.log(_e_frm_reg);
  var _efullname = _e_frm_reg.getElementsByClassName('fullname')[0];
  //console.log(_efullname);
  var _fullname = _efullname.value;
  var _ephone = _e_frm_reg.getElementsByClassName('phone')[0];
  var _e_result = _e_frm_reg.getElementsByClassName('result')[0];
  var checkBox = _e_frm_reg.getElementsByClassName('messageCheckbox')[0];
  var name_sevice = getSelectedText('select-service');
  var str_method = "";
  if (checkBox.checked == true){
    str_method = "Chúng tôi sẽ liên hệ để hướng dẫn thanh toán chuyển khoản</br>Cảm ơn quý khách!";
  } else {
    str_method = "Chúng tôi sẽ liên hệ quý khách để hướng dẫn đặt lịch</br>Cảm ơn quý khách!";
  }
  var _phone = _ephone.value;
  if(!_phone){
      _ephone.style.borderColor = "red";
     _e_result.innerHTML = "Vui lòng nhập số điện thoại";
      return false;
  }
  if(!_fullname){
      _efullname.style.borderColor = "red";
      _e_result.innerHTML = "Vui lòng nhập họ tên";
      return false;
  }
  var _email = _e_frm_reg.getElementsByClassName('email')[0].value;
  //console.log('_fullname='+_fullname);
  //checklistbox();
  var _nameservice = document.getElementsByClassName('name_service')[0].value;
  _check_method = document.getElementsByClassName('checkout_medthod')[0].value;
  _address = "tagdiv:"+service+", tt:"+_check_method+", dich vụ:"+name_sevice;
  _job = _url;
  var http = new XMLHttpRequest();
  var url = "https://thammyvienthienkhue.com.vn/api/svcustomers";
  //var obj = JSON.stringify({name:"John Rambo", email:_email});
  //var params = "action=hatazu_plug_register_customer&email="+obj;
  var params = "firstname="+_fullname+"&mobile="+_phone+"&email="+_email+"&address="+_address+"&job="+_job;
  http.open("POST", url, true);
  // //Send the proper header information along with the request
  http.setRequestHeader("Accept", "application/json");
  http.withCredentials = true;
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  var load = _e_frm_reg.getElementsByClassName("loading")[0];
  load.style.display = "block";
  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);      
           //reach_object(myArr);
           Object.keys(myArr).forEach(function(key) {      
            if(key=='success'){
               _e_frm_reg.getElementsByClassName('fullname')[0].value = "";
                _e_frm_reg.getElementsByClassName('phone')[0].value = "";
                _e_frm_reg.getElementsByClassName('email')[0].value = "";
                _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "Cảm ơn bạn "+myArr[key].firstname+" đã tham gia<br>"+str_method;
                setTimeout(function(){
                  _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "";
                  _modal.style.display = "none";
                },6000);  
            }else if(key=='error'){
              _e_frm_reg.getElementsByClassName("result")[0].innerHTML = myArr[key].error;
            }
          });
          load.style.display = "none";      
      }
  }
  http.send(params);
}


var _fb_dialog;
var e_tawkchat;
var _circle;
var _show = false;
setTimeout(function(){
  _fb_dialog = document.getElementsByClassName("fb_dialog")[0];
  if(_fb_dialog){
    _fb_dialog.style.bottom ="70pt";
  }
},6000);
function tawkchat(){
	e_tawkchat = document.getElementById("tawkchat-maximized-wrapper");
    //console.log(e_tawkchat);
}
var hl_toogle = false;

window.addEventListener("scroll", showmessenger,false);
//var _e_quick_link = document.getElementById("quick-link");
function showmessenger(){ 
   var top = window.pageYOffset; 
   //_fb_dialog = document.getElementsByClassName("fb_dialog")[0];
  var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  if(top > 0){
  				
  }
}

 function isRealValues(obj)
  {
   return obj && obj !== 'null' && obj !== 'undefined';
  }

function deleteCookie(cookiename){
      var d = new Date();
      d.setDate(d.getDate() - 1);
      var expires = ";expires="+d;
      var name=cookiename;
      //alert(name);
      var value="";
      document.cookie = name + "=" + value + expires + "; path=/";                    
  }
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setCookieHours(cname,cvalue,hours) {
    var d = new Date();
    d.setTime(d.getTime() + (hours*60*60*1000));
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
// request permission on page load
document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe() {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('Chỉ dành cho bạn', {
      icon: 'https://thammyvienthienkhue.vn/wp-content/themes/thienkhue/images/logo/logo-thienkhue.png',
      body: "Nhận chường trình khuyến mãi",
    });

    notification.onclick = function () {
      window.open("http://donggiadichvu199k.thammyvienthienkhue.vn/");  
    };

  }
}