<?php 
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
//print an excerpt by specifying a maximium number of characters
if(!function_exists ('tvlgiao_wpdance_the_excerpt_max_charlength')){
	function tvlgiao_wpdance_the_excerpt_max_charlength($charlength,$post = '',$echo = true) {
		if($post){
			$excerpt = wp_strip_all_tags(get_the_excerpt_here($post->ID));
		}
		else
			$excerpt = get_the_excerpt();
		$charlength++;
		
		if(strlen($excerpt)>$charlength) {
		   $subex = substr($excerpt,0,$charlength-5);
		   $exwords = explode(" ",$subex);
		   $excut = -(strlen($exwords[count($exwords)-1]));
		   if($excut<0) {
				$result =  substr($subex,0,$excut);
		   } else {
				$result = $subex;
		   }
			$result .= "...";
	   } else {
		   $result =  $excerpt;
	   }
		if($echo)
			echo esc_html($result);
		return $result;
	}
}

if(!function_exists ('tvlgiao_wpdance_the_excerpt_max_words')){
	function tvlgiao_wpdance_the_excerpt_max_words($word_limit, $post = '', $strip_tags = true) {
		$post_id = ( $post && is_object($post) ) ? $post->ID : get_the_ID();
		$excerpt = (is_home()) ? apply_filters('the_content', get_the_content($post_id)) : get_the_excerpt($post_id);
		
		if (!is_home()) {
			$excerpt = ( !$word_limit || $word_limit == '-1' ) ? $excerpt : wp_trim_words($excerpt, $word_limit, '...') ;
			$excerpt = esc_html( $excerpt );
			if( $strip_tags ){
				$excerpt = wp_strip_all_tags($excerpt);
				$excerpt = strip_shortcodes($excerpt);
			}
		}
		if(is_home()){
			echo do_shortcode($excerpt);
			tvlgiao_wpdance_display_post_page_link();
		}else{
			echo $excerpt;
		}
	}
} ?>