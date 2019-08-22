/*zalo*/
setTimeout(function(){
  var x = document.getElementsByClassName("zalo-chat-widget")[0];
  var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  //var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
  if(_width <= 768 ) {
      x.style.bottom = "25%";
      x.style.right = "15px";
  }else {
      x.style.bottom = "16%";
      x.style.right = "20px";
  } 
},3000);
setTimeout(function(){
  var e_fb_chat = document.getElementsByClassName("fb_dialog")[0];
  var e_fb_enter_cmt = document.getElementsByClassName("UFIInputContainer")[0];
  console.log(e_fb_enter_cmt);
  var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  //var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
  if(_width <= 768 ) {
      e_fb_chat.style.bottom = "14%";
      e_fb_chat.style.right = "20px";
  }else {
      e_fb_chat.style.bottom = "10%";
      e_fb_chat.style.right = "22px";
  } 
},4000);
setTimeout(function(){
  var e_fb_enter_cmt = document.getElementsByClassName("UFIInputContainer")[0];
  console.log(e_fb_enter_cmt);
},6000);
/*end zalo*/
var _url = document.URL;
var _e_fshare = document.getElementsByClassName("dzalo")[0];
_e_fshare.getElementsByClassName("fb-like")[0].setAttribute("data-href", _url);
_e_fshare.getElementsByClassName("zalo-share-button")[0].setAttribute("data-href", _url);