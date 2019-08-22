//2. This code loads the IFrame Player API code asynchronously.

      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";

      var firstScriptTag = document.getElementsByTagName('script')[0];

      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);



      // 3. This function creates an <iframe> (and YouTube player)

      //    after the API code downloads.

      

      var playlist = ['zEpoO4x_LZ8','QB5Ytz9RuvE','J0brmOCD8CM','WHCugZXzGtE','CagYKzAQhQs']

      var player;

      var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

      var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;

       var maxHeightvideo;
       var index_play = -1;
      var maxmodal;

     if(_width > _height ) {

       maxHeightvideo = _height*0.7;

       maxmodal = _height*0.9;

     }else{

        maxHeightvideo = _width*0.7;

        maxmodal = _width*0.9;

     }

     

      //var _width = 390;

      var previousIndex = 0;

      function onYouTubeIframeAPIReady() {

        player = new YT.Player('player', {

          height: maxHeightvideo,

          width: '100%',

          playerVars: {
            color: 'white', 
            rel: 0,
            //controls:0,
            playlist: playlist.join(','),
          },

          events: {

            'onReady': onPlayerReady

            //'onStateChange': onPlayerStateChange

          }

        });

      }

      //onYouTubeIframeAPIReady(idv);

      // 4. The API will call this function when the video player is ready.

      function onPlayerReady(event) {

        //event.target.playVideo();
        index_play = 0;
      }



      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=1),

      //    the player should play for six seconds and then stop.

      var done = false;

      // function onPlayerStateChange(event) {

      //   if (event.data == YT.PlayerState.PLAYING && !done) {

      //     //setTimeout(stopVideo, 100);

      //     stopVideo();

      //     done = true;

      //   }

      // }

      function onPlayerStateChange(event) {

        if (event.data == YT.PlayerState.PLAYING && !done) {

          setTimeout(stopVideo, 1000);

          done = true;

        }

        if(event.data == -1 || event.data == 0) {

                    // get current video index

                    var index = player.getPlaylistIndex();

                    var le = player.getPlaylist().length-1;

                    // update when playlists do not match

                    if(player.getPlaylist().length != playlist.length) {



                        // update playlist and start playing at the proper index

                        player.loadPlaylist(playlist, previousIndex+1);

                    }



                    /*

                    keep track of the last index we got

                    if videos are added while the last playlist item is playing,

                    the next index will be zero and skip the new videos

                    to make sure we play the proper video, we use "last index + 1"

                    */
                    //console.log(player.getPlaylist().length+","+playlist.length);
                    previousIndex = index;

                }

    }

      function stopVideo() {

        player.stopVideo();

      }

 

    function play_index(index) {

        player.playVideoAt(index);        

    }
 //var _player = document.getElementById("player");
 function scrollplay(){
        if(index_play < 0 ){
            return false;
        }    
        var element = document.getElementById("video-container");
       
        var rect = element.getBoundingClientRect();
        //var e_bgimg = document.getElementsByClassName("video-bg")[0].getElementsByClassName("thumb")[0];
        var height = window.innerHeight+100;
        if(rect.top > 0 && rect.bottom < height){
             //e_bgimg.style.display = "none";
             //_player.style.display = "block";
             play_index(index_play);
        }else{
            //e_bgimg.style.display = "block";
            //_player.style.display = "none";
            stopVideo();
        }
}
window.addEventListener("scroll", scrollplay,false);     
Element.prototype.hasClass = function(className) {
    return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);
};
window.addEventListener("scroll", scroll_top,false);

//var top = 0;
function scroll_top(){
  var cus_nav = document.getElementsByClassName("custom-nav")[0];
  var top = window.pageYOffset;   
   if(top > 100){
      if(!cus_nav.hasClass("navbar-fixed-top")){
        cus_nav.className += " navbar-fixed-top";
      }
   }else{
      cus_nav.classList.remove("navbar-fixed-top");
   }  
}

// When the DOM is ready, run this function

$(document).ready(function() {

  //Set the carousel options

  $('#quote-carousel').carousel({

    pause: true,

    interval: 4000,

  });

  $(".video-bg").find("a.btn-video").click(function(event){

      event.preventDefault();

      var href = $(this).attr('href');

      index_play = href.substring(1, 2);

      //$("#modal_player").modal("show");

      //$(".modal-content").css({'width':maxmodal,'margin':'0px auto'});

      play_index(index_play);

  });

  // $(".modal-form-player").find("button.close").click(function(event){

  //     event.preventDefault();

  //      stopVideo();

  // });

  $('[data-toggle="tooltip"]').tooltip(); 

});



      