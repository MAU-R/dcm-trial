<?php

  $cyber_security_elementor_theme_custom_setting_css = '';

	// Global Color
	$cyber_security_elementor_theme_color = get_theme_mod('cyber_security_elementor_theme_color', '#2AA2FF');

	$cyber_security_elementor_theme_custom_setting_css .=':root {';
		$cyber_security_elementor_theme_custom_setting_css .='--primary-theme-color: '.esc_attr($cyber_security_elementor_theme_color ).'!important;';
	$cyber_security_elementor_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$cyber_security_elementor_scroll_alignment = get_theme_mod('cyber_security_elementor_scroll_alignment', 'right');

    if($cyber_security_elementor_scroll_alignment == 'right'){
        $cyber_security_elementor_theme_custom_setting_css .='.scroll-up{';
            $cyber_security_elementor_theme_custom_setting_css .='right: 30px;!important;';
			$cyber_security_elementor_theme_custom_setting_css .='left: auto;!important;';
        $cyber_security_elementor_theme_custom_setting_css .='}';
    }else if($cyber_security_elementor_scroll_alignment == 'center'){
        $cyber_security_elementor_theme_custom_setting_css .='.scroll-up{';
            $cyber_security_elementor_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
        $cyber_security_elementor_theme_custom_setting_css .='}';
    }else if($cyber_security_elementor_scroll_alignment == 'left'){
        $cyber_security_elementor_theme_custom_setting_css .='.scroll-up{';
            $cyber_security_elementor_theme_custom_setting_css .='left: 30px;!important;';
			$cyber_security_elementor_theme_custom_setting_css .='right: auto;!important;';
        $cyber_security_elementor_theme_custom_setting_css .='}';
    }	

	// Related Product

	$cyber_security_elementor_show_related_product = get_theme_mod('cyber_security_elementor_show_related_product', true );

	if($cyber_security_elementor_show_related_product != true){
		$cyber_security_elementor_theme_custom_setting_css .='.related.products{';
			$cyber_security_elementor_theme_custom_setting_css .='display: none;';
		$cyber_security_elementor_theme_custom_setting_css .='}';
	}    