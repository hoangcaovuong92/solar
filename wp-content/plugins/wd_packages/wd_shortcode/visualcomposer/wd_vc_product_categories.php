<?php 
if( tvlgiao_wpdance_is_woocommerce() ){
	$categories       = tvlgiao_wpdance_vc_get_list_category('product_cat', false, 'sorted_list');
	vc_map(array(
			"name"				=> esc_html__("WD - Product Categories",'wpdancelaparis'),
			"base"				=> 'tvlgiao_wpdance_category_product',
			'description' 		=> esc_html__("Display product categories content...", 'wpdancelaparis'),
			"category"			=> esc_html__("WPDance Shortcode",'wpdancelaparis'),
			'icon'        		=> 'icon-wpb-woocommerce',
			"params"			=>array(	
				array(
					'type' 			=> 'sorted_list',
					'heading' 		=> __( 'Categories', 'wpdancelaparis' ),
					'param_name' 	=> 'ids_category',
					'description' 	=> __( 'Select and sort product categories. Leave blank if you want to display all product category', 'wpdancelaparis' ),
					'value' 		=> '-1',
					'options' 		=> $categories,
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Style', 'wpdancelaparis' ),
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
					'heading' 		=> esc_html__( 'Sort By', 'wpdancelaparis' ),
					'param_name' 	=> 'sort',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_get_sort_by_values(),
					'std'			=> 'DESC',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Order By', 'wpdancelaparis' ),
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
					"heading" 		=> esc_html__("Columns", 'wpdancelaparis'),
					"admin_label" 	=> true,
					"param_name" 	=> "columns",
					"value" 		=> '3',
					"description" 	=> "",
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show title', 'wpdancelaparis' ),
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
					'heading' 		=> esc_html__( 'Show Image Category', 'wpdancelaparis' ),
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
					'heading' 		=> esc_html__( 'Show Readmore', 'wpdancelaparis' ),
					'param_name' 	=> 'readmore',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' => esc_html__('', 'wpdancelaparis'),
					'edit_field_class' => 'vc_col-sm-3',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Show meta', 'wpdancelaparis' ),
					'param_name' 	=> 'meta',
					'admin_label' 	=> true,
					'value' 		=> array(
							'Yes'	=> '1',
							'No'	=> '0'
						),
					'description' => esc_html__('', 'wpdancelaparis'),
					'edit_field_class' => 'vc_col-sm-3',
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