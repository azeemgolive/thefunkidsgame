<?php
/**
 * Page Content widget class
 */
class Baol_Widget_Page_Content extends WP_Widget {

	function Baol_Widget_Page_Content() {
		$widget_ops = array('classname' => 'widget_page_content', 'description' => __( "Display the content of the current page (use with Page Layout plugin)", BAOL_PL_TEXTDOMAIN) );
		$this->WP_Widget('page_content', __('Page Content', BAOL_PL_TEXTDOMAIN), $widget_ops);
		$this->alt_option_name = 'widget_page_content';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_page_content', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);		
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		global $post;
		$content = apply_filters('the_content', $post->post_content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
		echo $after_widget;
		
		$cache[$args['widget_id']] = ob_get_flush();
		
		wp_cache_add('widget_recent_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_page_content']) )
			delete_option('widget_page_content');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_page_content', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}
}
function baol_Page_Content_init() {
	if ( !is_blog_installed() ) 
		return;
	register_widget('Baol_Widget_Page_Content');
}

add_action('init', 'baol_Page_Content_init', 1);
?>