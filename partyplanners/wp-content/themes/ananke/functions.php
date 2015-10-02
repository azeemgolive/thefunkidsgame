<?php
global $theme_option;
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' );
}
//Custom fields:
require_once dirname( __FILE__ ) . '/framework/bfi_thumb-master/BFI_Thumb.php';
require_once dirname( __FILE__ ) . '/framework/Custom-Metaboxes/metabox-functions.php';
require_once dirname( __FILE__ ) . '/framework/post_type.php';
require_once dirname( __FILE__ ) . '/shortcodes.php';
require_once dirname( __FILE__ ) . '/framework/wp_bootstrap_navwalker.php';

//Theme Set up:
function ananke_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cubic, use a find and replace
	 * to change 'cubic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ananke', get_template_directory() . '/languages' );

    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    //Post formats
    add_theme_support( 'post-formats', array(
        'audio',  'gallery', 'image', 'quote', 'video'
    ) );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => __('Menu Home <b>Only Use For Home Page</b>', 'ananke'),		
		'secondary' => __('Menu Pages <b>Only Use For All Other Pages</b>', 'ananke'),
	) );
    // This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
    add_shortcode('gallery', '__return_false');
}
add_action( 'after_setup_theme', 'ananke_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

function ananke_theme_scripts_styles() {
	global $theme_option;
	$protocol = is_ssl() ? 'https' : 'http';
  
	wp_enqueue_style( 'fonts-Montserrat', "$protocol://fonts.googleapis.com/css?family=Montserrat:400,700", true);
	wp_enqueue_style( 'fonts-Lato', "$protocol://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic", true);
	wp_enqueue_style( 'fonts-Open+Sans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800", true);
	wp_enqueue_style( 'fonts-Open+Sans+subset', "$protocol://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic", true);
	wp_enqueue_style( 'fonts-Satisfy', "$protocol://fonts.googleapis.com/css?family=Satisfy", true);

	wp_enqueue_style( 'base', get_template_directory_uri().'/css/base.css');
	wp_enqueue_style( 'skeleton', get_template_directory_uri().'/css/skeleton.css');
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '2014-11-11' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style( 'flat', get_template_directory_uri().'/css/flat_filled_styles.css');
	wp_enqueue_style( 'fancybox', get_template_directory_uri().'/css/jquery.fancybox.css');
	wp_enqueue_style( 'revolution', get_template_directory_uri().'/css/settings.css');
	wp_enqueue_style( 'retina', get_template_directory_uri().'/css/retina.css');
	
	// Style Dark color for Skill Dark
	if ($theme_option['theme_style'] != 'light' || is_page_template('page-templates/template-canvas-dark.php')) {
		wp_enqueue_style( 'dark-color', get_template_directory_uri().'/css/dark.css');
	}
	
	wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script("jquery");	
	wp_enqueue_script("modernizr", get_template_directory_uri()."/js/modernizr.custom.js",array(),false,false);
	if($theme_option['show_pre'] != 'no') { 
		wp_enqueue_script("preloader", get_template_directory_uri()."/js/royal_preloader.min.js",array(),false,false);
	}
	wp_enqueue_script("classie", get_template_directory_uri()."/js/classie.js",array(),false,true);
	wp_enqueue_script("cbpAnimatedHeader", get_template_directory_uri()."/js/cbpAnimatedHeader.min.js",array(),false,true);
	wp_enqueue_script("retina-js", get_template_directory_uri()."/js/retina-1.1.0.min.js",array(),false,true);
	wp_enqueue_script("easing", get_template_directory_uri()."/js/jquery.easing.js",array(),false,true);
	wp_enqueue_script("flippy", get_template_directory_uri()."/js/flippy.js",array(),false,true);
	if(is_page_template('page-templates/template-canvas-dark.php') || is_page_template('page-templates/template-canvas.php') ){
		wp_enqueue_script("tiltSlider", get_template_directory_uri()."/js/tiltSlider.js",array(),false,false);
	}		
	wp_enqueue_script("flexslider", get_template_directory_uri()."/js/jquery.flexslider-min.js",array(),false,true);
	wp_enqueue_script("parallax", get_template_directory_uri()."/js/jquery.parallax-1.1.3.js",array(),false,true);
	wp_enqueue_script("scroll", get_template_directory_uri()."/js/jquery.localscroll-1.2.7-min.js",array(),false,true);
	wp_enqueue_script("scrollTo", get_template_directory_uri()."/js/jquery.scrollTo-1.4.2-min.js",array(),false,true);
	wp_enqueue_script("fancybox-js", get_template_directory_uri()."/js/jquery.fancybox.js",array(),false,true);
	wp_enqueue_script("flat-js", get_template_directory_uri()."/js/svg_inject_flat_icons_filled.js",array(),false,true);
	wp_enqueue_script("mapapi", "$protocol://maps.google.com/maps/api/js?sensor=true",array(),false,false);
	wp_enqueue_script("plugins", get_template_directory_uri()."/js/plugins.js",array(),false,true);	
	wp_enqueue_script("fitvids", get_template_directory_uri()."/js/jquery.fitvids.js",array(),false,true);
	wp_enqueue_script("template", get_template_directory_uri()."/js/template.js",array(),false,true); 
}
add_action( 'wp_enqueue_scripts', 'ananke_theme_scripts_styles');

if(!function_exists('ananke_custom_frontend_style')){
	function ananke_custom_frontend_style(){
		global $theme_option;
		echo '<style type="text/css">'.$theme_option['custom-css'].'</style>';
	}
}
add_action('wp_head', 'ananke_custom_frontend_style');

if(!function_exists('ananke_custom_frontend_scripts')){
	function ananke_custom_frontend_scripts(){
		global $theme_option;
		echo htmlspecialchars_decode( $theme_option['google_id'] );
		if($theme_option['show_pre'] != 'no') { 	
		?>
			<script>
				window.jQuery = window.$ = jQuery;	
				(function($) { "use strict";
				  Royal_Preloader.config({
					  mode:           'text', // 'number', "text" or "logo"
					  text:           '<?php echo esc_attr($theme_option['preloadtext']); ?>',
					  timeout:        0,
					  showInfo:       true,
					  opacity:        1,
					  background:     ['<?php echo esc_attr($theme_option['bgpreload']); ?>']
				  });
				})(jQuery);
		</script>
		<?php
		}
	}
}
add_action('wp_footer', 'ananke_custom_frontend_scripts');

//Custom Excerpt Function
function ananke_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}
// Widget Sidebar
function ananke_widgets_init() {
	register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'ananke' ),
        'id'            => 'sidebar-1',        
		'description'   => __( 'Appears in the sidebar section of the site.', 'ananke' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h6>',        
		'after_title'   => '</h6>'
    ) );
}
add_action( 'widgets_init', 'ananke_widgets_init' );

