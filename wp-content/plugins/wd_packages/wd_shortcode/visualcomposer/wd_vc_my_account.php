<?php
if ( tvlgiao_wpdance_is_woocommerce() ) {
	# Add shortcode User Links
	vc_map(array(
		'name' 				=> esc_html__("WD - My Account", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_user_links',
		'description' 		=> esc_html__("Display user's links (login, logout, register...)", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'vc_icon-vc-gitem-post-author',
		'params' => array(
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Icon', 'wd_package' ),
				'param_name' 	=> 'show_icon',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1', 
					'No'		=> '0'
				),
				'std'			=> '0',
				'description' 	=> esc_html__('Display icon in front of text', 'wd_package')
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Text', 'wd_package' ),
				'param_name' 	=> 'show_text',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Yes'		=> '1', 
					'No'		=> '0'
				),
				'std'			=> '1',
				'description' 	=> esc_html__('Display Title Login/Register or My Account...', 'wd_package')
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wd_package'),
				'description' 	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> ''
			)
		)
	));
}
?>