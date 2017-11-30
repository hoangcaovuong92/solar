<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
/******************ENQUEUE STYLE*******************/
/* Enqueue Custom Style */
add_action( 'wp_enqueue_scripts', 'tvlgiao_wpdance_customize_set_custom_css' , 10000);

if(!function_exists ('tvlgiao_wpdance_customize_set_custom_css')){
	function tvlgiao_wpdance_customize_set_custom_css(){
		/* Breadcrumb */
		$custom_style = tvlgiao_wpdance_breadcrumb_style();
		/* 404 page */
		$custom_style .= tvlgiao_wpdance_404_page_style();
		/* Search page */
		$custom_style .= tvlgiao_wpdance_search_page_style();
		/* Font Custom from XML File */
		$custom_style .= tvlgiao_wpdance_get_custom_style_from_xml_font_file();
		/* Back To Top Button */
		$custom_style .= tvlgiao_wpdance_back_to_top_button_style();
		/* Background Css */
		$custom_style .= tvlgiao_wpdance_background_style();
		/* Color Custom from XML File or Request */
		$custom_style .= tvlgiao_wpdance_get_custom_style_from_xml_color_file();
		/* Style from HTML Block */
		$custom_style .= tvlgiao_wpdance_htmlblock_vc_styles();
		/* Style Facebook Chatbox */
		$custom_style .= tvlgiao_wpdance_facebook_chatbox_style();
		/* Custom Css from Theme Option */
		//$custom_style .= tvlgiao_wpdance_get_custom_style_from_theme_option();
		
		$custom_script = 'jQuery(window).ready(function($) {';
		/* Custom Script */
		$custom_script .= tvlgiao_wpdance_get_custom_script();
		/* Product effect */
		$custom_script .= tvlgiao_wpdance_product_effect_script();
		/* Script Facebook Chatbox */
		$custom_script .= tvlgiao_wpdance_accessibility_script();
		/* Script from Theme Option */
		$custom_script .= tvlgiao_wpdance_get_custom_script_from_theme_option();
		$custom_script .= '})';

		
		/******************ENQUEUE STYLE*******************/
		wp_add_inline_style( 'wd-custom-style-inline-css', tvlgiao_wpdance_minify_css($custom_style) );

		/******************ENQUEUE SCRIPT*******************/
		wp_add_inline_script( 'wd-custom-script-inline-js', tvlgiao_wpdance_minify_js($custom_script) );
	}
}

