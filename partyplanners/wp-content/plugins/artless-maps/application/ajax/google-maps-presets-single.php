<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

function al_options_gmaps_search_preset( $presets, $id ) {
	$results = array();

	if (is_array($presets)) {
		if (isset($presets['id']) && $presets['id'] == $id) {
			$results[] = $presets;
		}

		foreach ($presets as $preset) {
			$results = array_merge($results, al_options_gmaps_search_preset ($preset, $id ));
		}
	}

	return $results;
}

add_action( 'wp_ajax_al_options_gmaps_presets_single', 'al_options_gmaps_presets_single' );

function al_options_gmaps_presets_single() {

	$presets_file = dirname( __FILE__ ) . '/../presets/presets.php';
	$preset_template = dirname( __FILE__ ) . '/../view/preset.php';

	if( is_file( $presets_file ) and is_file( $preset_template ) ) {
		$presets = include( $presets_file );

		$preset = al_options_gmaps_search_preset( $presets, $_POST['id'] );
		$preset = $preset[0];

		$preset_html = include( $preset_template );

		$return['preset'] = $preset_html;

	} else {
		$return['errorMsg'] = 'Preset nicht gefunden.';
	}

	echo json_encode( $return );
	die();
}