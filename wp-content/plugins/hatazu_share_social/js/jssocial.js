var url = document.URL;
// setTimeout(function(){
// 	var e_zalo =  document.getElementsByClassName("zb-btn-blue--small")[0];
// 	console.log(e_zalo);
// },3000);

var exist_zalo_btn = setInterval(function() {
  var x = document.getElementsByClassName("zalo-share-button")[0];
   if (x) {
          x.style.display = "none";
          x.style.paddingTop = "0px !important";
          x.style.position = "absolute";
          x.style.display = "inline-block";
          x.style.paddingLeft = "3px";
      } 
      clearInterval(exist_zalo_btn);
   }, 100); 
var exist_fb_btn = setInterval(function() {
  var e_fb =  document.getElementsByClassName("fb-like")[0];
   if (e_fb) {
          console.log(url);
          e_fb.style.display = "none";
          e_fb.setAttribute('data-href', url);
          e_fb.style.display = "inline-block";
      } 
      clearInterval(exist_fb_btn);
   }, 100);
