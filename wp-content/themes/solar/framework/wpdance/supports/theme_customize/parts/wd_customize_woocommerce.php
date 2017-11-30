<?php
if (!tvlgiao_wpdance_is_woocommerce()) return;
/*--------------------------------------------------------------*/
/*						 CUSTOM PRODUCT  						*/
/*--------------------------------------------------------------*/
$wp_customize->add_panel( 'tvlgiao_wpdance_woocommerce_config', array(
    'title' 			=> esc_html__( 'WD - Woocommerce Config', 'laparis' ),
    'description' 		=> esc_html__( 'Theme Sidebar Layout', 'laparis'),
    'priority' 			=> 520,
));
	$wp_customize->add_section( 'tvlgiao_wpdance_genneral_product' , array(
		'title'       		=> esc_html__( 'Product Layout', 'laparis' ),
		'description' 		=> esc_html__('General Product Config', 'laparis') ,
		'panel'	 			=> 'tvlgiao_wpdance_woocommerce_config',
		'priority'    		=> 5,
	));
	$wp_customize->add_section( 'tvlgiao_wpdance_product_effect' , array(
		'title'       		=> esc_html__( 'Product Visual', 'laparis' ),
		'description' 		=> esc_html__('Setting Product Visual Effect', 'laparis') ,
		'panel'	 			=> 'tvlgiao_wpdance_woocommerce_config',
		'priority'    		=> 5,
	));
	$wp_customize->add_section( 'tvlgiao_wpdance_archive_product' , array(
		'title'       		=> esc_html__( 'Archive Product', 'laparis' ),
		'description' 		=> esc_html__('Custom archive product page', 'laparis'),
		'panel'	 			=> 'tvlgiao_wpdance_woocommerce_config',
		'priority'    		=> 10,
	));
	$wp_customize->add_section( 'tvlgiao_wpdance_single_product' , array(
		'title'       		=> esc_html__( 'Single Product', 'laparis' ),
		'description' 		=> esc_html__('Custom single product page', 'laparis') ,
		'panel'	 			=> 'tvlgiao_wpdance_woocommerce_config',
		'priority'    		=> 15,
	));
	$wp_customize->add_section( 'tvlgiao_wpdance_page_woocommerce' , array(
		'title'       		=> esc_html__( 'Woocommerce Template', 'laparis' ),
		'description' 		=> esc_html__('', 'laparis') ,
		'panel'	 			=> 'tvlgiao_wpdance_woocommerce_config',
		'priority'    		=> 20,
	));
	$wp_customize->add_section( 'tvlgiao_wpdance_cart_product' , array(
		'title'       		=> esc_html__( 'Page Cart', 'laparis' ),
		'description' 		=> esc_html__('Custom page cart product', 'laparis') ,
		'panel'	 			=> 'tvlgiao_wpdance_woocommerce_config',
		'priority'    		=> 25,
	));

	//---------------------------------------------------------------//
	/*Get list sidebar*/
	global $wp_registered_sidebars;
	$arr_sidebar = array();
	$i = 0;
	foreach ( $wp_registered_sidebars as $sidebar ){
		if($i==0){
		$default = $sidebar['id'];
		$i++;
	}
		$arr_sidebar[$sidebar['id']] = $sidebar['name'];
	}
	//Genneral Product Config
$wp_customize->add_setting('tvlgiao_wpdance_genneral_display_buttons', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_display_buttons_control', array(
	'label'   			=> esc_html__( 'Display Buttons', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide Add To Cart, Compare, Wishlist button on your site', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_display_buttons',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",
		'0'		=> "Hide",	
	)
));	

