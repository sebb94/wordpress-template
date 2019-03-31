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


        $(carousel).each(function(){

            var nextThumb = $(this).find('.carousel-item.active').find('.next-image-preview').data('image');
            var prevThumb = $(this).find('.carousel-item.active').find('.prev-image-preview').data('image');
           // console.log(nextThumb);
            $(this).find('.carousel-control-next').find('.thumbnail-container').css({
                'background-image': 'url(' + nextThumb + ')'});
            $(this).find('.carousel-control-prev').find('.thumbnail-container').css({
                'background-image': 'url(' + prevThumb + ')'});
        });
     
    }

    /* Ajax Functions */

    $(document).on('click', '.seba-load-more', function () {

        let that = $(this);
        let page = $(this).data('page');
        let newPage = page+1;
        let ajaxurl = $(this).data('url');
        
        console.log(page);

        $.ajax({

            url : ajaxurl,
            type: 'post',
            data : {
                
                page: page, 
                action: 'seba_load_more'
            },
            error : function( respone ){
                console.log(response);
            },
            success : function( response ){
                that.data('page',newPage);
                $('.seba-post-container').append(response);

            }
        });

    }); 



})(jQuery)
