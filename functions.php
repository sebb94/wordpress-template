<?php 


 function seba_add_admin_page(){
    add_menu_page('Seba theme options','Seba', 'manage_options','seba-theme-options','seba_theme_create_page', '
    dashicons-admin-home',133);
}
add_action('admin_menu','seba_add_admin_page');

function seba_theme_create_page(){ 
    echo "<h1>Theme options</h1>";
}




 
