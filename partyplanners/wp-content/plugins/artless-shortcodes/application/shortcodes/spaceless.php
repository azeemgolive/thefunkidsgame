<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'spaceless', 'al_spaceless' );

function al_spaceless( $atts, $content ) {

	extract( shortcode_atts( array(
		'shortcodes' => ''
	), al_normalize_atts( $atts ) ) );

	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']',
	);

	$spaceless = strtr( $content, $array );
	$html = do_shortcode( $spaceless );

	if( !$shortcodes ) {
		$html = al_clean_out_spaces( $html );
	}

	return $html;
}