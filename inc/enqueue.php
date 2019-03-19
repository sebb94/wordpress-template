<?php 

/*

@package sebatheme

Admin enqueue functions 

*/

function seba_load_admin_scripts( $hook ){
    echo $hook;
    if ($hook == 'toplevel_page_seba_options'){     
    wp_register_style('seba_admin',get_template_directory_uri() . '/css/seba_admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('seba_admin');
    wp_enqueue_media();
    wp_register_script('seba_admin_script',get_template_directory_uri() . '/js/seba_admin.js', array('jquery'), '1.0.0',true);
   wp_enqueue_script('seba_admin_script');
    }else if( $hook == 'seba-theme_page_css_options'){
        wp_enqueue_style('ace',get_template_directory_uri() . '/css/seba_ace.css', array(), '1.0.0', 'all');
        wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js' , array('jquery'), '1.2.1', true);
         wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
        wp_enqueue_style('colorpicker', get_template_directory_uri() . '/css/colorpicker.css', array('bootstrap')); 
       wp_enqueue_script('colorpickerr', get_template_directory_uri() . '/js/color.js' , array(), '1.2.1', true);
        wp_enqueue_script('seba-custom-css-script',get_template_directory_uri() . '/js/seba_custom_css.js' , array('jquery','colorpickerr'), '1.0.0', true);
    }

    else{
         return;
    }
  
}

add_action('admin_enqueue_scripts', 'seba_load_admin_scripts');

/* FRONT END ENQUEUE FUNCTIONS */

function seba_load_scripts(){
      wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
       wp_enqueue_style('seba',get_template_directory_uri() . '/css/seba.css', array('bootstrap','raleway'), '1.0.0', 'all');
       wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,400,500&amp;subset=latin-ext' , array('bootstrap'));
       wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array('bootstrap','raleway'));
   
	
       /* jquery do stopki */
        wp_deregister_script( 'jquery' );
        wp_register_script('jquery', get_template_directory_uri() . '/js/query.js', false, '3.3.1',true);
        wp_enqueue_script('jquery');
     //////////////////////////
       wp_enqueue_script('bootstrap',get_template_directory_uri() . '/js/bootstrap.min.js' , array('jquery'), '4.3.1', true); 
}
add_action('wp_enqueue_scripts', 'seba_load_scripts');

function my_styles_method() {
   // echo "funckjaa";
  
    $color = esc_attr(get_option('seba_color_css')); 
    //  echo $color;
 	wp_enqueue_style('custom-style',get_template_directory_uri() . '/css/seba_custom.css', array('bootstrap','raleway','seba','font-awesome'));
        $custom_css = "
                body{
                        background-color: {$color};
                }";
              //  echo $custom_css;
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );