<h2>You can change contact form options here!</h2>
<?php
settings_errors(); 
?>

<p>Use this <strong>shortcode</strong> to activate the Contant Form inside a Page or a Post</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="seba-general-form">
<?php 
settings_fields( 'seba-contact-options');
do_settings_sections( 'contact_form_options' ); 
submit_button();
?>

</form>
</div>