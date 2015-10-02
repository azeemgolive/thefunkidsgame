<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
global $al_theme_options;

if ( method_exists( $al_theme_options, 'getOption' ) ) {
    $al_theme_options->registerHandler( new Artless_Google_Maps_Api() );
} else {
    return false;
}

class Artless_Google_Maps_Api {
    private $api;
	private $title;
    private $lat;
    private $long;
    private $zoom;

    private $success = true;

    public static $init = true;

    public function googleMapsApi() {
        global $al_theme_options;

        if ( method_exists( $al_theme_options, 'getOption' ) ) {

            $this->api = $al_theme_options->getOption( 'al_gmaps_api' );

            if ( $this->setLatLong() ) { // set lat / long
                $this->setZoom();

                if( self::$init ) {
                    self::$init = false;

                    add_action( 'wp_footer', 'al_maps_google_style' );

                    function al_maps_google_style() {
                        global $al_theme_options;

                        // Title
                        $title = $al_theme_options->getOption( 'al_gmaps_title' )
                            ? $al_theme_options->getOption( 'al_gmaps_title' ) : 'Customized Map';

						// Color
                        $color = $al_theme_options->getOption( 'al_gmaps_color' );

                        if( $color ) {
                            $color = '[{"stylers": [{ "hue": "'.$color.'" }]}]';
                        } else {
                            $color = "[]";
                        }

						// Style
                        $style = $al_theme_options->getOption( 'al_gmaps_style' )
                            ? preg_replace( '#\s+#', ' ', $al_theme_options->getOption( 'al_gmaps_style' ) )
                            : "''";

						// Center of Map
						$center_of_map = ( $al_theme_options->getOption( 'al_gmaps_center_map' ) ) ? $al_theme_options->getOption( 'al_gmaps_center_map' ) : 1;

						// Show Marker Info Option
						$show_marker_info       = ( $al_theme_options->getOption( 'al_gmaps_marker_show_info' ) ) ? 1 : 0;

						// Marker
						$marker       = ( $al_theme_options->getOption( 'al_gmaps_marker' ) ) ? 1 : 0;
                        $marker_icon   = $al_theme_options->getOption( 'al_gmaps_marker_icon', 'url' )
                            ? $al_theme_options->getOption( 'al_gmaps_marker_icon', 'url' )
                            : 'none';
						$marker_title = $al_theme_options->getOption( 'al_gmaps_location_name' );
                        $marker_title  = str_replace('"', '\"', $marker_title );
						$marker_desc  = $al_theme_options->getOption( 'al_gmaps_location_desc' );
                        $marker_desc  = str_replace('"', '\"', $marker_desc );

						$marker_text = ( $marker_title ) ? '<b>' . $marker_title . '</b><br />' : '';

						// Addtional Marker
						$additional_markers = $al_theme_options->getOption( 'al_gmaps_additional_markers' );

						$json_markers = json_encode( $additional_markers );

						if ( $marker_desc ) {
							$marker_desc = preg_replace( '#([^>\r\n]?)(\r\n|\n\r|\r|\n)#', '$1<br />', $marker_desc );

							$marker_text .= $marker_desc;
						}
                        ?>
                        <script type="text/javascript">
                            //<![CDATA[
                            var al_maps_google_title = "<?php echo $title; ?>";
							var al_maps_google_marker = <?php echo $marker; ?>;
							var al_maps_center_of_map = <?php echo $center_of_map; ?>;
							var al_maps_show_marker_info = <?php echo $show_marker_info; ?>;
							var al_maps_google_additional_markers = <?php echo $json_markers; ?>;
                            var al_maps_google_marker_icon = "<?php echo $marker_icon; ?>";
							var al_maps_google_marker_text = "<?php echo $marker_text; ?>";
                            var al_maps_google_hue_color = <?php echo $color; ?>;
                            var al_maps_google_style = <?php echo $style; ?>;
                            //]]>
                        </script>
                    <?php
                    }
                }

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function setLatLong() {
        global $al_theme_options;

        $lat_long = $al_theme_options->getOption( 'al_gmaps_latitude_longitude' );

        if ( $lat_long ) {

            $lat_long_arr = explode( ',', $lat_long );

            $this->lat  = isset( $lat_long_arr[0] ) ? $lat_long_arr[0] : false;
            $this->long = isset( $lat_long_arr[1] ) ? $lat_long_arr[1] : false;

            if ( is_numeric( $this->lat ) and is_numeric( $this->long ) ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function setZoom() {
        global $al_theme_options;

        $this->zoom = $al_theme_options->getOption( 'al_gmaps_zoom' );
    }


    public function scriptGoogleMapsApi() {
        $script = '';

        if( $this->success ) {
            global $al_theme_options;

            if( $this->api ) {
                wp_register_script( 'al-google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key='.$this->api.'&sensor=false', true );
            } else {
                wp_register_script( 'al-google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', true );
            }
            wp_enqueue_script( 'al-google-maps-api' );

            $params = '?ver=1#&zoom='.$this->zoom.'&lat='.$this->lat.'&long='.$this->long;
			//.'&marker='.$this->marker.'&title='.$this->marker_title.'&desc='.$this->marker_desc;

            wp_register_script( 'al-google-maps-'.$al_theme_options->identicator, AL_MAPS_PUBLIC . '/js/production/google-maps-api.js'.$params.'&id='.$al_theme_options->identicator.'&language=de', array( 'jquery' ), true );
            wp_enqueue_script( 'al-google-maps-'.$al_theme_options->identicator );

        }

        return $script;
    }
}