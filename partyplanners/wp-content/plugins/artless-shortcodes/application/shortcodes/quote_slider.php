<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'quote_slider', 'al_quote_slider' );

function al_quote_slider( $atts, $content = null ) {

	$html = '
	    <div class="quote-slider">
			'. do_shortcode( $content ) . '
        </div>
	';

	return $html;
}