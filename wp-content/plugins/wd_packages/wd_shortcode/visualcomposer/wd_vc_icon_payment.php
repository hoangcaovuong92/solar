<?php
	vc_map(array(
		'name' 				=> esc_html__("WD - Payment Icon", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_payment_icon',
		'description' 		=> esc_html__("Payment Icon", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-vc_icon',
		"params" => array(
			array(
				'type' 			=> 'sorted_list',
				'heading' 		=> __( 'Select Payment Icon', 'wd_package' ),
				'param_name' 	=> 'list_icon_payment',
				'description' 	=> __( '', 'wd_package' ),
				'value' 		=> 'fa-cc-amex, fa-cc-discover, fa-cc-mastercard, fa-cc-paypal, fa-cc-visa',
				'options' 		=> tvlgiao_wpdance_vc_get_list_payment_icon(),
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Icon Size", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "size",
				"value" 		=> tvlgiao_wpdance_vc_get_list_awesome_font_size(),
				"std" 			=> "fa-2x",
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Text Align', 'wd_package' ),
				'param_name' 	=> 'text_align',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
				'std'			=> 'text-left',
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wd_package'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> ''
			)
		)
	));
?>