<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'device_slide', 'al_device_slide' );

function al_device_slide( $atts, $content ) {

	$html = do_shortcode( $content );

	return $html;
}