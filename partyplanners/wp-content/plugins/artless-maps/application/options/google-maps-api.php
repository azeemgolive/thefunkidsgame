<?php
 /**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

/**
 * Ajax Functions
 * Required Files
 */
$required_files = array(
	AL_MAPS_DIR . '/application/ajax/google-maps-presets.php',
	AL_MAPS_DIR . '/application/ajax/google-maps-presets-single.php',
	AL_MAPS_DIR . '/application/options/google-maps-api-handler.php'
);

foreach ( $required_files as $file ) {
	if ( is_file( $file ) ) {
		require( $file );
	}
}

/**
 * Options
 */
function al_google_maps_api_options() {
	$options = array(
		'title' => __( 'Google Maps API', 'artless' ),
		'icon' => 'el-icon-map-marker',
		'fields' => array(

			array(
				'id'       => 'al_gmaps_api',
				'type'     => 'text',
				'title' 	=> __( 'Your Google API Key', 'artless' ),
				'subtitle'  => __( 'Needed if you have more than 2,500 visitors a day.', 'artless' ),
				'desc'      => __( '<a href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key">How to get an API key?</a>', 'artless' ),
			),

			array(
				'id'       => 'al_gmaps_title',
				'type'     => 'text',
				'title'    => __( 'Map Title', 'artless' ),
				'subtitle' => __( 'Appears at the top right of the map.', 'artless' ),
				'placeholder' => 'Customized',
			),

			array(
				'id'       => 'al_gmaps_latitude_longitude',
				'type'     => 'text',
				'title'    => __( 'Location Latitude, Longitude Coordinates', 'artless' ),
				'subtitle' => __( '<a target="_blank" href="https://support.google.com/maps/answer/18539?hl=en">Need Help?</a>', 'artless' ),
				'desc'     => __( 'Example for New York: 40.712555, -74.003850', 'artless' ),
				'placeholder' => '40.712555, -74.003850',

			),

			array(
				'id'       => 'al_gmaps_marker',
				'type'     => 'switch',
				'title'    => __( 'Location Marker', 'artless' ),
				"default"  => 0,
				'on'       => 'Enabled',
				'off'      => 'Disabled',
			),

            array(
                'id'    => 'al_gmaps_marker_icon',
                'type'  => 'media',
                'required' => array( 'al_gmaps_marker', '=', '1' ),
                'title' => __( 'Marker Icon', 'artless' ),
                'desc' => '<a id="al-gmaps-icon-apply" href="javascript:void(0);">'.__('Apply icon change to preview map.', 'artless').'</a>',
            ),

			array(
				'id'       => 'al_gmaps_location_name',
				'type'     => 'text',
				'required' => array( 'al_gmaps_marker', '=', '1' ),
				'title' 	=> __( 'Location Name', 'artless' ),
			),

			array(
				'id'       => 'al_gmaps_location_desc',
				'type'     => 'textarea',
				'required' => array( 'al_gmaps_marker', '=', '1' ),
				'title' 	=> __( 'Location Description', 'artless' ),
			),

			/*
            array(
                'id'          => 'al_gmaps_markers',
                'type'        => 'slides',
                'title'       => __( 'Map Markers', 'artless' ),
                'placeholder' => array(
                    'title'       => __( 'Title', 'artless' ),
                    'description' => __( 'Description', 'artless' ),
                    'url'         => __( 'Latitude, Longitude Coordinates', 'artless' ),
                ),
            ),
			*/

			array(
				'id' => 'al_gmaps_color',
				'type' => 'color',
				'title' => __('Map Color', 'artless'),
				'desc' => '<a id="al-gmaps-color-apply" href="javascript:void(0);">'.__('Apply color to preview map.', 'artless').'</a>',
				'validate' => 'color',
				'transparent' => false,
			),

			array(
				'id' => 'al_gmaps_zoom',
				'type' => 'slider',
				'title' => __('Map Zoom', 'artless'),
				"default" => 2,
				"min" => 0,
				"step" => 1,
				"max" => 19,
				'display_value' => 'text'
			),

			array(
				'id'       => 'al_gmaps_style',
				'type' 		=> 'textarea',
				'title'    => __( 'Advanced Styling', 'artless' ),
				'subtitle'  => __( 'Overwrites <b>Map Color</b>', 'artless')
					. '<br /><br />'
					. __( '<b>Some Presets</b>', 'artless' )
					. '<br /><div id="al-gmaps-style-presets"></div>',
				'desc'     => __( 'Use <a target="_blank" href="http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html">Google Styled Maps Wizard</a> and copy JSON code to 	this field. To get the JSON code click on "Show JSON" (on the right in the wizard).<br />', 'artless' ),
			),

			array(
				'id' 		=> 'al_gmaps_center_map',
				'type' 		=> 'select',
				'title' 	=> __('Center of Map', 'artless' ),
				'options' => array(
					1 => 'Center of all Map Markers',
					2 => 'First Coordinates'
				) ,
				'default' => 1
			),

			array(
				'id'       => 'al_gmaps_marker_show_info',
				'type'     => 'switch',
				'title'    => __( 'Show Marker Info on Load', 'artless' ),
				"default"  => 1,
				'on'       => 'Enabled',
				'off'      => 'Disabled',
				'hint'  => array(
					'title'   => __( 'Multiple Markers', 'artless' ),
					'content' => __( 'If you do not want to see all markers on page load you have to disable this option.', 'artless' )
				)
			),

            array(
                'id'          => 'al_gmaps_additional_markers',
                'type'        => 'slides',
                'title'       => __( 'Additional Markers', 'artless' ),
                'subtitle'    => __( 'Unlimited Markers', 'artless' ),
                'placeholder' => array(
                    'title'       => __( 'Title', 'artless' ),
                    'description' => __( 'Description ( HTML allowed )', 'artless' ),
                    'url'         => __( 'Latitude, Longitude Coordinates', 'artless' ),
                ),
            ),

			array(
				'id' => 'al_gmaps_preview',
				'type' => 'info',
				'title' => __( 'Google Map Preview', 'artless' ),
			),


		),
	);

	return $options;
}


if( class_exists( 'Artless_Theme_Options' )) {

	if( method_exists( 'Artless_Theme_Options', 'addOption' )) {
		Artless_Theme_Options::addOption( al_google_maps_api_options(), 110 );
	}

}
