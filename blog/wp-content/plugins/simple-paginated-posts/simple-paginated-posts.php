<?php
/*
Plugin Name: Simple Paginated Posts
Description: Generate table of contents for paginated posts
Version: 0.1.6
Author: TLA Media
Author URI: http://www.tlamedia.dk/
Plugin URI: http://wpplugins.tlamedia.dk/simple-paginated-posts/
License: GPLv2 or later
*/

/*
Simple Paginated Posts
Copyright (C) 2012, TLA Media ApS - www.tlamedia.dk

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/* Bail out if the file has been loaded directly. */
if ( ! defined('ABSPATH') ) {
        die();
}

/**
 * Advanced configuration
 * 
 * Add define('TLA_SPP_SKIP_TEST', true); to wp-config.php to skip the requirements test.
 * If you know what you are doing this will avoid running unnecessary code.
 */
if ( defined( 'TLA_SPP_SKIP_TEST' ) && TLA_SPP_SKIP_TEST )
	$skip_requirements_test = true;
else
	$skip_requirements_test = false;


/**
 * The following code tests whether or not this plugin can be safely loaded.
 * If there are no conflicts, the plugin is loaded.
 */
if ( !defined( 'TLA_SPP_VERSION' ) && !class_exists( 'TLA_SPP_test_requirements' ) ) {

	if ( $skip_requirements_test == true ) {

		$load_plugin = true;
		
	} else {

		include_once 'includes/class-tla-test-requirements.php';
		$test_requirements = new TLA_SPP_test_requirements();
	
		$test_requirements->wp_version( '3.4' );
		$test_requirements->class_names_used( array( 'TLA_Simple_Paginated_Posts' ) );
		$test_requirements->function_names_used( array( 'spp_link_pages' ) );
		$test_requirements->constant_names_used( array( 'TLA_SPP_DIR', 'TLA_SPP_OPTION_NAME', 'TLA_SPP_URL' ) );
	
		// Load the plugin if there are no errors
		if ( $test_requirements->ok() ) {
			$load_plugin = true;
		} else {
			add_action( 'admin_notices', array( $test_requirements, 'print_notices' ) );
		}

	}
	
	// Load the plugin
	if ( $load_plugin == true ) {

		define( 'TLA_SPP_VERSION', '0.1.6' );
		define( 'TLA_SPP_DIR', dirname(__FILE__) );
		define( 'TLA_SPP_OPTION_NAME', 'tla_spp_options' );
		define( 'TLA_SPP_URL', plugin_dir_url(__FILE__) );
		
		require_once 'includes/class-simple-paginated-posts.php';
		$Simple_Paginated_Posts = new TLA_Simple_Paginated_Posts;
		
		function spp_continued( $args ) {
			do_action('spp_continued', $args);
		}
			
		function spp_toc( $args ) {
			do_action('spp_toc', $args);
		}
			
		function spp_link_pages( $args ) {
			do_action('spp_link_pages', $args);
		}
			
		add_shortcode( 'spp', array( $Simple_Paginated_Posts, 'shortcode' ) );
			
		if ( is_admin() ) {
			require_once 'includes/class-spp-admin.php';
			$SPP_Admin = new TLA_SPP_Admin;
		}
		
	}

}
