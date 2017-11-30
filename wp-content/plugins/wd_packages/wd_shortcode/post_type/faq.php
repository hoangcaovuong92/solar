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
						'name' 					=> esc_html__("WD FAQs", 'wpdancelaparis'),
						'singular_name' 		=> esc_html__("WD FAQ", 'wpdancelaparis'),
		            	'add_new' 				=> esc_html__( 'Add New', 'wpdancelaparis' ),
						'add_new_item' 			=> sprintf( __( 'Add New %s', 'wpdancelaparis' ), __( 'FAQ', 'wpdancelaparis' ) ),
						'edit_item' 			=> sprintf( __( 'Edit %s', 'wpdancelaparis' ), __( 'FAQ', 'wpdancelaparis' ) ),
						'new_item' 				=> sprintf( __( 'New %s', 'wpdancelaparis' ), __( 'FAQ', 'wpdancelaparis' ) ),
						'all_items' 			=> sprintf( __( 'All %s', 'wpdancelaparis' ), __( 'FAQs', 'wpdancelaparis' ) ),
						'view_item' 			=> sprintf( __( 'View %s', 'wpdancelaparis' ), __( 'FAQ', 'wpdancelaparis' ) ),
						'search_items' 			=> sprintf( __( 'Search %a', 'wpdancelaparis' ), __( 'FAQs', 'wpdancelaparis' ) ),
						'not_found' 			=> sprintf( __( 'No %s Found', 'wpdancelaparis' ), __( 'FAQs', 'wpdancelaparis' ) ),
						'not_found_in_trash' 	=> sprintf( __( 'No %s Found In Trash', 'wpdancelaparis' ), __( 'FAQs', 'wpdancelaparis' ) ),
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
					'name' 				=> esc_html__('Categories FAQ', 'wpdancelaparis'),
					'singular_name' 	=> esc_html__('Category FAQ', 'wpdancelaparis'),
	            	'new_item'          => esc_html__('Add New', 'wpdancelaparis' ),
	            	'edit_item'         => esc_html__('Edit Post', 'wpdancelaparis' ),
	            	'view_item'   		=> esc_html__('View Post', 'wpdancelaparis' ),
	            	'add_new_item'      => esc_html__('Add New Category FAQ', 'wpdancelaparis' ),
	            	'menu_name'         => esc_html__( 'Categories FAQ' , 'wpdancelaparis' ),
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