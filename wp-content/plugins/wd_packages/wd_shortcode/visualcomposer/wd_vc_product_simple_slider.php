<?php
/*tvlgiao_wpdance_product_simple_slider*/
if( tvlgiao_wpdance_is_woocommerce() ){
	$product_category = tvlgiao_wpdance_vc_get_list_category();
	vc_map(array(
			"name"				=> esc_html__("WD - Products Simple Slider",'wd_package'),
			"base"				=> 'tvlgiao_wpdance_products_simple_slider',
			'description' 		=> esc_html__("Simple Product Slider with dot style...", 'wd_package'),
			"category"			=> esc_html__("WPDance Shortcode",'wd_package'),
			'icon'        		=> 'icon-wpb-woocommerce',
			"params"=>array(
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
					'description' => ''
				),
				array(
					'type'			=> 'textfield',
					'heading' 		=> esc_html__( 'Number Of Products', 'wd_package' ),
					'param_name' 	=> 'number_products',
					'admin_label' 	=> true,
					'value' 		=> '12',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Image Size', 'wd_package' ),
					'param_name' 	=> 'image_size',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_image_size(),
					'description' 	=> '',
					'std'			=> 'shop_catalog',
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
					'value' 		=> tvlgiao_wpdance_get_order_by_values('product'),
					'std'			=> 'date',
					'description' 	=> '',
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
				array(
					"type" 			=> "dropdown",
					"class" 		=> "",
					"heading" 		=> esc_html__("Auto Play", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "auto_play",
					"value" => array(
							'Yes' 		=> '1',
							'No' 		=> '0'
						),
					"description" 	=> "",
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
		)
	);
}
?>