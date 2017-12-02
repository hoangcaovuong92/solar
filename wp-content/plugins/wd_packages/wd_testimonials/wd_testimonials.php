<?php
if (!class_exists('WD_Testimonials')) {
	class WD_Testimonials {
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

		protected $parkage_name = '/wd_testimonials';

		public function __construct(){
			$this->constant();
			
			/****************************/
			// Register testimonials post type
			add_action('init', array($this, 'register_testimonials_post_type'));
			add_action('vc_before_init', array( $this, 'register_testimonials_taxonomy' ) );
			add_filter('attribute_escape', array($this,'rename_second_menu_name') , 10, 2);
			add_theme_support('post-thumbnails', array('testimonials'));

			//Change Placeholder Title Post
			add_filter( 'enter_title_here', array($this, 'change_title_text' ));
			
			add_action('admin_enqueue_scripts',array($this,'init_admin_script'));
			
			add_action('add_meta_boxes', array( $this,'testimonials_create_metabox' ) );	
			add_action('pre_post_update', array($this,'testimonials_metabox_save_data') , 10, 2);
			add_action('template_redirect', array($this,'wd_testimonials_template_redirect') );
			
			$this->init_handle();

			//Visual Composer
			$this->initShortcodes();
			if($this->checkPluginVC()){
				if ( ! defined( 'ABSPATH' ) ) { exit; }
				add_action("vc_after_init",array($this,'initVisualComposer'));
			}
		}
		
		protected function constant(){
			define('WDTT_BASE'		,   plugin_dir_path( __FILE__ ));
			define('WDTT_BASE_URI'	,   plugins_url( '', __FILE__ ));
			define('WDTT_JS'		, 	WDTT_BASE_URI . '/asset/js'		);
			define('WDTT_CSS'		, 	WDTT_BASE_URI . '/asset/css'		);
			define('WDTT_ADMIN_JS'	, 	WDTT_BASE_URI . '/admin/js'		);
			define('WDTT_ADMIN_CSS'	, 	WDTT_BASE_URI . '/admin/css'		);
			define('WDTT_ADMIN_LIB'	, 	WDTT_BASE_URI . '/admin/libs'		);
			define('WDTT_IMAGE'		, 	WDTT_BASE_URI . '/images'	);
			define('WDTT_TEMPLATE' 	, 	WDTT_BASE . '/templates'	);
			define('WDTT_INCLUDES'	, 	WDTT_BASE . '/includes'	);
		}

		/******************************** testimonials POST TYPE ***********************************/
		public function register_testimonials_post_type(){
			if (!post_type_exists('wd_testimonials')) {
				register_post_type('wd_testimonials', array(
					'exclude_from_search' 	=> true,
					'labels' 				=> array(
		                'name' 				=> _x('WD Testimonials', 'post type general name','wpdancelaparis'),
		                'singular_name' 	=> _x('WD testimonials', 'post type singular name','wpdancelaparis'),
		                'add_new' 			=> _x('Add Testimonials', 'Testimonials','wpdancelaparis'),
		                'add_new_item' 			=> sprintf( __( 'Add New %s', 'wpdancelaparis' ), __( 'Testimonials', 'wpdancelaparis' ) ),
						'edit_item' 			=> sprintf( __( 'Edit %s', 'wpdancelaparis' ), __( 'Testimonials', 'wpdancelaparis' ) ),
						'new_item' 				=> sprintf( __( 'New %s', 'wpdancelaparis' ), __( 'Testimonials', 'wpdancelaparis' ) ),
						'all_items' 			=> sprintf( __( 'All %s', 'wpdancelaparis' ), __( 'Testimonialss', 'wpdancelaparis' ) ),
						'view_item' 			=> sprintf( __( 'View %s', 'wpdancelaparis' ), __( 'Testimonials', 'wpdancelaparis' ) ),
						'search_items' 			=> sprintf( __( 'Search %a', 'wpdancelaparis' ), __( 'Testimonialss', 'wpdancelaparis' ) ),
						'not_found' 			=>  sprintf( __( 'No %s Found', 'wpdancelaparis' ), __( 'Testimonialss', 'wpdancelaparis' ) ),
						'not_found_in_trash' 	=> sprintf( __( 'No %s Found In Trash', 'wpdancelaparis' ), __( 'Features', 'wpdancelaparis' ) ),
		                'parent_item_colon' => '',
		                'menu_name' 		=> __('WD Testimonials','wpdancelaparis'),
					),
					'singular_label' 		=> __('WD Testimonials','wpdancelaparis'),
					'taxonomies' 			=> array('wd_testimonials_categories'),
					'public' 				=> true,
					'has_archive' 			=> false,
					'supports' 			 	=>  array('title','custom-fields','editor','thumbnail'),
					'has_archive' 			=> false,
					'rewrite' 				=>  array('slug'  =>  'wd_testimonials', 'with_front' =>  true),
					'show_in_nav_menus' 	=> false,
					'menu_icon'				=> 'dashicons-editor-quote',
					'menu_position'			=> 58,
				));	
			}
		}

		public function register_testimonials_taxonomy(){
			register_taxonomy( 'wd_testimonials_categories', 'wd_testimonials', array(
				'hierarchical'     		=> true,
				'labels'            	=> array(
					'name' 				=> esc_html__('Categories Testimonials', 'wpdancelaparis'),
					'singular_name' 	=> esc_html__('Category Testimonials', 'wpdancelaparis'),
	            	'new_item'          => esc_html__('Add New', 'wpdancelaparis' ),
	            	'edit_item'         => esc_html__('Edit Post', 'wpdancelaparis' ),
	            	'view_item'   		=> esc_html__('View Post', 'wpdancelaparis' ),
	            	'add_new_item'      => esc_html__('Add New Category Testimonials', 'wpdancelaparis' ),
	            	'menu_name'         => esc_html__( 'Categories Testimonials' , 'wpdancelaparis' ),
				),
				'show_ui'           	=> true,
				'show_admin_column' 	=> true,
				'query_var'         	=> true,
				'rewrite'           	=> array( 'slug' => 'wd_testimonials_categories' ),				
				'public'				=> true,
			));	
		}

		/******************************** testimonials POST TYPE INIT START ***********************************/

		public function testimonials_metabox_save_data($post_id) {

			if ( ! isset( $_POST['wd_testimonials_box_nonce'] ) )
					return $post_id;
			// verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times
			if (!wp_verify_nonce($_POST['wd_testimonials_box_nonce'],'wd_testimonials_box'))
				return $post->ID;
			if (!current_user_can('edit_post', $post->ID))
				return $post->ID;

			$data = array();
			if (isset($_POST['wd_testimonials'])) {
				$data['wd_testimonials'] = $_POST['wd_testimonials'];
			}
			update_post_meta($post_id,'wd_testimonials_meta_data', serialize($data));
			
		}

		public function process_meta_data_repeatable_field_after_save($meta_key, $list_meta_name){
			$data 	= array();
			if (isset($_POST[$meta_key])) {
				foreach ($list_meta_name as $name) {
					if (count($_POST[$meta_key][$name]) > 0) {
						foreach ($_POST[$meta_key][$name] as $key => $value) {
							$data[$key][$name] = $value;
						}
					}
				}
				//Remove last item (repeatable field)
				unset($data[count($data)-1]);
			}
			return $data;
		}

		public function get_testimonials_meta_data_default($field = ''){
			$default = array(
				'wd_testimonials' 	=> array(
					'role'				=> '',
					'url'				=> '#',
					'rating'			=> '5',
				),
			);
			return ($field && isset($default[$field])) ? $default[$field] : $default;
		}

		public function get_testimonials_meta_data($field = ''){
			$default = $this->get_testimonials_meta_data_default();
			$meta_data = get_post_meta( get_the_ID(), 'wd_testimonials_meta_data', true );
			$meta_data = ($meta_data) ? wp_parse_args( unserialize($meta_data), $default ) : array();
			return ($field && isset($meta_data[$field])) ? $meta_data[$field] : $meta_data;
		}	
		
		public function wd_testimonials_template_redirect(){
			global $wp_query,$post,$page_datas,$data;
			if( $wp_query->is_page() || $wp_query->is_single() ){
				if ( has_shortcode( $post->post_content, 'wd_testimonials' ) ) { 
					add_action('wp_enqueue_scripts',array($this,'init_script'));
				}
			}
		}
		
		public function testimonials_create_metabox() {
			if(post_type_exists('wd_testimonials')) {
				add_meta_box("wp_cp_testimonials_info", "Testimonial Detail", array($this,"metabox_form"), "wd_testimonials", "normal", "high");
			}
		}

		public function metabox_form(){
			wp_nonce_field( 'wd_testimonials_box', 'wd_testimonials_box_nonce' );
			$random_id 	= 'wd-testimonials-metabox-'.mt_rand();
			$meta_key 	= 'wd_testimonials';
			$meta_data 	= $this->get_testimonials_meta_data($meta_key);
			$meta_data 	= empty($meta_data) ? $this->get_testimonials_meta_data_default($meta_key) : $meta_data;
			?>
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-testimonials-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Role', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_testimonials[role]" value="<?php echo esc_attr($meta_data['role']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'URL', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_testimonials[url]" value="<?php echo esc_attr($meta_data['url']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Rating', 'wpdancelaparis' ); ?>:</label></th>
						<td class="rating-wrap">
							<?php for ($i = 5; $i >= 1 ; $i--) { 
								$checked = $meta_data['rating'] == $i ? 'checked="true"' : '';
								echo '<input class="star star-'.$i.'" id="star-'.$i.'" value="'.$i.'" type="radio" name="wd_testimonials[rating]" '.$checked.' />';
								echo '<label class="star star-'.$i.'" for="star-'.$i.'"></label>';
							} ?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
		}

		public function change_title_text( $title ){
		    $screen = get_current_screen();
		  
		    if  ( 'wd_testimonials' == $screen->post_type ) {
		        $title = esc_html__("Enter the customer's name here", 'wpdancelaparis' );
		    }
		    return $title;
		}
		
		public function rename_second_menu_name($safe_text, $text) {
			if (__('Testimonials Items', 'wpdancelaparis') !== $text) {
				return $safe_text;
			}

			// We are on the main menu item now. The filter is not needed anymore.
			remove_filter('attribute_escape', array($this,'rename_second_menu_name') );

			return __('WD Testimonials', 'wpdancelaparis');
		}
			
		protected function initShortcodes(){
			if( file_exists(WDTT_TEMPLATE . "/wd_testimonials.php") ){
				require_once WDTT_TEMPLATE . "/wd_testimonials.php";
			}
		}

		public function initVisualComposer(){ 
			if( file_exists(WDTT_TEMPLATE . "/wd_vc_testimonials.php") ){
				require_once WDTT_TEMPLATE . "/wd_vc_testimonials.php";
			}
	    }
	    
		protected function init_handle(){
			add_image_size('wd_testimonials_thumb',400,400,true);  
		}	
		
		public function init_admin_script($hook) {
			$screen = get_current_screen();
			if ($hook = 'post.php' && 'wd_testimonials' == $screen->post_type) {
				wp_enqueue_style('font-awesome', 						WDTT_ADMIN_LIB.'/font-awesome/css/font-awesome.min.css');
				wp_enqueue_style('wd-testimonials-admin-custom-css', 	WDTT_ADMIN_CSS.'/wd_admin.css');
				wp_enqueue_script( 'wd-testimonials-scripts',		 	WDTT_ADMIN_JS.'/wd_testimonials_script.js',false,false,true);
			}
			
		}	
		
		
		public function init_script(){
			wp_enqueue_style('wd-testimonials-custom-css', WDTT_CSS.'/wd_custom.css');	
		}


		/******************************** Check Visual Composer active ***********************************/
		protected function checkPluginVC(){
			$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
			if(in_array('js_composer/js_composer.php',$_active_vc)){
				return true;
			}else{
				return false;
			}
		}

	}
	WD_Testimonials::get_instance();  // Start an instance of the plugin class 
}