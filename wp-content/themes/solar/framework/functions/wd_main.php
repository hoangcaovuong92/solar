<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */

/*---------------------------------------------------------------------------*/
/*								MAIN FUNCTION 								 */
/*---------------------------------------------------------------------------*/
// HTML before main content
add_action('tvlgiao_wpdance_before_main_content','tvlgiao_wpdance_content_before_main_content',10);
if(!function_exists ('tvlgiao_wpdance_content_before_main_content')){
	function tvlgiao_wpdance_content_before_main_content(){ ?>
		<?php $woo_class = (tvlgiao_wpdance_is_woocommerce()) ? 'woocommerce' : ''; ?>
		<div id="main-content" class="main-content <?php echo esc_attr( $woo_class ); ?>">
			<div class="container">
				<div class="row">
	<?php 
	}
}

// HTML after main content
add_action('tvlgiao_wpdance_after_main_content','tvlgiao_wpdance_content_after_main_content',10);
if(!function_exists ('tvlgiao_wpdance_content_after_main_content')){
	function tvlgiao_wpdance_content_after_main_content(){ ?>
				</div><!-- End row -->
			</div><!-- End container -->
		</div><!-- End main-content -->
	<?php 
	}
}

// Get global data
if(!function_exists ('tvlgiao_wpdance_get_post_by_global')){
	function tvlgiao_wpdance_get_post_by_global(){
		global $post;
		if ($post) {
			return $post->ID;
		}
	}
}

// Slider Control HTML for owl carosel slider
if(!function_exists ('tvlgiao_wpdance_related_slider_control')){
	function tvlgiao_wpdance_related_slider_control() {
		ob_start(); ?>
		<div class="related_control">
			<a id="product_related_prev" data-toggle="tooltip" title="<?php esc_html_e('Previous','laparis');?>" class="prev" href="#"><span class="lnr lnr-chevron-left"></span></a>
			<a id="product_related_next" data-toggle="tooltip" title="<?php esc_html_e('Next','laparis');?>" class="next" href="#"><span class="lnr lnr-chevron-right"></span></a>
    	</div> 
    	<?php
    	return ob_get_clean();
	}
}

// Get custom layout settings
if(!function_exists ('tvlgiao_wpdance_get_custom_layout')){
	function tvlgiao_wpdance_get_custom_layout($post_id) {
		$default_breadcrumb_img = TVLGIAO_WPDANCE_THEME_IMAGES.'/banner_breadcrumb.jpg';
		//Config Page
		$_layout_config 		= get_post_meta($post_id,'_tvlgiao_wpdance_custom_layout_config',true);

		$_default_layout_config = array(
				'layout' 					=> '0',
				'left_sidebar' 				=> 'sidebar',
				'right_sidebar' 			=> 'right_sidebar',
				'style_breadcrumb'			=> '0',
				'image_breadcrumb'			=> $default_breadcrumb_img,			
				'custom_class'				=> '',		
				'custom_id'					=> '',		
		);
		
		if( $_layout_config != '' ){
			$_layout_config = unserialize($_layout_config);
			foreach ($_default_layout_config as $key => $value) {
				$_layout_config[$key] 	= ( isset($_layout_config[$key]) && strlen($_layout_config[$key]) > 0 ) ? $_layout_config[$key] : $_default_layout_config[$key];
			}
		}else{
			$_layout_config = $_default_layout_config;
		}
		return $_layout_config;
	}
}

// Get custom content taxonomy / category
if(!function_exists ('tvlgiao_wpdance_get_taxonomy_custom_content')){
	function tvlgiao_wpdance_get_taxonomy_custom_content(){
		$custom_data 	= array();
		if (!is_archive() || !get_queried_object_id()) return array();

		$term_meta 		= get_term_meta( get_queried_object_id() );
		if (isset($term_meta['custom_layout']) && $term_meta['custom_layout'][0] != '0') {
			$custom_data['layout'] 	= $term_meta['custom_layout'][0];
		}
		if (isset($term_meta['custom_content']) && $term_meta['custom_content'][0] != '') {
			$custom_data['custom_content'] 	= $term_meta['custom_content'][0];
		}
		return $custom_data;
	}
}

