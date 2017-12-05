<?php 
if( tvlgiao_wpdance_is_woocommerce() ){
	$categories       = tvlgiao_wpdance_vc_get_list_category('product_cat', false, 'sorted_list');
	vc_map(array(
			"name"				=> esc_html__("WD - Product Categories",'wd_package'),
			"base"				=> 'tvlgiao_wpdance_category_product',
			'description' 		=> esc_html__("Display product categories content...", 'wd_package'),
			"category"			=> esc_html__("WPDance Shortcode",'wd_package'),
			'icon'        		=> 'icon-wpb-woocommerce',
			"params"			=>array(	
				array(
					'type' 			=> 'sorted_list',
					'heading' 		=> __( 'Categories', 'wd_package' ),
					'param_name' 	=> 'ids_category',
					'description' 	=> __( 'Select and sort product categories. Leave blank if you want to display all product category', 'wd_package' ),
					'value' 		=> '-1',
					'options' 		=> $categories,
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Style', 'wd_package' ),
					'param_name' 	=> 'style',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Style 1'	=> 'style-1',
							'Style 2'	=> 'style-2'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Sort By', 'wd_package' ),
					'param_name' 	=> 'sort',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_sort_by_values(),
					'std'			=> 'DESC',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Order By', 'wd_package' ),
					'param_name' 	=> 'order_by',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_order_by_values('term'),
					'std'			=> 'term_id',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					"type" 			=> "textfield",
					"class"			=> "",
					"heading" 		=> esc_html__("Columns", 'wd_package'),
					"admin_label" 	=> true,
					"param_name" 	=> "columns",
					"value" 		=> '3',
					"description" 	=> "",
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show title', 'wd_package' ),
					'param_name' 	=> 'title',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Image Category', 'wd_package' ),
					'param_name'	=> 'thumbnail',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Readmore', 'wd_package' ),
					'param_name' 	=> 'readmore',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' => esc_html__('', 'wd_package'),
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show meta', 'wd_package' ),
					'param_name' 	=> 'meta',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' => esc_html__('', 'wd_package'),
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