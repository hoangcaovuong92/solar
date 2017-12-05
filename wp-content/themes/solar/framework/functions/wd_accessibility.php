<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */

add_action('admin_head', 'tvlgiao_wpdance_accessibility_display_favicon', 5);
add_action('tvlgiao_wpdance_header_meta_data', 'tvlgiao_wpdance_accessibility_display_favicon', 5);
add_action('tvlgiao_wpdance_header_meta_data', 'tvlgiao_wpdance_accessibility_facebook_comment_setting_meta', 10);
add_action('tvlgiao_wpdance_after_opening_body_tag', 'tvlgiao_wpdance_accessibility_facebook_api', 5);
add_action('tvlgiao_wpdance_after_opening_body_tag','tvlgiao_wpdance_accessibility_loading_page_effect', 10);
add_action('tvlgiao_wpdance_single_social_sharing', 'tvlgiao_wpdance_accessibility_template_single_social_sharing');
add_action('tvlgiao_wpdance_footer_init_action', 'tvlgiao_wpdance_accessibility_facebook_chatbox', 5);
add_action('tvlgiao_wpdance_footer_init_action', 'tvlgiao_wpdance_accessibility_scroll_button_site_function', 10);
add_action('tvlgiao_wpdance_footer_init_action', 'tvlgiao_wpdance_accessibility_loading_email_subscribe_popup', 15);

add_action('wp_enqueue_scripts', 'tvlgiao_wpdance_accessibility_js_effect', 999999);
add_action('wp_enqueue_scripts', 'tvlgiao_wpdance_accessibility_addthis_script');

// Check email subscribe popup status 
if(!function_exists ('tvlgiao_wpdance_email_popup_enable')){
	function tvlgiao_wpdance_email_popup_enable() {
		$type 	= session_id() ? 'session' : 'transient'; 
		$key	= 'wd_disabled_email_popup';
		if ($type == 'transient') {
			$disabled_email_popup 	= get_transient( $key );
			$result 				= ($disabled_email_popup === false) ? true : false;
		}else{
			if (!isset($_SESSION['wd_disabled_email_popup'])) return true;
		    $current_value 	= $_SESSION['wd_disabled_email_popup'];
		    $result 		= ($current_value < time()) ? true : false;
		}
	    return $result;
	}
}

/* Favicon */
if(!function_exists ('tvlgiao_wpdance_accessibility_display_favicon')){
	function tvlgiao_wpdance_accessibility_display_favicon(){ 
		/**
	     * package: favicon
		 * var: icon
		 */
		extract(tvlgiao_wpdance_get_data_package( 'favicon' ));
		if( strlen(trim($icon)) > 0 ) :?>
			<link rel="shortcut icon" href="<?php echo esc_url($icon);?>" />
		<?php endif;
	}
}

/* Facebook Comment Meta */
if(!function_exists ('tvlgiao_wpdance_accessibility_facebook_comment_setting_meta')){
	function tvlgiao_wpdance_accessibility_facebook_comment_setting_meta(){ 
		/**
	     * package: facebook-api
		 * var: user_id
		 * var: app_id
		 * var: comment_status
		 * var: chatbox_status
		 */
		extract(tvlgiao_wpdance_get_data_package( 'facebook-api' )); 
		$status 	= isset($comment_status['facebook']) ? $comment_status['facebook'] : false;
		$content 	= '';
		if ($status) {
			ob_start(); 
			?>
				<meta property="fb:admins" content="<?php echo esc_attr($user_id); ?>"/>
				<meta property="fb:app_id" content="<?php echo esc_attr($app_id); ?>" />
			<?php
			$content = ob_get_clean();
		}
		echo $content;
	}
}


/* Facebook API */
if(!function_exists ('tvlgiao_wpdance_accessibility_facebook_api')){
	function tvlgiao_wpdance_accessibility_facebook_api(){ 
		/**
	     * package: facebook-api
		 * var: user_id
		 * var: app_id
		 * var: comment_status
		 * var: chatbox_status
		 */
		extract(tvlgiao_wpdance_get_data_package( 'facebook-api' )); 
		$comment_status 	= isset($comment_status['facebook']) ? $comment_status['facebook'] : false;
		$chatbox_status 	= isset($comment_status) ? $comment_status : false;
		$content = '';
		if ($comment_status || $chatbox_status) {
			ob_start(); ?>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  	var js, fjs = d.getElementsByTagName(s)[0];
				  	if (d.getElementById(id)) return;
				  	js = d.createElement(s); js.id = id;
				  	js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=<?php echo esc_attr($app_id); ?>";
				  	fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<?php
			$content = ob_get_clean();
		}
		echo $content;
	}
}

