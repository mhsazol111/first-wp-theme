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

	//============== General Theme Options ( sub page ) =============
	add_submenu_page(
		'itw-theme-options',                 						 // Parent Menu Page Slug
		'General Theme Options',         						 // The text to the display in the browser when this menu item is active
		'General Options',                  						// The text for this menu item
		'manage_options',            						// Which type of users can see this menu
		'itw-theme-options',          						// The unique ID - the slug - for this menu item
		'itw_theme_options_cb'   						// The function used to render the menu for this page to the screen
	);

	//============= Header Theme Options ( sub pages ) ================
	add_submenu_page(
		'itw-theme-options',                 						 // Parent Menu Page Slug
		'Header Theme Options',         						 // The text to the display in the browser when this menu item is active
		'Header Options',                  						// The text for this menu item
		'manage_options',            						// Which type of users can see this menu
		'itw-header-options',          						// The unique ID - the slug - for this menu item
		'itw_header_options_cb'   						// The function used to render the menu for this page to the screen
	);

	add_action( 'admin_init', 'itw_generate_options' );

}
add_action( 'admin_menu', 'itw_theme_options_page' );

//=============== Generation Settings For Options Page ===============
function itw_generate_options() {

	//================= Register Settings ===============
	add_settings_section(
		'itw-site-identity',							// ID used to identify this section and with which to register options
		'Site Settings',								// Title to be displayed on the administration page
		'itw_site_identity_cb',							// Callback used to render the description of the section
		'itw-theme-options'							// Page on which to add this section of options
	);
	register_setting(
		'itw-settings-group',							// ID used to identify this section and with which to register options
		'itw_initialize_settings_group'						// Name Of the settings group
	);
	add_settings_field(
		'itw-site-title',								// ID used to identify the field throughout the theme
		'Website Title',								// The label to the left of the option interface element
		'itw_site_title_cb',							// The name of the function responsible for rendering the option interface
		'itw-theme-options',							// The page on which this option will be displayed
		'itw-site-identity'							// The name of the section to which this field belongs
		//$args = array()							// The array of arguments to pass to the callback. In this case, just a description
	);
}

function itw_site_title_cb() {
	$site_title = esc_attr( get_option( 'itw_initialize_settings_group' ) );
	echo '<input type="text" name="itw_initialize_settings_group" value="'.$site_title.'" />';
}

function itw_site_identity_cb() {
	echo "Customize the site identity settings";
}

function itw_theme_options_cb() {
	require_once( get_template_directory() . '/core-files/admin-templates/general-admin-page.php' );
}

function itw_header_options_cb() {
	echo "<h1>Header Theme Options Page</h1>";
}