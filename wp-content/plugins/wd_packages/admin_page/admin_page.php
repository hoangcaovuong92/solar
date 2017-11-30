<?php
if (!class_exists('WD_Packages_Admin_Page')) {
	class WD_Packages_Admin_Page {
		/**
		 * Refers to a single instance of this class.
		 */
		private static $instance = null;

		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		protected $parkage_name = 'admin_page';
		protected $list_field 	= array(
			'wd_theme_guide' 				=> 'Theme Guide',
			'wd_package_shortcode' 			=> 'Shortcodes',
			'wd_package_widget' 			=> 'Widgets',
			'wd_package_portfolio' 			=> 'Portfolio',
			'wd_package_team' 				=> 'Team Member',
			'wd_package_quickshop' 			=> 'Quickshop (Woo)',
			'wd_package_shop_by_color' 		=> 'Shop By Color (Woo)',
			'wd_package_faq_post_type' 		=> 'FAQs (Post Type)',
			'wd_package_feature_post_type' 	=> 'Feature (Post Type)',
			/*'wd_package_smooth_croll' 		=> 'Smooth Mouse Scroll (JS)',*/
		);

		public function __construct(){
			$this->constant();
			add_action('admin_enqueue_scripts', array( $this, 'admin_init_script' ));
			if($this->get_current_user_role() == 'administrator') {
				add_action('admin_menu', array($this, 'tvlgiao_wpdance_package_admin_page_register'));
			}
		}
		
		protected function constant(){
			define('WDADMIN_BASE'		,   plugin_dir_path( __FILE__ ));
			define('WDADMIN_BASE_URI'	,   plugins_url( '', __FILE__ ));
			
			define('WDADMIN_JS'			, 	WDADMIN_BASE_URI . '/js'		);
			define('WDADMIN_CSS'		, 	WDADMIN_BASE_URI . '/css'		);
			define('WDADMIN_IMAGE'		, 	WDADMIN_BASE_URI . '/images'	);
		}
		/******************************** Team POST TYPE INIT START ***********************************/

		public function tvlgiao_wpdance_package_admin_page_register(){
		    add_menu_page( //or add_theme_page
		        'WD Packages',     // page title
		        'WD Packages',     // menu title
		        'manage_options',   // capability
		        'wd-package-setting',     // menu slug
		        array($this, 'tvlgiao_wpdance_package_admin_page_callback'), // callback function
		        WDADMIN_IMAGE.'/icon.png', //icon (dashicons-universal-access-alt)
		        22 //position
		    );
		    //call register settings function
		    add_action( 'admin_init', array($this, 'tvlgiao_wpdance_package_admin_page_field_setting_register') );
		}

		public function tvlgiao_wpdance_package_admin_page_field_setting_register() {
		    //register our settings
		    register_setting( 'wd-package-admin-page-setting', 'wd_packages' );
		}

		public function tvlgiao_wpdance_package_admin_page_callback(){ ?>
		    <div class="wrap wd-parkage-admin-page" id="wd-parkage-admin-page-setting">
				<!-- GET STARTED -->
				<?php settings_errors(); ?>	
				<div class="tab-content card">
					<div id="setting" class="tab-pane fade in active">
						<h4><?php esc_html_e("WD Packages Setting", 'wpdancelaparis'); ?></h4>
						<p><?php esc_html_e("Select the packages you want to use on the theme.", 'wpdancelaparis'); ?></p>
						<form method="post" action="options.php">
						    <?php 
						    settings_fields('wd-package-admin-page-setting');
						    do_settings_sections('wd-package-admin-page-setting');
						    $options = get_option('wd_packages');
						    ?>
						    <table class="table wd-package-admin-page-form">
					    		<tr valign="top">
					    			<th scope="row"><?php echo esc_html_e("Theme Manager Mode:", 'wpdancelaparis'); ?></th>
					    			<td colspan="3">
					    				<select class="form-control" name="wd_packages[wd_theme_manager_mode]">
											  <option <?php echo ( !empty($options['wd_theme_manager_mode']) && $options['wd_theme_manager_mode'] == 'theme_option') ? 'selected="selected"' : ''; ?> value="theme_option"><?php echo esc_html_e("Theme Option", 'wpdancelaparis'); ?></option>
											  <option <?php echo ( !empty($options['wd_theme_manager_mode']) && $options['wd_theme_manager_mode'] == 'customize') ? 'selected="selected"' : ''; ?> value="customize"><?php echo esc_html_e("Customize", 'wpdancelaparis'); ?></option>
										</select>
									</td>
								</tr>
								<tr>
						    		<?php $i = 1; ?>
							    	<?php foreach ($this->list_field as $key => $value): ?>
							    		<?php $checked = (empty($options['verify_submit']) || !empty($options[$key])) ? 'checked="checked"' : ''; ?>
								    		<th scope="row"><?php echo $value.':'; ?></th>
								    		<td>
								    			<label class="switch switch-text switch-pill switch-success">
									    			<input class="switch-input" type="checkbox" name="wd_packages[<?php echo $key; ?>]" value="1" <?php echo $checked; ?> >
									    			<span class="switch-label" data-on="On" data-off="Off"></span>
							                                        <span class="switch-handle"></span>
							                                    </label>
								    		</td>
							    		<?php echo ($i%2 == 0) ? '</tr></tr>' : ''; ?>
								    	<?php $i++; ?>
							    	<?php endforeach ?>
						    	</tr>
						    	<input type="hidden" name="wd_packages[verify_submit]" value="1" >
						    	<tr>
						    		<td colspan="4">
						    			<p class="submit-button">
									    	<input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg" value="<?php esc_html_e("SAVE PACKAGES SETTINGS", 'wpdancelaparis'); ?>">
								    	</p>
								    	<div class="social-button">
								    		<a href="https://www.facebook.com/hoangcaovuong" target="_blank"><button type="button" class="btn btn-facebook icon" style="margin-bottom: 4px"><span><?php esc_html_e("Facebook", 'wpdancelaparis'); ?></span></button></a>
			                                <a href="http://www.youtube.com/c/WeLoveSonTungMTPChannel" target="_blank"><button type="button" class="btn btn-youtube icon" style="margin-bottom: 4px"><span><span><?php esc_html_e("YouTube", 'wpdancelaparis'); ?></span></span></button></a>
			                                <a href="https://www.instagram.com/hoangcaovuong92/" target="_blank"><button type="button" class="btn btn-instagram icon" style="margin-bottom: 4px"><span><span><?php esc_html_e("Instagram", 'wpdancelaparis'); ?></span></span></button></a>
			                            </div>
						    		</td>
						    	</tr>
						    </table>
						</form>
					</div>
				</div>
			</div>
		<?php
		} //end content admin page

		public function admin_init_script($hook){
			if ($hook == 'toplevel_page_wd-package-setting') {
				wp_enqueue_style('wd-package-form-css', 				WDADMIN_CSS.'/form.css');
				wp_enqueue_style('wd-package-admin-page-css', 			WDADMIN_CSS.'/style.css');
			}
		}

		function get_current_user_role( $user = null ) {
			$user = $user ? new WP_User( $user ) : wp_get_current_user();
			return $user->roles ? $user->roles[0] : false;
		}
	}
	WD_Packages_Admin_Page::get_instance();  // Start an instance of the plugin class 
}

