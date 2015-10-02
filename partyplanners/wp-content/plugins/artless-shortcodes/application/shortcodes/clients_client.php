<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'client', 'al_client' );

function al_client( $atts, $content ) {

	/*
	extract( shortcode_atts( array(
		'logo' => '',
		'link' => '',
		'link_title' => '',
	), $atts ) );

	$html = sprintf(
		'<li><a href="%s"><img src="%s" title="%s" /></a></li>',
		$link,
		$logo,
		$link_title );
	*/

	$html = sprintf(
		'<div>%s</div>',
		$content );

	return $html;
}