<?php
if ( tvlgiao_wpdance_is_woocommerce() ) {
	# Add shortcode dropdown cart
	vc_map(array(
		'name' 				=> esc_html__("WD - Woo DropdownCart", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_dropdowncart',
		'description' 		=> esc_html__("Display icon dropdown cart (mini cart).", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-woocommerce',
		'params' => array(
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
} // End Woocommerce
?>