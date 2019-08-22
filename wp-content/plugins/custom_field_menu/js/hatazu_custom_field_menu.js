// Runs when the image button is clicked.
var _e_image_button = document.getElementsByClassName('images-menu-button');
for (var i = _e_image_button.length - 1; i >= 0; i--) {
    _e_image_button[i].addEventListener("click",upload_image);
}

function upload_image(){
    var meta_image_frame;
    var _e_parent = this.parentElement;
    console.log(_e_parent);
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
        var _thumnail = _e_parent.getElementsByClassName("thumbnail")[0];
        var _img_set_value = _e_parent.getElementsByClassName("edit-image")[0];
        _thumnail.src = media_attachment.url;
        _img_set_value.value = media_attachment.url;
    });

    // Opens the media library frame.
    meta_image_frame.open();
}