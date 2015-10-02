<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
function al_clean_out_string( $atts = array(), $string ) {

    foreach ( $atts as $attr ) {
        $string = str_replace( $attr, '', $string );
    }

    return $string;
}