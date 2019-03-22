<?php 
/*

@package sebatheme

*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
        <?php 
            if( have_posts()):
          
                while( have_posts() ) :the_post();
               
                get_template_part('template-parts/seba-content', get_post_format());
               //  get_template_part('template-parts/seba_content_image', get_post_format('image'));
            endwhile;
            endif;



        ?>        
        </div>
    </main>
</div>


<?php 
get_footer();
?>