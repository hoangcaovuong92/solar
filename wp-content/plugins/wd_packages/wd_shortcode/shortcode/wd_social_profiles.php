<?php
/**
 * Shortcode: tvlgiao_wpdance_social_profiles
 */
if(!function_exists('tvlgiao_wpdance_social_profiles_function')){
	function tvlgiao_wpdance_social_profiles_function($atts,$content){
		extract(shortcode_atts(array(
			'title'						=> '',
			'style'						=> 'style-1',
			'show_title'				=> '1',
			'show_rss'					=> '1',
			'rss_id'					=> '#',
			'show_twitter'				=> '1',
			'twitter_id'				=> '#',
			'show_facebook'				=> '1',
			'facebook_id'				=> '#',
			'show_google'				=> '1',
			'google_id'					=> '#',
			'show_pin'					=> '1',
			'pin_id'					=> '#',
			'show_youtube'				=> '1',
			'youtube_id'				=> '#',
			'show_instagram'			=> '1',
			'instagram_id'				=> '#',
			'class'						=> ''
		),$atts));
		
		$data_settings = array(
			'icon-facebook' => array(
				'status'		=> $show_facebook,
				'title'			=> esc_html__('Facebook', 'wd_package'),
				'desc'			=> esc_html__('Become our fan on facebook', 'wd_package'),
				'icon'			=> 'fa fa-facebook',
				'pre_url'		=> 'http://www.facebook.com/',
				'user'			=> $facebook_id,
			),
			'icon-rss' 		=> array(
				'status'		=> $show_rss,
				'title'			=> esc_html__('Rss', 'wd_package'),
				'desc'			=> esc_html__('Rss', 'wd_package'),
				'icon'			=> 'fa fa-rss',
				'pre_url'		=> 'https://www.rss.com/',
				'user'			=> $rss_id,
			),
			'icon-twitter' 	=> array(
				'status'		=> $show_twitter,
				'title'			=> esc_html__('Twitter', 'wd_package'),
				'desc'			=> esc_html__('Twitter', 'wd_package'),
				'icon'			=> 'fa fa-twitter',
				'pre_url'		=> 'http://twitter.com/',
				'user'			=> $twitter_id,
			),
			'icon-google' => array(
				'status'		=> $show_google,
				'title'			=> esc_html__('Google', 'wd_package'),
				'desc'			=> esc_html__('Google', 'wd_package'),
				'icon'			=> 'fa fa-google-plus',
				'pre_url'		=> 'https://plus.google.com/u/0/',
				'user'			=> $google_id,
			),
			'icon-pinterest' => array(
				'status'		=> $show_pin,
				'title'			=> esc_html__('Pinterest', 'wd_package'),
				'desc'			=> esc_html__('Pinterest', 'wd_package'),
				'icon'			=> 'fa fa-pinterest',
				'pre_url'		=> 'http://www.pinterest.com/',
				'user'			=> $pin_id,
			),
			'icon-youtube' => array(
				'status'		=> $show_youtube,
				'title'			=> esc_html__('Youtube', 'wd_package'),
				'desc'			=> esc_html__('Youtube', 'wd_package'),
				'icon'			=> 'fa fa-youtube',
				'pre_url'		=> 'http://youtube.com/',
				'user'			=> $youtube_id,
			),
			'icon-instagram' => array(
				'status'		=> $show_instagram,
				'title'			=> esc_html__('Instagram', 'wd_package'),
				'desc'			=> esc_html__('Instagram', 'wd_package'),
				'icon'			=> 'fa fa-instagram',
				'pre_url'		=> 'http://www.instagram.com/',
				'user'			=> $instagram_id,
			),
		);
		ob_start();
		?>
		<div class="wd-social-icons <?php echo esc_attr( $class ); ?> <?php echo esc_attr( $style ); ?>">
			<?php if($title != "") : ?>
				<div class="wd-title">
					<h2><?php echo esc_attr( $title ); ?></h2>
				</div>
			<?php endif; ?>
			<div class="wd-content <?php if($show_title) echo ("wd-has-title") ?>">
				<ul>
					<?php foreach ($data_settings as $key => $value): ?>
						<?php if ($value['status']): ?>
							<?php $url = ($value['user'] != '#' && $value['user'] != '') ? $value['pre_url'].$value['user'] : '#' ; ?>
							<li class="<?php echo esc_attr($key); ?>">
								<a href="<?php echo $url; ?>" target="_blank" title="<?php echo $value['desc']; ?>" >
									<i class="<?php echo esc_attr($value['icon']); ?>"></i>
									<?php if($show_title): ?>
										<span><?php echo $value['title']; ?></span>
									<?php endif; ?>
								</a>
							</li>	
						<?php endif ?>
					<?php endforeach ?>
				</ul>
			</div>
		</div>

		<?php
		$output = ob_get_clean();
		wp_reset_query();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_social_profiles','tvlgiao_wpdance_social_profiles_function');
?>