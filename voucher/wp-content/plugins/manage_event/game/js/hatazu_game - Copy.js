var e_gift = document.getElementsByClassName("mdgame")[0].getElementsByClassName("game")[0].getElementsByClassName("random")[0];
var li_gift = e_gift.getElementsByClassName("size");
var e_img_change = e_gift.getElementsByClassName("hidden-image")[0];
var l_canvas = e_gift.getElementsByClassName("canvas");

for (var i = 0; i < l_canvas.length; i++) {
    var canvas = l_canvas[i];
    var ctx = canvas.getContext("2d");
    var img = e_img_change;
    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    //drawRotated(30,img,ctx,canvas);
}
for (var i = 0; i < l_canvas.length; i++) {
    l_canvas[i].addEventListener('click', func_click, false);
}
function func_click(){
	//this.src=e_img_change.value;
    var elem = this;
    drawRotated(elem); 
}

// for (var i = 0; i < l_canvas.length; i++) {
//     var canvas = l_canvas[i];
//     var ctx = canvas.getContext("2d");
//     var img = e_img_change;
//     //ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
//     drawRotated(degrees,image,ctx,canvas);
// }

function drawRotated(canvas){
		var ctx = canvas.getContext("2d");
        ctx.clearRect(0,0,canvas.width,canvas.height);
        ctx.save();
        ctx.translate(canvas.width/2,canvas.height/2);
        var pos = 100;
	    var id = setInterval(frame, 10);
	    function frame() {
	        if (pos == 0) {
	            clearInterval(id);
	        } else {
	            pos--;
	            //percent = pos / 100;
	            //elem.style.opacity = percent; 
	            //elem.style.top = pos + 'px'; 
	            //elem.style.left = pos + 'px'; 
	        }
	    }
        for (var i = 0; i < 10; i++) {
        	if(i%2==0){
        	 ctx.rotate(15*Math.PI/180);
        	 ctx.drawImage(e_img_change, -canvas.width/2, -canvas.height/2, canvas.width, canvas.height);
        	}else{
        		ctx.rotate(-15*Math.PI/180);
        	 	ctx.drawImage(e_img_change, -canvas.width/2, -canvas.height/2, canvas.width, canvas.height);
        	}
        };
		//ctx.fillRect(50, 20, 100, 50);
        ctx.restore();
}

