<?php
if (!class_exists('WD_Quickshop')) {
	class WD_Quickshop {
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
 
		protected $parkage_name = '/wd_quickshop';

		public function __construct(){
			$this->constant();
			$this->init_trigger();
			add_action('wp_enqueue_scripts',array($this,'init_script'));
		}

		protected function constant(){
			define('QS_BASE'		,   plugin_dir_path( __FILE__ ) );
			define('QS_BASE_URI'	,   plugins_url( '', __FILE__ ) );
			define('QS_ASSET'		,   plugins_url( '', __FILE__ ) . '/assets' );
			define('QS_LIBS'		,   QS_ASSET . '/libs' );
			define('QS_JS'			, 	QS_ASSET . '/js' );
			define('QS_CSS'			, 	QS_ASSET . '/css' );
		}
		
		public function add_quickshop_button(){
			global $product;
			$custom_class 	= !is_product() ? 'qs-enabled-variation' : 'qs-disabled-variation' ;
			$prod_url 		= get_admin_url()	. "admin-ajax.php?ajax=true&action=qs_load_product_content&product_id=".$product->get_id()."&custom_class=".$custom_class;
			?>
			<a class="wd_quickshop_handler" title="<?php esc_html_e('Quick View','wd_package');?>" href="<?php echo esc_url($prod_url); ?>">
				<span class="qs_inner1">
					<span class="qs_inner2">  
						<?php esc_html_e("QUICK SHOP",'wd_package'); ?>
					</span>
				</span>
			</a>
		<?php	
		}	 
		
		public function quickshop_init_product_id(){
			global $product;
			echo "<input type='hidden' value='{$product->get_id()}' class='hidden_product_id product_hidden_{$product->get_id()}'>";
		}
		
		public function update_qs_add_to_cart_url(  $cart_url ){
			$ref_url = wp_get_referer();
			$ref_url = remove_query_arg( array('added-to-cart','add-to-cart') , $ref_url );
			$ref_url = add_query_arg( array( 'add-to-cart' => $this->id ),$ref_url );
			return esc_url($ref_url);
		}

		protected function init_trigger(){
			//Quickshop callback Ajax
			add_action('wp_ajax_qs_load_product_content', array( $this, 'qs_load_product_content_callback') );
			add_action('wp_ajax_nopriv_qs_load_product_content', array( $this, 'qs_load_product_content_callback') );	

			//Add quickshop button to frontend
			add_action('woocommerce_after_shop_loop_item', array( $this, 'quickshop_init_product_id'), 100000000000 );
			add_action('tvlgiao_wpdance_button_shop_loop', array( $this, 'add_quickshop_button'), 5 );
		}	
		
		
		public function qs_load_product_content_callback(){
			global $post, $product, $woocommerce;
			$prod_id 		= absint($_GET['product_id']);
			$custom_class 	= $_GET['custom_class'];
			$this->id 		= $prod_id;
			$post 			= get_post( $prod_id );
			$product 		= get_product( $prod_id );

			if( $prod_id <= 0 ){
				die('Invalid Products');
			}
			if( !isset($post->post_type) || strcmp($post->post_type,'product') != 0 ){
				die('Invalid Products');
			}
			add_filter(	'woocommerce_add_to_cart_url', array($this, 'update_qs_add_to_cart_url'),10 );
			ob_start();	
			?>		
			<div class="woocommerce woocommerce-page wd-quickshop-detail-page">
				<div itemscope itemtype="http://schema.org/Product" id="product-<?php echo get_the_ID();?>" class="wd_quickshop product">
					<div class="qs-left-content <?php echo esc_attr( $custom_class ); ?>">
						<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
						<div class="details_view">
							<a href="<?php echo the_permalink();?>" title="<?php esc_html_e('View Details','wd_package');?>" ><?php esc_html_e('View Details','wd_package');?></a>
						</div>
					</div>
			
					<div class="qs-right-content summary entry-summary">
						<?php do_action( 'woocommerce_single_product_summary' ) ?>
					</div><!-- .summary -->
					
				</div><!-- #product-<?php echo get_the_ID();?> -->	
			</div>
			<?php
			remove_filter( 'woocommerce_add_to_cart_url', array($this, 'update_qs_add_to_cart_url') );
			$_ret_html = ob_get_clean();
			wp_reset_query();
			die($_ret_html);
		} 
		
		public function init_script(){	
			wp_enqueue_style('prettyPhoto-core'			, QS_LIBS.'/jquery-prettyphoto/css/prettyPhoto.css');
			wp_enqueue_style('cloud-zoom-core'			, QS_LIBS.'/cloud-zoom/css/cloud-zoom.css');
			wp_enqueue_style('slick-core'				, QS_LIBS.'/slick/slick.css');
			wp_enqueue_style('slick-theme-css'			, QS_LIBS.'/slick/slick-theme.css');
			//wp_enqueue_style('jquery-thumbelina-core'	, QS_LIBS.'/jquery-thumbelina/thumbelina.css');
			wp_enqueue_style('wd-quickshop-css'			, QS_CSS.'/quickshop.css');

			wp_enqueue_script('jquery');
			//wp_enqueue_script('TweenMax'				, QS_LIBS.'/tweenmax/js//TweenMax.min.js');
			wp_enqueue_script('prettyPhoto-core'		, QS_LIBS.'/jquery-prettyphoto/js/jquery.prettyPhoto.min.js',array('jquery'));
			wp_enqueue_script('cloud-zoom-core'			, QS_LIBS.'/cloud-zoom/js/cloud-zoom.1.0.2.js',false,false,true );
			//wp_enqueue_script('jquery.money'			, QS_LIBS.'/money/js/money.min.js',false,false,true );
			wp_enqueue_script('slick-core'				, QS_LIBS.'/slick/slick.min.js',false,false,true);
			//wp_enqueue_script('jquery-thumbelina-core'	, QS_LIBS.'/jquery-thumbelina/thumbelina.js',false,false,true);
			//wp_enqueue_script('cart-variation'		, QS_JS.'/add-to-cart-variation.min.js',false,false,true);
			if (!is_product()) {
				wp_enqueue_script('wc-add-to-cart-variation');
			}
			wp_enqueue_script('wd-quickshop-js'			, QS_JS.'/quickshop.js',false,false,true);
		}
	}	
	add_action('woocommerce_init', 'wd_package_quick_shop_load' );
	function wd_package_quick_shop_load(){
		WD_Quickshop::get_instance();
	}
}
?>