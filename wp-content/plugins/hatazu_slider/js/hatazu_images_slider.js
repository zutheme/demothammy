// Runs when the image button is clicked.
var _e_image_button = document.getElementsByClassName('images_slider-button');
for (var i = _e_image_button.length - 1; i >= 0; i--) {
    _e_image_button[i].addEventListener("click",upload_image);
}

function upload_image(){
    var meta_image_frame;
    var _e_parent = this.parentElement.parentElement;
    if ( meta_image_frame ) {
        meta_image_frame.open();
        return;
    }

    // Sets up the media library frame
    meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_image.title,
        button: { text:  meta_image.button },
        library: { type: 'image' }
    });

    // Runs when an image is selected.
    meta_image_frame.on('select', function(){
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.      
        var _images_slider = _e_parent.getElementsByClassName("images_slider")[0];
        var _img_set = _e_parent.getElementsByClassName("img_set")[0];
        _img_set.src = media_attachment.url;
        _images_slider.value = media_attachment.url;
    });

    // Opens the media library frame.
    meta_image_frame.open();
}