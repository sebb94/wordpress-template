
<?php
settings_errors(); 
?>

<form id="save-custom-css-form" method="post" action="options.php" class="seba-general-form">
<?php 
settings_fields( 'seba-custom-css-options');
do_settings_sections( 'css_options' ); 
submit_button();
?>

</form>
</div>