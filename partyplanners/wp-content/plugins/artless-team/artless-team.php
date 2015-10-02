<?php
/*
Plugin Name: artless Team
Plugin URI: http://artlessthemes.com
Description: Organize your team, create professions, upload photos and set socials for each team member.
Version: 1.0.6
Author: artless
Author URI: http://artlessthemes.com
*/

/**
 * Artless Team Globals
 */
define( 'AL_TEAM_DIR', plugin_dir_path( __FILE__ ) );
define( 'AL_TEAM_PUBLIC', plugin_dir_url( __FILE__ ) . 'public' );

/**
 * Setup
 */
add_action( 'init', 'al_team_setup', 1 );

function al_team_setup() {

	/**
	 * Required Files
	 */
	$required_files = array(
		AL_TEAM_DIR . '/application/post-type/team.php',
		AL_TEAM_DIR . '/application/options/team.php'
	);

	// for each file in $require_files
	foreach ( $required_files as $file ) {
		// if file exists
		if ( is_file( $file ) ) {
			require( $file );
		}
	}

	/**
	 * Thumbnail-Size
	 */
	if( current_theme_supports( 'post-thumbnails' ) ) {
		add_image_size( 'al-team-member', 1000, 600 );
	}
}

/**
 * Team Scripts
 */
add_action( 'wp_enqueue_scripts', 'al_team_front_scripts' );
function al_team_front_scripts() {

	wp_register_script( 'al-team', AL_TEAM_PUBLIC . '/js/production/team.js',
		array( 'jquery.mixitup' ), '1.0', true ) ;

	wp_enqueue_script( 'al-team' );
}

/**
 * Team Styles
 */
add_action( 'wp_enqueue_scripts', 'al_team_front_styles', 99 );
function al_team_front_styles() {
	wp_register_style( 'al-team', AL_TEAM_PUBLIC. '/css/production/team.css', array( ), '1', 'all' );

	wp_enqueue_style( 'al-team' );
}