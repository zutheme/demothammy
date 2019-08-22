// Variables to store handles to various required elements
var mediaPlayer = document.getElementById('video-bg');
var playPauseBtn;
var muteBtn;
var progressBar;
var pop = false;
var poster;
var height_video;
var width_video;
var context;
var h_admin = 0;
var e_adminbar = document.getElementById('wpadminbar');
if(e_adminbar){
    h_admin = e_adminbar.height;
}
var e_navt = document.getElementsByTagName("nav")[0];
var e_video_container 
var rec = e_navt.getBoundingClientRect();
//console.log(rec.top+","+rec.right+","+rec.bottom+","+rec.left+",h="+rec.height);
var w = window.innerWidth;
var h = window.innerHeight;
//console.log(w+","+h);
var init_height = (h - (h_admin + rec.height))+"px";
var e_video_container = document.getElementsByClassName("video-container")[0];
var e_home_video = document.getElementsByClassName("home-video")[0];
var hvideo = 0;
if(w < 768){

    mediaPlayer.setAttribute("width", (w-154)+"px");
    mediaPlayer.setAttribute("height", (w-154)+"px");
    e_video_container.style.height = (w-154)+"px";
    e_home_video.style.height = (w-154)+"px";
}else if(768 < w && w <= 1280){
    mediaPlayer.setAttribute("width", "100%");
    mediaPlayer.setAttribute("height", "720px");
    e_video_container.style.height = "720px";
    e_home_video.style.height = "720px";
}else {
	hvideo = (h_admin + rec.height + h + 100);
    mediaPlayer.setAttribute("width", "100%");
    mediaPlayer.setAttribute("height", hvideo +"px");
    e_video_container.style.height = hvideo + "px";
    e_home_video.style.height = hvideo + "px";
}
document.addEventListener("DOMContentLoaded", function() { 
    initialiseMediaPlayer();
}, false);

function initialiseMediaPlayer() {
    // Get a handle to the player
    
    if(!mediaPlayer) return false;
    // Get handles to each of the buttons and required elements
    mediaPlayer.muted = true;
    mediaPlayer.autoplay = true;
    mediaPlayer.load();
    height_video = mediaPlayer.videoHeight;
    width_video = mediaPlayer.videoWidth;
    context = new AudioContext();
    playPauseBtn = document.getElementById('play-pause-button');
    // Hide the browser's default controls
    mediaPlayer.controls = true;
    poster = document.getElementsByClassName("poster")[0];
    // Add a listener for the timeupdate event so we can update the progress bar
    //mediaPlayer.addEventListener('timeupdate', updateProgressBar, false);
    // Add a listener for the play and pause events so the buttons state can be updated
    mediaPlayer.addEventListener('play', function() {
        // Change the button to be a pause button
        changeButtonType(playPauseBtn, 'pause');
    }, false);
    mediaPlayer.addEventListener('pause', function() {
        // Change the button to be a play button
        changeButtonType(playPauseBtn, 'play');
    }, false);


    mediaPlayer.addEventListener('ended', function() {
        poster.style.display = "block"; 
        this.pause(); 
    }, false); 
}



function togglePlayPause(_playPauseBtn) {

    // If the mediaPlayer is currently paused or has ended
    if (mediaPlayer.paused || mediaPlayer.ended) {

        // Change the button to be a pause button

        changeButtonType(_playPauseBtn, 'pause');

        // Play the media

        mediaPlayer.play();

    }

    // Otherwise it must currently be playing

    else {

        // Change the button to be a play button

        changeButtonType(_playPauseBtn, 'play');

        // Pause the media

        mediaPlayer.pause();

       

    }

}



function changeButtonType(_playPauseBtn, value) {

    //var e_play = document.getElementById("play-pause-button");

    var e_play = _playPauseBtn.parentElement.getElementsByTagName('button');

    //var img = pa.getElementByClassname('pause');

    var _img_play = e_play[0];

    //var _img_pause = e_play[1];

    _playPauseBtn.title = value;

    _playPauseBtn.className = value;

   if(value==='play'){

        //_img_pause.style.display = "none";

        _img_play.style.display = "block";

     }else{

        //_img_pause.style.display = "block";

        _img_play.style.display = "none";

     }

    

}

//var mediaPlayer = document.getElementById("video-bg");

// setTimeout(function(){
//     if()
//     mediaPlayer.play();

// },1000);
var _mute = false;
window.onload = function() {
  this.addEventListener('mousemove', mouse_monitor);
}
function mouse_monitor(e) {
    //var x = e.clientX;
    //var y = e.clientY;
    
    if(!_mute){
            //mediaPlayer.setAttribute("muted", true);
            //mediaPlayer.muted = 
            //mediaPlayer.play();
            //mediaPlayer.muted = false;
            _mute = true;
            context.resume().then(() => {
                console.log('Playback resumed successfully');
                mediaPlayer.muted = false;
            });
            console.log("unmute");

    }
   
}

function clearCoor() {
    document.getElementById("demo").innerHTML = "";
}

function testScroll(){
        var element = document.getElementById("video-bg");
        //var _scroll = document.getElementById("post-scroll");
        if(!element) return false;
        var rect = element.getBoundingClientRect();

        //console.log(rect.top, rect.right, rect.bottom, rect.left);

        var height = window.innerHeight;

        var re_top = rect.top;

        var re_bottom = rect.bottom;

        //console.log("height="+height+",top="+rect.top+",rect.bottom="+rect.bottom);

        if(re_top > 0 ){
            if(!pop){
                //mediaPlayer.load();
                mediaPlayer.play();
                //mediaPlayer.setAttribute("muted", "false");
                //mediaPlayer.muted = false;
                pop = true;
            }   
        }else{

            mediaPlayer.pause();
            pop = false;
        }

}

window.addEventListener("scroll", testScroll,false);

document.body.addEventListener('touchstart', function(e){
        //alert(e.changedTouches[0].pageX) // alert pageX coordinate of touch point
        if(!pop){
            //mediaPlayer.load();
            mediaPlayer.play();
            //mediaPlayer.muted = false;
            pop = true;
        }else{
            mediaPlayer.plause();
            //mediaPlayer.muted = true;
            pop = false;
        }    
    }, false)



function isRealValue(obj)

{

  return obj && obj !== 'null' && obj !== 'undefined';

}

var _e_nav = document.getElementsByTagName('nav')[0];
var e_containvd = document.getElementById('video-bg');

//console.log("h video="+e_heightvd.height);
//var e_video = document.getElementById('video-container').getElementsByClassName('mask')[0];
var _nav = _e_nav.getBoundingClientRect();
//var _top = data.top + _nav.height;
//e_video.style.top = _top+'px';
//e_video.style.height = height_video +"px";
function scrollvideo(){
        //var height = mediaPlayer.videoHeight; 
        //var width = mediaPlayer.videoWidth; 
        //var e_video_bg = document.getElementById("video-bg");
        //var e_heightvd = e_containvd.getBoundingClientRect();
        if(!e_containvd) return false;
        var rect = e_containvd.getBoundingClientRect();
        //var height = window.innerHeight;
        var re_top = rect.top;
        var re_bottom = rect.bottom;
        var h_mask =  re_bottom - _top;
        //e_video.style.top = _top+'px';
        //e_video.style.height = (h_mask-300)+"px";
        //e_video.style.height = "87%";
}

window.addEventListener("scroll", scrollvideo,false);
mediaPlayer.oncanplay = function() {
    mediaPlayer.play();
    //mediaPlayer.muted = false;
};

