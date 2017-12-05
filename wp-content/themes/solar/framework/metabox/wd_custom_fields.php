<?php 
if (!class_exists('Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields')) {
	class Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields extends Tvlgiao_Wpdance_Admin_Metaboxes {
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
			add_action("add_meta_boxes", array($this,"generate_customfields"));
			add_action('pre_post_update', array($this,'save_customfield'), 10, 2);
			$this->category_configuration();
		}
		public function generate_customfields(){
			$list_meta_box = array(
				//Post Blog
				array(
					'id' 		=> 'wp_cp_custom_post_layout',
					'title'		=> esc_html__("POST CONFIGURATION", 'solar'),
					'callback' 	=> array($this,"layout_configuration"),
					'page'		=> array('post'),
					'context'	=> 'side',
					'priority'	=> 'high',
				),
				//Page
				array(
					'id' 		=> 'wp_cp_custom_page_atts',
					'title'		=> esc_html__("PAGE CONFIGURATION", 'solar'),
					'callback' 	=> array($this, 'layout_configuration'),
					'page'		=> array('page'),
					'context'	=> 'side',
					'priority'	=> 'high',
				),
				//Product
				array(
					'id' 		=> 'wp_cp_custom_product_layout',
					'title'		=> esc_html__("PRODUCT CONFIGURATION", 'solar'),
					'callback' 	=> array($this,"layout_configuration"),
					'page'		=> array('product'),
					'context'	=> 'side',
					'priority'	=> 'high',
				),
				//HTML Block
				array(
					'id' 		=> 'wp_cp_custom_class_id_layout',
					'title'		=> esc_html__("CUSTOM CLASS/ID", 'solar'),
					'callback' 	=> array($this,"class_id_configuration"),
					'page'		=> array('wpdance_header', 'wpdance_footer'),
					'context'	=> 'side',
					'priority'	=> 'high',
				),
			);
			foreach ($list_meta_box as $meta_box) {
				add_meta_box($meta_box['id'], $meta_box['title'], $meta_box['callback'], $meta_box['page'], $meta_box['context'], $meta_box['priority']);
				foreach ($meta_box['page'] as $sceen) {
					add_filter( "postbox_classes_{$sceen}_{$meta_box['id']}", array($this,"meta_box_custom_class") );
				}
			}
		}
		public function class_id_configuration(){
			require_once TVLGIAO_WPDANCE_THEME_METABOX.'/metaboxes/wd_custom_class_id_config.php';
		}
		public function layout_configuration(){
			require_once TVLGIAO_WPDANCE_THEME_METABOX.'/metaboxes/wd_custom_layout_config.php';
		}
		public function category_configuration(){
			require_once TVLGIAO_WPDANCE_THEME_METABOX.'/metaboxes/wd_custom_category.php';
		}

		// Save Custom
		public function save_customfield($post_id){
			// Bail if we're doing an auto save
		    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		     
		    // if our nonce isn't there, or we can't verify it, bail
		    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
		     
		    // if our current user can't edit this post, bail
		    //if( !current_user_can( 'edit_post' ) ) return;
			/*--------------------------------------------------------------------------*/
			/*						 SAVE CUSTOM POST/PAGE/PRODUCT LAYOUT 				*/
			/*--------------------------------------------------------------------------*/		
			// Save post custom layout & sidebar and Media
			if (isset($_POST['wpdance_custom_header'])){
				update_post_meta($post_id, '_tvlgiao_wpdance_custom_header', intval($_POST['wpdance_custom_header']));
			}
			// Footer
			if (isset($_POST['wpdance_custom_footer'])){
				update_post_meta($post_id, '_tvlgiao_wpdance_custom_footer', intval($_POST['wpdance_custom_footer']));
			}

			$layout 			= isset($_POST['wpdance_custom_layout']) ? $_POST['wpdance_custom_layout'] : '';
			$left_sidebar 		= isset($_POST['wpdance_custom_left_sidebar']) ? $_POST['wpdance_custom_left_sidebar'] : '';
			$right_sidebar 		= isset($_POST['wpdance_custom_right_sidebar']) ? $_POST['wpdance_custom_right_sidebar'] : '';
			$style_breadcrumb 	= isset($_POST['wpdance_custom_breadcrumb_style']) ? $_POST['wpdance_custom_breadcrumb_style'] : '';
			$image_breadcrumb 	= isset($_POST['wpdance_custom_breadcrumb_image']) ? $_POST['wpdance_custom_breadcrumb_image'] : '';
			$custom_class 		= isset($_POST['wpdance_custom_class']) ? $_POST['wpdance_custom_class'] : '';
			$custom_id 			= isset($_POST['wpdance_custom_id']) ? $_POST['wpdance_custom_id'] : '';

			$_layout_config = array(
				'layout' 				=> $layout,
				'left_sidebar' 			=> $left_sidebar,
				'right_sidebar' 		=> $right_sidebar,
				'style_breadcrumb'		=> $style_breadcrumb,
				'image_breadcrumb'		=> $image_breadcrumb,
				'custom_class'			=> $custom_class,
				'custom_id'				=> $custom_id,
			);
			$ret_str = serialize($_layout_config);
			update_post_meta($post_id,'_tvlgiao_wpdance_custom_layout_config',$ret_str);	
		}

		static function get_header($html_header = '', $selected = 0){
			$html_header = (is_array($html_header)) ? $html_header : tvlgiao_wpdance_get_html_block_layout_choices('wpdance_header',__('Select Header', 'solar'),'name'); ?>

			<div id="wpdance_custom_header_wrap">
				<p><strong><?php esc_html_e('Custom Header: ', 'solar') ?></strong></p>
				<select name="wpdance_custom_header" id="wpdance_custom_header">
					<?php foreach ($html_header as $id => $title): ?>
						<?php $selected_html = selected($selected, $id, false); ?>
						<option value="<?php echo esc_html($id) ?>" <?php echo esc_attr($selected_html) ?>><?php echo esc_html($title) ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<?php 
		}

		static function get_footer($html_footer = '', $selected = 0){
			$html_footer = (is_array($html_footer)) ? $html_footer : tvlgiao_wpdance_get_html_block_layout_choices('wpdance_footer',__('Select Footer', 'solar'),'name'); ?>

			<div id="wpdance_custom_footer_wrap">
				<p><strong><?php esc_html_e('Custom Footer: ', 'solar') ?></strong></p>
				<select name="wpdance_custom_footer" id="wpdance_custom_footer">
					<?php foreach ($html_footer as $id => $title): ?>
						<?php $selected_html = selected($selected, $id, false); ?>
						<option value="<?php echo esc_html($id) ?>" <?php echo esc_attr($selected_html) ?>><?php echo esc_html($title) ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<?php 
		}

		static function get_layout($selected = 0){
			$layout = array(
				'0'			=> esc_html__('Default','solar'),
				'0-0-0'		=> esc_html__('Fullwidth','solar'),
				'1-0-0'		=> esc_html__('Left Sidebar','solar'),
				'0-0-1'		=> esc_html__('Right Sidebar','solar'),
				'1-0-1'		=> esc_html__('Left & Right Sidebar','solar'),
			); ?>

			<div id="wpdance_custom_layout_wrap">
				<p><strong><?php esc_html_e('Layout:','solar'); ?></strong></p>
				<select name="wpdance_custom_layout" id="wpdance_custom_layout">
					<?php foreach ($layout as $id => $title): ?>
						<?php $selected_html = selected($selected, $id, false); ?>
						<option value="<?php echo esc_html($id) ?>" <?php echo esc_attr($selected_html) ?>><?php echo esc_html($title) ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<?php 
		}

		static function get_sidebar($position = 'left', $selected = 'sidebar'){
			$sidebar = tvlgiao_wpdance_get_list_sidebar_choices(); ?>
			
			<?php if ($position == 'left'): ?>
				<div id="wpdance_custom_left_sidebar_wrap">
					<p><strong><?php esc_html_e('Left Sidebar:','solar'); ?></strong></p>
					<select name="wpdance_custom_left_sidebar" id="wpdance_custom_left_sidebar">
						<?php foreach ($sidebar as $id => $title): ?>
							<?php $selected_html = selected($selected, $id, false); ?>
							<option value="<?php echo esc_html($id) ?>" <?php echo esc_attr($selected_html) ?>><?php echo esc_html($title) ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			<?php else: ?>
				<div id="wpdance_custom_right_sidebar_wrap">
					<p><strong><?php esc_html_e('Right Sidebar:','solar'); ?></strong></p>
					<select name="wpdance_custom_right_sidebar" id="wpdance_custom_right_sidebar">
						<?php foreach ($sidebar as $id => $title): ?>
							<?php $selected_html = selected($selected, $id, false); ?>
							<option value="<?php echo esc_html($id) ?>" <?php echo esc_attr($selected_html) ?>><?php echo esc_html($title) ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			<?php endif ?>
			<?php 
		}

		static function get_breadcrumb_style($selected = 'breadcrumb_default'){
			$breadcrumb_style = array(
				'breadcrumb_default'	=> esc_html__('Default (Customize)','solar'),
				'breadcrumb_banner'		=> esc_html__('Background Image','solar'),
				'no_breadcrumb'			=> esc_html__('No Breadcrumb','solar'),
			); ?>
			
			<div id="wpdance_custom_breadcrumb_style_wrap">
				<p><strong><?php esc_html_e('Breadcrumb Style:','solar'); ?></strong></p>
				<select name="wpdance_custom_breadcrumb_style" id="wpdance_custom_breadcrumb_style">
					<?php foreach ($breadcrumb_style as $id => $title): ?>
						<?php $selected_html = selected($selected, $id, false); ?>
						<option value="<?php echo esc_html($id) ?>" <?php echo esc_attr($selected_html) ?>><?php echo esc_html($title) ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<?php 
		}

		static function get_breadcrumb_image($selected = '', $default = ''){ ?>
			<div id="wpdance_custom_breadcrumb_image_wrap">
				<p><strong><?php esc_html_e('Image Breadcrumb:','solar'); ?></strong></p>
				<p> 
					<img id="wpdance_custom_breadcrumb_image_view" src="<?php echo ($selected && is_numeric($selected)) ? esc_url(wp_get_attachment_url($selected)) : $default; ?>"  width="100%" />
					<input type="hidden" name="wpdance_custom_breadcrumb_image" id="wpdance_custom_breadcrumb_image" value="<?php echo ($selected && is_numeric($selected)) ? esc_attr($selected ) : ''; ?>" />

					<a 	class="wd_media_lib_select_btn button button-primary button-large" 
						data-image_value="wpdance_custom_breadcrumb_image" 
						data-image_preview="wpdance_custom_breadcrumb_image_view"><?php esc_html_e('Select Image','solar'); ?></a>

					<a 	class="wd_media_lib_clear_btn button" 
						data-image_value="wpdance_custom_breadcrumb_image" 
						data-image_preview="wpdance_custom_breadcrumb_image_view" 
						data-image_default="<?php echo esc_url($default); ?>"><?php esc_html_e('Reset','solar'); ?></a>
				</p>
			</div>
			<?php 
		}


		static function get_breadcrumb_color($selected = '', $default = ''){ ?>
			<div id="wpdance_custom_breadcrumb_color_wrap">
				<p><strong><?php esc_html_e('Color Breadcrumb:','solar'); ?></strong></p>
				<p> 
					<input type="text" class="wd_colorpicker_select" name="wd_breadcrumb_background_color" id="wd_breadcrumb_background_color"  value="<?php echo ($selected) ? $selected : $default; ?>"/>
				</p>
			</div>
			<?php 
		}

		static function get_custom_class($selected = '', $custom_class = ''){ ?>
			<div id="wpdance_custom_class_wrap" class="<?php echo esc_attr( $custom_class ); ?>">
				<p><strong><?php esc_html_e('Custom Classes:','solar'); ?></strong></p>
				<p><input type="text" name="wpdance_custom_class" id="wpdance_custom_class" value="<?php echo $selected; ?>" /></p>
			</div>
			<?php 
		}

		static function get_custom_id($selected = '', $custom_class = ''){ ?>
			<div id="wpdance_custom_id_wrap" class="<?php echo esc_attr( $custom_class ); ?>">
				<p><strong><?php esc_html_e('Custom ID:','solar'); ?></strong></p>
				<p><input type="text" name="wpdance_custom_id" id="wpdance_custom_id" value="<?php echo $selected; ?>" /></p>
			</div>
			<?php 
		}

		//Add class closed to metabox
		public function meta_box_custom_class( $classes ) {
			array_push( $classes, 'closed' );
			return $classes;
		}
	}
	Tvlgiao_Wpdance_Admin_Metaboxes_CustomFields::get_instance();
} ?>