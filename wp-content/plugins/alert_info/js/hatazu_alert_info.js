//test object
var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
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

//begin alert form-survey

var _e_alert_popup = document.getElementsByClassName('alert-popup')[0];



var _pop;

var _popup = false;

setInterval(function(){

  _pop = getCookie('pop');

   //if(!isRealValues(_pop)){

    if(!_popup && _width > 991){

       request_random();

       _popup = true;

     }else {

        _e_alert_popup.style.display = "none";

        _popup = false;

     }  

      //setCookieHours('pop',1,0.5);

   //}

 }, 5000);

function request_random(){

  var http = new XMLHttpRequest();

  var url = MyAjax.ajaxurl;

  //var obj = JSON.stringify({name:"John Rambo", email:_email});

  //var params = "action=hatazu_plug_register_customer&email="+obj;

  var params = "action=rand_post&_idpost="+1;

  http.open("POST", url, true);

  // //Send the proper header information along with the request

  http.setRequestHeader("Accept", "application/json");

  //http.withCredentials = true;

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 

  //var load = _e_frm_reg.getElementsByClassName("loading")[0];

  //load.style.display = "block";

  http.onreadystatechange = function() {

      if(http.readyState == 4 && http.status == 200) {

           var myArr = JSON.parse(this.responseText);      

           _e_alert_popup.getElementsByTagName("img")[0].src = myArr.img_src;

           _e_alert_popup.getElementsByClassName("content")[0].getElementsByTagName("p")[0].innerHTML = "Khách hàng "+myArr.idcustomer+"/50";

           _e_alert_popup.getElementsByClassName("content")[0].getElementsByTagName("h3")[0].innerHTML = myArr.title;

           _e_alert_popup.getElementsByClassName("content")[0].getElementsByTagName("p")[1].innerHTML = "Đã đăng ký "+myArr.recent+" phút trước";

            _e_alert_popup.style.display = "block";

          //load.style.display = "none";      

      }

  }

  http.send(params);

}



// var id = setInterval(frame, 1000);

//   function frame() {

//       clearInterval(id);

//   }

// setTimeout(function popup_alert(){

//    _pop = getCookie('pop');

//    if(!isRealValues(_pop)){

//       _e_alert_popup.style.display = "block";

//       setCookieHours('pop',1,0.5);

//    }

  

// },6000);



var _e_close = _e_alert_popup.getElementsByClassName("close")[0];

_e_close.addEventListener("click", close_pupup);

function close_pupup(){

    //setCookieHours('pop',1,0.080);//5 minutes

    _e_alert_popup.style.display = "none";

}



// When the user clicks anywhere outside of the alert, close it

window.onclick = function(event) {  

    if (event.target == alert) {

        setCookieHours('pop',1,0.80);

        _e_alert_popup.style.display = "none";

    }

}

// _e_alert_popup.addEventListener("click", function(event) {

//    alert("outside");

// });

window.addEventListener("click", function(event) {

        _e_alert_popup.style.display = "none";

        //setCookieHours('pop',1,0.83);

});

function getSelectedText(elementId) {

    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)

        return null;

    return elt.options[elt.selectedIndex].text;

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
// var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
// console.log(width);
// setTimeout(function(){
//   var x = document.getElementsByClassName("bubble-image");
//   console.log(x);
//   if(width <= 768){
//      x.style.display = "none";
//    }else{
//       x.style.display = "block";
//    } 
// },10000);
