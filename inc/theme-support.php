<?php 

/*

@package sebatheme

Theme support options

*/

$options = get_option( 'post_formats' );
$support= [];
foreach ($options as $option => $value){
    array_push($support,$option);
    }
if (!empty( $options )){
    add_theme_support('post-formats', $support);
}
$header = get_option('custom_header');
if(!empty($header) && $header == 1){
    add_theme_support('custom-header');
}

$background = get_option('custom_background');
if(!empty($background) && $background == 1){
    add_theme_support('custom-background');
}

add_theme_support('post-thumbnails'); 
/* Activate Nav Menu Options */

function seba_register_nav_menu(){
    register_nav_menu('primary_menu', 'Header navigation menu'); 
}

add_action('after_setup_theme','seba_register_nav_menu');


/* activate html5 features */

add_theme_support('html5', array('comment-list','comment-form','search-form','gallery','caption') );


/* BLOG LOOP CUSTOM FUNCTION */

function seba_posted_meta(){
    $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp') );
    $categories = get_the_category();
    $seperator = ', ';
    $output = '';
    $i = 1;
    if (!empty($categories)) :

        foreach ($categories as $category):
            if( $i> 1): $output .= $seperator; endif;
            $output .= '<a href="'. esc_url( get_category_link($category->term_id)) . '" alt="'. esc_attr('View all posts in%s',$category->name) .'">'. esc_html($category->name)  . '</a>';
            $i++;
        endforeach;
    endif;
 return '<span class="posted-on">Posted <a href="'. esc_url(get_permalink()).'">' .  $posted_on . '</a> ago</span> / <span class="posted-in">' . $output . '</span>';
}
function seba_posted_footer(){

    $comments_num = get_comments_number();
    if ( comments_open()){
        if($comments_num == 0){
            $comments = __('No Comments');
        }elseif ($comments_num == 1) {
            $comments =  __('1 Comment');
        }else{
            $comments = $comments_num .  __('Comments');
        }
        $comments = '<a href="'. get_comments_link().'">'. $comments . '<i class="far fa-comments"></i></a>';
    }else{
        $comments = __("Comments are closed");
    }


 return '<div class="post-footer-container">
            <div class="row"> 
                <div class="col-sm-6">
                    '. get_the_tag_list('<div class="tags-list"><i class="fa fa-tag" aria-hidden="true"></i>', ' ', '</div>') .'
                </div>
                 <div class="col-sm-6 text-right">
                    '. $comments .'
                </div>
             </div>
        </div>';
}
function seba_get_attachments( $num = 1 ){

	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
        $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
        )); 

		if( $attachments && $num == 1 ):
            foreach ( $attachments as $attachment ):
       
                $output = wp_get_attachment_url( $attachment->ID );
        
			endforeach;
        elseif( $attachments && $num > 1 ):
 
			$output = $attachments;
		endif;
		
		wp_reset_postdata();
		
	endif;

	return $output;
} 

function seba_get_embeded_media($type = array()){

           $content = do_shortcode( apply_filters('the_content',get_the_content()));
            $embed = get_media_embedded_in_content($content, $type);

            if(in_array('audio',$type)):
                $output = str_replace('?visual=true','?visual=false',$embed[0]);
            else:
                $output = $embed[0];
            
        endif;
               return $output;
}

function seba_get_bs_slides($attachments){
   
    $output = array();
    $count = count($attachments)-1;
    for ($i = 0; $i <= $count; $i++):

            $active = ($i == 0 ? ' active ' : ' ');
            $n = ( $i == $count ? 0 : $i+1);
            $nextImg = wp_get_attachment_thumb_url($attachments[$n]->ID);
            $p = ( $i == 0 ? $count : $i-1);
            $prevImg = wp_get_attachment_thumb_url($attachments[$p]->ID);
            $output[$i] = array(
                'class'     => $active,
                'url'       => wp_get_attachment_url( $attachments[$i]->ID ),
                'next_img'  => $nextImg,
                'prev_img'  => $prevImg,
                'exceprt'   => $attachments[$i]->post_excerpt
                );
         endfor;

         return $output;
}

function seba_grab_url(){

    if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
        return false;
    }
    return esc_url_raw($links[1]);

}
function seba_grab_current_url(){
   $http = ( isset( $_SERVER['HTTS']) ? 'https://' : 'http://' );
        $referer =  $http .  $_SERVER["HTTP_HOST"];
        $archive_url =  $referer .  $_SERVER["REQUEST_URI"];
        return $archive_url;
}
     
function seba_share_this( $content ){

    if( is_single() ){

        $content .= '<div class="seba-share-this"><h4>Share This!</h4>';
        $title = get_the_title();
        $permalink = get_permalink();
        $twitterHandler = ( get_option('twitter_hanlder') ? '&amp;via-' . esc_attr(get_option('twitter_hanlder') ) : '');

        $twitter = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$permalink.$twitterHandler;
        $facebook = 'https://facebook.com/sharer/sharer.php?u=' . $permalink;

        $content .='<ul>';
        $content .=  '<li><a href="'.$twitter.'" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i> </a></li>';
        $content .= '<li><a href="'.$facebook.'" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a></li>';
        $content .= '</ul></div><!-- .seba-share-->';

        return $content;
    }else{
        return $content;
    }

}
add_filter( 'the_content', 'seba_share_this');
