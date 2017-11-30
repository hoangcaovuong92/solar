jQuery(document).ready(function($){
	"use strict";
	var on_touch = checkIfTouchDevice();
	//PRODUCT GRID/LIST TOGGLE
	wd_product_grid_list_toggle();

	//Masonry Product
    wd_masonry_product(); //Set true to enable

    //Sale Date Countdown
    wd_product_sale_date_countdown();

    //Cloud zoom hover product image
	wd_set_cloud_zoom();

	//Variation product
	wd_product_variation_product_select();

	//AJAX ADD TO CART CHANGE CART VIEW
	wd_cart_change_ajax();

	//W3 Total Cache & Wp Super Cache Fix
	//wd_cache_fix_add_to_cart();
	
	//Mini cart on mobile
	wd_minicart_on_mobile();
});

/*--------------------------------------------------------------------------*/
/*								FUNCTIONS   								*/
/*--------------------------------------------------------------------------*/
//PRODUCT GRID/LIST TOGGLE
if (typeof wd_product_grid_list_toggle != 'function') { 
	function wd_product_grid_list_toggle(){
		//Default cookie
		if (Cookies.get('gridcookie') === undefined) {
			Cookies.set('gridcookie','grid', { path: '/' });
		}
		//current product columns
	    var current_column = jQuery('.wd-products-wrapper.grid-list-action').data('columns');
	    //add class active to current column button
	    jQuery(".gridlist-toggle .wd-columns-toggle[data-option-value='" + current_column + "']").addClass('active');

		jQuery('.products .product').find('.wp_description_product.wd_hidden_desc_product').addClass('hidden');
	    jQuery('.products .product').find('.wp_description_product.wd_show_desc_product').removeClass('hidden');
	    

	    if (Cookies.get('gridcookie') == 'grid') {
	        jQuery('.gridlist-toggle #grid').addClass('active');
	        jQuery('.gridlist-toggle #list').removeClass('active');
	        jQuery('.grid-list-action .products').addClass('grid').removeClass('list');
	    }

	    if (Cookies.get('gridcookie') == 'list') {
	    	jQuery('.gridlist-toggle .wd-columns-toggle').addClass('hidden');
	        jQuery('.gridlist-toggle #list').addClass('active');
	        jQuery('.gridlist-toggle #grid').removeClass('active');
	        jQuery('.grid-list-action .products').removeClass('grid').addClass('list');
	        jQuery('.grid-list-action .products.list > .product').find('.wp_description_product').removeClass('hidden');
	    }

	    jQuery('#grid').click(function() {
			Cookies.set('gridcookie','grid', { path: '/' });
			jQuery('.gridlist-toggle .wd-columns-toggle').removeClass('hidden');
			jQuery('.gridlist-toggle #grid').addClass('active');
	        jQuery('.gridlist-toggle #list').removeClass('active');
			jQuery('.grid-list-action .products').addClass('grid').removeClass('list');
			jQuery('.products.grid > .product').find('.wp_description_product.wd_hidden_desc_product').addClass('hidden');
			return false;
		});

		jQuery('#list').click(function() {
			Cookies.set('gridcookie','list', { path: '/' });
			jQuery('.gridlist-toggle .wd-columns-toggle').addClass('hidden');
			jQuery('.gridlist-toggle #list').addClass('active');
	        jQuery('.gridlist-toggle #grid').removeClass('active');
			jQuery('.grid-list-action .products').removeClass('grid').addClass('list');
			jQuery('.grid-list-action .products.list > .product').find('.wp_description_product').removeClass('hidden');
			return false;
		});

		jQuery('.gridlist-toggle .wd-columns-toggle').click(function() {
			var current_column = jQuery('.wd-products-wrapper.grid-list-action').data('columns');
			var new_column = jQuery(this).data('option-value');
			if (current_column !== new_column) {
				jQuery('.wd-products-wrapper.grid-list-action').addClass('wd-columns-' + new_column).removeClass('wd-columns-' + current_column);
				jQuery('.wd-products-wrapper.grid-list-action').data('columns', new_column);
				jQuery(".gridlist-toggle .wd-columns-toggle[data-option-value='" + current_column + "']").removeClass('active');
				jQuery(this).addClass('active');
			}
			return false;
		});
	}
}


