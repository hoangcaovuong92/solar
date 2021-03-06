<?php
	$blog_category = tvlgiao_wpdance_vc_get_list_category('category');
	vc_map(array(
			"name"				=> esc_html__("WD - Blog Grid/List",'wd_package'),
			"base"				=> 'tvlgiao_wpdance_special_gird_list_blog',
			'description' 		=> esc_html__("Display blog with Grid/List layout...", 'wd_package'),
			"category"			=> esc_html__("WPDance Shortcode",'wd_package'),
			'icon'        		=> 'icon-wpb-toggle-small-expand',
			"params"=>array(	
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Select Category', 'wd_package' ),
					'param_name' 	=> 'id_category',
					'admin_label' 	=> true,
					'value' 		=> $blog_category,
					'description' 	=> '',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Data Show', 'wd_package' ),
					'param_name' 	=> 'data_show',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Recent Blog'		=> 'recent_blog',
							'Most View Blog'	=> 'mostview_blog',
							'Most Comment'		=> 'comment_blog'
						),
					'description' => '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of blogs', 'wd_package' ),
					'param_name' 	=> 'number_blogs',
					'admin_label' 	=> true,
					'value' 		=> '12',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array( 
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Thumbnail Style', 'wd_package' ),
					'param_name' 	=> 'show_data_image_slider',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Show Thumbnail Style For All Post'		=> '1',
							'Show Post Format Style (Video, Audio...)'	=> '0'
						),
					'description' => '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Grid/List Layout', 'wd_package' ),
					'param_name' 	=> 'grid_list_layout',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Grid'			=> 'grid',
							'Grid Masonry' => 'grid-masonry',
							'List'			=> 'list'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Sort By', 'wd_package' ),
					'param_name' 	=> 'sort',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_sort_by_values(),
					'std'			=> 'DESC',
					'description'	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Order By', 'wd_package' ),
					'param_name' 	=> 'order_by',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_order_by_values(),
					'std'			=> 'date',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Columns', 'wd_package' ),
					'param_name' 	=> 'columns',
					'admin_label' 	=> true,
					'value' 		=> array(
							'1 Columns'		=> '1',
							'2 Columns'		=> '2',
							'3 Columns'		=> '3',
							'4 Columns'		=> '4'
						),
					'description' => '',
				),
				array(
					'type' 			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of excerpt words', 'wd_package' ),
					'param_name' 	=> 'excerpt_words',
					'admin_label' 	=> true,
					'value' 		=> '20',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Pagination/Load More', 'wd_package' ),
					'param_name' 	=> 'pagination_loadmore',
					'admin_label' 	=> true,
					'value' 	=> array(
							'Pagination'	=> '1',
							'Load More'	=> '0',
							'No Show'		=> '2'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					"type" 			=> "textfield",
					"class" 		=> "",
					"heading" 		=> esc_html__("Number Blogs Load More", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "number_loadmore",
					"value" 		=> '8',
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
		)
	);
?>