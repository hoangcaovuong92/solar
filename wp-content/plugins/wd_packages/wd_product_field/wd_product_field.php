<?php
if (!class_exists('WD_Product_Custom_Field')) {
	class WD_Product_Custom_Field {
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

		public function __construct(){
			$this->constant();
			
			/****************************/
			//Change Placeholder Title Post
			add_action('admin_enqueue_scripts',array($this,'init_admin_script'));
			add_action('add_meta_boxes', array( $this,'product_field_create_metabox' ) );	
			add_action('pre_post_update', array($this,'product_field_metabox_save_data') , 10, 2);
			//Hook
			add_action( 'after_setup_theme', array($this,'product_field_hook'), 200);
		}
		
		protected function constant(){
			define('WDPF_BASE'		,   plugin_dir_path( __FILE__ ));
			define('WDPF_BASE_URI'	,   plugins_url( '', __FILE__ ));
			define('WDPF_JS'		, 	WDPF_BASE_URI . '/asset/js'		);
			define('WDPF_CSS'		, 	WDPF_BASE_URI . '/asset/css'		);
			define('WDPF_ADMIN_JS'	, 	WDPF_BASE_URI . '/admin/js'		);
			define('WDPF_ADMIN_CSS'	, 	WDPF_BASE_URI . '/admin/css'		);
			define('WDPF_ADMIN_LIB'	, 	WDPF_BASE_URI . '/admin/libs'		);
			define('WDPF_IMAGE'		, 	WDPF_BASE_URI . '/images'	);
			define('WDPF_TEMPLATE' 	, 	WDPF_BASE . '/templates'	);
			define('WDPF_INCLUDES'	, 	WDPF_BASE . '/includes'	);
		}


		/******************************** product_field POST TYPE INIT START ***********************************/
		public function product_field_hook() {
		}

		public function product_field_metabox_save_data($post_id) {

			if ( ! isset( $_POST['wd_product_field_box_nonce'] ) )
					return $post_id;
			// verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times
			if (!wp_verify_nonce($_POST['wd_product_field_box_nonce'],'wd_product_field_box'))
				return $post->ID;
			if (!current_user_can('edit_post', $post->ID))
				return $post->ID;

			$data = array();
			if (isset($_POST['wd_product_field'])) {
				$data['wd_product_field'] = $_POST['wd_product_field'];
			}
			update_post_meta($post_id,'wd_product_field_meta_data', serialize($data));
			
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

		public function get_product_field_meta_data_default($field = ''){
			$default = array(
				'wd_product_field_specifications' 	=> array(
					'role'				=> '',
					'url'				=> '#',
					'rating'			=> '5',
				),
				'wd_product_field_specifications_detail' 	=> array(
					'role'				=> '',
					'url'				=> '#',
					'rating'			=> '5',
				),
				'wd_product_field_advantages' 	=> array(
					'role'				=> '',
					'url'				=> '#',
					'rating'			=> '5',
				),
			);
			return ($field && isset($default[$field])) ? $default[$field] : $default;
		}

		public function get_product_field_meta_data($field = ''){
			$default = $this->get_product_field_meta_data_default();
			$meta_data = get_post_meta( get_the_ID(), 'wd_product_field_meta_data', true );
			$meta_data = ($meta_data) ? wp_parse_args( unserialize($meta_data), $default ) : array();
			return ($field && isset($meta_data[$field])) ? $meta_data[$field] : $meta_data;
		}	
		

		
		public function product_field_create_metabox() {
			if(post_type_exists('product')) {
				add_meta_box("wp_cp_product_field_specifications", "Thông số kỹ thuật", array($this,"metabox_form_specifications"), "product", "normal", "high");
				add_meta_box("wp_cp_product_field_specifications_detail", "Thông số kỹ thuật chi tiết", array($this,"metabox_form_specifications"), "product", "normal", "high");
				add_meta_box("wp_cp_product_field_advantages", "Ưu điểm sản phẩm", array($this,"metabox_form_advantages"), "product", "normal", "high");
			}
		}

		public function metabox_form_specifications(){
			wp_nonce_field( 'wd_product_field_box', 'wd_product_field_box_nonce' );
			$random_id 	= 'wd-product_field-metabox-'.mt_rand();
			$meta_key 	= 'wd_product_field_specifications';
			$meta_data 	= $this->get_product_field_meta_data($meta_key);
			$meta_data 	= empty($meta_data) ? $this->get_product_field_meta_data_default($meta_key) : $meta_data;
			?>
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-product_field-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Role', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[role]" value="<?php echo esc_attr($meta_data['role']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'URL', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[url]" value="<?php echo esc_attr($meta_data['url']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Rating', 'wpdancelaparis' ); ?>:</label></th>
						<td class="rating-wrap">
							<?php for ($i = 5; $i >= 1 ; $i--) { 
								$checked = $meta_data['rating'] == $i ? 'checked="true"' : '';
								echo '<input class="star star-'.$i.'" id="star-'.$i.'" value="'.$i.'" type="radio" name="wd_product_field_specifications[rating]" '.$checked.' />';
								echo '<label class="star star-'.$i.'" for="star-'.$i.'"></label>';
							} ?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
		}

		public function metabox_form_specifications_detail(){
			$random_id 	= 'wd-product_field-metabox-'.mt_rand();
			$meta_key 	= 'wd_product_field_specifications_detail';
			$meta_data 	= $this->get_product_field_meta_data($meta_key);
			$meta_data 	= empty($meta_data) ? $this->get_product_field_meta_data_default($meta_key) : $meta_data;
			?>
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-product_field-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Role', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[role]" value="<?php echo esc_attr($meta_data['role']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'URL', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[url]" value="<?php echo esc_attr($meta_data['url']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Rating', 'wpdancelaparis' ); ?>:</label></th>
						<td class="rating-wrap">
							<?php for ($i = 5; $i >= 1 ; $i--) { 
								$checked = $meta_data['rating'] == $i ? 'checked="true"' : '';
								echo '<input class="star star-'.$i.'" id="star-'.$i.'" value="'.$i.'" type="radio" name="wd_product_field_specifications_detail[rating]" '.$checked.' />';
								echo '<label class="star star-'.$i.'" for="star-'.$i.'"></label>';
							} ?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
		}

		public function metabox_form_advantages(){
			$random_id 	= 'wd-product_field-metabox-'.mt_rand();
			$meta_key 	= 'wd_product_field_advantages';
			$meta_data 	= $this->get_product_field_meta_data($meta_key);
			$meta_data 	= empty($meta_data) ? $this->get_product_field_meta_data_default($meta_key) : $meta_data;
			?>
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-product_field-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Role', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_advantages[role]" value="<?php echo esc_attr($meta_data['role']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'URL', 'wpdancelaparis' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_advantages[url]" value="<?php echo esc_attr($meta_data['url']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Rating', 'wpdancelaparis' ); ?>:</label></th>
						<td class="rating-wrap">
							<?php for ($i = 5; $i >= 1 ; $i--) { 
								$checked = $meta_data['rating'] == $i ? 'checked="true"' : '';
								echo '<input class="star star-'.$i.'" id="star-'.$i.'" value="'.$i.'" type="radio" name="wd_product_field_advantages[rating]" '.$checked.' />';
								echo '<label class="star star-'.$i.'" for="star-'.$i.'"></label>';
							} ?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
		}

		public function init_admin_script($hook) {
			$screen = get_current_screen();
			if ($hook = 'post.php' && 'product' == $screen->post_type) {
				wp_enqueue_style('font-awesome', 						WDPF_ADMIN_LIB.'/font-awesome/css/font-awesome.min.css');
				wp_enqueue_style('wd-product_field-admin-custom-css', 	WDPF_ADMIN_CSS.'/wd_admin.css');
				wp_enqueue_script( 'wd-product_field-scripts',		 	WDPF_ADMIN_JS.'/wd_script.js',false,false,true);
			}
			
		}	
		
		public function init_script(){
			wp_enqueue_style('wd-testimonials-custom-css', WDPF_CSS.'/wd_custom.css');	
		}

	}
	WD_Product_Custom_Field::get_instance();  // Start an instance of the plugin class 
}