//Create a nicely formatted and more specific title element text for output
function ananke_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	
	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ananke' ), max( $paged, $page ) );
	}
	
	return $title;
}
add_filter( 'wp_title', 'ananke_wp_title', 10, 2 );

//function tag widgets
function ananke_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'ananke_tag_cloud_widget' );

function ananke_excerpt() {
  global $theme_option;
  if(isset($theme_option['blog_excerpt'])){
    $limit = $theme_option['blog_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// Excerpt Section Blog Post
function ananke_blog_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//pagination
function ananke_pagination($prev = '<i class="fa fa-chevron-left"></i>', $next = '<i class="fa fa-chevron-right"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => __($prev,'ananke'),
        'next_text' => __($next,'ananke'),		'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
);
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '<ul>', $return );
}

//Get thumbnail url
function ananke_thumbnail_url($size){
    global $post;
    //$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),$size );
    if($size==''){
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
         return $url;
    }else{
        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
         return $url[0];
    }
}

function ananke_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="search_form" action="' . home_url( '/' ) . '" >  
    	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'. __( 'Search the site...', 'ananke' ) .'" />
    	<input type="submit" class="search_btn" id="searchsubmit" value="'. __( 'Search', 'ananke' ) .'" />    
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'ananke_search_form' );

//Custom comment List:
function ananke_theme_comment($comment, $args, $depth) {    
   $GLOBALS['comment'] = $comment; ?>
   <div class="post-down">
		<div class="rpl-but"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div> 
		<?php echo get_avatar($comment,$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>
		<h6><?php printf( '%s', get_comment_author_link()) ?> <span>on <?php $d = "F j, Y \A\T h a"; printf(get_comment_date($d)) ?></span></h6>
		<?php if ($comment->comment_approved == '0'){ ?>
			 <p><em><?php _e('Your comment is awaiting moderation.','ananke') ?></em></p>
		<?php }else{ ?>
        <?php comment_text() ?>
		<?php } ?>
	<div class="clearfix"></div>	
	</div> 
<?php
}

//Code Visual Compurso.
require_once dirname( __FILE__ ) . '/vc_shortcode.php';
//if(class_exists('WPBakeryVisualComposerSetup')){
function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', '', $class_string);
    }
    if($tag=='vc_column' || $tag=='vc_column_inner') {
		$class_string = preg_replace('/vc_col-sm-12/', 'sixteen columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-6/', 'eight columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-4/', 'one-third column', $class_string);
		$class_string = preg_replace('/vc_col-sm-3/', 'four columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-5/', 'seven columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-7/', 'nine columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-8/', 'two-thirds column', $class_string);
		$class_string = preg_replace('/vc_col-sm-9/', 'twelve columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-10/', 'thirteen column', $class_string);
		$class_string = preg_replace('/vc_col-sm-11/', 'fifteen columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-1/', 'one columns', $class_string);
		$class_string = preg_replace('/vc_col-sm-2/', 'three columns', $class_string);
    }
    return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2); 
