<?php
if ( tvlgiao_wpdance_is_woocommerce() ) {
	# Add shortcode dropdown cart
	vc_map(array(
		'name' 				=> esc_html__("WD - Woo DropdownCart", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_dropdowncart',
		'description' 		=> esc_html__("Display icon dropdown cart (mini cart).", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'icon-wpb-woocommerce',
		'params' => array(
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
} // End Woocommerce
?>