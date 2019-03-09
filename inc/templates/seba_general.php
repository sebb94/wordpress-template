<h1>Wecolome to Seba Theme!</h1>
<?php settings_errors();?>

<form method="post" action="options.php">
<?php 
settings_fields( 'seba-settings-group');
do_settings_sections( 'seba_options' );
submit_button();

?>

</form>