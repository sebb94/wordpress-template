(function ($) {

    let mediaUploader;
    $('#upload-button').on('click',function (e) {
       
        e.preventDefault();
        if(mediaUploader){ 
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: "Choose a Profile Picture",
            button: {
                text: 'Choose picture'
            },
            muliple: false
        });
        mediaUploader.on('select',function () {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
          $('#profile-picture-preview').css('background-image','url('+attachment.url+')');
        });


        mediaUploader.open();
    });  

    $('#remove-picture').on('click',function(e){
        e.preventDefault();
        let answer = confirm("Are You sure you want to delete Your Profile Picture?");

        if(answer){
            $('#profile-picture').val('');
            $('.seba-general-form').submit(); 
        }else{
            alert('nie');
        }
        return;
    });
   

})(jQuery)