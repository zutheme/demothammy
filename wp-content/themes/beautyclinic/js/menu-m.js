var e_li_logo =  document.getElementsByClassName("menu-mobile")[0].getElementsByTagName("li")[0];
var e_menu_container = document.getElementsByClassName("menu-list")[0];
var e_li = e_menu_container.getElementsByTagName("li")[0];
e_menu_container.insertBefore(e_li_logo, e_li);
$(function() {
  function slideMenu() {
    var activeState = $("#menu-container .menu-list").hasClass("active");
    $("#menu-container .menu-list").animate(
      {
        left: activeState ? "0%" : "-100%"
      },
      400
    );
  }
  $("#menu-wrapper").click(function(event) {
    event.stopPropagation();
    $("#hamburger-menu").toggleClass("open");
    $("#menu-container .menu-list").toggleClass("active");
    slideMenu();

    $("body").toggleClass("overflow-hidden");
  });

  $(".menu-list").find(".accordion-toggle").click(function() {
    //$(this).next().toggleClass("open").slideToggle("fast");
    $(".menu-list .accordion-content")
      .not($(this).next())
      .slideUp("fast")
      .removeClass("open");
    $(".menu-list .accordion-toggle")
      .not(jQuery(this))
      .removeClass("active-tab")
      .find(".menu-link")
      .removeClass("active");
      $(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");
      var e_ul = $(this).find(".accordion-content");
      var _open = e_ul.hasClass("open");
      if(!_open){
          e_ul.addClass("open");
          e_ul.css({"display": "block"});
      }else{
          e_ul.removeClass("open");
          e_ul.css({"display": "none"});
      }
      //$(this).find(".accordion-content").toggleClass("open");
      //$(this).find(".accordion-content").toggle(500);
  });
}); // jQuery load

function hasClass(element, className) {
    return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;
}