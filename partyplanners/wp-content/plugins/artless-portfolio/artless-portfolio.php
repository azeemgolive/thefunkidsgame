<?php
/*
Plugin Name: artless Portfolio
Plugin URI: http://artlessthemes.com
Description: Adds a new section to your admin panel to create and organize your portfolio. Gallery, Audio or Video posts.
Version: 1.0.11
Author: artless
Author URI: http://artlessthemes.com
*/

/**
 * Artless Portfolio Globals
 */
define( 'AL_PF_DIR',  untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'AL_PF_PUBLIC', plugin_dir_url( __FILE__ ) . 'public' );


/**
 * Setup
 */
add_action( 'init', 'al_portfolio_setup', 1 );

function al_portfolio_setup() {
	/**
	 * Required Files
	 */
	$required_files = array(
        AL_PF_DIR . '/application/post-type/portfolio.php',
        AL_PF_DIR . '/application/options/portfolio.php',
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
		add_image_size( 'al-pf-preview', 600, 450, true );
	}
}


/**
 * Add Meta Tags
 */
add_action( 'wp_head', 'al_portfolio_meta_tags' );
function al_portfolio_meta_tags() {
	$post_type = get_post_type();

	if( 'portfolio' == $post_type ) {

		$title = get_post_meta( get_the_ID(), "al_pf_og_title", TRUE );
		$title = ( !empty( $title ) ) ? $title : get_the_title();

		$meta = array(
			'og:title' => $title,
			'og:url' => get_permalink(),
		);

		$desc = get_post_meta( get_the_ID(), "al_pf_og_description", TRUE );
		$desc = ( !empty( $desc ) ) ? $desc : false;

		if( $desc ) {
			$meta['og:description'] = $desc;
		}

		if ( has_post_thumbnail() ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$meta['og:image'] = $thumbnail[0];
		}

		if( get_post_format() == 'gallery' ) {
			$images = rwmb_meta( 'al_pf_gallery_images', 'type=image&size=full' );

			if( is_array( $images ) ) {
				foreach ( $images as $image ) {
					$meta['images'][] =  $image['url'];
				}
			}
		}

		foreach( $meta as $key => $value ) {
			if( $key == 'images' ) {
				foreach( $value as $image ) {
					echo '<meta property="og:image" content="' . $image . '" />';
				}
			} else {
				echo '<meta property="' . $key . '" content="' . $value . '" />';
			}
		}

	}
}

add_action( 'wp_head', 'al_portfolio_min_height' );

function al_portfolio_min_height() {
	global $al_theme_options;

	if( is_object( $al_theme_options ) ) {
		$minHeight = $al_theme_options->getOption( 'al_portfolio_min_height' )
			? $al_theme_options->getOption( 'al_portfolio_min_height' )
			: '350';

		echo '<script type="text/javascript">var alPortfolioMinHeight = '.$minHeight.';</script>';
	}
}

/**
 * Portfolio Scripts
 */
add_action( 'wp_enqueue_scripts', 'al_portfolio_front_scripts' );
function al_portfolio_front_scripts() {

	wp_register_script( 'al-portfolio', AL_PF_PUBLIC . '/js/production/portfolio.js',
		array( 'jquery' ), '1.0', true ) ;

	wp_enqueue_script( 'al-portfolio' );
	wp_localize_script( 'al-portfolio', 'alAdmin', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

/**
 * Portfolio Admin Scripts
 */
add_action( 'admin_enqueue_scripts', 'al_portfolio_admin_scripts' );
function al_portfolio_admin_scripts() {

	wp_register_script( 'al-portfolio-admin', AL_PF_PUBLIC . '/js/production/portfolio.admin.js',
		array( 'jquery' ), '1.0', true ) ;

	wp_enqueue_script( 'al-portfolio-admin' );
}

/**
 * Portfolio Styles
 */
add_action( 'wp_enqueue_scripts', 'al_portfolio_front_styles', 99 );
function al_portfolio_front_styles() {

	wp_register_style( 'al-portfolio', AL_PF_PUBLIC . '/css/production/portfolio.css', array(), '1', 'all' );

	wp_enqueue_style( 'al-portfolio' );
}


/**
 * Flush Rewrite Rules
 */
// Activation
register_activation_hook( __FILE__, 'al_portfolio_activate' );
function al_portfolio_activate() {
	al_portfolio_setup();
	al_portfolio();
	flush_rewrite_rules();
}

// Deactivation
register_deactivation_hook( __FILE__, 'al_portfolio_deactivate' );
function al_portfolio_deactivate() {
	flush_rewrite_rules();
}