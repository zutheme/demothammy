
jQuery(document).ready(function($) {
	function isUploadSupported() {
	    if (navigator.userAgent.match(/(Android (1.0|1.1|1.5|1.6|2.0|2.1))|(Windows Phone (OS 7|8.0))|(XBLWP)|(ZuneWP)|(w(eb)?OSBrowser)|(webOS)|(Kindle\/(1.0|2.0|2.5|3.0))/)) {
	        return false;
	    	}
	    	var elem = document.createElement('input');
		    elem.type = 'file';
		    return !elem.disabled;
		};
		if (window.File && window.FileReader && window.FormData) {
			var $inputField = $('#file');
			$inputField.on('change', function (e) {
				var file = e.target.files[0];

				if (file) {				
					if (/^image\//i.test(file.type)) {
						readFile(file);
					} else {
						alert('Not a valid image!');
					}
				}
			});
		} else {
			alert("File upload is not supported!");
		}
	function readFile(file) {
		var reader = new FileReader();
		reader.onloadend = function () {
			processFile(reader.result, file.type);
		}
		reader.onerror = function () {
			alert('There was an error reading the file!');
		}
		reader.readAsDataURL(file);
	}
	function dataURItoBlob(dataURI) {
	    // convert base64/URLEncoded data component to raw binary data held in a string
	    var byteString;
	    if (dataURI.split(',')[0].indexOf('base64') >= 0)
	        byteString = atob(dataURI.split(',')[1]);
	    else
	        byteString = unescape(dataURI.split(',')[1]);

	    // separate out the mime component
	    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

	    // write the bytes of the string to a typed array
	    var ia = new Uint8Array(byteString.length);
	    for (var i = 0; i < byteString.length; i++) {
	        ia[i] = byteString.charCodeAt(i);
	    }

	    return new Blob([ia], {type:mimeString});
	}
	function _dataURItoBlob(dataURI) {
      if(!dataURI) return null;
      else var mime = dataURI.match(/^data\:(.+?)\;/);
      var byteString = atob(dataURI.split(',')[1]);
      var ab = new ArrayBuffer(byteString.length);
      var ia = new Uint8Array(ab);
      for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      }
      return new Blob([ab], {type: mime[1]});
    }
    
	function processFile(dataURL, fileType) {
		var maxWidth = 800;
		var maxHeight = 800;

		var image = new Image();
		image.src = dataURL;

		image.onload = function () {
			var width = image.width;
			var height = image.height;
			
			var shouldResize = (width > maxWidth) || (height > maxHeight);

			if (!shouldResize) {
				//sendFile(dataURL);
				return;
			}

			var newWidth;
			var newHeight;

			if (width > height) {
				newHeight = height * (maxWidth / width);
				newWidth = maxWidth;
			} else {
				newWidth = width * (maxHeight / height);
				newHeight = maxHeight;
			}

			var canvas = document.createElement('canvas');

			canvas.width = newWidth;
			canvas.height = newHeight;

			var context = canvas.getContext('2d');

			context.drawImage(this, 0, 0, newWidth, newHeight);

			dataURL = canvas.toDataURL();
			//dataURL = canvas.toDataURL('image/jpeg', 0.5);
			 document.getElementById('canvasImg').src = dataURL;
			//var blob = dataURItoBlob(dataURL);
			//var blob = _dataURItoBlob(dataURL);
			//sendFile(blob);
		};

		image.onerror = function () {
			alert('There was an error processing your file!');
		};
	}
	setTimeout(function(){
		var cked = getCookie('cked');
		if(cked==0){
			$("#modal-game").modal("show");
		}
	},6000);
	// var e_comment = $('#frm_thi_anh').find('textarea#message');
	// 	//console.log(e_comment);
	// 	e_comment.change(function(){
	// 		var cmt = $(this).val();
	// 		e_comment.val(cmt);
	// 	});
	// var e_sel = $('#frm_thi_anh').find('select.sel-service');
	// e_sel.change(function(){
	// 	var selected = $('select.sel-service :selected').text();
	// 	console.log(selected);
	// 	//var sel = $(this).text();
	// 	alert(selected);
	// });

	//function sendFile(fileData) {
	$('#frm_thi_anh').find('.btn-submit').click(function(){
		//alert('hi');
	//$('#frm_thi_anh').submit(function(){
		var e_frm_anh =$('#frm_thi_anh');
		//console.log(e_frm_anh);
		var blob;
		e_frm_anh.find('.loading').show();
		var dataURL = document.getElementById('canvasImg').getAttribute("src");
		if(isRealValues(dataURL)){
			blob = dataURItoBlob(dataURL);
		}	
		var fullname = e_frm_anh.find('.fullname').val();
		var address = e_frm_anh.find('.address').val();
		var email = e_frm_anh.find('.email').val();
		var phone = e_frm_anh.find('.phone').val();
		var comment = e_frm_anh.find('textarea#message').val();
		var selected = $('select.sel-service :selected').text();
		
		var formData = new FormData();
		formData.append('action', 'send_images');
		formData.append('_name', fullname);
		formData.append('_address', address);
		formData.append('_email', email);
		formData.append('_phone', phone);
		formData.append('_comment', comment);
		formData.append('_selected', selected);
		formData.append('imageData', blob);
		// Display the key/value pairs
		// for (var pair of formData.entries()) {
		//     console.log(pair[0]+ ', ' + pair[1]); 
		// }
		$.ajax({
			type: 'POST',
			url: MyAjax.ajaxurl,
			data: formData,
			contentType: false,
			processData: false,
			success: function (data) {
				console.log(data);
				e_frm_anh.find('.loading').hide();
				if(data){
					e_frm_anh.find('.result').html('<h5 style="color:#6F4238">Cảm ơn bạn! chúng tôi sẽ cố gắng phản hồi trong thời gian sớm nhất có thể</span></h5>');
					setTimeout(function(){
						//e_frm_anh[0].reset();
						e_frm_anh.find('.result').html('');
						e_frm_anh.find('#canvasImg').attr("src","");
					},6000);
				}else{
					e_frm_anh.find('.result').html('...');
				}
				return false;
			},
			error: function (data) {
				//alert('There was an error uploading your file!');
			}
		});
		return false;
	});


});

function setck(){
		var cked = getCookie('cked');
		if(cked==0){
			setCookie('cked',1,2);
		}
	}
 function deleteCookie(cookiename){
      var d = new Date();
      d.setDate(d.getDate() - 1);
      var expires = ";expires="+d;
      var name=cookiename;
      //alert(name);
      var value="";
      document.cookie = name + "=" + value + expires + "; path=/";                    
  }
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    //d.setTime(d.getTime() + (hours*60*60*1000));
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
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
function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
   }
}