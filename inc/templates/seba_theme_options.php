<h2>You can change sidebar options here!</h2>
<?php
settings_errors(); 
// $firstName=esc_attr(get_option('first_name'));
?>


<form method="post" action="options.php" class="seba-general-form">
<?php 
settings_fields( 'seba-theme-support');
do_settings_sections( 'theme_options' ); 
submit_button();
?>

</form>
</div>