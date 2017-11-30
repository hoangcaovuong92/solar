//****************************************************************//
/*							Ajax JS								  */
//****************************************************************//
jQuery(document).ready(function($) {
	"use strict";
	//Empty Cart
	wd_ajax_empty_cart();

	//Autocomplete Search
	wd_ajax_autocomplete_search();

	//Login with validate ajax
	wd_ajax_login_validate();

	//AJAX ADD TO CART FOR SIMPLE & VARIATION PRODUCT (SINGLE) 
	wd_ajax_add_to_cart_single_product();
});

//****************************************************************//
/*							FUNCTIONS							  */
//****************************************************************//
//Empty Cart
if (typeof wd_ajax_empty_cart != 'function') { 
	function wd_ajax_empty_cart() {
		jQuery( document ).delegate('.wd-clear-cart-item', 'click', function(e){
			e.preventDefault();
			var _this = jQuery(this);
			if (confirm('Are you sure you want to empty shopping cart?')) {
				var image_loading =	_this.next('.wd-feature-loading-img');
				_this.parents('.shopping-cart-wrapper').find('.drop_down_container').addClass('wd-showing-cart');
			   	jQuery.ajax({
					type: 'POST',
					url: ajax_object.ajax_url,
					data: { 
						action: "wd_woocommerce_empty_cart",
				 	},
				 	beforeSend: function(){
	                   image_loading.removeClass('hidden');
	               	},
					success: function(data) {
						location.reload();
					}
				});
			} 
		});
	}
}

//Autocomplete Search
if (typeof wd_ajax_autocomplete_search != 'function') { 
	function wd_ajax_autocomplete_search() {
		jQuery( '.wd-search-with-autocomplete.wd-search-with-ajax' ).on('keydown', function(){
			var post_type 	= jQuery(this).data('post_type');
			jQuery(this).autocomplete({
				source: function(name, response) {
					jQuery.ajax({
						type: 'POST',
						url: ajax_object.ajax_url,
						data: { 
							action: "get_list_post_name_autocomplete",
						 	post_type: post_type, 
					 	},
						beforeSend: function(){
		                   jQuery(".wd-search-form-image-loading").removeClass('hidden');
		               	},
						success: function(data) {
							response(data);
							jQuery(".wd-search-form-image-loading").addClass('hidden');
						}
					});
				},
		    });
		});
	}
}

//Login with validate ajax
if (typeof wd_ajax_login_validate != 'function') { 
	function wd_ajax_login_validate() {
		jQuery( '.wd-login-form-with-validate-ajax' ).submit(function(e){
			jQuery('.wd-login-alert').addClass('hidden')
			var username 	= jQuery('#wd-login-form-custom .wd-login-username').val();
			var password 	= jQuery('#wd-login-form-custom .wd-login-password').val();
			var rememberme 	= jQuery('#wd-login-form-custom .wd-login-rememberme').val();
			if (username == '' || password == '') {
				jQuery('.wd-login-alert').removeClass('hidden').html('<label class="error wd-login-error">Please enter username & password!</label>');
			}else{
				jQuery.ajax({
					type: 'POST',
					url: ajax_object.ajax_url,
					data: { 
						action: "login_with_validate_ajax",
					 	username: username, 
					 	password: password, 
					 	rememberme: rememberme, 
				 	},
					beforeSend: function(){
		               jQuery('.wd-login-form-image-loading').removeClass('hidden');
		               jQuery('#wd-login-form-custom .wd-login-username, #wd-login-form-custom .wd-login-password, #wd-login-form-custom .wd-login-btn').attr('disabled', 'disabled');
		           	},
					success: function(data) {
						var data_obj = jQuery.parseJSON(data);
						jQuery(".wd-login-form-image-loading").addClass('hidden');
						jQuery('.wd-login-alert').removeClass('hidden').html('<label class="error wd-login-error">'+data_obj.message+'</label>');
						if (data_obj.loggedin == true) {
							location.reload();
						}else{
							jQuery('#wd-login-form-custom .wd-login-username, #wd-login-form-custom .wd-login-password, #wd-login-form-custom .wd-login-btn').removeAttr('disabled');
						}
					}
				});
			}
			e.preventDefault();
		});
	}
}

//AJAX ADD TO CART FOR SIMPLE & VARIATION PRODUCT (SINGLE) 
if (typeof wd_ajax_add_to_cart_single_product != 'function') { 
	function wd_ajax_add_to_cart_single_product() {
		jQuery(".single_add_to_cart_button").on('click', function(e) {
			var _this			= jQuery(this);
			if (_this.hasClass('disabled')) {
				return;
			}
			var _mini_cart_wrap = '.shopping-cart-wrapper';
		    var product_id 		= _this.val();
		    var variation_id 	= jQuery('input[name="variation_id"]').val();
		    var quantity 		= jQuery('input[name="quantity"]').val();
		    var product_type	= '';

		    if (variation_id) {
		    	product_type	= 'variation';
		    }else if (product_id) {
		    	product_type	= 'simple';
		    }
		    var ajax_add_to_cart = (product_type == 'variation' || product_type == 'simple') ? true : false;

		    if (ajax_add_to_cart) {
		    	e.preventDefault();
		    	_this.addClass('loading').removeClass('added');
		    	jQuery.ajax ({
		            url: ajax_object.ajax_url,  
		            type:'POST',
		            data: { 
						action: "update_tini_cart_single_product",
					 	product_id: product_id, 
					 	variation_id: variation_id, 
					 	quantity: quantity, 
					 	product_type: product_type, 
				 	},
					success:function(data) {
						_this.removeClass('loading').addClass('added');
		                if( jQuery(_mini_cart_wrap).length > 0 ){
							jQuery(_mini_cart_wrap).replaceWith(data);
							wd_scroll_to_element(_mini_cart_wrap);
							setTimeout(function(){
								jQuery(_mini_cart_wrap+' .drop_down_container').addClass('wd-showing-cart');
							},600);
							setTimeout(function(){
								jQuery(_mini_cart_wrap+' .drop_down_container').removeClass('wd-showing-cart');
							},4000);
						}
		            }
		        });
		    } 
		});
	}
}