<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */
 
add_action('wp_enqueue_scripts', 'tvlgiao_wpdance_google_fonts_load');

/* Load font list from xml file */
if(!function_exists ('tvlgiao_wpdance_google_fonts_load')){
	function tvlgiao_wpdance_google_fonts_load(){
		global $tvlgiao_wpdance_font_web, $tvlgiao_wpdance_google_fonts;
		$xml_file 			= 'font_config';
		$objXML_font 		= simplexml_load_file(TVLGIAO_WPDANCE_THEME_WPDANCE."/config_xml/".$xml_file.".xml");
		$list_font_used		= is_array($tvlgiao_wpdance_font_web) ? $tvlgiao_wpdance_font_web : array();
		ob_start();
		if ( TVLGIAO_WPDANCE_USE_CONTROL == 'customize' ) {
			foreach ($objXML_font->children() as $child) {	 				
				foreach ($child->items->children() as $childofchild) { 		
					$name 	 			=  (string)$childofchild->name;		
					$slug 	 			=  (string)$childofchild->slug;
					$std 	 			=  (string)$childofchild->std;
					$frontend 			=  $childofchild->frontend; 		
					$font_name 			=  get_theme_mod($slug, $std);
					$list_font_used[$font_name]	= $font_name;
				}
			}	
		}

		$string_font = array();
		if (count($list_font_used) > 0) {
			foreach ($list_font_used as $font_name) {
				foreach ($tvlgiao_wpdance_google_fonts as $key => $value) {
					if ($value->font_family == $font_name) {
						$name  	= str_replace( " ", "+", trim($value->font_family) );
						$name   .= ':'.$value->font_styles;
						$string_font[] = $name;
					}
				}
			}
		}
		tvlgiao_wpdance_load_google_fonts_with_css($string_font);	
	}
}

/* enqueue google font with js */
if(!function_exists ('tvlgiao_wpdance_load_google_fonts_with_js')){
	function tvlgiao_wpdance_load_google_fonts_with_js($font_array = array()) {
		ob_start(); 
		if( count($font_array) > 0 ){ 
			$font_string 	= implode(',', $font_array); ?>
			<script type="text/javascript">
				WebFontConfig = {
					google: { families: [ <?php echo $font_string; ?> ] }
				};
				(function () {
					var wf   = document.createElement( 'script' );
					wf.src   = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
					wf.type  = 'text/javascript';
					wf.async = 'true';
					var s    = document.getElementsByTagName( 'script' )[ 0 ];
					s.parentNode.insertBefore( wf, s );
				})();
			</script>
			<?php
			$output = str_replace( array( '<script type="text/javascript">', '</script>' ), '', ob_get_clean() );
			wp_add_inline_script( 'wd-custom-script-inline-js', $output );
		}
	}
}

/* enqueue google font with css */
if(!function_exists ('tvlgiao_wpdance_load_google_fonts_with_css')){
	function tvlgiao_wpdance_load_google_fonts_with_css($font_array = array()) {
		if( count($font_array) > 0 ){
			$font_string 	= implode('|', $font_array);
			$protocol 		= is_ssl() ? 'https' : 'http';
			$url 			= "{$protocol}://fonts.googleapis.com/css?family={$font_string}";
			wp_enqueue_style( "wd-google-font", str_replace(' ', '%20', $url) );
		}
	}	
}
?>