<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'spacer', 'al_spacer' );

function al_spacer( $atts ) {

	extract( shortcode_atts( array(
		'line' => false,
		'height' => '2',
		'top' => '',
		'bottom' => ''
	), al_normalize_atts( $atts ) ) );

	if( $top or $bottom  ) {
		$top = ( $top ) ? $top : 0;
		$bottom = ( $bottom ) ? $bottom : 0;

		$margin = $top . 'px 0 ' . $bottom . 'px 0';
	} else {
		$height =  ceil( intval( $height ) / 2 );

		$margin = $height . 'px 0';
	}

	$class = ( $line ) ? ' line' : '';

	if( $line !== true and $line == 'fullwidth' ) {
		// close row
		$html = '</div>';
		$html .= '<div class="spacer line" style="margin: ' . $margin . ';"></div>';
		$html .= '<div class="row gutters">';
	} else {
		$html = '<div class="spacer' . $class . '" style="margin: ' . $margin . ';"></div>';
	}

	return $html;
}