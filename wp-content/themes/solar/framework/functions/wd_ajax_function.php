<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
//get listings post name for autocomplete search
add_action('wp_ajax_nopriv_wd_ajax_disabled_email_popup', 'tvlgiao_wpdance_wd_ajax_disabled_email_popup');
add_action('wp_ajax_wd_ajax_disabled_email_popup', 'tvlgiao_wpdance_wd_ajax_disabled_email_popup');
if(!function_exists ('tvlgiao_wpdance_wd_ajax_disabled_email_popup')){
	function tvlgiao_wpdance_wd_ajax_disabled_email_popup() {
		$expire		= $_POST['expire'];
		$type 		= session_id() ? 'session' : 'transient'; 
		$key		= 'wd_disabled_email_popup';

		if ($type == 'transient') {
			$value			= array(
				'disabled_time'	=> time(),
				'expire'		=> $expire,
			);
			$expire			= ($expire == -1) ? YEAR_IN_SECONDS : $expire * 60;
			set_transient( $key, $value, $expire );
		}else{
			$expire			= ($expire == -1) ? strtotime('+1 years') : time() + ($expire * 60);
			$_SESSION[$key] = $expire; 
		}
		die(); //stop "0" from being output
	}
}

//get listings post name for autocomplete search
add_action('wp_ajax_nopriv_get_list_post_name_autocomplete', 'tvlgiao_wpdance_get_list_post_name_autocomplete');
add_action('wp_ajax_get_list_post_name_autocomplete', 'tvlgiao_wpdance_get_list_post_name_autocomplete');
if(!function_exists ('tvlgiao_wpdance_get_list_post_name_autocomplete')){
	function tvlgiao_wpdance_get_list_post_name_autocomplete() {
		echo tvlgiao_wpdance_get_array_post_name($_POST['post_type']);
		die(); //stop "0" from being output
	}
}

//Empty shopping cart
add_action('wp_ajax_nopriv_wd_woocommerce_empty_cart', 'tvlgiao_wpdance_wd_woocommerce_empty_cart');
add_action('wp_ajax_wd_woocommerce_empty_cart', 'tvlgiao_wpdance_wd_woocommerce_empty_cart');
if(!function_exists ('tvlgiao_wpdance_wd_woocommerce_empty_cart')){
	function tvlgiao_wpdance_wd_woocommerce_empty_cart() {
		global $woocommerce;
		$woocommerce->cart->empty_cart();
		die(); //stop "0" from being output
	}
}

//login with validate ajax
add_action('wp_ajax_nopriv_login_with_validate_ajax', 'tvlgiao_wpdance_login_with_validate_ajax');
add_action('wp_ajax_login_with_validate_ajax', 'tvlgiao_wpdance_login_with_validate_ajax');
if(!function_exists ('tvlgiao_wpdance_login_with_validate_ajax')){
	function tvlgiao_wpdance_login_with_validate_ajax() {
		if($_POST){  
			global $wpdb;
			$username = $wpdb->escape($_REQUEST['username']);  
			$password = $wpdb->escape($_REQUEST['password']);  
			$remember = $wpdb->escape($_REQUEST['rememberme']);  

			$remember 						= ($remember) ? "true" : "false";
			$login_data 					= array();  
			$login_data['user_login'] 		= $username;  
			$login_data['user_password'] 	= $password;  
			$login_data['remember'] 		= $remember;  

			$user = !is_email($username) ? get_user_by( 'login', $username ) : get_user_by( 'email', $username );
			if ( $user && wp_check_password( $password, $user->data->user_pass, $user->ID ) ){ //check username & password
				$user_signon = wp_signon( $login_data, false ); //login process
				if ( is_wp_error($user_signon) ){
			        echo json_encode(array(
			        	'loggedin'	=> false, 
			        	'message'	=> esc_html__( 'Unknown error!', 'solar' )
			        ));
			    } else {
			        echo json_encode(array(
			        	'loggedin'	=> true, 
			        	'message'	=> esc_html__( 'Login successful, redirecting...', 'solar' )
		        	));
			    }
			}else{
			   	echo json_encode(array(
			   		'loggedin'	=> false, 
			   		'message'	=> esc_html__( 'Wrong username or password!', 'solar' )
		   		));
			}
		} 
		die(); //stop "0" from being output
	}
}

?>