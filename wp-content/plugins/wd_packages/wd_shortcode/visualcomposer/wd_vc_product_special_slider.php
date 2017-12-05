<?php
/*tvlgiao_wpdance_special_products_slider*/
if( tvlgiao_wpdance_is_woocommerce() ){
	$product_category = tvlgiao_wpdance_vc_get_list_category();
	vc_map(array(
			"name"				=> esc_html__("WD - Products Special Slider", 'wd_package'),
			"base"				=> 'tvlgiao_wpdance_special_products_slider',
			'description' 		=> esc_html__("Display product with custom thumbnail image size...", 'wd_package'),
			"category"			=> esc_html__("WPDance Shortcode", 'wd_package'),
			'icon'       	 	=> 'icon-wpb-woocommerce',
			"params"			=>array(
				/*-----------------------------------------------------------------------------------
					Title & DESC
				-------------------------------------------------------------------------------------*/
				array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> esc_html__("Title", 'wd_package'),
					'description'	=> esc_html__("", 'wd_package'),
					'admin_label' 	=> true,
					'param_name' 	=> 'title',
					'value' 		=> ''
				),
				array(
					'type' 			=> 'textarea',
					'class' 		=> '',
					'heading' 		=> esc_html__("Description", 'wd_package'),
					'description'	=> esc_html__("", 'wd_package'),
					'admin_label' 	=> true,
					'param_name' 	=> 'description',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Text Align', 'wd_package' ),
					'param_name' 	=> 'text_align',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
					'std'			=> 'text-center',
					'description' 	=> esc_html__('', 'wd_package'),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'        	=> 'dropdown',
					'heading'     	=> __( 'Display View All Button', 'wd_package' ),
					'description' 	=> __( '', 'wd_package' ),
					'param_name'  	=> 'view_all_link_display',
					'value'       	=> array(
						'Yes' 	=> '1',
						'No' 	=> '0',
					),
					'std'			=> '0',	
					'save_always' 	=> true,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					"type" 			=> "textfield",
					"class" 		=> "",
					"heading" 		=> __( "View All Text", 'wd_package' ),
					"param_name" 	=> "view_all_text",
					"value" 		=> 'View All', 
					"description" 	=> __( "", 'wd_package' ),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "view_all_link_display", 'value' => array('1'))
				),
				array(
					"type" 			=> "textfield",
					"class" 		=> "",
					"heading" 		=> __( "View All URL", 'wd_package' ),
					"param_name" 	=> "view_all_url",
					"value" 		=> '#', 
					"description" 	=> __( "", 'wd_package' ),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "view_all_link_display", 'value' => array('1'))
				),
				/*-----------------------------------------------------------------------------------
					SETTING
				-------------------------------------------------------------------------------------*/
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Select Category', 'wd_package' ),
					'param_name' 	=> 'id_category',
					'admin_label' 	=> true,
					'value' 		=> $product_category,
					'description' 	=> ''
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Data Show', 'wd_package' ),
					'param_name' 	=> 'data_show',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_special_product_name(),
					'description' 	=> '',
				),
				array(
					'type'			=> 'textfield',
					'heading' 		=> esc_html__( 'Number Of Products', 'wd_package' ),
					'param_name' 	=> 'number_products',
					'admin_label' 	=> true,
					'value' 		=> '12',
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Sort By', 'wd_package' ),
					'param_name' 	=> 'sort',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_sort_by_values(),
					'std'			=> 'DESC',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Order By', 'wd_package' ),
					'param_name' 	=> 'order_by',
					'admin_label' 	=> true ,
					'value' 		=> tvlgiao_wpdance_get_order_by_values('product'),
					'std'			=> 'date',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Product Style', 'wd_package' ),
					'param_name' 	=> 'product_style',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Grid'					=> 'grid',
							'List'					=> 'list',
							'Image Thumb Only'		=> 'image_thumb_only'
						),
					'description' 	=> '',
				),
				array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> esc_html__("Image Padding", 'wd_package'),
					'description' 	=> esc_html__("Padding between images. Only fill in whole numbers or real numbers. Example: 2.5 (Unit: pixels)", 'wd_package'),
					'admin_label' 	=> true,
					'param_name' 	=> 'image_padding',
					'value' 		=> '0',
					'dependency'  	=> Array('element' => "product_style", 'value' => array('image_thumb_only'))
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Thumbnail Size', 'wd_package' ),
					'param_name' 	=> 'image_size',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_image_size(),
					'description' 	=> '',
					'std'			=> 'shop_catalog',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Columns', 'wd_package' ),
					'param_name' 	=> 'columns',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				/*-----------------------------------------------------------------------------------
					SLIDER SETTING
				-------------------------------------------------------------------------------------*/
				array(
					"type" 			=> "dropdown",
					"class" 		=> "",
					"heading" 		=> esc_html__("Is Slider", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "is_slider",
					"value" 		=> array(
							'Yes' 		=> '1',
							'No' 		=> '0'
						),
					"description" 	=> "",
				),
				array(
					"type" 			=> "dropdown",
					"class" 		=> "",
					"heading" 		=> esc_html__("Slider Type", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "slider_type",
					"value" 		=> tvlgiao_wpdance_vc_get_list_slider_type(),
					"description" 	=> "",
					"std"			=> 'owl',
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
				),
				array(
					"type" 			=> "dropdown",
					"class" 		=> "",
					"heading" 		=> esc_html__("Center Mode", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "center_mode",
					"value" 		=> array(
							'Yes' 		=> '1',
							'No' 		=> '0'
						),
					'std'			=> '0',
					"description" 	=> esc_html__("Create highlighter for item at between", 'wd_package'),
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "slider_type", 'value' => array('slick'))
				),
				array(
					"type" 			=> "dropdown",
					"class" 		=> "",
					"heading" 		=> esc_html__("Show Nav", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "show_nav",
					"value" 		=> array(
							'Yes' 		=> '1',
							'No' 		=> '0'
						),
					"description" 	=> "",
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
				),
				array(
					"type" 			=> "dropdown",
					"class" 		=> "",
					"heading" 		=> esc_html__("Auto Play", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "auto_play",
					"value" 		=> array(
							'Yes' 		=> '1',
							'No' 		=> '0'
						),
					"description" 	=> "",
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
				),
				array(
					'type' 			=> 'textfield',
					'class' 		=> '',
					'heading' 		=> esc_html__("Number Rows", 'wd_package'),
					'description' 	=> esc_html__("", 'wd_package'),
					'admin_label' 	=> true,
					'param_name' 	=> 'per_slide',
					'value' 		=> '3',
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "is_slider", 'value' => array('1'))
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Load More', 'wd_package' ),
					'param_name' 	=> 'pagination_loadmore',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Hide'	=> '0',
							'Show'	=> '1'
					),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "is_slider", 'value' => array('0'))
				),
				array(
					"type" 			=> "textfield",
					"class" 		=> "",
					"heading" 		=> esc_html__("Number Products Load More", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "number_loadmore",
					"value" 		=> '8',
					"description" 	=> "",
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "pagination_loadmore", 'value' => array('1'))
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
}
?>