/* Facebook chatbox */
if(!function_exists ('tvlgiao_wpdance_accessibility_facebook_chatbox')){
	function tvlgiao_wpdance_accessibility_facebook_chatbox(){ 
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
		$content = '';
		if ($chatbox_status) {
			ob_start(); ?>
				<div data-toggle="<?php echo $default_mode; ?>" class="wd-facebook-chatbox-wrap">
					<span class="wd-facebook-chatbox-close-btn"><?php esc_html_e( 'X', 'solar' ); ?></span>
				    <div class="fb-page wd-facebook-chatbox-content" data-adapt-container-width="true" data-height="<?php echo esc_attr($height); ?>" data-hide-cover="false" data-href="<?php echo esc_url($url); ?>" data-show-facepile="true" data-show-posts="false" data-small-header="false" data-tabs="messages" data-width="<?php echo esc_attr($width); ?>"></div>
				    <p class="wd-facebook-chatbox-permarlink-wrap">
				    	<a class="wd-facebook-chatbox-permarlink" href="<?php echo esc_url($link_url); ?>" target="_blank">
				    		<?php echo esc_html($link_caption); ?></a>
				    		<?php if (isset($logo['url'])): ?>
				    			<a class="wd-facebook-chatbox-logo"><img src="<?php echo esc_url($logo['url']); ?>">
				    		<?php endif ?>
			    		</a>
		    		</p>
				</div>
				<div class="wd-facebook-chatbox-footer">
				    <div class="wd-facebook-chatbox-footer-content">
				    	<a><i class="fa fa-facebook-square" aria-hidden="true"></i>
				    		<span class="wd-facebook-chatbox-footer-text"><?php echo esc_html($text_footer); ?></span>
			    		</a>
				    	<i class="fa fa-sort-asc" aria-hidden="true"></i>
			    	</div class="wd-facebook-chatbox-footer-content">
				</div>
				<?php
			$content = ob_get_clean();
		}
		echo $content;
	}
}

/* Email Subscribe Popup */
if(!function_exists ('tvlgiao_wpdance_accessibility_loading_email_subscribe_popup')){
	function tvlgiao_wpdance_accessibility_loading_email_subscribe_popup(){
		/**
	     * package: email-popup
		 * var: display
		 * var: popup_only_home
		 * var: popup_mobile
		 * var: delay_time
		 * var: session_expire
		 * var: banner
		 * var: source
		 * var: custom_content
		 * var: feedburner_id
		 * var: width
		 * var: height
		 * var: title
		 * var: desc
		 * var: placeholder
		 * var: button_text
		 */
		extract(tvlgiao_wpdance_get_data_package( 'email-popup' )); 
		if (!$display || !tvlgiao_wpdance_email_popup_enable()) return;
		if ($popup_only_home && !is_home() && !is_front_page()) return;
		if (!$popup_mobile && wp_is_mobile()) return; ?>
	    <div id="wd-email-subscribe-popup" class="subscribe_widget" style="display:none;">
	    	<div id="wd-email-subscribe-content">
	    		<?php if (is_array($banner) && $banner['id']): ?>
	    			<?php $banner_url = wp_get_attachment_image_src( $banner['id'], 'wd_image_size_square_medium'); ?>
	    			<div class="wd-layout-half-width wd-email-subscribe-image">
	    				<div style="height:<?php echo esc_html($height); ?>px; background: url(<?php echo esc_url($banner_url[0]); ?>);"></div>
	    			</div>
	    			<div class="wd-layout-half-width">
	    		<?php endif ?>
					<div class="wd-email-subscribe-main-content">
		    			<div class="wd-tb-title">
			    			<div class="wd-tb-closeAjaxWindow"><button type="button" class="wd-tb-closeWindowButton"><span class="screen-reader-text"><?php esc_html_e( 'Close', 'solar' ) ?></span><span class="tb-close-icon"></span></button></div>
			    		</div>

			    		<?php if ($source == 'feedburner'): ?>
			    			<?php if($title != "") : ?>
								<div class="wd-subscribe-header">
									<h2><?php echo esc_attr( $title ); ?></h2>
								</div>
							<?php endif; ?>
							<?php echo ($desc) ? '<div class="subscribe_intro_text">'.esc_html($desc).'</div>':'' ?>		
							<div class="subscribe_form">
								<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_attr($feedburner_id); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
									<p class="subscribe-email"><input type="text" name="email" class="subscribe_email" value="" placeholder="<?php echo esc_html($placeholder); ?>" autocomplete="off" /></p>
									<input type="hidden" value="<?php echo esc_attr($feedburner_id);?>" name="uri"/>
									<input type="hidden" value="<?php echo get_bloginfo( 'name' );?>" name="title"/>
									<input type="hidden" name="loc" value="en_US"/>

									<button class="button" type="submit" title="Subscribe"><?php echo esc_attr($button_text); ?></button>
								</form>
							</div>
			    		<?php else: ?>
			    			<?php if($custom_content != '' && tvlgiao_wpdance_is_visual_composer()): ?> 
								<?php $custom_content = stripslashes($custom_content); ?>
								<div class="wd-email-subscribe-popup-custom-content">
									<?php echo do_shortcode( "{$custom_content}" ); 	?>
								</div>
							<?php endif; ?>
			    		<?php endif ?>

			    		<p class="row">
							<label><input name="disabled" class="wd-email-subscribe-popup-disabled" data-expire="<?php echo esc_attr($session_expire); ?>" type="checkbox" data-val="true" value="true"> <?php esc_html_e( 'Dont show this again', 'solar' ); ?></label>
						</p>
    				</div>
    			<?php if (is_array($banner) && $banner['url']): ?>
	    			</div>
	    		<?php endif ?>
	    	</div>
		</div>
	    <?php 
	}
}

