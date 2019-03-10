<?php 

/*

@package sebatheme

Admin enqueue functions 

*/

function seba_load_admin_scripts( $hook ){

    echo $hook; 
    if ($hook != 'toplevel_page_seba_options'){
        return;
    }
    wp_register_style('seba_admin',get_template_directory_uri() . '/css/seba_admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('seba_admin');
}

add_action('admin_enqueue_scripts', 'seba_load_admin_scripts');