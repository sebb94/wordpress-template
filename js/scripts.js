(function ($) {
$('.carousel').carousel();
    revealPosts();

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
            console.log('asd');
            var nextThumb = $(this).find('.carousel-item.active').find('.next-image-preview').data('image');
            var prevThumb = $(this).find('.carousel-item.active').find('.prev-image-preview').data('image');
            console.log(nextThumb);
            $(this).find('.carousel-control-next').find('.thumbnail-container').css({
                'background-image': 'url(' + nextThumb + ')'});
            $(this).find('.carousel-control-prev').find('.thumbnail-container').css({
                'background-image': 'url(' + prevThumb + ')'});
        });
     
    }

    /* Ajax Functions */

    $(document).on('click', '.seba-load-more:not(.loading)', function () {

        let that = $(this);
        let page = $(this).data('page');
        let newPage = page+1;
        let ajaxurl = $(this).data('url');
        
        that.addClass('loading').find('.text').slideUp(320);
        that.find('.load-more-icon-container i').addClass('spin');
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
  
                setTimeout(function () {
                    that.data('page', newPage);
                    $('.seba-posts-container').append(response);
                    that.removeClass('loading').find('.text').slideDown(320);
                    that.find('.load-more-icon-container i').removeClass('spin');
                    var carousel = ".seba-carousel-thumb";
                    $(carousel).on('slid.bs.carousel', function () {
                        seba_get_bs_thumbs(carousel);
                    });
                    revealPosts();

                } ,2000 );
            

            }
        });

    }); 


    /* helper functions */
function revealPosts(){

    var posts = $('article:not(.reveal)');
    var i = 0;
    setInterval(function(){

        if(i >= posts.length)
            return false;

        var el = posts[i]; 
        $(el).addClass('reveal').find('.seba-carousel-thumb').carousel();
        i++;
    }, 200);

}


})(jQuery)
