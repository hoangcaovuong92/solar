//****************************************************************//
/*							MOBILE JS							  */
//****************************************************************//
jQuery(window).ready(function($) {
	"use strict";
	//Blog related slider (template-parts/related.php)
	wd_blog_related_script();

	//Blog gallery slider
	wd_blog_gallery_script();

	//Main Mega Menu slider
	wd_main_menu_slider();

	//woocommerce/single-product/product-thumbnails.php
	wd_slider_product_thumbnail();

	var $_this 	= jQuery('#'+jQuery('.wd-related-project-wrapper').attr('id'));
	var owl 	= $_this.find('.wd-related-project-slider').owlCarousel({
		loop : true,
		nav : false,
		dots : false,
		slideBy: 1,
		navRewind: false,
		autoplay: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		autoplaySpeed: false,
		mouseDrag: true,
		touchDrag: true,
		responsiveBaseElement: $_this,
		items : 1,
	});
	$_this.on('click', '.next', function(e){
		e.preventDefault();
		owl.trigger('next.owl.carousel');
	});

	$_this.on('click', '.prev', function(e){
		e.preventDefault();
		owl.trigger('prev.owl.carousel');
	});
});

//****************************************************************//
/*							FUNCTIONS							  */
//****************************************************************//
//Blog related slider (template-parts/related.php)
//Product related slider (woocommerce/single-product/related.php)
//Product Up-sell slider (woocommerce/single-product/up-sells.php)
if (typeof wd_blog_related_script != 'function') { 
	function wd_blog_related_script(){
		if(jQuery('.wd-related-wrapper, .wd-product-related-wrapper-slider, .wd-product-upsell-wrapper-slider').length > 0 ){
			var $_this 		= jQuery('.wd-related-wrapper, .wd-product-related-wrapper-slider, .wd-product-upsell-wrapper-slider');
			var slide_speed = $_this.data('slide_speed');
			var responsive_refresh_rate = $_this.data('responsive_refresh_rate');
			var columns 	= $_this.data('columns');
			var margin 		= 30;

			if( navigator.platform === 'iPod' ){
				slide_speed = 0;
				responsive_refresh_rate = 1000;
			}
			var owl = $_this.find('.wd-related-slider').owlCarousel({
				loop : true,
				nav : false,
				dots : false,
				navSpeed : slide_speed,
				slideBy: 1,
				rtl:jQuery('body').hasClass('rtl'),
				margin: margin,
				navRewind: false,
				autoplay: false,
				autoplayTimeout: 5000,
				autoplayHoverPause: false,
				autoplaySpeed: false,
				mouseDrag: true,
				touchDrag: true,
				responsiveBaseElement: $_this,
				responsiveRefreshRate: responsive_refresh_rate,
				responsive:{
					0:{
						items : 1
					},
					361:{
						items : 2
					},
					579:{
						items : 2
					},
					767:{
						items : 2
					},
					1100:{
						items : columns
					}
				},
				onInitialized: function(){
					$_this.addClass('loaded').removeClass('loading');
				}
			});
			$_this.on('click', '.next', function(e){
				e.preventDefault();
				owl.trigger('next.owl.carousel');
			});

			$_this.on('click', '.prev', function(e){
				e.preventDefault();
				owl.trigger('prev.owl.carousel');
			});
		}
	}
}

//Blog gallery slider
if (typeof wd_blog_gallery_script != 'function') { 
	function wd_blog_gallery_script(){
		if(jQuery('.wd-carousel-thumb').length > 0 ){
			jQuery('.wd-carousel-thumb').find('.wd-blog-gallery-list').slick({
			 	infinite: true,
			 	dots: true,
			 	arrows: true,
			  	slidesToShow: 1,
			  	slidesToScroll: 1,
			});
		}
	}
}

//Main Mega Menu slider
if (typeof wd_main_menu_slider != 'function') { 
	function wd_main_menu_slider(){
		if(jQuery('.wd-main-menu-slider').length > 0 ){
			var menu_elenment = jQuery('.wd-main-menu-slider').next('.ubermenu-submenu');
			setTimeout(function(){
				menu_elenment.owlCarousel({
					loop : false,
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
					items: 3,
				});
				menu_elenment.find('.owl-prev').html('<span class="lnr lnr-chevron-left"></span>');
	 			menu_elenment.find('.owl-next').html('<span class="lnr lnr-chevron-right"></span>');
			}, 1000);
		}
	}
}

//woocommerce/single-product/product-thumbnails.php
if (typeof wd_slider_product_thumbnail != 'function') { 
	function wd_slider_product_thumbnail(){
		if(jQuery('.wd-product-thumbs-content').length > 0 ){
			var thumb_slider 	= jQuery('.wd-product-thumbs-content').data('wrap_id');
			var vertical 		= jQuery('.wd-product-thumbs-content').data('vertical');
			var total_thumbs 	= jQuery('.wd-product-thumbs-content').data('total_thumbs');
			var num 			= jQuery('.wd-product-thumbs-content').data('num');
			var win_width 		= jQuery(window).width();
			var big_image_height = jQuery('#wd-single-product-image').height();

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
		}
	}
}