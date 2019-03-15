<?php 

/*

@package sebatheme

Admin enqueue functions 

*/

function seba_load_admin_scripts( $hook ){
 
    if ($hook == 'toplevel_page_seba_options'){     
    wp_register_style('seba_admin',get_template_directory_uri() . '/css/seba_admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('seba_admin');
    wp_enqueue_media();
    wp_register_script('seba_admin_script',get_template_directory_uri() . '/js/seba_admin.js', array('jquery'), '1.0.0',true);
   
    }else if( $hook == 'seba-theme_page_css_options'){
        wp_enqueue_style('ace',get_template_directory_uri() . '/css/seba_ace.css', array(), '1.0.0', 'all');
        wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js' , array('jquery'), '1.2.1', true);
        wp_enqueue_script('seba-custom-css-script',get_template_directory_uri() . '/js/seba_custom_css.js' , array('jquery'), '1.0.0', true);
    }

    else{
         return;
    }
  
}

add_action('admin_enqueue_scripts', 'seba_load_admin_scripts');