jQuery(function($){

    // Lightbox Triggers
    //$(".open-video-link").videoBox();
    $(".open-video-link").click(function(event) {
        /* Act on the event */
        event.preventDefault();
        videoBox(this);
    });;
    //jQuery.fn.extend({
     function videoBox(element) {
        var self, link, target, video, videoSrc, toggle;
        //this.each(function() {
            var e_parent = element.parentElement.parentElement.parentElement;        
            //return false;
            self = e_parent;
            target = self.getElementsByClassName('open-video-link')[0].getAttribute("href");
            video = self.getElementsByClassName("popup-video")[0].getElementsByTagName("iframe")[0];
            videoSrc = video.getAttribute("src");
            _e_open = self.getElementsByClassName('open-video-link')[0];
            //$(_e_open).on("click", function(event) {
                //event.preventDefault ? event.preventDefault() : event.returnValue = false;
                $(target).wrap( "<div class='lightbox'></div>" );
                $(".lightbox").fadeIn(300, function() {
                    $(target).fadeIn(0);
                    $("body").addClass("modal-open");
                    $(video).attr("src",videoSrc+'?autoplay=1&rel=0');
                    resizeIfame(video);
                });

                $("body").on("click", function(event) {
                    if(($(event.target).hasClass("lightbox") || $(event.target).hasClass("close")) && $(target).parent().hasClass("lightbox") ) {
                        $(".lightbox").fadeOut(300, function() {
                            $(target).hide(0);
                            $(target).unwrap();
                        });
                        $("body").removeClass("modal-open");
                        $(video).attr("src",videoSrc);
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