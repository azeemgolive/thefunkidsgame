<?php
/*
Plugin Name: artless Icons
Plugin URI: http://artlessthemes.com
Description: Adds an Icon Picker to Wordpress editor. Easy to select over 350 Font Awesome Icons.
Version: 1.0.1
Author: artless
Author URI: http://artlessthemes.com
*/

/**
 * Artless Icons Globals
 */
define( 'AL_ICONS_DIR',  untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'AL_ICONS_PUBLIC', plugin_dir_url( __FILE__ ) . 'public' );

/**
 * Setup
 */
add_action( 'init', 'al_icons_setup', 1 );

function al_icons_setup() {

	// load Shortcodes
	$shortcode_file = AL_ICONS_DIR . '/application/shortcode.php';
    if ( is_file( $shortcode_file ) ) {
        require( $shortcode_file );
    }

    // load normalize atts
    $normalize_atts_file = AL_ICONS_DIR . '/application/functions/normalize_atts.php';
    if ( is_file( $normalize_atts_file ) ) {
        require( $normalize_atts_file );
    }
}

/**
 * Scripts
 */
add_action( 'wp_enqueue_scripts', 'al_icons_front_scripts' );

function al_icons_front_scripts() {
    wp_register_script( 'al-icons', AL_ICONS_PUBLIC . '/js/production/artless-icons.js',
        array( 'jquery' ), '1.0', true ) ;
    wp_enqueue_script( 'al-icons' );
}

/**
 * Styles
 */
add_action( 'wp_enqueue_scripts', 'al_icons_front_styles', 99 );

function al_icons_front_styles() {
    // Font Awesome
    wp_register_style( 'font-awesome', AL_ICONS_PUBLIC. '/css/production/font-awesome.min.css', array( ), '1', 'all' );

    // Icons
    wp_register_style( 'al-icons', AL_ICONS_PUBLIC. '/css/production/artless-icons.css', array( 'font-awesome' ), '1', 'all' );
    wp_enqueue_style( 'al-icons' );
}

/**
 * TinyMCE
 */
add_action( 'init', 'al_icons_tinymce' );
function al_icons_tinymce() {

    // Abort if user will never see TinyMCE
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) && get_user_option( 'rich_editing' ) == 'true' )
        return;

    //Add a callback to regiser our tinymce plugin
    add_filter( 'mce_external_plugins', 'al_icons_register_tinymce_plugin' );

    // Add a callback to add our button to the TinyMCE toolbar
    add_filter( 'mce_buttons', 'al_icons_add_tinymce_button' );
}

//This callback registers our plug-in
function al_icons_register_tinymce_plugin( $plugin_array ) {
    $plugin_array['al_icons_button'] = AL_ICONS_PUBLIC . '/js/production/tinymce-plugin.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function al_icons_add_tinymce_button( $buttons ) {
    //Add the button ID to the $button array
    $buttons[] = "al_icons_button";
    return $buttons;
}



