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


function add_hb(){
$header = get_option('custom_header');
if(@$header == 1){
    add_theme_support('custom_header');
}

$background = get_option('custom_background');
if(@$background == 1){
    add_theme_support('custom_background');
}
}
add_action( 'after_setup_theme', 'add_hb' );