/* Get custom css breadcrumb */
if(!function_exists ('tvlgiao_wpdance_breadcrumb_style')){
	function tvlgiao_wpdance_breadcrumb_style(){
		/**
	     * package: breadcrumb-custom-setting
		 * var: blog_archive
		 * var: product_archive
		 * var: woo_special_page
		 * var: search_page
		 */
		extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-custom-setting' ));

		/**
	     * package: breadcrumb-blog-archive, breadcrumb-product-archive, breadcrumb-woo-special-page, breadcrumb-search-page, breadcrumb-default
		 * var: layout_breadcrumbs
		 * var: image_breadcrumbs
		 * var: height
		 * var: color_breadcrumbs
		 * var: text_color
		 * var: text_style
		 * var: text_align
		 */
		if (is_post_type_archive( 'post' ) && $blog_archive) { 
			//breadcrumb for blog archive
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-blog-archive' ));
		}elseif ( class_exists('WooCommerce') && (is_shop() || is_product_taxonomy() || is_product_category()) && $product_archive ) { 
			//breadcrumb for shop archive
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-product-archive' ));
		}elseif (class_exists('WooCommerce') &&  (is_checkout() || is_cart()) && $woo_special_page) {
			//breadcrumb for woocommerce special page (cart, checkout)
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-woo-special-page' ));
		}elseif (is_search() && $search_page) {
			//breadcrumb search page
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-search-page' ));
		}else{
			//breadcrumb general
			extract(tvlgiao_wpdance_get_data_package( 'breadcrumb-default' ));
		}
		
		$post_ID		= tvlgiao_wpdance_get_post_by_global();
		/*PAGE CONFIG*/
		$_page_config 	= tvlgiao_wpdance_get_custom_layout($post_ID);

		$default_image_breadcrumb = TVLGIAO_WPDANCE_THEME_IMAGES.'/banner_breadcrumb.jpg';
		if ($image_breadcrumbs != $default_image_breadcrumb && strpos($image_breadcrumbs, home_url()) === false) {
		   	$image_breadcrumbs = $default_image_breadcrumb;
		}
		
		$custom_page_breadcrumb_setting = (!empty($_page_config['style_breadcrumb'])) ? $_page_config['style_breadcrumb'] : 'breadcrumb_default' ;

		/* Custom Breadcrumb */
		if ($custom_page_breadcrumb_setting != 'breadcrumb_default') {
			$layout_breadcrumbs = $custom_page_breadcrumb_setting;
			$image_breadcrumbs = !empty($_page_config['image_breadcrumb']) ? esc_url(wp_get_attachment_url($_page_config['image_breadcrumb'])) : esc_url($default_image_breadcrumb);
		} 

		$custom_style_breadcrumb = "";
		if ($layout_breadcrumbs == 'no_breadcrumb') {
			$custom_style_breadcrumb .= '.wd-init-breadcrumb{display:none !important;}'; //hide breadcrumb
		}else{
			$custom_style_breadcrumb .= '.wd-init-breadcrumb, .wd-init-breadcrumb h3, .wd-init-breadcrumb a, .wd-init-breadcrumb .woocommerce-breadcrumb{color:'.esc_attr($text_color).' !important;}'; //text color

			$custom_style_breadcrumb .= '.wd-init-breadcrumb, .wd-init-breadcrumb .container{height:'.esc_attr($height).'px !important;}'; //height

			if ($text_style == 'block') { //content center for breadcrumb block
				$custom_style_breadcrumb .= '.wd-init-breadcrumb, .wd-init-breadcrumb .wd-breadcrumb-content{height:'.esc_attr($height).'px !important;}'; //height
				$custom_style_breadcrumb .= '.wd-init-breadcrumb .wd-breadcrumb-content{display: flex; flex-direction: column; justify-content: center;}'; //content align middle
			}else{ //content center for breadcrumb inline
				$custom_style_breadcrumb .= '.wd-init-breadcrumb, .wd-init-breadcrumb .container{height:'.esc_attr($height).'px !important;}'; //height
				$custom_style_breadcrumb .= '.wd-init-breadcrumb .wd-breadcrumb-text-style-inline, .wd-init-breadcrumb .wd-breadcrumb-text-style-inline .wd-breadcrumb-title, .wd-init-breadcrumb .wd-breadcrumb-text-style-inline .wd-breadcrumb-slug{line-height:'.esc_attr($height).'px !important;}'; //content align middle
			}

			if ($layout_breadcrumbs == 'breadcrumb_banner' && $image_breadcrumbs != '') {
				$custom_style_breadcrumb .= '.wd-init-breadcrumb.breadcrumb_banner { background-image: url("'.esc_url($image_breadcrumbs).'"); }'; //background image
			}elseif ($layout_breadcrumbs == 'breadcrumb_default') {
				$custom_style_breadcrumb .= '.wd-init-breadcrumb.breadcrumb_default { background-color: '.esc_attr($color_breadcrumbs).'; }'; //background color
			}
		}
		return $custom_style_breadcrumb;
	}
}

/** Get custom background css */
if (!function_exists('tvlgiao_wpdance_background_style')) { 
	function tvlgiao_wpdance_background_style() {
		/**
	     * package: background
		 * var: bg_display
		 * var: bg_image
		 */
		extract(tvlgiao_wpdance_get_data_package( 'background' ));
		$custom_css 	= '';
		if ($bg_display && isset($bg_config) && !empty($bg_config['background-image'])) {
			$custom_css 	.= 'html body {';
			$custom_css 	.= 'background-image: url("'.esc_url($bg_config['background-image']).'");';
			$custom_css 	.= 'background-repeat: '.esc_attr($bg_config['background-repeat']).';';
			$custom_css 	.= 'background-attachment: '.esc_attr($bg_config['background-attachment']).';';
			$custom_css 	.= 'background-position: '.esc_attr($bg_config['background-position']).';';
			$custom_css 	.= 'background-size: 100%;';
			$custom_css 	.= '}';
		}
		return $custom_css;
	}
}

