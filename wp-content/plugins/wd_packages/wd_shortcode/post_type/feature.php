<?php
if ( ! class_exists( 'tvlgiao_wpdance_register_post_type_feature' ) ) {
	class tvlgiao_wpdance_register_post_type_feature {

		public function __construct() {
    		add_action('init', array($this, 'register_feature_post_type'));
			add_action('vc_before_init', array( $this, 'register_feature_taxonomy' ) );

			// Add meta box to feature post type
			add_action('admin_menu', array( $this,'wd_feature_add_meta_box' ) );	
			add_action('save_post', array($this,'wd_feature_save_data') , 1, 2);
		}

		public function register_feature_post_type(){
			if (!post_type_exists('wpdance_feature')) {
				$labels = array(
					'name' 					=> esc_html__( 'WD Features', 'wd_package' ),
					'singular_name' 		=> esc_html__( 'WD Feature', 'wd_package' ),
					'add_new' 				=> esc_html__( 'Add New', 'wd_package' ),
					'add_new_item' 			=> sprintf( __( 'Add New %s', 'wd_package' ), __( 'Feature', 'wd_package' ) ),
					'edit_item' 			=> sprintf( __( 'Edit %s', 'wd_package' ), __( 'Feature', 'wd_package' ) ),
					'new_item' 				=> sprintf( __( 'New %s', 'wd_package' ), __( 'Feature', 'wd_package' ) ),
					'all_items' 			=> sprintf( __( 'All %s', 'wd_package' ), __( 'Features', 'wd_package' ) ),
					'view_item' 			=> sprintf( __( 'View %s', 'wd_package' ), __( 'Feature', 'wd_package' ) ),
					'search_items' 			=> sprintf( __( 'Search %a', 'wd_package' ), __( 'Features', 'wd_package' ) ),
					'not_found' 			=>  sprintf( __( 'No %s Found', 'wd_package' ), __( 'Features', 'wd_package' ) ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s Found In Trash', 'wd_package' ), __( 'Features', 'wd_package' ) ),
					'parent_item_colon' 	=> '',
					'menu_name' 			=> __( 'WD Features', 'wd_package' )
				);
				$args = array(
					'exclude_from_search' 	=> true,
					'labels' 				=> $labels,
					'public'			 	=> true,
					'publicly_queryable' 	=> true,
					'show_ui' 				=> true,
					'query_var' 			=> true,
					'capability_type' 		=> 'post',
					'has_archive' 			=> false,
					'hierarchical' 			=> false,
					'supports' 				=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
					'menu_position' 		=> 27,
					'menu_icon' 			=> 'dashicons-star-filled'
				);
				register_post_type('wpdance_feature', $args);
			}
		}

		public function register_feature_taxonomy(){
			register_taxonomy( 'wpdance_feature_categories', 'wpdance_feature', array(
				'hierarchical'     		=> true,
				'labels'            	=> array(
					'name' 				=> esc_html__('Categories Feature', 'wd_package'),
					'singular_name' 	=> esc_html__('Categories Feature', 'wd_package'),
	            	'new_item'          => esc_html__('Add New', 'wd_package' ),
	            	'edit_item'         => esc_html__('Edit Post', 'wd_package' ),
	            	'view_item'   		=> esc_html__('View Post', 'wd_package' ),
	            	'add_new_item'      => esc_html__('Add New Category Feature', 'wd_package' ),
	            	'menu_name'         => esc_html__( 'Categories Feature' , 'wd_package' ),
				),
				'show_ui'           	=> true,
				'show_admin_column' 	=> true,
				'query_var'         	=> true,
				'rewrite'           	=> array( 'slug' => 'wpdance_feature_categories' ),				
				'public'				=> true,
			));
		}

		public function wd_feature_save_data($post_id, $post) {

			if ( ! isset( $_POST['wd_feature_box_nonce'] ) )
					return $post_id;
			// verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times
			if (!wp_verify_nonce($_POST['wd_feature_box_nonce'],'wd_feature_box'))
				return $post->ID;

			if (!current_user_can('edit_post', $post->ID))
				return $post->ID;

			// OK, we're authenticated: we need to find and save the data
			// Sanitize the user input.
			if('wpdance_feature' == $_POST['post_type']){
				if(isset($_POST['feature_url']))
					update_post_meta($post_id,'wd_feature_url',$_POST['feature_url']);		
				if(isset($_POST['feature_icon']))
					update_post_meta($post_id,'wd_feature_icon',$_POST['feature_icon']);
				if(isset($_POST['readmore_text']))
					update_post_meta($post_id,'wd_readmore_text',$_POST['readmore_text']);	
			}
			
		}

		public function wd_feature_add_meta_box() {
			if(post_type_exists('wpdance_feature')) {
				add_meta_box("wp_cp_custom_feature_meta_box", "Feature Setting", array($this,"wd_feature_meta_box"), "wpdance_feature", "normal", "high");
			}
		}

		public function wd_feature_meta_box(){
			global $post;
			wp_nonce_field( 'wd_feature_box', 'wd_feature_box_nonce' );
			?>
			<table class="form-table wd-feature-custom-meta-box wd-custom-meta-box-width">
				<tbody>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Class Icon Font:' , 'wd_package' ) ?></label></th>
						<td><input type="text" name="feature_icon" value="<?php echo get_post_meta($post->ID,'wd_feature_icon',true);?>"/>
							<p class="description"><?php echo sprintf(esc_html( 'Enter the class font. Exam: fa fa-heartbeat. view all at %s or %s' , 'wd_package' ), '<a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>', '<a href="https://linearicons.com/free" target="_blank">https://linearicons.com/free</a>') ; ?></p>
						</td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Feature URL:' , 'wd_package' ) ?></label></th>
						<td><input type="text" name="feature_url" value="<?php echo (get_post_meta($post->ID,'wd_feature_url',true)) ? get_post_meta($post->ID,'wd_feature_url',true) : '#';?>"/>
							<p class="description"><?php esc_html_e( 'Enter a URL that applies to this feature' , 'wd_package' ) ?></p>
						</td> 
					</tr>
					<tr>
						<th scope="row"><label><?php esc_html_e( 'Readmore Button Text:' , 'wd_package' ) ?></label></th>
						<td><input type="text" name="readmore_text" value="<?php echo (get_post_meta($post->ID,'wd_readmore_text',true)) ? get_post_meta($post->ID,'wd_readmore_text',true) : 'Read More'; ?>"/>
						</td> 
					</tr>
				</tbody>
			</table>
			<?php
		}
	}
	$tvlgiao_wpdance_register_post_type_feature = new tvlgiao_wpdance_register_post_type_feature();
}