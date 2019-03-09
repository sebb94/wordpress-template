<?php 

/* 

----------
Admin page
----------

*/

 function seba_add_admin_page(){
     // admin menu page
    add_menu_page('Seba theme options','Theme options', 'manage_options','seba_options','seba_theme_create_page', 'dashicons-admin-home',133);

    // admin sub menu

    // nie ma efektu, że taki powiela się zakładka w submenu o takim samym slagu
    add_submenu_page('seba_options', 'Theme settings', 'General', 'manage_options', 'seba_options', 'seba_theme_create_page');

      add_submenu_page('seba_options', 'Css option', 'Css options', 'manage_options', 'css_options', 'seba_theme_css_settings');
      // Activate  setting custom settings
      add_action('admin_init', 'seba_custom_settings');
}
add_action('admin_menu','seba_add_admin_page');

function seba_custom_settings(){
    register_setting('seba-settings-group', 'first_name');

    // id sekcji, tytuł, funkcja, slug 
    add_settings_section('seba-sidebar-options', 'Sidebar Options', 'seba_sidebar_options', 'seba_options');
    add_settings_field('sidebar-name', 'First name', 'seba_sidebar_name','seba_options', 'seba-sidebar-options');
}

function seba_sidebar_name(){
    $firstName = esc_attr(get_option('first_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First name"';
}

function seba_sidebar_options(){
    echo "Customize your Sidebar Informations";
}

function seba_theme_create_page(){ 
    require_once( get_template_directory() . '/inc/templates/seba_general.php' );
}

function seba_theme_css_settings(){
     require_once( get_template_directory() . '/inc/templates/seba_css.php' );
}