<?php
/* 

----------
Admin page
----------

*/

function seba_theme_create_page() {
    require_once(get_template_directory() . '/inc/templates/seba_general.php');
}

function seba_theme_css_settings() {
    require_once(get_template_directory() . '/inc/templates/seba_css.php');
}

function seba_add_admin_page() {
    // admin menu page
    add_menu_page('Seba theme options', 'Theme options', 'manage_options', 'seba_options', 'seba_theme_create_page', 'dashicons-admin-home', 133);
    // admin sub menu
    // nie ma efektu, że taki powiela się zakładka w submenu o takim samym slagu
    add_submenu_page('seba_options', 'Theme settings', 'General', 'manage_options', 'seba_options', 'seba_theme_create_page');
    add_submenu_page('seba_options', 'Css option', 'Css options', 'manage_options', 'css_options', 'seba_theme_css_settings');
    // Activate  setting custom settings
    add_action('admin_init', 'seba_custom_settings');
}

add_action('admin_menu', 'seba_add_admin_page');

function seba_custom_settings() {
    register_setting('seba-settings-group', 'profile_picture');
    register_setting('seba-settings-group', 'first_name');
    register_setting('seba-settings-group', 'last_name');
    register_setting('seba-settings-group', 'bio_description');
    register_setting('seba-settings-group', 'twitter_handler', 'seba_sanitize_twitter_handler');
    register_setting('seba-settings-group', 'facebook_handler');
    register_setting('seba-settings-group', 'instagram_handler');
    // id sekcji, tytuł, funkcja, slug 
    add_settings_section('seba_sidebar_options', 'Sidebar Options', 'seba_sidebar_options', 'seba_options');
    add_settings_field('sidebar-profile-picture', 'Profile picture', 'seba_profile_picture', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-name', 'Full name', 'seba_sidebar_name', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-description', 'Your Description', 'seba_sidebar_description', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-twitter', 'Twiter', 'seba_sidebar_twitter', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-facebook', 'Facebook', 'seba_sidebar_facebook', 'seba_options', 'seba_sidebar_options');
    add_settings_field('sidebar-instagram', 'Instagram', 'seba_sidebar_instagram', 'seba_options', 'seba_sidebar_options');
}

function seba_profile_picture(){
  $picture = esc_attr(get_option('profile_picture'));
     echo '<input type="button" value="Upload Profile Picture" id="upload-button">';
      echo '<input type="hidden" name="profile_picture" val="'. $picture . '" id="profile-picture">
      <p class="description">Insert Your Profile picture. You can watch preview and remember to click Save Changes.</p>';
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

function seba_sidebar_options() {
    echo "Customize your Sidebar Informations";
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