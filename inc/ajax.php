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
        $prev = $_POST['prev'];
        $archive = $_POST['archive'];


        if ($prev == 1 && $_POST["page"] != 1){
            $paged =  $_POST['page']-1;
        }

        $args = array(
            'post_type' => 'post', 
            'post_status' => 'publish',
            'paged' => $paged
        );

        if ($archive != '0'){
            $archVal = explode('/',$archive);
            if( in_array('category', $archVal) ){

                $type = "category_name";
                $currKey = array_keys($archVal,"category");
                $nextKey = $currKey[0]+1;
                $value = $archVal [$nextKey];
                $args[ $type ] = $value;

            }
               if( in_array('tag', $archVal) ){

                $type = "tag";
                $currKey = array_keys($archVal,"tag");
                $nextKey = $currKey[0]+1;
                $value = $archVal [$nextKey];
                $args[ $type ] = $value;

            }
     if( in_array('author', $archVal) ){

                $type = "author";
                $currKey = array_keys($archVal,"author");
                $nextKey = $currKey[0]+1;
                $value = $archVal [$nextKey];
                $args[ $type ] = $value;

            }

            if (in_array("page", $archVal)){
            $pageVal = explode('page', $archive);
            $page_trail = $pageVal[0];

            }  else{
                    $page_trail = $archive;
                }
            
            /*
            $type = ( $archVal[1] == "category" ? "category_name" : $archVal[1]);
            $args[ $type ] = $archVal[2];
            $page_trail = "/" . $archVal[1] . "/" . $archVal[2] . "/";
            */
    }
    else{
        $page_trail = "/";
    }

      
        $query = new WP_Query($args);

           if( $query->have_posts()):
            echo '<div class="page-limit" data-page="'. $page_trail . 'page/'. $paged . '/">';
                while( $query->have_posts() ) : $query->the_post();
               
                get_template_part('template-parts/seba-content', get_post_format());
              
            endwhile;

            echo '</div>';
 
        else:
            echo 0;
            endif;
            wp_reset_postdata();
        die();
}

function seba_check_paged( $num = null){

$output = '';

    if ( is_paged() ){
        $output = 'page/' . get_query_var('paged');
    }

    if( $num == 1){

        $paged = ( get_query_var('paged') == 0 ? 1 : get_query_var('paged'));
        return $paged;

    }else{
        return $output;
    }


}