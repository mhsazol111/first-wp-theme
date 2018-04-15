<?php

/*
============================
	Admin Functions
============================
*/

function itw_add_admin_panel() {
	// Adding Theme Options Page
	add_menu_page( 'iTiger Theme Options', 'iTiger', 'manage_options', 'itw_theme_options', 'itw_create_theme_page', get_template_directory_uri() . '/assets/img/itw-theme-icon.png', 120 );
	// Adding Settings Page
	add_submenu_page( 'itw_theme_options', 'General Options', 'General', 'manage_options', 'itw_theme_options', 'itw_create_theme_page' );
	//Adding Header Options
	add_submenu_page( 'itw_theme_options', 'Header Options', 'Header', 'manage_options', 'itw_header_options', 'itw_header_options' );
}
add_action( 'admin_menu', 'itw_add_admin_panel' );


function itw_create_theme_page() {
	// Call back generation Function
	require_once ( get_template_directory() . '/core-files/admin-templates/general-admin-page.php' );
}

function itw_header_options() {
	// Call back header function
}