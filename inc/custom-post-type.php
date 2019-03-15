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
    add_action('add_meta_boxes','seba_concact_add_meta_box');
    add_action('save_post', 'seba_save_contact_email_data');
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
        $email = get_post_meta($post_id, '_contact_email_value_key',true);
        echo '<a href="mailto:'.$email.'">'.$email.'</a>';
        break;
    }

}

/* Contact meta boxes */

function seba_concact_add_meta_box (){
    add_meta_box('contact_email', 'User email', 'seba_contact_email_callback', 'seba_contact', 'side','');
}

function seba_contact_email_callback( $post ){

    wp_nonce_field('seba_save_contact_email_data', 'seba_contact_email_meta_box_nonce');
    $value = get_post_meta($post->ID, '_contact_email_value_key',true);
    echo '<label for"seba_contact_email_field">User Email Adress</label>';
    echo '<input type="email" name="seba_contact_email_field" id="seba_contact_email_field" value="'. esc_attr($value) . '" size="25" />';

}

function seba_save_contact_email_data( $post_id){

    if( !isset( $_POST['seba_contact_email_meta_box_nonce'])){
        return;
    }
    if( !wp_verify_nonce($_POST['seba_contact_email_meta_box_nonce'], 'seba_save_contact_email_data' )){
        return;
    }
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }
    if( !current_user_can('edit_post', $post_id)){
        return;
    }
    if( !isset( $_POST['seba_contact_email_field'])){
        return;
    }

    $user_email = sanitize_text_field($_POST['seba_contact_email_field']);
    update_post_meta($post_id, '_contact_email_value_key', $user_email);
}