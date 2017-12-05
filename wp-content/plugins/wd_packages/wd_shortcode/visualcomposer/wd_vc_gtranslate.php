<?php
if( class_exists('GTranslate') ){
	vc_map(array(
		'name' 				=> esc_html__("WD - GTranslate", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_gtranslate',
		'description' 		=> esc_html__("Run GTranslate Shortcode", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-vc_gravityform',
		'params' => array(
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
}
?>