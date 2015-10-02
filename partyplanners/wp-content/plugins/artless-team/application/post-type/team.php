<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_action( 'init', 'al_team' );
add_action( 'init', 'al_team_taxonomy' );

add_filter( 'rwmb_meta_boxes', 'al_team_meta_boxes' );

/**
 * Post Type Team
 */
function al_team() {

	// Labels
	$labels = array(
		'name'               => __( 'Team', 'artless' ),
		'singular_name'      => __( 'Team Member', 'artless' ),
		'menu_name'          => __( 'Team', 'artless' ),
		'all_items'          => __( 'Overview', 'artless' ),
		'add_new'            => __( 'Add Member', 'artless' ),
		'add_new_item'       => __( 'Add Member', 'artless' ),
		'edit_item'          => __( 'Edit Member', 'artless' ),
		'new_item'           => __( 'New Member', 'artless' ),
		'view_item'          => __( 'View Member', 'artless' ),
		'search_items'       => __( 'Search Members', 'artless' ),
		'not_found'          => __( 'Nothing found', 'artless' ),
		'not_found_in_trash' => __( 'Nothing found in trash', 'artless' ),
	);

	// Supports
	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'page-attributes'
	);

	// Args
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_ui'           => true,
		'capability_type'   => 'post',
		'hierarchical'      => false,
		'rewrite'           => array( 'slug' => 'team-member' ),
		'query_var'         => true,
		'supports'          => $supports,
		'show_in_nav_menus' => false
	);

	// register 'team'
	register_post_type( 'team', $args );
}


/**
 * Categories for Team
 */
function al_team_taxonomy() {

	// Labels
	$labels = array(
		'name'              => __( 'Professions', 'artless' ),
		'singular_name'     => __( 'Profession', 'artless' ),
		'search_items'      => __( 'Search Professions', 'artless' ),
		'all_items'         => __( 'All Professions', 'artless' ),
		'parent_item'       => __( 'Parent Profession', 'artless' ),
		'parent_item_colon' => __( 'Parent Profession:', 'artless' ),
		'edit_item'         => __( 'Edit Profession', 'artless' ),
		'update_item'       => __( 'Update Profession', 'artless' ),
		'add_new_item'      => __( 'Add New Profession', 'artless' ),
		'new_item_name'     => __( 'New Profession Name', 'artless' ),
		'menu_name'         => __( 'Professions', 'artless' ),
	);


	register_taxonomy( 'team_professions', 'team', array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'query_var'         => true,
			'rewrite'           => true,
			'sort'				=> true,
			'show_in_nav_menus' => false,
		)
	);
}


/**
 * Meta Boxes for Team
 *
 * @param $meta_boxes
 */
function al_team_meta_boxes( $meta_boxes ) {

	$socials = al_team_socials();
	ksort($socials);

	$social_fields = array();

	foreach ( $socials as $key => $values ) {
		$social_fields[] = array(
			'id'   => 'al_team_socials_' . $key,
			'type' => 'text',
			'name' => $values['name'] . ' URL'
		);
	}

	$meta_boxes[] = array(
		'id'      => 'al_team',
		'title'   => 'Social-Links',
		'pages'   => array( 'team' ),
		'context' => 'normal',

		'fields'  => $social_fields
	);

	return $meta_boxes;
}

/**
 * Team Socials
 */
function al_team_socials() {
	return array(
		'facebook'   => array(
			'name'    => 'Facebook',
			'fa-icon' => 'fa-facebook',
			'link'    => ''
		),
		// key should be 'twitter' but don't won't to mess up previous buyers
		'googleplus' => array(
			'name'    => 'Twitter',
			'fa-icon' => 'fa-twitter',
			'link'    => ''
		),

		'googlep' => array(
			'name'    => 'Google+',
			'fa-icon' => 'fa-google-plus',
		),

		'behance' => array(
			'name'    => 'Behance',
			'fa-icon' => 'fa-behance',
		),

		'youtube' => array(
			'name'    => 'Youtube',
			'fa-icon' => 'fa-youtube',
			'link'    => ''
		),

		'linkedin'   => array(
			'name'    => 'Linkedin',
			'fa-icon' => 'fa-linkedin',
			'link'    => ''
		),

		'instagram'   => array(
			'name'    => 'Instagram',
			'fa-icon' => 'fa-instagram',
			'link'    => ''
		),

		'vimeo'   => array(
			'name'    => 'Vimeo',
			'fa-icon' => 'fa-vimeo-square',
			'link'    => ''
		),

		'skype'   => array(
			'name'    => 'Skype',
			'fa-icon' => 'fa-skype',
			'link'    => ''
		),

		'tumblr'     => array(
			'name'    => 'Tumblr',
			'fa-icon' => 'fa-tumblr',
			'link'    => ''
		),

		'flickr'     => array(
			'name'    => 'Flickr',
			'fa-icon' => 'fa-flickr',
			'link'    => ''
		),

		'foursquare'     => array(
			'name'    => 'Foursquare',
			'fa-icon' => 'fa-foursquare',
			'link'    => ''
		),

		'github'     => array(
			'name'    => 'Github',
			'fa-icon' => 'fa-github',
			'link'    => ''
		),

		'bitbucket'     => array(
			'name'    => 'Bitbucket',
			'fa-icon' => 'fa-bitbucket',
			'link'    => ''
		),

		'maxcdn'	=> array(
			'name'	=> 'Maxcdn',
			'fa-icon'	=> 'fa-maxcdn',
			'link'	=> '',
		),

		'renren'	=> array(
			'name'	=> 'Renren',
			'fa-icon'	=> 'fa-renren',
			'link'	=> '',
		),

		'xing'     => array(
			'name'    => 'Xing',
			'fa-icon' => 'fa-xing',
			'link'    => ''
		),

		'website'     => array(
			'name'    => 'Website',
			'fa-icon' => 'fa-link',
			'link'    => ''
		),

		'pinterest'     => array(
			'name'    => 'Pinterest',
			'fa-icon' => 'fa-pinterest',
			'link'    => ''
		),
	);
}