$wp_customize->add_setting('tvlgiao_wpdance_genneral_button_group_position', array(
	'default'        	=> 'after-content',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_button_group_position_control', array(
	'label'   			=> esc_html__( 'Button Position', 'laparis' ),
	'description' 		=> esc_html__( 'Position of the buttons: add to cart, compare, wishlist on shop loop', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_button_group_position',
	'type'    			=> 'select',
	'choices' 			=> array(
        'after-content'    => "After Content Detail",
		'before-content'   => "Before Content Detail",
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_wishlist_default', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_disable_wishlist_default_control', array(
	'label'   			=> esc_html__( 'Wishlist Button Default', 'laparis' ),
	'description' 		=> esc_html__( 'In some cases, the layout will have surplus wishlist buttons on single product page. Disable them to avoid errors.', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_disable_wishlist_default',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disabled"
	)
));
$wp_customize->add_setting('tvlgiao_wpdance_genneral_compare_default', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_disable_compare_default_control', array(
	'label'   			=> esc_html__( 'Compare Button Default', 'laparis' ),
	'description' 		=> esc_html__( 'In some cases, the layout will have surplus compare buttons on single product page. Disable them to avoid errors.', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_disable_compare_default',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disabled"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_show_title', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_show_title_control', array(
	'label'   			=> esc_html__( 'Show Title Product', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide title product', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_show_title',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_number_title_word',array(
	'default'           => '5',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_genneral_number_title_word_control',array(
	'label'         	=> esc_html__( 'Number Title Word', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_genneral_number_title_word',
	'section'       	=> 'tvlgiao_wpdance_genneral_product',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( 'Set -1 to display the full title.', 'laparis' )
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_show_description', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_show_description_control', array(
	'label'   			=> esc_html__( 'Show Description Product', 'laparis' ),
	'description' 		=> esc_html__( 'Hide Product Description may not work with some cases: list view mode in the shop page, shortcode single product detail...', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_show_description',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_number_description_word',array(
	'default'           => '40',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_genneral_number_description_word_control',array(
	'label'         	=> esc_html__( 'Number Description Word', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_genneral_number_description_word',
	'section'       	=> 'tvlgiao_wpdance_genneral_product',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( 'Set -1 to display the full description.', 'laparis' )
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_show_rating', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_show_rating_control', array(
	'label'   			=> esc_html__( 'Show Rating Product', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide rating product', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_show_rating',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));
$wp_customize->add_setting('tvlgiao_wpdance_genneral_show_price', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_show_price_control', array(
	'label'   			=> esc_html__( 'Show Price Product', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide price product', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_show_price',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_show_price_decimal', array(
	'default'        	=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_genneral_show_price_decimal_control', array(
	'label'   			=> esc_html__( 'Price Decimals', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide price decimal', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_show_price_decimal',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_genneral_show_meta', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));

$wp_customize->add_control( 'tvlgiao_wpdance_genneral_show_meta_control', array(
	'label'   			=> esc_html__( 'Show Meta Product', 'laparis' ),
	'description' 		=> esc_html__( 'Show/Hide sale/featured product', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_genneral_product',
	'settings' 			=> 'tvlgiao_wpdance_genneral_show_meta',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Show",	
		'0'		=> "Hide"
	)
));	 


//Setting Product Effect
$wp_customize->add_setting('tvlgiao_wpdance_product_effect_popup_cart', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));

$wp_customize->add_control( 'tvlgiao_wpdance_product_effect_popup_cart_control', array(
	'label'   			=> esc_html__( 'Popup Add To Cart', 'laparis' ),
	'description' 		=> esc_html__( 'Enable / Disable popup display mini cart info after add to cart with ajax.', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_product_effect',
	'settings' 			=> 'tvlgiao_wpdance_product_effect_popup_cart',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disable"
	)
));	

$wp_customize->add_setting('tvlgiao_wpdance_product_effect_hover_thumbnail', array(
	'default'        	=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));

$wp_customize->add_control( 'tvlgiao_wpdance_product_effect_hover_thumbnail_control', array(
	'label'   			=> esc_html__( 'Hover Change Thumbnail', 'laparis' ),
	'description' 		=> esc_html__( 'Enable / Disable thumbnail change effect when hover product image. Effects disabled on mobile devices.', 'laparis'),
	'section'  			=> 'tvlgiao_wpdance_product_effect',
	'settings' 			=> 'tvlgiao_wpdance_product_effect_hover_thumbnail',
	'type'    			=> 'select',
	'choices' 			=> array(
		'1'		=> "Enable",	
		'0'		=> "Disable"
	)
));	

$wp_customize->add_setting('tvlgiao_wpdance_product_effect_hover_button', array(
	'default' 			=> 'wd-hover-style-1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));

$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_product_effect_hover_button',array(
	'label'          	=> esc_html__( 'Select Style Hover Product', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_product_effect',
	'settings'       	=> 'tvlgiao_wpdance_product_effect_hover_button',
	'choices'			=> array(
		'wd-hover-style-1' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/products/wd-hover-style-1.png',
	)
)));


//Content Custom Single Product
$wp_customize->add_setting('tvlgiao_wpdance_single_product_layout', array(
	'default' 			=> '0-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'		
));
$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_single_product_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_single_product',
	'settings'       	=> 'tvlgiao_wpdance_single_product_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_single_product_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_product_sidebar_left_select_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_single_product',
	'settings' 			=> 'tvlgiao_wpdance_single_product_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_single_product_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_product_sidebar_right_select_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_single_product',
	'settings' 			=> 'tvlgiao_wpdance_single_product_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_single_product_additional_image', array(
	'default' 			=> 'bottom',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
)); 
$wp_customize->add_control( 'tvlgiao_wpdance_single_product_additional_image_control', array(
	'label'   			=> esc_html__( 'Select the position', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_single_product',
	'settings' 			=> 'tvlgiao_wpdance_single_additional_image',
	'type'    			=> 'select',
	'choices' 			=> array(
		'bottom'	=> "Bottom Thumbnail Image",
		'left'		=> "Left Thumbnail Image"
	)
));	
$wp_customize->add_setting('tvlgiao_wpdance_single_product_thumbnail_number',array(
	'default'           => '3',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_single_product_thumbnail_number_control',array(
	'label'         	=> esc_html__( 'Thumbnail Number', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_single_product_thumbnail_number',
	'section'       	=> 'tvlgiao_wpdance_single_product',
	'type'          	=> 'text',
	'description'   	=> esc_html__( 'The maximum number of thumbnails appears on the slider thumbnail single product.', 'laparis' )
));

$wp_customize->add_setting('tvlgiao_wpdance_single_recently_product', array(
	'default' 			=> '1',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_recently_product_control', array(
	'label'   			=> esc_html__( 'Show Recent Product', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_single_product',
	'settings' 			=> 'tvlgiao_wpdance_single_recently_product',
	'type'    			=> 'select',
	'choices' 			=> array(
		'0'	=> "Hide",
		'1'	=> "Show"
	)
));	
$wp_customize->add_setting('tvlgiao_wpdance_single_upsell_product', array(
	'default' 			=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_upsell_product_control', array(
	'label'   			=> esc_html__( 'Upsell Product', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_single_product',
	'settings' 			=> 'tvlgiao_wpdance_single_upsell_product',
	'type'    			=> 'select',
	'choices' 			=> array(
		'0'	=> "Hide",
		'1'	=> "Show"
	)
));	
$wp_customize->add_setting('tvlgiao_wpdance_single_product_full_width', array(
	'default' 			=> '0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
$wp_customize->add_control( 'tvlgiao_wpdance_single_product_full_width_control', array(
	'label'   			=> esc_html__( 'Full Content Detail', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_single_product',
	'settings' 			=> 'tvlgiao_wpdance_single_product_full_width',
	'type'    			=> 'select',
	'description'   	=> esc_html__( 'If you want full width detail, you must select layout the full width', 'laparis' ),
	'choices' 			=> array(
		'0'	=> "NOT FULL",
		'1'	=> "FULL"
	)
));		

$wp_customize->add_setting('tvlgiao_wpdance_single_product_shortcode',array(
	'default'           => $wd_default_data['woo']['single']['default']['custom_shortcode'], 
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_single_product_shortcode_control',array(
	'label'         	=> esc_html__( 'Custom Shortcode', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_single_product_shortcode',
	'section'       	=> 'tvlgiao_wpdance_single_product',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( 'Custom content will appear below the Product Summary section. You can create a shortcode from the new page creation interface.', 'laparis' )
));	

//Content Custom Archive Product
$wp_customize->add_setting('tvlgiao_wpdance_archive_product_layout', array(
	'default' 			=> '1-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_archive_product_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_archive_product',
	'settings'       	=> 'tvlgiao_wpdance_archive_product_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_archive_product_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_archive_single_sidebar_left_select_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_archive_product',
	'settings' 			=> 'tvlgiao_wpdance_archive_product_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_archive_product_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_archive_single_sidebar_right_select_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_archive_product',
	'settings' 			=> 'tvlgiao_wpdance_archive_product_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));

$wp_customize->add_setting('tvlgiao_wpdance_archive_number_perpage',array(
	'default'           => '24',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_archive_number_perpage_control',array(
	'label'         	=> esc_html__( 'Number Product Of Page', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_archive_number_perpage',
	'section'       	=> 'tvlgiao_wpdance_archive_product',
	'description'   	=> esc_html__( '', 'laparis' )
));
$wp_customize->add_setting('tvlgiao_wpdance_archive_columns_product', array(
	'default' 			=> '4',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
$wp_customize->add_control( 'tvlgiao_wpdance_control_columns_product', array(
	'label'   			=> esc_html__( 'Columns Product', 'laparis' ),
	'section'  			=> 'tvlgiao_wpdance_archive_product',
	'settings' 			=> 'tvlgiao_wpdance_archive_columns_product',
	'type'    			=> 'select',
	'choices' 			=> array(
		'2'	=> esc_html__( '2 Columns', 'laparis' ),
		'3'	=> esc_html__( '3 Columns', 'laparis' ),
		'4'	=> esc_html__( '4 Columns', 'laparis' ),
	)
));

$wp_customize->add_setting('tvlgiao_wpdance_archive_product_shortcode',array(
	'default'           => $wd_default_data['woo']['archive']['default']['custom_shortcode'], 
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_archive_product_shortcode_control',array(
	'label'         	=> esc_html__( 'Custom Shortcode', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_archive_product_shortcode',
	'section'       	=> 'tvlgiao_wpdance_archive_product',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( 'Custom content will appear below the content of Archive Product page. You can create a shortcode from the new page creation interface.', 'laparis' )
));	


/*Page Woocommerce*/
$wp_customize->add_setting('tvlgiao_wpdance_page_woocommerce_layout', array(
	'default' 			=> '1-0-0',
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
		'capability' 		=> 'edit_theme_options'		
));
	$wp_customize->add_control( new Theme_Slug_Custom_Radio_Image_Control($wp_customize,'tvlgiao_wpdance_page_woocommerce_layout',array(
	'label'          	=> esc_html__( 'Select the layout', 'laparis' ),
	'section'        	=> 'tvlgiao_wpdance_page_woocommerce',
	'settings'       	=> 'tvlgiao_wpdance_page_woocommerce_layout',
	'choices'			=> array(
		'0-0-0' 	=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_fullwidth.png',
		'1-0-0'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_sidebar.png',
		'0-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_right_sidebar.png',
		'1-0-1'		=> TVLGIAO_WPDANCE_THEME_IMAGES . '/layouts/wd_left_right.png'
	)
)));
$wp_customize->add_setting('tvlgiao_wpdance_page_woocommerce_sidebar_left', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_woocommerce_left_sidebar_select_control', array(
	'label'   			=> 'Select left sidebar',
	'section'  			=> 'tvlgiao_wpdance_page_woocommerce',
	'settings' 			=> 'tvlgiao_wpdance_page_woocommerce_sidebar_left',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));
$wp_customize->add_setting('tvlgiao_wpdance_page_woocommerce_sidebar_right', array(
	'default'        	=> $default,
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_text',
	'capability' 		=> 'edit_theme_options'
));
$wp_customize->add_control( 'tvlgiao_wpdance_page_woocommerce_right_sidebar_select_control', array(
	'label'   			=> 'Select right sidebar',
	'section'  			=> 'tvlgiao_wpdance_page_woocommerce',
	'settings' 			=> 'tvlgiao_wpdance_page_woocommerce_sidebar_right',
	'type'    			=> 'select',
	'choices' 			=> $arr_sidebar,
));

$wp_customize->add_setting('tvlgiao_wpdance_page_woocommerce_shortcode',array(
	'default'           => $wd_default_data['woo']['woo_template']['default']['custom_shortcode'], 
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_page_woocommerce_shortcode_control',array(
	'label'         	=> esc_html__( 'Custom Shortcode', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_page_woocommerce_shortcode',
	'section'       	=> 'tvlgiao_wpdance_page_woocommerce',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( 'Custom content will appear below the content of the page use Woocommerce Template. You can create a shortcode from the new page creation interface.', 'laparis' )
));	

//Page Cart
$wp_customize->add_setting('tvlgiao_wpdance_cart_payment_method',array(
	'default'           => $wd_default_data['woo']['cart_page']['default']['payment_method'],
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_cart_payment_method_control',array(
	'label'         	=> esc_html__( 'Payment Method', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_cart_payment_method',
	'section'       	=> 'tvlgiao_wpdance_cart_product',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( '', 'laparis' )
));
$wp_customize->add_setting('tvlgiao_wpdance_cart_shortcode',array(
	'default'           => $wd_default_data['woo']['cart_page']['default']['custom_shortcode'],
	'sanitize_callback' => 'tvlgiao_wpdance_sanitize_html'
));

$wp_customize->add_control('tvlgiao_wpdance_cart_shortcode_control',array(
	'label'         	=> esc_html__( 'Shortcode Cart', 'laparis' ),
	'settings'      	=> 'tvlgiao_wpdance_cart_shortcode',
	'section'       	=> 'tvlgiao_wpdance_cart_product',
	'type'          	=> 'textarea',
	'description'   	=> esc_html__( '', 'laparis' )
));	
?>