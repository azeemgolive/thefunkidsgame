<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'percent_bar', 'al_percent_bar' );


function al_percent_bar( $atts ) {

	extract( shortcode_atts( array(
		'title' => 'Change my title!',
		'percent' => '50',
	), $atts ) );


	$html = sprintf( '<div data-percent="%d" class="percent-bar">
					<span class="skill">%s</span>
					<span class="number">%d%%</span>
					<span class="percent-bg" style="width: %d%%;"></span>
				</div>
	',
		$percent,
		$title,
		$percent,
		$percent);

	return $html;
}