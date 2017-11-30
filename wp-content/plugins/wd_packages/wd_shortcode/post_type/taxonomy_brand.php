<?php
if ( ! class_exists( 'tvlgiao_wpdance_register_woo_brand_taxonomy' ) ) {
	class tvlgiao_wpdance_register_woo_brand_taxonomy {

		public function __construct() {
    		add_action('vc_before_init', array( $this, 'register_brand_taxonomy' ) );
    		//Add column to taxonomy Term
    		add_filter('manage_edit-wpdance_product_brand_columns', array ( $this, 'add_wpdance_product_brand_columns' ));
			add_filter('manage_wpdance_product_brand_custom_column', array ( $this, 'add_wpdance_product_brand_column_content' ), 10, 3);

		 	add_action( 'wpdance_product_brand_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
		 	add_action( 'created_wpdance_product_brand', array ( $this, 'save_category_image' ), 10, 2 );
		 	add_action( 'wpdance_product_brand_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
		 	add_action( 'edited_wpdance_product_brand', array ( $this, 'updated_category_image' ), 10, 2 );
		 	add_action( 'admin_enqueue_scripts', array ( $this, 'add_script' ) );
		}

		public function register_brand_taxonomy(){
			register_taxonomy( 'wpdance_product_brand', 'product', array(
				'hierarchical'     		=> true,
				'labels'            	=> array(
					'name' 				=> esc_html__('Brands', 'wpdancelaparis'),
					'singular_name' 	=> esc_html__('Brand', 'wpdancelaparis'),
		        	'new_item'          => esc_html__('Add New', 'wpdancelaparis' ),
		        	'edit_item'         => esc_html__('Edit Post', 'wpdancelaparis' ),
		        	'view_item'   		=> esc_html__('View Post', 'wpdancelaparis' ),
		        	'add_new_item'      => esc_html__('Add New Brand', 'wpdancelaparis' ),
		        	'menu_name'         => esc_html__( 'Brands' , 'wpdancelaparis' ),
				),
				'show_ui'           	=> true,
				'show_admin_column' 	=> true,
				'query_var'         	=> true,
				'rewrite'           	=> array( 'slug' => 'wpdance_product_brand' ),				
				'public'				=> true,
			));	
		}
		 
		public function add_wpdance_product_brand_columns($columns){
		    $new_columns = array();
			$new_columns['cb'] = $columns['cb'];
			$new_columns['logo'] = __( 'Logo', 'wpdancelaparis' );

			unset( $columns['cb'] );

			return array_merge( $new_columns, $columns );
		}

		public function add_wpdance_product_brand_column_content( $content, $column_name, $term_id ){
		    if ( 'logo' == $column_name ) {
		    	$image_id = get_term_meta( $term_id, 'category-image-id', true );
		        $content = '<div class="wd-logo-brand">';
		        $content .= '<img style=" max-width: 100%; height: auto;" src="'.wp_get_attachment_image_url($image_id, 'thumbnail', true).'" alt="Logo Brand">';
		        $content .= '</div>';
		    }
			return $content;
		}
		
		 /*
		  * Add a form field in the new category page
		  * @since 1.0.0
		 */
		public function add_category_image ( $taxonomy ) { ?>
			<div class="form-field term-group">
			 	<label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
			 	<input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
			 	<div id="category-image-wrapper"></div>
			 	<p>
			 		<input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
			 		<input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
			 	</p>
			</div>
			<?php
		}

		 /*
		  * Save the form field
		  * @since 1.0.0
		 */
		public function save_category_image ( $term_id, $tt_id ) {
		 	if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
		 		$image = $_POST['category-image-id'];
		 		add_term_meta( $term_id, 'category-image-id', $image, true );
		 	}
		 }
		 
		 /*
		  * Edit the form field
		  * @since 1.0.0
		 */
		public function update_category_image ( $term, $taxonomy ) { ?>
		 <tr class="form-field term-group-wrap">
		 	<th scope="row">
		 		<label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
		 	</th>
		 	<td>
		 		<?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
		 		<input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
		 		<div id="category-image-wrapper">
		 			<?php if ( $image_id ) { ?>
		 			<?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
		 			<?php } ?>
		 		</div>
		 		<p>
		 			<input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
		 			<input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		 		</p>
		 	</td>
		 </tr>
		 <?php
		}

		/*
		 * Update the form field value
		 * @since 1.0.0
		 */
		public function updated_category_image ( $term_id, $tt_id ) {
			if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
				$image = $_POST['category-image-id'];
				update_term_meta ( $term_id, 'category-image-id', $image );
			} else {
				update_term_meta ( $term_id, 'category-image-id', '' );
			}
		}

		/*
		 * Add script
		 * @since 1.0.0
		 */
		public function add_script($hook) { 
			if ($hook == 'edit-tags.php') { 
				wp_enqueue_script( 'wd-taxonomy-brand-script', 	SC_POST_TYPE_JS.'/taxonomy_brand_script.js', array('jquery'), false, true);
			}
		}
	}
	$tvlgiao_wpdance_register_woo_brand_taxonomy = new tvlgiao_wpdance_register_woo_brand_taxonomy();
}