/* Loading Page Effect */
if(!function_exists ('tvlgiao_wpdance_accessibility_loading_page_effect')){
	function tvlgiao_wpdance_accessibility_loading_page_effect(){
		/**
	     * package: loading-effect
		 * var: status
		 */
		extract(tvlgiao_wpdance_get_data_package( 'loading-effect' )); 
		if (!$status) return; ?>
	    <div id="loader-wrapper">
			<div id="loader">
				<div id="circularG">
					<div id="circularG_1" class="circularG"></div>
					<div id="circularG_2" class="circularG"></div>
					<div id="circularG_3" class="circularG"></div>
					<div id="circularG_4" class="circularG"></div>
					<div id="circularG_5" class="circularG"></div>
					<div id="circularG_6" class="circularG"></div>
					<div id="circularG_7" class="circularG"></div>
					<div id="circularG_8" class="circularG"></div>
				</div>
			</div>
		</div>
	    <?php 
	}
}

/* JS Effect */
if(!function_exists ('tvlgiao_wpdance_accessibility_js_effect')){
	function tvlgiao_wpdance_accessibility_js_effect(){
		if (tvlgiao_wpdance_is_mobile_or_tablet()) return;
		/**
	     * package: js-effect
		 * var: sidebar_scroll
		 */
		extract(tvlgiao_wpdance_get_data_package( 'js-effect' ));
		wp_enqueue_script('hc-sticky-js', TVLGIAO_WPDANCE_THEME_EXTEND_LIBS.'/hc-sticky/js/jquery.hc-sticky.min.js',false,false,true);
		wp_enqueue_script('wd-effects-js'	, TVLGIAO_WPDANCE_THEME_JS.'/wd_effects.js',false,false,true);
		wp_localize_script( 'wd-effects-js', 'effects_status', array(
			'sidebar_scroll' 			=> $sidebar_scroll,
		));
	}
}

/* Add Social Share */
if(!function_exists ('tvlgiao_wpdance_accessibility_addthis_script')){
	function tvlgiao_wpdance_accessibility_addthis_script(){
		/**
	     * package: social_share
		 * var: display_social
		 * var: pubid
		 */
		extract(tvlgiao_wpdance_get_data_package( 'social_share' ));
		if ($display_social) {
			if( is_single() || is_page_template('page-templates/template-blog.php') || ( is_category()) || is_tag() ){ 
				wp_enqueue_script( 'addthis-script', '//s7.addthis.com/js/300/addthis_widget.js#pubid='.esc_html($pubid));
			} 
		}
	}
}

/* Social Share HTML */
if(!function_exists ('tvlgiao_wpdance_accessibility_template_single_social_sharing')){
	function tvlgiao_wpdance_accessibility_template_single_social_sharing(){
		/**
	     * package: social_share
		 * var: display_social
		 * var: pubid
		 */
		extract(tvlgiao_wpdance_get_data_package( 'social_share' ));
		if ($display_social) {
		?>
			<div class="wd-social-share">
				<span><?php esc_html_e('Share ','solar'); ?></span>
				<div class="addthis_sharing_toolbox"></div>
			</div>
		<?php
		}
	}
}

/* Back To Top Button */
if(!function_exists ('tvlgiao_wpdance_accessibility_scroll_button_site_function')){
	function tvlgiao_wpdance_accessibility_scroll_button_site_function(){
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
	    if($scroll_button){
	        if(!wp_is_mobile()): ?>
	            <div id="tvlgiao-back-to-top" class="scroll-button">
	                <a class="scroll-button" href="javascript:void(0)" data-toggle="tooltip" title="<?php esc_html_e('To Top','solar');?>">
	                	<i class="<?php echo esc_attr($class_icon); ?>"></i>
	                </a>
	            </div>
	        <?php endif;
	    }
	}
}
?>