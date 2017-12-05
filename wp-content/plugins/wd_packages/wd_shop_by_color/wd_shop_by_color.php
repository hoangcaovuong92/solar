<?php
if (!class_exists('WD_Shopbycolor')) {
	class WD_Shopbycolor {
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

		protected $parkage_name = '/wd_shop_by_color';
		public $woo_ready;
		public $color_ready;
		public $tax_slug;
		public $widget_file_name = array(
			/* filename  => classname */
			'filter_by_color' => 'tvlgiao_wpdance_widget_product_color_filter',
			'filter_by_attrs' => 'tvlgiao_wpdance_widget_product_attrs_filter',
			'filter_by_price' => 'tvlgiao_wpdance_widget_product_price_filter',
			//'filter_by_brand' => 'tvlgiao_wpdance_widget_product_brand_filter',
		);

		public function __construct(){
		
			$this->constant();
			$this->init_trigger();
			
		}

		protected function constant(){
			define('PC_BASE'		,   plugin_dir_path( __FILE__ ) );
			define('PC_BASE_URI'	,   plugins_url( '', __FILE__ ) );
			define('PC_JS'		, 	PC_BASE_URI . '/js'				);
			define('PC_CSS'		, 	PC_BASE_URI . '/css'			);
			define('PC_IMAGE'	, 	PC_BASE_URI . '/images'			);

			/**************** Check if woocommerce actived ****************/
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				$this->woo_ready = true;
			}else{
				$this->woo_ready = false;
			}
			$this->color_ready = false;
			
			$this->initWidgets(); 
		}	

		protected function initWidgets(){
			foreach ($this->widget_file_name as $widget_name => $class_name) {
				if( file_exists(PC_BASE."/widgets/$widget_name.php") ){
					require_once PC_BASE."/widgets/$widget_name.php";
				}	
			}
		}

		public function load_color_nav_widget(){
			foreach ($this->widget_file_name as $widget_name => $class_name) {
				if( class_exists($class_name) ){
					register_widget( $class_name );
				}	
			}
		}
		
		protected function init_trigger(){
			if( $this->woo_ready == false ){
				return ;
			}
			global $woocommerce,$_wd_msg;
			$_color = 'color';
			$attribute_name    = ( isset( $_color ) )    ? wc_sanitize_taxonomy_name( stripslashes( (string) $_color ) ) : '';	
			$attribute_name  = wc_attribute_taxonomy_name( $attribute_name );
			$attribute_name_array = wc_get_attribute_taxonomy_names();
			//$taxonomy_exists = taxonomy_exists( wc_attribute_taxonomy_name( $attribute_name ) );
			$taxonomy_exists = in_array($attribute_name,$attribute_name_array);
			/**************** Check if attribute available ****************/
			$this->tax_slug = '';
			
			if( !$taxonomy_exists ){
				$this->color_ready = false;
				$_wd_msg = "<strong>Color attribute is not exist.</strong>.Go to Products => Attributes,create new attibute with slug <strong>color</strong>";
				add_action('admin_notices', array($this,'show_msg'));   
			}else{
				$this->color_ready = true;
			
				add_image_size('wd_small_thumbnail',30,30,true);
			
				$_tax_slug =  $attribute_name ;
				$this->tax_slug = $_tax_slug;
				$this->init_script();
				$this->init_handle();			
			}
		}

		public function color_layered_nav_init(){
			//if ( !is_active_widget( false, false, 'woocommerce_layered_nav', true ) && ! is_admin() ) {
				global $_chosen_attributes;

				$_chosen_attributes = array();
				$attribute_taxonomies = wc_get_attribute_taxonomies();
				if ( $attribute_taxonomies ) {
					foreach ( $attribute_taxonomies as $tax ) {
						if($tax->attribute_name == "color"){
							$attribute       = wc_sanitize_taxonomy_name( $tax->attribute_name );
							$taxonomy        = wc_attribute_taxonomy_name( $attribute );
							$name            = 'filter_' . $attribute;
							$query_type_name = 'query_type_' . $attribute;
							
							$taxonomy_exists = in_array($taxonomy,wc_get_attribute_taxonomy_names());
							
							if ( ! empty( $_GET[ $name ] ) && $taxonomy_exists ) {
							
								$_chosen_attributes[ $taxonomy ]['terms'] = explode( ',', $_GET[ $name ] );

								if ( empty( $_GET[ $query_type_name ] ) || ! in_array( strtolower( $_GET[ $query_type_name ] ), array( 'and', 'or' ) ) )
									$_chosen_attributes[ $taxonomy ]['query_type'] = apply_filters( 'woocommerce_layered_nav_default_query_type', 'and' );
								else
									$_chosen_attributes[ $taxonomy ]['query_type'] = strtolower( $_GET[ $query_type_name ] );

							}
						}
					}
				}
				$wc_query = new WC_Query();
				/*add_filter('loop_shop_post_in',array( $wc_query, 'layered_nav_query' ));*/
			//}
		}
		
		protected function init_handle(){
			if( $this->color_ready && $this->woo_ready ){
				$_edit_hook_name = $this->tax_slug.'_edit_form_fields';
				$_add_hook_name = $this->tax_slug.'_add_form_fields';
				add_action( $_edit_hook_name, array($this,'wd_pc_edit_attribute'), 100000, 2 );
				add_action( $_add_hook_name, array($this,'wd_pc_add_attribute'), 100000 );
				add_action('wp_ajax_wd_pc_find_media_thumbnail', array( $this, 'find_media_thumbnail'));
				add_action('wp_ajax_nopriv_wd_pc_find_media_thumbnail', array( $this, 'find_media_thumbnail') );	

				add_action( 'created_term', array( $this, 'wd_pc_color_fields_save'), 10,3 );
				add_action( 'edit_term', array( $this, 'wd_pc_color_fields_save'), 10,3 );
				add_action( 'delete_term', array( $this, 'wd_pc_color_fields_remove'), 10,3 );		

				add_action( 'widgets_init', array($this,'load_color_nav_widget'));	

				$edit_title_color_column_hook = 'manage_edit-'. $this->tax_slug .'_columns';
				$edit_color_column_hook = 'manage_'. $this->tax_slug .'_custom_column';
				
				add_filter( $edit_title_color_column_hook, array($this,'wd_pc_color_color_columns') );
				add_filter( $edit_color_column_hook , array($this,'wd_pc_color_color_column'), 10, 3 );				
				add_action( 'init', array( $this, 'color_layered_nav_init' ) );
			}

		}	
		
		protected function init_script(){
			add_action( 'admin_enqueue_scripts', array($this,'wd_admin_enqueue_color_picker') );
			add_action( 'wp_enqueue_scripts', array($this, 'wd_frontend_enqueue_color_picker') );
		}
		
		
		/******************* All Handle Function Start *******************/
		
		public function wd_pc_color_color_columns( $columns ) {
			$new_columns = array();
			$new_columns['cb'] = $columns['cb'];
			$new_columns['color'] = __( 'Color', 'wd_package' );

			unset( $columns['cb'] );

			return array_merge( $new_columns, $columns );
		}



		public function wd_pc_color_color_column( $columns, $column, $id ) {
			global $woocommerce;

			if ( $column == 'color' ) {

				$datas = get_metadata( 'term', $id, "wd_pc_color_config", true );
				if( strlen($datas) > 0 ){
					$datas = unserialize($datas);	
				}else{
					$datas = array(
								'wd_pc_color_color' 				=> "#aaaaaa",
								'wd_pc_color_image' 				=> 0
							);
			
				}

				$columns .= "<span style='background-color:{$datas['wd_pc_color_color']}'></span>";

			}

			return $columns;
		}


		public function wd_pc_color_fields_save( $term_id, $tt_id, $taxonomy ){
			
			$_term_config = array();
			
			$_term_config["wd_pc_color_image"] = isset( $_POST['wd_pc_color_image'] ) ? absint( $_POST['wd_pc_color_image'] ) : 0 ;
			$_term_config["wd_pc_color_color"] = isset( $_POST['wd_pc_color_color'] ) ? esc_attr( $_POST['wd_pc_color_color'] ) : "#aaaaaa" ;

			
			$_term_config_str = serialize($_term_config);
			
			$result = update_metadata( 'term',$term_id,"wd_pc_color_config",$_term_config_str );

		}

		public function wd_pc_color_fields_remove( $term_id, $tt_id, $taxonomy ){
			delete_metadata( 'term',$term_id,"wd_pc_color_config" );
		}	
		
		
		public function wd_pc_edit_attribute( $term, $taxonomy ){
				
			$datas = get_metadata( 'term', $term->term_id, "wd_pc_color_config", true );
			if( strlen($datas) > 0 ){
				$datas = unserialize($datas);	
			}else{
				$datas = array(
							'wd_pc_color_color' 				=> "#aaaaaa"
							,'wd_pc_color_image' 				=> 0
						);
		
			}
			
			$_img =  PC_IMAGE.'/default.png';
			if( absint($datas['wd_pc_color_image']) > 0 ){
				$_img = wp_get_attachment_image_src( absint($datas['wd_pc_color_image']), 'wd_small_thumbnail', true ); 
				$_img = $_img[0];
			}
		?>

			<tr class="form-field form-required">
				<th scope="row" valign="top"><label><?php esc_html_e( 'Color', 'wd_package' ); ?></label></th>
				<td>
					<input name="wd_pc_color_color" id="hex-color" class="wd_pc_colorpicker" data-default-color="<?php echo esc_attr($datas['wd_pc_color_color']);?>" type="text" value="<?php echo esc_attr($datas['wd_pc_color_color']);?>" size="40" aria-required="true">
					<span class="description"><?php esc_html_e( 'Use color picker to pick one color.', 'wd_package' ); ?></span>
				</td>
			</tr>

			<tr class="form-field">
				<th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail Image', 'wd_package' ); ?></label></th>
				<td>
					<input name="wd_pc_color_image" type="hidden" class="wd_pc_custom_image" value="<?php echo absint($datas['wd_pc_color_image']);?>" />
					<img style="padding-bottom:5px;" src="<?php echo esc_url( $_img ) ;?>" class="wd_pc_preview_image" /><br />
					<input class="wd_pc_upload_image_button button" type="button"  size="40" value="Choose Image" />
					<small>&nbsp;<a href="#" class="wd_pc_clear_image_button"><?php esc_html_e( 'Remove Image', 'wd_package' ); ?></a></small>
					<br clear="all" />		
					<span class="description"><?php esc_html_e( 'Choose one thumbnail.', 'wd_package' ); ?></span>
				</td>
			</tr>
				
		<?php
		}		
		
		public function find_media_thumbnail(){
			$thumbnail_id = absint($_POST['img_id']);
			$img_arr =  wp_get_attachment_image_src( $thumbnail_id, 'wd_small_thumbnail', true);
			echo $img_arr[0];
			die();
		}	
		
		public function show_msg(){
			global $_wd_msg;
		?>
		
			<div id="message" class="updated">
				<p><?php echo $_wd_msg;?></p>
			</div>
			
		<?php		
		}	
		
		public function wd_admin_enqueue_color_picker(  ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'wd-product.color.js', PC_JS.'/backend_product_color.js', array( 'wp-color-picker','jquery' ));
			wp_enqueue_style( 'wd-product.color.css', PC_CSS.'/backend_product_color.css');				
		}	

		public function wd_frontend_enqueue_color_picker(  ) {
			wp_enqueue_script( 'wd-product.color.js', PC_JS.'/frontend_product_color.js', array( 'jquery' ));
			wp_enqueue_style( 'wd-product.color.css', PC_CSS.'/frontend_product_color.css');				
		}	
		
		public function wd_pc_add_attribute(){
		?>
		
		<div class="form-field form-required">
			<label for="display_type"><?php esc_html_e( 'Color', 'wd_package' ); ?></label>
			<input name="wd_pc_color_color" id="hex-color" class="wd_pc_colorpicker" type="text" value="#aaaaaa" size="40" aria-required="true">
			<p><?php esc_html_e( 'Use color picker to pick one color.', 'wd_package' ); ?></p>
		</div>

		<div class="form-field">
			<label for="display_type"><?php esc_html_e( 'Thumbnail Image', 'wd_package' ); ?></label>
			<input name="wd_pc_color_image" type="hidden" class="wd_pc_custom_image" value="" />
			<img style="padding-bottom:5px;" src="" class="wd_pc_preview_image" /><br />
			<input class="wd_pc_upload_image_button button" type="button"  size="40" value="Choose Image" />
			<small>&nbsp;<a href="#" class="wd_pc_clear_image_button"><?php esc_html_e( 'Remove Image', 'wd_package' ); ?></a></small>
			<br clear="all" />		
			<p><?php esc_html_e( 'Choose one thumbnail.', 'wd_package' ); ?></p>
		</div>


		
		<?php
		}
		
		/******************* All Handle Function End *******************/
	}	
	add_action('woocommerce_init', 'wd_package_shop_by_color_load' );
	function wd_package_shop_by_color_load(){
		WD_Shopbycolor::get_instance();
	}
}
?>