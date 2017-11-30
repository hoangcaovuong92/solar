<?php
	vc_map(array(
		'name' 				=> esc_html__("WD - Title/Heading", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_title',
		'description' 		=> esc_html__("Custom title for everywhere", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'icon-wpb-ui-custom_heading',
		"params" => array(
			/*-----------------------------------------------------------------------------------
				Title & DESC
			-------------------------------------------------------------------------------------*/
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Title", 'wpdancelaparis'),
				"param_name" 	=> "title",
				"description" 	=> '',
			),
			array(
				"type" 			=> "textarea",
				"class" 		=> "",
				"heading" 		=> esc_html__("Description", 'wpdancelaparis'),
				"param_name" 	=> "description",
				"description" 	=> '',
			),
			/*-----------------------------------------------------------------------------------
				SETTING
			-------------------------------------------------------------------------------------*/
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Heading Type', 'wpdancelaparis' ),
				'param_name' 	=> 'heading_type',
				'admin_label' 	=> true,
				'value' 		=> array(
					'Title Section Style 1'			=> 'wd-title-section-style-1',
					'Title Section Style 2'			=> 'wd-title-section-style-2',
					'Title Section Style 3'			=> 'wd-title-section-style-3',
					'Title For Special Page'		=> 'wd-title-for-special-page',
				), 
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Heading Element', 'wpdancelaparis' ),
				'param_name' 	=> 'heading_element',
				'admin_label' 	=> true,
				'value' 		=> array(
					'H1'		=> 'h1',
					'H2'		=> 'h2',
					'H3'		=> 'h3',
					'H4'		=> 'h4',
					'H5'		=> 'h5',
					'H6'		=> 'h6',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Text Align', 'wpdancelaparis' ),
				'param_name' 	=> 'text_align',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> __( 'Display Button', 'wpdancelaparis' ),
				'description' 	=> __( 'The button with custom link will display after the description', 'wpdancelaparis' ),
				'param_name'  	=> 'display_button',
				'value'       	=> array(
					'Yes' 	=> '1',
					'No' 	=> '0',
				),
				'std'			=> '0',	
				'save_always' 	=> true,
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> __( "Button Text", 'wpdancelaparis' ),
				"param_name" 	=> "button_text",
				"value" 		=> 'View All', 
				"description" 	=> __( "", 'wpdancelaparis' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "display_button", 'value' => array('1')),
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> __( "Button URL", 'wpdancelaparis' ),
				"param_name" 	=> "button_url",
				"value" 		=> '#', 
				"description" 	=> __( "", 'wpdancelaparis' ),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "display_button", 'value' => array('1'))
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