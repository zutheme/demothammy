jQuery(function($){

    // Lightbox Triggers
    //$(".open-galleryimg-link").galleryimgBox();
    $(".open-galleryimg-link").click(function(event) {
        /* Act on the event */
        event.preventDefault();
        galleryimgBox(this);
    });;
    //jQuery.fn.extend({
     function galleryimgBox(element) {
        var self, link, target, galleryimg, galleryimgSrc, toggle;
        //this.each(function() {
            var e_parent = element.parentElement.parentElement.parentElement;        
            //return false;
            self = e_parent;
            target = self.getElementsByClassName('open-galleryimg-link')[0].getAttribute("href");
            galleryimg = self.getElementsByClassName("popup-galleryimg")[0].getElementsByTagName("img")[0];
            galleryimgSrc = galleryimg.getAttribute("src");
            console.log(galleryimgSrc);
            //_e_open = self.getElementsByClassName('open-galleryimg-link')[0];
            //$(_e_open).on("click", function(event) {
                //event.preventDefault ? event.preventDefault() : event.returnValue = false;
                console.log(target);
                $(target).wrap( "<div class='lightbox'></div>" );
                $(".lightbox").fadeIn(300, function() {
                    $(target).fadeIn(0);
                    $("body").addClass("modal-open");
                    $(galleryimg).attr("src",galleryimgSrc);
                    //resizeIfame(galleryimg);
                });

                $("body").on("click", function(event) {
                    if(($(event.target).hasClass("lightbox") || $(event.target).hasClass("close")) && $(target).parent().hasClass("lightbox") ) {
                        $(".lightbox").fadeOut(300, function() {
                            $(target).hide(0);
                            $(target).unwrap();
                        });
                        $("body").removeClass("modal-open");
                        $(galleryimg).attr("src",galleryimgSrc);
                    }
                });
            //});
        //});
    }
//});
});

function resizeIfame(frame) {

    var oldWidth = $(frame).width();
    var oldHeight = $(frame).height();
    var propotion = oldHeight / oldWidth;
    var newHeight;

    $(frame).width('100%');
    newHeight = $(frame).width() * propotion;
    $(frame).height(newHeight);

    $(window).resize(function() {
        $(frame).width('100%');
        newHeight = $(frame).width() * propotion;
        $(frame).height(newHeight);
    });
}