// Add new Param in Row
if(function_exists('vc_add_param')){
vc_add_param('vc_row',array(
                              "type" => "textfield",
                              "heading" => __('Extra id name', 'wpb'),
                              "param_name" => "extra_id",
                              "value" => "",
                              "description" => __("If you wish to style particular content element differently, then use this field to add a id name and then refer to it in your css file.", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "textfield",
                              "heading" => __('Section Title', 'wpb'),
                              "param_name" => "ses_title",
                              "value" => "",
                              "description" => __("Title of Section, Leave a blank do not show frontend.", "wpb"),   
    ));	
vc_add_param('vc_row',array(
                              "type" => "textarea",
                              "heading" => __('Section Sub Title', 'wpb'),
                              "param_name" => "ses_sub_title",
                              "value" => "",
                              "description" => __("Section Sub Title, Leave a blank do not show frontend.", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => __('Overlay Pattern', 'wpb'),
                              "param_name" => "wrap_class",
                              "value" => array(   
                                                __('No', 'wpb') => 'no',  
                                                __('Yes', 'wpb') => 'yes',                                                                                
                                              ),
                              "description" => __("Container Class", "wpb"),   
    ));
vc_add_param('vc_row',array(
                              "type" => "dropdown",
                              "heading" => __('Fullwidth', 'wpb'),
                              "param_name" => "fullwidth",
                              "value" => array(   
                                                __('No', 'wpb') => 'no',  
                                                __('Yes', 'wpb') => 'yes',                                                                                
                                              ),
                              "description" => __("Select Fullwidth or not, Default: No fullwidth", "wpb"),      
                            ) 
    );
	
// Add new Param in Column	
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Column Title', 'wpb'),
                              "param_name" => "title",
                              "value" => "",
                              "description" => __("Title of column", "wpb"),      
                            ) 
    );
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Container Class', 'wpb'),
                              "param_name" => "wap_class",
                              "value" => "",
                              "description" => __("Container Class", "wpb"),      
                            ) 
    );
vc_add_param('vc_column',array(
                              "type" => "textfield",
                              "heading" => __('Container id', 'wpb'),
                              "param_name" => "wap_id",
                              "value" => "",
                              "description" => __("Container ID, Only use for content slider.", "wpb"),      
                            ) 
    );	
vc_add_param('vc_column',array(
                              "type" => "dropdown",
                              "heading" => __('Column Effect', 'wpb'),
                              "param_name" => "column_effect",
                              "value" => array(    
                                                __('Bottom Move', 'wpb') => 'bottommove',     
												__('Top Move', 'wpb') => 'topmove', 
												__('None', 'wpb') => 'none', 	
                                              ),
                              "description" => __("Select Effect for column, Default: Move Bottom", "wpb"),      
                            ) 
    );		
}
//}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.0-alpha
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'ananke_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function ananke_theme_register_required_plugins() {

	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from a private repo in your theme.
		array(            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).            
			'source'             => get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source.            
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
            
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are wrapped in a sprintf(), so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'ananke' ),
			'menu_title'                      => __( 'Install Plugins', 'ananke' ),
			'installing'                      => __( 'Installing Plugin: %s', 'ananke' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'ananke' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'ananke'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'ananke'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %s plugin.',
				'Sorry, but you do not have the correct permissions to install the %s plugins.',
				'ananke'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'ananke'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'ananke'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %s plugins.',
				'ananke'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'ananke'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %s plugin.',
				'Sorry, but you do not have the correct permissions to update the %s plugins.',
				'ananke'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'ananke'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'ananke'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'ananke' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'ananke' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'ananke' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}

?>