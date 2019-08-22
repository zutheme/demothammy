jQuery(document).ready(function($) {

	$("figure").css({'width':'100%'});

});

function isRealValues(obj)

{

  return obj && obj !== 'null' && obj !== 'undefined';

}

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

  if(isRealValues(_e_top)){

    rect = _e_top.getBoundingClientRect();

    _h = rect.height;

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


var test = document.getElementsByClassName("testscreen")[0];
test.addEventListener("click",test);
function test(){
  var w = window.innerWidth;
  alert(w);
}

var e_service = document.getElementsByClassName("desc-mask");
for (var i = e_service.length - 1; i >= 0; i--) {
    e_service[i].addEventListener("click",function(){
    var ref = this.getElementsByTagName("a")[0].getAttribute("href");
    window.location.href = ref;
  });
}
var _blog_content = document.getElementsByClassName('blog-content')[0];
var _menu_blog = document.getElementsByClassName("menu-blog")[0].getElementsByTagName("li");
for (var i = _menu_blog.length - 1; i >= 0; i--) {
  _menu_blog[i].getElementsByTagName("a")[0].addEventListener("click",function(){
    var a = this.getAttribute("href");
    var _a = a.replace(/[#]/g, '');
    var elem = document.getElementById("section1");
    var topPos = elem.offsetTop;
    console.log(_blog_content);
    scrollTo(_blog_content, topPos-30, 600);
  });
}

    
function scrollTo(element, to, duration) {
    var start = element.scrollTop,
        change = to - start,
        currentTime = 0,
        increment = 20;
        
    var animateScroll = function(){        
        currentTime += increment;
        var val = Math.easeInOutQuad(currentTime, start, change, duration);
        element.scrollTop = val;
        if(currentTime < duration) {
            setTimeout(animateScroll, increment);
        }
    };
    animateScroll();
}

//t = current time
//b = start value
//c = change in value
//d = duration
Math.easeInOutQuad = function (t, b, c, d) {
  t /= d/2;
  if (t < 1) return c/2*t*t + b;
  t--;
  return -c/2 * (t*(t-2) - 1) + b;
};

// var e_size_full = document.getElementsByClassName("size-full")[0];
// console.log("=======================");
// var exist_size_full = setInterval(function() {
//   var e_size_full = document.getElementsByClassName("size-full")[0];
//   console.log(e_size_full);
//    if (e_size_full) {
//           console.log(exist_size_full);
//           e_size_full.style.Width = "100%";
//           e_size_full.style.Heigght = "auto";
//       } 
//       clearInterval(exist_size_full);
//    }, 100);  
// console.log("=======================");

