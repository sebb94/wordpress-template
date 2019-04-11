<?php 
/*

@package sebatheme

*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 offset-lg-2 offset-md-1 offset-sm-1">
              
                    <?php 
                        if( have_posts()):

                            while( have_posts() ) : the_post();
                        
                            seba_save_post_views( get_the_ID() );
                            get_template_part('template-parts/seba-content-single', get_post_format());
                        
                            the_post_navigation();

                            if ( comments_open() ):
                            comments_template();
                            endif;

                        endwhile;

                        endif;
                    ?> 
                </div>  <!-- col -->
            </div>  <!-- row -->   
        </div> <!-- container -->
    </main> <!--main -->
</div> <!-- primary -->


<?php get_footer(); ?>