//****************************************************************//
/*							Main JS								  */
//****************************************************************//
jQuery(document).ready(function($) {
	"use strict";
	var window_width 	= jQuery(window).width();

	//Menu mega, menu mobile
	wd_menu_script();

	//Search Form
	wd_search_form();

	//Scroll Button
	wd_back_to_top_button();

	//Add custom class to body element
	wd_add_class_to_body();

	//Post masonry layout script
	wd_post_mansory('.post_mansory', '.gallery_item');
	wd_post_mansory('.wd-search-result-page-masonry', '.wd-search-result-item');

 	//Custom wishlist
	wd_wishlist();

	//tooltip bootstrap
	wd_tooltip();

	//Blog script
	wd_blog_script();

	//On window Resize
	window.addEventListener('resize', wd_window_resize);
});

//****************************************************************//
/*							FUNCTIONS							  */
//****************************************************************//

//On window Resize
if (typeof wd_window_resize != 'function') { 
	function wd_window_resize() {
		var win_width 	= jQuery(window).width();
		wd_top_menu_mobile_fixed(win_width);
		wd_fix_wpadminbar_position_on_mobile(win_width);
	}
}

//delegate Click element
if (typeof wd_delegate_click_element != 'function') { 
	function wd_delegate_click_element(element){
		//Sidebar Collapse mobile button
		jQuery( document ).delegate(element, 'click', function(e){
			e.preventDefault();
		});
	}
}


//Sidebar collapse mobile
if (typeof wd_sidebar_collapse_mobile != 'function') { 
	function wd_sidebar_collapse_mobile(){
	  	jQuery('.wd_sidebar_mobile').on('click', 'button.wd_show_sidebar_btn', function(){
	  		var _status = jQuery(this).attr('aria-expanded');
	  		if (_status !== 'true') {
		   	 	jQuery(this).find('i').addClass('lnr-chevron-up').removeClass('lnr-chevron-down');
	  		}else{
	  			jQuery(this).find('i').addClass('lnr-chevron-down').removeClass('lnr-chevron-up');
	  		}
		})
	}
}

//Menu fixed on mobile
if (typeof wd_top_menu_mobile_fixed != 'function') { 
	function wd_top_menu_mobile_fixed(win_width = '0'){
		var win_width 	= (win_width == '0') ? jQuery(window).width() : win_width;
		var logged_in 	= jQuery("body").hasClass("logged-in") ? true : false;
		var element 	= jQuery(".wd-header-mobile, #wd-pushmenu-mobile.pushmenu-left");
	    var top 		= (logged_in) ? 46 : 0;
	    var position 	= 'fixed';

		var content_start_wrap = jQuery("#wd-header-main-breadcrumb");
		if (!logged_in) {
       		content_start_wrap.css('padding-top','64px');
       	}else{
       		content_start_wrap.css('padding-top','4px');
       	}
       	
		var timer;
		jQuery(window).scroll(function () {
			if (timer) clearTimeout(timer);
		    timer = setTimeout(function(){
		       	var winTop 		= jQuery(window).scrollTop();
		       	if (win_width < 600) { //on mobile
		       		if (winTop > 46) { //if scroll over 46 px
		       			top         = 0;
		       		}else{
		       			top         = (logged_in) ? 46 : 0;
		       		}
		       	}
				element.css({"position":position,"top":top});
		    }, 100);
		});
	}
}

//Fix wpadminbar position on mobile
if (typeof wd_fix_wpadminbar_position_on_mobile != 'function') { 
	function wd_fix_wpadminbar_position_on_mobile(win_width = 992){
        // get adminbar height, 'css' will be true if bar is present, false if not
        var ah 		= jQuery( '#wpadminbar' ).outerHeight();
        var mobile  = (win_width <= 991 && typeof( ah ) !== 'undefined') ? true : false;
      	var $head 	= jQuery('head');

        // if 'css' is true, change value to CSS rules
        css = mobile 
			? 'html{margin-top:initial !important}'
                + 'body::before{content:"";height:' + ah + 'px;display:block}' 
				+ '.mobile{position:fixed;width:100%;top:0;left:0;}'
				+ 'body.logged-in .wd-header-mobile{position:fixed;width:100%;top:46px;}'
				+ 'body.logged-in{padding-top:60px;}'
				+ 'body .wd-header-mobile{position:fixed;width:100%;top:0px;}' 
            : mobile;

        // if this has been written before, remove old version
        $head.find('#wpadfx').remove();
        if (css) {
	        // append new if bar is present
	        $head.append('<style id="wpadfx">' + css + '</style>');
        }
	}
}


