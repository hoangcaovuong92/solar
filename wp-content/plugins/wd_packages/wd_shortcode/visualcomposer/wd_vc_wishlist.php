<?php
if (tvlgiao_wpdance_is_wishlist_active()) {
	// Currency Switcher
	vc_map(array(
		'name' 				=> esc_html__("WD - Wishlist", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_wishlist',
		'description' 		=> esc_html__("Link to wishlist page...", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'icon-wpb-woocommerce',
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wpdancelaparis'),
				'description'	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> 'Wishlist'
			),
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
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wpdancelaparis'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> ''
			)
		)
	));
}
?>