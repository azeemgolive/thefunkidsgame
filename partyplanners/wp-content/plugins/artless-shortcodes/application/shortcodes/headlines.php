<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

function al_headline( $tag, $content ) {
    $html = '<'. $tag . '>' . do_shortcode( $content ) . '</'. $tag . '>';
    return $html;
}

add_shortcode( 'h1', 'al_h1' );
function al_h1( $atts, $content ) {
    return al_headline('h1', $content );
}

add_shortcode( 'h2', 'al_h2' );
function al_h2( $atts, $content ) {
    return al_headline('h2', $content );
}

add_shortcode( 'h3', 'al_h3' );
function al_h3( $atts, $content ) {
    return al_headline('h3', $content );
}

add_shortcode( 'h4', 'al_h4' );
function al_h4( $atts, $content ) {
    return al_headline('h4', $content );
}

add_shortcode( 'h5', 'al_h5' );
function al_h5( $atts, $content ) {
    return al_headline('h5', $content );
}

add_shortcode( 'h6', 'al_h6' );
function al_h6( $atts, $content ) {
    return al_headline('h6', $content );
}