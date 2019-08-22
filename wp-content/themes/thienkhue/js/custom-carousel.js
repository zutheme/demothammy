jQuery(document).ready(function($) {

    "use strict";

    $('.carousel').carousel({

        pause: true,

        interval: false

    });

    //$("#myCarousel").carousel();

    var $owl = $('.owl-carousel');

    $owl.children().each( function( index ) {

      $(this).attr( 'data-position', index );

    });

    $owl.owlCarousel({
      items: 5,
      loop: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      center: true
    });
    $owl.on('changed.owl.carousel', function (event) {
    		var element   = event.target;         // DOM element, in this example .owl-carousel
        var items     = event.item.count;     // Number of items
        var item      = event.item.index + 1;     // Position of the current item 
      // it loop is true then reset counter from 1
      if(item > items) {
        item = item - items
      }
      //console.log(item);
      //$('#counter').html("item "+item+" of "+items)
    		$("#myguest").carousel(item);        
        });
    // $(document).on('click', '.owl-item>div', function() {
      
      $owl.find(".owl-item>div").click(function(){

        $owl.trigger('to.owl.carousel', $(this).data( 'position' ) );

        var _pos = $(this).data( 'position' );

        $("#myCarousel").carousel(_pos);

      });

       $('#myCarousel').carousel({
        interval: 3000
    });

});