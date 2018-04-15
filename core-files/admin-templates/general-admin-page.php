<h1>General Settings</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
	<?php settings_fields( 'itw-settings-group' ); ?>
	<?php do_settings_sections( 'itw-theme-options' ) ?>
	<?php submit_button(); ?>
</form>