<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'center', 'al_align_center' );

function al_align_center( $atts, $content ) {

	$html = '<div class="center">' . do_shortcode( $content ) . '</div>';

	return $html;
}