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
			add_action('tvlgiao_wpdance_before_single_product_desc', array($this, 'get_specifications_content'), 5); 
			add_action('tvlgiao_wpdance_after_single_product_desc', array($this, 'get_wd_product_field_advantages_content'), 5); 
			add_action('tvlgiao_wpdance_after_single_product_desc', array($this, 'get_specifications_detail_content'), 10); 
		}

		public function get_specifications_content() { 
			$data 		=  $this->get_product_field_meta_data('wd_product_field_specifications');

			$list_field_name 	=  array(
					'type'				=> esc_html__( 'Loại sản phẩm', 'wd_package' ),
					'capacity'			=> esc_html__( 'Công suất', 'wd_package' ),
					'origin'			=> esc_html__( 'Xuất xứ', 'wd_package' ),
					'weight'			=> esc_html__( 'Trọng Lượng', 'wd_package' ),
					'size'				=> esc_html__( 'Kích thước (Cao/Ngang/Rộng)', 'wd_package' ),
				);
			$list_field_unit 	=  array('capacity_unit','weight_unit');
			if ($data) {
				$data['capacity'] 	= ($data['capacity']) ? $data['capacity'].$data['capacity_unit'] : '';
				$data['weight'] 	= ($data['weight']) ? $data['weight'].$data['weight_unit'] : '';
				echo '<div class="wd-single-product-specifications-wrap">';
				echo '<table class="wd-single-product-specifications-list">';
				foreach ($data as $key => $value) {
					if ($value != '' && !in_array($key, $list_field_unit)) {
						echo '<tr class="wd-single-product-specifications-item">';
						echo '<td>'.$list_field_name[$key].'</td>';
						echo '<td>'.$value.'</td>';
						echo '</tr>';
					}
				}
				echo '</table>';
				echo '</div>';
			}
		}

		public function get_wd_product_field_advantages_content() { 
			$data 		=  $this->get_product_field_meta_data('wd_product_field_advantages');
			if ($data) {
				echo '<div class="wd-single-product-title">'.esc_html__( 'Ưu điểm sản phẩm', 'wd_package' ).'</div>';
				echo '<div class="wd-single-product-wd_product_field-advantages-wrap">';
				echo '<ul class="wd-single-product-wd_product_field-advantages-list">';
				foreach ($data as $key => $value) {
					echo '<li>'.$value['advantage'].'</li>';
				}
				echo '</ul>';
				echo '</div>';
			}
		}

		public function get_specifications_detail_content() { 
			$data 		=  $this->get_product_field_meta_data('wd_product_field_specifications_detail');

			$list_field_name 	=  array(
					'model'					=> esc_html__( 'Model', 'wd_package' ),
					'warranty_period'		=> esc_html__( 'Thời hạn bảo hành', 'wd_package' ),
					'maximum_power_period'	=> esc_html__( 'Công suất tối đa', 'wd_package' ),
					'panel_efficiency'		=> esc_html__( 'Panel Efficiency', 'wd_package' ),
					'heat_resistance'		=> esc_html__( 'Độ chịu nhiệt', 'wd_package' ),
					'panel_size'			=> esc_html__( 'Kích thước panel', 'wd_package' ),
					'energy_size'			=> esc_html__( 'Kích thước ô sản phẩm', 'wd_package' ),
					'glass_thickness'		=> esc_html__( 'Độ dày kính', 'wd_package' ),
					'battery_type'			=> esc_html__( 'Loại pin', 'wd_package' ),
				);
			$list_field_unit 	=  array('maximum_power_period_unit','heat_resistance_unit');
			if ($data) {
				$data['maximum_power_period'] 	= ($data['maximum_power_period']) ? $data['maximum_power_period'].$data['maximum_power_period_unit'] : '';
				$data['heat_resistance'] 		= ($data['heat_resistance']) ? $data['heat_resistance'].$data['heat_resistance_unit'] : '';
				echo '<div class="wd-single-product-title">'.esc_html__( 'Thông số kỹ thuật chi tiết', 'wd_package' ).'</div>';
				echo '<div class="wd-single-product-specifications-detail-wrap">';
				echo '<table class="wd-single-product-specifications-detail-list">';
				foreach ($data as $key => $value) {
					if ($value != '' && !in_array($key, $list_field_unit)) {
						echo '<tr class="wd-single-product-specifications-detail-item">';
						echo '<td>'.$list_field_name[$key].'</td>';
						echo '<td>'.$value.'</td>';
						echo '</tr>';
					}
				}
				echo '</table>';
				echo '</div>';
			}
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
			if (isset($_POST['wd_product_field_specifications'])) {
				$data['wd_product_field_specifications'] = $_POST['wd_product_field_specifications'];
			}
			if (isset($_POST['wd_product_field_advantages'])) {
				$meta_key 				= 'wd_product_field_advantages';
				$list_meta_name 		= array('advantage');
				$data['wd_product_field_advantages'] 	= $this->process_meta_data_repeatable_field_after_save($meta_key, $list_meta_name);
			}
			if (isset($_POST['wd_product_field_specifications_detail'])) {
				$data['wd_product_field_specifications_detail'] = $_POST['wd_product_field_specifications_detail'];
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
					'type'				=> '',
					'capacity'			=> '200',
					'capacity_unit'		=> 'W',
					'origin'			=> 'VN',
					'weight'			=> '1',
					'weight_unit'		=> 'kg',
					'size'				=> '10x10x10mm',
				),
				'wd_product_field_specifications_detail' 	=> array(
					'model'					=> '',
					'warranty_period'		=> '',
					'maximum_power_period'	=> '100',
					'maximum_power_period_unit'	=> 'W',
					'panel_efficiency'		=> '',
					'heat_resistance'		=> '',
					'heat_resistance_unit'	=> '°C',
					'panel_size'			=> '10x10x10mm',
					'energy_size'			=> '',
					'glass_thickness'		=> '',
					'battery_type'			=> '',
				),
				'wd_product_field_advantages' 	=> array(
					array(
						'advantage'		=> '',
					),
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
				add_meta_box("wp_cp_product_field_specifications_detail", "Thông số kỹ thuật chi tiết", array($this,"metabox_form_specifications_detail"), "product", "normal", "high");
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
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-product-field-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row" style="width:20%"><label><?php esc_html_e( 'Loại sản phẩm', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[type]" value="<?php echo esc_attr($meta_data['type']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Công suất', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[capacity]" value="<?php echo esc_attr($meta_data['capacity']);?>"/></td> 
						<th scope="row"><label><?php esc_html_e( 'Đơn vị', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[capacity_unit]" value="<?php echo esc_attr($meta_data['capacity_unit']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Xuất xứ', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[origin]" value="<?php echo esc_attr($meta_data['origin']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Trọng lượng', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[weight]" value="<?php echo esc_attr($meta_data['weight']);?>"/></td> 
						<th scope="row"><label><?php esc_html_e( 'Đơn vị', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[weight_unit]" value="<?php echo esc_attr($meta_data['weight_unit']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Kích thước (Cao/Ngang/Rộng)', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications[size]" value="<?php echo esc_attr($meta_data['size']);?>"/></td> 
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
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-product-field-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row" style="width:20%"><label><?php esc_html_e( 'Model', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[model]" value="<?php echo esc_attr($meta_data['model']);?>"/></td>
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Thời hạn bảo hành', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[warranty_period]" value="<?php echo esc_attr($meta_data['warranty_period']);?>"/></td> 
						</td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Công suất tối đa', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[maximum_power_period]" value="<?php echo esc_attr($meta_data['maximum_power_period']);?>"/></td> 
						<th scope="row"><label><?php esc_html_e( 'Đơn vị', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[maximum_power_period_unit]" value="<?php echo esc_attr($meta_data['maximum_power_period_unit']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Panel Efficiency', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[panel_efficiency]" value="<?php echo esc_attr($meta_data['panel_efficiency']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Độ chịu nhiệt', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[heat_resistance]" value="<?php echo esc_attr($meta_data['heat_resistance']);?>"/></td>
						<th scope="row"><label><?php esc_html_e( 'Đơn vị', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[heat_resistance_unit]" value="<?php echo esc_attr($meta_data['heat_resistance_unit']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Kích thước Panel (Cao/Ngang/Rộng)', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[panel_size]" value="<?php echo esc_attr($meta_data['panel_size']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Kích thước ô năng lượng', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[energy_size]" value="<?php echo esc_attr($meta_data['energy_size']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Độ dày kính', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[glass_thickness]" value="<?php echo esc_attr($meta_data['glass_thickness']);?>"/></td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Loại pin', 'wd_package' ); ?>:</label></th>
						<td><input type="text" class="wd-full-width" name="wd_product_field_specifications_detail[battery_type]" value="<?php echo esc_attr($meta_data['battery_type']);?>"/></td> 
					</tr>
				</tbody>
			</table>
		<?php
		}

		public function metabox_form_advantages(){
			echo $this->get_metabox_repeatable_form( 'wd_product_field_advantages' );
		}

		public function get_metabox_repeatable_form( $meta_key = '' ){
			if (!$meta_key) return;
			$random_id 		= 'wd-product_field-metabox'.mt_rand();
			$meta_data 		= $this->get_product_field_meta_data($meta_key);
			$meta_default 	= $this->get_product_field_meta_data_default($meta_key)[0];
			ob_start();
			?>
			<table id="<?php echo esc_attr( $random_id ); ?>" class="form-table wd-product_field-metabox-custom-meta-box wd-custom-meta-box-width">
			   <tbody>
				   	<?php
			        if ( $meta_data ) :
			          	foreach ( $meta_data as $value ) {
					         ?>
					      	<tr>
						        <?php echo $this->get_metabox_repeatable_field( $meta_key, $value ); ?>
						        <td width="10%"><a class="button wd-metabox-remove-row" href="#1"><?php esc_html_e( 'Remove', 'wd_package' ); ?></a></td>
					     	 </tr>
					      <?php
			         	}
			        else :
			         // show a blank one ?>
					     <tr>
			          		<?php echo $this->get_metabox_repeatable_field( $meta_key, $meta_default ); ?>
					        <td width="10%"><a class="button wd-metabox-remove-row button-disabled" href="#"><?php esc_html_e( 'Remove', 'wd_package' ); ?></a></td>
					      </tr>
			     	<?php endif; ?>
			
			      <!-- empty hidden one for jQuery -->
			      	<tr class="hidden wd_metabox_content_repeatable">
			         	<?php echo $this->get_metabox_repeatable_field( $meta_key, $meta_default ); ?>
			         	<td width="10%"><a class="button wd-metabox-remove-row" href="#"><?php esc_html_e( 'Remove', 'wd_package' ); ?></a></td>
			      	</tr>
			   	</tbody>
			</table>
			<p><a class="wd-metabox-add-row" data-id="<?php echo esc_attr( $random_id ); ?>" class="button" href="#"><?php esc_html_e( 'Add Another', 'wd_package' ); ?></a></p>
			<?php
			return ob_get_clean();
		}

		public function get_metabox_repeatable_field( $meta_key, $data = array() ){
			if (!empty($meta_key) && !empty($data)) {
				ob_start();
				switch ($meta_key) {
					case 'wd_product_field_advantages': ?>
							<td width="90%">
					            <input type="text" class="wd-full-width" name="wd_product_field_advantages[advantage][]" value="<?php echo esc_attr( $data['advantage'] ); ?>" />
					        </td>
						<?php
						break;
					default:
						break;
				}
				return ob_get_clean();
			}
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