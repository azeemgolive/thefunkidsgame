<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'toggle_box', 'al_toggle_box' );

function al_toggle_box( $atts, $content ) {

	extract( shortcode_atts( array(
		'title' => ''
	), $atts ) );

	$html = sprintf( '
                    <div class="toggle">

                        <a class="header">
                            <span class="icon plus">+</span>
							<span class="icon minus">-</span>
                            <span class="text">%s</span>
                        </a>

                        <div class="content">
                          	<p>%s</p>
                        </div>
                    </div>
	',
		$title,
		do_shortcode( $content ) );

	return $html;
}