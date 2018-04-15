<?php

/*
=======================================================================
====================		Admin Functions 	======================
=======================================================================
*/


//====================================
// Adding Theme Option to Dashboard Menu
//====================================
function itw_theme_options_page() {
	add_menu_page(
		'iTiger Theme Options', 						// The title to be displayed on the corresponding page for this menu
		'iTiger Theme',								// The text to be displayed for this actual menu item
		'manage_options',							// Which type of users can see this menu
		'itw-theme-options',							// The unique ID - that is, the slug - for this menu item
		'itw_theme_options_cb',						// The name of the function to call when rendering the menu for this page
		get_template_directory_uri() . '/assets/img/itw-theme-icon.png',	//Menu icon that will show on the dashboard admin panel
		110									// Menu Positon
	);

	//============== General Theme Options (sub page) =============
	add_submenu_page(
		'itw-theme-options',                 						 // Parent Menu Page Slug
		'General Theme Options',         						 // The text to the display in the browser when this menu item is active
		'General Options',                  						// The text for this menu item
		'manage_options',            						// Which type of users can see this menu
		'itw-theme-options',          						// The unique ID - the slug - for this menu item
		'itw_theme_options_cb'   						// The function used to render the menu for this page to the screen
	);

	//============= Header Theme Options (sub pages) ================
	add_submenu_page(
		'itw-theme-options',                 						 // Parent Menu Page Slug
		'Header Theme Options',         						 // The text to the display in the browser when this menu item is active
		'Header Options',                  						// The text for this menu item
		'manage_options',            						// Which type of users can see this menu
		'itw-header-options',          						// The unique ID - the slug - for this menu item
		'itw_header_options_cb'   						// The function used to render the menu for this page to the screen
	);

	add_action( 'admin_init', 'itw_options_generate' );

}
add_action( 'admin_menu', 'itw_theme_options_page' );

//=============== Generation Settings For Options Page ===============
function itw_options_generate() {
	register_setting(
		'itw-settings-group',
		'first_name'
	);
}

function itw_theme_options_cb() {
	echo "<h1>General Theme Options Page</h1>";
}

function itw_header_options_cb() {
	echo "<h1>Header Theme Options Page</h1>";
}









function itw_add_admin_panel() {
	// Adding Settings Page
	add_submenu_page( 'itw_theme_options', 'General Options', 'General', 'manage_options', 'itw_theme_options', 'itw_create_theme_page' );
	//Adding Header Options
	add_submenu_page( 'itw_theme_options', 'Header Options', 'Header', 'manage_options', 'itw_header_options', 'itw_header_options' );

	//Activate Cusotm Settings
	add_action( 'admin_init', 'itw_custom_settings' );
}
add_action( 'admin_menu', 'itw_add_admin_panel' );

function itw_custom_settings() {
	register_setting( 'itw-general-settings-group', 'group_name' );
	
}

function itw_create_theme_page() {
	// Call back generation Function
	require_once ( get_template_directory() . '/core-files/admin-templates/general-admin-page.php' );
}

function itw_header_options() {
	// Call back header function
}