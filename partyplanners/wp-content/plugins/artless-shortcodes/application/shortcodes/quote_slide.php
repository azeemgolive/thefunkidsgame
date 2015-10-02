<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'quote_slide', 'al_quote_slide' );

function al_quote_slide( $atts, $content = null ) {

	extract( shortcode_atts ( array(
		'author' => '',
		'image' => ''
	), $atts ) );

	$author = ( $author != '' ) ? '<span class="quote-author">' . $author . '</span>' : '';
	$image = ( $image != '' ) ? '<img class="quote-image" src="' . $image . '">' : '';


	$html = sprintf('
		<div>
			%s %s
			<p class="quote-comment full-width">
				%s
			</p>
		</div>
	',
		$image,
		$author,
		do_shortcode( $content ) );

	return $html;
}