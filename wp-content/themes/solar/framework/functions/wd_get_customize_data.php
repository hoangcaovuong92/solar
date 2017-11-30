<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
if(!function_exists ('tvlgiao_wpdance_get_data_package')){
	function tvlgiao_wpdance_get_data_package( $template ) {
		/* DATA SETTING */ 
    	$wd_default_data    = tvlgiao_wpdance_get_theme_option_default_data();
		$data 	= array();
		$pre 	= 'tvlgiao_wpdance_';
		if (TVLGIAO_WPDANCE_USE_CONTROL == 'theme_option'){
			switch ($template) {
				case 'background':
					$data['bg_display']	  			= wd_get_theme_option($pre.'bg_body_display', $wd_default_data['general']['default']['bg_display']);  
					$data['bg_config']	  			= wd_get_theme_option($pre.'bg_body', $wd_default_data['general']['default']['bg_body']);  
					break;

				case 'favicon':
					$data['icon']	  				= wd_get_theme_option($pre.'favicon', $wd_default_data['general']['default']['favicon'], 'image'); 
					break;

				case 'loading-effect':
					$data['status']	  				= wd_get_theme_option($pre.'loading_effect_display', $wd_default_data['effects']['default']['loading']); 
					break;

				case 'js-effect':
					$data['sidebar_scroll']	  		= wd_get_theme_option($pre.'sidebar_fixed_effect_display', $wd_default_data['effects']['default']['sidebar_fixed']); 
					break;

				case 'accessibility':
					$data['chatbox_status']	  		= wd_get_theme_option($pre.'facebook_chatbox_display', $wd_default_data['fb_chatbox']['default']['display']);
					$data['popup_email']	  		= wd_get_theme_option($pre.'email_subscriber_popup_display', $wd_default_data['email_popup']['default']['display']); 
					$data['popup_only_home']	  	= wd_get_theme_option($pre.'email_subscriber_popup_only_home', $wd_default_data['email_popup']['default']['only_home']);
					$data['popup_mobile']	  		= wd_get_theme_option($pre.'email_subscriber_popup_mobile', $wd_default_data['email_popup']['default']['popup_mobile']);
					$data['popup_email_width']	  	= wd_get_theme_option($pre.'email_subscriber_popup_width', $wd_default_data['email_popup']['default']['width']); 
					$data['popup_email_height']	  	= wd_get_theme_option($pre.'email_subscriber_popup_height', $wd_default_data['email_popup']['default']['height']); 
					$data['popup_delay_time']	  	= wd_get_theme_option($pre.'email_subscriber_popup_delay_time', $wd_default_data['email_popup']['default']['delay_time']);
					break;

				case 'facebook-api':
					$data['user_id']	  			= wd_get_theme_option($pre.'comment_facebook_user_id', $wd_default_data['general']['default']['user_id']); 
					$data['app_id']	  				= wd_get_theme_option($pre.'comment_facebook_app_id', $wd_default_data['general']['default']['app_id']);
					$data['comment_status']	  		= wd_get_theme_option($pre.'comment_sorter', $wd_default_data['comment']['default']['sorter']);
					$data['chatbox_status']	  		= wd_get_theme_option($pre.'facebook_chatbox_display', $wd_default_data['fb_chatbox']['default']['display']);
					break;

				case 'facebook-chatbox':
					$data['chatbox_status']	  		= wd_get_theme_option($pre.'facebook_chatbox_display', $wd_default_data['fb_chatbox']['default']['display']);
					$data['url']	  				= wd_get_theme_option($pre.'facebook_chatbox_url', $wd_default_data['fb_chatbox']['default']['url']);
					$data['width']	  				= wd_get_theme_option($pre.'facebook_chatbox_width', $wd_default_data['fb_chatbox']['default']['width']);
					$data['height']	  				= wd_get_theme_option($pre.'facebook_chatbox_height', $wd_default_data['fb_chatbox']['default']['height']);
					$data['right']	  				= wd_get_theme_option($pre.'facebook_chatbox_right', $wd_default_data['fb_chatbox']['default']['right']);
					$data['bottom']	  				= wd_get_theme_option($pre.'facebook_chatbox_bottom', $wd_default_data['fb_chatbox']['default']['bottom']);
					$data['default_mode']	  		= wd_get_theme_option($pre.'facebook_chatbox_default_mode', $wd_default_data['fb_chatbox']['default']['default_mode']);
					$data['bg_color']	  			= wd_get_theme_option($pre.'facebook_chatbox_bg_color', $wd_default_data['fb_chatbox']['default']['bg_color']);
					$data['logo']	  				= wd_get_theme_option($pre.'facebook_chatbox_logo', $wd_default_data['fb_chatbox']['default']['logo']);
					$data['text_footer']	  		= wd_get_theme_option($pre.'facebook_chatbox_text_footer', $wd_default_data['fb_chatbox']['default']['text_footer']);
					$data['link_caption']	  		= wd_get_theme_option($pre.'facebook_chatbox_link_caption', $wd_default_data['fb_chatbox']['default']['link_caption']);
					$data['link_url']	  			= wd_get_theme_option($pre.'facebook_chatbox_link_url', $wd_default_data['fb_chatbox']['default']['link_url']);
					break;

				case 'email-popup':
					$data['display']	  			= wd_get_theme_option($pre.'email_subscriber_popup_display', $wd_default_data['email_popup']['default']['display']); 
					$data['popup_only_home']	  	= wd_get_theme_option($pre.'email_subscriber_popup_only_home', $wd_default_data['email_popup']['default']['only_home']);
					$data['popup_mobile']	  		= wd_get_theme_option($pre.'email_subscriber_popup_mobile', $wd_default_data['email_popup']['default']['popup_mobile']);
					$data['delay_time']	  			= wd_get_theme_option($pre.'email_subscriber_popup_delay_time', $wd_default_data['email_popup']['default']['delay_time']); 
					$data['session_expire']	  		= wd_get_theme_option($pre.'email_subscriber_popup_session_expire', $wd_default_data['email_popup']['default']['session_expire']); 
					$data['banner']	  				= wd_get_theme_option($pre.'email_subscriber_popup_banner', $wd_default_data['email_popup']['default']['banner']); 
					$data['source']	  				= wd_get_theme_option($pre.'email_subscriber_popup_source', $wd_default_data['email_popup']['default']['source']); 
					$data['custom_content']	  		= wd_get_theme_option($pre.'email_subscriber_popup_custom_content', $wd_default_data['email_popup']['default']['custom_content']); 
					$data['feedburner_id']	  		= wd_get_theme_option($pre.'email_subscriber_popup_feedburner_id', $wd_default_data['email_popup']['default']['feedburner_id']); 
					$data['width']	  				= wd_get_theme_option($pre.'email_subscriber_popup_width', $wd_default_data['email_popup']['default']['width']); 
					$data['height']	  				= wd_get_theme_option($pre.'email_subscriber_popup_height', $wd_default_data['email_popup']['default']['height']); 
					$data['title']	  				= wd_get_theme_option($pre.'email_subscriber_popup_title', $wd_default_data['email_popup']['default']['title']); 
					$data['desc']	  				= wd_get_theme_option($pre.'email_subscriber_popup_desc', $wd_default_data['email_popup']['default']['desc']); 
					$data['placeholder']	  		= wd_get_theme_option($pre.'email_subscriber_popup_placeholder', $wd_default_data['email_popup']['default']['placeholder']); 
					$data['button_text']	  		= wd_get_theme_option($pre.'email_subscriber_popup_button_text', $wd_default_data['email_popup']['default']['button_text']); 
					break;

				case 'comment':
					$data['comment_status']	  		= wd_get_theme_option($pre.'comment_sorter', $wd_default_data['comment']['default']['sorter']); 
					$data['comment_mode']	  		= wd_get_theme_option($pre.'comment_facebook_mode', $wd_default_data['comment']['default']['mode']); 
					$data['num_comment']	  		= wd_get_theme_option($pre.'comment_facebook_number_comment_display', $wd_default_data['comment']['default']['number_comment']);  
					break;

				case 'comment-layout':
					$data['display_tab']	  		= wd_get_theme_option($pre.'comment_layout_style', $wd_default_data['comment']['default']['layout']); 
					break;

				case 'header-default':
					$data['show_logo_title']	  	= wd_get_theme_option($pre.'header_show_site_title', $wd_default_data['header']['default']['site_title']);
					$data['logo_default']	  		= wd_get_theme_option($pre.'logo', $wd_default_data['general']['default']['logo'], 'image');
					$data['logo_url']	  			= wd_get_theme_option($pre.'header_logo', $wd_default_data['general']['default']['logo'], 'image');
					$data['menu_location']	  		= wd_get_theme_option($pre.'header_menu_location', $wd_default_data['header']['default']['menu_location']); 
					break;

				case 'footer-default':
					$data['logo_default']	  		= wd_get_theme_option($pre.'logo', $wd_default_data['general']['default']['logo'], 'image');
					$data['logo_url']	  			= wd_get_theme_option($pre.'footer_logo', $wd_default_data['general']['default']['logo-footer'], 'image');
					$data['copyright'] 				= wd_get_theme_option($pre.'footer_copyright_text', $wd_default_data['footer']['default']['copyright_text']);
					break;

				case 'breadcrumb-default':
					$data['layout_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_type',  $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_background', $wd_default_data['breadcrumb']['default']['background'], 'image');
					$data['height']					= wd_get_theme_option($pre.'breadcrumb_height', $wd_default_data['breadcrumb']['default']['height'], 'height');
					$data['color_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_background_color', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= wd_get_theme_option($pre.'breadcrumb_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= wd_get_theme_option($pre.'breadcrumb_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= wd_get_theme_option($pre.'breadcrumb_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;
					
				case 'breadcrumb-custom-setting':
					$data['blog_archive']			= wd_get_theme_option($pre.'breadcrumb_archive_blog_customize', $wd_default_data['breadcrumb']['default']['blog_archive']);
					$data['product_archive']		= wd_get_theme_option($pre.'breadcrumb_archive_product_customize', $wd_default_data['breadcrumb']['default']['product_archive']);
					$data['woo_special_page']		= wd_get_theme_option($pre.'breadcrumb_woo_special_page_customize', $wd_default_data['breadcrumb']['default']['woo_special_page']);
					$data['search_page']			= wd_get_theme_option($pre.'breadcrumb_search_page_customize', $wd_default_data['breadcrumb']['default']['search_page']);
					break;

				case 'breadcrumb-blog-archive':
					$data['layout_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_archive_blog_type',  $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_archive_blog_background', $wd_default_data['breadcrumb']['default']['background'], 'image');
					$data['height']					= wd_get_theme_option($pre.'breadcrumb_archive_blog_height', $wd_default_data['breadcrumb']['default']['height'], 'height');
					$data['color_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_archive_blog_background_color', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= wd_get_theme_option($pre.'breadcrumb_archive_blog_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= wd_get_theme_option($pre.'breadcrumb_archive_blog_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= wd_get_theme_option($pre.'breadcrumb_archive_blog_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'breadcrumb-product-archive':
					$data['layout_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_archive_product_type',  $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_archive_product_background', $wd_default_data['breadcrumb']['default']['background'], 'image');
					$data['height']					= wd_get_theme_option($pre.'breadcrumb_archive_product_height', $wd_default_data['breadcrumb']['default']['height'], 'height');
					$data['color_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_archive_product_background_color', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= wd_get_theme_option($pre.'breadcrumb_archive_product_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= wd_get_theme_option($pre.'breadcrumb_archive_product_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= wd_get_theme_option($pre.'breadcrumb_archive_product_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'breadcrumb-woo-special-page':
					$data['layout_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_woo_special_page_type',  $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_woo_special_page_background', $wd_default_data['breadcrumb']['default']['background'], 'image');
					$data['height']					= wd_get_theme_option($pre.'breadcrumb_woo_special_page_height', $wd_default_data['breadcrumb']['default']['height'], 'height');
					$data['color_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_woo_special_page_background_color', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= wd_get_theme_option($pre.'breadcrumb_woo_special_page_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= wd_get_theme_option($pre.'breadcrumb_woo_special_page_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= wd_get_theme_option($pre.'breadcrumb_woo_special_page_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'breadcrumb-search-page':
					$data['layout_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_search_page_type',  $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_search_page_background', $wd_default_data['breadcrumb']['default']['background'], 'image');
					$data['height']					= wd_get_theme_option($pre.'breadcrumb_search_page_height', $wd_default_data['breadcrumb']['default']['height'], 'height');
					$data['color_breadcrumbs']		= wd_get_theme_option($pre.'breadcrumb_search_page_background_color', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= wd_get_theme_option($pre.'breadcrumb_search_page_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= wd_get_theme_option($pre.'breadcrumb_search_page_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= wd_get_theme_option($pre.'breadcrumb_search_page_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'default-page':
					$data['layout'] 				= wd_get_theme_option($pre.'layout_page_default_layout', $wd_default_data['layout']['default']['page_default']);
					$data['sidebar_left'] 			= wd_get_theme_option($pre.'layout_page_default_left_sidebar', $wd_default_data['sidebar']['default']['page_default_left']);
					$data['sidebar_right'] 			= wd_get_theme_option($pre.'layout_page_default_right_sidebar', $wd_default_data['sidebar']['default']['page_default_right']);
					break;

				//archive.php
				case 'archive-blog': 
					$data['layout'] 				= wd_get_theme_option($pre.'layout_blog_archive_layout', $wd_default_data['layout']['default']['blog_archive']);
					$data['sidebar_left'] 			= wd_get_theme_option($pre.'layout_blog_archive_left_sidebar', $wd_default_data['sidebar']['default']['blog_archive_left']);
					$data['sidebar_right'] 			= wd_get_theme_option($pre.'layout_blog_archive_right_sidebar', $wd_default_data['sidebar']['default']['blog_archive_right']);
					$data['show_by_post_format'] 	= wd_get_theme_option($pre.'layout_blog_config_show_by_post_format', $wd_default_data['blog']['config']['default']['show_by_post_format']);
					$data['layout_style'] 			= wd_get_theme_option($pre.'layout_blog_archive_style', $wd_default_data['blog']['archive']['default']['style']);
					break;

				//index.php
				case 'default-blog-page':
					$data['layout'] 				= wd_get_theme_option($pre.'layout_blog_default_layout', $wd_default_data['layout']['default']['blog_default']);
					$data['sidebar_left'] 			= wd_get_theme_option($pre.'layout_blog_default_left_sidebar', $wd_default_data['sidebar']['default']['blog_default_left']);
					$data['sidebar_right'] 			= wd_get_theme_option($pre.'layout_blog_default_right_sidebar', $wd_default_data['sidebar']['default']['blog_default_right']);
					$data['show_by_post_format'] 	= wd_get_theme_option($pre.'layout_blog_config_show_by_post_format', $wd_default_data['blog']['config']['default']['show_by_post_format']);
					$data['layout_style'] 			= wd_get_theme_option($pre.'layout_blog_default_style', $wd_default_data['blog']['index']['default']['style']);
					break;

				case 'blog-related':
					$data['grid_list_layout'] 		= wd_get_theme_option($pre.'layout_blog_single_recent_post_style', $wd_default_data['blog']['single']['default']['recent_style']);
					$data['columns'] 				= wd_get_theme_option($pre.'layout_blog_single_recent_post_columns', $wd_default_data['columns']['default']['blog_recent']);
					break;

				case 'content-blog': 
					$data['show_title']  			= wd_get_theme_option($pre.'layout_blog_config_title_display', $wd_default_data['blog']['config']['default']['title']);
				 	$data['show_thumbnail']  		= wd_get_theme_option($pre.'layout_blog_config_thumbnail_display', $wd_default_data['blog']['config']['default']['thumbnail']);
				 	$data['placeholder_image']  	= wd_get_theme_option($pre.'layout_blog_config_thumbnail_placeholder', $wd_default_data['blog']['config']['default']['placeholder']);
				 	$data['show_date']  			= wd_get_theme_option($pre.'layout_blog_config_date_display', $wd_default_data['blog']['config']['default']['date']);
				 	$data['show_meta']  			= wd_get_theme_option($pre.'layout_blog_config_meta_display', $wd_default_data['blog']['config']['default']['meta']);
				 	$data['show_author']  			= wd_get_theme_option($pre.'layout_blog_config_author_display', $wd_default_data['blog']['config']['default']['author']);
				 	$data['show_number_comments']  	= wd_get_theme_option($pre.'layout_blog_config_number_comment_display', $wd_default_data['blog']['config']['default']['comment']);
				 	$data['show_tag']  				= wd_get_theme_option($pre.'layout_blog_config_tag_display', $wd_default_data['blog']['config']['default']['tag']);
				 	$data['show_category']  		= wd_get_theme_option($pre.'layout_blog_config_category_display', $wd_default_data['blog']['config']['default']['category']);
				 	$data['show_excerpt']  			= wd_get_theme_option($pre.'layout_blog_config_excerpt_display', $wd_default_data['blog']['config']['default']['excerpt']);
				 	$data['number_excerpt']  		= wd_get_theme_option($pre.'layout_blog_config_number_excerpt_word', $wd_default_data['blog']['config']['default']['excerpt_word']);
				 	$data['show_readmore']  		= wd_get_theme_option($pre.'layout_blog_config_readmore_display', $wd_default_data['blog']['config']['default']['readmore']);
					break;

				case 'single-blog':
					$data['layout'] 				= wd_get_theme_option($pre.'layout_blog_single_layout', $wd_default_data['layout']['default']['blog_single']);
					$data['sidebar_left'] 			= wd_get_theme_option($pre.'layout_blog_single_left_sidebar', $wd_default_data['sidebar']['default']['blog_single_left']);
					$data['sidebar_right'] 			= wd_get_theme_option($pre.'layout_blog_single_right_sidebar', $wd_default_data['sidebar']['default']['blog_single_right']);

					$data['show_author_information'] = wd_get_theme_option($pre.'layout_blog_single_author_information', $wd_default_data['blog']['single']['default']['author']);
					$data['show_previous_next_btn'] = wd_get_theme_option($pre.'layout_blog_single_previous_next_button', $wd_default_data['blog']['single']['default']['previous_next']);
					$data['show_recent_blog'] 		= wd_get_theme_option($pre.'layout_blog_single_recent_post', $wd_default_data['blog']['single']['default']['recent']);

					$data['show_title']  			= wd_get_theme_option($pre.'layout_blog_config_title_display', $wd_default_data['blog']['config']['default']['title']);
				 	$data['show_thumbnail']  		= wd_get_theme_option($pre.'layout_blog_config_thumbnail_display', $wd_default_data['blog']['config']['default']['thumbnail']);
				 	$data['show_date']  			= wd_get_theme_option($pre.'layout_blog_config_date_display', $wd_default_data['blog']['config']['default']['date']);
				 	$data['show_author']  			= wd_get_theme_option($pre.'layout_blog_config_author_display', $wd_default_data['blog']['config']['default']['author']);
				 	$data['show_number_comments']  	= wd_get_theme_option($pre.'layout_blog_config_number_comment_display', $wd_default_data['blog']['config']['default']['comment']);
				 	$data['show_tag']  				= wd_get_theme_option($pre.'layout_blog_config_tag_display', $wd_default_data['blog']['config']['default']['tag']);
				 	$data['show_category']  		= wd_get_theme_option($pre.'layout_blog_config_category_display', $wd_default_data['blog']['config']['default']['category']);
				 	$data['show_excerpt']  			= wd_get_theme_option($pre.'layout_blog_config_excerpt_display', $wd_default_data['blog']['config']['default']['excerpt']);
				 	$data['number_excerpt']  		= wd_get_theme_option($pre.'layout_blog_config_number_excerpt_word', $wd_default_data['blog']['config']['default']['excerpt_word']);
				 	$data['show_readmore']  		= wd_get_theme_option($pre.'layout_blog_config_readmore_display', $wd_default_data['blog']['config']['default']['readmore']);
					break;

				case 'archive-product':
					$data['layout']  				= wd_get_theme_option($pre.'layout_archive_product_layout', $wd_default_data['layout']['default']['product_archive']);
					$data['sidebar_left']  			= wd_get_theme_option($pre.'layout_archive_product_left_sidebar', $wd_default_data['sidebar']['default']['archive_product_left']);
					$data['sidebar_right']  		= wd_get_theme_option($pre.'layout_archive_product_right_sidebar', $wd_default_data['sidebar']['default']['archive_product_right']);
				   	$data['columns_product'] 		= wd_get_theme_option($pre.'layout_archive_product_columns', $wd_default_data['columns']['default']['product_archive']);
				   	$data['custom_shortcode'] 		= wd_get_theme_option($pre.'layout_archive_product_custom_shortcode', $wd_default_data['woo']['archive']['default']['custom_shortcode']);
					break;

				case 'product-archive-posts-per-page':
					$data['posts_per_page'] 		= wd_get_theme_option($pre.'layout_archive_product_posts_per_page', $wd_default_data['woo']['archive']['default']['posts_per_page']);
					break;

				case 'product-loop-title-word':
					$data['title_word'] 			= wd_get_theme_option($pre.'layout_product_config_number_title_word', $wd_default_data['woo']['config']['default']['title_word']);
					break;

				case 'woocommerce-page':
					$data['layout']  				= wd_get_theme_option($pre.'layout_woo_template_layout', $wd_default_data['layout']['default']['product_archive']);
					$data['sidebar_left']  			= wd_get_theme_option($pre.'layout_woo_template_left_sidebar', $wd_default_data['sidebar']['default']['woo_template_left']);
					$data['sidebar_right']  		= wd_get_theme_option($pre.'layout_woo_template_right_sidebar', $wd_default_data['sidebar']['default']['woo_template_right']);
					$data['custom_shortcode'] 		= wd_get_theme_option($pre.'layout_woo_template_custom_shortcode', $wd_default_data['woo']['woo_template']['default']['custom_shortcode']);
					break;

				case 'product-config':
					$data['display_buttons']    	= wd_get_theme_option($pre.'layout_product_config_display_buttons', $wd_default_data['woo']['config']['default']['display_buttons']);

				    $data['show_title']    			= wd_get_theme_option($pre.'layout_product_config_title_display', $wd_default_data['woo']['config']['default']['title']);
				    $data['show_description']  		= wd_get_theme_option($pre.'layout_product_config_description_display', $wd_default_data['woo']['config']['default']['desc']);
				    $data['show_rating']  			= wd_get_theme_option($pre.'layout_product_config_rating_display', $wd_default_data['woo']['config']['default']['rating']);
				    $data['show_price']  			= wd_get_theme_option($pre.'layout_product_config_price_display', $wd_default_data['woo']['config']['default']['price']);
				    $data['show_meta']  			= wd_get_theme_option($pre.'layout_product_config_meta_display', $wd_default_data['woo']['config']['default']['meta']);
					break;

				case 'product-effect':
					$data['popup_cart']    			= wd_get_theme_option($pre.'product_effect_popup_cart', $wd_default_data['woo']['visual']['default']['popup_cart']);
					$data['popup_width']    		= wd_get_theme_option($pre.'product_effect_popup_cart_width', $wd_default_data['woo']['visual']['default']['popup_width']);
					$data['popup_height']    		= wd_get_theme_option($pre.'product_effect_popup_cart_height', $wd_default_data['woo']['visual']['default']['popup_height']);
					break;

				case 'product-sale-flash':
					$data['text']    				= wd_get_theme_option($pre.'layout_product_sale_flash_text', $wd_default_data['woo']['sale_flash']['default']['text']);
					$data['show_percent']    		= wd_get_theme_option($pre.'layout_product_sale_flash_percent', $wd_default_data['woo']['sale_flash']['default']['percent']);
					break;

				case 'woo_hook':
					$data['display_buttons']    	= wd_get_theme_option($pre.'layout_product_config_display_buttons', $wd_default_data['woo']['config']['default']['display_buttons']);

					$data['wishlist_default']    	= wd_get_theme_option($pre.'layout_product_config_wishlist_default', $wd_default_data['woo']['config']['default']['wishlist_default']);
					$data['compare_default']    	= wd_get_theme_option($pre.'layout_product_config_compare_default', $wd_default_data['woo']['config']['default']['compare_default']);
					$data['show_recently_product']  = wd_get_theme_option($pre.'layout_single_product_recent_product', $wd_default_data['woo']['single']['default']['recent']);
					$data['show_upsell_product']    = wd_get_theme_option($pre.'layout_single_product_upsell_product', $wd_default_data['woo']['single']['default']['upsell']);

				    $data['show_title']    			= wd_get_theme_option($pre.'layout_product_config_title_display', $wd_default_data['woo']['config']['default']['title']);
				    $data['show_description']  		= wd_get_theme_option($pre.'layout_product_config_description_display', $wd_default_data['woo']['config']['default']['desc']);
				    $data['show_rating']  			= wd_get_theme_option($pre.'layout_product_config_rating_display', $wd_default_data['woo']['config']['default']['rating']);
				    $data['show_price']  			= wd_get_theme_option($pre.'layout_product_config_price_display', $wd_default_data['woo']['config']['default']['price']);
				    $data['show_price_decimal']  	= wd_get_theme_option($pre.'layout_product_config_price_decimal_display', $wd_default_data['woo']['config']['default']['price_decimal']);
				    $data['show_meta']  			= wd_get_theme_option($pre.'layout_product_config_meta_display', $wd_default_data['woo']['config']['default']['meta']);

				    $data['product_summary_layout'] = wd_get_theme_option($pre.'layout_single_product_summary_layout', $wd_default_data['woo']['single']['default']['summary_layout']);
				    $data['hover_thumbnail'] 		= wd_get_theme_option($pre.'product_effect_hover_thumbnail', $wd_default_data['woo']['visual']['default']['hover_thumbnail']);
					break;

				case 'content-product':
					$data['display_buttons']    	= wd_get_theme_option($pre.'layout_product_config_display_buttons', $wd_default_data['woo']['config']['default']['display_buttons']);

					$data['hover_thumbnail'] 		= wd_get_theme_option($pre.'product_effect_hover_thumbnail', $wd_default_data['woo']['visual']['default']['hover_thumbnail']);
					$data['style_hover_product'] 	= wd_get_theme_option($pre.'product_effect_hover_style', $wd_default_data['woo']['visual']['default']['hover_style']);
					$data['button_group_position'] 	= wd_get_theme_option($pre.'layout_product_config_button_group_position', $wd_default_data['woo']['config']['default']['button_position']);
					break;

				case 'product-description':
					$data['show_description']  		= wd_get_theme_option($pre.'layout_product_config_description_display', $wd_default_data['woo']['config']['default']['desc']);
					$data['number_word']  			= wd_get_theme_option($pre.'layout_product_config_number_desc_word', $wd_default_data['woo']['config']['default']['desc_word']);
					break;

				case 'single-product':
					$data['layout'] 				= wd_get_theme_option($pre.'layout_single_product_layout', $wd_default_data['layout']['default']['single_product']);
					$data['full_width_detail'] 		= wd_get_theme_option($pre.'layout_single_product_fullwidth_layout', $wd_default_data['woo']['single']['default']['fullwidth']);
					$data['content_after_summary'] 	= wd_get_theme_option($pre.'layout_single_product_summary_custom_shortcode', $wd_default_data['woo']['single']['default']['custom_shortcode']);
					break;

				case 'content-single-product':
					$data['layout'] 				= wd_get_theme_option($pre.'layout_single_product_layout', $wd_default_data['layout']['default']['single_product']);
					$data['sidebar_left'] 			= wd_get_theme_option($pre.'layout_single_product_left_sidebar', $wd_default_data['sidebar']['default']['single_product_left']);
					$data['sidebar_right'] 			= wd_get_theme_option($pre.'layout_single_product_right_sidebar', $wd_default_data['sidebar']['default']['single_product_right']);
					$data['full_width_detail'] 		= wd_get_theme_option($pre.'layout_single_product_fullwidth_layout', $wd_default_data['woo']['single']['default']['fullwidth']);
					break;

				case 'single-product-thumbnail':
					$data['thumbnail_number'] 		= wd_get_theme_option($pre.'layout_single_product_thumbnail_number', $wd_default_data['woo']['single']['default']['thumbnail_number']);
					$data['position_additional'] 	= wd_get_theme_option($pre.'layout_single_product_position_thumbnail', $wd_default_data['woo']['single']['default']['position_thumbnail']);
					break;

				case 'cart':
					$data['payment_method'] 		= wd_get_theme_option($pre.'layout_cart_page_payment_method', $wd_default_data['woo']['cart_page']['default']['payment_method']);
					$data['content_shortcode'] 		= wd_get_theme_option($pre.'layout_cart_page_custom_shortcode', $wd_default_data['woo']['cart_page']['default']['custom_shortcode']);
					break;

				case 'mini-cart':
					$data['layout'] 				= wd_get_theme_option($pre.'mini_cart_sorter', $wd_default_data['woo']['mini_cart']['default']['sorter']);
					$data['cart_icon'] 				= wd_get_theme_option($pre.'mini_cart_icon', $wd_default_data['woo']['mini_cart']['default']['cart_icon']);
					break;

				case '404':
					$data['select_style'] 			= wd_get_theme_option($pre.'layout_page_404_background_style', $wd_default_data['404_page']['default']['bg_style']);
					$data['bg_404_url'] 			= wd_get_theme_option($pre.'layout_page_404_background_image', $wd_default_data['404_page']['default']['bg_image'], 'image');
					$data['bg_404_color']  			= wd_get_theme_option($pre.'layout_page_404_background_color', $wd_default_data['404_page']['default']['bg_color']);
					$data['show_search_form'] 		= wd_get_theme_option($pre.'layout_page_404_show_search_form', $wd_default_data['404_page']['default']['search_form']);
					$data['show_back_to_home_btn'] 	= wd_get_theme_option($pre.'layout_page_404_show_back_to_home_button', $wd_default_data['404_page']['default']['button']);
					$data['back_to_home_btn_text'] 	= wd_get_theme_option($pre.'layout_page_404_show_back_to_home_button_text', $wd_default_data['404_page']['default']['button_text']);
					$data['back_to_home_btn_class'] = wd_get_theme_option($pre.'layout_page_404_show_back_to_home_button_class', $wd_default_data['404_page']['default']['button_class']);
					$data['show_header_footer'] 	= wd_get_theme_option($pre.'layout_page_404_show_header_footer', $wd_default_data['404_page']['default']['header_footer']);
					$data['content_shortcode'] 		= wd_get_theme_option($pre.'layout_page_404_custom_shortcode', $wd_default_data['404_page']['default']['custom_shortcode']);
					break;

				case 'search-style':
					$data['select_style'] 			= wd_get_theme_option($pre.'layout_page_search_background_style', $wd_default_data['search_page']['default']['bg_style']);
					$data['bg_search_url'] 			= wd_get_theme_option($pre.'layout_page_search_background_image', $wd_default_data['search_page']['default']['bg_image'], 'image');
					$data['bg_search_color']  		= wd_get_theme_option($pre.'layout_page_search_background_color', $wd_default_data['search_page']['default']['bg_color']);
					break;

				case 'search-form':
					$data['type'] 					= wd_get_theme_option($pre.'layout_page_search_type', $wd_default_data['search_page']['default']['type']);
					$data['autocomplete'] 			= wd_get_theme_option($pre.'layout_page_search_autocomplete', $wd_default_data['search_page']['default']['autocomplete']);
					$data['ajax'] 					= wd_get_theme_option($pre.'layout_page_search_ajax', $wd_default_data['search_page']['default']['ajax']);
					break;

				case 'search-layout':
					$data['layout'] 				= wd_get_theme_option($pre.'layout_page_search_layout', $wd_default_data['layout']['default']['page_search']);
					$data['sidebar_left'] 			= wd_get_theme_option($pre.'layout_page_search_left_sidebar', $wd_default_data['sidebar']['default']['page_search_left']);
					$data['sidebar_right'] 			= wd_get_theme_option($pre.'layout_page_search_right_sidebar', $wd_default_data['sidebar']['default']['page_search_right']);
					$data['type'] 					= wd_get_theme_option($pre.'layout_page_search_type', $wd_default_data['search_page']['default']['type']);
					$data['columns'] 				= wd_get_theme_option($pre.'layout_page_search_columns', $wd_default_data['columns']['default']['page_search']);
					break;

				case 'back_to_top':
					$data['scroll_button']    		= wd_get_theme_option($pre.'back_to_top_display', $wd_default_data['back_to_top']['default']['display']);
					$data['button_style']    		= wd_get_theme_option($pre.'back_to_top_style', $wd_default_data['back_to_top']['default']['style']);
					$data['border_color']    		= wd_get_theme_option($pre.'back_to_top_border_color', $wd_default_data['back_to_top']['default']['border_color']);
					$data['background_color']    	= wd_get_theme_option($pre.'back_to_top_background_color', $wd_default_data['back_to_top']['default']['bg_color']);
					$data['background_shape']    	= wd_get_theme_option($pre.'back_to_top_background_shape', $wd_default_data['back_to_top']['default']['bg_shape']);
					$data['class_icon']    			= wd_get_theme_option($pre.'back_to_top_select_icon', $wd_default_data['back_to_top']['default']['icon']);
					$data['color_icon']    			= wd_get_theme_option($pre.'back_to_top_icon_color', $wd_default_data['back_to_top']['default']['icon_color']);
					$data['width']	  				= wd_get_theme_option($pre.'back_to_top_width', $wd_default_data['back_to_top']['default']['width']);
					$data['height']	  				= wd_get_theme_option($pre.'back_to_top_height', $wd_default_data['back_to_top']['default']['height']);
					$data['right']	  				= wd_get_theme_option($pre.'back_to_top_right', $wd_default_data['back_to_top']['default']['right']);
					$data['bottom']	  				= wd_get_theme_option($pre.'back_to_top_bottom', $wd_default_data['back_to_top']['default']['bottom']);
					break;

				case 'social_share':
					$data['display_social']    		= wd_get_theme_option($pre.'share_button_display', $wd_default_data['social_share']['default']['display']);
					$data['pubid']    				= wd_get_theme_option($pre.'share_button_custom_pubid', $wd_default_data['social_share']['default']['pubid']);
					break;

				default:
					break;
			}
		}else { 
			switch ($template) { 
				case 'background':
					$data['bg_display']	  			= $wd_default_data['general']['default']['bg_display']; 
					$data['bg_image']	  			= $wd_default_data['general']['default']['bg_body'];  
					break;

				case 'favicon':
					$data['icon']	  				= get_theme_mod($pre.'header_favicon', $wd_default_data['general']['default']['favicon']); 
					break;

				case 'loading-effect':
					$data['status']	  				= get_theme_mod($pre.'loading_effect', $wd_default_data['effects']['default']['loading']); 
					break;

				case 'js-effect':
					$data['sidebar_scroll']	  		= get_theme_mod($pre.'sidebar_fixed_effect', $wd_default_data['effects']['default']['sidebar_fixed']); 
					break;

				case 'accessibility':
					$data['chatbox_status']	  		= $wd_default_data['fb_chatbox']['default']['display'];
					$data['popup_email']	  		= $wd_default_data['email_popup']['default']['display']; 
					$data['popup_only_home']	  	= $wd_default_data['email_popup']['default']['only_home']; 
					$data['popup_mobile']	  		= $wd_default_data['email_popup']['default']['popup_mobile'];
					$data['popup_email_width']	  	= $wd_default_data['email_popup']['default']['width']; 
					$data['popup_email_height']	  	= $wd_default_data['email_popup']['default']['height']; 
					$data['popup_delay_time']	  	= $wd_default_data['email_popup']['default']['delay_time']; 
					break;

				case 'facebook-api':
					$data['user_id']	  			= $wd_default_data['general']['default']['user_id']; 
					$data['app_id']	  				= $wd_default_data['general']['default']['app_id']; 
					$data['comment_status']	  		= $wd_default_data['comment']['default']['sorter']; 
					$data['chatbox_status']	  		= $wd_default_data['fb_chatbox']['default']['display']; 
					break;

				case 'facebook-chatbox':
					$data['chatbox_status']	  		= $wd_default_data['fb_chatbox']['default']['display'];
					$data['url']	  				= $wd_default_data['fb_chatbox']['default']['url'];
					$data['width']	  				= $wd_default_data['fb_chatbox']['default']['width'];
					$data['height']	  				= $wd_default_data['fb_chatbox']['default']['height'];
					$data['right']	  				= $wd_default_data['fb_chatbox']['default']['right'];
					$data['bottom']	  				= $wd_default_data['fb_chatbox']['default']['bottom'];
					$data['default_mode']	  		= $wd_default_data['fb_chatbox']['default']['default_mode'];
					$data['bg_color']	  			= $wd_default_data['fb_chatbox']['default']['bg_color'];
					$data['logo']	  				= $wd_default_data['fb_chatbox']['default']['logo'];
					$data['text_footer']	  		= $wd_default_data['fb_chatbox']['default']['text_footer'];
					$data['link_caption']	  		= $wd_default_data['fb_chatbox']['default']['link_caption'];
					$data['link_url']	  			= $wd_default_data['fb_chatbox']['default']['link_url'];
					break;

				case 'email-popup':
					$data['display']	  			= $wd_default_data['email_popup']['default']['display']; 
					$data['popup_only_home']	  	= $wd_default_data['email_popup']['default']['only_home']; 
					$data['popup_mobile']	  		= $wd_default_data['email_popup']['default']['popup_mobile'];
					$data['banner']	  				= $wd_default_data['email_popup']['default']['banner']; 
					$data['source']	  				= $wd_default_data['email_popup']['default']['source']; 
					$data['custom_content']	  		= $wd_default_data['email_popup']['default']['custom_content']; 
					$data['feedburner_id']	  		= $wd_default_data['email_popup']['default']['feedburner_id']; 
					$data['width']	  				= $wd_default_data['email_popup']['default']['width']; 
					$data['height']	  				= $wd_default_data['email_popup']['default']['height']; 
					$data['title']	  				= $wd_default_data['email_popup']['default']['title']; 
					$data['desc']	  				= $wd_default_data['email_popup']['default']['desc']; 
					$data['placeholder']	  		= $wd_default_data['email_popup']['default']['placeholder']; 
					$data['button_text']	  		= $wd_default_data['email_popup']['default']['button_text']; 
					$data['delay_time']	  			= $wd_default_data['email_popup']['default']['delay_time']; 
					$data['session_expire']	  		= $wd_default_data['email_popup']['default']['session_expire']; 
					break;

				case 'comment':
					$data['comment_status']	  		= $wd_default_data['comment']['default']['sorter']; 
					$data['comment_mode']	  		= $wd_default_data['comment']['default']['mode']; 
					$data['num_comment']	  		= $wd_default_data['comment']['default']['number_comment']; 
					break;

				case 'comment-layout':
					$data['display_tab']	  		= $wd_default_data['comment']['default']['layout']; 
					break;

				case 'header-default':
					$data['show_logo_title']	  	= get_theme_mod($pre.'header_show_logo_title', $wd_default_data['header']['default']['site_title']); 
					$data['logo_default']	  		= $wd_default_data['general']['default']['logo']; 
					$data['logo_url']	  		  	= get_theme_mod($pre.'header_logo_url', $wd_default_data['general']['default']['logo']); 
					$data['menu_location']	  		= get_theme_mod($pre.'header_menu_location', $wd_default_data['header']['default']['menu_location']); 
					break;

				case 'footer-default':
					$data['logo_default']	  		= $wd_default_data['general']['default']['logo']; 
					$data['logo_url']	  			= get_theme_mod($pre.'footer_logo_url', $wd_default_data['general']['default']['logo-footer']);
					$data['copyright'] 				= get_theme_mod($pre.'footer_copyright_text', $wd_default_data['footer']['default']['copyright_text']);
					break;

				case 'breadcrumb-default':
					$data['layout_breadcrumbs']		= get_theme_mod($pre.'breadcrumb', $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= get_theme_mod($pre.'banner_breadcrumb', $wd_default_data['breadcrumb']['default']['background']);
					$data['height']					= get_theme_mod($pre.'banner_breadcrumb_height', $wd_default_data['breadcrumb']['default']['height']);
					$data['color_breadcrumbs']		= get_theme_mod($pre.'color_breadcrumb', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= get_theme_mod($pre.'banner_breadcrumb_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= get_theme_mod($pre.'banner_breadcrumb_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= get_theme_mod($pre.'banner_breadcrumb_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'breadcrumb-custom-setting':
					$data['blog_archive']			= $wd_default_data['breadcrumb']['default']['blog_archive'];
					$data['product_archive']		= $wd_default_data['breadcrumb']['default']['product_archive'];
					$data['woo_special_page']		= $wd_default_data['breadcrumb']['default']['woo_special_page'];
					$data['search_page']			= $wd_default_data['breadcrumb']['default']['search_page'];
					break;

				case 'breadcrumb-blog-archive':
					$data['layout_breadcrumbs']		= get_theme_mod($pre.'breadcrumb', $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= get_theme_mod($pre.'banner_breadcrumb', $wd_default_data['breadcrumb']['default']['background']);
					$data['height']					= get_theme_mod($pre.'banner_breadcrumb_height', $wd_default_data['breadcrumb']['default']['height']);
					$data['color_breadcrumbs']		= get_theme_mod($pre.'color_breadcrumb', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= get_theme_mod($pre.'banner_breadcrumb_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= get_theme_mod($pre.'banner_breadcrumb_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= get_theme_mod($pre.'banner_breadcrumb_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'breadcrumb-product-archive':
					$data['layout_breadcrumbs']		= get_theme_mod($pre.'breadcrumb', $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= get_theme_mod($pre.'banner_breadcrumb', $wd_default_data['breadcrumb']['default']['background']);
					$data['height']					= get_theme_mod($pre.'banner_breadcrumb_height', $wd_default_data['breadcrumb']['default']['height']);
					$data['color_breadcrumbs']		= get_theme_mod($pre.'color_breadcrumb', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= get_theme_mod($pre.'banner_breadcrumb_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= get_theme_mod($pre.'banner_breadcrumb_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= get_theme_mod($pre.'banner_breadcrumb_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'breadcrumb-woo-special-page':
					$data['layout_breadcrumbs']		= get_theme_mod($pre.'breadcrumb', $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= get_theme_mod($pre.'banner_breadcrumb', $wd_default_data['breadcrumb']['default']['background']);
					$data['height']					= get_theme_mod($pre.'banner_breadcrumb_height', $wd_default_data['breadcrumb']['default']['height']);
					$data['color_breadcrumbs']		= get_theme_mod($pre.'color_breadcrumb', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= get_theme_mod($pre.'banner_breadcrumb_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= get_theme_mod($pre.'banner_breadcrumb_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= get_theme_mod($pre.'banner_breadcrumb_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'breadcrumb-search-page':
					$data['layout_breadcrumbs']		= get_theme_mod($pre.'breadcrumb', $wd_default_data['breadcrumb']['default']['type']);
					$data['image_breadcrumbs']		= get_theme_mod($pre.'banner_breadcrumb', $wd_default_data['breadcrumb']['default']['background']);
					$data['height']					= get_theme_mod($pre.'banner_breadcrumb_height', $wd_default_data['breadcrumb']['default']['height']);
					$data['color_breadcrumbs']		= get_theme_mod($pre.'color_breadcrumb', $wd_default_data['breadcrumb']['default']['bg_color']);
					$data['text_color']				= get_theme_mod($pre.'banner_breadcrumb_text_color', $wd_default_data['breadcrumb']['default']['text_color']);
					$data['text_style']				= get_theme_mod($pre.'banner_breadcrumb_text_style', $wd_default_data['breadcrumb']['default']['text_style']);
					$data['text_align']				= get_theme_mod($pre.'banner_breadcrumb_text_align', $wd_default_data['breadcrumb']['default']['text_align']);
					break;

				case 'default-page':
					$data['layout'] 				= get_theme_mod($pre.'default_page_layout', $wd_default_data['layout']['default']['page_default']);
					$data['sidebar_left'] 			= get_theme_mod($pre.'default_page_sidebar_left', $wd_default_data['sidebar']['default']['page_default_left']);
					$data['sidebar_right'] 			= get_theme_mod($pre.'default_page_sidebar_right', $wd_default_data['sidebar']['default']['page_default_right']);
					break;
 
 				//archive.php
				case 'archive-blog':
					$data['layout'] 				= get_theme_mod($pre.'archive_blog_layout', $wd_default_data['layout']['default']['blog_archive']);
					$data['sidebar_left'] 			= get_theme_mod($pre.'archive_blog_sidebar_left' , $wd_default_data['sidebar']['default']['blog_archive_left']);
					$data['sidebar_right'] 			= get_theme_mod($pre.'archive_blog_sidebar_right', $wd_default_data['sidebar']['default']['blog_archive_right']);
					$data['show_by_post_format'] 	= get_theme_mod($pre.'genneral_blog_show_by_post_format', $wd_default_data['blog']['config']['default']['show_by_post_format']);
					$data['layout_style'] 			= get_theme_mod($pre.'archive_blog_style', $wd_default_data['blog']['archive']['default']['style']);
					break;

				//index.php
				case 'default-blog-page':
					$data['layout'] 				= get_theme_mod($pre.'default_blog_layout', $wd_default_data['layout']['default']['blog_default']);
					$data['sidebar_left'] 			= get_theme_mod($pre.'default_blog_sidebar_left', $wd_default_data['sidebar']['default']['blog_default_left']);
					$data['sidebar_right'] 			= get_theme_mod($pre.'default_blog_sidebar_right', $wd_default_data['sidebar']['default']['blog_default_right']);
					$data['show_by_post_format'] 	= get_theme_mod($pre.'genneral_blog_show_by_post_format', $wd_default_data['blog']['config']['default']['show_by_post_format']);
					$data['layout_style'] 			= get_theme_mod($pre.'default_blog_style', $wd_default_data['blog']['index']['default']['style']);
					break;

				case 'blog-related':
					$data['grid_list_layout'] 		= get_theme_mod($pre.'single_blog_recent_post_style', $wd_default_data['blog']['single']['default']['recent_style']);
					$data['columns'] 				= get_theme_mod($pre.'single_blog_recent_post_columns', $wd_default_data['columns']['default']['blog_recent']);
					break;

				case 'content-blog':
					$data['show_title']  			= get_theme_mod($pre.'genneral_blog_show_title', $wd_default_data['blog']['config']['default']['title']);
				 	$data['show_thumbnail']  		= get_theme_mod($pre.'genneral_blog_show_thumbnail', $wd_default_data['blog']['config']['default']['thumbnail']);
				 	$data['placeholder_image']  	= get_theme_mod($pre.'genneral_blog_show_placeholder_image', $wd_default_data['blog']['config']['default']['placeholder']);
				 	$data['show_date']  			= get_theme_mod($pre.'genneral_blog_show_date', $wd_default_data['blog']['config']['default']['date']);
				 	$data['show_meta']  			= get_theme_mod($pre.'genneral_blog_show_meta', $wd_default_data['blog']['config']['default']['meta']);
				 	$data['show_author']  			= get_theme_mod($pre.'genneral_blog_show_author', $wd_default_data['blog']['config']['default']['author']);
				 	$data['show_number_comments']  	= get_theme_mod($pre.'genneral_blog_show_number_comment', $wd_default_data['blog']['config']['default']['comment']);
				 	$data['show_tag']  				= get_theme_mod($pre.'genneral_blog_show_tag', $wd_default_data['blog']['config']['default']['tag']);
				 	$data['show_category']  		= get_theme_mod($pre.'genneral_blog_show_category', $wd_default_data['blog']['config']['default']['category']);
				 	$data['show_excerpt']  			= get_theme_mod($pre.'genneral_blog_show_excerpt', $wd_default_data['blog']['config']['default']['excerpt']);
				 	$data['number_excerpt']  		= get_theme_mod($pre.'genneral_blog_number_excerpt', $wd_default_data['blog']['config']['default']['excerpt_word']);
				 	$data['show_readmore']  		= get_theme_mod($pre.'genneral_blog_show_read_more', $wd_default_data['blog']['config']['default']['readmore']);
					break;

				case 'single-blog':
					$data['layout'] 				= get_theme_mod($pre.'single_blog_layout', $wd_default_data['layout']['default']['blog_single']);
					$data['sidebar_left'] 			= get_theme_mod($pre.'single_blog_sidebar_left', $wd_default_data['sidebar']['default']['blog_single_left']);
					$data['sidebar_right'] 			= get_theme_mod($pre.'single_blog_sidebar_right', $wd_default_data['sidebar']['default']['blog_single_right']);

					$data['show_author_information'] = get_theme_mod($pre.'single_blog_author_information', $wd_default_data['blog']['single']['default']['author']);
					$data['show_previous_next_btn'] = get_theme_mod($pre.'single_blog_previous_next_button', $wd_default_data['blog']['single']['default']['previous_next']);
					$data['show_recent_blog'] 		= get_theme_mod($pre.'single_blog_recent_post', $wd_default_data['blog']['single']['default']['recent']);

					$data['show_title']  			= get_theme_mod($pre.'genneral_blog_show_title', $wd_default_data['blog']['config']['default']['title']);
				 	$data['show_thumbnail']  		= get_theme_mod($pre.'genneral_blog_show_thumbnail', $wd_default_data['blog']['config']['default']['thumbnail']);
				 	$data['show_date']  			= get_theme_mod($pre.'genneral_blog_show_date', $wd_default_data['blog']['config']['default']['date']);
				 	$data['show_author']  			= get_theme_mod($pre.'genneral_blog_show_author', $wd_default_data['blog']['config']['default']['author']);
				 	$data['show_number_comments']  	= get_theme_mod($pre.'genneral_blog_show_number_comment', $wd_default_data['blog']['config']['default']['comment']);
				 	$data['show_tag']  				= get_theme_mod($pre.'genneral_blog_show_tag', $wd_default_data['blog']['config']['default']['tag']);
				 	$data['show_category']  		= get_theme_mod($pre.'genneral_blog_show_category', $wd_default_data['blog']['config']['default']['category']);
				 	$data['show_excerpt']  			= get_theme_mod($pre.'genneral_blog_show_excerpt', $wd_default_data['blog']['config']['default']['excerpt']);
				 	$data['number_excerpt']  		= get_theme_mod($pre.'genneral_blog_number_excerpt', $wd_default_data['blog']['config']['default']['excerpt_word']);
				 	$data['show_readmore']  		= get_theme_mod($pre.'genneral_blog_show_read_more', $wd_default_data['blog']['config']['default']['readmore']);
					break;

				case 'archive-product':
					$data['layout'] 				= get_theme_mod($pre.'archive_product_layout', $wd_default_data['layout']['default']['product_archive']);
					$data['sidebar_left'] 			= get_theme_mod($pre.'archive_product_sidebar_left', $wd_default_data['sidebar']['default']['archive_product_left']);
				   	$data['sidebar_right'] 			= get_theme_mod($pre.'archive_product_sidebar_right', $wd_default_data['sidebar']['default']['archive_product_right']);
				   	$data['columns_product'] 		= get_theme_mod($pre.'archive_columns_product', $wd_default_data['columns']['default']['product_archive']);
				   	$data['custom_shortcode'] 		= get_theme_mod($pre.'archive_product_shortcode', $wd_default_data['woo']['archive']['default']['custom_shortcode']);
					break;

				case 'product-archive-posts-per-page':
					$data['posts_per_page'] 		= get_theme_mod($pre.'archive_number_perpage', $wd_default_data['woo']['archive']['default']['posts_per_page']);
					break;

				case 'product-loop-title-word':
					$data['title_word'] 			= get_theme_mod($pre.'genneral_number_title_word', $wd_default_data['woo']['config']['default']['title_word']);
					break;

				case 'woocommerce-page':
					$data['layout']  				= get_theme_mod($pre.'page_woocommerce_layout', $wd_default_data['layout']['default']['product_archive']);
					$data['sidebar_left']  			= get_theme_mod($pre.'page_woocommerce_sidebar_left', $wd_default_data['sidebar']['default']['woo_template_left']);
					$data['sidebar_right']  		= get_theme_mod($pre.'page_woocommerce_sidebar_right', $wd_default_data['sidebar']['default']['woo_template_right']);
					$data['custom_shortcode'] 		= get_theme_mod($pre.'page_woocommerce_shortcode', $wd_default_data['woo']['woo_template']['default']['custom_shortcode']);
					break;

				case 'product-config':
					$data['display_buttons']    	= get_theme_mod($pre.'genneral_display_buttons', $wd_default_data['woo']['config']['default']['display_buttons']);

				    $data['show_title']    			= get_theme_mod($pre.'genneral_show_title', $wd_default_data['woo']['config']['default']['title']);
				    $data['show_description']  		= get_theme_mod($pre.'genneral_show_description', $wd_default_data['woo']['config']['default']['desc']);
				    $data['show_rating']  			= get_theme_mod($pre.'genneral_show_rating', $wd_default_data['woo']['config']['default']['rating']);
				    $data['show_price']  			= get_theme_mod($pre.'genneral_show_price', $wd_default_data['woo']['config']['default']['price']);
				    $data['show_meta']  			= get_theme_mod($pre.'genneral_show_meta', $wd_default_data['woo']['config']['default']['meta']);
					break;

				case 'product-effect':
					$data['popup_cart']    			= get_theme_mod($pre.'product_effect_popup_cart', $wd_default_data['woo']['visual']['default']['popup_cart']);
					$data['popup_width']    		= $wd_default_data['woo']['visual']['default']['popup_width'];
					$data['popup_height']    		= $wd_default_data['woo']['visual']['default']['popup_height'];
					break;

				case 'product-sale-flash':
					$data['text']    				= $wd_default_data['woo']['sale_flash']['default']['text'];
					$data['show_percent']    		= $wd_default_data['woo']['sale_flash']['default']['percent'];
					break;

				case 'woo_hook':
					$data['display_buttons']    	= get_theme_mod($pre.'genneral_display_buttons', $wd_default_data['woo']['config']['default']['display_buttons']);

					$data['wishlist_default']    	= get_theme_mod($pre.'genneral_wishlist_default', $wd_default_data['woo']['config']['default']['wishlist_default']);
					$data['compare_default']    	= get_theme_mod($pre.'genneral_compare_default', $wd_default_data['woo']['config']['default']['compare_default']);
					$data['show_recently_product']  = get_theme_mod($pre.'single_recently_product', $wd_default_data['woo']['single']['default']['recent']);
					$data['show_upsell_product']    = get_theme_mod($pre.'single_upsell_product', $wd_default_data['woo']['single']['default']['upsell']);

				    $data['show_title']    			= get_theme_mod($pre.'genneral_show_title', $wd_default_data['woo']['config']['default']['title']);
				    $data['show_description']  		= get_theme_mod($pre.'genneral_show_description', $wd_default_data['woo']['config']['default']['desc']);
				    $data['show_rating']  			= get_theme_mod($pre.'genneral_show_rating', $wd_default_data['woo']['config']['default']['rating']);
				    $data['show_price']  			= get_theme_mod($pre.'genneral_show_price', $wd_default_data['woo']['config']['default']['price']);
				    $data['show_price_decimal']  	= get_theme_mod($pre.'genneral_show_price_decimal', $wd_default_data['woo']['config']['default']['price_decimal']);
				    $data['show_meta']  			= get_theme_mod($pre.'genneral_show_meta', $wd_default_data['woo']['config']['default']['meta']);

				    $data['product_summary_layout'] = $wd_default_data['woo']['single']['default']['summary_layout'];
				    $data['hover_thumbnail'] 		= get_theme_mod($pre.'product_effect_hover_thumbnail', $wd_default_data['woo']['visual']['default']['hover_thumbnail']);
					break;

				case 'content-product':
					$data['display_buttons']    	= get_theme_mod($pre.'genneral_display_buttons', $wd_default_data['woo']['config']['default']['display_buttons']);

					$data['hover_thumbnail'] 		= get_theme_mod($pre.'product_effect_hover_thumbnail', $wd_default_data['woo']['visual']['default']['hover_thumbnail']);;
					$data['style_hover_product'] 	= get_theme_mod($pre.'product_effect_hover_button', $wd_default_data['woo']['visual']['default']['hover_style']);
					$data['button_group_position'] 	= get_theme_mod($pre.'genneral_button_group_position', $wd_default_data['woo']['config']['default']['button_position']);
					break;

				case 'product-description':
					$data['show_description']  		= get_theme_mod($pre.'genneral_show_description', $wd_default_data['woo']['config']['default']['desc']);
					$data['number_word']  			= get_theme_mod($pre.'genneral_number_description_word', $wd_default_data['woo']['config']['default']['desc_word']);
					break;

				case 'single-product':
					$data['layout'] 				= get_theme_mod($pre.'single_product_layout', $wd_default_data['layout']['default']['single_product']);
					$data['full_width_detail'] 		= get_theme_mod($pre.'single_product_full_width', $wd_default_data['woo']['single']['default']['fullwidth']);
					$data['content_after_summary'] 	= get_theme_mod($pre.'single_product_shortcode', $wd_default_data['woo']['single']['default']['custom_shortcode']);
					break; 

				case 'content-single-product':
					$data['layout'] 				= get_theme_mod($pre.'single_product_layout', $wd_default_data['layout']['default']['single_product']);
					$data['sidebar_left'] 			= get_theme_mod($pre.'single_product_sidebar_left', $wd_default_data['sidebar']['default']['single_product_left']);
					$data['sidebar_right'] 			= get_theme_mod($pre.'single_product_sidebar_right', $wd_default_data['sidebar']['default']['single_product_right']);
					$data['full_width_detail'] 		= get_theme_mod($pre.'single_product_full_width', $wd_default_data['woo']['single']['default']['fullwidth']);
					break;

				case 'single-product-thumbnail':
					$data['thumbnail_number'] 		= get_theme_mod($pre.'single_product_thumbnail_number', $wd_default_data['woo']['single']['default']['thumbnail_number']);
					$data['position_additional'] 	= get_theme_mod($pre.'single_product_additional_image', $wd_default_data['woo']['single']['default']['position_thumbnail']);
					break;

				case 'cart':
					$data['payment_method'] 		= get_theme_mod($pre.'cart_payment_method', $wd_default_data['woo']['cart_page']['default']['payment_method']);
					$data['content_shortcode'] 		= get_theme_mod($pre.'cart_shortcode', $wd_default_data['woo']['cart_page']['default']['custom_shortcode']);
					break;

				case 'mini-cart':
					$data['layout'] 				= $wd_default_data['woo']['mini_cart']['default']['sorter'];
					$data['cart_icon'] 				= $wd_default_data['woo']['mini_cart']['default']['cart_icon'];
					break;

				case '404':
					$data['select_style'] 			= get_theme_mod($pre.'page_404_select_style' , $wd_default_data['404_page']['default']['bg_style']);
					$data['bg_404_url']  			= get_theme_mod($pre.'page_404_bg_image', $wd_default_data['404_page']['default']['bg_image']);
					$data['bg_404_color']  			= get_theme_mod($pre.'page_404_bg_color', $wd_default_data['404_page']['default']['bg_color']);
					$data['show_search_form'] 		= get_theme_mod($pre.'page_404_show_search_form', $wd_default_data['404_page']['default']['search_form']);
					$data['show_back_to_home_btn'] 	= get_theme_mod($pre.'page_404_show_back_to_home_button', $wd_default_data['404_page']['default']['button']);
					$data['back_to_home_btn_text'] 	= get_theme_mod($pre.'page_404_back_to_home_button_text', $wd_default_data['404_page']['default']['button_text']);
					$data['back_to_home_btn_class'] = get_theme_mod($pre.'page_404_back_to_home_button_class', $wd_default_data['404_page']['default']['button_class']);
					$data['show_header_footer'] 	= get_theme_mod($pre.'page_404_show_header_footer', $wd_default_data['404_page']['default']['header_footer']);
					$data['content_shortcode'] 		= get_theme_mod($pre.'page_404_shortcode', $wd_default_data['404_page']['default']['custom_shortcode']); 
					break;

				case 'search-style':
					$data['select_style'] 			= get_theme_mod($pre.'page_search_select_style' , $wd_default_data['search_page']['default']['bg_style']);
					$data['bg_search_url']  		= get_theme_mod($pre.'page_search_bg_image', $wd_default_data['search_page']['default']['bg_image']);
					$data['bg_search_color']  		= get_theme_mod($pre.'page_search_bg_color', $wd_default_data['search_page']['default']['bg_color']);
					break;

				case 'search-form':
					$data['type'] 					= get_theme_mod($pre.'page_search_select_type', $wd_default_data['search_page']['default']['type']);
					$data['autocomplete'] 			= get_theme_mod($pre.'page_search_autocomplete', $wd_default_data['search_page']['default']['autocomplete']);
					$data['ajax'] 					= get_theme_mod($pre.'page_search_ajax', $wd_default_data['search_page']['default']['ajax']);
					break;

				case 'search-layout':
					$data['layout'] 				= get_theme_mod($pre.'page_search_layout', $wd_default_data['layout']['default']['page_search']);
					$data['sidebar_left'] 			= get_theme_mod($pre.'page_search_sidebar_left' , $wd_default_data['sidebar']['default']['page_search_left']);
					$data['sidebar_right'] 			= get_theme_mod($pre.'page_search_sidebar_right', $wd_default_data['sidebar']['default']['page_search_right']);
					$data['type'] 					= get_theme_mod($pre.'page_search_select_type', $wd_default_data['search_page']['default']['type']);
					$data['columns'] 				= get_theme_mod($pre.'page_search_select_columns', $wd_default_data['columns']['default']['page_search']);
					break;

				case 'back_to_top':
					$data['scroll_button']    		= get_theme_mod($pre.'back_to_top_button', $wd_default_data['back_to_top']['default']['display']);
					$data['button_style']    		= get_theme_mod($pre.'back_to_top_button_style', $wd_default_data['back_to_top']['default']['style']);
					$data['border_color']    		= $wd_default_data['back_to_top']['default']['border_color'];
					$data['background_color']    	= get_theme_mod($pre.'back_to_top_button_background_color', $wd_default_data['back_to_top']['default']['bg_color']);
					$data['background_shape']    	= get_theme_mod($pre.'back_to_top_button_background_shape', $wd_default_data['back_to_top']['default']['bg_shape']);
					$data['class_icon']    			= get_theme_mod($pre.'back_to_top_button_icon', $wd_default_data['back_to_top']['default']['icon']);
					$data['color_icon']    			= get_theme_mod($pre.'back_to_top_button_icon_color', $wd_default_data['back_to_top']['default']['icon_color']);
					$data['width']	  				= $wd_default_data['back_to_top']['default']['width'];
					$data['height']	  				= $wd_default_data['back_to_top']['default']['height'];
					$data['right']	  				= $wd_default_data['back_to_top']['default']['right'];
					$data['bottom']	  				= $wd_default_data['back_to_top']['default']['bottom'];
					break;

				case 'social_share':
					$data['display_social']    		= get_theme_mod($pre.'social_share', $wd_default_data['social_share']['default']['display']);
					$data['pubid']    				= get_theme_mod($pre.'social_share_pubid', $wd_default_data['social_share']['default']['pubid']);
					break;

				default:
					break;
			}
		}
		return $data;
	}
}

if(!function_exists ('tvlgiao_wpdance_get_custom_data_by_keyname')){
	function tvlgiao_wpdance_get_custom_data_by_keyname( $keyname_customize, $keyname_theme_option, $default_value = '', $type = '' ) {
		// $type: '' / image / font
		if (TVLGIAO_WPDANCE_USE_CONTROL == 'customize') {
			$data = get_theme_mod( $keyname_customize, $default_value);
		}elseif (TVLGIAO_WPDANCE_USE_CONTROL == 'theme_option'){
			$data = wd_get_theme_option( $keyname_theme_option, $default_value, $type);
		}
		return $data;
	}
}

if(!function_exists ('wd_get_theme_option')){
	function wd_get_theme_option( $keyname, $default_value = '', $type = 'normal' ) {
		global $tvlgiao_wpdance_theme_options;
		$data = '';
		if (isset($tvlgiao_wpdance_theme_options[$keyname])) {
			if ($type == 'image') {
				$data = $tvlgiao_wpdance_theme_options[$keyname]['url'];
			}elseif ($type == 'font') {
				$data = $tvlgiao_wpdance_theme_options[$keyname]['font-family'];
			}elseif ($type == 'height') {
				$data = $tvlgiao_wpdance_theme_options[$keyname]['height'];
			}elseif ($type == 'width') {
				$data = $tvlgiao_wpdance_theme_options[$keyname]['width'];
			}else{
				$data = $tvlgiao_wpdance_theme_options[$keyname];
			}
		}else{
			$data = $default_value;
		}
		return $data;
	}
}

add_action ('redux/options/tvlgiao_wpdance_theme_options/saved', 'tvlgiao_wpdance_theme_option_replace_url');
if(!function_exists ('tvlgiao_wpdance_theme_option_replace_url')){
	function tvlgiao_wpdance_theme_option_replace_url() {
		$opt_name 			= 'tvlgiao_wpdance_theme_options';
		$url_old 			= Redux::getOption( $opt_name, 'tvlgiao_wpdance_replace_url_old');
		$url_new 			= Redux::getOption( $opt_name, 'tvlgiao_wpdance_replace_url_new');
		$image_theme_option = Redux::getOption( $opt_name, 'tvlgiao_wpdance_replace_url_image_theme_option');
		$site_database 		= Redux::getOption( $opt_name, 'tvlgiao_wpdance_replace_url_site_database');

		if (!$url_old || $url_old == $url_new) return;

		$url_old_array 		= array($url_old);
		//if old url is blank, use current url of site
		$url_new 			= (!$url_new) ? get_option( "siteurl", "" ) : $url_new;

		//update theme option image url
		if ($image_theme_option) {
			$list_key_need_replace = array(
				'tvlgiao_wpdance_logo',
				'tvlgiao_wpdance_favicon',
				'tvlgiao_wpdance_breadcrumb_background',
				'tvlgiao_wpdance_breadcrumb_archive_blog_background',
				'tvlgiao_wpdance_breadcrumb_archive_product_background',
				'tvlgiao_wpdance_breadcrumb_woo_special_page_background',
				'tvlgiao_wpdance_breadcrumb_search_page_background',
				'tvlgiao_wpdance_facebook_chatbox_logo',
				'tvlgiao_wpdance_header_logo',
				'tvlgiao_wpdance_footer_logo',
				'tvlgiao_wpdance_layout_page_404_background_image',
				'tvlgiao_wpdance_layout_page_search_background_image',
			);

			foreach ($list_key_need_replace as $key) {
				$data = Redux::getOption( $opt_name, $key );
				if (isset($data) && $data['url'] != '') {
					$data['url'] = str_replace($url_old_array, $url_new, $data['url']);
					Redux::setOption( $opt_name, $key, $data );
				}
			}
		}

		//update database
		if ($site_database) {
			global $wpdb;
			$wp_prefix = $wpdb->base_prefix;
			$result1 = $wpdb->query("update `{$wp_prefix}options` set `option_value`='{$url_new}' where `option_name` in('siteurl','home');");
			$result0 = $wpdb->query("update `{$wp_prefix}links` set `link_url` = replace(`link_url`, '{$url_old}', '{$url_new}');");
			$result2 = $wpdb->query("update `{$wp_prefix}posts` set `guid` = replace(`guid`, '{$url_old}', '{$url_new}');");
			$result3 = $wpdb->query("update `{$wp_prefix}posts` set `post_content` = replace(`post_content`, '{$url_old}', '{$url_new}');");
			$result4 = $wpdb->query("update `{$wp_prefix}postmeta` set `meta_value` = replace(`meta_value`, '{$url_old}', '{$url_new}');");
		}

		//reset form
		Redux::setOption( $opt_name, 'tvlgiao_wpdance_replace_url_old', '');
		Redux::setOption( $opt_name, 'tvlgiao_wpdance_replace_url_new', '');

		//clear transient menu
		tvlgiao_wpdance_update_menus_transient();
	}
} ?>