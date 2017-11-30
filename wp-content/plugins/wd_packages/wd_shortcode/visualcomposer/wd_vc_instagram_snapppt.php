<?php
	// Banner Image
	vc_map(array(
		'name' 				=> esc_html__("WD - Instagram Snapppt", 'wpdancelaparis'),
		'base' 				=> 'tvlgiao_wpdance_instagram_snapppt',
		'description' 		=> esc_html__("WD Instagram Snapppt", 'wpdancelaparis'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wpdancelaparis'),
		'icon'        		=> 'vc_icon-vc-gitem-image',
		"params" 			=> array(
			array(
				'type' 			=> 'textarea',
				'class' 		=> '',
				'heading' 		=> esc_html__("Instagram Snapppt Script", 'wpdancelaparis'),
				'description'	=> esc_html__("", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'instagram_snapppt',
				'value' 		=> '',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wpdancelaparis'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdancelaparis'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> '',
			)
		)
	));
?>