<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'google_maps_api', 'al_google_maps_api' );

function al_google_maps_api( $atts, $content = null ) {
	global $al_theme_options;

	extract( shortcode_atts ( array(
		'width' => '100%',
		'height' => '500px',
	), al_normalize_atts( $atts ) ) );

	$error = false;

	if( $al_theme_options->existHandlerMethod( 'googleMapsApi' ) ) {

		if( $al_theme_options->googleMapsApi() ) {
			$script = $al_theme_options->scriptGoogleMapsApi();
			$style = ' style="width:'.$width.';height:'.$height.';"';
			$html = '<div class="al-google-maps-api" id="al-gmaps-' . $al_theme_options->identicator . '"' . $style . '></div>'.$script;

			$al_theme_options->identicator++;
		} else {
			$error = "Map configuration invalid. Please check <i>\"Location Latitude, Longitude Coordinates\"</i> value. " . $al_theme_options->contact_us;
		}
	} else {
		$error = "Please activate <i>\"artless Maps\"</i>-Plugin to use artless <i>[google_maps_api]</i>-Shortcode. " . $al_theme_options->contact_us;
	}

	if( $error ) {
		$html = '<div class="alert-box error">' . $error . ' <a class="close">x</a></div>';
	}

	return $html;
}