// Get list sidebar
if(!function_exists ('tvlgiao_wpdance_get_list_sidebar_choices')){
	function tvlgiao_wpdance_get_list_sidebar_choices($value_default = '') {
		global $wp_registered_sidebars;
  		$arr_sidebar = ($value_default != '') ? array('0' => $value_default) : array();
  		if (count($wp_registered_sidebars) > 0) {
  			foreach ( $wp_registered_sidebars as $sidebar ){
	  			$arr_sidebar[$sidebar['id']] = $sidebar['name'];
	  		}
  		}
  		return $arr_sidebar;
	}
}

// Tablet and mobile device detection
// Source : https://mobiforge.com/design-development/tablet-and-mobile-device-detection-php
if(!function_exists ('tvlgiao_wpdance_is_mobile_or_tablet')){
	function tvlgiao_wpdance_is_mobile_or_tablet() {
		$tablet_browser = 0;
		$mobile_browser = 0;
		
		if (wp_is_mobile()) {
			$mobile_browser++;
		}

		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
		    $tablet_browser++;
		}
		 
		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
		    $mobile_browser++;
		}
		 
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
		    $mobile_browser++;
		}
		 
		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		$mobile_agents = array(
		    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		    'newt','noki','palm','pana','pant','phil','play','port','prox',
		    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		    'wapr','webc','winw','winw','xda ','xda-');
		 
		if (in_array($mobile_ua,$mobile_agents)) {
		    $mobile_browser++;
		}
		 
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
		    $mobile_browser++;
		    //Check for tablets on opera mini alternative headers
		    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
		    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
		      	$tablet_browser++;
		    }
		}

		if ($tablet_browser > 0 || $mobile_browser > 0) {
		   return true;
		}else {
		   return false;
		}  
	}
}

// Check Woo
if( !function_exists('tvlgiao_wpdance_is_woocommerce') ){
	function tvlgiao_wpdance_is_woocommerce(){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		return ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) ? false : true;
	} 
}

if( !function_exists('tvlgiao_wpdance_is_visual_composer') ){
	function tvlgiao_wpdance_is_visual_composer(){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		return ( !in_array( "js_composer/js_composer.php", $_actived ) ) ? false : true;
	} 
}

// Minify CSS
if ( ! function_exists( 'tvlgiao_wpdance_minify_css' ) ) {
	function tvlgiao_wpdance_minify_css( $content ) {
	    $content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);
	    $content = str_replace(["\r\n","\r","\n","\t",'  ','    ','     '], '', $content);
	    $content = preg_replace(['(( )+{)','({( )+)'], '{', $content);
	    $content = preg_replace(['(( )+})','(}( )+)','(;( )*})'], '}', $content);
	    $content = preg_replace(['(;( )+)','(( )+;)'], ';', $content);
	    return $content;
	}
}

// Minify JS
if ( ! function_exists( 'tvlgiao_wpdance_minify_js' ) ) {
	function tvlgiao_wpdance_minify_js( $content ) {
	    $content = preg_replace("/((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:\/\/.*))/", "", $content);
	    $content = str_replace(["\r\n","\r","\t","\n",'  ','    ','     '], '', $content);
	    $content = preg_replace(['(( )+\))','(\)( )+)'], ')', $content);
	    return $content;
	}
}

/* Get array post name (autocomplete search) */
if(!function_exists ('tvlgiao_wpdance_get_array_post_name')){
	function tvlgiao_wpdance_get_array_post_name($post_type = 'post', $json = true, $ppp = -1){ 
		$args 			= array(
			'post_type'			=> $post_type,
			'posts_per_page'	=> $ppp,
		);
		$post_name 		= array();
		$posts_array 	= get_posts( $args );
		if (count($posts_array) > 0) {
			foreach ($posts_array as $post) {
				$post_name[] = addslashes($post->post_title);
			}
		}
		return ($json) ? json_encode($post_name) : $post_name;
	}
}  

/* Get current URL */
if(!function_exists ('tvlgiao_wpdance_get_current_url')){
	function tvlgiao_wpdance_get_current_url(){ 
		$current_url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$current_url = htmlspecialchars( $current_url, ENT_QUOTES, 'UTF-8' );
		$current_url = explode('?', $current_url);
		return $current_url[0];
	}
} 

?>