<?php
/* 

----------
Admin page
----------

*/

/* create page */
function seba_theme_create_page() {
    require_once(get_template_directory() . '/inc/templates/seba_general.php');
}

function seba_theme_support_page(){
    require_once(get_template_directory() . '/inc/templates/seba_theme_options.php');
}
function seba_theme_contact_form_settings(){
    require_once(get_template_directory() . '/inc/templates/seba_contact_form.php');
}
function seba_theme_css_page() {
    require_once(get_template_directory() . '/inc/templates/seba_custom_css.php');
}

// add page //

function seba_add_admin_page() {
    // admin menu page
    add_menu_page('Seba theme options', 'Seba Theme', 'manage_options', 'seba_options', 'seba_theme_create_page', 'dashicons-admin-home', 133);
    // admin sub menu
    // nie ma efektu, że taki powiela się zakładka w submenu o takim samym slagu
    add_submenu_page('seba_options', 'Sidebar settigns', 'Sidebar', 'manage_options', 'seba_options', 'seba_theme_create_page');
    add_submenu_page('seba_options', 'Theme options', 'Theme options', 'manage_options', 'theme_options', 'seba_theme_support_page');
    add_submenu_page('seba_options', 'Seba Concact Form', 'Contact form', 'manage_options', 'contact_form_options', 'seba_theme_contact_form_settings');
    add_submenu_page('seba_options', 'Css option', 'Css options', 'manage_options', 'css_options', 'seba_theme_css_page');

    // Activate  setting custom settings
    add_action('admin_init', 'seba_custom_settings');
}

add_action('admin_menu', 'seba_add_admin_page');

