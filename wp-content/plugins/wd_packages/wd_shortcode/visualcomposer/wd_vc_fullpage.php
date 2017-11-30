<?php
	// Brand Slider
	vc_map(array(
		'name' 				=> esc_html__("WD - Fullpage JS", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_fullpage_js',
		'description' 		=> esc_html__("Create page content with Fullpage JS...", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'icon-wpb-images-carousel',
		"params" 			=> array(
			array(
                'type' 			=> 'param_group',
                'value' 		=> '',
                'param_name' 	=> 'content_group',
                // Note params is mapped inside param-group:
                'params' 		=> array(
                	array(
						"type" 			=> "textarea",
						"class" 		=> "",
						"heading" 		=> esc_html__("Content", 'wpdancelaparis'),
						"param_name" 	=> "content",
						"value" 		=> "",
						"description" 	=> esc_html__("HTML/Shortcode on each section. You can create a shortcode from the new page creation interface.", 'wpdancelaparis'),
					),
					array(
						"type" 			=> "attach_image",
						"class" 		=> "",
						"heading" 		=> esc_html__("Background", 'wpdancelaparis'),
						"param_name" 	=> "background",
						"value" 		=> "",
						"description" 	=> '',
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type' 			=> 'textfield',
						'class' 		=> '',
						'heading' 		=> esc_html__("Section Class", 'wpdancelaparis'),
						'description'	=> esc_html__("", 'wpdancelaparis'),
						'admin_label' 	=> true,
						'param_name' 	=> 'section_class',
						'value' 		=> '',
						'edit_field_class' => 'vc_col-sm-6',
					)
                )
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