/** Get custom facebook chatbox css */
if (!function_exists('tvlgiao_wpdance_facebook_chatbox_style')) { 
	function tvlgiao_wpdance_facebook_chatbox_style() {
		/**
	     * package: facebook-chatbox
		 * var: chatbox_status
		 * var: url
		 * var: width
		 * var: height
		 * var: right
		 * var: bottom
		 * var: default_mode
		 * var: bg_color
		 * var: logo
		 * var: text_footer
		 * var: link_caption
		 * var: link_url
		 */
		extract(tvlgiao_wpdance_get_data_package( 'facebook-chatbox' )); 
		$custom_css 	= '';
		if ($chatbox_status) {
			ob_start(); ?>
			<style>
			    .wd-facebook-chatbox-wrap{position:fixed; z-index:99; right:<?php echo $right; ?>; bottom:<?php echo $bottom; ?>; width:<?php echo $width; ?>; height:<?php echo $height; ?>; overflow:unset!important}
			    .wd-facebook-chatbox-close-btn{background:rgba(78,86,101,.8); font-size:12px; font-weight:700; color:#fff; display:inline-block; height:25px; line-height:25px; position:absolute; right:2px; text-align:center; top:-19px; width:25px; z-index:100}
			    .wd-facebook-chatbox-close-btn:hover{cursor:pointer}
			    .wd-facebook-chatbox-permarlink-wrap{text-align:left; height:20px; margin-bottom:0; margin-top:0; background:echo; width:100%; bottom:0; display:block; left:0; position:absolute; z-index:99; border-left:1px solid #fff}
			    .wd-facebook-chatbox-permarlink-wrap a.wd-facebook-chatbox-permarlink{color:#fff; font-size:12px; line-height:23px; padding-left:5px; text-decoration:none}
			    .wd-facebook-chatbox-permarlink-wrap a.wd-facebook-chatbox-permarlink:hover{text-decoration:underline}
			    .wd-facebook-chatbox-logo{position:absolute; bottom:0; right:0; z-index:99; width:40px; height:20px; display:inline-block; background:echo; padding-right:0; padding-left:5px}
			    .wd-facebook-chatbox-logo img{vertical-align:unset; height:14px; padding-right:3px}
			    .wd-facebook-chatbox-footer{cursor:pointer; position:fixed; width:<?php echo $width; ?>; background:echo; z-index:99; right:<?php echo $right; ?>; bottom:<?php echo $bottom; ?>; border-style:solid solid none; border-width:2px 2px 0; border-color:#fff; border-radius:8px 8px 0 0!important; -moz-border-radius:8px 8px 0 0!important; -webkit-border-radius:8px 8px 0 0!important}
			    .wd-facebook-chatbox-footer .wd-facebook-chatbox-footer-content{color:#fff; font-size:13px; margin:0; padding:0 13px; text-align:left}
			    .wd-facebook-chatbox-footer .wd-facebook-chatbox-footer-content a{color:#fff; font-size:13px; padding:5px 0 7px; margin:0; display:inline-block; text-decoration:none}
			    .wd-facebook-chatbox-footer .wd-facebook-chatbox-footer-text{margin-left:5px}
			    .wd-facebook-chatbox-footer .wd-facebook-chatbox-footer-content a:hover{text-decoration:underline; cursor:pointer}
			    .wd-facebook-chatbox-footer .wd-facebook-chatbox-footer-content>i{float:right; margin-top:13px}
			    .wd-facebook-chatbox-content{position:relative; z-index:99; right:0; bottom:21px; border-left:1px solid #fff; border-top:1px solid #fff}
			</style>
			<?php
			$custom_css = str_replace( array( '<style>', '</style>' ), '', ob_get_clean() );
		}
		return $custom_css;
	}
}

/* Get custom css 404 Page */
if(!function_exists ('tvlgiao_wpdance_404_page_style')){
	function tvlgiao_wpdance_404_page_style(){
		/**
	     * package: 404
		 * var: select_style
		 * var: bg_404_url
		 * var: bg_404_color
		 * var: show_search_form
		 * var: show_back_to_home_btn
		 * var: back_to_home_btn_text
		 * var: back_to_home_btn_class
		 * var: show_header_footer
		 * var: content_shortcode
		 */
		extract(tvlgiao_wpdance_get_data_package( '404' ));
		$custom_style_404_page = '';
		if($select_style == 'bg_image'){
			$default_url_404 		= TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg';
			if ($bg_404_url != $default_url_404 && strpos($bg_404_url, home_url()) === false) {
			   	$bg_404_url 	= $default_url_404;
			}
			$custom_style_404_page 	.= '.wd-404-error { 
					background-image: url("'.esc_url($bg_404_url).'"); 
					background-attachment: fixed; 
					background-position: center;
				}';
			$custom_style_404_page 	.= '.wd-error-404-page-content .wd-page-title { 
					background: url("'.esc_url($bg_404_url).'"); 
					-webkit-background-clip: text; 
					background-clip: text; 
					color: transparent !important; 
					height: 100%;
					width: 100%; 
					background-repeat: no-repeat;
					background-size: cover;
				}';
		}else{
			$custom_style_404_page 	.= '.wd-404-error { background-color: '.esc_url($bg_404_color).'; }';
		}
		return $custom_style_404_page;
	}
}

/* Get custom css search Page */
if(!function_exists ('tvlgiao_wpdance_search_page_style')){
	function tvlgiao_wpdance_search_page_style(){
		/**
	     * package: search-style
		 * var: select_style
		 * var: bg_search_url
		 * var: bg_search_color
		 */
		extract(tvlgiao_wpdance_get_data_package( 'search-style' ));
		$custom_style_search_page = '';
		if($select_style == 'bg_image'){
			$default_url_search 		= TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_404.jpg';
			if ($bg_search_url != $default_url_search && strpos($bg_search_url, home_url()) === false) {
			   	$bg_search_url 	= $default_url_search;
			}
			$custom_style_search_page 	.= '.wd-search-result-page { background-image: url("'.esc_url($bg_search_url).'"); background-attachment: fixed; }';
		}else{
			$custom_style_search_page 	.= '.wd-search-result-page { background-color: '.esc_url($bg_search_color).'; }';
		}
		return $custom_style_search_page;
	}
}


/** Get custom css from html block */
if (!function_exists('tvlgiao_wpdance_htmlblock_vc_styles')) {
	/**
	 * Add Visual Composer custom css styles of HTML Blocks
	 *
	 * Visual Composer only includes css style of the main post, so we have
	 * to add custom css styles of HTML blocks by ourself.
	 */
	function tvlgiao_wpdance_htmlblock_vc_styles() {
		$custom_css = '';
		if ($post = tvlgiao_wpdance_get_header_post()){
			$custom_css .= tvlgiao_wpdance_htmlblock_css($post->ID);
		}
			
		if ($post = tvlgiao_wpdance_get_footer_post()){
			$custom_css .= tvlgiao_wpdance_htmlblock_css($post->ID);
		}
		return $custom_css;
	}
}

/** Get custom css from theme option */
if (!function_exists('tvlgiao_wpdance_get_custom_style_from_theme_option')) {
	function tvlgiao_wpdance_get_custom_style_from_theme_option() {
		$custom_css = '';
		if ( TVLGIAO_WPDANCE_USE_CONTROL == 'theme_option' ) {
			global $tvlgiao_wpdance_theme_options;
			if( $tvlgiao_wpdance_theme_options['tvlgiao_wpdance_custom_css'] ) {
				$custom_css .= $tvlgiao_wpdance_theme_options['tvlgiao_wpdance_custom_css'];
			}
		}
		return $custom_css;
	}
}

/** Get custom script from theme option */
if (!function_exists('tvlgiao_wpdance_get_custom_script_from_theme_option')) {
	function tvlgiao_wpdance_get_custom_script_from_theme_option() {
		$custom_script = '';
		if ( TVLGIAO_WPDANCE_USE_CONTROL == 'theme_option' ) {
			global $tvlgiao_wpdance_theme_options;
			if( $tvlgiao_wpdance_theme_options['tvlgiao_wpdance_custom_script'] ) {
				$custom_script .= $tvlgiao_wpdance_theme_options['tvlgiao_wpdance_custom_script'];
			}
		}
		return $custom_script;
	}
}

/* Get custom css font config from xml file */
if(!function_exists ('tvlgiao_wpdance_get_custom_style_from_xml_font_file')){
	function tvlgiao_wpdance_get_custom_style_from_xml_font_file($file_name = 'font_config'){
		ob_start();
		$objXML_font 		= simplexml_load_file(TVLGIAO_WPDANCE_THEME_WPDANCE."/config_xml/".$file_name.".xml");
		foreach ($objXML_font->children() as $child) {	 				//items_setting => general
			foreach ($child->items->children() as $childofchild) { 		//items => item
				$slug 	 		=  (string)$childofchild->slug; 		//slug
				$std 	 		=  (string)$childofchild->std;
				$data_style 	=  	tvlgiao_wpdance_get_custom_data_by_keyname( $slug, $slug ,$std, 'font');
				foreach ($childofchild->frontend as $childoffrontend) {	
					$attr 					= 'font-family';
					$selector 				= (string)$childoffrontend->selector_normal;
					$selector_important 	= (string)$childoffrontend->selector_important;
					echo ($selector).'{';
						echo esc_attr($attr).': '.esc_attr($data_style).';';
					echo '}'."\n";
					if($selector_important!=''){
						echo ($selector_important).'{';
							echo esc_attr($attr).': '.esc_attr($data_style).' !important ;';
						echo '}'."\n";							
					}	
				}
			}
		}
		$custom_css = ob_get_clean();
		return $custom_css;
	}
}


/* Get custom css from xml color file */
if(!function_exists ('tvlgiao_wpdance_get_custom_style_from_xml_color_file')){
	function tvlgiao_wpdance_get_custom_style_from_xml_color_file($file_name = 'color_default'){
		$custom_css = '';
		if (!isset($_GET['color'])) {
			$xml_file		= tvlgiao_wpdance_get_custom_data_by_keyname( 'tvlgiao_wpdance_styling_primary_color', 'tvlgiao_wpdance_color_setting_primary_color_select', $file_name);
			$objXML_color 	= @simplexml_load_file(TVLGIAO_WPDANCE_THEME_WPDANCE."/config_xml/".$xml_file.".xml");
			
			foreach ($objXML_color->children() as $child) {	 				
				foreach ($child->items->children() as $childofchild) { 			
					$important 		=  (isset($childofchild->important) &&  (int)$childofchild->important == 1) ? '!important' : ''; 
					$slug 			=  (string)$childofchild->slug; 					
					$std 			=  (string)$childofchild->std;
					$data_style 	=  	tvlgiao_wpdance_get_custom_data_by_keyname( $slug, $slug, $std); 
					foreach ($childofchild->frontend->children() as $childoffrontend) {	// frondend => f*
						$attribute 	= $childoffrontend->attribute;
						$selector 	= $childoffrontend->selector;
							$custom_css .= $selector.'{'.$attribute.': '.$data_style.$important.';}';
					}	
				}
			}
		}else{
			/* Home color get from request $_GET['color'] for demo */
			$xml_file_customize = "color_".$_GET['color'];
			$objXML_color = @simplexml_load_file(TVLGIAO_WPDANCE_THEME_WPDANCE."/config_xml/".$xml_file_customize.".xml"); 
			if($objXML_color) {
				foreach ($objXML_color->children() as $child) {      
					foreach ($child->items->children() as $childofchild) {   
						$std =  (string)$childofchild->std;      
						foreach ($childofchild->frontend->children() as $childofchilds) {   
							$attribute  =  (string)$childofchilds->attribute;     
							$selector  	=  (string)$childofchilds->selector; 
							$custom_css .= $selector."{".$attribute.":".$std."}";
						}
					}
				}
			}
		}
		return $custom_css;
	}
}

/* Get custom css back to top button */
if(!function_exists ('tvlgiao_wpdance_back_to_top_button_style')){
	function tvlgiao_wpdance_back_to_top_button_style(){
		/**
	     * package: backtotop
		 * var: scroll_button
		 * var: button_style
		 * var: border_color
		 * var: background_color
		 * var: background_shape
		 * var: class_icon
		 * var: color_icon
		 * var: width
		 * var: height
		 * var: right
		 * var: bottom
		 */
		extract(tvlgiao_wpdance_get_data_package( 'back_to_top' )); 
		$custom_css = '';
		//icon
		$custom_css .= '#tvlgiao-back-to-top a i{color:'.esc_attr($color_icon).';}';

		//wrap
		$custom_css .= '#tvlgiao-back-to-top{';
		//wrap color
		$custom_css .= 'color:'.esc_attr($color_icon).';';
		//wrap position
		$custom_css .= 'right:'.esc_attr($right).'; bottom:'.esc_attr($bottom).';';
		//wrap style
		if ($button_style == '0') {
			if ($background_color != 'transparent') {
				$custom_css .= 'background-color:'.esc_attr($background_color).';';
			}
			if ($background_shape) {
				$custom_css .= "-webkit-border-radius: 100%;-moz-border-radius: 100%;-ms-border-radius: 100%;border-radius: 100%;";
			}
			//border
			if ((isset($border_color['rgba']) && $border_color['rgba'] != '') || $border_color['color'] != '') {
				$custom_css .= '-webkit-background-clip: padding-box; /* for Safari */ background-clip: padding-box; /* for IE9+, Firefox 4+, Opera, Chrome */';
				if (isset($border_color['rgba']) && $border_color['rgba'] != '') {
					$custom_css .= 'border: 6px solid '.$border_color['rgba'].';';
				}else{
					$custom_css .= 'border: 6px solid '.$border_color['color'].';';
				}
			}
		}
		$custom_css .= '}';

		//link
		$custom_css .= '#tvlgiao-back-to-top a{';
		//wrap style
		$custom_css .= 'width:'.esc_attr($width).'; height:'.esc_attr($height).'; line-height:'.esc_attr($height).';';
		if ($button_style == '0') {
			if ($background_color != 'transparent') {
				$custom_css .= 'background-color:'.esc_attr($background_color).';';
			}
			if ($background_shape) {
				$custom_css .= "-webkit-border-radius: 100%;-moz-border-radius: 100%;-ms-border-radius: 100%;border-radius: 100%;";
			}
		}
		$custom_css .= '}';
		return $custom_css;
	}
}

/* Get Script product effect */
if(!function_exists ('tvlgiao_wpdance_product_effect_script')){ 
	function tvlgiao_wpdance_product_effect_script(){
		/**
	     * package: product-effect
		 * var: popup_cart
		 * var: popup_width
		 * var: popup_height
		 */
		extract(tvlgiao_wpdance_get_data_package( 'product-effect' )); 
   		if (!$popup_cart || !tvlgiao_wpdance_is_woocommerce()) return;
   		$custom_script = '';
		ob_start(); ?>	
		<script>
		    wd_popup_after_add_to_cart_ajax(<?php echo esc_html($popup_width); ?>, <?php echo esc_html($popup_height); ?>);
		</script>
		<?php
		$custom_script = str_replace( array( '<script>', '</script>' ), '', ob_get_clean() );
		return $custom_script;
	}
}

/* Get Script accessibility */
if(!function_exists ('tvlgiao_wpdance_accessibility_script')){ 
	function tvlgiao_wpdance_accessibility_script(){
		/**
	     * package: accessibility
		 * var: chatbox_status
		 * var: popup_email
		 * var: popup_only_home
		 * var: popup_mobile
		 * var: popup_email_width
		 * var: popup_email_height
		 * var: popup_delay_time
		 */
		extract(tvlgiao_wpdance_get_data_package( 'accessibility' )); 
   		if (!$chatbox_status && !$popup_email) return;
   		$custom_script = '';
		ob_start(); ?>
			<?php if ($chatbox_status) { ?>
				wd_accessibility_chatbox_facebook();
			<?php } ?>
			
			<?php if (!$popup_email || !tvlgiao_wpdance_email_popup_enable()) return; ?>
			<?php if ($popup_only_home && !is_home() && !is_front_page()) return; ?>
			<?php if (!$popup_mobile && wp_is_mobile()) return; ?>
				wd_accessibility_email_subscribe_popup(<?php echo esc_html($popup_email_width); ?>,<?php echo esc_html($popup_email_height); ?>, <?php echo esc_html($popup_delay_time); ?>);
		<?php
		$custom_script = ob_get_clean();
		return $custom_script;
	}
}

/* Custom Script for site */
if(!function_exists ('tvlgiao_wpdance_get_custom_script')){ 
	function tvlgiao_wpdance_get_custom_script(){
   		$custom_script = '';
		?>	
			<?php if( defined('ICL_LANGUAGE_CODE') ): ?>
				<?php $custom_script .= 'var _ajax_uri = "'.admin_url('admin-ajax.php?lang='.ICL_LANGUAGE_CODE, 'relative').'";';
				?>
			<?php else: ?>
				<?php $custom_script .= 'var _ajax_uri = "'.admin_url('admin-ajax.php', 'relative').'";';
				?>
			<?php endif; ?>
		<?php
		$custom_script .= "jQuery('.menu li').each(function(){if(jQuery(this).children('.sub-menu').length > 0) jQuery(this).addClass('parent');});";
		return $custom_script;
	}
}

?>