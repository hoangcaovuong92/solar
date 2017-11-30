<?php
	$product_category = tvlgiao_wpdance_vc_get_list_category();
	$button_style = array(
		'Style 1' 	=> 'style-1',
		'Style 2' 	=> 'style-2',
		'Style 3' 	=> 'style-3',
		'Style 4' 	=> 'style-4',
	);

	vc_map(array(
		'name' 				=> esc_html__("WD - Button", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_buttons',
		'description' 		=> esc_html__("", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'icon-wpb-ui-button',
		"params" => array(
			
			/*-----------------------------------------------------------------------------------
				BUTTON SETTING
			-------------------------------------------------------------------------------------*/
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Button Style', 'wpdancelaparis' ),
				'param_name' 	=> 'button_style',
				'admin_label' 	=> true,
				'value' 		=> $button_style,
				'description' 	=> '',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Link type', 'wpdancelaparis' ),
				'param_name' 	=> 'link_type',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Category Link'	=> 'category_link',
					'Another Url'	=> 'url',
				),
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Select Category', 'wpdancelaparis' ),
				'param_name' 	=> 'id_category',
				'admin_label' 	=> true,
				'value' 		=> $product_category,
				'description' 	=> esc_html__('Select "All Category" to use the link to the shop page.', 'wpdancelaparis'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "link_type", 'value' => array('category_link'))
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("URL", 'wpdancelaparis'),
				"param_name" 	=> "url",
				"description" 	=> esc_html__('', 'wpdancelaparis'),
				'value' 		=> esc_html__('#', 'wpdancelaparis'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "link_type", 'value' => array('url'))
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button text", 'wpdancelaparis'),
				"param_name" 	=> "button_text",
				"description" 	=> esc_html__('', 'wpdancelaparis'),
				'value' 		=> esc_html__('View Category', 'wpdancelaparis'),
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Button class", 'wpdancelaparis'),
				"param_name" 	=> "button_class",
				"description" 	=> '',
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
?>