<?php
/*
Plugin Name: WP Sequence Slider
Plugin URI: http://crayonux.com/projects/wp-sequence-slider/
Description: WordPress Sequence Slider Plugin is a  beautifully designed and an elegant plugin. It's simple, very easy to use, modern and responsive slider plugin.
Author: basantakumar
Version: 0.1
Author URI: http://crayonux.com/
Text Domain: sequence
*/


define( 'SEQUENCE_PLUGIN_DIR',        	plugin_dir_path( __FILE__ ) );

define( 'SEQUENCE_PLUGIN_URL',       	WP_PLUGIN_URL . '/wp-sequence-slider/' );
define( 'SEQUENCE_SCRIPTS_URL',   		SEQUENCE_PLUGIN_URL . 'js' );
define( 'SEQUENCE_STYLES_URL',        	SEQUENCE_PLUGIN_URL . 'css' );



/*
*
*
* Loads the required javascript files (only when not in admin area)
*/
function load_sequence_scripts() {
    if ( is_admin() ) return;

    wp_enqueue_script(
        'jquery-sequence',
        SEQUENCE_SCRIPTS_URL . '/jquery.sequence-min.js',
        array( 'jquery' )
    );

    wp_enqueue_script(
        'jquery-sequence-script',
        SEQUENCE_SCRIPTS_URL . '/sequencejs-options.modern-slide-in.js',
        array( 'jquery' )
    );
}

//* Enqueue sequence js file for site
add_action( 'wp_enqueue_scripts', 'load_sequence_scripts' );


/*
*
*
* Loads the required css (only when not in admin area)
*/
function load_sequence_styles() {
    if ( is_admin() ) return;

    wp_enqueue_style(
		'jquery-sequence',
		SEQUENCE_STYLES_URL . '/sequencejs-theme.modern-slide-in.css' );
}

//* Enqueue sequence js file for site
add_action( 'wp_enqueue_scripts', 'load_sequence_styles' );

// include WXR file parsers
require dirname( __FILE__ ) . '/functions.php';