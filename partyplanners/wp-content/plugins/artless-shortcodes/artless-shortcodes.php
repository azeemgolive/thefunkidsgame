<?php
/*
Plugin Name: artless Shortcodes
Plugin URI: http://artlessthemes.com
Description: Adds an icon to Wordpress editor, so you don‘t have to remember any code or attribute.
Version: 1.0.5
Author: artless
Author URI: http://artlessthemes.com
*/

/**
 * Artless Shortcode Globals
 */
define( 'AL_SC_DIR',  plugin_dir_path( __FILE__ ) );
define( 'AL_SC_PUBLIC', plugin_dir_url( __FILE__ ) . 'public' );

/**
 * Setup
 */
add_action( 'init', 'al_shortcodes_setup', 1 );

function al_shortcodes_setup() {
    /**
     * Options
     */
    $options = AL_SC_DIR . 'application/options/contact_form.php';

    if( is_file( $options )) {
        require_once( $options );
    }

    /**
     * Shortcodes
     */
    $dir = AL_SC_DIR . 'application/shortcodes';

    $files = array(
        $dir . '/center.php',
        $dir . '/columns.php',
        $dir . '/button.php',
        $dir . '/box.php',
        $dir . '/spacer.php',
        $dir . '/toggle_box.php',
        $dir . '/percent_bar.php',
        $dir . '/clients.php',
        $dir . '/clients_client.php',
        $dir . '/device_slider.php',
        $dir . '/device_slide.php',
        $dir . '/quote_slider.php',
        $dir . '/quote_slide.php',
        $dir . '/price_box.php',
        $dir . '/fact.php',
		$dir . '/highlighted.php',
		$dir . '/contact_form.php',
		$dir . '/spaceless.php',
        $dir . '/headlines.php',
        $dir . '/alert.php',
        $dir . '/callout.php',
        $dir . '/tab_content_box.php',
		$dir . '/quote.php',
		$dir . '/video.php',
		$dir . '/google_maps_api.php',
    );

    foreach ( $files as $file ) {
        if ( is_file( $file ) ) {
            require_once( $file );
        }
    }

    /**
     * Shortcode Filter
     */
    $clean_p_file = AL_SC_DIR . 'application/filter/clean_out_p.php';
	$clean_columns_file = AL_SC_DIR . 'application/filter/clean_columns.php';

    if( is_file( $clean_p_file ) ) { require_once( $clean_p_file ); }
	if( is_file( $clean_columns_file ) ) { require_once( $clean_columns_file ); }

    /**
     * Shortcode Functions
     */
    $dir = AL_SC_DIR . 'application/functions';

    $files = array(
        $dir . '/clean_out.php',
		$dir . '/clean_out_spaces.php',
        $dir . '/normalize_atts.php',
    );

    foreach ( $files as $file ) {
        if ( is_file( $file ) ) {
            require_once( $file );
        }
    }
}

/**
 * Shortcode Scripts
 */
add_action( 'wp_enqueue_scripts', 'al_shortcodes_front_scripts' );
function al_shortcodes_front_scripts() {

	wp_register_script( 'al-shortcodes', AL_SC_PUBLIC . '/js/production/shortcodes.js',
		array( 'jquery' ), '1.0', true ) ;
	wp_enqueue_script( 'al-shortcodes' );

	wp_localize_script( 'al-shortcodes', 'alContact', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

/**
 * Shortcode Styles
 */
add_action( 'wp_enqueue_scripts', 'al_shortcodes_front_styles', 99 );
function al_shortcodes_front_styles() {

	wp_register_style( 'al-shortcodes', AL_SC_PUBLIC . '/css/production/shortcodes.css', array(), '1', 'all' );

	wp_enqueue_style( 'al-shortcodes' );
}

/**
 * Shortcode Admin Styles
 */
add_action( 'admin_enqueue_scripts', 'al_shortcodes_backend_styles' );
function al_shortcodes_backend_styles() {
	wp_register_style( 'al-shortcodes-admin', AL_SC_PUBLIC . '/css/production/shortcodes.admin.css', array(), '1', 'all' );

	wp_enqueue_style( 'al-shortcodes-admin' );
}


/**
 * CONTACT FORM AJAX PART
 */
$contact_form_ajax = AL_SC_DIR . 'application/functions/contact_form.php';

if( is_file( $contact_form_ajax )) {
	require_once( $contact_form_ajax );
}

add_action( 'wp_ajax_nopriv_al_ajax_contact_form', 'al_ajax_contact_form' );

function al_asjax_contact_form() {

	$return['test']= 'test';
	return ( $return );
}

/**
 * TINYMCE
 */
add_action( 'init', 'al_shortcodes_tinymce' );
function al_shortcodes_tinymce() {

    // Abort if user will never see TinyMCE
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) && get_user_option( 'rich_editing' ) == 'true' )
        return;

    // Add a callback to regiser our tinymce plugin
    add_filter( 'mce_external_plugins', 'al_shortcodes_register_tinymce_plugin' );

    // Add a callback to add our button to the TinyMCE toolbar
    add_filter( 'mce_buttons', 'al_shortcodes_add_tinymce_button' );
}

//This callback registers our plug-in
function al_shortcodes_register_tinymce_plugin($plugin_array) {
	global $wp_version;

	if ( $wp_version >= 3.9 ) {
		$plugin_array['al_shortcodes_button'] = AL_SC_PUBLIC . '/js/production/tinymce-plugin.js';
	} else {
		$plugin_array['al_shortcodes_button'] = AL_SC_PUBLIC . '/js/production/tinymce-plugin-pre39.js';
	}

    return $plugin_array;
}

//This callback adds our button to the toolbar
function al_shortcodes_add_tinymce_button($buttons) {
    //Add the button ID to the $button array
    $buttons[] = "al_shortcodes_button";
    return $buttons;
}
