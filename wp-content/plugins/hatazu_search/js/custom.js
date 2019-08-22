var e_htz_image_banner = document.getElementsByClassName("htz_image_banner")[0];
console.log()
var _e_nav = document.getElementsByTagName('nav')[0];
var e_adminbar = document.getElementById('wpadminbar');
var rect;
var limit = 0;
var h_admin = 0;
if(e_adminbar){
    h_admin = e_adminbar.height;
}
limit = h_admin + _e_nav.height;
//console.log(limit);
function scrollbanner(){
		if(!e_htz_image_banner) {
			return false;
		}
		rect = e_htz_image_banner.getBoundingClientRect();	     
        console.log(rect.top, rect.right, rect.bottom, rect.left);
        var height = window.innerHeight;
        if(rect.top <= limit){
        	e_htz_image_banner.style.absolute = "fixed";
        	e_htz_image_banner.style.top = "0px";
        	e_htz_image_banner.style.right = "0px"; 
        }else{
            e_htz_image_banner.style.absolute = "relative";
        	e_htz_image_banner.style.top = "none";
        	e_htz_image_banner.style.right = "none";
        }
}
window.addEventListener("scroll", scrollbanner,false);