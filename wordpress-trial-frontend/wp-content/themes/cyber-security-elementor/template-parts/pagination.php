<?php if(get_theme_mod('cyber_security_elementor_show_pagination', true )== true): ?>
	<?php
		the_posts_pagination( array(
			'prev_text' => esc_html__( 'Previous page', 'cyber-security-elementor' ),
			'next_text' => esc_html__( 'Next page', 'cyber-security-elementor' ),
		) );
	?>		
<?php endif; ?>