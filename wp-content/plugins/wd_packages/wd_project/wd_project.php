<?php
if (!class_exists('WD_project')) {
	class WD_project {
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

		protected $parkage_name = '/wd_project';

		public function __construct(){
			$this->constant();
			
			/****************************/
			// Register project post type
			add_action('init', array($this, 'register_project_post_type'));
			add_action('vc_before_init', array( $this, 'register_project_taxonomy' ) );
			add_filter('attribute_escape', array($this,'rename_second_menu_name') , 10, 2);
			add_theme_support('post-thumbnails', array('project'));

			//Change Placeholder Title Post
			add_filter( 'enter_title_here', array($this, 'change_title_text' ));
			
			add_action('admin_enqueue_scripts',array($this,'init_admin_script'));
			
			add_action('add_meta_boxes', array( $this,'project_create_metabox' ) );	
			add_action('pre_post_update', array($this,'project_metabox_save_data') , 10, 2);
			add_action('template_redirect', array($this,'wd_project_template_redirect') );
			
			$this->init_handle();

			//Visual Composer
			$this->initShortcodes();
			if($this->checkPluginVC()){
				if ( ! defined( 'ABSPATH' ) ) { exit; }
				add_action("vc_after_init",array($this,'initVisualComposer'));
			}
		}
		
		protected function constant(){
			define('WDPJ_BASE'		,   plugin_dir_path( __FILE__ ));
			define('WDPJ_BASE_URI'	,   plugins_url( '', __FILE__ ));
			define('WDPJ_JS'		, 	WDPJ_BASE_URI . '/asset/js'		);
			define('WDPJ_CSS'		, 	WDPJ_BASE_URI . '/asset/css'		);
			define('WDPJ_ADMIN_JS'	, 	WDPJ_BASE_URI . '/admin/js'		);
			define('WDPJ_ADMIN_CSS'	, 	WDPJ_BASE_URI . '/admin/css'		);
			define('WDPJ_ADMIN_LIB'	, 	WDPJ_BASE_URI . '/admin/libs'		);
			define('WDPJ_IMAGE'		, 	WDPJ_BASE_URI . '/images'	);
			define('WDPJ_TEMPLATE' 	, 	WDPJ_BASE . '/templates'	);
			define('WDPJ_INCLUDES'	, 	WDPJ_BASE . '/includes'	);
		}

		/******************************** project POST TYPE ***********************************/
		public function register_project_post_type(){
			if (!post_type_exists('wd_project')) {
				register_post_type('wd_project', array(
					'exclude_from_search' 	=> true,
					'labels' 				=> array(
		                'name' 				=> _x('WD Project', 'post type general name','wpdancelaparis'),
		                'singular_name' 	=> _x('WD Project', 'post type singular name','wpdancelaparis'),
		                'add_new' 			=> _x('Add Project', 'project','wpdancelaparis'),
		                'add_new_item' 			=> sprintf( __( 'Add New %s', 'wpdancelaparis' ), __( 'Project', 'wpdancelaparis' ) ),
						'edit_item' 			=> sprintf( __( 'Edit %s', 'wpdancelaparis' ), __( 'Project', 'wpdancelaparis' ) ),
						'new_item' 				=> sprintf( __( 'New %s', 'wpdancelaparis' ), __( 'Project', 'wpdancelaparis' ) ),
						'all_items' 			=> sprintf( __( 'All %s', 'wpdancelaparis' ), __( 'Projects', 'wpdancelaparis' ) ),
						'view_item' 			=> sprintf( __( 'View %s', 'wpdancelaparis' ), __( 'Project', 'wpdancelaparis' ) ),
						'search_items' 			=> sprintf( __( 'Search %a', 'wpdancelaparis' ), __( 'Projects', 'wpdancelaparis' ) ),
						'not_found' 			=>  sprintf( __( 'No %s Found', 'wpdancelaparis' ), __( 'Projects', 'wpdancelaparis' ) ),
						'not_found_in_trash' 	=> sprintf( __( 'No %s Found In Trash', 'wpdancelaparis' ), __( 'Features', 'wpdancelaparis' ) ),
		                'parent_item_colon' => '',
		                'menu_name' 		=> __('WD Project','wpdancelaparis'),
					),
					'singular_label' 		=> __('WD Project','wpdancelaparis'),
					'taxonomies' 			=> array('wd_project_categories'),
					'public' 				=> true,
					'has_archive' 			=> false,
					'supports' 			 	=>  array('title','custom-fields','editor','thumbnail'),
					'has_archive' 			=> false,
					'rewrite' 				=>  array('slug'  =>  'wd_project', 'with_front' =>  true),
					'show_in_nav_menus' 	=> false,
					'menu_icon'				=> 'dashicons-editor-quote',
					'menu_position'			=> 58,
				));	
			}
		}

		public function register_project_taxonomy(){
			register_taxonomy( 'wd_project_categories', 'wd_project', array(
				'hierarchical'     		=> true,
				'labels'            	=> array(
					'name' 				=> esc_html__('Categories Project', 'wpdancelaparis'),
					'singular_name' 	=> esc_html__('Category Project', 'wpdancelaparis'),
	            	'new_item'          => esc_html__('Add New', 'wpdancelaparis' ),
	            	'edit_item'         => esc_html__('Edit Post', 'wpdancelaparis' ),
	            	'view_item'   		=> esc_html__('View Post', 'wpdancelaparis' ),
	            	'add_new_item'      => esc_html__('Add New Category Project', 'wpdancelaparis' ),
	            	'menu_name'         => esc_html__( 'Categories Project' , 'wpdancelaparis' ),
				),
				'show_ui'           	=> true,
				'show_admin_column' 	=> true,
				'query_var'         	=> true,
				'rewrite'           	=> array( 'slug' => 'wd_project_categories' ),				
				'public'				=> true,
			));	
		}

		/******************************** project POST TYPE INIT START ***********************************/

		public function project_metabox_save_data($post_id) {

			if ( ! isset( $_POST['wd_project_box_nonce'] ) )
					return $post_id;
			// verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times
			if (!wp_verify_nonce($_POST['wd_project_box_nonce'],'wd_project_box'))
				return $post->ID;
			if (!current_user_can('edit_post', $post->ID))
				return $post->ID;

			$data = array();
			if (isset($_POST['wd_project'])) {
				$data['wd_project'] = $_POST['wd_project'];
			}
			update_post_meta($post_id,'wd_project_meta_data', serialize($data));
			
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

		public function get_project_meta_data_default($field = ''){
			$default = array(
				'wd_project' 	=> array(
					'role'				=> '',
					'url'				=> '#',
					'rating'			=> '5',
				),
			);
			return ($field && isset($default[$field])) ? $default[$field] : $default;
		}

		public function get_project_meta_data($field = ''){
			$default = $this->get_project_meta_data_default();
			$meta_data = get_post_meta( get_the_ID(), 'wd_project_meta_data', true );
			$meta_data = ($meta_data) ? wp_parse_args( unserialize($meta_data), $default ) : array();
			return ($field && isset($meta_data[$field])) ? $meta_data[$field] : $meta_data;
		}	
		
		public function wd_project_template_redirect(){
			global $wp_query,$post,$page_datas,$data;
			if( $wp_query->is_page() || $wp_query->is_single() ){
				if ( has_shortcode( $post->post_content, 'wd_project' ) ) { 
					add_action('wp_enqueue_scripts',array($this,'init_script'));
				}
			}
		}
		
		public function project_create_metabox() {
			if(post_type_exists('wd_project')) {
				add_meta_box("wp_cp_project_info", "Thông tin", array($this,"metabox_form"), "wd_project", "normal", "high");
			}
		}

		public function metabox_form(){
			wp_nonce_field( 'wd_project_box', 'wd_project_box_nonce' );
			$random_id 	= 'wd-project-metabox-'.mt_rand();
			$meta_key 	= 'wd_project';
			$meta_data 	= $this->get_project_meta_data($meta_key);
			$meta_data 	= empty($meta_data) ? $this->get_project_meta_data_default($meta_key) : $meta_data;
			?>
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-project-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Role', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_project[role]" value="<?php echo esc_attr($meta_data['role']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'URL', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_project[url]" value="<?php echo esc_attr($meta_data['url']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Rating', 'wpdancelaparis' ); ?>:</label></th>
						<td class="rating-wrap">
							<?php for ($i = 5; $i >= 1 ; $i--) { 
								$checked = $meta_data['rating'] == $i ? 'checked="true"' : '';
								echo '<input class="star star-'.$i.'" id="star-'.$i.'" value="'.$i.'" type="radio" name="wd_project[rating]" '.$checked.' />';
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
		  
		    if  ( 'wd_project' == $screen->post_type ) {
		        $title = esc_html__("Enter the project's name here", 'wpdancelaparis' );
		    }
		    return $title;
		}
		
		public function rename_second_menu_name($safe_text, $text) {
			if (__('project Items', 'wpdancelaparis') !== $text) {
				return $safe_text;
			}

			// We are on the main menu item now. The filter is not needed anymore.
			remove_filter('attribute_escape', array($this,'rename_second_menu_name') );

			return __('WD project', 'wpdancelaparis');
		}
			
		protected function initShortcodes(){
			if( file_exists(WDPJ_TEMPLATE . "/wd_project.php") ){
				require_once WDPJ_TEMPLATE . "/wd_project.php";
			}
		}

		public function initVisualComposer(){ 
			if( file_exists(WDPJ_TEMPLATE . "/wd_vc_project.php") ){
				require_once WDPJ_TEMPLATE . "/wd_vc_project.php";
			}
	    }
	    
		protected function init_handle(){
			add_image_size('wd_project_thumb',400,400,true);  
		}	
		
		public function init_admin_script($hook) {
			$screen = get_current_screen();
			if ($hook = 'post.php' && 'wd_project' == $screen->post_type) {
				wp_enqueue_style('font-awesome', 						WDPJ_ADMIN_LIB.'/font-awesome/css/font-awesome.min.css');
				wp_enqueue_style('wd-project-admin-custom-css', 	WDPJ_ADMIN_CSS.'/wd_admin.css');
				wp_enqueue_script( 'wd-project-scripts',		 	WDPJ_ADMIN_JS.'/wd_script.js',false,false,true);
			}
			
		}	
		
		
		public function init_script(){
			wp_enqueue_style('wd-project-custom-css', WDPJ_CSS.'/wd_custom.css');	
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
	WD_project::get_instance();  // Start an instance of the plugin class 
}