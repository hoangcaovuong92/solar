<?php
if ( ! class_exists( 'tvlgiao_wpdance_register_post_type_faq' ) ) {
	class tvlgiao_wpdance_register_post_type_faq {

		public function __construct() {
    		add_action('init', array($this, 'register_faq_post_type'));
			add_action('vc_before_init', array( $this, 'register_faq_taxonomy' ) );
		}

		public function register_faq_post_type(){
			if (!post_type_exists('wpdance_faq')) {
				register_post_type('wpdance_faq', array(
					'exclude_from_search' 	=> true,
					'labels' 				=> array(
						'name' 					=> esc_html__("WD FAQs", 'wd_package'),
						'singular_name' 		=> esc_html__("WD FAQ", 'wd_package'),
		            	'add_new' 				=> esc_html__( 'Add New', 'wd_package' ),
						'add_new_item' 			=> sprintf( __( 'Add New %s', 'wd_package' ), __( 'FAQ', 'wd_package' ) ),
						'edit_item' 			=> sprintf( __( 'Edit %s', 'wd_package' ), __( 'FAQ', 'wd_package' ) ),
						'new_item' 				=> sprintf( __( 'New %s', 'wd_package' ), __( 'FAQ', 'wd_package' ) ),
						'all_items' 			=> sprintf( __( 'All %s', 'wd_package' ), __( 'FAQs', 'wd_package' ) ),
						'view_item' 			=> sprintf( __( 'View %s', 'wd_package' ), __( 'FAQ', 'wd_package' ) ),
						'search_items' 			=> sprintf( __( 'Search %a', 'wd_package' ), __( 'FAQs', 'wd_package' ) ),
						'not_found' 			=> sprintf( __( 'No %s Found', 'wd_package' ), __( 'FAQs', 'wd_package' ) ),
						'not_found_in_trash' 	=> sprintf( __( 'No %s Found In Trash', 'wd_package' ), __( 'FAQs', 'wd_package' ) ),
					),
					'taxonomies' 			=> array('wpdance_faq'),
					'public' 				=> true,
					'has_archive' 			=> false,
					'menu_icon'				=> 'dashicons-flag',
					'menu_position'			=> 56,
				));		
			}
		}
		public function register_faq_taxonomy(){
			register_taxonomy( 'wpdance_faq_categories', 'wpdance_faq', array(
				'hierarchical'     		=> true,
				'labels'            	=> array(
					'name' 				=> esc_html__('Categories FAQ', 'wd_package'),
					'singular_name' 	=> esc_html__('Category FAQ', 'wd_package'),
	            	'new_item'          => esc_html__('Add New', 'wd_package' ),
	            	'edit_item'         => esc_html__('Edit Post', 'wd_package' ),
	            	'view_item'   		=> esc_html__('View Post', 'wd_package' ),
	            	'add_new_item'      => esc_html__('Add New Category FAQ', 'wd_package' ),
	            	'menu_name'         => esc_html__( 'Categories FAQ' , 'wd_package' ),
				),
				'show_ui'           	=> true,
				'show_admin_column' 	=> true,
				'query_var'         	=> true,
				'rewrite'           	=> array( 'slug' => 'wpdance_faq_categories' ),				
				'public'				=> true,
			));	
		}
	}
	$tvlgiao_wpdance_register_post_type_faq = new tvlgiao_wpdance_register_post_type_faq();
}