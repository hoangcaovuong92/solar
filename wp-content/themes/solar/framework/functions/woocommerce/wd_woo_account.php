<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
add_action( 'wp_login_failed', 'tvlgiao_wpdance_login_fail' );  // hook failed login
add_action( 'wp_ajax_update_tini_account', 'tvlgiao_wpdance_update_tini_account');
add_action( 'wp_ajax_nopriv_update_tini_account', 'tvlgiao_wpdance_update_tini_account');

if (! function_exists( 'tvlgiao_wpdance_tini_account' ) ) {
	function tvlgiao_wpdance_tini_account($show_icon = 0, $show_text = 1, $class = ""){
		if ( !tvlgiao_wpdance_is_woocommerce() ) {
			return;
		}
		global $woocommerce;
		$myaccount_page_id 		= get_option( 'woocommerce_myaccount_page_id' );
		if ( $myaccount_page_id ) {
		 	$myaccount_page_url = get_permalink( $myaccount_page_id );

		 	if ( is_ssl() ){
			    $myaccount_page_url = str_replace( 'http:', 'https:', $myaccount_page_url );
		 	} else {
		 		 $myaccount_page_url = str_replace( 'https:', 'http:', $myaccount_page_url );
		 	}
		}else{
			$myaccount_page_url = "";
		}		
		ob_start();
		$_user_logged 		= is_user_logged_in();
		$class_show_icon 	= '';
		$icon_html 			= '';
		if ( $show_icon == '1' ) {
			$class_show_icon 	= 'wd-show-icon-user';
			$icon_html 			= '<span class="lnr lnr-user"></span> ';
		}
		?>
			
		<div class="wd_tini_account_wrapper <?php echo esc_attr($class) ?> <?php echo esc_attr($class_show_icon) ?>">
			<div class="wd_tini_account_control">
				<?php if(is_user_logged_in()): ?>	
					<?php $title = ($show_text) ? esc_html('My Account','solar') : '' ; ?>
					<a href="<?php echo esc_url($myaccount_page_url);?>" title="<?php esc_html_e('View Account Page','solar'); ?>">
						<span class="wd-title-header"><?php echo $icon_html;?><?php echo $title; ?></span>
					</a>
				<?php else:?>
					<?php $title = ($show_text) ? esc_html('Login / Register','solar') : '' ; ?>
					<a href="<?php echo esc_url($myaccount_page_url);?>" title="<?php esc_html_e('View login page','solar'); ?>">
						<span class="wd-title-header"><?php echo $icon_html;?><?php echo $title; ?></span>
					</a>
				<?php endif;?>		
			</div>
			<div class="form_drop_down drop_down_container <?php echo ( $_user_logged ) ? 'wd-user-logged' : 'wd-user-login'; ?>">
				<?php if( !$_user_logged ): ?>
					<div class="form_wrapper">				
						<div class="form_wrapper_body">
							<form method="post" class="login wd-login-form-with-validate-ajax" id="wd-login-form-custom" >
			
								<?php do_action( 'woocommerce_login_form_start' ); ?>
								
								<p class="login-username">
									<input type="text" size="20" class="input wd-login-username" id="username" name="username" value="<?php echo  ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" placeholder="<?php esc_html_e( 'Email Address / Username', 'solar' ); ?>">
								</p>
								<p class="login-password">
									<input type="password" size="20" value="" class="input wd-login-password" id="password" name="password" autocomplete="off" placeholder="<?php esc_html_e( 'Password', 'solar' ); ?>">
								</p>
								<p class="login-remember">
									<label><input name="rememberme" class="wd-login-rememberme" type="checkbox" value="forever"> <?php esc_html_e( 'Keep me signed in', 'solar' ); ?></label> 
								</p>

								<p class="wd-login-form-image-loading hidden">
									<img src="<?php echo TVLGIAO_WPDANCE_THEME_IMAGES.'/loading.gif'; ?>" alt="Loading Icon">
								</p>
								<p class="wd-login-alert hidden"></p>

								<div class="clear"></div>
								
								<?php do_action( 'woocommerce_login_form' ); ?>											
								
								<p class="login-submit">
									<?php wp_nonce_field( 'woocommerce-login' ); ?>
									<input type="submit" class="secondary_button wd-login-btn" name="login" value="<?php esc_html_e( 'SIGN IN', 'solar' ); ?>" />
								</p>
								
								<?php do_action( 'woocommerce_login_form_end' ); ?>
							</form>
						</div>
						<div class="form_wrapper_footer">
							<p><a class="wd-my-account-action" href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" data-toggle="tooltip" title="<?php esc_html_e('Reset your password','solar'); ?>"><?php esc_html_e('Forgetten your password?','solar'); ?></a></p>
							<p><a class="wd-my-account-action" href="<?php echo esc_url($myaccount_page_url); ?>" data-toggle="tooltip" title="<?php esc_html_e('Create new acccount','solar'); ?>" ><?php esc_html_e('Register new account','solar'); ?></a></p>
						</div>
					</div>	
				<?php else: ?>
					<div class="form_wrapper">				
						<div class="form_wrapper_body">
							<ul class="wd-my-account-list">
								<?php 
									$myacount_url 	= get_option('woocommerce_myaccount_page_id') ? get_permalink( get_option('woocommerce_myaccount_page_id') ) : '#';
									$myorder_url 	= $myacount_url ? $myacount_url.'orders' : '#';
									$mydownload_url = $myacount_url ? $myacount_url.'downloads' : '#';
									$logout_url 	= wp_logout_url( get_permalink() ) ? wp_logout_url( get_permalink()) : '#';
								?>
								<li><a href="<?php echo esc_url($myorder_url); ?>" title="<?php esc_html_e('My Orders','solar');?>"><?php esc_html_e('My Order','solar');?></a></li>

								<li><a href="<?php echo esc_url($mydownload_url); ?>" title="<?php esc_html_e('My Downloads','solar');?>"><?php esc_html_e('My Download','solar');?></a></li>

								<li><a href="<?php echo esc_url($logout_url); ?>" title="<?php esc_html_e('Logout','solar');?>"><?php esc_html_e('Logout','solar');?></a></li>
							</ul>
						</div>
					</div>		
					
				<?php endif; ?>
			</div>
		</div>
		<?php 
		$tini_account = ob_get_clean();
		return $tini_account;
	}
}

