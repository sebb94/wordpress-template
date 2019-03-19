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
                echo "oi1";
                while( have_posts() ) :the_post();
                echo "oi2";
                get_template_part('template-parts/seba_content', get_post_format());
                echo "oi3";
            endwhile;
            endif;



        ?>        
        </div>
    </main>
</div>


<?php 
get_footer();
?>