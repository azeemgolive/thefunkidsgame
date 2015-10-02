<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'device_slider', 'al_device_slider' );

function al_device_slider( $atts, $content ) {

	extract( shortcode_atts ( array(
		'type' => 'iphone'
	), $atts ) );

	$type = strtolower( $type );

	switch( $type ) {
		case 'phone':
		case 'iphone':
			$device = 'phone';
			$device_image_path =
                AL_SC_PUBLIC . '/img/device-slider-iphone.png';
			break;
		case 'notebook':
		case 'macbook':
			$device = 'notebook';
			$device_image_path =
                AL_SC_PUBLIC . '/img/device-slider-macbook.png';
			break;
		default:
			$device = 'phone';
			$device_image_path =
                AL_SC_PUBLIC . '/img/device-slider-iphone.png';
			break;
	}

	$device_image = '<img class="device-img" src="' . $device_image_path . '" />';

	$html = '<div class="device-slider-outer ' . $device . '">'
		. '<div class="device-slider ' . $device . '">'
		. do_shortcode( $content )
		. '</div>' . $device_image . '</div>';

	$html = al_clean_out_spaces( $html );

	return $html;
}