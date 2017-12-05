<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
// Filter Search Form
add_filter( 'get_search_form', 'tvlgiao_wpdance_search_form' );
if(!function_exists ('tvlgiao_wpdance_search_form')){
	function tvlgiao_wpdance_search_form( $form ) {
		/**
	     * package: search-form
		 * var: type 		
		 * var: autocomplete 
		 * var: ajax 		
		 */
		extract(tvlgiao_wpdance_get_data_package( 'search-form' ));

		$data_autocomplete 	= ($autocomplete && !$ajax) ? tvlgiao_wpdance_get_array_post_name($type) : '';
		$random_id   		= 'wd-search-form-'.mt_rand();
		$custom_class   	= ($autocomplete) ? 'wd-search-with-autocomplete' : 'wd-search-without-autocomplete';
		$custom_class   	.= ($ajax) ? ' wd-search-with-ajax' : ' wd-search-without-ajax';
		$button_title		= ($type == 'post') ? esc_html__( 'Search blog' , 'solar') : esc_html__( 'Search product' , 'solar');
	    ob_start(); ?>
		    <form role="search" method="get" id="<?php echo esc_attr($random_id); ?>" class="wd-search-form-default" action="<?php echo esc_url(home_url( '/' )); ?>" >
		    	<div class="wd-search-form-wrapper">
		    		<?php if ($autocomplete && $ajax): ?>
		    			<div class="wd-search-form-image-loading hidden">
							<img src="<?php echo TVLGIAO_WPDANCE_THEME_IMAGES.'/loading.gif'; ?>" alt="Loading Icon">
						</div>
		    		<?php endif ?>
		    		
		    		<input type="hidden" name="post_type" value="<?php echo esc_html($type); ?>" />
		    		<input 	type="text" name="s" 
		    				class="wd-search-form-text <?php echo esc_attr($custom_class); ?>" 
		    				data-post_type="<?php echo esc_attr($type); ?>" 
		    				data-autocomplete="<?php echo esc_attr($data_autocomplete); ?>" 
		    				placeholder="<?php echo esc_html__( 'Search item here' , 'solar'); ?>" 
		    				value="<?php echo esc_attr(get_search_query()); ?>" />
		    		<button type="submit" title="<?php echo $button_title; ?>"><i class="lnr lnr-magnifier"></i><?php esc_html_e( 'Search' , 'solar'); ?></button>
		    	</div>
		    </form>
		<?php
	    return ob_get_clean();
	}
}