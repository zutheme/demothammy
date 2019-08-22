// Sample Media Player using HTML5's Media API
// 
// Ian Devlin (c) 2012
// http://iandevlin.com
// http://twitter.com/iandevlin
//
// This was written as part of an article for the February 2013 edition of .net magazine (http://netmagazine.com/)

// Wait for the DOM to be loaded before initialising the media player
document.addEventListener("DOMContentLoaded", function() { 
    initialiseMediaPlayer(); 
}, false);

// Variables to store handles to various required elements
var mediaPlayer;
var playPauseBtn;
var muteBtn;
var progressBar;
var pop = false;
var poster;
//var per;
function initialiseMediaPlayer() {
    // Get a handle to the player
    mediaPlayer = document.getElementById('video-bg');
    // Get handles to each of the buttons and required elements
    playPauseBtn = document.getElementById('play-pause-button');
    // Hide the browser's default controls
    mediaPlayer.controls = false;
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
    //mediaPlayer.addEventListener('loadeddata',function() { 
        //loaded = true;
     //}, false);
    //mediaPlayer.addEventListener("progress", func_progress);
    // mediaPlayer.addEventListener('progress', function() {
       
    //     var range = 0;
    //     var bf = this.buffered;
    //     var time = this.currentTime;

    //     while(!(bf.start(range) <= time && time <= bf.end(range))) {
    //         range += 1;
    //     }
    //     var loadStartPercentage = bf.start(range) / this.duration;
    //     var loadEndPercentage = bf.end(range) / this.duration;
    //     var loadPercentage = loadEndPercentage - loadStartPercentage;
    //     console.log(loadPercentage);
    //     //per.innerHTML = loadPercentage;
    // });
   
    // mediaPlayer.onseeking = function() {
    //     alert("Seek operation began!");
    // };
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

// Update the progress bar
// function updateProgressBar() {
//     // Work out how much of the media has played via the duration and currentTime parameters
//     var percentage = Math.floor((100 / mediaPlayer.duration) * mediaPlayer.currentTime);
//     // Update the progress bar's value
//     progressBar.value = percentage;
//     // Update the progress bar's text (for browsers that don't support the progress element)
//     progressBar.innerHTML = percentage + '% played';
// }

// Updates a button's title, innerHTML and CSS class to a certain value
function changeButtonType(_playPauseBtn, value) {
    
    var e_play = _playPauseBtn.parentElement.getElementsByTagName('img');
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

function testScroll(){
        var mediaPlayer = document.getElementById("video-bg");
        var height = mediaPlayer.videoHeight; 
        var width = mediaPlayer.videoWidth; 
        var element = document.getElementById("video-container");
        var _scroll = document.getElementById("post-scroll");
        var rect = element.getBoundingClientRect();
        //console.log(rect.top, rect.right, rect.bottom, rect.left);
        var height = window.innerHeight;
        if(rect.top > 0 && rect.bottom < height){
        		 mediaPlayer.play();
        }else{
            mediaPlayer.pause();
        }
}
window.addEventListener("scroll", testScroll,false);
document.body.addEventListener('touchstart', function(e){
        //alert(e.changedTouches[0].pageX) // alert pageX coordinate of touch point
        if(!pop){
            mediaPlayer.load();
            pop = true;
        }
        
    }, false)
//window.addEventListener('load', function(){ // on page load
 
    // document.body.addEventListener('touchstart', function(e){
    //     alert(e.changedTouches[0].pageX) // alert pageX coordinate of touch point
    // }, false)
 
//}, false)

function isRealValue(obj)
{
  return obj && obj !== 'null' && obj !== 'undefined';
}

