<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'price_box', 'al_price_box' );

function al_price_box( $atts, $content = null ) {

	extract( shortcode_atts ( array(
		'title' => '',
		'price' => '',
		'highlighted' => false,
	), al_normalize_atts( $atts ) ) );

	$title = ( $title == '' ) ? '' : '<h3>' . $title . '</h3>';
	$price = ( $price == '' ) ? '' : '<span class="price">' . $price . '</span>';
	$highlighted = ( $highlighted ) ? ' best-price' : '';


	$html = sprintf('
	<div class="pricing-table%s">
		<div class="header">
			%s %s
		</div>
		<div class="content">
			%s
		</div>
	</div>
	',
		$highlighted,
		$title,
		$price,
		do_shortcode( $content ) );

	return $html;
}