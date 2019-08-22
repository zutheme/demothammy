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
var _e_modal_popup = document.getElementsByClassName('modal-popup-box')[0];
//var _e_frm_reg = _e_modal_popup.getElementsByClassName('frm-popup')[0];
// var e_modal_popup = document.getElementsByClassName('reg-popup');
// for (var i = e_modal_popup.length - 1; i >= 0; i--) {
//     e_modal_popup[i].addEventListener("click", popup_modal);
// }
var _modal_popup = _e_modal_popup.getElementsByClassName('modal')[0];
var _pop;
setInterval(function(){
  _pop = getCookie('pop');
  console.log("_pop="+_pop);
   if(!isRealValues(_pop)){
      _modal_popup.style.display = "block";
      //setCookieHours('pop',1,0.5);
   }
 }, 30000);
// setTimeout(function popup_modal(){
//    _pop = getCookie('pop');
//    if(!isRealValues(_pop)){
//       _modal_popup.style.display = "block";
//       setCookieHours('pop',1,0.5);
//    }
  
// },6000);

  // var id = setInterval(frame, 1000);
  // function frame() {
  //     clearInterval(id);
  // }
var _e_close = _e_modal_popup.getElementsByClassName("close")[0];
_e_close.addEventListener("click", close_pupup);
function close_pupup(){
    setCookieHours('pop',1,0.05);//3 minutes
    _modal_popup.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    
    if (event.target == modal) {
        
        _modal_popup.style.display = "none";
    }
}
// _modal_popup.addEventListener("click", function(event) {
//    alert("outside");
// });
window.addEventListener("click", function(event) {
        _modal_popup.style.display = "none";
        //setCookieHours('pop',1,0.5);
});
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
        return null;

    return elt.options[elt.selectedIndex].text;
}
// function reg_survey(){
//   var _e_frm_reg = _modal_popup.getElementsByClassName('frm-popup')[0];
//   var _modal = _modal_popup.getElementsByClassName('modal')[0];
//   var _url = document.URL;
//   var _e_frm_reg = this.parentElement.parentElement;
//   //console.log(_e_frm_reg);
//   var _efullname = _e_frm_reg.getElementsByClassName('fullname')[0];
//   //console.log(_efullname);
//   var _fullname = _efullname.value;
//   var _ephone = _e_frm_reg.getElementsByClassName('phone')[0];
//   var _e_result = _e_frm_reg.getElementsByClassName('result')[0];
//   //var checkBox = _e_frm_reg.getElementsByClassName('messageCheckbox')[0];
//   var name_sevice = getSelectedText('select-service');
//   var str_method = "";
//   if (checkBox.checked == true){
//     str_method = "Chúng tôi sẽ liên hệ để hướng dẫn thanh toán chuyển khoản</br>Cảm ơn quý khách!";
//   } else {
//     str_method = "Chúng tôi sẽ liên hệ quý khách để hướng dẫn đặt lịch</br>Cảm ơn quý khách!";
//   }
//   var _phone = _ephone.value;
//   if(!_phone){
//       _ephone.style.borderColor = "red";
//      _e_result.innerHTML = "Vui lòng nhập số điện thoại";
//       return false;
//   }
//   if(!_fullname){
//       _efullname.style.borderColor = "red";
//       _e_result.innerHTML = "Vui lòng nhập họ tên";
//       return false;
//   }
//   var _email = _e_frm_reg.getElementsByClassName('email')[0].value;
  
//   _address = " tt:"+str_method+", dich vụ:"+name_sevice;
//   _job = _url;
//   var http = new XMLHttpRequest();
//   var url = "https://thammyvienthienkhue.com.vn/api/svcustomers";
//   //var obj = JSON.stringify({name:"John Rambo", email:_email});
//   //var params = "action=hatazu_plug_popup_customer&email="+obj;
//   var params = "firstname="+_fullname+"&mobile="+_phone+"&email="+_email+"&address="+_address+"&job="+_job;
//   http.open("POST", url, true);
//   // //Send the proper header information along with the request
//   http.setRequestHeader("Accept", "application/json");
//   http.withCredentials = true;
//   http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
//   var load = _e_frm_reg.getElementsByClassName("loading")[0];
//   load.style.display = "block";
//   http.onreadystatechange = function() {
//       if(http.readyState == 4 && http.status == 200) {
//            var myArr = JSON.parse(this.responseText);      
//            //reach_object(myArr);
//            Object.keys(myArr).forEach(function(key) {      
//             if(key=='success'){
//                _e_frm_reg.getElementsByClassName('fullname')[0].value = "";
//                 _e_frm_reg.getElementsByClassName('phone')[0].value = "";
//                 _e_frm_reg.getElementsByClassName('email')[0].value = "";
//                 _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "Cảm ơn bạn "+myArr[key].firstname+" đã tham gia<br>"+str_method;
//                 setTimeout(function(){
//                   _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "";
//                   _modal.style.display = "none";
//                 },6000);  
//             }else if(key=='error'){
//               _e_frm_reg.getElementsByClassName("result")[0].innerHTML = myArr[key].error;
//             }
//           });
//           load.style.display = "none";      
//       }
//   }
//   http.send(params);
// }


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
