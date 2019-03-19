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
 return 'category name and publishing time';
}