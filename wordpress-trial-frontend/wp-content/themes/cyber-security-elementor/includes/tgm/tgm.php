<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function cyber_security_elementor_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'cyber-security-elementor' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'cyber-security-elementor' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Essential Addons for Elementor', 'cyber-security-elementor' ),
			'slug'             => 'essential-addons-for-elementor-lite',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	cyber_security_elementor_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'cyber_security_elementor_register_recommended_plugins' );
