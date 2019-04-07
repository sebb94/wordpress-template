<?php 
/*

@package sebatheme

*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

  
        <div class="container ">
        <?php 
            if( have_posts()):

                while( have_posts() ) : the_post();
               
                get_template_part('template-parts/seba-content-single', get_post_format());
               
                the_post_navigation();

                if ( comments_open() ):
                comments_template();
                endif;

            endwhile;

            endif;
        ?>        
        </div>
    </main>
</div>


<?php 
get_footer();
?>