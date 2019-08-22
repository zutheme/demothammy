
function jscheckfile(_file) {

    var validExts = new Array(".xlsx", ".xls", ".csv", ".doc", ".docx", ".pdf",".zip",".rar", ".gz", ".jpg", ".png");

    var fileExt = _file.name;

    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));

    if (validExts.indexOf(fileExt) < 0) {

      alert("File không hợp lệ, chỉ chấp nhận loại file " +

               validExts.toString() + " types.");

      return false;

    }

    else {

    	var fs = _file.size;

    	if(fs > 5000000){

    		alert("dung lượng file không quá 5MB");

    		return false;

    	}

    	return true;

    }

}

 ( function ( $ ) {

     'use strict';

    $('a.attach_comment').click(function(){

    	performClick_Class('file-attach-comment',event);

    	var e_parent = $(this).parent();

    	var _user_login = e_parent.find("input[name='user-login']").val();

    	var _author_post = e_parent.find("input[name='author-post']").val();

    	var _idpost = e_parent.find("input[name='idpost']").val();    	

    	var e_file = e_parent.find('input[type="file"]');

    	e_file.change(function(e) {

	        var filename = e.target.files[0];

	        if(!jscheckfile(filename)){

	        	return false;

	        }

	        //console.log(filename.name);

			var formData = new FormData();

			formData.append('action', 'receive_files');

			formData.append('_attach_comment',filename);

			formData.append('idpost',_idpost);

			formData.append('user_login',_user_login);

			formData.append('author_post',_author_post);

			e_parent.find('img.htz-attach-comment-loading').show();

			$.ajax({

				type: 'POST',

				url: MyAjax.ajaxurl,

				data: formData,

				contentType: false,

				processData: false,

				success: function (data) {

					console.log(data);

					var parsed_json = jQuery.parseJSON(data);

	                var error = parsed_json['error'];

	                var idfile = parsed_json['idfile'];

					e_parent.find('img.htz-attach-comment-loading').hide();

					if(error ==''){

						e_parent.find("input[name='idfile']").val(idfile);

						e_parent.find('span.htz-attach-comment-result').html('');

						// setTimeout(function(){

						// 	//location.reload();

						// },1000);

					}else{

						e_parent.find('span.htz-attach-comment-result').html(error);

					}

					return false;

				},

				error: function (data) {

					alert('There was an error uploading your file!');

				}

			});

			 return false;

	    });

	    //$('input[type="file"]'). change(function(e){

    	//var individual_file = file[0].files[0];

    });

    $('a.repply').click(function(event){

	    	event.preventDefault();

	    	var e_frm_repply = $(this).parent().parent().parent();

	    	var _comment = e_frm_repply.find("textarea[name='text-comment']").val();

	    	var _user_login = e_frm_repply.find("input[name='user-login']").val();

	    	var _author_post = e_frm_repply.find("input[name='author-post']").val();

	    	var _idpost = e_frm_repply.find("input[name='idpost']").val();

	    	var _idfile = e_frm_repply.find("input[name='idfile']").val();

	    	

			var formData = new FormData();

			formData.append('action', 'sendto');

			formData.append('idpost',_idpost);

			formData.append('user_login',_user_login);

			formData.append('author_post',_author_post);

			formData.append('idfile',_idfile);

			formData.append('comment',_comment);

			e_frm_repply.find('img.htz-repply-comment-loading').show();

			$.ajax({

				type: 'POST',

				url: MyAjax.ajaxurl,

				data: formData,

				contentType: false,

				processData: false,

				success: function (data) {

					console.log(data);

					var parsed_json = jQuery.parseJSON(data);

	                var error = parsed_json['error'];

	                var sql = parsed_json['sql'];

					e_frm_repply.find('img.htz-repply-comment-loading').hide();

					if(error ==''){

						e_frm_repply.find('span.htz-repply-comment-result').html('');

						setTimeout(function(){

						location.reload();

						 },1000);

					}else{

						e_frm_repply.find('span.htz-repply-comment-result').html(error);

					}

					return false;

				},

				error: function (data) {

					console.log(data);

					//alert('There was an error uploading your file!');

				}

			});

			return false;

    })
     
})(jQuery);

function performClick_icon(elemId,event) {

	event.preventDefault();

   var elem = document.getElementById(elemId);

   if(elem && document.createEvent) {

      var evt = document.createEvent("MouseEvents");

      evt.initEvent("click", true, false);

      elem.dispatchEvent(evt);

   }

}

function performClick_Class(elemId,event) {

	event.preventDefault();

   var elem = document.getElementsByClassName(elemId)[0];

   if(elem && document.createEvent) {

      var evt = document.createEvent("MouseEvents");

      evt.initEvent("click", true, false);

      elem.dispatchEvent(evt);

   }

}


( function ( $ ) {

     'use strict';

    $('a.attach-post').click(function(){

    	performClick_Class('file-attach-post',event);

    	var e_parent = $(this).parent();

    	var _user_login = e_parent.find("input[name='user-login']").val();

    	var _author_post = e_parent.find("input[name='author-post']").val();

    	var _idpost = e_parent.find("input[name='idpost-attach']").val();    	

    	var e_file = e_parent.find('input[type="file"]');

    	e_file.change(function(e) {

	        var filename = e.target.files[0];

	        if(!jscheckfile(filename)){

	        	return false;

	        }

	        //console.log(filename.name);

			var formData = new FormData();

			formData.append('action', 'attach_files');

			formData.append('_attach_post',filename);

			formData.append('idpost',_idpost);

			formData.append('user_login',_user_login);

			formData.append('author_post',_author_post);

			e_parent.find('img.htz-attach-post-loading').show();

			$.ajax({

				type: 'POST',

				url: MyAjax.ajaxurl,

				data: formData,

				contentType: false,

				processData: false,

				success: function (data) {

					console.log(data);

					var parsed_json = jQuery.parseJSON(data);

	                var error = parsed_json['error'];

	                var idfile = parsed_json['idfile'];

					e_parent.find('img.htz-attach-post-loading').hide();

					if(error ==''){

						e_parent.find("input[name='idfile-post']").val(idfile);

						e_parent.find('span.htz-attach-post-result').html('');

						setTimeout(function(){

						location.reload();

						 },1000);

					}else{

						e_parent.find('span.htz-attach-post-result').html(error);

					}

					return false;

				},

				error: function (data) {

					alert('There was an error uploading your file!');

				}

			});

			 return false;

	    });


    });

   
     
})(jQuery);