<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
        'type'        => 'slider',
        'settings'    => 'cyber_security_elementor_logo_resizer',
        'label'       => __( 'Logo Size', 'cyber-security-elementor' ),
        'section'     => 'title_tagline',
        'default'     => 150,
        'choices'     => [
            'min'   => 50,
            'max'   => 300,
            'step'  => 1,
        ],
    ] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cyber_security_elementor_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'cyber-security-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cyber-security-elementor' ),
			'off' => esc_html__( 'Disable', 'cyber-security-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cyber_security_elementor_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'cyber-security-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cyber-security-elementor' ),
			'off' => esc_html__( 'Disable', 'cyber-security-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_logo_settings_premium_features',
		'section'     => 'title_tagline',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Unlock More Features in the Premium Version!', 'cyber-security-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customizable Text Logo', 'cyber-security-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Enhanced Typography Options', 'cyber-security-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Priority Support', 'cyber-security-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'cyber-security-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/cyber-security-wordpress-theme', 'cyber-security-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'cyber-security-elementor' ) .'</a></div>',
	) );

	// Theme color

	Kirki::add_section( 'cyber_security_elementor_theme_color_setting', array(
		'title'    => __( 'Color Option', 'cyber-security-elementor' ),
		'priority' => 10,
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_theme_color',
		'label'       => __( 'Theme color', 'cyber-security-elementor'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_theme_color_setting',
		'type'        => 'color',
		'default'     => '#2AA2FF',
	) );

	// TYPOGRAPHY SETTINGS
	Kirki::add_panel( 'cyber_security_elementor_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'cyber-security-elementor' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'cyber_security_elementor_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_h1_typography_heading',
		'section'     => 'cyber_security_elementor_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'cyber_security_elementor_h1_typography_font',
		'section'   =>  'cyber_security_elementor_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Outfit',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h1',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'cyber_security_elementor_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_h2_typography_heading',
		'section'     => 'cyber_security_elementor_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'cyber_security_elementor_h2_typography_font',
		'section'   =>  'cyber_security_elementor_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Outfit',
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'cyber_security_elementor_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_h3_typography_heading',
		'section'     => 'cyber_security_elementor_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'cyber_security_elementor_h3_typography_font',
		'section'   =>  'cyber_security_elementor_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Outfit',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'cyber_security_elementor_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_h4_typography_heading',
		'section'     => 'cyber_security_elementor_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'cyber_security_elementor_h4_typography_font',
		'section'   =>  'cyber_security_elementor_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Outfit',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'cyber_security_elementor_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_h5_typography_heading',
		'section'     => 'cyber_security_elementor_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'cyber_security_elementor_h5_typography_font',
		'section'   =>  'cyber_security_elementor_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Outfit',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'cyber_security_elementor_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_h6_typography_heading',
		'section'     => 'cyber_security_elementor_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'cyber_security_elementor_h6_typography_font',
		'section'   =>  'cyber_security_elementor_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Outfit',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'cyber_security_elementor_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_body_typography_heading',
		'section'     => 'cyber_security_elementor_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'cyber_security_elementor_body_typography_font',
		'section'   =>  'cyber_security_elementor_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Outfit',
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	// Theme Options Panel
	Kirki::add_panel( 'cyber_security_elementor_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'cyber-security-elementor' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'cyber_security_elementor_section_header',array(
		'title' => esc_html__( 'Header Settings', 'cyber-security-elementor' ),
		'description'    => esc_html__( 'Here you can add header information.', 'cyber-security-elementor' ),
		'panel' => 'cyber_security_elementor_theme_options_panel',
		'tabs'  => [
			'header' => [
				'label' => esc_html__( 'Header', 'cyber-security-elementor' ),
			],
			'menu'  => [
				'label' => esc_html__( 'Menu', 'cyber-security-elementor' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'cyber_security_elementor_menu_size_heading',
		'section'     => 'cyber_security_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_menu_size',
		'tab'      => 'menu',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'cyber-security-elementor' ),
		'type'        => 'text',
		'section'     => 'cyber_security_elementor_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'cyber_security_elementor_menu_text_transform_heading',
		'section'     => 'cyber_security_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'menu',
		'settings'    => 'cyber_security_elementor_menu_text_transform',
		'section'     => 'cyber_security_elementor_section_header',
		'default'     => 'capitalize',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'cyber-security-elementor' ),
			'uppercase' => esc_html__( 'Uppercase', 'cyber-security-elementor' ),
			'lowercase' => esc_html__( 'Lowercase', 'cyber-security-elementor' ),
			'capitalize' => esc_html__( 'Capitalize', 'cyber-security-elementor' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'cyber_security_elementor_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cyber-security-elementor' ),
			'off' => esc_html__( 'Disable', 'cyber-security-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'cyber_security_elementor_enable_button_heading',
		'section'     => 'cyber_security_elementor_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Quote Button', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    => esc_html__( 'Button Text', 'cyber-security-elementor' ),
		'settings' => 'cyber_security_elementor_header_button_text',
		'section'  => 'cyber_security_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Button Link', 'cyber-security-elementor' ),
		'settings' => 'cyber_security_elementor_header_button_url',
		'section'  => 'cyber_security_elementor_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'cyber_security_elementor_logo_settings_premium_features_header',
		'section'     => 'cyber_security_elementor_section_header',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Enhance your header design now!', 'cyber-security-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customize your header background color', 'cyber-security-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Adjust icon and text font sizes', 'cyber-security-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Explore enhanced typography options', 'cyber-security-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'cyber-security-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/cyber-security-wordpress-theme', 'cyber-security-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'cyber-security-elementor' ) .'</a></div>',
	) );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'cyber_security_elementor_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'cyber-security-elementor' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'cyber-security-elementor' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'cyber-security-elementor' ),
		'settings'    => 'cyber_security_elementor_shop_page_layout',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'cyber-security-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'cyber-security-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'cyber_security_elementor_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'cyber-security-elementor' ),
		'settings'    => 'cyber_security_elementor_products_per_row',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'cyber-security-elementor' ),
		'settings'    => 'cyber_security_elementor_products_per_page',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'cyber-security-elementor' ),
		'settings'    => 'cyber_security_elementor_single_product_sidebar_layout',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'cyber-security-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'cyber-security-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'cyber_security_elementor_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_products_button_border_radius_heading',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'cyber_security_elementor_products_button_border_radius',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_sale_badge_position_heading',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'cyber_security_elementor_sale_badge_position',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'cyber-security-elementor' ),
			'left' => esc_html__( 'Left', 'cyber-security-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_products_sale_font_size_heading',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'cyber_security_elementor_products_sale_font_size',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_show_related_product_heading',
		'section'     => 'cyber_security_elementor_woocommerce_settings',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related Product', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_show_related_product',
		'label'       => esc_html__( 'Enable or Disable Related Product', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'cyber_security_elementor_additional_setting',array(
		'title' => esc_html__( 'Additional Settings', 'cyber-security-elementor' ),
		'panel' => 'cyber_security_elementor_theme_options_panel',
		'tabs'  => [
			'general' => [
				'label' => esc_html__( 'General', 'cyber-security-elementor' ),
			],
			'header-image'  => [
				'label' => esc_html__( 'Header Image', 'cyber-security-elementor' ),
			],
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '0',
		'tab'      => 'general',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_enable_sidebar_animation_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Animation', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_enable_sidebar_animation',
		'label'       => esc_html__( 'Enable or Disable Sidebar Animation', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_enable_footer_animation',
		'label'       => esc_html__( 'Enable or Disable Footer Animation', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_scroll_alignment_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Position', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio-buttonset',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_scroll_alignment',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => 'right',
		'choices'     => [
			'left' => esc_html__( 'left', 'cyber-security-elementor' ),
			'center' => esc_html__( 'center', 'cyber-security-elementor' ),
			'right' => esc_html__( 'right', 'cyber-security-elementor' ),
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_scroller_border_radius_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Border Radius', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'slider',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_scroller_border_radius',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '3',
		'choices'     => [
			'min'  => 0,
			'max'  => 25,
			'step' => 1,
		],
		'output' => array(
			array(
				'element'  => '.scroll-up a',
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_cursor_outline_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dot Cursor', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_cursor_outline',
		'label'       => esc_html__( 'Enable or Disable Dot Cursor', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_progress_bar_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_progress_bar',
		'label'       => esc_html__( 'Enable or Disable Progress Bar', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_progress_bar_position_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Position', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'cyber_security_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_progress_bar_position',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => 'top',
		'choices'     => [
			'top' => esc_html__( 'Top', 'cyber-security-elementor' ),
			'bottom' => esc_html__( 'Bottom', 'cyber-security-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'cyber_security_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_progress_bar_color_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Color', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'cyber_security_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_progress_bar_color',
		'tab'      => 'general',
		'label'       => __( 'Color', 'cyber-security-elementor' ),
		'type'        => 'color',
		'section'     => 'cyber_security_elementor_additional_setting',
		'transport' => 'auto',
		'default'     => '#2AA2FF',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '#elemento-progress-bar',
				'property' => 'background-color',
			),
		),
		'active_callback'  => [
			[
				'setting'  => 'cyber_security_elementor_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_single_page_layout_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'cyber_security_elementor_single_page_layout',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'cyber-security-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'cyber-security-elementor' ),
			'One Column' => esc_html__( 'One Column', 'cyber-security-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'cyber_security_elementor_header_background_attachment_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'header-image',
		'settings'    => 'cyber_security_elementor_header_background_attachment',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'cyber-security-elementor' ),
			'fixed' => esc_html__( 'Fixed', 'cyber-security-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'cyber_security_elementor_header_image_height_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image height', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_header_image_height',
		'label'       => __( 'Image Height', 'cyber-security-elementor' ),
		'description'    => esc_html__( 'Enter a value in pixels. Example:500px', 'cyber-security-elementor' ),
		'type'        => 'text',
		'default'    => [
			'desktop' => '550px',
			'tablet'  => '350px',
			'mobile'  => '200px',
		],
		'responsive' => true,
		'tab'      => 'header-image',
		'section'     => 'cyber_security_elementor_additional_setting',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.header-image-box'),
				'property' => 'height',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'cyber_security_elementor_header_overlay_heading',
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_header_overlay_setting',
		'label'       => __( 'Overlay Color', 'cyber-security-elementor' ),
		'type'        => 'color',
		'tab'      => 'header-image',
		'section'     => 'cyber_security_elementor_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000059',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'cyber_security_elementor_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'cyber_security_elementor_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'cyber_security_elementor_blog_post',array(
		'title' => esc_html__( 'Post Settings', 'cyber-security-elementor' ),
		'description'    => esc_html__( 'Here you can add post information.', 'cyber-security-elementor' ),
		'panel' => 'cyber_security_elementor_theme_options_panel',
		'tabs'  => [
			'blog-post' => [
				'label' => esc_html__( 'Blog Post', 'cyber-security-elementor' ),
			],
			'single-post'  => [
				'label' => esc_html__( 'Single Post', 'cyber-security-elementor' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_enable_post_animation_heading',
		'section'     => 'cyber_security_elementor_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Animation', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_enable_post_animation',
		'label'       => esc_html__( 'Enable or Disable Blog Post Animation', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_post_layout_heading',
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_post_layout',
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'cyber-security-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'cyber-security-elementor' ),
			'One Column' => esc_html__( 'One Column', 'cyber-security-elementor' ),
			'Three Columns' => esc_html__( 'Three Columns', 'cyber-security-elementor' ),
			'Four Columns' => esc_html__( 'Four Columns', 'cyber-security-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_length_setting_heading',
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_length_setting',
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_show_pagination_heading',
		'section'     => 'cyber_security_elementor_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Pagination', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'cyber_security_elementor_show_pagination',
		'label'       => esc_html__( 'Enable or Disable Blog Post Pagination', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'cyber_security_elementor_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'cyber_security_elementor_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'cyber_security_elementor_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'cyber-security-elementor' ),
		'settings'    => 'cyber_security_elementor_single_post_tag',
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'cyber-security-elementor' ),
		'settings'    => 'cyber_security_elementor_single_post_category',
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'cyber_security_elementor_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'cyber_security_elementor_single_post_radius',
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'cyber-security-elementor' ),
		'type'        => 'text',
		'tab'      => 'single-post',
		'section'     => 'cyber_security_elementor_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'cyber_security_elementor_show_related_post_heading',
		'section'     => 'cyber_security_elementor_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related post', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'cyber_security_elementor_show_related_post',
		'label'       => esc_html__( 'Enable or Disable Related post', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	// No Results Page Settings

	Kirki::add_section( 'cyber_security_elementor_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_page_not_found_title_heading',
		'section'     => 'cyber_security_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cyber_security_elementor_page_not_found_title',
		'section'  => 'cyber_security_elementor_no_result_section',
		'default'  => esc_html__('404 Error!', 'cyber-security-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_page_not_found_text_heading',
		'section'     => 'cyber_security_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cyber_security_elementor_page_not_found_text',
		'section'  => 'cyber_security_elementor_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'cyber-security-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'cyber_security_elementor_page_not_found_line_break',
		'section'  => 'cyber_security_elementor_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_no_results_title_heading',
		'section'     => 'cyber_security_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cyber_security_elementor_no_results_title',
		'section'  => 'cyber_security_elementor_no_result_section',
		'default'  => esc_html__('Nothing Found', 'cyber-security-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_no_results_content_heading',
		'section'     => 'cyber_security_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cyber_security_elementor_no_results_content',
		'section'  => 'cyber_security_elementor_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cyber-security-elementor'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'cyber_security_elementor_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'cyber-security-elementor' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'cyber-security-elementor' ),
        'panel'    => 'cyber_security_elementor_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_show_footer_widget_heading',
		'section'     => 'cyber_security_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_show_footer_widget',
		'label'       => esc_html__( 'Footer Widget', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_show_footer_copyright',
		'label'       => esc_html__( 'Footer Copyright', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_text_heading',
		'section'     => 'cyber_security_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cyber_security_elementor_footer_text',
		'section'  => 'cyber_security_elementor_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_sticky_heading',
		'section'     => 'cyber_security_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Sticky Copyright', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cyber_security_elementor_sticky_copyright_enable',
		'label'       => esc_html__( ' Sticky Copyright Section Enable / Disable', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cyber-security-elementor' ),
			'off' => esc_html__( 'Disable', 'cyber-security-elementor' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_enable_heading',
		'section'     => 'cyber_security_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cyber_security_elementor_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cyber-security-elementor' ),
			'off' => esc_html__( 'Disable', 'cyber-security-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_background_widget_heading',
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'cyber_security_elementor_footer_background_widget',
		'type'        => 'background',
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18,18,18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_widget_alignment_heading',
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Alignment', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'cyber_security_elementor_footer_widget_alignment',
		'section'     => 'cyber_security_elementor_footer_section',
		'default'     =>[
			'desktop' => 'left',
			'tablet'  => 'left',
			'mobile'  => 'center',
		],
		'responsive' => true,
		'label'       => __( 'Widget Alignment', 'cyber-security-elementor' ),
		'transport' => 'auto',
		'choices'     => [
			'center' => esc_html__( 'center', 'cyber-security-elementor' ),
			'right' => esc_html__( 'right', 'cyber-security-elementor' ),
			'left' => esc_html__( 'left', 'cyber-security-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.footer-area',
				'property' => 'text-align',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_copright_color_heading',
		'section'     => 'cyber_security_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_copright_text_color_heading',
		'section'     => 'cyber_security_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_logo_settings_premium_features_footer',
		'section'     => 'cyber_security_elementor_footer_section',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Elevate your footer with premium features:', 'cyber-security-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Tailor your footer layout', 'cyber-security-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Integrate an email subscription form', 'cyber-security-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Personalize social media icons', 'cyber-security-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'cyber-security-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/cyber-security-wordpress-theme', 'cyber-security-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'cyber-security-elementor' ) .'</a></div>',
	) );

	// Footer Social Icons Section

	Kirki::add_section( 'cyber_security_elementor_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'cyber-security-elementor' ),
		'panel'    => 'cyber_security_elementor_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_footer_social_icon_hide_heading',
		'section'     => 'cyber_security_elementor_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cyber_security_elementor_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cyber_security_elementor_enable_footer_socail_link_align_heading',
		'section'     => 'cyber_security_elementor_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'cyber-security-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'cyber_security_elementor_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'cyber-security-elementor' ),
		'section'     => 'cyber_security_elementor_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'cyber-security-elementor' ),
			'right' => esc_html__( 'right', 'cyber-security-elementor' ),
			'left' => esc_html__( 'left', 'cyber-security-elementor' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'cyber_security_elementor_enable_footer_socail_link',
		'section'     => 'cyber_security_elementor_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'cyber-security-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'cyber_security_elementor_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'cyber-security-elementor' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'cyber-security-elementor' ),
		'settings'     => 'cyber_security_elementor_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'cyber-security-elementor' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'cyber-security-elementor' ). ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'cyber-security-elementor' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'cyber-security-elementor' ),
				'description' => esc_html__( 'Add the social icon url here.', 'cyber-security-elementor' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

}