//Masonry Product
if (typeof wd_masonry_product != 'function') { 
	function wd_masonry_product(selector_wrap = '.wd-product-mansonry-wrap'){
		if(jQuery(selector_wrap+' .products.grid').length > 0 ){
			setTimeout(function(){
				jQuery(selector_wrap+' .products.grid').isotope({
					layoutMode: 'masonry',
					itemSelector: '.wd-product-mansonry-item'
				});
			}, 1000)
		}
	}
}

//Sale Date Countdown
if (typeof wd_product_sale_date_countdown != 'function') { 
	function wd_product_sale_date_countdown(){
		var data_offer = jQuery( '.wd-offer-shop-date' );
		if (data_offer.length > 0) {
			data_offer.each( function () {
				jQuery( this ).find( '.countdown' ).countdown( jQuery( this ).data( 'offer' ), function ( event ) {
					jQuery( this ).find( '.year' ).text( event.strftime( '%Y' ) );
					jQuery( this ).find( '.month' ).text( event.strftime( '%m' ) );
					jQuery( this ).find( '.day' ).text( event.strftime( '%D' ) );
					jQuery( this ).find( '.hour' ).text( event.strftime( '%H' ) );
					jQuery( this ).find( '.minute' ).text( event.strftime( '%M' ) );
					jQuery( this ).find( '.second' ).text( event.strftime( '%S' ) );
				} );
			} );
		}
	}
}

// Cloud zoom hover product image
if (typeof wd_set_cloud_zoom != 'function') { 
	function wd_set_cloud_zoom(){
		var _clz_element 	= jQuery('.cloud-zoom, .cloud-zoom-gallery');
		var clz_width 		= _clz_element.width();
		var clz_img_width 	= _clz_element.children('img').width();
		var cl_zoom 		= _clz_element;
		var temp 			= (clz_width-clz_img_width)/2;
		if(cl_zoom.length > 0 && cl_zoom.hasClass('on_pc')){
			cl_zoom.data('zoom',null).siblings('.mousetrap').unbind().remove();
			cl_zoom.CloudZoom({ 
				adjustX:temp	
			});
		}else{
			 wd_product_thumbnail_mobile_thickbox_popup(800, 600);
		}
		jQuery('.woocommerce-gallery-image').on('click', function(e){
			_clz_element.removeClass('active');
			jQuery(this).addClass('active');
		});
	}
} 

//Variation product
if (typeof wd_product_variation_product_select != 'function') { 
	function wd_product_variation_product_select(){
		// Select Color
		jQuery('body').on('click', '.variations_form .wd-select-option', function(e){
			var val = jQuery(this).attr('data-value');
			var _this = jQuery(this);
			var color_select = jQuery(this).parents('.value').find('select');
			color_select.trigger('focusin');
			if(color_select.find('option[value='+val+']').length !== 0) {
				color_select.val( val ).change();
				_this.parent('.wd_color_image_swap').find('.wd-select-option').removeClass('selected');
				_this.addClass('selected');
			}			
		});

		jQuery('.variations_form').on('click', '.reset_variations', function(e){
			jQuery(this).parents('.variations').find('.wd_color_image_swap .wd-select-option.selected').removeClass('selected');
		});
						
		jQuery('body').on('change', '.variations_form .variations select', function(e){
			jQuery('.variations_form .variations .wd_color_image_swap').parents('.value').find('select').trigger('focusin');
			jQuery('.variations_form .variations .wd_color_image_swap .wd-select-option').each(function(i,e){
				var val = jQuery(this).attr('data-value');
				var _this = jQuery(this);
				var op_elemend = jQuery(this).parents('.value').find('select option[value='+val+']');
				if(op_elemend.length == 0) {
					_this.hide();
				} else {
					_this.show();
				}
				
			});
		});
		
		jQuery('body').on('show_variation', '.variations_form .variations .single_variation_wrap', function(e){
			jQuery('.variations_form ').find( '.single_variation' ).parent().parent('.single_variation_wrap').removeClass('no-price');
			if(jQuery('.variations_form ').find( '.single_variation' ).html() == ''){
				jQuery('.variations_form ').find( '.single_variation' ).parent().parent('.single_variation_wrap').addClass('no-price');
			}
		});
	}
}

