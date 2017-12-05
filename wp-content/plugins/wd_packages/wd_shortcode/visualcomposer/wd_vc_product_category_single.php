<?php 
if( tvlgiao_wpdance_is_woocommerce() ){
	$product_category       	= tvlgiao_wpdance_get_product_categories_full(false, 'autocomplete');
	vc_map(array(
			"name"				=> esc_html__("WD - Product Category (Single)",'wd_package'),
			"base"				=> 'tvlgiao_wpdance_category_by_name',
			'description' 		=> esc_html__("Display detail of Single Product Category...", 'wd_package'),
			"category"			=> esc_html__("WPDance Shortcode",'wd_package'),
			'icon'       		=> 'icon-wpb-woocommerce',
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
					'type' 			=> "attach_image",
					'class' 		=> "",
					'heading' 		=> esc_html__("Background Image", 'wd_package'),
					'param_name' 	=> "image_url",
					'value' 		=> "",
					'description' 	=> '',
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Image size', 'wd_package' ),
					'param_name' 	=> 'image_size',
					'admin_label' 	=> true,
					'value' 		=> tvlgiao_wpdance_vc_get_list_image_size(),
					'std'			=> 'full',
					'description' 	=> '',
					'edit_field_class' => 'vc_col-sm-6',
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
					'edit_field_class' => 'vc_col-sm-6',
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
					'description'  	=> '',
					'edit_field_class' => 'vc_col-sm-6',
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
					'description' 	=> '',
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