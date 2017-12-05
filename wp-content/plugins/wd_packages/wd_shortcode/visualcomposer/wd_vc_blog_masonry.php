<?php
	// Masonry
	vc_map(array(
		'name' 				=> esc_html__("WD - Blog Masonry", 'wd_package'),
		'base' 				=> 'tvlgiao_wpdance_masonry_blog',
		'description' 		=> esc_html__("Display Masonry Blog...", 'wd_package'),
		'category' 			=> esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        		=> 'icon-wpb-toggle-small-expand',
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Post", 'wd_package'),
				'description' 	=> esc_html__("", 'wd_package'),
				'admin_label' 	=> true,
				'param_name' 	=> 'number',
				'value' 		=> '6',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Columns', 'wd_package' ),
				'param_name' 	=> 'columns',
				'admin_label' 	=> true,
				'value' 		=> array(
						'1 Columns'		=> '1',
						'2 Columns'	=> '2',
						'3 Columns'	=> '3',
						'4 Columns'	=> '4',
						'6 Columns'	=> '6'
					),
				'description' => '',
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> esc_html__( 'Show Pagination Or Load More', 'wd_package' ),
				'param_name' 	=> 'pagination_loadmore',
				'admin_label' 	=> true,
				'value' 	=> array(
						'Load More'		=> '0',
						'Pagination'	=> '1',
						'No Show'		=> '2'
					),
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Number Post Load More", 'wd_package'),
				"admin_label" 	=> true,
				"param_name" 	=> "number_loadmore",
				"value" 		=> '6',
				"description" 	=> "",
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  	=> Array('element' => "pagination_loadmore", 'value' => array('0'))
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