//AJAX ADD TO CART CHANGE CART VIEW
if (typeof wd_cart_change_ajax != 'function') { 
	function wd_cart_change_ajax(){
		jQuery('body').bind( 'adding_to_cart', function() {
			jQuery('.cart_dropdown').addClass('disabled working');
		} );		
	    	      
		jQuery('.add_to_cart_button').live('click',function(event){
			var _li_prod = jQuery(this).parent().parent().parent().parent();
			_li_prod.trigger('wd_adding_to_cart');
		});	

		jQuery('li.product').each(function(index,value){
			jQuery(value).bind('wd_added_to_cart', function() {
				var _loading_mark_up = jQuery(value).find('.loading-mark-up').remove();
				jQuery(value).removeClass('adding_to_cart').addClass('added_to_cart').append('<span class="loading-text"></span>');//Successfully added to your shopping cart
				var _load_text = jQuery(value).find('.loading-text').css({'width' : jQuery(value).width()+'px','height' : jQuery(value).height()+'px'}).delay(1500).fadeOut();
				setTimeout(function(){
					_load_text.hide().remove();
				},1500);
				//delete view cart		
				jQuery('.list_add_to_cart .added_to_cart').remove();
				var _current_currency = Cookies.get('woocommerce_current_currency');
			});	
		});	
	}
}

//W3 Total Cache & Wp Super Cache Fix
if (typeof wd_cache_fix_add_to_cart != 'function') { 
	function wd_cache_fix_add_to_cart(){
		jQuery('body').trigger('added_to_cart');
	}
}

//Mini cart on mobile
if (typeof wd_minicart_on_mobile != 'function') { 
	function wd_minicart_on_mobile(){
		//mini cart popup on mobile
		jQuery( document ).delegate('.wd-header-mobile .wd-mini-cart-on-mobile', 'click', function(e){
			e.preventDefault();
			tb_remove();
			var content_id = jQuery(this).data('content_id');

	        tb_show('<span class="popup-cart-title">Your shopping cart</span>', '#TB_inline?width=800&height=800&inlineId='+content_id);

			wd_thickbox_responsive(800, 800);
		});
	}
}

//Popup after added to cart ajax (shop loop)
if (typeof wd_popup_after_add_to_cart_ajax != 'function') { 
	function wd_popup_after_add_to_cart_ajax(TB_WIDTH, TB_HEIGHT){
		jQuery('body').on('added_to_cart',function(e,data) {
	        jQuery(this).append('<div id="wd-hidden-cart-content-popup" style="display:none"><div id="wd-hidden-cart-content">'+data['div.widget_shopping_cart_content']+'</div></div>');
	        tb_remove();

	        tb_show('<span class=popup-cart-title>Your shopping cart</span>', '#TB_inline?width='+TB_WIDTH+'&height='+TB_HEIGHT+'&inlineId=wd-hidden-cart-content');
	       
			wd_thickbox_responsive(TB_WIDTH, TB_HEIGHT);
		});
	}
}

//Popup after click thumbnail product on mobile
if (typeof wd_product_thumbnail_mobile_thickbox_popup != 'function') { 
	function wd_product_thumbnail_mobile_thickbox_popup(TB_WIDTH, TB_HEIGHT){
		jQuery( document ).delegate('.wd-product-image-mobile, .wd-product-thumbnail-mobile', 'click', function(e){
		 	e.preventDefault();
		 	jQuery('#wd-product-thumbnail-mobile-popup').find('img').attr('src', jQuery(this).attr('href'));
		 	setTimeout(function(){

			 	tb_show('', '#TB_inline?width='+TB_WIDTH+'&height='+TB_HEIGHT+'&inlineId=wd-product-thumbnail-mobile-popup&modal=true');

			 	wd_thickbox_responsive(TB_WIDTH, TB_HEIGHT);
			 }, 500);
		 	
        });
	}
}

//Return True if is touch device
if (typeof checkIfTouchDevice != 'function') { 
    function checkIfTouchDevice(){
        touchDevice = !!("ontouchstart" in window) ? 1 : 0; 
		if( jQuery.browser.wd_mobile ) {
			touchDevice = 1;
		}
		return touchDevice;      
    }
}