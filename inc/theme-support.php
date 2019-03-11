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