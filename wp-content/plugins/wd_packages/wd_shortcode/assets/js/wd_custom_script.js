/* Select2: product search */
jQuery(document).ready(function($) {	
	jQuery('select.wd_search_product').select2();
});

//widget currency switcher
/*jQuery(window).on("click", function(){		
	if (jQuery('.widget_woo_currency_switcher .widget-woocommerce-currency-switcher').has(event.target).length == 0	&&	!jQuery('.widget_woo_currency_switcher .widget-woocommerce-currency-switcher').is(event.target)	){
		jQuery('.widget_woo_currency_switcher .widget-woocommerce-currency-switcher').removeClass('active');
	} else {
		jQuery('.widget_woo_currency_switcher .widget-woocommerce-currency-switcher').addClass('active');
	}
});*/

if (typeof tvlgiao_wpdance_load_isotope != 'function') { 
	function tvlgiao_wpdance_load_isotope(){
		jQuery('.grid').isotope({
			itemSelector: '.grid-item',
			layoutMode: 'masonry'			
		});
			
		jQuery('img').load(function(){
			jQuery('.grid').isotope({
				itemSelector: '.grid-item',
				layoutMode: 'masonry'			
			});
		});
	}	
}