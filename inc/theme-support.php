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

