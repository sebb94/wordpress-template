<?php 
/*

@package sebatheme

*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container seba-post-container">
        <?php 
            if( have_posts()):
          
                while( have_posts() ) :the_post();
               
                get_template_part('template-parts/seba-content', get_post_format());
               //  get_template_part('template-parts/seba_content_image', get_post_format('image'));
            endwhile;
            endif;



        ?>        
        </div>

        <div class="container text-center">
            <a class="btn btn-lg btn-info seba-load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php')?>"><i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span> Load more</a> 
        
        </div>
    </main>
</div>


<?php 
get_footer();
?>