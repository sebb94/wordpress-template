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

/* Activate Nav Menu Options */

function seba_register_nav_menu(){
    register_nav_menu('primary_menu', 'Header navigation menu'); 
}

add_action('after_setup_theme','seba_register_nav_menu');
