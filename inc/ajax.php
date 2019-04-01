<?php 
/*

@package sebatheme

Ajax functions

*/
add_action('wp_ajax_nopriv_seba_load_more', 'seba_load_more');
add_action('wp_ajax_seba_load_more', 'seba_load_more');
function seba_load_more(){
    // load more post
        $paged = $_POST['page']+1;
     

        $query = new WP_Query(array(
            'post_type' => 'post', 
            'post_status' => 'publish',
            'paged' => $paged

        ) );

           if( $query->have_posts()):
          
                while( $query->have_posts() ) : $query->the_post();
               
                get_template_part('template-parts/seba-content', get_post_format());
              
            endwhile;
            endif;
            wp_reset_postdata();
        die();
}