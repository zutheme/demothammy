var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
//console.log(_width);
var e_testscreen = document.getElementsByClassName("copy-right")[0].getElementsByClassName("testscreen")[0];
console.log("width="+_width);
e_testscreen.addEventListener("click", function(){
  alert(_width);
});
/*end zalo*/
var e_figure = document.getElementsByClassName("custom-block");
if(e_figure){
  var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  if(_width <= 768 ) {
      for (var i = e_figure.length - 1; i >= 0; i--) {
        e_figure[i].getElementsByTagName("figure")[0].style.maxWidth = "100%";
      }
  }else {
    for (var i = e_figure.length - 1; i >= 0; i--) {
        e_figure[i].getElementsByTagName("figure")[0].style.maxWidth = "60%";
      }
  }
}
// setTimeout(function(){ 
//      var xzalo = document.getElementsByClassName("zalo-chat-widget")[0];
//      xzalo.style = "position: fixed; right: 15px !important; width: 70px; height: 70px; cursor: move; display: block !important; bottom: 20% !important; visibility: visible !important; z-index: 2147483647; border: none;";
//     if(_width <= 768){
//          xzalo.style = "position: fixed; right: 15px !important; width: 70px; height: 70px; cursor: move; display: block !important; bottom: 10% !important; visibility: visible !important; z-index: 2147483647; border: none;";
//       }else {
//             xzalo.style = "position: fixed; right: 15px !important; width: 70px; height: 70px; cursor: move; display: block !important; bottom: 22% !important; visibility: visible !important; z-index: 2147483647; border: none;";
//       }  }, 3000);

//messenger
var Exist_fb = setInterval(function() {
  var x = document.getElementsByClassName("fb_dialog")[0];
   if (x) {
      //var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
      if(_width <= 768 ) {
          x.style.bottom = "10%";
          x.style.left = "15px";
          //x.style.display = "block";
      }else {
          x.style.bottom = "5px";
          //x.style.left = "20px";
          x.style.left = "15px";
          //x.style.display = "block";
      } 
      clearInterval(Exist_fb);
   }
}, 100); // check every 100ms

var ExistBuble = setInterval(function() {
  bubble = document.getElementsByClassName("fb_customer_chat_bounce_in_v2")[0];
   if (bubble) {
      //var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
      if(_width <= 768 ) {
          bubble.style.bottom = "16%";
          bubble.style.left = "15px";
      }else {
          bubble.style.bottom = "10%";
          bubble.style.left = "20px";
          //bubble.style.right = "auto";
      } 
      clearInterval(ExistBuble);
   }
}, 100); // check every 100ms


var url = document.URL;
var _e_dzalo = document.getElementsByClassName("dzalo")[0];
var fb_like = _e_dzalo.getElementsByClassName("fb-like")[0];
if(fb_like){
  fb_like.setAttribute("data-href", url);
}
if(_e_dzalo){
  var zalo_share_button = _e_dzalo.getElementsByClassName("zalo-share-button")[0];
  zalo_share_button.setAttribute("data-href", url);
}
