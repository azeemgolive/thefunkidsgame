<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'fact', 'al_fact' );


function al_fact( $atts ) {

	extract( shortcode_atts( array(
		'title' => '',
		'icon'  => '',
		'count' => ''
	), al_normalize_atts( $atts ) ) );


	$html = sprintf( '
	<!-- START FACTS -->
	<div class="facts">
		<div class="icon-number">
			<i class="fa fa-%s"></i>
			<span class="number">%d</span>
		</div>
		<div class="text">
		%s
		</div>
	</div><!-- END FACTS -->
	',
		$icon,
		$count,
		$title );

	return $html;
}