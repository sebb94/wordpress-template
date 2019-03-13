<h2>You can change contact form options here!</h2>
<?php
settings_errors(); 
?>

<form method="post" action="options.php" class="seba-general-form">
<?php 
settings_fields( 'seba-contact-options');
do_settings_sections( 'contact_form_options' ); 
submit_button();
?>

</form>
</div>