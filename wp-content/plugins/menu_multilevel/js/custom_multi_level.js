$(document).ready(function() {
    "use strict";
    $( '#dl-menu' ).dlmenu();         
});
window.addEventListener("scroll", scrollplay,false);     

Element.prototype.hasClass = function(className) {

    return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);

};

window.addEventListener("scroll", scroll_top,false);

var rect;

var _top;

var _h = 0;

function scroll_top(){

  var cus_nav = document.getElementsByClassName("custom-nav")[0];

  var _e_top = document.getElementById("wpadminbar");
  var _top;
  if(isRealValues(_e_top)){

    rect = _e_top.getBoundingClientRect();

    _h = rect.height;
    _top = rect.top;
    console.log(_top);
  }

  

  var top = window.pageYOffset;   

   if(top > 100){

      if(!cus_nav.hasClass("navbar-fixed-top")){

        cus_nav.className += " navbar-fixed-top";

        cus_nav.style.top =_h+"px";

      }

   }else{

      cus_nav.classList.remove("navbar-fixed-top");
      cus_nav.style.top ="0px";
   }  

}