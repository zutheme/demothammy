function extractHostname(url) {
    var hostname;
    //find & remove protocol (http, ftp, etc.) and get hostname
    if (url.indexOf("//") > -1) {
        hostname = url.split('/')[2];
    }
    else {
        hostname = url.split('/')[0];
    }
    //find & remove port number
    hostname = hostname.split(':')[0];
    //find & remove "?"
    hostname = hostname.split('?')[0];
    return hostname;
}
// To address those who want the "root domain," use this function:
function extractRootDomain(url) {
    var domain = extractHostname(url),
        splitArr = domain.split('.'),
        arrLen = splitArr.length;
    //extracting the root domain here
    //if there is a subdomain 
    if (arrLen > 2) {
        domain = splitArr[arrLen - 2] + '.' + splitArr[arrLen - 1];
        //check to see if it's using a Country Code Top Level Domain (ccTLD) (i.e. ".me.uk")
        if (splitArr[arrLen - 2].length == 2 && splitArr[arrLen - 1].length == 2) {
            //this is using a ccTLD
            domain = splitArr[arrLen - 3] + '.' + domain;
        }
    }
    return domain;
}
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

//consultant
var _modal_consultant_form = document.getElementsByClassName('modal-consultant-form')[0];
console.log(_modal_consultant_form);
var _e_modal_consultant = _modal_consultant_form.getElementsByClassName('modal-consult')[0];
var _e_consultant_form = _modal_consultant_form.getElementsByClassName('frm-register')[0];
var _e_btn_consultant = document.getElementsByClassName('btn-consultant');
for (var i = _e_btn_consultant.length - 1; i >= 0; i--) {
    _e_btn_consultant[i].addEventListener("click", show_consultant_popup);
}
// var _e_call_contact = document.getElementsByClassName('call-mobile')[0].getElementsByClassName('btn-consultant')[0];
// _e_call_contact.addEventListener("click", show_consultant_popup);
//console.log(cat_parent);
function show_consultant_popup(){
  _e_modal_consultant.style.display = "block";
  countdown();
}
var _e_close = _e_modal_consultant.getElementsByClassName('close')[0];
_e_close.addEventListener("click", close_consultant_popup);
function close_consultant_popup(){
    setCookieHours('popup',1,0.84); //after 5 minutes
   _e_modal_consultant.style.display = "none";
}
console.log(cat_parent);
setInterval(function(){
  var _pop = getCookie('popup');
   if(!isRealValues(_pop) && cat_parent!='blog-lam-dep'){
      _e_modal_consultant.style.display = "block";
      countdown(); 
   }
}, 60000);
function countdown(){
  var initdate = new Date().getTime();
  var countDownDate = new Date(initdate + 3*60000);
  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get todays date and time
    var now = new Date().getTime();
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    // If the count down is finished, write some text 
    if (distance < 0) {
      clearInterval(x);
      _e_modal_consultant.style.display = "none";
      setCookieHours('popup',1,0.84);
      //console.log(_e_modal_consultant);
    }
  }, 1000);
}
//register consultant
var e_btn_reg_consult = _e_consultant_form.getElementsByClassName('btn-reg-survey')[0];
e_btn_reg_consult.addEventListener("click", reg_consultant);
function reg_consultant(){
  var _url = document.URL;
  
  _host = extractHostname(_url);
  var _e_frm_reg = this.parentElement.parentElement;
  //console.log(_e_frm_reg);
  var _efullname = _e_consultant_form.getElementsByClassName('fullname')[0];
   //var _e_address = _e_consultant_form.getElementsByClassName('address')[0];
  //console.log(_efullname);
  var _fullname = _efullname.value;
  var _ephone = _e_consultant_form.getElementsByClassName('phone')[0];
  //var _address = _e_consultant_form.getElementsByClassName('address')[0].value;
  //var checkBox = _e_consultant_form.getElementsByClassName('messageCheckbox')[0];
  //var name_sevice = getSelectedText('select-service');
  var str_method = "";
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
  var _email = _e_consultant_form.getElementsByClassName('email')[0].value;
  var e_sel_service = document.getElementsByName("sel-service")[0];
  //var depart_selected = e_sel_service.options[e_sel_service.selectedIndex].value;
  var depart_selected = e_sel_service.options[e_sel_service.selectedIndex].text;
  
  var _reg_url = _url.replace(/[&]/g, ';');
  var info = _reg_url;

  if(!isRealValues(gbdataURL)){
    gbdataURL="nofile";
  }
  var http = new XMLHttpRequest();
  var url = "https://thammyvienthienkhue.com.vn/api/customer/consultant";
  //var url = "/marketing/api/customer/consultant";
  var params = JSON.stringify({firstname: _fullname, mobile: _phone, email:_email ,address:depart_selected, job:info, orfilename:original_filename, file:gbdataURL});
  //var params = "firstname="+_fullname+"&mobile="+_phone+"&email="+_email+"&address="+_address+"&job="+_url+","+_host+","+depart_selected;
 
  http.open("POST", url, true);
  //Send the proper header information along with the request
  http.setRequestHeader("Accept", "application/json");
  http.withCredentials = true;
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var load = _e_frm_reg.getElementsByClassName("loading")[0];
  load.style.display = "block";
  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);      
           console.log(myArr);
           Object.keys(myArr).forEach(function(key) {      
            if(key=='success'){
               _e_frm_reg.getElementsByClassName('fullname')[0].value = "";
                _e_frm_reg.getElementsByClassName('phone')[0].value = "";
                _e_frm_reg.getElementsByClassName('email')[0].value = "";
                //_e_frm_reg.getElementsByClassName('address')[0].value = "";
                _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "Cảm ơn bạn "+myArr.firstname+" đã tham gia<br>";
                var myCanvas = document.getElementById('my_canvas_id');
                var ctx = myCanvas.getContext('2d');
                ctx.clearRect(0, 0, myCanvas.width, myCanvas.height);
                myCanvas.setAttribute("height", "0px");
				        myCanvas.setAttribute("width", "0px");
                setTimeout(function(){
                  _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "";
                  _e_modal_consultant.style.display = "none";
                  var _pop = getCookie('popup');
                   if(!isRealValues(_pop)){
                      setCookieHours('popup',1,0.5);
                   }
                },6000);
                  
            }else if(key=='error'){
              _e_frm_reg.getElementsByClassName("result")[0].innerHTML = myArr.error;
            }
          });
          load.style.display = "none";      
      }
  }
  http.send(params);
}
var downlink ="";
//promotion
var _modal_promo_form = document.getElementsByClassName('modal-promo-form')[0];
var _e_modal_promo = _modal_promo_form.getElementsByClassName('modal-promo')[0];
var _e_promo_form = _modal_promo_form.getElementsByClassName('frm-promo')[0];
//assign button register promo
var _e_btn_promo = document.getElementsByClassName('reg-survey');
for (var i = _e_btn_promo.length - 1; i >= 0; i--) {
    _e_btn_promo[i].addEventListener("click", show_promo_popup);
}
function show_promo_popup(){
  _e_modal_promo.style.display = "block";
}
var _e_close = _e_modal_promo.getElementsByClassName('close')[0];
_e_close.addEventListener("click", close_promo_popup);
function close_promo_popup(){
   _e_modal_promo.style.display = "none";
}
var e_btn_reg_promo = _e_promo_form.getElementsByClassName('btn-reg-survey')[0];
e_btn_reg_promo.addEventListener("click", reg_promo);
function reg_promo(){
  var _url = document.URL;
  _host = extractHostname(_url);
  var _e_frm_reg = this.parentElement.parentElement;
  var _efullname = _e_promo_form.getElementsByClassName('fullname')[0];
   //var _e_address = _e_promo_form.getElementsByClassName('address')[0];
  var _fullname = _efullname.value;
  var _ephone = _e_promo_form.getElementsByClassName('phone')[0];
  //var _address = _e_promo_form.getElementsByClassName('address')[0].value;
  //var checkBox = _e_promo_form.getElementsByClassName('messageCheckbox')[0];
  //var name_sevice = getSelectedText('select-service');
  var str_method = "";
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
  var _email = _e_promo_form.getElementsByClassName('email')[0].value;
  var e_sel_local = document.getElementsByName("sel-local")[0];
  //var depart_selected = e_sel_service.options[e_sel_service.selectedIndex].value;
  var local_selected = e_sel_local.options[e_sel_local.selectedIndex].text;
  var _reg_url = _url.replace(/[&]/g, ';');
  var info = _reg_url;
  if(!isRealValues(gbdataURL)){
    gbdataURL="nofile";
  }
  
  var http = new XMLHttpRequest();
  var url = "https://thammyvienthienkhue.com.vn/api/customer/consultant";
  //var url = "/marketing/api/customer/consultant";
  var params = JSON.stringify({firstname: _fullname, mobile: _phone, email:_email ,address:local_selected, job:info, orfilename:original_filename, file:gbdataURL});
  //var params = "firstname="+_fullname+"&mobile="+_phone+"&email="+_email+"&address="+local_selected+"&job="+_url+"&orfilename="+original_filename+"&file="+gbdataURL;
  
  //console.log("url="+_url);
  http.open("POST", url, true);
  http.setRequestHeader("Accept", "application/json");
  http.withCredentials = true;
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var load = _e_frm_reg.getElementsByClassName("loading")[0];
  load.style.display = "block";
  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);      
           console.log(myArr);
           Object.keys(myArr).forEach(function(key) {      
            if(key=='success'){
               _e_frm_reg.getElementsByClassName('fullname')[0].value = "";
                _e_frm_reg.getElementsByClassName('phone')[0].value = "";
                _e_frm_reg.getElementsByClassName('email')[0].value = "";
                //_e_frm_reg.getElementsByClassName('address')[0].value = "";
                _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "Cảm ơn bạn "+myArr.firstname+" đã tham gia<br>";
                downlink="d0";
                setTimeout(function(){
                  _e_frm_reg.getElementsByClassName("result")[0].innerHTML = "";
                  _e_modal_promo.style.display = "none";
                },6000);
                  
            }else if(key=='error'){
              _e_frm_reg.getElementsByClassName("result")[0].innerHTML = myArr.error;
            }
          });
          load.style.display = "none";      
      }
  }
  http.send(params);
}
// var e_test = document.getElementsByClassName("test-bottom")[0];
// e_test.addEventListener("click", test_width);
// function test_width(){
// 	var w = document.documentElement.clientWidth;
// 	var h = document.documentElement.clientHeight;
// 	console.log("w="+w);
// }
/*javascript*/
//floor 2
var _modal_floor2_form = document.getElementsByClassName('modal-floor2-form')[0];
var _e_modal_floor2 = _modal_floor2_form.getElementsByClassName('modal-floor2')[0];
var _e_floor2_form = _modal_floor2_form.getElementsByClassName('frm-floor2')[0];
var _e_close_floor2 = _e_modal_floor2.getElementsByClassName('close')[0];
//floor 3
var _modal_floor3_form = document.getElementsByClassName('modal-floor3-form')[0];
var _e_modal_floor3 = _modal_floor3_form.getElementsByClassName('modal-floor3')[0];
var _e_floor3_form = _modal_floor3_form.getElementsByClassName('frm-floor3')[0];
var _e_close_floor3 = _e_modal_floor3.getElementsByClassName('close')[0];
//floor 4
var _modal_floor4_form = document.getElementsByClassName('modal-floor4-form')[0];
var _e_modal_floor4 = _modal_floor4_form.getElementsByClassName('modal-floor4')[0];
var _e_floor4_form = _modal_floor4_form.getElementsByClassName('frm-floor4')[0];
var _e_close_floor4 = _e_modal_floor4.getElementsByClassName('close')[0];
//assign button register promo
var _e_btn_promo = document.getElementsByClassName('reg-survey');
for (var i = _e_btn_promo.length - 1; i >= 0; i--) {
    _e_btn_promo[i].addEventListener("click", show_promo_popup);
}

