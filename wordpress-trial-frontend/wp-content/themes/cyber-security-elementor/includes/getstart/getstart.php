<?php
//about theme info
add_action( 'admin_menu', 'cyber_security_elementor_gettingstarted' );
function cyber_security_elementor_gettingstarted() {
	add_theme_page( esc_html__('Cyber Security Elementor', 'cyber-security-elementor'), esc_html__('Cyber Security Elementor', 'cyber-security-elementor'), 'edit_theme_options', 'cyber_security_elementor_about', 'cyber_security_elementor_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function cyber_security_elementor_admin_theme_style() {
	wp_enqueue_style('cyber-security-elementor-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('cyber-security-elementor-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'cyber_security_elementor_admin_theme_style');

// Changelog
if ( ! defined( 'CYBER_SECURITY_ELEMENTOR_CHANGELOG_URL' ) ) {
    define( 'CYBER_SECURITY_ELEMENTOR_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function cyber_security_elementor_changelog_screen() {	
	global $wp_filesystem;
	$cyber_security_elementor_changelog_file = apply_filters( 'cyber_security_elementor_changelog_file', CYBER_SECURITY_ELEMENTOR_CHANGELOG_URL );
	if ( $cyber_security_elementor_changelog_file && is_readable( $cyber_security_elementor_changelog_file ) ) {
		WP_Filesystem();
		$cyber_security_elementor_changelog = $wp_filesystem->get_contents( $cyber_security_elementor_changelog_file );
		$cyber_security_elementor_changelog_list = cyber_security_elementor_parse_changelog( $cyber_security_elementor_changelog );
		echo wp_kses_post( $cyber_security_elementor_changelog_list );
	}
}

function cyber_security_elementor_parse_changelog( $cyber_security_elementor_content ) {
	$cyber_security_elementor_content = explode ( '== ', $cyber_security_elementor_content );
	$cyber_security_elementor_changelog_isolated = '';
	foreach ( $cyber_security_elementor_content as $key => $cyber_security_elementor_value ) {
		if (strpos( $cyber_security_elementor_value, 'Changelog ==') === 0) {
	    	$cyber_security_elementor_changelog_isolated = str_replace( 'Changelog ==', '', $cyber_security_elementor_value );
	    }
	}
	$cyber_security_elementor_changelog_array = explode( '= ', $cyber_security_elementor_changelog_isolated );
	unset( $cyber_security_elementor_changelog_array[0] );
	$cyber_security_elementor_changelog = '<div class="changelog">';
	foreach ( $cyber_security_elementor_changelog_array as $cyber_security_elementor_value) {
		$cyber_security_elementor_value = preg_replace( '/\n+/', '</span><span>', $cyber_security_elementor_value );
		$cyber_security_elementor_value = '<div class="block"><span class="heading">= ' . $cyber_security_elementor_value . '</span></div><hr>';
		$cyber_security_elementor_changelog .= str_replace( '<span></span>', '', $cyber_security_elementor_value );
	}
	$cyber_security_elementor_changelog .= '</div>';
	return wp_kses_post( $cyber_security_elementor_changelog );
}

//guidline for about theme
function cyber_security_elementor_mostrar_guide() { 
	//custom function about theme customizer
	$cyber_security_elementor_return = add_query_arg( array()) ;
	$cyber_security_elementor_theme = wp_get_theme( 'cyber-security-elementor' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Cyber Security Elementor', 'cyber-security-elementor' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'cyber-security-elementor' ); ?>: <?php echo esc_html($cyber_security_elementor_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="cyber_security_elementor_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'cyber-security-elementor' ); ?></button>
				<button class="tablinks" onclick="cyber_security_elementor_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'cyber-security-elementor' ); ?></button>
				<button class="tablinks" onclick="cyber_security_elementor_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'cyber-security-elementor' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$cyber_security_elementor_plugin_ins = Cyber_Security_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();
					$cyber_security_elementor_actions = $cyber_security_elementor_plugin_ins->cyber_security_elementor_recommended_actions;
					?>
					<div class="cyber-security-elementor-recommended-plugins ">
							<div class="cyber-security-elementor-action-list">
								<?php if ($cyber_security_elementor_actions): foreach ($cyber_security_elementor_actions as $cyber_security_elementor_key => $cyber_security_elementor_actionValue): ?>
										<div class="cyber-security-elementor-action" id="<?php echo esc_attr($cyber_security_elementor_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($cyber_security_elementor_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($cyber_security_elementor_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($cyber_security_elementor_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'cyber-security-elementor'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'cyber-security-elementor'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'cyber-security-elementor'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'cyber-security-elementor'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'cyber-security-elementor'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'cyber-security-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'cyber-security-elementor'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'cyber-security-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( CYBER_SECURITY_ELEMENTOR_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'cyber-security-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'cyber-security-elementor'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'cyber-security-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( CYBER_SECURITY_ELEMENTOR_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'cyber-security-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'cyber-security-elementor'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'cyber-security-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( CYBER_SECURITY_ELEMENTOR_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'cyber-security-elementor'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'cyber-security-elementor' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','cyber-security-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','cyber-security-elementor'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','cyber-security-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','cyber-security-elementor'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php cyber_security_elementor_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'cyber-security-elementor'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Cyber Security Elementor WordPress Theme', 'cyber-security-elementor'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( CYBER_SECURITY_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'cyber-security-elementor'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( CYBER_SECURITY_ELEMENTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'cyber-security-elementor'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( CYBER_SECURITY_ELEMENTOR_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'cyber-security-elementor'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'cyber-security-elementor'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'cyber-security-elementor' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'cyber-security-elementor' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'cyber-security-elementor' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'cyber-security-elementor' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'cyber-security-elementor' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'cyber-security-elementor' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'cyber-security-elementor'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( CYBER_SECURITY_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'cyber-security-elementor'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'cyber-security-elementor' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>