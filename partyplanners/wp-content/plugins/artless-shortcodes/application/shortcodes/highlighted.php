<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'highlighted', 'al_highlighted' );

function al_highlighted( $atts, $content ) {

	$html = '<span class="highlighted">' . do_shortcode( $content ) . '</span>';

	return $html;
}