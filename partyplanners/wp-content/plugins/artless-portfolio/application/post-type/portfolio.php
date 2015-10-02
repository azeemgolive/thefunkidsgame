<?php
/**
 * @package    artless Portfolio
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_action( 'init', 'al_portfolio' );
add_action( 'init', 'al_portfolio_taxonomy' );

add_filter( 'rwmb_meta_boxes', 'al_portfolio_meta_boxes' );

/**
 * Portfolio Type Team
 */
function al_portfolio() {

	// Labels
	$labels = array(
		'name'               => __( 'Portfolio', 'artless' ),
		'singular_name'      => __( 'Portfolio-Item', 'artless' ),
		'menu_name'          => __( 'Portfolio', 'artless' ),
		'all_items'          => __( 'Overview', 'artless' ),
		'add_new'            => __( 'Add New', 'artless' ),
		'add_new_item'       => __( 'Add New Item', 'artless' ),
		'edit_item'          => __( 'Edit Item', 'artless' ),
		'new_item'           => __( 'New Item', 'artless' ),
		'view_item'          => __( 'View Item', 'artless' ),
		'search_items'       => __( 'Search Items', 'artless' ),
		'not_found'          => __( 'No item found', 'artless' ),
		'not_found_in_trash' => __( 'No item found in trash', 'artless' ),
	);

	// Supports
	$supports = array(
		'title',
		'editor',
		// 'comments',
		'thumbnail',
		'page-attributes'
	);

	// Args
	$args = array(
		'labels'          	=> $labels,
		'public'          	=> true,
		'show_ui'         	=> true,
		'capability_type' 	=> 'post',
		'hierarchical'    	=> false,
		'supports'        	=> $supports,
		'show_in_nav_menus' => false
	);

	// register 'portfolio'
	register_post_type( 'portfolio', $args );

    add_post_type_support( 'portfolio', 'post-formats', array( 'gallery', 'audio', 'video' ) );
}


/**
 * Categories for Portfolio
 */
function al_portfolio_taxonomy() {
	register_taxonomy( 'portfolio_categories', 'portfolio', array(
			'hierarchical' 		=> true,
			'rewrite'      		=> true,
			'sort'				=> true,
			'show_in_nav_menus' => false,
		)
	);
}

/**
 * Meta Boxes for Portfolio
 *
 * @param $meta_boxes
 */
function al_portfolio_meta_boxes( $meta_boxes ) {

	$fields = array(
		array(
			'id'   => 'al_pf_show_title',
			'type' => 'checkbox',
			'name' => __( 'Show Title', 'artless' ),
			'std'  => 1,
		),
		array(
			'id'   => 'al_pf_title',
			'type' => 'text',
			'name' => __( 'Title', 'artless' ),
			'desc' => __( 'overwrites default Title', 'artless' ),
		),
		array(
			'id'   => 'al_pf_client',
			'type' => 'text',
			'name' => __( 'Client', 'artless' ),
		),
		array(
			'id'   => 'al_pf_link',
			'type' => 'text',
			'name' => 'URL',
			'std'  => 'http://',
		),

		array(
			'id'   => 'al_pf_link_blank',
			'type' => 'checkbox',
			'name' => 'Open URL in a new window',
			'std'  => 0,
		),
	);

	$fields = apply_filters( 'al_portfolio_fields', $fields );

	$meta_boxes[] = array(
		'id'      => 'al_portfolio',
		'title'   => __( 'Project Options', 'artless' ),
		'pages'   => array( 'portfolio' ),
		'context' => 'normal',

		'fields'  => $fields,
	);

    // Gallery
    $meta_boxes[] = array(
        'id' => 'al_pf_gallery',
        'title' => __( 'Gallery Images', 'artless' ),
        'pages' => array( 'portfolio' ),
        'context' => 'normal',
        'autosave' => true,
        'fields' => array(
            array(
                'id'   => 'al_pf_gallery_images',
				'type' => 'image_advanced',
            //    'type' => 'plupload_image',
                'name' => __( 'Gallery Images', 'artless' )
            ),
        ),
    );

    // Audio
    $meta_boxes[] = array(
        'id' => 'al_pf_audio',
        'title' => __( 'Audio', 'artless' ),
        'pages' => array( 'portfolio' ),
        'context' => 'normal',
        'autosave' => true,
        'fields' => array(
            array(
                'id'   => 'al_pf_audio_embed',
                'type' => 'textarea',
                'name' => __( 'Embed Code', 'artless' ),
            ),
        ),
    );

    // Video
    $meta_boxes[] = array(
        'id' => 'al_pf_video',
        'title' => __( 'Video', 'artless' ),
        'pages' => array( 'portfolio' ),
        'context' => 'normal',
        'autosave' => true,
        'fields' => array(
            array(
                'id'   => 'al_pf_video_embed',
                'type' => 'textarea',
                'name' => __( 'Embed Code / Youtube Link', 'artless' ),
            ),
        ),
    );

	// Meta OG
	$meta_boxes[] = array(
		'id' => 'al_pf_og',
		'title' => __( 'Meta: OpenGraph (i.e. for Facebook sharing)', 'artless' ),
		'pages' => array( 'portfolio' ),
		'context' => 'normal',
		'autosave' => true,
		'default_hidden' => true,
		'fields' => array(
			array(
				'id'   => 'al_pf_og_title',
				'type' => 'text',
				'name' => __( 'Title', 'artless' ),
				'desc' => __( 'If no title is set, the default title will be used.', 'artless' ),
			),
			array(
				'id'   => 'al_pf_og_description',
				'type' => 'textarea',
				'name' => __( 'Description', 'artless' ),
			),
		),
	);

	$meta_boxes = apply_filters( 'al_portfolio_meta_boxes', $meta_boxes );

	return $meta_boxes;
}
