<?php
/**
 * Main class for the Simple Paginated Posts plugin
 * 
 * @todo option for overriding wp_link_pages or set to ''
 * 
 */

class TLA_Simple_Paginated_Posts {

	protected $option_name = TLA_SPP_OPTION_NAME;
	protected $page_titles = array();
	
	
	/**
	 * Class constructor
	 */
	function __construct() {
		add_action( 'init', array( $this, 'load_translation' ) );
		add_action( 'wp', array( $this, 'get_page_titles' ), 10 );
		add_filter( 'the_title', array( $this, 'the_title' ), 10, 2 );
		add_filter( 'the_content', array( $this, 'add_to_content'), 10 );
		add_action( 'spp_continued', array( $this, 'print_continued'), 10, 1 );
		add_action( 'spp_toc', array( $this, 'the_toc'), 10, 1 );
		add_action( 'spp_link_pages', array( $this, 'page_links'), 10, 1 );
	}

	
	/**
	 * I18n is not a feature. It's best practice!
	 *
	 * Note: If a translation file is loaded from 'WP_LANG_DIR/simple-paginated-post' it overrides the default translation file
	 **/
	function load_translation() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'simple-paginated-posts' );
		load_textdomain( 'simple-paginated-posts', WP_LANG_DIR.'/simple-paginated-posts/simple-paginated-posts-'.$locale.'.mo' );
		load_plugin_textdomain( 'simple-paginated-posts', false, plugin_basename( TLA_SPP_DIR.'/languages/' ) );
	}
	
	
	/**
	 * The page links.
	 *
	 * Displays page links for paginated posts (i.e. includes the <!--nextpage-->.
	 * Quicktag one or more times). This tag must be within The Loop.
	 *
	 * @param string|array $args Optional. Overwrite the defaults.
	 * @return string Formatted output in HTML.
	 */
	function page_links( $args = '' ) {
		$defaults = array(
				'before' => '<p>' . __('Pages:') . ' ', 'after' => '</p>',
				'link_before' => '', 'link_after' => '',
				'next_or_number' => 'number', 'nextpagelink' => __('Next page'),
				'previouspagelink' => __('Previous page'), 'pagelink' => '%',
				'echo' => 1
		);
	
		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );
		
		global $page, $numpages, $multipage, $more;
	
		$output = '';
		if ( $multipage ) {
			if ( 'number' == $next_or_number || 'both' == $next_or_number ) {
				$output .= $before;
				if ( 'both' == $next_or_number ) {
					$i = $page - 1;
					if ( $i && $more ) {
						$output .= _wp_link_page($i);
						$output .= $link_before. $previouspagelink . $link_after . '</a>';
					}
				}
				for ( $i = 1; $i < ($numpages+1); $i = $i + 1 ) {
					$j = str_replace('%',$i,$pagelink);
					$output .= ' ';
					if ( ($i != $page) || ((!$more) && ($page==1)) ) {
						$output .= _wp_link_page($i);
					}
					$output .= $link_before . $j . $link_after;
					if ( ($i != $page) || ((!$more) && ($page==1)) )
						$output .= '</a>';
				}
				if ( 'both' == $next_or_number ) {
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$output .= ' ';
						$output .= _wp_link_page($i);
						$output .= $link_before. $nextpagelink . $link_after . '</a>';
					}
				}
				$output .= $after;
			} else {
				if ( $more ) {
					$output .= $before;
					$i = $page - 1;
					if ( $i && $more ) {
						$output .= _wp_link_page($i);
						$output .= $link_before. $previouspagelink . $link_after . '</a>';
					}
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$output .= _wp_link_page($i);
						$output .= $link_before. $nextpagelink . $link_after . '</a>';
					}
					$output .= $after;
				}
			}
		}
	
		if ( $echo )
			echo $output;
	
		return $output;
	}

	
	/**
	 * Prints message to notify the user that the post is continued on next page
	 *
 	 * @param string|array $args Optional. Overwrite the defaults.
 	 * @return string Formatted output in HTML.
	 */
	function print_continued( $args = '' ) {
		$defaults = array(
				'before' => '<p>', 'after' => '</p>',
				'next_or_previous' => 'previous', 'echo' => 1
		);
		
		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );
		
		global $page, $numpages, $multipage;
		
		$output = '';
		if ( $multipage ) {

			if ( $next_or_previous == 'previous' && 1 < $page ) {
				$output .= $before;
				$output .= __( 'Continued from: ', 'simple-paginated-posts' );
				$output .= _wp_link_page($page-1) . $this->page_titles[$page-2] . '</a>';
				$output .= $after;
			}
			if ( $next_or_previous == 'next' && $page < ($numpages) ) {
				$output .= $before;
				$output .= _wp_link_page($page+1) . __( 'Continued ...', 'simple-paginated-posts' ) . '</a>';
				$output .= $after;
			}
				
		}
		
		if ( $echo )
			echo $output;
		
		return $output;
		
	}

	
	/**
	 * Add SPP functions to the content
	 *
	 * @param $content
	 * @return string Formatted output in HTML.
	 */
	function add_to_content( $content = '' ) {

		global $page, $multipage, $more;

		$options = get_option( $this->option_name );
		$implementation = isset($options['implementation_method']) ? $options['implementation_method'] : '';
		
		
		
		$new_content = '';
		
		if ( $multipage && !((!$more) && ($page==1)) && $implementation != 'manual' ) {
			
			if ( file_exists( STYLESHEETPATH.'/spp-template.php' ) ) {
				include( STYLESHEETPATH.'/spp-template.php' );
			} else {
				include TLA_SPP_DIR.'/includes/spp-template.php';
			}
			
		} else {
			$new_content = $content;
		}
		
		return $new_content;
	}
	
	
	/**
	 * The Table Of Contents
	 *
	 * Displays the TOC for paginated posts
	 *
	 * @param string|array $args Optional. Overwrite the defaults.
	 * @return string Formatted output in HTML.
	 */
	function the_toc( $args = '' ) {
		$defaults = array(
				'before' => '<p>' . __('Table of contents:'), 'after' => '</p>',
				'echo' => 1
		);

		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );

		global $page, $multipage, $more;
		
		$output = '';

		if ( $multipage ) {

			$output .= $before;
			$output .= '<ul>';

			foreach($this->page_titles as $p=>$page_title){
				if ( ($page!=($p+1)) || ((!$more) && ($page==1)) ) {
					$class='';
				}
				else {
					$class=' class="current_page"';
				}
				$output .= '<li'. $class .'>'. _wp_link_page($p+1) . $page_title .'</a></li>';
			}
			
			$output .= '</ul>';
			$output .= $after;

		}
		
		if ( $echo )
			echo $output;
		
		return $output;
		
	}
	

	/**
	 * Helper function for The Table Of Contents
	 *
	 * Gets the page titles for paginated posts
	 *
	 * @return array Page titles.
	 */
	function get_page_titles() {
		global $post, $numpages;

		$numpages = 1;

		$page = get_query_var('page');
		if ( !$page )
			$page = 1;
					
		$content = $post->post_content;
		if ( strpos( $content, '<!--nextpage-->' ) ) {
			if ( $page > 1 )
				$more = 1;
			$multipage = 1;
			$content = str_replace("\n<!--nextpage-->\n", '<!--nextpage-->', $content);
			$content = str_replace("\n<!--nextpage-->", '<!--nextpage-->', $content);
			$content = str_replace("<!--nextpage-->\n", '<!--nextpage-->', $content);
			$pages = explode('<!--nextpage-->', $content);
			$numpages = count($pages);
		} else {
			$multipage = 0;
		}
		
		if ( $multipage ) {
			$this->page_titles[0] = $post->post_title;
				
			$shortcode_pattern = get_shortcode_regex();
			
			for ( $i = 1; $i < ($numpages); $i = $i + 1 ) {
				preg_replace_callback( "/$shortcode_pattern/s", array( $this, 'get_shortcode_atts' ), $pages[$i] );
			}
		}
	}
	
	
	/**
	 * Helper function for get_page_titles
	 *
	 * Gets the shortcode title attribute using the WP API
	 * 
	 * @param array $m Regular expression match array
	 * @return mixed False on failure.
	 */
	function get_shortcode_atts( $m ) {
		
		$atts = shortcode_parse_atts( $m[3] );
		
		if ( $m[2] == 'spp' ) { // [2] tag
			global $post;
			if ( isset($atts['title']) ) {
				$this->page_titles[] = trim($atts['title']);
			} else {
				$this->page_titles[] = 'empty';
			}
		}
	}

	
	/**
	 * The SPP shortcode function
	 * 
	 * The shortcode doesn't do much but is needed to register the shortcode.
	 */
	function shortcode() {
	}

	
	/**
	 * The Title
	 *
	 * Gets the page titles for paginated posts
	 *
	 * @param string $title The original title.
	 * @param int $id The post ID.
	 * @return string The new title.
	 */
	function the_title( $title, $id ) {

		global $page, $multipage, $more;
		
		// @todo check for current page
		if ( $multipage && in_the_loop() && !((!$more) && ($page==1)) && ($page-1)>0 ) {
			$title = $this->page_titles[($page-1)];
		}

		return $title;
	
	}
	
}
