var e_gift = document.getElementsByClassName("mdgame")[0].getElementsByClassName("game")[0].getElementsByClassName("random")[0];

var li_gift = e_gift.getElementsByClassName("size");

var e_img_change = e_gift.getElementsByClassName("hidden-image")[0];

var e_gift_open = e_gift.getElementsByClassName("hidden-gift-open")[0];

var e_gift_unluck = e_gift.getElementsByClassName("hidden-gift-unluck")[0];

var e_img_voucher = e_gift.getElementsByClassName("hidden-voucher")[0];

var l_canvas = e_gift.getElementsByClassName("canvas");

var e_modal = document.getElementsByClassName("mdgame")[0].getElementsByClassName("modal-dialog")[0].getElementsByClassName("modal-content")[0];

var e_reg = e_modal.getElementsByClassName("modal-body")[0].getElementsByClassName("register")[0];

//initial gif

var url_gift = document.getElementById("url_gift").value;

	var canvas0 = document.getElementById("can0");

    var ctx0 = canvas0.getContext("2d");

    //ctx.drawImage(e_img_change, 0, 0, canvas.width, canvas.height);

 	var img0 = new Image();

	img0.src = url_gift;

	img0.onload = function(){

	// 	console.log("onload");

		canvas0.width = img0.naturalWidth;

		canvas0.height = img0.naturalHeight;

		ctx0.drawImage(img0, 0, 0);

	}

	var canvas1 = document.getElementById("can1");

	    var ctx1 = canvas1.getContext("2d");

	    //ctx.drawImage(e_img_change, 0, 0, canvas.width, canvas.height);

	 	var img1 = new Image();

		img1.src = url_gift;

		img1.onload = function(){

		// 	console.log("onload");

			canvas1.width = img1.naturalWidth;

			canvas1.height = img1.naturalHeight;

			ctx1.drawImage(img1, 0, 0);

	}

	var canvas2 = document.getElementById("can2");

    var ctx2 = canvas2.getContext("2d");

    //ctx.drawImage(e_img_change, 0, 0, canvas.width, canvas.height);

 	var img2 = new Image();

	img2.src = url_gift;

	img2.onload = function(){

	// 	console.log("onload");

		canvas2.width = img2.naturalWidth;

		canvas2.height = img2.naturalHeight;

		ctx2.drawImage(img2, 0, 0);

	}

	var canvas3 = document.getElementById("can3");

    var ctx3 = canvas3.getContext("2d");

    //ctx.drawImage(e_img_change, 0, 0, canvas.width, canvas.height);

 	var img3 = new Image();

	img3.src = url_gift;

	img3.onload = function(){

	// 	console.log("onload");

		canvas3.width = img3.naturalWidth;

		canvas3.height = img3.naturalHeight;

		ctx3.drawImage(img3, 0, 0);

	}

//end init gift

// for (var i = 0; i < l_canvas.length; i++) {

//     var canvas = l_canvas[i];

//     var ctx = canvas.getContext("2d");

//     var img = new Image();

// 	// img.onload = function () {

// 	//     context.drawImage(img, 0, 0);

// 	// }

// 	img.src = e_img_change.src;

//     //var img = e_img_change;

//     ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

//     //drawRotated(30,img,ctx,canvas);

// }

for (var i = 0; i < l_canvas.length; i++) {

    l_canvas[i].addEventListener('click', func_click, false);

}

var url_voucher;

var rand=0;

var voucher = ["0","1.000.000","2.000.000","3.000.000"];
function func_click(){

    //rand = Math.floor(Math.random() * 3);  
    var count = getCookie('count');
    var c = parseInt(count);
    //console.log("count="+count+",c="+c);
    if(c==''){
    	 setCookieByCount('count',1);
    }else{
    	setCookieByCount('count',count+1);
    }
    //rand = Math.floor(Math.random() * (3 - 2)) + 2;
    rand = Math.floor(Math.random() * 3); 
    if(c == 1) {
    	rand = 3;	
    }
    
	var e_img_voucher = e_gift.getElementsByClassName("hidden-voucher")[rand];

	url_voucher = e_img_voucher.src;

    drawRotated(this);

    var classname = this.getAttribute('class');

	var l_canvas = e_gift.getElementsByClassName("canvas");

	var items;

	var i = 0;

	for (i = 0; i < l_canvas.length; i++) {

		items = l_canvas[i].getAttribute('class');

		l_canvas[i].removeEventListener('click', func_click, false);

		if(classname==items){

			l_canvas[i].style.opacity = 1.0;

		}else{

			var canvas = l_canvas[i];

    		var ctx = canvas.getContext("2d");

    		ctx.filter = 'grayscale(80%)';

    		//ctx.filter = "blur(5px)";

			ctx.drawImage(e_img_change, 0, 0, canvas.width, canvas.height);

		}		

	};

}
var result;

	//var w = window.innerWidth;
	//if(991 <w && w < 1367){
		// e_lucky.style.width = "250px";
		// e_lucky.style.height = "auto";
		// e_unluck.style.width = "250px";
		// e_unluck.style.height = "auto";
	//}
