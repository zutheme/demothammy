jQuery(document).ready(function($) {
	
});
var _menu = function(){ 
   var top = window.pageYOffset; 
  var header_menu = document.getElementsByClassName("header-main")[0];
   if(top > 50){
   			header_menu.classList.add("sticky");
     		// header_menu.style.position = "absolute";
     		// header_menu.style.top = "0px";
     		// header_menu.style.left = "0px";
     		// header_menu.style.display = "block";
       }else{
         header_menu.classList.remove("sticky");
    }
}
window.addEventListener("scroll", _menu ,false);
