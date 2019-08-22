var timeOut;

function scrollToTop() {

  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){

    window.scrollBy(0,-50);

    timeOut=setTimeout('scrollToTop()',10);

  }

  else clearTimeout(timeOut);

}

function ProcessScroll(){

        //var element = document.getElementsByTagName("body")[0];

        //var rect = element.getBoundingClientRect();

        var e_top = document.getElementsByClassName('htz-top')[0];

        var top = window.pageYOffset; 

        //console.log(top);

        var height = window.innerHeight;

        if(top > height){

        	e_top.style.display = "block";

        }else{

            e_top.style.display = "none";

        }

}

window.addEventListener("scroll", ProcessScroll,false);