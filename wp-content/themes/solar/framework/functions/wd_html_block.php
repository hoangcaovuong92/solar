<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
/*--------------------------------------------------------------*/
/*						 HTML BLOCK FUNCTIONS	 				*/
/*--------------------------------------------------------------*/

/**
 * Return HTML Headers array used for WP_Customize_Control select
 * $value_default : Url image defaul header.
 * Value return: Url Image or Name Header
 * @return array 
 */   

/* Get header/footer HTML Block choices */
if(!function_exists ('tvlgiao_wpdance_get_html_block_layout_choices')){
	function tvlgiao_wpdance_get_html_block_layout_choices($post_type, $value_default = '', $value_return = 'title') {
		//post_type: wpdance_header / wpdance_footer
		global $post;
		$pre_post 	= $post;
		$choices 	= ($value_default != '') ? array('' => $value_default) : array();
		$args = array(
			'post_type' 	=> $post_type,
			'posts_per_page'=> -1,
			'orderby' 		=> 'post_title',
			'order' 		=> 'ASC',
		);
		$html_block = new WP_Query( $args );

		while ($html_block->have_posts()) {
			$html_block->the_post();
			if($value_return == 'url_image'){
				$choices[get_the_ID()] = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
			}else{
				$choices[get_the_ID()] = get_the_title();
			}
		}
		
		wp_reset_postdata();
		$post 		= $pre_post;
		return $choices;
	}
}

/* Get ID of custom HEADER/FOOTER */
if (!function_exists('tvlgiao_wpdance_get_html_block_id')) {
	function tvlgiao_wpdance_get_html_block_id($choose = 'header') { 
		$meta_key 			= ($choose == 'header') ? '_tvlgiao_wpdance_custom_header' : '_tvlgiao_wpdance_custom_footer';
		$theme_option_key 	= ($choose == 'header') ? 'tvlgiao_wpdance_header_layout' : 'tvlgiao_wpdance_footer_layout';
		$theme_option_value = tvlgiao_wpdance_get_custom_data_by_keyname( $theme_option_key, $theme_option_key, '' );
		$object_id 			= (is_archive()) ? get_queried_object_id() : get_the_ID();
		$id_custom_header 	= (is_archive()) ? get_term_meta( $object_id, $meta_key, true ) : get_post_meta($object_id, $meta_key , true);

		if ((is_search() || !$object_id || !$id_custom_header) && !$theme_option_value)  return;

		$id = (!$id_custom_header || $id_custom_header == '-1') ? $theme_option_value : $id_custom_header;
		if ($id != '' && $id != '-1' && get_post($id)) {
			return $id;
		}else{
			return;
		}
	}
}

/* Get Header Object */
if (!function_exists('tvlgiao_wpdance_get_header_post')) {
	function tvlgiao_wpdance_get_header_post() { 
		$id 		= tvlgiao_wpdance_get_html_block_id('header');
		$post_obj 	= ($id) ? get_post($id) : '';
		return $post_obj;
	}
}

/* Get Header Content */
if (!function_exists('tvlgiao_wpdance_get_content_header')) {
	/**
	 * Return the content of HTML Block assigned to the Header
	 * @return string
	 */
	function tvlgiao_wpdance_get_content_header() {
		global $post;
		$pre_post = $post;
		if (!($cur_post = tvlgiao_wpdance_get_header_post()))
			return;
		$post 		= $cur_post;
		$content 	= apply_filters('the_content', $cur_post->post_content);
		$post 		= $pre_post;
		return $content;
	}
}

/* Include Header HTML to header hook */
add_action( 'tvlgiao_wpdance_header_init_action', 'tvlgiao_wpdance_header_init', 5 );
if(!function_exists ('tvlgiao_wpdance_header_init')){
	function tvlgiao_wpdance_header_init($wp_customize){
		$content_header 	= tvlgiao_wpdance_get_content_header();
		$class_id_config 	= tvlgiao_wpdance_get_custom_layout(tvlgiao_wpdance_get_html_block_id('header'));
		if(!(empty($content_header))){ ?>
			<div class="container">
				<div class="wd-content-header row <?php echo esc_attr( $class_id_config['custom_class'] ); ?>" id="<?php echo esc_attr( $class_id_config['custom_id'] ); ?>">
					<?php echo ($content_header); ?>
				</div>
			</div>
		<?php }else{
			if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_default.php")){
				require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_default.php";
			}	
		}
	}
}

add_action( 'tvlgiao_wpdance_header_mobile', 'tvlgiao_wpdance_content_header_mobile', 5 );
if(!function_exists ('tvlgiao_wpdance_content_header_mobile')){
	function tvlgiao_wpdance_content_header_mobile(){
		if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_mobile.php")){
			require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_mobile.php";
		}
	}
}	

/* Get Footer Object */
if (!function_exists('tvlgiao_wpdance_get_footer_post')) {
	function tvlgiao_wpdance_get_footer_post() { 
		$id 		= tvlgiao_wpdance_get_html_block_id('footer');
		$post_obj 	= ($id) ? get_post($id) : '';
		return $post_obj;
	}
}

/* Get Footer Content */
if (!function_exists('tvlgiao_wpdance_get_content_footer')) {
	function tvlgiao_wpdance_get_content_footer() {
		global $post;
		$pre_post = $post;
		$cur_post = tvlgiao_wpdance_get_footer_post();
		if (!($cur_post))
			return;
		$post 		= $cur_post;
		$content 	= apply_filters('the_content', $cur_post->post_content);
		$post 		= $pre_post;
		return $content;
	}
}

/* Include Footer HTML to footer hook */
add_action( 'tvlgiao_wpdance_footer_init_action', 'tvlgiao_wpdance_footer_init', 5 );
if(!function_exists ('tvlgiao_wpdance_footer_init')){
	function tvlgiao_wpdance_footer_init($wp_customize){
		$content_footer 	= tvlgiao_wpdance_get_content_footer();
		$class_id_config 	= tvlgiao_wpdance_get_custom_layout(tvlgiao_wpdance_get_html_block_id('footer'));
		if(!(empty($content_footer))){ ?>
			<div class="container">
				<div class="wd-content-footer row <?php echo esc_attr( $class_id_config['custom_class'] ); ?>" id="<?php echo esc_attr( $class_id_config['custom_id'] ); ?>">
					<?php echo $content_footer; ?>
				</div>
			</div>
		<?php }else{
			if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/footers/wd_footer_default.php")){
				require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/footers/wd_footer_default.php";
			}	
		}
	}
}

/* Get Custom CSS */
if (!function_exists('tvlgiao_wpdance_htmlblock_css')) {
	/**
	 * Function add custom CSS of HTML Block in the head element
	 *
	 * @param integer $post_id Post ID
	 * @return string CSS to add to the head tag
	 */
	function tvlgiao_wpdance_htmlblock_css($post_id) {
		$custom_css = '';
		/** code copied from Vc_Base::addPageCustomCss() */
		$post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
		if ( ! empty( $post_custom_css ) )
			$custom_css .= $post_custom_css;
		
		/** code copied from Vc_Base::addShortcodesCustomCss() */
		$shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
		if ( ! empty( $shortcodes_custom_css ) ) {
			$custom_css .= $shortcodes_custom_css;
		}
		
		return $custom_css;
	}
} 