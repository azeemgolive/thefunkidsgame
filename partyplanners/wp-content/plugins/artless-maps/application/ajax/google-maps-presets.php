<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_action( 'wp_ajax_al_options_gmaps_presets', 'al_options_gmaps_presets' );

function al_options_gmaps_presets() {

	$presets_file = dirname( __FILE__ ) . '/../presets/presets.php';

	if( is_file( $presets_file ) ) {
		$return['presets'] = include( $presets_file );
	} else {
		$return['errorMsg'] = 'Keine Presets vorhanden.';
	}

	echo json_encode( $return );
	die();
}