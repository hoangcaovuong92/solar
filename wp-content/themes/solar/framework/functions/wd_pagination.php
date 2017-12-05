<?php
/**
 * TVLGIAO WPDANCE FRAMEWORK 2017.
 *
 * @author : Cao Vuong.
 * -Email  : hoangcaovuong92@gmail.com.
 */

function tvlgiao_wpdance_get_pagenum_link($pagenum = 1, $escape = true ) {
    global $wp_rewrite;

    $pagenum = (int) $pagenum;

    $request = remove_query_arg( 'paged' );

    $home_root = parse_url(home_url('/'));
    $home_root = ( isset($home_root['path']) ) ? $home_root['path'] : '';
    $home_root = preg_quote( trailingslashit( $home_root ), '|' );

    $request = preg_replace('|^'. $home_root . '|', '', $request);
    $request = preg_replace('|^/+|', '', $request);

    if ( !$wp_rewrite->using_permalinks() || is_admin() ) {
        $base = trailingslashit( home_url('/') );

        if ( $pagenum > 1 ) {
            //$result = add_query_arg( 'paged', $pagenum, $base . $request );
			$result = $base . $request;
        } else {
            $result = $base . $request;
        }
    } else {
        $qs_regex = '|\?.*?$|';
        preg_match( $qs_regex, $request, $qs_match );

        if ( !empty( $qs_match[0] ) ) {
            $query_string = $qs_match[0];
            $request = preg_replace( $qs_regex, '', $request );
        } else {
            $query_string = '';
        }

        $request = preg_replace( "|$wp_rewrite->pagination_base/\d+/?$|", '', $request);
        $request = preg_replace( '|^index\.php|', '', $request);
        $request = ltrim($request, '/');

        $base = trailingslashit( home_url('/') );

        if ( $wp_rewrite->using_index_permalinks() && ( $pagenum > 1 || '' != $request ) )
            $base .= 'index.php/';

        if ( $pagenum > 1 ) {
            $request = ( ( !empty( $request ) ) ? trailingslashit( $request ) : $request ) . user_trailingslashit( $wp_rewrite->pagination_base . "/" . $pagenum, 'paged' );
        }

        $result = $base . $request . $query_string;
    }

    $result = apply_filters('get_pagenum_link', $result);

    if ( $escape )
        return esc_url( $result );
    else
        return esc_url_raw( $result );
}

/*
	Generate pagination.
	Input : 
		- int $num_pages_per_phrase : the number of page per group.
	No output.
*/
if(!function_exists ('tvlgiao_wpdance_pagination')){
	function tvlgiao_wpdance_pagination($num_pages_per_phrase = 3, $query = null){
		if(function_exists ('wp_pagenavi')){
			wp_pagenavi() ;			
			return;
		}
		global $wp_query;
		
		$found_posts = $wp_query->found_posts;
		$paged = max( 1, absint( $wp_query->get( 'paged' ) ) );
		$max_num_pages = $wp_query->max_num_pages;
		if( $query != null ){
			$found_posts = $query->found_posts;
			$paged = max( 1, absint( $query->get( 'paged' ) ) );
			$max_num_pages = $query->max_num_pages;
		}

		if( !isset($_GET['page']) ){
			$_GET['page'] = 1;
		}
		if( $found_posts > 0 ): 
			$current_page_request = tvlgiao_wpdance_get_pagenum_link($_GET['page']);
			$current_page_request = str_replace(array('page='.$_GET['page'],'page/'.$_GET['page'], '#038;'),'',$current_page_request);
			
			$term = get_query_var('term');
			$tax = get_query_var('taxonomy');
			$max_page = min(array($max_num_pages,$num_pages_per_phrase));
			if( $max_page <= 0){ 
				$max_page = 1; 
			}
			$phrase = ceil($paged/$max_page);
			$start_page = $max_page*($phrase-1) + 1;
			?>
			<div class="sub-pagination">
				<?php
				if($paged > 1){
					$first_page_link 	= add_query_arg('paged', 1, $current_page_request);
					$previous_page_link = add_query_arg('paged', ($paged - 1), $current_page_request); ?>
					<a class="first" href="<?php echo esc_url($first_page_link); ?>"><?php esc_html_e('Đầu','solar'); ?></a>
					<a class="previous" href="<?php echo esc_url($previous_page_link); ?>"><?php esc_html_e('Trước','solar'); ?></a>
				<?php }
				if($phrase > 1){
					$previous_phrase_link 	= add_query_arg('paged', ($max_page*($phrase-2) + 1), $current_page_request); ?>
					<a class="previous-phrase" href="<?php echo esc_url($previous_phrase_link);?>"><?php esc_html_e('...','solar'); ?></a>
				<?php } ?>
				<?php
				if( $max_num_pages > 1 ) {
					for($i=0;$start_page+$i<=min(array($max_num_pages, $start_page+$max_page-1));$i++){?>
						<?php if($paged==$start_page+$i):?>
							<span class="pager current<?php if($i == 0) echo ' first-pager'; if($start_page+$i == min(array($max_num_pages, $start_page+$max_page-1))) echo ' last-pager';?>"><?php echo ($start_page + $i); ?></span>
						<?php else:?>
							<?php $page_links = add_query_arg('paged', ($start_page + $i), $current_page_request); ?>
							<a class="pager<?php if($i == 0) echo ' first-pager';if($start_page+$i == min(array($max_num_pages, $start_page+$max_page-1))) echo ' last-pager';?>" href="<?php echo esc_url($page_links); ?>"><?php echo ($start_page + $i); ?></a>
						<?php endif; ?>
						<?php
					}
				}
				if($phrase < ceil($max_num_pages/$max_page)){
					$next_phrase_link 	= add_query_arg('paged', ($max_page*$phrase + 1), $current_page_request); ?>
					<a class="next-phrase" href="<?php echo esc_url($next_phrase_link); ?>"><?php esc_html_e('...','solar'); ?></a>
				<?php } ?>
				<?php if($paged < $max_num_pages){
						$next_link 	= add_query_arg('paged', ($paged + 1), $current_page_request);
						$last_link = add_query_arg('paged', $max_num_pages, $current_page_request); ?>
						<a class="next" href="<?php echo esc_url($next_link); ?>"><?php esc_html_e('Sau','solar'); ?></a>
						<a class="last" href="<?php echo esc_url($last_link); ?>"><?php esc_html_e('Cuối','solar'); ?></a>
				<?php }?>
			</div>
			<?php
		endif;
		paginate_links(); /* Fix theme check */				
	}
}
?>