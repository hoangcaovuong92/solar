<?php 
/*
  Plugin Name: WD Packages
  Plugin URI: http://www.wpdance.com
  Description: Register Post type, taxonomy, style and script library used for WD Team packages ...
  Version: 1.0.1
  Author: WD Team
  Author URI: http://www.wpdance.com
 */
if (!class_exists('WD_Packages')) {
	class WD_Packages {
		/**
		 * Refers to a single instance of this class.
		 */
		private static $instance = null;

		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		protected $arr_packages = array(
				'wd_shortcode' 				=> '1',
				'wd_portfolio' 				=> '1',
				'wd_team' 					=> '1',
				'wd_quickshop' 				=> '1',
				'wd_shop_by_color' 			=> '1',
			);

		protected $arr_js = array(
				'smooth_scroll' 	=> '0',
			);

		public function __construct(){
			$this->constant();
			$this->tvlgiao_wpdance_package_get_packages_setting();
			add_action('init', array($this, 'init_setup'));
			$this->package_include();
			add_action('wp_enqueue_scripts', array($this, 'package_js'));

			add_filter( 'single_template', array( $this, 'single_header_footer_template' ) );

			// Session
			add_action('init', array($this, 'session_start'), 1);
			add_action('wp_logout', array($this, 'session_end'));
			add_action('wp_login', array($this, 'session_end'));
		}

		protected function constant(){
			define('WD_PACKAGE'			,   plugin_dir_path( __FILE__ ) );
			define('WD_PACKAGE_URI'		,   plugins_url( '', __FILE__ ) );
			define('WD_PACKAGE_LIBS'	,   WD_PACKAGE_URI.'/libs' );
		}

		protected function tvlgiao_wpdance_package_get_packages_setting(){
			if (get_option('wd_packages')) {
				$parkages = get_option('wd_packages');
				if (!empty($parkages['verify_submit'])) {
					$this->arr_packages = array(
						'wd_shortcode' 				=> (!empty($parkages['wd_package_shortcode'])) ? $parkages['wd_package_shortcode'] : '',
						'wd_portfolio' 				=> (!empty($parkages['wd_package_portfolio'])) ? $parkages['wd_package_portfolio'] : '',
						'wd_team' 					=> (!empty($parkages['wd_package_team'])) ? $parkages['wd_package_team'] : '',
						'wd_quickshop' 				=> (!empty($parkages['wd_package_quickshop'])) ? $parkages['wd_package_quickshop'] : '',
						'wd_shop_by_color' 			=> (!empty($parkages['wd_package_shop_by_color'])) ? $parkages['wd_package_shop_by_color'] : '',
					);
					$this->arr_js 		= array(
						'smooth_scroll' 	=> (!empty($parkages['wd_package_smooth_croll'])) ? $parkages['wd_package_smooth_croll'] : '',
					);
				}
			}
		}

		// Session start
		public function session_start() {
		    if(!session_id()) {
		    	ini_set('session.save_path', WD_PACKAGE.'/session');
		        session_start();
		    }
		}
		
		// Session clear
		public function session_end() {
			   session_destroy();
		}

		public function package_js(){
			//smooth_scroll
			if(!wp_is_mobile() && $this->tvlgiao_wpdance_is_windows() && $this->tvlgiao_wpdance_is_chrome()) { 
				$special_template = is_page_template( 'page-templates/template-home-header-left.php' );
				if($this->arr_js['smooth_scroll'] && !$special_template) {
					wp_enqueue_script( 'tvlgiao-wpdance-smooth-scroll', WD_PACKAGE_LIBS.'/smooth_scroll/jQuery.scrollSpeed.js',array('jquery'),false,true);
					wp_enqueue_script( 'tvlgiao-wpdance-smooth-scroll-run', WD_PACKAGE_LIBS.'/smooth_scroll/run.js',false,false,true);
				}
			}
		}

		public function init_setup(){ 
			$this->register_html_block_post_type();
			$this->admin_page_include();
		} 

		public function admin_page_include(){
			if(file_exists(WD_PACKAGE."/admin_page/admin_page.php")){
				require_once WD_PACKAGE."/admin_page/admin_page.php";
			}
		}

		public function package_include(){
			foreach ($this->arr_packages as $package => $display) {
				if(file_exists(WD_PACKAGE."/{$package}/{$package}.php") && $display == '1'){
					require_once WD_PACKAGE."/{$package}/{$package}.php";
				}
			}
		}

		/******************************** HTML BLOCK POST TYPE ***********************************/
		public function single_header_footer_template( $single ) {
			global $post; 
			if ( ($post->post_type == 'wpdance_header' || $post->post_type == 'wpdance_footer') && file_exists( WD_PACKAGE . '/templates/single-header_footer_template.php' ) ) {
				return WD_PACKAGE . '/templates/single-header_footer_template.php';
			}

			return $single;
		}

		public function register_html_block_post_type(){
			register_post_type('wpdance_header', array(
				'exclude_from_search' => true,
				'labels' => array(
					'name' 					=> esc_html__("Headers HTML", 'wpdancelaparis'),
					'singular_name' 		=> esc_html__("Header HTML", 'wpdancelaparis'),
		        	'add_new' 				=> esc_html__( 'Add New', 'wpdancelaparis' ),
					'add_new_item' 			=> sprintf( __( 'Add New %s', 'wpdancelaparis' ), __( 'Header HTML', 'wpdancelaparis' ) ),
					'edit_item' 			=> sprintf( __( 'Edit %s', 'wpdancelaparis' ), __( 'Header HTML', 'wpdancelaparis' ) ),
					'new_item' 				=> sprintf( __( 'New %s', 'wpdancelaparis' ), __( 'Header HTML', 'wpdancelaparis' ) ),
					'all_items' 			=> sprintf( __( 'All %s', 'wpdancelaparis' ), __( 'Headers HTML', 'wpdancelaparis' ) ),
					'view_item' 			=> sprintf( __( 'View %s', 'wpdancelaparis' ), __( 'Header HTML', 'wpdancelaparis' ) ),
					'search_items' 			=> sprintf( __( 'Search %a', 'wpdancelaparis' ), __( 'Headers HTML', 'wpdancelaparis' ) ),
					'not_found' 			=>  sprintf( __( 'No %s Found', 'wpdancelaparis' ), __( 'Headers HTML', 'wpdancelaparis' ) ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s Found In Trash', 'wpdancelaparis' ), __( 'Headers HTML', 'wpdancelaparis' ) ),
				),
				'public' 				=> true,
				'has_archive' 			=> false,
				'menu_icon'				=> 'dashicons-editor-table',
				'menu_position'			=> 21,
			));
			register_post_type('wpdance_footer', array(
				'exclude_from_search' => true,
				'labels' => array(
					'name' 					=> esc_html__("Footers HTML", 'wpdancelaparis'),
					'singular_name' 		=> esc_html__("Footer HTML", 'wpdancelaparis'),
		        	'add_new' 				=> esc_html__( 'Add New', 'wpdancelaparis' ),
					'add_new_item' 			=> sprintf( __( 'Add New %s', 'wpdancelaparis' ), __( 'Footer HTML', 'wpdancelaparis' ) ),
					'edit_item' 			=> sprintf( __( 'Edit %s', 'wpdancelaparis' ), __( 'Footer HTML', 'wpdancelaparis' ) ),
					'new_item' 				=> sprintf( __( 'New %s', 'wpdancelaparis' ), __( 'Footer HTML', 'wpdancelaparis' ) ),
					'all_items' 			=> sprintf( __( 'All %s', 'wpdancelaparis' ), __( 'Footers HTML', 'wpdancelaparis' ) ),
					'view_item' 			=> sprintf( __( 'View %s', 'wpdancelaparis' ), __( 'Footer HTML', 'wpdancelaparis' ) ),
					'search_items' 			=> sprintf( __( 'Search %a', 'wpdancelaparis' ), __( 'Footers HTML', 'wpdancelaparis' ) ),
					'not_found' 			=>  sprintf( __( 'No %s Found', 'wpdancelaparis' ), __( 'Footers HTML', 'wpdancelaparis' ) ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s Found In Trash', 'wpdancelaparis' ), __( 'Footers Template', 'wpdancelaparis' ) ),
				),
				'public' 				=> true,
				'has_archive' 			=> false,
				'menu_icon'				=> 'dashicons-editor-table',
				'menu_position'			=> 21,
			));
			add_post_type_support( 'wpdance_header', 'thumbnail' );
			add_post_type_support( 'wpdance_footer', 'thumbnail' );
		}

		public function tvlgiao_wpdance_is_windows(){
			$u = $_SERVER['HTTP_USER_AGENT'];
			$window  = (bool)preg_match('/Windows/i', $u );
			return $window;
		}
		public function tvlgiao_wpdance_is_chrome(){
			$u = $_SERVER['HTTP_USER_AGENT'];
			$chrome  = (bool)preg_match('/Chrome/i', $u );
			return $chrome;
		}
	}
	WD_Packages::get_instance();
}
?>