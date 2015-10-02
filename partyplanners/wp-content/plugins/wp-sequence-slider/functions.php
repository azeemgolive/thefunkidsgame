<?php
/*
Author: basanatakumar
Version: 0.1
Author URI: http://crayonux.com/
*/

define( 'SEQUENCE_PLUGIN_URL',        	WP_PLUGIN_URL . '/wp-sequence-slider/' );
define( 'SEQUENCE_IMAGES_DIR',  		SEQUENCE_PLUGIN_DIR . 'images' );

/*
 *	Register New sequence_slider
 *
 */

function sequence_slider_init() {
  $labels = array(
    'name'               => 'Sequence Slider',
    'singular_name'      => 'Sequence Slider',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Slider',
    'edit_item'          => 'Edit Slider',
    'new_item'           => 'New Slider',
    'all_items'          => 'All Sliders',
    'view_item'          => 'View Slider',
    'search_items'       => 'Search Sliders',
    'not_found'          => 'No Sliders found',
    'not_found_in_trash' => 'No Sliders found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Sequence Slider'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'sequence-slider' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
	// 'sequence_slider_meta_box' => 'add_sequence_slider_metaboxes',
    'supports'           => array( 'title', 'thumbnail', 'excerpt' )
  );

  register_post_type( 'sequence-slider', $args );
  
}
add_action( 'init', 'sequence_slider_init' );

// added post meta to slider custom post type
add_action( 'add_meta_boxes', 'add_slider_metaboxes' );
function add_slider_metaboxes() {
	add_meta_box('sqn_slider_link', 'Slider link and text', 'sqn_slider_link', 'sequence-slider', 'normal');
}

// The slider  Metabox
function sqn_slider_link($post) {
    // Get the location data if its already been entered
    $slidermeta = get_post_meta($post->ID, '_link', true);
	$slidermeta2 = get_post_meta($post->ID, '_text', true);
    // Echo out the field
    echo '<input type="text" name="_link" value="' . $slidermeta . '"  /><br/><br/>';
	echo '<input type="text" name="_text" value="' . $slidermeta2 . '"/> <br/><br/>';
}


add_action( 'save_post', 'sqn_meta_box_save' );
function sqn_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['_link'] ) )
		update_post_meta( $post_id, '_link', wp_kses( esc_url( $_POST['_link'] ), $allowed ) );
	if( isset( $_POST['_text'] ) )
		update_post_meta( $post_id, '_text', wp_kses( $_POST['_text'], $allowed ) );
}


//end post meta

function sequence_slider_display( $atts ) {

    extract( shortcode_atts( array(
	    'limit' => 10
    ), $atts ) );
	
	$args = array(
		'post_type'=> 'sequence-slider',
		'posts_per_page'    => $limit
	);
	
	// The Query
	$the_query = new WP_Query( $args );
	
	$html = null;

	// The Loop
	if ( $the_query->have_posts() ) {
			$html .= '<div class="sequence-theme">';
			$html .= '<div class="sequence">';
			$html .= '<img class="sequence-prev" src="'. SEQUENCE_PLUGIN_URL .'images/bt-prev.png" alt="Previous Frame" />';
			$html .= '<img class="sequence-next" src="'. SEQUENCE_PLUGIN_URL .'images/bt-next.png" alt="Next Frame" />';
			$html .= '<ul class="sequence-canvas">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				//echo "<pre>";
				//print_r($the_query);
				$html .= '<li class="animate-in">';
				$html .= '<h3 class="title">' . get_the_title() .'</h3>';
				$html .= '<h4 class="subtitle">' . get_the_excerpt() .'';
				$html .= '<a class="slider_link" href="' .get_post_meta( $the_query->post->ID, '_link', true ).'">' . get_post_meta( $the_query->post->ID, '_text', true ) .'</a></h4>';
				$html .= get_the_post_thumbnail($the_query->post->ID, 'full' ,array('class' => 'model')); 
				$html .= '</li>';
			}
			$html .= '</ul>';
			//$html .= '<ul class="sequence-pagination"></ul>';
			$html .= '</div></div>';
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	
    return $html;
}
add_shortcode( 'sequence_slider', 'sequence_slider_display' );

