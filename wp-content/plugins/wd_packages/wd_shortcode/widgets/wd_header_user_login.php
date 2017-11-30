<?php
// we can only use this Widget if the plugin is active
$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
if ( in_array( "woocommerce/woocommerce.php", $_actived ) ) {
	if( !class_exists( 'tvlgiao_wpdance_widget_user_link' ) ) {
		class tvlgiao_wpdance_widget_user_link extends WP_Widget{
		    function __construct() {
				$widget_ops 		= array('classname' => 'widget_user_link', 'description' => esc_html__('User Link Widget','wpdancelaparis'));
				$control_ops 		= array('width' => 400, 'height' => 350);
				parent::__construct('user_link', esc_html__('WD - User Links','wpdancelaparis'), $widget_ops);
			}
		    function form( $instance )
		    {
		        $show_icon      	= esc_attr( isset( $instance['show_icon'] ) ? $instance['show_icon'] : 1 );
		        $class      		= esc_attr( isset( $instance['class'] ) ? $instance['class'] : '' );
		        ?>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('show_icon')); ?>"><?php esc_html_e('Show Title:','wpdancelaparis'); ?></label>
						<select class="widefat" name="<?php echo esc_attr( $this->get_field_name('show_icon')); ?>" id="<?php echo esc_attr($this->get_field_id('show_icon')); ?>">
							<option value="1" <?php echo ($show_icon == 1)?'selected':'' ?> ><?php esc_html_e('Yes','wpdancelaparis'); ?></option>
							<option value="0" <?php echo ($show_icon == 0)?'selected':'' ?> ><?php esc_html_e('No','wpdancelaparis'); ?></option>
						</select>
					</p>
		            <p>
		                <label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php esc_html_e( 'Extra class name:', 'wpdancelaparis' ); ?>
		                <input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo $class; ?>" />
		                </label>
		            </p>
		        <?php
		    }
		    function widget( $args, $instance )
		    {
		        extract($args);
		        $show_icon       	= $instance['show_icon'];
		        $class      	  	= $instance['class'];
		        echo $before_widget;
				echo tvlgiao_wpdance_tini_account( $class, $show_icon );
		        echo $after_widget;
		    }
		    function update( $new_instance, $old_instance )
		    {
		        $instance = $old_instance;
		        $instance['show_icon']            	 = strip_tags( $new_instance['show_icon'] );
		        $instance['class']            	 = strip_tags( $new_instance['class'] );
		        return $instance;
		    }
		}
		//register_widget( 'tvlgiao_wpdance_widget_user_link111');
	}
	function wd_widget_register_widget_user_link() {
		register_widget( 'tvlgiao_wpdance_widget_user_link' );
	}
	add_action( 'widgets_init', 'wd_widget_register_widget_user_link' );
}

?>