//Thickbox responsive
if (typeof wd_thickbox_responsive != 'function') { 
	function wd_thickbox_responsive(TB_WIDTH, TB_HEIGHT) {
		jQuery('.tb-close-icon').click(function() {
	        tb_remove();
	    });
	    
		var window_width 	= jQuery(window).width();
		var window_height 	= jQuery(window).height();

		if(TB_WIDTH > window_width || TB_HEIGHT > window_height){
			jQuery("#TB_window").css({margin: '2%'});
			jQuery("#TB_ajaxContent, #TB_iframeContent").css({width: '100%', height:'100%'});
			jQuery("#TB_closeWindowButton").css({fontSize: '24px', marginRight: '5px'});
		}
		if(TB_WIDTH > window_width){
			jQuery("#TB_window").css({width: '96%', left: 0});
			if(TB_HEIGHT > window_height){
				jQuery("#TB_window").css({height:'96%', top:0});
			}
		}else{
		    jQuery("#TB_window").css({marginLeft: '-' + parseInt((TB_WIDTH / 2),10) + 'px', width: TB_WIDTH + 'px'});
		}

		if(TB_HEIGHT > window_height || window_width < 768){
			jQuery("#TB_window").css({height:'96%', top:0});
			if(TB_WIDTH > window_width){
				jQuery("#TB_window").css({width: '96%', left: 0});
			}
		}else{
		    jQuery("#TB_window").css({marginTop: '-' + parseInt((TB_HEIGHT / 2),10) + 'px', height: TB_HEIGHT + 'px'});
		    jQuery("#TB_ajaxContent, #TB_iframeContent").css({height:TB_HEIGHT});
		}
	}
}

//Menu
if (typeof wd_menu_script != 'function') { 
	function wd_menu_script(){
		//Mega menu
		jQuery('a.wd-mega-menu').next().addClass('wd-mega-menu-wrap');
		
		//Menu Mobile
		jQuery(".menu-bars").click(function(){
			jQuery(".menu-bars, .pushmenu-left, .body-wrapper, body").toggleClass('pushmenu');      
		});
		jQuery(".pushmenu-left .nav ul li.page_item_has_children, .pushmenu-left .mobile-main-menu ul li.menu-item-has-children").prepend("<i class='fa fa-caret-down'></i>");
		
		jQuery(".pushmenu-left .nav ul li.page_item_has_children i, .pushmenu-left .mobile-main-menu ul li.menu-item-has-children i").click(function(){
			jQuery(this).toggleClass('openmenu');      
		});
	}
}

//Search form
if (typeof wd_search_form != 'function') { 
	function wd_search_form(){
		//Search Autocomplete
		jQuery( '.wd-search-with-autocomplete.wd-search-without-ajax' ).on('keydown', function(){
			jQuery(this).autocomplete({
				source: jQuery(this).data('autocomplete'),
		    });
		});
		
		//Search Hover
		var _form_text = jQuery( ".wd-search-form-default .wd-search-form-text" );
		var _form_wrap = _form_text.parent(".wd-search-form-wrapper");
		_form_text.focus(function() {
			if (!_form_wrap.hasClass("wd-search-typing")) {
				_form_wrap.addClass('wd-search-typing');
			}
		}).blur(function() {
			if (_form_wrap.hasClass("wd-search-typing")) {
				setTimeout(function(){ 
				  	_form_wrap.removeClass('wd-search-typing');
				}, 500);
			}
	    });

		//Search Popup
		jQuery(".popup").hide();

		jQuery(".wd-click-popup-search").click(function () {
			if(jQuery(".wd-popup-search" ).hasClass( "hidden" )){
				jQuery(".wd-popup-search").removeClass('hidden').addClass('show')	
			}else{
				jQuery(".wd-popup-search").removeClass('show').addClass('hidden')
			}
		});
		jQuery(".wd-search-close").click(function () {
			jQuery(".wd-popup-search").removeClass('show').addClass('hidden')
		});
	}
}

