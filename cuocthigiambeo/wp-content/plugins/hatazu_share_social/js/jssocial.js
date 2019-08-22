var url = document.URL;
var e_fb =  document.getElementsByClassName("fb-like")[0];
e_fb.setAttribute('data-href', url);

setTimeout(function(){
	var e_zalo =  document.getElementsByClassName("zb-btn-blue--small")[0];
	console.log(e_zalo);
},3000);
// var twitterShare = document.querySelector('[data-js="twitter-share"]');

// twitterShare.onclick = function(e) {
//   e.preventDefault();
//   var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
//   if(twitterWindow.focus) { twitterWindow.focus(); }
//     return false;
//   }

// var facebookShare = document.querySelector('[data-js="facebook-share"]');

// facebookShare.onclick = function(e) {
//   e.preventDefault();
//   var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
//   if(facebookWindow.focus) { facebookWindow.focus(); }
//     return false;
// }

