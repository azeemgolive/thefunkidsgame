<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'alert', 'al_alert' );

function al_alert( $atts, $content ) {

    extract( shortcode_atts( array(
        'type' => '',
    ), al_normalize_atts( $atts ) ) );

    if( $type == '' ) {
        $type = 'notice';
    }

    $html = sprintf(
        '<div class="alert-box %s">%s <a class="close">x</a></div>',
        $type,
        do_shortcode( $content )
    );

    return $html;
}