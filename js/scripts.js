(function ($) {
$('.carousel').carousel();


        // $(document).on('mouseenter','.carousel-control-next',function (){
            
        //     var nextThumb = $('.carousel-item.active').find('.next-image-preview').data('image');
        //     console.log(nextThumb);
        //     $(this).find('.thumbnail-container').css({'background-image': 'url('+nextThumb+')'});
        // });

    var carousel = ".seba-carousel-thumb";
        seba_get_bs_thumbs(carousel);
        $(carousel).on('slid.bs.carousel',function(){

            seba_get_bs_thumbs(carousel);
        });

    
    function seba_get_bs_thumbs(carousel) {
        var nextThumb = $('.carousel-item.active').find('.next-image-preview').data('image');
        var prevThumb = $('.carousel-item.active').find('.prev-image-preview').data('image');
        console.log(nextThumb);
        $(carousel).find('.carousel-control-next').find('.thumbnail-container').css({
            'background-image': 'url(' + nextThumb + ')'
        });
        $(carousel).find('.carousel-control-prev').find('.thumbnail-container').css({
            'background-image': 'url(' + prevThumb + ')'
        });
    }

})(jQuery)
