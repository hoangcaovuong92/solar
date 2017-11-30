/**
 * WD QuickShop
 *
 * @license commercial software
 * @copyright (c) 2017 Codespot Software JSC - WPDance.com. (http://www.wpdance.com)
 */

jQuery(document).ready(function($){
	"use strict";
	//insert quickshop popup
  	qs_prettyPhoto();
});

//****************************************************************//
/*							FUNCTIONS							  */
//****************************************************************//
if (typeof prettyPhotocallback != 'function') {
	function qs_prettyPhoto() {
		jQuery('.wd_quickshop_handler').prettyPhoto({
			deeplinking: false,
			opacity: 0.9,
			social_tools: false,
			default_width: 900,
			default_height: 500,
			theme: 'pp_woocommerce',
			changepicturecallback : prettyPhotocallback
		});
	}
}
//Pretty Photo Callback
if (typeof prettyPhotocallback != 'function') { 
	function prettyPhotocallback() {

		wd_quickshop_init({
			itemClass		: 'div.products div.product.type-product.status-publish .product_thumbnail_wrapper', //selector for each items in catalog product list,use to insert quickshop image
			inputClass		: 'input.hidden_product_id' //selector for each a tag in product items,give us href for one product
		});
		jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass('buttons_added');

		if (jQuery('.pp_inline form.wd-variations-form').length > 0 ) {
			jQuery('.pp_inline').find('form.wd-variations-form .variations select').change();
			if (jQuery('.pp_inline .qs-left-content').hasClass('qs-enabled-variation')) { 
				jQuery('.pp_inline').find('form.variations_form').wc_variation_form();
			}
			if (typeof wd_product_variation_product_select === "function") { 
				wd_product_variation_product_select();
			}
		}
		

		/* QuickShop thumbnail slider */
		if(jQuery('.qs-left-content .wd-product-thumbs-content').length > 0 ){
			var thumb_slider 	= jQuery('.qs-left-content .wd-product-thumbs-content').data('wrap_id');
			var vertical 		= jQuery('.qs-left-content .wd-product-thumbs-content').data('vertical');
			var total_thumbs 	= jQuery('.qs-left-content .wd-product-thumbs-content').data('total_thumbs');
			var num 			= jQuery('.qs-left-content .wd-product-thumbs-content').data('num');
			var win_width 		= jQuery(window).width();
			var big_image_height = jQuery('.qs-left-content #wd-single-product-image').height();

			if (!vertical || win_width < 750) {
				jQuery('#'+thumb_slider).addClass('wd-product-horizontal-thumbnail'); 
				//remove arrow slider
				if(jQuery('#'+thumb_slider+ ' .thumbelina-but').length > 0 ){
					jQuery('#'+thumb_slider+ ' .thumbelina-but').remove(); 
				}
				var owl = jQuery('#'+thumb_slider).find('.product_thumbnails').owlCarousel({
					loop : true,
					nav : true,
					dots : false,
					navSpeed : 300,
					slideBy: 1,
					margin: 20,
					navRewind: false,
					autoplay: false,
					autoplayTimeout: 5000,
					autoplayHoverPause: false,
					autoplaySpeed: false,
					mouseDrag: true,
					touchDrag: true,
					items: num,
				});

				jQuery('#'+thumb_slider+ ' .owl-prev').html('<span class="lnr lnr-chevron-left"></span>');
 				jQuery('#'+thumb_slider+ ' .owl-next').html('<span class="lnr lnr-chevron-right"></span>');

				jQuery('#'+thumb_slider).on('click', '.next', function(e){
					e.preventDefault();
					owl.trigger('next.owl.carousel');
				});

				jQuery('#'+thumb_slider).on('click', '.prev', function(e){
					e.preventDefault();
					owl.trigger('prev.owl.carousel');
				});
			}else{
				jQuery('#'+thumb_slider).find('.product_thumbnails').slick({
					prevArrow		: '<span class="lnr lnr-chevron-up"></span>',
  					nextArrow 		: '<span class="lnr lnr-chevron-down"></span>',
					centerMode		: false,
					autoplay 		: false,
				  	autoplaySpeed	: 2000,
				  	arrows			: true,
					centerPadding	: '60px',
					vertical 		: true,
					infinite 		: true,
					slidesToShow	: num,
					responsive		: [
					    {
					      	breakpoint			: 768,
					      	settings 			: {
						        arrows			: false,
						        centerMode		: true,
						        centerPadding	: '40px',
						        slidesToShow	: 3
						     }
					    },
					    {
					      	breakpoint			: 480,
					      	settings			: {
						        arrows			: false,
						        centerMode		: true,
						        centerPadding	: '40px',
						        slidesToShow	: 1
					      	}
					    }
					]
				});
			}

			//disable link review link
			jQuery('.qs-right-content .woocommerce-review-link').on('click', function(e){
				e.preventDefault();
			})
		}
	}
}

// quickshop init
if (typeof wd_quickshop_init != 'function') { 
	function wd_quickshop_init() {

		//var qsHandlerImg = jQuery('#em_quickshop_handler img');
		var qsHandler = jQuery('.wd_quickshop_handler');
		
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
		
		
		//fix bug group 0 qty, and out of stock
		jQuery('.wd_quickshop.product form button.single_add_to_cart_button').live('click',function(){
			if(jQuery('.wd_quickshop.product form table.group_table').length > 0){
				jQuery('.wd_quickshop.product').prev('ul.woocommerce-error').remove();
				temp = 0;
				jQuery('.wd_quickshop.product form table.group_table').find('input.qty').each(function(i,value){
					var td_cur = jQuery(value).closest( "td" );
					
					if(jQuery(value).val() > temp && !td_cur.next().hasClass('wd_product_out-of-stock'))
						temp = jQuery(value).val();
				});
				if(temp == 0) {
					jQuery('.wd_quickshop.product').before( $( "<ul class=\'woocommerce-error\'><li>Please choose the quantity of items you wish to add to your cart…</li></ul>" ) );
					return false;
				}	
			}
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