//Custom wishlist
if (typeof wd_wishlist != 'function') { 
	function wd_wishlist(){
		jQuery( "html .woocommerce table.wishlist_table tbody tr td.product-name" ).attr({
		  "data-title": "Product"
		});
		jQuery( "html .woocommerce table.wishlist_table tbody tr td.product-price" ).attr({
		  "data-title": "Price"
		});
		jQuery( "html .woocommerce table.wishlist_table tbody tr td.product-stock-status" ).attr({
		  "data-title": "Stock"
		});
	}
}

//Blog Script
if (typeof wd_blog_script != 'function') { 
	function wd_blog_script(){
		//Hide blog grid description
		jQuery('.wd-default-blog-archive.wd-blog-grid-style .wd-content-detail-post.wd-blog-desc-hidden, .wd-shortcode-special-blog.wd-blog-grid-style .wd-content-detail-post.wd-blog-desc-hidden').addClass('hidden');
	}
}

if (typeof wd_tooltip != 'function') { 
	function wd_tooltip(){
		jQuery('[data-toggle="tooltip"]').tooltip();
	}
}

if (typeof wd_add_class_to_body != 'function') { 
	function wd_add_class_to_body(){
		jQuery('body').addClass('loaded');
	}
}

//Blog Masonry
if (typeof wd_post_mansory != 'function') { 
	function wd_post_mansory(parent_element, item_element){
		setTimeout(function(){
			if(jQuery(parent_element).length > 0 ){
				jQuery(parent_element).each(function(index,value){
					var wrapper_width = jQuery(this).width();				
					var object_selector = '#'+jQuery(this).attr('id');
					var min_width = jQuery(value).attr('data-min');		
					var item_width = Math.floor(wrapper_width * min_width / 100);
					fix_gallery_item(object_selector,wrapper_width,min_width,item_width);

					jQuery(value).isotope({
						layoutMode: 'masonry',
						itemSelector: item_element,
						masonry: {
							columnWidth: item_width
						}
					});
					jQuery('img').load(function(){
						jQuery(value).isotope({
							layoutMode: 'masonry',
							itemSelector: item_element,
							masonry: {
								columnWidth: item_width
							}
						});
					});
				});	
			}
		}, 400);
	}
}

//Fix Gallery Item Masonry
if (typeof fix_gallery_item != 'function') { 
	function fix_gallery_item(object_selector,wrapper_width,min_width,item_width){
		jQuery( object_selector + " div.gallery_item" ).each(function() {
			var item_data_width = 	jQuery(this).attr('data-width');
			var item_width__ = Math.round(item_data_width / min_width) * item_width;
			//var item_width = Math.floor(wrapper_width * item_data_width / 100);
			jQuery( this).css({'width' : item_width__+'px'});
		});
	}
}

//Back to top Button
if (typeof wd_back_to_top_button != 'function') { 
	function wd_back_to_top_button(){
		if( jQuery('html').offset().top < 100 ){
			jQuery("#tvlgiao-back-to-top").hide();
		}
		var timer;
		jQuery(window).scroll(function () {
			if (timer) clearTimeout(timer);
		    timer = setTimeout(function(){
		       var winTop = jQuery(window).scrollTop();
				if (winTop > 100) {
					jQuery("#tvlgiao-back-to-top").fadeIn();
				} else {
					jQuery("#tvlgiao-back-to-top").fadeOut();
				}
		    }, 500);
		});
		jQuery("#tvlgiao-back-to-top").click(function(){
			jQuery('body,html').animate({
				scrollTop: '0px'
			}, 1000);
			return false;
		});
	}
}

//Scroll to a element
if (typeof wd_scroll_to_element != 'function') { 
	function wd_scroll_to_element(element){
		var position = jQuery(element).offset().top - 40;
	    jQuery('html,body').animate({
	        scrollTop: position}, 'slow');
	}
}