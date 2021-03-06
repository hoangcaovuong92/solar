<?php
/*tvlgiao_wpdance_special_products_slider*/
if( tvlgiao_wpdance_is_woocommerce() ){
	$product_ids = tvlgiao_wpdance_vc_get_data_by_post_type('product');
	vc_map(array(
			"name"				=> esc_html__("WD - Single Product Detail",'wd_package'),
			"base"				=> 'tvlgiao_wpdance_products_single_detail',
			'description' 		=> esc_html__("Display single product with custom content...", 'wd_package'),
			"category"			=> esc_html__("WPDance Shortcode",'wd_package'),
			'icon'        		=> 'icon-wpb-woocommerce',
			"params"=>array(
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Product ID', 'wd_package' ),
					'param_name' 	=> 'product_id',
					'admin_label' 	=> true,
					'value' 		=> $product_ids,
					'description' 	=> '',
				), 
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Thumbnail', 'wd_package' ),
					'param_name' 	=> 'thumbnail',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'		=> '1',
							'No'		=> '0'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Image size', 'wd_package' ),
					'param_name' 	=> 'image_size',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_image_size(),
					'description' 	=> '',
					'std'			=> 'shop_catalog',
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "thumbnail", 'value' => array('1'))
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Layout Style', 'wd_package' ),
					'param_name' 	=> 'layout_style',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Sync With Product In Shop'		=> '1',
							'Build Custom Layout'			=> '2'
						),
					'description' => '',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Title', 'wd_package' ),
					'param_name' 	=> 'title',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'		=> '1',
							'No'		=> '0'
						),
					'description' => '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Add To Cart', 'wd_package' ),
					'param_name' 	=> 'add_to_cart',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'		=> '1',
							'No'		=> '0'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Description', 'wd_package' ),
					'param_name' 	=> 'description',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'		=> '1',
							'No'		=> '0'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Price', 'wd_package' ),
					'param_name' 	=> 'price',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'		=> '1',
							'No'		=> '0'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
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