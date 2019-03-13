<?php 

/*

@package sebatheme

Theme custom post type

*/

$contact = get_option('activate_contact');
if(!empty($contact) && $contact == 1){
    add_action('init','seba_contact_custom_post_type');
}

/* Contact CPT */

function seba_contact_custom_post_type(){
    $labels = array(
        'name'              => 'Messeges',
        'singular_name'     => 'Messege',
        'menu_name'         => 'Messeges', 
        'name_admin_bar'    => 'Messege'
    );

    $args = array(
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true, 
        'capability_type'   => 'post',
        'menu_position'     => 26, 
        'supports'          => array('title','editor','author','comments'),
        'menu_icon'         => 'dashicons-email-alt'
    ); 

    register_post_type('seba-contact', $args);
}



