<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */


add_shortcode( 'clients', 'al_clients' );

function al_clients( $atts, $content = null ) {

	if( $content != '' ) {

		$clean_out = array(
			'<br />',
			'<p>',
			'</p>'
		);

		$content = al_clean_out_string( $clean_out , $content );

		$html = '<div class="al-client-carousel">' . do_shortcode( $content ) . '</div>';
	}

	return $html;
}