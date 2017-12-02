<?php
if (!class_exists('WD_Shortcode')) {
	class WD_Shortcode{
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

		protected $parkage_name 		= '/wd_shortcode';
		protected $arrShortcodes 		= array();
		protected $arrWidgets 			= array();
		protected $include_data 	= array(
						'faq_post_type' 		=> 1,
						'feature_post_type' 	=> 1,
						'widget'				=> 1,	
					);

		public function __construct(){
			$this->constant();

			// Get setting from admin page
			$this->tvlgiao_wpdance_package_get_packages_setting();

			// Register Woocommerce Brands taxonomy
			$this->tvlgiao_wpdance_register_woo_brand_taxonomy();

			// Register Faq post type & taxonomy
			if ($this->include_data['faq_post_type']) {
				$this->tvlgiao_wpdance_register_faq_post_type();
			}
			// Register Feature post type & taxonomy
			if ($this->include_data['feature_post_type']) {
				$this->tvlgiao_wpdance_register_feature_post_type();
			}

			// Register Script
			add_action('wp_enqueue_scripts', array( $this, 'init_script' ));
			add_action('wp_enqueue_scripts', array( $this, 'set_ajax_url' ));
			add_action('admin_enqueue_scripts', array( $this, 'admin_init_script' ));

			$this->initLibrary();
			$this->initArrShortcodes();
			$this->initArrWidgets(); 

			//Widgets
			if ($this->include_data['widget']) {
				$this->initWidgets(); 
			}

			//Visual Composer
			$this->initShortcodes();
			if($this->tvlgiao_wpdance_checkPluginVC()){
				if ( ! defined( 'ABSPATH' ) ) { exit; }
				add_action("vc_after_init",array($this,'initVisualComposer'));
			}
		}

		protected function constant(){
			define('SC_BASE'		,   plugin_dir_path( __FILE__ ) );
			define('SC_BASE_URI'	,   plugins_url( '', __FILE__ ) );
			define('SC_SHORTCODE'	, 	SC_BASE . '/shortcode' 		);
			define('SC_VISUAL'		, 	SC_BASE . '/visualcomposer' );
			define('SC_WIDGET'		, 	SC_BASE . '/widgets' 		);
			define('SC_POST_TYPE'	, 	SC_BASE . '/post_type' 		);
			define('SC_POST_TYPE_URI', 	SC_BASE_URI . '/post_type' 	);
			define('SC_POST_TYPE_JS', 	SC_POST_TYPE_URI . '/js' 	);
			define('SC_ASSET'		, 	SC_BASE_URI  . '/assets'	);
			define('SC_JS'			, 	SC_ASSET . '/js'			);
			define('SC_CSS'			, 	SC_ASSET . '/css'			);
			define('SC_IMAGE'		, 	SC_ASSET . '/images'		);
			define('SC_LIBS'		, 	SC_ASSET . '/libs'			);
			define('SC_PARAMS'		, 	SC_BASE  . '/vc_params'		);
			define('SC_PARAMS_URI'	, 	SC_BASE_URI  . '/vc_params'	);
			define('SC_PARAMS_JS'	, 	SC_PARAMS_URI . '/js'		);
		}

		protected function tvlgiao_wpdance_package_get_packages_setting(){
			if (get_option('wd_packages')) {
				$parkages 	= get_option('wd_packages');
				if (!empty($parkages['verify_submit'])) {
					$faq 		= (!empty($parkages['wd_package_faq_post_type'])) ? $parkages['wd_package_faq_post_type'] : '';
					$feature 	= (!empty($parkages['wd_package_feature_post_type'])) ? $parkages['wd_package_feature_post_type'] : '';
					$widget 	= (!empty($parkages['wd_package_widget'])) ? $parkages['wd_package_widget'] : '';
					$this->include_data 	= array(
						'faq_post_type' 		=> $faq,
						'feature_post_type' 	=> $feature,
						'widget' 				=> $widget,
					);
				}
			}
		}

		/******************************** WOOCOMMERCE BRANDS ***********************************/
		public function tvlgiao_wpdance_register_woo_brand_taxonomy(){
			require_once SC_POST_TYPE.'/taxonomy_brand.php';	
		}

		/******************************** FAQS POST TYPE ***********************************/
		public function tvlgiao_wpdance_register_faq_post_type(){
			require_once SC_POST_TYPE.'/faq.php';
		}

		/******************************** FEATURE POST TYPE ***********************************/
		public function tvlgiao_wpdance_register_feature_post_type(){
			require_once SC_POST_TYPE.'/feature.php';
		}


		/******************************** INIT ***********************************/
		protected function initLibrary(){
			require_once SC_BASE.'/wd_functions.php';
			require_once SC_BASE.'/wd_ajax_loadmore.php';
			require_once SC_PARAMS.'/wd_add_param_vc.php';
		}

		protected function initArrShortcodes(){
			$this->arrShortcodes 		= array(
				'title',
				'site_header',
				'uber_menu',
				'do_shortcode',
				'my_account',
				'social_profiles',
				'social_fanpage_likebox',

				'button',
				'banner_image',
				'banner_image_plus',
				'banner_slider',
				'brand_slider',

				'blog_search',
				'blog_grid_list',
				'blog_special',
				'blog_masonry',
				'blog_recent_slider',

				'dropdowncart',
				'currency_switcher',
				'wishlist',
				'product_search',
				'product_grid_list',
				'product_special_slider',
				'product_simple_slider',
				'product_single_detail',
				'product_category_single',
				'product_categories',
				'product_best_selling',
				'product_categories_tabs',
				'product_categories_group',
				'product_categories_accordion',
				'product_categories_list',
		 		
				'feature',
		 		'feature_category',

				'gtranslate',
				'fullpage',
				'instagram',
				'instagram_masonry',
				'instagram_snapppt',
				'icon_count',
				'icon_payment',
				'count_down',
				'feedburner_subscription',
				'faq',
				'pages_list',
				'process_bar',
				'quote',
				'information',
		 		'recent_comment',
		 		'pricing_table',
	 		);
		}

		protected function initArrWidgets(){
			$this->arrWidgets 		= array(
				'wd_banner_image',
				/*'wd_banner_ads',
				'wd_countdown',
				'wd_title_heading',
				'wd_faq',
				'wd_testimonials',
				'wd_testimonials_plus',
				'wd_header_dropdown_cart',
				'wd_header_user_login',
				'wd_header_site_logo',
				'wd_header_icon_group',
				'wd_header_wishlist_button',
				'wd_product_slider',
				'wd_product_grid_list',
				'wd_product_special',
				'wd_product_countdown',*/
				'wd_blog_special',
				/*'wd_blog_grid_list',
				'wd_special_post',
				'wd_woo_currency_switcher',
				'wd_woo_brand_slider',*/
				'wd_instagram',
				/*'wd_team_members',
				'wd_pricing_table',
				'wd_feature',
				'wd_feature_category',
				'wd_feedburner_subscription',
				'wd_category_list_child',*/
				'wd_search_product',
				'wd_search_blog',
				'wd_icon_social',
				'wd_icon_payment',
				'wd_fanpage_likebox',
				'wd_product_categories_accordion',
			);
		}


		protected function initShortcodes(){
			foreach($this->arrShortcodes as $shortcode){
				if( file_exists(SC_SHORTCODE."/wd_{$shortcode}.php") ){
					require_once SC_SHORTCODE."/wd_{$shortcode}.php";
				}	
			}
		}

		public function initVisualComposer(){ 
			foreach ($this->arrShortcodes as $visual) {
				if( file_exists(SC_VISUAL."/wd_vc_{$visual}.php") ){
					require_once SC_VISUAL."/wd_vc_{$visual}.php";
				}
			}
	    }

		protected function initWidgets(){
			foreach($this->arrWidgets as $widget){
				if( file_exists(SC_WIDGET."/{$widget}.php") ){
					require_once SC_WIDGET."/{$widget}.php";
				}	
			}
		}
		
		public function init_script(){
			//LIBS
			wp_enqueue_style('jquery-ui-core');
			wp_enqueue_style('font-awesome', 					SC_LIBS.'/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style('linearicons', 					SC_LIBS.'/linearicons/icon-font.css');
			wp_enqueue_style('timecircles-core', 				SC_LIBS.'/timecircles/css/timecircles.css');
			wp_enqueue_style('owl-carousel-core', 				SC_LIBS.'/owl-carousel/css/owl.carousel.min.css');
			wp_enqueue_style('slick-core',						SC_LIBS.'/slick/slick.css');
			wp_enqueue_style('slick-theme-css',					SC_LIBS.'/slick/slick-theme.css');
			wp_enqueue_style('select2-core',					SC_LIBS.'/select2/css/select2.min.css'); 

			wp_enqueue_style('jquery-fancybox', 				SC_LIBS.'/fancybox/jquery.fancybox.css', array(), false, 'all' );
			wp_enqueue_style('jquery-fancybox-buttons', 		SC_LIBS.'/fancybox/helpers/jquery.fancybox-buttons.css', array(), false, 'all' );
			wp_enqueue_style('jquery-fancybox-thumbs', 			SC_LIBS.'/fancybox/helpers/jquery.fancybox-thumbs.css', array(), false, 'all' );

			//PLUGIN CSS
			wp_enqueue_style('wd-shortcode-custom-css',			SC_CSS.'/wd_custom_style.css');

			//LIBS
			wp_enqueue_script('jquery');
			//wp_enqueue_script('hoverIntent');
			wp_enqueue_script('bootstrap-core', 				SC_LIBS.'/bootstrap/js/bootstrap.min.js',false,false,true);
			wp_enqueue_script('jquery-countdown-core', 			SC_LIBS.'/jquery-countdown/js/jquery.countdown.min.js',array('jquery'),false,true);
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('timecircles-core', 				SC_LIBS.'/timecircles/js/timecircles.js',false,false,true);
			wp_enqueue_script('owl-carousel-core', 				SC_LIBS.'/owl-carousel/js/owl.carousel.min.js',false,false,true);
			wp_enqueue_script('slick-core', 					SC_LIBS.'/slick/slick.min.js',false,false,true);
			wp_enqueue_script('select2-core', 					SC_LIBS.'/select2/js/select2.min.js',false,false,true);
			wp_enqueue_script('jquery-cookie-core', 			SC_LIBS.'/jquery-dcjqaccordion/js/js.cookie.min.js',false,false,true);
			wp_enqueue_script('jquery-dcjqaccordion-core', 		SC_LIBS.'/jquery-dcjqaccordion/js/jquery.dcjqaccordion.2.7.min.js',false,false,true);

			wp_enqueue_script( 'jquery-mousewheel',				SC_LIBS.'/fancybox/jquery.mousewheel.pack.js', array( 'jquery' ), false, true);
			wp_enqueue_script( 'jquery-fancybox-pack', 			SC_LIBS.'/fancybox/jquery.fancybox.pack.js', false, false, true);
			wp_enqueue_script( 'jquery-fancybox-buttons', 		SC_LIBS.'/fancybox/helpers/jquery.fancybox-buttons.js', false, false, true);
			wp_enqueue_script( 'jquery-fancybox-thumbs', 		SC_LIBS.'/fancybox/helpers/jquery.fancybox-thumbs.js', false, false, true);
			wp_enqueue_script( 'jquery-fancybox-media', 		SC_LIBS.'/fancybox/helpers/jquery.fancybox-media.js', false, false, true);

			//PLUGIN JS
			wp_enqueue_script('wd-shortcode-custom-script',		SC_JS.'/wd_custom_script.js',false,false,true);
			wp_enqueue_script('wd-ajax-pagination-script', 		SC_JS.'/wd_vc_loadmore_js.js',false,false,true);
		}
		public function admin_init_script($hook){
			if ($hook != 'toplevel_page_WPDanceLaParis') {
				wp_enqueue_style('jquery-ui-core');
				wp_enqueue_script('jquery-ui-core');
			}
			wp_enqueue_script( 'jquery-ui-datepicker');
		}		

		/******************************** AJAX ***********************************/

		public function set_ajax_url() {
		 	global $wp_query;
		 	wp_localize_script( 'wd-ajax-pagination-script', 'ajax_object', array(
				'ajax_url' 			=> admin_url( 'admin-ajax.php' ),
				'query_vars'		=> json_encode( $wp_query->query )
			));
		 	wp_localize_script( 'wd-ajax-pagination-script', 'blog_ajax_object', array(
				'ajax_url_blog' 	=> admin_url( 'admin-ajax.php' ),
				'query_vars'		=> json_encode( $wp_query->query )
			));
		 	wp_localize_script( 'wd-ajax-pagination-script', 'masonry_ajax_object', array(
				'ajax_url_masonry' 	=> admin_url( 'admin-ajax.php' ),
				'query_vars'		=> json_encode( $wp_query->query )
			));
		}
		
		/******************************** Check Visual Composer active ***********************************/
		protected function tvlgiao_wpdance_checkPluginVC(){
			$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
			if(in_array('js_composer/js_composer.php',$_active_vc)){
				return true;
			}else{
				return false;
			}
		}
	}	
	WD_Shortcode::get_instance();
}
?>