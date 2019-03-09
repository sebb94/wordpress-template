<?php 

/* 

----------
Admin page
----------

*/

 function seba_add_admin_page(){
     // admin menu page
    add_menu_page('Seba theme options','Theme options', 'manage_options','seba_options','seba_theme_create_page', '
    dashicons-admin-home',133);

    // admin sub menu

    // nie ma efektu, że taki powiela się zakładka w submenu o takim samym slagu
    add_submenu_page('seba_options', 'Theme settings', 'General', 'manage_options', 'seba_options', 'seba_theme_create_page');

      add_submenu_page('seba_options', 'Css option', 'Css options', 'manage_options', 'css_options', 'seba_theme_css_settings');
}
add_action('admin_menu','seba_add_admin_page');

function seba_theme_create_page(){ 
    require_once( get_template_directory() . '/inc/templates/seba_general.php' );
}

function seba_theme_css_settings(){
     require_once( get_template_directory() . '/inc/templates/seba_css.php' );
}