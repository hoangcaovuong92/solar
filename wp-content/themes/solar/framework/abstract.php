<?php
if (!class_exists('Tvlgiao_Wpdance_GeneralTheme')) {
	class Tvlgiao_Wpdance_GeneralTheme{
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

		//Variable
		protected $theme_name		= 'laparis';
		protected $theme_slug		= 'laparis';

		protected $arr_functions 	= array();
		protected $arr_customize 	= array();
		protected $include_data 	= array(
						'theme_manager_mode' 	=> 'theme_option',
						'theme_guide' 			=> 1,
					);

		//Constructor
		public function __construct(){
			$this->tvlgiao_wpdance_package_get_packages_setting();
			$this->constant();
			$this->init_arr_functions();
			$this->init_arr_customize();

			$this->after_setup_theme();
			$this->init_functions();

			//Theme guide
			if ($this->include_data['theme_guide']) {
				$this->init_theme_guide();
			}

			$this->init_metabox();
			//Include Customize or Theme Option
			if ($this->include_data['theme_manager_mode'] == 'theme_option') {
				$this->init_theme_options();
			} else {
				$this->init_customize();
			}
		}

		// Function Setup Theme
		public function after_setup_theme(){
			//After setup theme
			add_action( 'after_setup_theme', array($this,'setup_theme_func'));
		}

		// Constant
		protected function constant(){			
			// Default
			define('TVLGIAO_WPDANCE_DS'						, DIRECTORY_SEPARATOR);	
			define('TVLGIAO_WPDANCE_THEME_NAME'				, $this->theme_name );
			define('TVLGIAO_WPDANCE_THEME_SLUG'				, $this->theme_slug.'_');
			define('TVLGIAO_WPDANCE_THEME_DIR'				, get_template_directory());
			define('TVLGIAO_WPDANCE_THEME_URI'				, get_template_directory_uri());
			define('TVLGIAO_WPDANCE_THEME_ASSET_URI'		, TVLGIAO_WPDANCE_THEME_URI 			. '/assets');
			// Style-Script-Image
			define('TVLGIAO_WPDANCE_THEME_IMAGES'			, TVLGIAO_WPDANCE_THEME_ASSET_URI 		. '/images');
			define('TVLGIAO_WPDANCE_THEME_CSS'				, TVLGIAO_WPDANCE_THEME_ASSET_URI 		. '/css');
			define('TVLGIAO_WPDANCE_THEME_JS'				, TVLGIAO_WPDANCE_THEME_ASSET_URI 		. '/js');
			define('TVLGIAO_WPDANCE_THEME_FONT'				, TVLGIAO_WPDANCE_THEME_ASSET_URI 		. '/fonts');
			define('TVLGIAO_WPDANCE_THEME_EXTEND_LIBS'		, TVLGIAO_WPDANCE_THEME_ASSET_URI 		. '/libs');
			//Framework Theme
			define('TVLGIAO_WPDANCE_THEME_FRAMEWORK'		, TVLGIAO_WPDANCE_THEME_DIR 			. '/framework');
			define('TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI'	, TVLGIAO_WPDANCE_THEME_URI 			. '/framework');
			//Folder in Framework
			define('TVLGIAO_WPDANCE_THEME_FUNCTIONS'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/functions');	
			define('TVLGIAO_WPDANCE_THEME_FUNCTIONS_URI'	, TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI 	. '/functions');
				
			define('TVLGIAO_WPDANCE_THEME_PLUGIN'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/plugins');
			define('TVLGIAO_WPDANCE_THEME_SHORTCODES'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/shortcodes');
			define('TVLGIAO_WPDANCE_THEME_METABOX'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/metabox');
			define('TVLGIAO_WPDANCE_THEME_METABOX_URI'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI 	. '/metabox');
			//Folder WPDANCE
			define('TVLGIAO_WPDANCE_THEME_WPDANCE'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/wpdance');
			define('TVLGIAO_WPDANCE_THEME_WPDANCE_URI'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI 	. '/wpdance');
			define('TVLGIAO_WPDANCE_THEME_SUPPORT'			, TVLGIAO_WPDANCE_THEME_WPDANCE 		. '/supports');
			define('TVLGIAO_WPDANCE_THEME_SUPPORT_URI'		, TVLGIAO_WPDANCE_THEME_WPDANCE_URI 	. '/supports');
			define('TVLGIAO_WPDANCE_THEME_CUSTOMIZE'		, TVLGIAO_WPDANCE_THEME_SUPPORT 		. '/theme_customize');
			define('TVLGIAO_WPDANCE_THEME_CUSTOMIZE_URI'	, TVLGIAO_WPDANCE_THEME_SUPPORT_URI 	. '/theme_customize');
			define('TVLGIAO_WPDANCE_THEME_GUIDE'			, TVLGIAO_WPDANCE_THEME_SUPPORT 		. '/theme_guide');
			define('TVLGIAO_WPDANCE_THEME_GUIDE_URI'		, TVLGIAO_WPDANCE_THEME_SUPPORT_URI 	. '/theme_guide');
			define('TVLGIAO_WPDANCE_THEME_OPTIONS'			, TVLGIAO_WPDANCE_THEME_SUPPORT 		. '/theme_option');

			//Customize (customize) or Theme Option (theme_option)
			if ($this->include_data['theme_manager_mode'] != '') {
				define('TVLGIAO_WPDANCE_USE_CONTROL'		,  $this->include_data['theme_manager_mode']);
			}
		}

		protected function tvlgiao_wpdance_package_get_packages_setting(){
			if (get_option('wd_packages')) {
				$parkages 	= get_option('wd_packages');
				if (!empty($parkages['verify_submit'])) {
					$theme_manager_mode 	= (!empty($parkages['wd_theme_manager_mode'])) ? $parkages['wd_theme_manager_mode'] : 'theme_option';
					$theme_guide 			= (!empty($parkages['wd_theme_guide'])) ? $parkages['wd_theme_guide'] : '';
					$this->include_data 	= array(
						'theme_manager_mode' 	=> $theme_manager_mode,
						'theme_guide' 			=> $theme_guide,
					);
				}
			}
			if (!class_exists('ReduxFrameworkPlugin')) {
				$this->include_data['theme_manager_mode'] 	= 'customize';
			}
		}

		//Setup Theme
		public function setup_theme_func(){
		    global $content_width;
		    if ( !isset($content_width) ) {
		        $content_width = 1170;
		    }
			//Make theme available for translation
			//Translations can be filed in the /languages/ directory
   			load_theme_textdomain('laparis', get_template_directory() . '/languages');
   			//Import Register Menu
   			$this->register_location_menu();
   			//Import Theme Support
   			$this->theme_support();
   			//Import Script / Style
   			add_action('wp_enqueue_scripts',array($this,'enqueue_scripts'));
		}

		//Register Menu
		public function register_location_menu(){
			register_nav_menus(array(
				'primary' 			=> esc_html__('Primary Menu', 'laparis'),
		        'primary_right' 	=> esc_html__('Secondary Menu', 'laparis'),
		        'primary_mobile' 	=> esc_html__('Mobile Menu', 'laparis'),
		    ));
		}

		//Theme Support
		public function theme_support(){
			// Enable support for Post Formats.
    		add_theme_support('post-formats', array('gallery', 'video', 'audio', 'quote'));
			add_theme_support('title-tag');
			add_theme_support('automatic-feed-links');
			add_theme_support('woocommerce');
			add_theme_support('post-thumbnails');
			
			//Add Image Size
			set_post_thumbnail_size( 640, 440, true );
			add_image_size('wd_image_size_thumbnail'		, 150, 90,	true);
			add_image_size('wd_image_size_medium'			, 420, 250,	true);
			add_image_size('wd_image_size_large'			, 780, 465,	true);
			add_image_size('wd_image_size_cart_dropdown' 	, 150, 150, true);
			add_image_size('wd_image_size_square_small' 	, 300, 300, true);
			add_image_size('wd_image_size_square_medium' 	, 500, 500, true);
			add_image_size('wd_image_size_square_large' 	, 700, 700, true);

			/* Update woocommerce image size */
			//Catalog Image
			update_option( 'shop_catalog_image_size', array('width'=>'450', 'height' => '577', 'crop' => 1 ));
			//Single Image
			update_option( 'shop_single_image_size', array('width'=>'560', 'height' => '716', 'crop' => 1 ));
			//Thumbnail Image
			update_option( 'shop_thumbnail_image_size', array('width'=>'94', 'height' => '94', 'crop' => 1 ));
		}

		//Include Function
		protected function init_arr_functions(){
			$this->arr_functions = array(
				'class/class-tgm-plugin-activation',
				'class/post_like/post-like',
				'wd_main',
				'wd_html_block',
				'wd_set_default',
				'wd_set_font_list',
				'wd_get_customize_data',
				'wd_accessibility',
				'wd_ajax_function',
				'wd_breadcrumbs',
				'wd_comment_form',
				'wd_counter_views',
				'wd_enqueue_font',
				'wd_enqueue_scripts',
				'wd_excerpt',
				'wd_push_menu',
				'wd_pagination',
				'wd_search_form',
				'wd_sidebar',
				'wd_register_tgmpa_plugin',
				'wd_template_tag',
				'wd_transient',
				'blog/wd_blog_content',
				'blog/wd_blog_function',
			);
			if (class_exists('WooCommerce')) {
				$woo_arr = array(
					'woocommerce/wd_woo_account',
					'woocommerce/wd_woo_cart',
					'woocommerce/wd_woo_function',
					'woocommerce/wd_woo_hook',
				);
				$this->arr_functions = array_merge($this->arr_functions, $woo_arr);
			} 
		}
		
		//Include Customize
		protected function init_arr_customize(){
			$this->arr_customize = array(
				'libs/add-control-custom-radio-image',
				'libs/wd-add-control-custom-font',
				'libs/wd_customize_sanitize_callback',
				'wd_customize',
			);
		}
		// Load File
		protected function init_functions(){
			foreach($this->arr_functions as $function){
				if(file_exists(TVLGIAO_WPDANCE_THEME_FUNCTIONS."/{$function}.php")){
					require_once TVLGIAO_WPDANCE_THEME_FUNCTIONS."/{$function}.php";
				}	
			}
		}
		protected function init_customize(){
			foreach($this->arr_customize as $custom){
				if(file_exists(TVLGIAO_WPDANCE_THEME_CUSTOMIZE. "/{$custom}.php")){
					require_once TVLGIAO_WPDANCE_THEME_CUSTOMIZE. "/{$custom}.php";
				}
			}
		}
		protected function init_theme_options(){
			if ( ! class_exists( 'ReduxFramework' ) ) return;
			if(file_exists(TVLGIAO_WPDANCE_THEME_OPTIONS. "/wd_theme_options.php")){
				require_once TVLGIAO_WPDANCE_THEME_OPTIONS. "/wd_theme_options.php";
			}
		}
		protected function init_theme_guide(){
			if(file_exists(TVLGIAO_WPDANCE_THEME_GUIDE. "/install_theme_guide.php")){
				require_once TVLGIAO_WPDANCE_THEME_GUIDE. "/install_theme_guide.php";
			}
		}
		protected function init_metabox(){
			if(file_exists(TVLGIAO_WPDANCE_THEME_METABOX.'/wd_metaboxes.php')){
				require_once TVLGIAO_WPDANCE_THEME_METABOX.'/wd_metaboxes.php';
			}
		}
		
		//Enqueue Style And Script
		public function enqueue_scripts(){
			global $wp_query;
			$ajax_object_vars = array(
				'ajax_url' 			=> admin_url( 'admin-ajax.php' ),
				'query_vars'		=> json_encode( $wp_query->query )
			);
			
			/*----------------- Style ---------------------*/
			// Wordpress Libs
			wp_enqueue_style('jquery-ui-autocomplete');
			wp_enqueue_style('thickbox');

			// LIB
			wp_enqueue_style('bootstrap-core', 			TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/bootstrap/css/bootstrap.css');
			wp_enqueue_style('font-awesome', 			TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/font-awesome/css/font-awesome.min.css');
			wp_enqueue_style('elusive-icons', 			TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/elusive-icons/css/elusive-icons.min.css');
			wp_enqueue_style('linearicons', 			TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/linearicons/icon-font.css');
			wp_enqueue_style('owl-carousel-core', 		TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/owl-carousel/css/owl.carousel.min.css');
			wp_enqueue_style('cloud-zoom-core', 		TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/cloud-zoom/css/cloud-zoom.css');
			wp_enqueue_style('slick-core', 				TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/slick/slick.css');
			wp_enqueue_style('slick-theme-css', 		TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/slick/slick-theme.css');
			if (is_page_template( 'page-templates/template-fullpage.php' )) {
				wp_enqueue_style('fullpage-js-core', 	TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/fullpage-js/css/jquery.fullpage.min.css');
			}

			// CSS OF THEME
			wp_enqueue_style('wd-style-css', 			TVLGIAO_WPDANCE_THEME_URI.'/style.css');
			wp_enqueue_style('wd-custom-style-css', 	TVLGIAO_WPDANCE_THEME_CSS.'/wd_custom_style.css');
			wp_enqueue_style('wd-custom-style-inline-css', TVLGIAO_WPDANCE_THEME_CSS.'/wd_print_inline_style.css');

			if (class_exists('WooCommerce')) {
				wp_enqueue_style('wd-woo-product-style', TVLGIAO_WPDANCE_THEME_CSS.'/wd_woo.css');
			}


			/*----------------- Script ---------------------*/
			// Wordpress Libs
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-autocomplete');
			wp_enqueue_script('thickbox');

			// LIB
			wp_enqueue_script('bootstrap-core', 		TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/bootstrap/js/bootstrap.min.js', array('jquery'), false, true);
			wp_enqueue_script('isotope-pkgd',			TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/isotope-pkgd/js/isotope.pkgd.min.js', array(), false, true);
			wp_enqueue_script('owl-carousel-core', 		TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/owl-carousel/js/owl.carousel.min.js', array(), false, true);
			wp_enqueue_script('cloud-zoom-core', 		TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/cloud-zoom/js/cloud-zoom.1.0.2.js', array(), false, true);
			wp_enqueue_script('jquery-validate-core', 	TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/jquery-validate/js/jquery.validate.min.js',false,false,true);
			wp_enqueue_script('slick-core', 			TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/slick/slick.min.js',false,false,true);
			wp_enqueue_script('jquery-cookie-core', 	TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/jquery-cookie/js.cookie.min.js',false,false,true);

			if (is_page_template( 'page-templates/template-fullpage.php' )) {
				wp_enqueue_script('scrolloverflow-js', 	TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/fullpage-js/js/scrolloverflow.min.js',false,false,true);
				wp_enqueue_script('fullpage-js-core', 	TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/fullpage-js/js/jquery.fullpage.min.js',false,false,true);
				wp_enqueue_script('fullpage-js-run', 	TVLGIAO_WPDANCE_THEME_JS.'/wd_fullpage.js',false,false,true);
			}
			if (class_exists('WooCommerce')){
				wp_enqueue_script('jquery-countdown-core', 	TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/jquery-countdown/jquery.countdown.min.js', false, false, true);
			}

			// JS OF THEME
		    wp_enqueue_script('wd-validate-form-js'	, 	TVLGIAO_WPDANCE_THEME_JS.'/wd_validate_form.js',array('jquery-validate-core'),false,true);
			wp_enqueue_script('wd-main-js', 			TVLGIAO_WPDANCE_THEME_JS.'/wd_main.js', false, false, true);
			if (tvlgiao_wpdance_is_mobile_or_tablet()){
				wp_enqueue_script('wd-mobile-js', 		TVLGIAO_WPDANCE_THEME_JS.'/wd_mobile.js', false, false, true);
			}
			wp_enqueue_script('wd-accessibility-js', 	TVLGIAO_WPDANCE_THEME_JS.'/wd_accessibility.js', false, false, true);
			wp_enqueue_script('wd-ajax-js', 			TVLGIAO_WPDANCE_THEME_JS.'/wd_ajax.js', false, false, true);
			wp_localize_script('wd-ajax-js', 			'ajax_object', $ajax_object_vars);
			wp_enqueue_script('wd-slider-js', 			TVLGIAO_WPDANCE_THEME_JS.'/wd_slider.js', false, false, true);
			wp_enqueue_script('wd-custom-script-inline-js', TVLGIAO_WPDANCE_THEME_JS.'/wd_print_inline_script.js', false, false, true);

			if (class_exists('WooCommerce')){
				wp_enqueue_script('wd-woo-product-js', 	TVLGIAO_WPDANCE_THEME_JS.'/wd_woo.js', false, false, true);
			}

		    if (is_singular() && comments_open()) { 
		    	wp_enqueue_script('comment-reply'); 
		    }
		}
	}
	Tvlgiao_Wpdance_GeneralTheme::get_instance();
} ?>