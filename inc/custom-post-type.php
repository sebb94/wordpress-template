<?php 

/*

@package sebatheme

Theme custom post type

*/

$contact = get_option('activate_contact');
if(!empty($contact) && $contact == 1){
    
    add_action('init','seba_contact_custom_post_type');
    // filter - używamy gdy cos co już jest w WP zmieniamy
    add_filter( 'manage_seba_contact_posts_columns', 'seba_set_contact_columns' );

    add_action('manage_seba_contact_posts_custom_column', 'seba_contact_custom_column', 10, 2);
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
        'supports'          => array('title','editor','author'),
        'menu_icon'         => 'dashicons-email-alt'
    ); 

    register_post_type('seba_contact', $args);
}
// columns bierze jako parametr z filtra kolumny wszystkie, czyli supports (title,editor, itp);
function seba_set_contact_columns($columns){
$newColumns = array();
$newColumns['title'] = 'Full name';
$newColumns['message'] = 'Message';
$newColumns['email'] = 'Email';
$newColumns['date'] = 'Date';
return $newColumns;
}

function seba_contact_custom_column($column, $post_id){

    switch ($column){
        case 'message':
        echo get_the_excerpt();
        break;
        case 'email':
        echo 'email adress';
        break;
    }

}

