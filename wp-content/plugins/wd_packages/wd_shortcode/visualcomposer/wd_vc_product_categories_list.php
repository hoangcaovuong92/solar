<?php
if( tvlgiao_wpdance_is_woocommerce() ){
	$categories       = tvlgiao_wpdance_vc_get_list_category('product_cat', false, 'sorted_list');
	vc_map( array(
		'name'        => __( "WD - Products Categories Menu", 'wd_package' ),
		'description' => __( "Display product categories name with list style...", 'wd_package' ),
		'base'        => 'tvlgiao_wpdance_product_categories_list',
		"category"    => esc_html__("WPDance Shortcode", 'wd_package'),
		'icon'        => 'icon-wpb-woocommerce',
		'params'      => array(
			
			array(
				'type'        	=> 'textfield',
				'class'       	=> '',
				'heading'     	=> __( "Title", 'wd_package' ),
				'description' 	=> __( "Leave blank to hide title", 'wd_package' ),
				'admin_label' 	=> true,
				'param_name'  	=> 'title',
				'value'       	=> __( 'Categories', 'wd_package' ),
			),
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
				'heading' 		=> esc_html__( 'Text Align', 'wd_package' ),
				'param_name' 	=> 'text_align',
				'admin_label' 	=> true,
				'value' 		=> tvlgiao_wpdance_vc_get_list_text_align_bootstrap(),
				'std'			=> 'text-center',
				'description' 	=> '',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> __( 'View All', 'wd_package' ),
				'description' 	=> __( 'Show item "View All" redirects to shop page.', 'wd_package' ),
				'param_name'  	=> 'view_all',
				'value'       	=> array(
					'Show' 	=> '1',
					'Hide' 	=> '0',
				),
				'save_always' 	=> true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> __( "Extra class name", 'wd_package' ),
				'description' 	=> __( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'wd_package' ),
				'admin_label' 	=> true,
				'param_name'  	=> 'class',
				'value'       	=> '',
			),
		)
	) );
}