function seba_custom_settings() {
    /* sidebar */
    register_setting('seba-settings-group', 'profile_picture');
    register_setting('seba-settings-group', 'first_name');
    register_setting('seba-settings-group', 'last_name');
    register_setting('seba-settings-group', 'bio_description');
    register_setting('seba-settings-group', 'twitter_handler', 'seba_sanitize_twitter_handler');
    register_setting('seba-settings-group', 'facebook_handler');
    register_setting('seba-settings-group', 'instagram_handler');
    add_settings_section('seba_sidebar_options', 'Sidebar Options', 'seba_sidebar_options', 'seba_options');
    add_settings_field('sidebar-profile-picture', 'Profile picture', 'seba_profile_picture', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-name', 'Full name', 'seba_sidebar_name', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-description', 'Your Description', 'seba_sidebar_description', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-twitter', 'Twiter', 'seba_sidebar_twitter', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-facebook', 'Facebook', 'seba_sidebar_facebook', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-instagram', 'Instagram', 'seba_sidebar_instagram', 'seba_options', 'seba_sidebar_options');

    /* theme options */
    register_setting('seba-theme-support', 'post_formats');
    register_setting('seba-theme-support', 'custom_header');
    register_setting('seba-theme-support', 'custom_background');
    add_settings_section('seba-theme-options', 'Theme options', 'seba_theme_options', 'theme_options');
    add_settings_field('post-formats','Post Formats','seba_post_format','theme_options','seba-theme-options');
    add_settings_field('custom-header', 'Custom Header', 'seba_custom_header','theme_options','seba-theme-options');
    add_settings_field('custom-background', 'Custom Background', 'seba_custom_background','theme_options','seba-theme-options');

    /* contact options */
    register_setting('seba-contact-options', 'activate_contact');
    add_settings_section('seba-contact-section', 'Contact form', 'seba_contact_section', 'contact_form_options');
    add_settings_field('activate-form', 'Activate Contact form', 'seba_activate_concact_form', 'contact_form_options', 'seba-contact-section');

    /* custom CSS Options */
    register_setting('seba-custom-css-options', 'seba_css', 'seba_sanitize_custom_css');
    add_settings_section('seba-custom-css-section', 'Seba CSS', 'seba_custom_css_section_callback', 'css_options');
    add_settings_field('custom-css', 'Insert your Custom CSS', 'seba_custom_css_callback', 'css_options', 'seba-custom-css-section');

}

/* CSS setting functions */

function seba_custom_css_section_callback(){
    echo "Customize Seba Theme with Your Css";
}
function seba_custom_css_callback(){
    // z register_settings
  $css = get_option('seba_css');
    if(empty($css)){
        $css = "/*Custom css here*/";
    }
  echo '<div id="CSS_editor_custom">' . $css . '</div>';
    echo '<textarea name="seba_css" id="seba_css" style="display:none;visibility:hidden;">' . $css . '</textarea>'; 
}


/* contact form settings functions */

function seba_contact_section(){

}
function seba_activate_concact_form(){
  $options = get_option('activate_contact');
        if(isset($options) && $options == 1){
            $checked = 'checked';
        }
        else{
            $checked = '';
        }
        $output = '<input type="checkbox" id="custom_contact_form" name="activate_contact" value="1" '.$checked.'><br>';
    
    // z callback function trzeba echo a nie return
   echo $output;
}

/* theme settings functions */
function seba_theme_options(){
    //echo "Theme dsadsadsadsaoptions!";
}

function seba_post_format(){ 
    $options = get_option('post_formats');
   // var_dump($options);
    $formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
    $output = '';
    foreach ($formats as $format){
        if(isset($options[$format])){
            $checked = 'checked';
        }
        else{
            $checked = '';
        }
        $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'>' . $format . '</label><br>';
    }
    // z callback function trzeba echo a nie return
   echo $output;
}
function seba_custom_header(){
   $options = get_option('custom_header');

        if(isset($options) && $options == 1){
            $checked = 'checked';
        }
        else{
            $checked = '';
        }  
       echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'>Activate Custom Header</label>';
    
}

function seba_custom_background(){
       $options = get_option('custom_background');
        if(isset($options) && $options == 1){
            $checked = 'checked';
        }
        else{
            $checked = '';
        }
        echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'>Activate Custom background</label>';
}

/* sidebar functions */
function seba_sidebar_options() {
    echo "Customize your Sidebar Informations";
}

function seba_sidebar_name() {
    $firstName=esc_attr(get_option('first_name'));
    $lastName=esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First name"><p class="description">Insert Your First name</p>';
    echo '<input type="text" name="last_name" value="'.$lastName.'" placeholder="Last name"><p class="description">Insert Your Last name</p>';
}
function seba_sidebar_description(){
        $bioDesc =esc_attr(get_option('bio_description'));
    echo '<input type="text" name="bio_description" value="'.$bioDesc.'" placeholder="Your description"><p class="description">Insert Your Description</p>';
}

function seba_profile_picture(){
  $picture = esc_attr(get_option('profile_picture'));
    if(empty($picture)){
 echo '<input type="button" value="Upload Profile Picture" id="upload-button">';
      echo '<input type="hidden" name="profile_picture" value="" id="profile-picture">
      <p class="description">Insert Your Profile picture. You can watch preview and remember to click Save Changes.</p>';
    }
    else{
 echo '<input type="button" value="Upload Profile Picture" id="upload-button" class="profile-button">';
      echo '<input type="hidden" name="profile_picture" value="'. $picture . '" id="profile-picture">
      <input type="button" value="Remove" id="remove-picture" class="profile-button">
      <p class="description">Insert Your Profile picture. You can watch preview and remember to click Save Changes.</p>';
    }
} 

function seba_sidebar_twitter() {
    $twitterHandler=esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitterHandler.'" placeholder="Your Twitter Account"><p class="description">Insert Your Twitter Account without @ charakter</p>';
}

function seba_sidebar_facebook() {
    $facebookHandler=esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="'.$facebookHandler.'" placeholder="Your facebook Account"><p class="description">Insert Your Facebook Account link</p>';
}

function seba_sidebar_instagram() {
    $instagramHandler=esc_attr(get_option('instagram_handler'));
    echo '<input type="text" name="instagram_handler" value="'.$instagramHandler.'" placeholder="Your Instagram Account"><p class="description">Insert Your Instagram Account without @ charakter</p>';
}

// Satnitize settigns:

function seba_sanitize_twitter_handler($input) {
    $output=sanitize_text_field($input);
    $output=str_replace('@', '', $output);
    return $output;
}

function seba_sanitize_custom_css($input) {
    $output = esc_textarea($input);
    return $output;

}


