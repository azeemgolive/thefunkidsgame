<?php
/*
Plugin Name: artless Maps
Plugin URI: http://artlessthemes.com
Description: Easy to create and costumize your Google Map. You can style your map via Theme Options > Google Maps Api.
Version: 1.0.4
Author: artless
Author URI: http://artlessthemes.com
*/

/**
 * Artless Team Globals
 */
define( 'AL_MAPS_DIR',  plugin_dir_path( __FILE__ ) );
define( 'AL_MAPS_PUBLIC', plugin_dir_url( __FILE__ ) . 'public' );

/**
 * Setup
 */
add_action( 'init', 'al_maps_setup', 3 );

function al_maps_setup() {

    /**
	 * Required Files
	 */
	$required_files = array(
		AL_MAPS_DIR . '/application/options/google-maps-api.php'
	);

	// for each file in $require_files
	foreach ( $required_files as $file ) {
		// if file exists
		if ( is_file( $file ) ) {
			require( $file );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'al_maps_front_scripts', 3 );

function al_maps_front_scripts() {
	wp_register_script( 'al-google-maps-api-frontend', AL_MAPS_PUBLIC . '/js/production/google-maps-api.frontend.js',
		array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'al-google-maps-api-frontend' );
}
/**
 * Admin Maps Scripts
 */
if ( is_admin() ) {
	// have to hook in redux/construct
	add_action( 'redux/construct', 'al_maps_backend_scripts' );

	function al_maps_backend_scripts() {

		wp_register_script( 'al-google-maps-preview', 'https://maps.googleapis.com/maps/api/js?sensor=false',
			array(),  '1.0', true );

		wp_register_script( 'al-google-maps-api-admin', AL_MAPS_PUBLIC . '/js/production/google-maps-api.admin.js',
			array( 'jquery', 'al-google-maps-preview' ), '1.0', true );

		wp_enqueue_script( 'al-google-maps-api-admin' );
	}
}