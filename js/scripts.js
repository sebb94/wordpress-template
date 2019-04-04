(function ($) {

    /* init functions */
    $('.carousel').carousel();
    revealPosts();

    /* variables */
    var carousel = ".seba-carousel-thumb";
    var lastScroll = 0;
    /* Carousel functions */
    seba_get_bs_thumbs(carousel);
    $(carousel).on('slid.bs.carousel', function () {

        seba_get_bs_thumbs(carousel);
    });


    function seba_get_bs_thumbs(carousel) {

        $(carousel).each(function () {
            console.log('asd');
            var nextThumb = $(this).find('.carousel-item.active').find('.next-image-preview').data('image');
            var prevThumb = $(this).find('.carousel-item.active').find('.prev-image-preview').data('image');
            console.log(nextThumb);
            $(this).find('.carousel-control-next').find('.thumbnail-container').css({
                'background-image': 'url(' + nextThumb + ')'
            });
            $(this).find('.carousel-control-prev').find('.thumbnail-container').css({
                'background-image': 'url(' + prevThumb + ')'
            });
        });

    }

    /* Ajax Functions */

    $(document).on('click', '.seba-load-more:not(.loading)', function () {

        let that = $(this);
        let page = $(this).data('page');
        let newPage = page + 1;
        let ajaxurl = $(this).data('url');
        let prev = that.data('prev');
        let archive = that.data('archive');
        alert(prev);
        if (typeof prev === 'undefined') {
            prev = 0;
        }
        if (typeof archive === 'undefined') {
            archive = 0;
        }

        that.addClass('loading').find('.text').slideUp(320);
        that.find('.load-more-icon-container i').addClass('spin');
        console.log(page);

        $.ajax({

            url: ajaxurl,
            type: 'post',
            data: {

                page: page,
                archive: archive,
                prev: prev,
                action: 'seba_load_more'
            },
            error: function (respone) {
                console.log(response);
            },
            success: function (response) {

                alert(response);

                if (response == 0) {
                    $('.seba-posts-container').append('<div class="text-center"><h3>No more posts to load!</h3></div>');
                    that.slideUp(320);
                } else {
                    setTimeout(function () {
                        if (prev == 1) {
                            $('.seba-posts-container').prepend(response);
                            var carousel = ".seba-carousel-thumb";
                            $(carousel).on('slid.bs.carousel', function () {
                                seba_get_bs_thumbs(carousel);
                            });
                            newPage = page - 1;
                        } else {
                            $('.seba-posts-container').append(response);
                            var carousel = ".seba-carousel-thumb";
                            $(carousel).on('slid.bs.carousel', function () {
                                seba_get_bs_thumbs(carousel);
                            });
                            
                        }

                        if( newPage == 1){
                              that.slideUp(320);
                        }else{
                            that.data('page', newPage);
                            that.removeClass('loading').find('.text').slideDown(320);
                            that.find('.load-more-icon-container i').removeClass('spin');
                        }
                
                       revealPosts();
                        

                    }, 2000);

                }



            }
        });

    });

    /* scroll function */


    $(window).scroll(function () {

        var scroll = $(window).scrollTop();
        // console.log("Scroll " + scroll);
        if (Math.abs(scroll - lastScroll) > $(window).height() * 0.1) {
            lastScroll = scroll;
            // console.log("Last scroll " + lastScroll);
            $('.page-limit').each(function (index) {

                if (isVisible($(this))) {

                    history.replaceState(null, null, $(this).data('page'));
                    return (false);
                }

            });
        }

    });

    function isVisible(element) {

        var scroll_pos = $(window).scrollTop();
        var window_height = $(window).height();
        var el_top = $(element).offset().top;
        var el_height = $(element).height();
        var el_bottom = el_top + el_height;

        return ((el_bottom - el_height * 0.25 > scroll_pos) && (el_top < (scroll_pos + 0.5 * window_height)));

    }

    /* helper functions */
    function revealPosts() {

        var posts = $('article:not(.reveal)');
        var i = 0;
        setInterval(function () {

            if (i >= posts.length)
                return false;

            var el = posts[i];
            $(el).addClass('reveal').find('.seba-carousel-thumb').carousel();
            i++;
        }, 200);

    }


})(jQuery)