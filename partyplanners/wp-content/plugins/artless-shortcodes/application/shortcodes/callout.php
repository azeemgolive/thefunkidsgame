<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'callout', 'al_callout' );

function al_callout( $atts, $content ) {

    $html = sprintf(
        '<div class="callout-box">%s</div>',
        do_shortcode( $content )
    );

    return $html;
}