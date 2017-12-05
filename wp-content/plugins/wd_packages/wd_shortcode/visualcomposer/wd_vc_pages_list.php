<?php
$pages       = tvlgiao_wpdance_vc_get_list_pages('sorted_list');
vc_map( array(
	'name'        => __( "WD - Pages List", 'wd_package' ),
	'description' => __( "Display pages link with list style...", 'wd_package' ),
	'base'        => 'tvlgiao_wpdance_pages_list',
	"category"    => esc_html__("WPDance Shortcode", 'wd_package'),
	'icon'        => 'icon-wpb-ui-accordion',
	'params'      => array(
		/*-----------------------------------------------------------------------------------
			Categories
		-------------------------------------------------------------------------------------*/
		array(
			'type' 			=> 'sorted_list',
			'heading' 		=> __( 'Categories', 'wd_package' ),
			'param_name' 	=> 'ids',
			'description' 	=> __( 'Select and sort pages.', 'wd_package' ),
			'value' 		=> '-1',
			'options' 		=> $pages,
		),
		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Style', 'wd_package' ),
			'param_name' 	=> 'style',
			'admin_label' 	=> true,
			'value' 		=> array(
				'Footer Menu' 	=> 'footer-copyright-links-list',
			),
			'std'			=> 'footer-copyright-links-list',
			'description' 	=> '',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			"type" 			=> "dropdown",
			"class" 		=> "",
			"heading" 		=> esc_html__("Display Copyright?", 'wd_package'),
			"admin_label" 	=> true,
			"param_name" 	=> "copyright",
			"value" 		=> array(
					'Yes' 		=> '1',
					'No' 		=> '0'
				),
			"description" 	=> "",
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			"type" 			=> "textarea",
			"class" 		=> "",
			"heading" 		=> esc_html__("Copyright Text", 'wd_package'),
			"description" 	=> esc_html__("", 'wd_package'),
			"param_name" 	=> "copyright_text",
			"value" 		=> '© 2017 <a href="#">LAPARIS</a> All Rights Reserved.',
			'dependency'  	=> Array('element' => "copyright", 'value' => array('1')),
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( "Extra class name", 'wd_package' ),
			'description' => __( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package' ),
			'admin_label' => true,
			'param_name'  => 'class',
			'value'       => '',
		),
	)
) );