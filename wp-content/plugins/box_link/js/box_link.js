



var tooggle = false;

var _e_panel_quick = document.getElementById("box-link");



window.addEventListener("scroll", quicklink,false);

var _e_quick_link = document.getElementById("box-link");

 //console.log(_e_quick_link);

function quicklink(){ 

   var top = window.pageYOffset; 

        //var top = document.documentElement.scrollTop;     

   if(top > 100){        
          _e_quick_link.style.display = "block";
          _e_quick_link.style.position = "fixed";
           _e_quick_link.style.right = "0px";
            _e_quick_link.style.top = "30%";

        }else{       

             _e_quick_link.style.display = "none";

        }

}

   function isRealValues(obj)

    {

     return obj && obj !== 'null' && obj !== 'undefined';

    }