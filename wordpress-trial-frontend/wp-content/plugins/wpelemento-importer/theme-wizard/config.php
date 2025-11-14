<?php
/**
 * Settings for theme wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

/**
 * Define constants
 **/
if ( ! defined( 'WPELEMENTO_IMPORTER_WHIZZIE_DIR' ) ) {
	define( 'WPELEMENTO_IMPORTER_WHIZZIE_DIR', dirname( __FILE__ ) );
}
// Load the Whizzie class and other dependencies
require trailingslashit( WPELEMENTO_IMPORTER_WHIZZIE_DIR ) . 'elemento_exporter_whizzie.php';
/**
 * Make changes below
 **/

// Change the title and slug of your wizard page
$wpelemento_importer_config['page_slug'] 	= 'wpelemento-importer';
$wpelemento_importer_config['page_title']	= 'Quick Start';
$wpelemento_importer_config['page_heading']	= 'WPElemento Importer';

$wpelemento_importer_config['steps'] = array(
	'intro' => array(
		'id'            => 'intro',
		'title'            => 'Welcome to WPElemento Importer',
		'icon'            => 'dashboard',
		'view'            => 'get_step_intro', // Callback for content
		'callback'        => 'do_next_step', // Callback for JS
		'button_text'    => 'Start Now',
		'can_skip'        => false, // Show a skip button?
		'icon_url'      => EDI_URL . 'theme-wizard/assets/images/battery.png'
	),
	'plugins' => array(
		'id'			=> 'plugins',
		'title'			=> 'Plugins',
		'icon'			=> 'admin-plugins',
		'button_text'	=> 'Install Plugins',
		'can_skip'		=> true,
		'icon_url'      => EDI_URL . 'theme-wizard/assets/images/plugin.png'
	),
	'widgets' => array(
		'id'			=> 'widgets',
		'title'			=> 'Demo Importer',
		'icon'			=> 'welcome-widgets-menus',
		'view'			=> 'get_step_widgets',
		'callback'		=> 'install_widgets',
		'button_text'	=> 'Import Demo',
		'can_skip'		=> true
	),
	'done' => array(
		'id'			=> 'done',
		'title'			=> 'All Done',
		'icon'			=> 'yes',
		'icon_url'      => EDI_URL . 'theme-wizard/assets/images/check-mark.png'
	)
);

/**
 * This kicks off the wizard
 **/
if( class_exists( 'WPElemento_Importer_ThemeWhizzie' ) ) {
	$WPElemento_Importer_ThemeWhizzie = new WPElemento_Importer_ThemeWhizzie( $wpelemento_importer_config );
}
