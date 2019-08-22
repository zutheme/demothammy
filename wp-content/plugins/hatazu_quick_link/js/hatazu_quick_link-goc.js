(function( $ ) {

 

    "use strict";

    

 });

// jQuery(document).ready(function($) {

//  var nav = $("#quick-link").find("li");

//    nav.click(function(event){

//      event.preventDefault();

//      var a = $(this).find('a').attr('href');   

//      $('html, body').animate({scrollTop:$(a).position().top}, 'slow');

//    });

    

// });

jQuery(document).ready(function($) {

    $("#quick-link").find(".consultant").click(function(){

        $("#modal-consultant").modal("show");

    });

});



var tooggle = false;

var _e_panel_search = document.getElementById("menu-search");

var _e_panel_quick = document.getElementById("quick-link");

var _e_button_search = _e_panel_quick.getElementsByClassName("btn-search")[0];

//console.log(_e_button_search);

 _e_button_search.addEventListener('click', function(event){

      event.preventDefault();

      //alert(tooggle);

      if(!tooggle){

            search_panel_right();

            tooggle = true;

        }else{

            search_panel_left();

            tooggle = false;

        }

     

  });



function search_panel_right() {

 var elem = _e_panel_search.getElementsByClassName("panel-search")[0];

 elem.style.display = 'block';   

  var pos = -240;

  var id = setInterval(frame, 10);

  function frame() {

    if (pos == 0) {

      clearInterval(id);

    } else {

      pos=pos+10;

      elem.style.left = pos + 'px';

      elem.style.opacity = 1;

    }

  }

}

function search_panel_left() {

 var elem = _e_panel_search.getElementsByClassName("panel-search")[0];

 elem.style.display = 'block';   

  var pos = 0;

  var id = setInterval(frame, 10);

  function frame() {

    if (pos == -240) {

      clearInterval(id);

    } else {

      pos= pos-10; 

      elem.style.left = pos + 'px';

      elem.style.opacity = 1;

    }

  }

}

window.addEventListener("scroll", quicklink,false);
var _e_quick_link = document.getElementById("quick-link");
function quicklink(){ 
   var top = window.pageYOffset;   
   if(top > 100){
     _e_panel_search.style.display = "block";          

             _e_quick_link.style.display = "block";

        }else{

          _e_panel_search.style.display = "none";

             _e_quick_link.style.display = "none";

        }

}



//if (typeof isRealValues == 'function')

//{

   function isRealValues(obj)

    {

     return obj && obj !== 'null' && obj !== 'undefined';

    }

//}