<h1>Wecolome to Seba Theme!</h1>
<h2>You can change sidebar options here!</h2>
<?php
settings_errors(); 
$firstName=esc_attr(get_option('first_name'));
$lastName=esc_attr(get_option('last_name'));
$fullName = $firstName . " " . $lastName;
$bioDesc =esc_attr(get_option('bio_description'));
$picture = esc_attr(get_option('profile_picture'));


?>
<div class="seba-admin-container"> 
<div class="seba-sidebar-preview">
    <div class="seba-sidebar">
            <div class="image-container">
                <div id="profile-picture-preview" class="profile-picture" style="background-image:url(<?php print $picture;?>)">
                 
                </div>
            </div>
        <h1 class="seba-username"><?php echo $fullName;?></h1>
        <h2 class="seba-description"><?php echo $bioDesc;?></h2>
        <div class="icons-wrapper">
        
        </div>
    </div>
</div>

<form method="post" action="options.php" class="seba-general-form">
<?php 
settings_fields( 'seba-settings-group');
do_settings_sections( 'seba_options' );
 submit_button();
?>

</form>
</div>