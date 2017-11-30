<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	$product_category = tvlgiao_wpdance_vc_get_list_category();
	vc_map(array(
			"name"				=> esc_html__("WD - Product Grid/List",'wpdancelaparis'),
			"base"				=> 'tvlgiao_wpdance_special_gird_list_product',
			'description' 		=> esc_html__("Display Products with Grid/List layout...", 'wpdancelaparis'),
			"category"			=> esc_html__("WPDance Shortcode",'wpdancelaparis'),
			'icon'        		=> 'icon-wpb-woocommerce',
			"params"			=>array(	
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Select Category', 'wpdancelaparis' ),
					'param_name' 	=> 'id_category',
					'admin_label' 	=> true,
					'value' 		=> $product_category,
					'description' 	=> '',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Data Show', 'wpdancelaparis' ),
					'param_name' 	=> 'data_show',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_special_product_name(),
					'description' 	=> '',
				),
				array(
					'type'			=> 'textfield',
					'heading' 		=> esc_html__( 'Number of products', 'wpdancelaparis' ),
					'param_name' 	=> 'number_products',
					'admin_label' 	=> true,
					'value' 		=> '12',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Sort By', 'wpdancelaparis' ),
					'param_name' 	=> 'sort',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_sort_by_values(),
					'std'			=> 'DESC',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Order By', 'wpdancelaparis' ),
					'param_name' 	=> 'order_by',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_order_by_values('product'),
					'std'			=> 'date',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Columns', 'wpdancelaparis' ),
					'param_name' 	=> 'columns',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_tvgiao_columns(),
					'std'			=> '4',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Switch Grid/List Mode?', 'wpdancelaparis' ),
					'param_name' 	=> 'allow_switch_mode',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Allow'		=> '1',
							'Disallow'	=> '0'
						),
					'description' 	=> esc_html__( 'If you select "Allow", the product layout will be changed by the grid/list mode in the shop.', 'wpdancelaparis' ),
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Grid/List', 'wpdancelaparis' ),
					'param_name' 	=> 'grid_list',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Grid Only'		=> 'grid',
							'List Only'		=> 'list'
						),
					'description' 	=> '',
					'dependency'  	=> Array('element' => "allow_switch_mode", 'value' => array('0'))
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Result Count', 'wpdancelaparis' ),
					'param_name' 	=> 'result_count',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'		=> '1',
							'No'		=> '0'
						),
					'description' 	=> esc_html__( 'Display Number Of Product Result Count', 'wpdancelaparis' ),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Grid/List Button', 'wpdancelaparis' ),
					'param_name' 	=> 'grid_list_button',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'		=> '1',
							'No'		=> '0'
						),
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'  	=> Array('element' => "allow_switch_mode", 'value' => array('1'))
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show Filter Product', 'wpdancelaparis' ),
					'param_name' 	=> 'filter_product',
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
					'heading' 		=> esc_html__( 'Show Pagination Or Load More', 'wpdancelaparis' ),
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
					"heading" 		=> esc_html__("Number Products Load More", 'wpdancelaparis'),
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
					'heading' 		=> esc_html__("Extra class name", 'wpdancelaparis'),
					'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdancelaparis'),
					'admin_label' 	=> true,
					'param_name' 	=> 'class',
					'value' 		=> ''
				)
			)
		)
	);
}
?>