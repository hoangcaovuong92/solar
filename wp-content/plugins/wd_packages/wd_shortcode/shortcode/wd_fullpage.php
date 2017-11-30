<?php
/**
 * Shortcode: tvlgiao_wpdance_fullpage_js
 */

if (!function_exists('tvlgiao_wpdance_fullpage_js_function')) {
	function tvlgiao_wpdance_fullpage_js_function($atts) {
		extract(shortcode_atts(array(
			'content_group'	=> '',
			'class' 		=> ''
		), $atts));
		$content_group 		= vc_param_group_parse_atts( $content_group );
		ob_start(); ?>
			<?php if (count($content_group)) { ?>
				<div class="wd-shortcode-fullpage-wrap <?php echo esc_attr($class); ?>">
					<?php foreach($content_group as $content){ ?>
						<?php if (!empty($content['content']) || !empty($content['background'])): ?>
							<?php 
							$bg_url 		= !empty($content['background']) ? wp_get_attachment_image_src((int)$content['background'], 'full') : '';
							$section_class 	= !empty($content['section_class']) ? $content['section_class'] : ''; ?>
							<div class="section <?php echo esc_attr( $section_class ); ?>" style="background-image: url('<?php echo esc_url($bg_url[0]); ?>'); background-size: cover;">
								<div class="wd-shortcode-fullpage-content"><?php echo do_shortcode( "{$content['content']}" ); ?></div> 
							</div>
						<?php endif ?>
					<?php } ?>
				</div>
			<?php } ?>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_fullpage_js', 'tvlgiao_wpdance_fullpage_js_function');
?>