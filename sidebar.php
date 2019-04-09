<?php 
/*

@package sebatheme
sidebar
*/

if ( ! is_active_sidebar( 'seba-sidebar' ) ){
    return;
}

?>

<aside id="secondary" class="widget_area wiget_area_seba" role="complementary">

<?php dynamic_sidebar('seba-sidebar'); ?>


</aside>