function result_anima(){
	var e_unluck = e_modal.getElementsByClassName("rule")[0].getElementsByClassName("unluck")[0];
var e_lucky = e_modal.getElementsByClassName("rule")[0].getElementsByClassName("lucky")[0];
	var e_play_again = document.getElementsByClassName("mdgame")[0].getElementsByClassName("btn-play-again")[0];
		if(rand==0){
			e_play_again.style.display = "block";
	    	result = e_gift_unluck;
	    	e_unluck.style.display = "block";
	    }else{
	    	result = e_gift_open;
	    	e_lucky.style.display = "block";
	    }
		var pos = 3;
	    var id = setInterval(frame, 1000);
	    var ctx;
	    function frame() {
	    	if(pos == 0){
	    		if(rand==0){
	    			e_unluck.style.display = "none";
	    		}else{
	    			e_lucky.style.display = "none";
	    		}
	    		
	    	}else{
	    		pos--;
	    	}
	    }
	    setTimeout(function(){
	    	startGame();
	    },4000);

}
function drawRotated(canvas){

        var pos = 20;
	    var id = setInterval(frame, 150);
	    var ctx;
	    function frame() {

	        if (pos == 0) {

	            clearInterval(id);

	            ctx = canvas.getContext("2d");

		        ctx.clearRect(0,0,canvas.width,canvas.height);

		        ctx.save();

		        ctx.translate(canvas.width/2,canvas.height/2);

		        ctx.rotate(0*Math.PI/180);		        
		        result_anima();
		 		ctx.drawImage(result, -canvas.width/2, -canvas.height/2, canvas.width, canvas.height);
		    	ctx.restore();
		    	  
	        } else {

	            pos--;

	            if(pos % 2 == 0){

	            	ctx = canvas.getContext("2d");

			        ctx.clearRect(0,0,canvas.width,canvas.height);

			        ctx.save();

			        ctx.translate(canvas.width/2,canvas.height/2);

			        ctx.rotate(15*Math.PI/180);

        	 		ctx.drawImage(e_img_change, -canvas.width/2, -canvas.height/2, canvas.width, canvas.height);

	            	ctx.restore();

	            }else{

	            	ctx = canvas.getContext("2d");

			        ctx.clearRect(0,0,canvas.width,canvas.height);

			        ctx.save();

			        ctx.translate(canvas.width/2,canvas.height/2);

			        ctx.rotate(-15*Math.PI/180);

        	 		ctx.drawImage(e_img_change, -canvas.width/2, -canvas.height/2, canvas.width, canvas.height);
	            	ctx.restore();
	            }

	        }

	    }
}


function playagain(){
	// for (var i = 0; i < l_canvas.length; i++) {
	//     l_canvas[i].addEventListener('click', func_click, false);
	//     var canvas = l_canvas[i];
 	//    	var ctx = canvas.getContext("2d");
 	//    	ctx.filter = 'grayscale(0%)';
 	//    	//ctx.filter = "blur(5px)";
	// 	ctx.drawImage(e_img_change, 0, 0, canvas.width, canvas.height);
	// }
	location.reload();
}

var myGamePiece;

function startGame() {

	myGamePiece = new component(321, 149, url_voucher, 139, 0, "image",rand);

    myGameArea.start();

}



var myGameArea = {

    canvas : document.createElement("canvas"),

    start : function() {

    	var rect = e_gift.getBoundingClientRect();

		var width = rect.width;

		var height =  screen.height*0.47;

		this.canvas.className = "canv-gift";

        this.canvas.width = width;

        this.canvas.height = height;

        this.context = this.canvas.getContext("2d");    

        e_gift.appendChild(this.canvas);

        this.interval = setInterval(updateGameArea, 20);        

    },

    stop : function() {

        clearInterval(this.interval);

    },    

    clear : function() {

        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

    }

}



