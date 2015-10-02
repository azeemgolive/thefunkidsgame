<?php
/*
Plugin Name: PageLayout
Plugin URI: http://keceloce.net/wordpress-page-layout/
Description: PageLayout permette di modificare il layout delle pagine di WordPress
Version: 0.3
Author: Luca Realdi
*/

//avoid direct calls to this file, because now WP core and framework has been used
if ( !function_exists('add_action') ) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}

if ( function_exists('add_action') ) {
	//WordPress definitions
	if ( !defined('WP_CONTENT_URL') )
		define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
	if ( !defined('WP_CONTENT_DIR') )
		define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
	if ( !defined('WP_PLUGIN_URL') )
		define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
}

define( 'BAOL_PL_TEXTDOMAIN', 'page_layout' );
define( 'BAOL_PL_BASEFOLDER', plugin_basename( dirname( __FILE__ ) ) );

if ( !class_exists('PageLayout') ) {
	class PageLayout {
		
		var $registered_layouts;
		var $current_layout;
		
		function __construct(){		
			load_plugin_textdomain( BAOL_PL_TEXTDOMAIN, false, BAOL_PL_BASEFOLDER . '/languages/' );
			
			require( WP_PLUGIN_DIR . '/' . BAOL_PL_BASEFOLDER . '/widget-page-content.php' );
			
			if ( function_exists('register_activation_hook') )
				register_activation_hook( __FILE__, array(&$this, 'activate') );
			
			if ( function_exists('register_uninstall_hook') )
				register_uninstall_hook( __FILE__, array(&$this, 'deactivate') );
			
			if ( function_exists('register_deactivation_hook') )
				register_deactivation_hook( __FILE__, array(&$this, 'deactivate') );							
			
			$this->registered_layouts = array();
			add_action( 'init', array(&$this, 'init') );			
		}
		
		function activate() {return true;}
		
		function deactivate() {return true;}					
		
		function init(){						
			add_action( 'wp_ajax_pagelayout_action', array( &$this, 'callback' ));
			add_action( 'do_meta_boxes', array( &$this, 'add_meta_box' ), 10, 2 );
			add_action( 'save_page', array( &$this, 'save_meta_box' ));
			add_action( 'save_post', array( &$this, 'save_meta_box' ));
			add_action( 'sidebar_admin_setup', array( &$this, 'register_zones_as_sidebars' ) );		
			add_action( 'admin_head', array( &$this, 'clean_sidebar_admin' ) );
			add_filter( 'the_posts', array( &$this, 'the_posts'));
			add_action( 'template_redirect', array( &$this, 'redirect'));
		}
		
		function defaults(){						
			$this->register_layout(array(
				'name' => '4 zones',
				'zones' => array('top', 'left', 'right', 'bottom'),
				'thumbnail' => '4zones.jpg',
				'template' => '4zones'
			));			
			$this->register_layout(array(
				'name' => '3 zones',
				'zones' => array('left', 'center', 'right'),
				'thumbnail' => '3zones.jpg',
				'template' => '3zones'
			));			
			return;
		}
		
		function undefaults(){
			$this->unregister_layout('4 zones');
			$this->unregister_layout('3 zones');
		}
		
		function set_current_layout($post_ID = 0, $update = false, $save = false){	
			
			if ( $update ){			
				if ( $save ){
					if ($update['layout_id'] == 0) return false;
					unset($update['tmp']);
					update_post_meta( $update['post_ID'], '_layout', $update );
					delete_post_meta( $update['post_ID'], '_layout_tmp' );
					return get_post_meta( $post_ID, '_layout', true);
				} else {
					update_post_meta( $update['post_ID'], '_layout_tmp', $update );
				}
			}
			
			$default = array(
				'layout_id' => 0,
				'zones' => array()
			);
			
			$this->current_layout =  get_post_meta( $post_ID, '_layout_tmp', true) ;		
			if ($this->current_layout){
				$this->current_layout['tmp'] = true;
				return $this->current_layout;
			}
			
			$this->current_layout =  get_post_meta( $post_ID, '_layout', true) ;
			if ($this->current_layout) 
				return $this->current_layout;		
			
			return $this->current_layout = $default;
		}
		
		function get_layouts(){
			global $wpdb;
			return $wpdb->get_results("SELECT post_id, meta_value FROM $wpdb->postmeta WHERE meta_key = '_layout'");
		}
		
		function register_zones_as_sidebars(){
			$layouts = $this->get_layouts();			
			if ($layouts){ 		
				foreach ( $layouts as $_layout ) {
					$layout =  maybe_unserialize($_layout->meta_value);
					if ($this->registered_layouts[$layout['layout_id']]){
						$i = 0;
						foreach($layout['zones'] as $zone){
							register_sidebar(array(
								'name' => 'page-' . $_layout->post_id . '-zone-' . $i,
								'id' => 'zone-'.$i.'-page-'.$_layout->post_id,
								'before_widget' => '<div id="%1$s" class="widget zone %2$s float-break">',
								'after_widget' => '</div>',
								'before_title' => '<h2 class="widgettitle">',
								'after_title' => '</h2>',
							));
							$i++;
						}
					}
				}
			}		
			return;
		}
		
		function clean_sidebar_admin(){
			$layouts = $this->get_layouts();
			$sidebars = array();		
			if ($layouts){ 		
				foreach ( $layouts as $_layout ) {
					$layout =  maybe_unserialize($_layout->meta_value);
					if ($this->registered_layouts[$layout['layout_id']]){
						$i = 0;					
						foreach($layout['zones'] as $zone){
							$sidebars[] = 'zone-'.$i.'-page-'.$layout['post_ID'];
							$i++;
						}
					}
				}
			}
			echo '<script type="text/javascript"> jQuery(document).ready(function() { ';
			echo 'jQuery("';
			$i = 1;
			foreach($sidebars as $sidebar){
				echo '.widgets-php #'.$sidebar;
				if ($i < count($sidebars)) echo ',';
				$i++;
			}
			echo '").parent().css("display", "none")';
			echo '}); </script>';
			return;
		}
		
		function register_layout( $args ){
			if ( is_string($args) )
				parse_str($args, $args);

			$i = count($this->registered_layouts) + 1;

			$defaults = array(
				'name' => sprintf(__('Layout %d', BAOL_PL_TEXTDOMAIN), $i ),
				'id' => $i,
			);
			
			if (isset($args['id'])) unset($args['id']);
			
			if (empty($args['zones']) || empty($args['template']))
				return false;			
			
			$path = dirname(__FILE__);

			$is_template = false;

			if (is_file(get_stylesheet_directory().'/layouts/'.$args['template'].'.php')) $is_template = true;
			if (is_file(WP_PLUGIN_DIR.'/'.BAOL_PL_BASEFOLDER.'/layouts/'.$args['template'].'.php')) $is_template = true;
			
			if ($is_template == false) 
				return false;

			$layout = array_merge($defaults, (array) $args);

			$this->registered_layouts[$layout['id']] = $layout;

			return $this->registered_layouts[$layout['id']];	
		}
		
		function unregister_layout($name){
			foreach( $this->registered_layouts as $layout){
				if ($layout['name'] == $name)
					unset($this->registered_layouts[$layout['id']]);
			}
		}
		
		function meta_box() {
			global $post;
			delete_post_meta( $post->ID, '_layout_tmp' );
			$this->current_layout = $this->set_current_layout($post->ID);
			if ( isset( $this->registered_layouts[$this->current_layout['layout_id']] ) ):?>
				<script type="text/javascript"> currentLayout = <?php echo ($this->current_layout['layout_id']) ?>; </script>
			<?php else:?>
				<script type="text/javascript"> currentLayout = 0; </script>
			<?php endif; ?>
				<div id="baol_layout_container">		
					<?php $this->start();?>
				</div>
			<?php
		}
		
		function start(){
			wp_nonce_field( 'pagelayout_nonce', '_pagelayout_nonce', false, true );?>	
			<div id="baol_spinner" class="hide">Loading...</div>
			<div id="baol_layout-message">
			<?php if ( !empty($this->current_layout['tmp']) ):?>
				 <p class='message'><?php _e( "There's a layout not saved for this page.", BAOL_PL_TEXTDOMAIN );?></p>
			<?php endif;?>	
			</div>

			<?php if ( $this->current_layout['layout_id'] == 0 ): ?>
				<div id="baol_layout-activate-container" class="float-break">
					<a class="button" href="#activate" id="baol_layout-activate" onclick="javascript:layout_activate(); return false;"><?php _e( "Activate the layout options for this page", BAOL_PL_TEXTDOMAIN ) ?></a>
				</div>
			<?php endif;?>

			<div id="baol_layout-layout" class="float-break">
				<?php if ( $this->current_layout['layout_id'] > 0 ) $this->display_layout(); ?>
			</div>

			<div id="baol_layout-layout_detail">
				<?php if ( $this->current_layout['layout_id'] > 0 ) $this->display_layout_detail($this->current_layout['layout_id'], $this->current_layout['post_ID']); ?>
			</div>

			<div class="float-break clear<?php if ( $this->current_layout['layout_id'] == 0 ) echo ' hide'; ?>" id="baol_layout-buttons">
				<?php wp_nonce_field( 'save-sidebar-widgets', '_wpnonce_widgets', false ); ?>
				<a class="button-primary alignright" href="#save" id="baol_layout-save" onclick="javascript:layout_save(); return false;"><?php _e( "Save the layout settings", BAOL_PL_TEXTDOMAIN ) ?></a>
				<a class="button alignright" href="#delete" id="baol_layout-delete" onclick="javascript:layout_delete(); return false;"><?php _e( "Delete the layout settings", BAOL_PL_TEXTDOMAIN ) ?></a>
			</div>		
		<?php
		}

		function save_meta_box( $post_ID ) {
			if ( wp_verify_nonce( $_POST['_pagelayout_nonce'], 'pagelayout_nonce' ) ) {
				return $post_ID;
			}
			return $post_ID;
		}

		function add_meta_box( $page, $context ) {
			if ( 'page' === $page  ){		
				wp_enqueue_script( 'jquery-ui-tabs' );
				//wp_enqueue_script( 'admin-widgets' );
				wp_enqueue_script( 'page-layout-widgets', WP_PLUGIN_URL.'/'.BAOL_PL_BASEFOLDER.'/js/widgets.js', array( 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-droppable' ), '0.1', true );
				wp_enqueue_script( 'page-layout', WP_PLUGIN_URL.'/'.BAOL_PL_BASEFOLDER.'/js/page-layout.js', array( 'jquery' ), '0.1', true );
				wp_enqueue_style( 'page-layout', WP_PLUGIN_URL.'/'.BAOL_PL_BASEFOLDER.'/css/page-layout.css', array(), '0.1', 'screen' );			
				add_meta_box('baol_pagelayout', 'Page Layout', array($this, 'meta_box'), $page, 'normal', 'low');
			}
		}

		function callback() {		
			if ( wp_verify_nonce( $_POST['_pagelayout_nonce'], 'pagelayout_nonce' ) ) {
				if ( method_exists($this, $_POST['_action']) ) :
					call_user_func(array($this, $_POST['_action']));			
				else :
					echo __( 'Error in ajax action. Aborting...', BAOL_PL_TEXTDOMAIN );
				endif;
			}else{
				echo __( 'Wp_nonce not recognized. Aborting...', BAOL_PL_TEXTDOMAIN );
			}
			die();
		}

		function pagelayout_activate() {		
			if ( empty( $this->registered_layouts ) ):
				$_POST['error_code'] = 2;
				return $this->pagelayout_error();
			endif;
			return $this->display_layout();
		}
		
		function display_layout() {
			?>
			<h4><?php _e( "Select a layout:", BAOL_PL_TEXTDOMAIN );?></h4>
			<?php			
			foreach ($this->registered_layouts as $id => $layout):			
				
				if (is_file(WP_PLUGIN_DIR.'/'.BAOL_PL_BASEFOLDER.'/layouts/thumb/'.$layout['thumbnail'])) 
					$is_thumb = WP_PLUGIN_URL.'/'.BAOL_PL_BASEFOLDER.'/layouts/thumb/'.$layout['thumbnail'];
				
				if (is_file(TEMPLATEPATH.'/layouts/thumb/'.$layout['thumbnail'])) 
					$is_thumb = get_bloginfo('template_url').'/layouts/thumb/'.$layout['thumbnail'];?>
				
				<div id="layout-layout-<?php echo $id?>" class="layout-layout widget<?php if ($this->current_layout['layout_id'] == $id) echo ' current'?>">
				<a href="#select" id="layout-<?php echo $id;?>" class="select-layout" onclick="javascript:select_layout(<?php echo $id?>); return false;">
				<?php if ($is_thumb) :?>
					<img src="<?php echo $is_thumb;?>" alt="<?php echo $layout['name'].' ('.implode(', ', $layout['zones']).')';?>" title="<?php echo $layout['name'].' ('.implode(', ', $layout['zones']).')';?>"/>
				<?php else : ?>
					<div class="thumb-replace"><?php echo $layout['name'];?></div>
				<?php endif; ?>
				</a>
				<p><?php echo $layout['name'];?></p>
				</div>
				
				<?php $is_thumb = false;			
			
			endforeach;
		}
		
		function select_layout(){		
			$layout_id = intval($_POST['layout_id']);
			$post_ID = intval($_POST['post_ID']);		
			return $this->display_layout_detail( $layout_id, $post_ID );
		}
		
		function display_layout_detail($layout_id, $post_ID) {		
			$i = 1;
			$update = array( 'layout_id' => $layout_id, 'post_ID' => $post_ID, 'zones' => array() );
			
			require_once(ABSPATH . 'wp-admin/includes/widgets.php');
			global $wp_registered_widget_updates, $wp_registered_sidebars, $sidebars_widgets, $wp_registered_widgets;
			
			$this->register_zones_as_sidebars();
			$sidebars_widgets = wp_get_sidebars_widgets();
			
			if ( empty( $sidebars_widgets ) )
				$sidebars_widgets = wp_get_widget_defaults();?>
				
				<h4><?php _e( "Select a zone and drag a widget", BAOL_PL_TEXTDOMAIN );?></h4>
				<div id="widget-list" class="float-break clear">
				<?php wp_list_widgets(); ?>
				</div>
						
				<div class="details clear">
				<ul><?php 
				
				foreach ( $this->registered_layouts[$layout_id]['zones'] as $i => $zone ) :
					register_sidebar(array(
						'name' => $zone,
						'id' => 'zone-'.$i.'-page-'.$post_ID,
						'before_widget' => '<div id="%1$s" class="widget zone %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h2 class="widgettitle">',
						'after_title' => '</h2>',
					));
					$update['zones'][] = 'zone-'.$i.'-page-'.$post_ID;?>
				
					<li><a href="#zone-<?php echo $i?>-panel"><span><?php echo $zone?></span></a></li><?php 
				
				endforeach; 
			
				$this->current_layout = $this->set_current_layout($post_ID, $update);?>
				
				</ul><?php		
				
				foreach ( $this->registered_layouts[$layout_id]['zones'] as $i => $zone ) :?>
			
					<div id="zone-<?php echo $i?>-panel">
						<div class="widgets-zone-sortables zone-name">
						<?php wp_list_widget_controls('zone-'.$i.'-page-'.$post_ID);?>
						</div>
					</div><?php
			
				endforeach;?>
				
				</div>
				
				<div style="display:none !important">
				
				<?php foreach ( $wp_registered_sidebars as $sidebar => $registered_sidebar ) {
					if ( in_array($sidebar, $update['zones']) ) continue;
					wp_list_widget_controls( $sidebar ); 
				} ?>
				
				</div><?php
		}
		
		function pagelayout_error(){
			$error_codes = array(
				'1' => __( "Please, save a draft before activate the layout options.", BAOL_PL_TEXTDOMAIN ),
				'2' => __( "Register almost one layout in your function.php.", BAOL_PL_TEXTDOMAIN ),
			);
			
			if ( in_array( $_POST['error_code'], array_keys( $error_codes ) ) ) :?>				
				<p class='message'><?php echo $error_codes[$_POST['error_code']];?></p>
			<?php else:
				echo __( 'Error undefined', BAOL_PL_TEXTDOMAIN );
			endif;
		}
		
		function pagelayout_save(){
			$post_ID = intval($_POST['post_ID']);
			$current_layout = $this->set_current_layout($post_ID);
			$this->current_layout = $this->set_current_layout($post_ID, $current_layout, true);
			return $this->display_layout();
		}
		
		function pagelayout_delete(){
			$post_ID = intval($_POST['post_ID']);
			delete_post_meta( $post_ID, '_layout' );
			delete_post_meta( $post_ID, '_layout_tmp' );
			$this->current_layout = $this->set_current_layout($post_ID);
			$this->start();
		}
		
		function the_posts($posts) {
			for ($i = 0; $i < sizeof($posts); $i ++) {
					$post = &$posts[$i];
					if (get_post_meta( $post->ID, '_layout', true))
						$post->layout = get_post_meta( $post->ID, '_layout', true);
			}
			return $posts;
		}
		
		function redirect(){
			global $wp_query;
			$post = $wp_query->post;
			if ( post_password_required($post) ) {
				$output = get_the_password_form();
				return $output;
			}
			if ( is_page() && !empty($post->layout) ) {
				$layout_id = $post->layout['layout_id'];
				$template = $this->registered_layouts[$layout_id]['template'];
				
				if (is_file(WP_PLUGIN_DIR.'/'.BAOL_PL_BASEFOLDER.'/layouts/'.$template.'.php')) 
					$file_template = WP_PLUGIN_DIR.'/'.BAOL_PL_BASEFOLDER.'/layouts/'.$template.'.php';					
				if (is_file(get_stylesheet_directory().'/layouts/'.$template.'.php'))
					$file_template = get_stylesheet_directory().'/layouts/'.$template.'.php';
				
				if (is_file(WP_PLUGIN_DIR.'/'.BAOL_PL_BASEFOLDER.'/css/page-layout-general.css'))
					$general_css = WP_PLUGIN_URL.'/'.BAOL_PL_BASEFOLDER.'/css/page-layout-general.css';
				if (is_file(WP_PLUGIN_DIR.'/'.BAOL_PL_BASEFOLDER.'/css/'.$template.'.css'))
					$template_css = WP_PLUGIN_URL.'/'.BAOL_PL_BASEFOLDER.'/css/'.$template.'.css';
				
				if ($file_template){
					$this->register_zones_as_sidebars();
					
					// start include Kubrick-like css (if Kubrick theme loading a css for support example)
					$theme_data = get_theme_data( get_stylesheet_directory() . '/style.css');
					if ( $theme_data['Name'] == 'WordPress Default' )
						wp_enqueue_style( 'page-layout-example', WP_PLUGIN_URL.'/'.BAOL_PL_BASEFOLDER.'/css/kubrick-example.css', array(), '0.1', 'screen' );
					// end include Kubrick-like css
					
					if ($general_css)
						wp_enqueue_style( 'page-layout-general', $general_css, array(), '0.1', 'screen' );
						
					if ($template_css)
						wp_enqueue_style( $template, $template_css, array(), '0.1', 'screen' );
					
					include($file_template);					
					die();
				}
			}
			return false;
		}
	}

	$PageLayout = new PageLayout;			
	
	function register_layout($args){
		global $PageLayout;
		return $PageLayout->register_layout($args);
	}
	
	$PageLayout->defaults();	
}
?>
