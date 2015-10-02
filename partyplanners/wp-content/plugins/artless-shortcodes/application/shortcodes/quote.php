<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'quote', 'al_quote' );

function al_quote( $atts, $content ) {

	$html = '<p class="blockquote">' . do_shortcode( $content ) . '</p>';

	return $html;
}