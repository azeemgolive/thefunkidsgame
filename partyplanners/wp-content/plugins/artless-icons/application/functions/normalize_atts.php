<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

/**
 * Normalize Array of Attributes
 *
 * Lowercase the Attributes in Shortcodes
 */
if( ! function_exists( 'al_normalize_atts' ) ) {
    function al_normalize_atts( $atts ) {

        if( is_array( $atts ) ) {

            foreach( $atts as $attribute => $value ) {

                if( is_int( $attribute ) ) {
                    $atts[strtolower( $value )] = true;
                    unset( $atts[$attribute] );
                }

            }

        }

        return $atts;
    }
}
