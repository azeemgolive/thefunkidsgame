<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'button', 'al_button' );

function al_button( $atts, $content = null ) {

    extract( shortcode_atts( array(
		'inline' => '',
        'border' => '',
		'size' => '',
        'link' => ''
    ), al_normalize_atts($atts) ) );

	$classes = ( $border ) ? ' border' : '';
	$classes .= ( $size != '' ) ? ' '.$size : '';
	$classes .= ( $inline ) ? ' button-inline' : '';

    if( $link == '' ) {

        $html = sprintf(
            '<span class="button%s">%s</span>',
            $classes,
            $content );

    } else {

        $html = sprintf(
            '<a class="button%s" href="%s">%s</a>',
            $classes,
            $link,
            $content );

    }

	if( !$inline ) {
		$html = '<div class="block">' . $html . '</div>';
	}

    return $html;
}

