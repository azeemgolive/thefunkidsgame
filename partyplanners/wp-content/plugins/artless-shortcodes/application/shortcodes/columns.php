<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

/**
 * @param $class
 * @param $atts
 * @param $content
 *
 * @return string
 */
function al_columns( $class, $atts, $content ) {
	extract( shortcode_atts ( array(
		'last' => ''
	), al_normalize_atts( $atts ) ) );

    if ( $class == 'span_12' ) {
        $last = 1;
    }

	if( !$last ) {
		$html = '<div class="col ' . $class . '">' . do_shortcode( $content ). '</div>';
	} else {
		$html = '<div class="col ' . $class . ' last">' . do_shortcode( $content ). '</div><div class="clear"></div>';
	}

	return $html;
}


/**
 * Shortcodes
 */
add_shortcode( 'one_one', 'al_one_one' );
add_shortcode( 'one_half', 'al_one_half' );
add_shortcode( 'one_third', 'al_one_third' );
add_shortcode( 'two_third', 'al_two_third' );
add_shortcode( 'one_fourth', 'al_one_fourth' );
add_shortcode( 'two_fourth', 'al_two_fourth' );
add_shortcode( 'three_fourth', 'al_three_fourth' );

function al_one_one( $atts, $content ) {
    return al_columns( 'span_12', $atts, $content );
}

function al_one_half( $atts, $content ) {
	return al_columns( 'span_6', $atts, $content );
}

function al_one_third( $atts, $content ) {
	return al_columns( 'span_4', $atts, $content );
}

function al_two_third( $atts, $content ) {
	return al_columns( 'span_8', $atts, $content );
}

function al_one_fourth( $atts, $content ) {
	return al_columns( 'span_3', $atts, $content );
}

function al_two_fourth( $atts, $content ) {
	return al_columns( 'span_6', $atts, $content );
}

function al_three_fourth( $atts, $content ) {
	return al_columns( 'span_9', $atts, $content );
}