function show_promo_popup(){
  console.log(this);
  _e_modal_promo.style.display = "block";
  var classList = this.className.split(' ');
   var len = classList.length;
   console.log(len);
   if(len > 1) {
      downlink1 = classList[len-2];
      console.log(downlink1);
    }
    if ( len > 2 ) {
      downlink2 = classList[len-3];
      console.log(downlink2);
    }
}
var _e_close = _e_modal_promo.getElementsByClassName('close')[0];
_e_close.addEventListener("click", close_promo_popup);
function close_promo_popup(){
   _e_modal_promo.style.display = "none";
      // if(downlink1=='d0'){
      //     _e_modal_floor2.style.display = "none";
      // }
      // if(downlink1=='d199k'){
      //       _e_modal_floor3.style.display = "block";
      // }
      if((downlink1=='d350k')||(downlink1=='d199k')||(downlink1=='k5000')||(downlink1=='d0')){
          _e_modal_floor2.style.display = "block";
      }else{
         _e_modal_floor2.style.display = "block";
      }
}
_e_close_floor2.addEventListener("click", close_floor2_popup);
function close_floor2_popup(){
   _e_modal_floor2.style.display = "none";
   _e_modal_floor3.style.display = "none";
   //_e_modal_floor4.style.display = "none";
}
_e_close_floor3.addEventListener("click", close_floor3_popup);
function close_floor3_popup(){
   _e_modal_floor3.style.display = "none";
   //_e_modal_floor4.style.display = "block";
   //console.log(_e_modal_floor3);
}
_e_close_floor4.addEventListener("click", close_floor4_popup);
function close_floor4_popup(){
   _e_modal_floor4.style.display = "none";
}