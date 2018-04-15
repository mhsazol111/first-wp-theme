<?php

/*
============================
	Admin Functions
============================
*/

function itw_add_admin_panel() {
	add_menu_page( 'iTiger Theme Options', 'iTiger', 'manage_options', 'itw-theme-options', 'itw_create_theme_page', get_template_directory_uri() . '/assets/img/itw-theme-icon.png', 120 );
}
add_action( 'admin_menu', 'itw_add_admin_panel' );


function itw_create_theme_page() {
	// Call back generation Function
}