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
    <div class="nav-mobile-menu">
  <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary_menu',
                                    'container' => false,
                                    'menu_class' => 'navbar-nav'
                                ));
                            ?>
                            </div>
<?php dynamic_sidebar('seba-sidebar'); ?>


</aside>