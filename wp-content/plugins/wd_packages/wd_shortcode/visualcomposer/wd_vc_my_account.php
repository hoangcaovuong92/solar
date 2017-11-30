<?php
if ( tvlgiao_wpdance_is_woocommerce() ) {
	# Add shortcode User Links
	vc_map(array(
		'name' 				=> esc_html__("WD - My Account", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_user_links',
		'description' 		=> esc_html__("Display user's links (login, logout, register...)", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'vc_icon-vc-gitem-post-author',
		'params' => array(
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Icon', 'wpdancelaparis' ),
				'param_name' 	=> 'show_icon',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1', 
					'No'		=> '0'
				),
				'std'			=> '0',
				'description' 	=> esc_html__('Display icon in front of text', 'wpdancelaparis')
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Text', 'wpdancelaparis' ),
				'param_name' 	=> 'show_text',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1', 
					'No'		=> '0'
				),
				'std'			=> '1',
				'description' 	=> esc_html__('Display Title Login/Register or My Account...', 'wpdancelaparis')
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wpdancelaparis'),
				'description' 	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> ''
			)
		)
	));
}
?>