if ( ! function_exists( 'tvlgiao_wpdance_update_tini_account' ) ) {
	function tvlgiao_wpdance_update_tini_account() {
		die($_tini_account_html = tvlgiao_wpdance_tini_account());
	}
}

if( !function_exists('tvlgiao_wpdance_get_form_user_mobile') ){
	function tvlgiao_wpdance_get_form_user_mobile(){
		if ( !tvlgiao_wpdance_is_woocommerce() ) {
			return;
		} ?>
		<div class="wd_loginuser">
			<div class="wd_tini_account_control">
				<?php
					global $woocommerce;
					$myaccount_page_id 	= get_option( 'woocommerce_myaccount_page_id' );
					if ( $myaccount_page_id ) {
					  	$myaccount_page_url = get_permalink( $myaccount_page_id );
					}else{
						$myaccount_page_url = "";
					}	
					$logout_url 		= wp_logout_url( get_permalink() ) ? wp_logout_url( get_permalink()) : '#';
				?>
				<?php if(is_user_logged_in()): ?>	
					<a href="<?php echo esc_url($myaccount_page_url);?>" title="<?php esc_html_e('My Account','solar');?>">
						<span><?php esc_html_e('My Account','solar');?></span> 
					</a>
					<a href="<?php echo esc_url($logout_url);?>" title="<?php esc_html_e('Logout','solar');?>">
						<span><?php esc_html_e('Logout','solar');?></span> 
					</a>
				<?php else:?>
					<a href="<?php echo esc_url($myaccount_page_url);?>" title="<?php esc_html_e('Login or Register','solar');?>">
						<span><?php esc_html_e('Login / Register','solar');?></span>
					</a>
				<?php endif;?>		
			</div>
		</div>
		<?php
	}
}

function tvlgiao_wpdance_login_fail( $username ) {
	if(isset( $_REQUEST['redirect_to']) && ($_REQUEST['redirect_to'] == admin_url())){
		return;
	}
	if(isset( $_REQUEST['redirect_to']) && strripos($_REQUEST['redirect_to'],'wp-admin') > 0 ){
		return;
	}
	if ( !tvlgiao_wpdance_is_woocommerce() ) {
		return esc_html__('Woocommerce Plugin do not active','solar');
	}
	global $woocommerce;
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	if ( $myaccount_page_id ) {
		$myaccount_page_url = get_permalink( $myaccount_page_id );
		wp_safe_redirect( $myaccount_page_url );
		exit;
	}		
}
?>
