<?php

class Whizzie {

	public function __construct() {
		$this->init();
	}

	public function init()
	{
	
	}

	public static function cyber_security_elementor_setup_widgets(){

	set_theme_mod( 'cyber_security_elementor_header_button_text', 'Get A Quote' );
	set_theme_mod( 'cyber_security_elementor_header_button_url', '#' );

	// select Post Box
	$cyber_security_elementor_title_array = array("Penetration Testing", "Vulnerability Assessement" , "Incident Responce" );
	for ($cyber_security_elementor_i = 1; $cyber_security_elementor_i <= 3; $cyber_security_elementor_i++) {
		// Create post
		$cyber_security_elementor_title = $cyber_security_elementor_title_array[$cyber_security_elementor_i - 1];
		$cyber_security_elementor_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.';            
		$cyber_security_elementor_my_post = array(
				'post_title'   => wp_strip_all_tags($cyber_security_elementor_title),
				'post_content' => $cyber_security_elementor_content,
				'post_status'  => 'publish',
				'post_type'    => 'post',
		);
		$cyber_security_elementor_post_id = wp_insert_post($cyber_security_elementor_my_post);
		// Get image URL
		$cyber_security_elementor_image_url = get_template_directory_uri() . '/assets/images/image' . $cyber_security_elementor_i . '.png';
		$cyber_security_elementor_image_data = wp_remote_get($cyber_security_elementor_image_url);
		if (!is_wp_error($cyber_security_elementor_image_data)) {
				$cyber_security_elementor_image_body = wp_remote_retrieve_body($cyber_security_elementor_image_data);
				$cyber_security_elementor_upload_dir = wp_upload_dir();
				$cyber_security_elementor_image_name = 'image' . $cyber_security_elementor_i . '.png';
				$uploaded_file = wp_upload_bits($cyber_security_elementor_image_name, null, $cyber_security_elementor_image_body);
				if (!$uploaded_file['error']) {
					// Set attachment data
					$attachment = array(
						'post_mime_type' => $uploaded_file['type'],
						'post_title'     => sanitize_file_name($cyber_security_elementor_image_name),
						'post_content'   => '',
						'post_status'    => 'inherit',
					);
					$cyber_security_elementor_attach_id = wp_insert_attachment($attachment, $uploaded_file['file'], $cyber_security_elementor_post_id);
					require_once(ABSPATH . 'wp-admin/includes/image.php');
					$cyber_security_elementor_attach_data = wp_generate_attachment_metadata($cyber_security_elementor_attach_id, $uploaded_file['file']);
					wp_update_attachment_metadata($cyber_security_elementor_attach_id, $cyber_security_elementor_attach_data);
					set_post_thumbnail($cyber_security_elementor_post_id, $cyber_security_elementor_attach_id);
				}
		}
		}
}

}
 