function component(width, height, color, x, y, type,rand) {

	this.type = type;

    if (type == "image") {

        this.image = new Image();

        this.image.src = color;

    }

    var rect = e_gift.getBoundingClientRect();

	var rect_width = rect.width;

	var rect_height = rect.height;

    var height = this.image.height;

    var width = this.image.width; 

	var w_sceen = window.innerWidth;

	var maxWidth = 300;

	var maxHeight = 130;	

	if(w_sceen < 768){

		maxWidth = 300;

		maxHeight = 130;

	}else{

		maxWidth = 500;

		maxHeight = 200;

	}

	if (width > height) {

			newHeight = height * (maxWidth / width);

			newWidth = maxWidth;

		} else {

			newWidth = width * (maxHeight / height);

			newHeight = maxHeight;

		}

	this.width = newWidth;

	this.height = newHeight; 

    var _x = (rect_width/2)-(this.width/2);

    this.x = _x;

    this.y = 0;    

    this.speedX = 0;

    this.speedY = 0;    

    this.gravity = 0.1;

    this.gravitySpeed = 0;

    this.bounce = 0.6;

    this.update = function() {

        ctx = myGameArea.context;

	    if (type == "image") {

	      ctx.drawImage(this.image, 

	        this.x, 

	        this.y,

	        this.width, this.height);

	    } else {

	      ctx.fillStyle = color;

	      ctx.fillRect(this.x, this.y, this.width, this.height);

	    }   

      var lineHeight = 25;

      var x =  (rect_width - maxWidth)/2;

      var y = 60;

      var text="";

      if(rand!=0){      	
      	text = 'Xin chúc mừng ! bạn trở thành khách hàng may mắn của ngày hôm nay';
      }else{
      	//e_modal.getElementsByClassName("rule")[0].getElementsByClassName("unluck")[0].style.display = "block";
      	text = 'Rất tiếc! Chúc bạn may mắn lần sau';
      }

      ctx.font = '18pt Calibri';

      ctx.fillStyle = '#4D1F1C';

      wrapText(ctx, text, x, y, maxWidth, lineHeight);

	   setTimeout(function(){

	    	var e_canv_gift = e_gift.getElementsByClassName("canv-gift")[0];

	    	if(!isRealValues(e_canv_gift)){

	    		return false;

	    	}else{

	    		//e_gift.removeChild(e_canv_gift);

	    		e_canv_gift.style.width = "0px";

	    		e_canv_gift.style.height ="0px";

	    	}

	    	if(rand!=0){

	    		e_reg.style.display = "block";

	    	}	    	

	    },6000);

    }

    this.newPos = function() {

        this.gravitySpeed += this.gravity;

        this.x += this.speedX;

        this.y += this.speedY + this.gravitySpeed;

        this.hitBottom();

    }

    this.hitBottom = function() {

        var rockbottom = myGameArea.canvas.height - this.height;

        if (this.y > rockbottom) {

            this.y = rockbottom;

            this.gravitySpeed = -(this.gravitySpeed * this.bounce);

        }

    }

}

function updateGameArea() {

    myGameArea.clear();

    myGamePiece.newPos();

    myGamePiece.update();

}

function wrapText(context,text,x,y,maxWidth,lineHeight){

  	var words = text.split(' ');

    var line = '';

    for(var n = 0; n < words.length; n++) {

          var testLine = line + words[n] + ' ';

          var metrics = context.measureText(testLine);

          var testWidth = metrics.width;

          if (testWidth > maxWidth && n > 0) {

            context.fillText(line, x, y);

            line = words[n] + ' ';

            y += lineHeight;

          }

          else {

            line = testLine;

          }

    }

    context.fillText(line, x, y);

}

function isRealValues(obj)

{

 return obj && obj !== 'null' && obj !== 'undefined';

};

function setCookieByCount(cname,cvalue) {

    var d = new Date();

    d.setTime(d.getTime() + (1*60*1000));

    //d.setTime(d.getTime() + (exdays*24*60*60*1000));

    var expires = "expires=" + d.toGMTString();

    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

}
function getCookie(cname) {

    var name = cname + "=";

    var decodedCookie = decodeURIComponent(document.cookie);

    var ca = decodedCookie.split(';');

    for(var i = 0; i < ca.length; i++) {

        var c = ca[i];

        while (c.charAt(0) == ' ') {

            c = c.substring(1);

        }

        if (c.indexOf(name) == 0) {

            return c.substring(name.length, c.length);

        }

    }

    return "";

}