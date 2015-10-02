/*!
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

function getMapParams() {
	var scripts = document.getElementsByTagName('script'),
		tokens = scripts[scripts.length - 1].src.split('?')[1].split('&'),
		params = {};

	for(var k=0; k<tokens .length; k++) {
		var tmp = tokens[k].split('=');
		params[tmp[0]] = decodeURI(tmp[1]);
	}

	return params;
}

var alMaps = getMapParams();
var alScreenMaps = [];
var alMarkers = [];
var alInfoWindows = [];
var totalMarkers = 0;
var totalScreenMaps = 0;

if( typeof alMapsInit === 'undefined' ) {
	var alMapsInit = {};
}

/**
 * Use this function to open infowindows
 * Example: <a href="javascript:alMapsUI( 2 );">Open Infowindow on Marker 2</a>
 * Example 2:
 * 		<a href="javascript:alMapsUI( 3, 2, false, false);">
 *     		Open Infowindow on Marker 3 in Map 2 without closing
 *     		other Infowindows and without center to marker
 *     </a>
 * @param showMarker
 * @param map default:1
 * @param hideMarkers default:true
 * @param centerMarker default:true
 */
function alMapsUI( showMarker, map, hideMarkers, centerMarker ) {

	showMarker = typeof showMarker !== 'undefined' ? showMarker : false;
	map = typeof map !== 'undefined' ? map : 1;
	hideMarkers = typeof hideMarkers !== 'undefined' ? hideMarkers : true;
	centerMarker = typeof centerMarker !== 'undefined' ? centerMarker : true;

	if( showMarker ) {

		if( hideMarkers ) {
			alMapsCloseAllInfoWindows( map );
		}

		alMapsOpenInfoWindow( showMarker, map );

		if( centerMarker ) {
			alMapsCenterOnMarker( showMarker, map );
		}
	}
}

function alMapsCloseAllInfoWindows( map ) {
	map = typeof map !== 'undefined' ? map : 1;

	var i;
	for ( i = 1; i <= alInfoWindows[map].length; i++ ) {
		if( alInfoWindows[map][i] ) {
			alInfoWindows[map][i].close();
		}
	}
}

function alMapsOpenInfoWindow( marker, map ) {
	map = typeof map !== 'undefined' ? map : 1;

	if( alMarkers[map][marker] ) {
		google.maps.event.trigger( alMarkers[map][marker], 'click' );
	}
}

function alMapsCenterOnMarker( marker, map ) {
	map = typeof map !== 'undefined' ? map : 1;

	if( alScreenMaps[map] && alMarkers[map][marker] ) {
		alScreenMaps[map].setCenter( alMarkers[map][marker].getPosition() );
	}
}

alMapsInit[alMaps['id']] =
	function ( key ) {
		jQuery.extend( al_maps_google_hue_color, al_maps_google_style );

		var styles = al_maps_google_hue_color;
		var position = new google.maps.LatLng( alMaps['lat'], alMaps['long']);
		var styledMap = new google.maps.StyledMapType( styles, { name: al_maps_google_title });
		var zoom = parseInt(alMaps['zoom']);

		var mapOptions = {
			zoom: zoom,
			center: position,
			scrollwheel: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		};

		// New Map
		totalScreenMaps++;
		totalMarkers = 0;

		var thisScreenMap = totalScreenMaps;
		alScreenMaps[thisScreenMap] = new google.maps.Map(document.getElementById('al-gmaps-' + key ),
			mapOptions);

		var bounds = new google.maps.LatLngBounds();
		bounds.extend( position );

		if( al_maps_google_marker == 1 ) {

			totalMarkers++;
			var thisMarkerCount = totalMarkers;
			alMarkers[thisScreenMap] = [];
			alInfoWindows[thisScreenMap] = [];

			var icon = al_maps_google_marker_icon;
			if( icon == 'none' ) {
				alMarkers[thisScreenMap][thisMarkerCount] = new google.maps.Marker({
					position: position,
					map: alScreenMaps[thisScreenMap]
				});
			} else {
				alMarkers[thisScreenMap][thisMarkerCount] = new google.maps.Marker({
					position: position,
					map: alScreenMaps[thisScreenMap],
					icon: icon
				});
			}


			if( al_maps_google_marker_text != '' ) {

				alInfoWindows[thisScreenMap][thisMarkerCount] = new google.maps.InfoWindow({
					content: al_maps_google_marker_text
				});

				if( al_maps_show_marker_info == 1 ) {
					alInfoWindows[thisScreenMap][thisMarkerCount].open( alScreenMaps[thisScreenMap], alMarkers[thisScreenMap][thisMarkerCount] );
				}

				google.maps.event.addListener( alMarkers[thisScreenMap][thisMarkerCount], 'click', function() {
					alInfoWindows[thisScreenMap][thisMarkerCount].open( alScreenMaps[thisScreenMap], alMarkers[thisScreenMap][thisMarkerCount] );
				});
			}
		}

		// Addtional Markers
		function add_addtional_marker( currentMarker ) {
			// Lat Long Cords
			var latlong = currentMarker.url;
			var lat = 0;
			var long = 0;
			var position = false;


			if( latlong ) {
				var latlongArray = latlong.split(',');

				if( latlongArray.length == 2 ) {
					lat = latlongArray[0];
					long = latlongArray[1];
					position = new google.maps.LatLng( lat, long );
				} else {
					latlong = false;
				}
			}

			// Marker Icon
			var locIcon = currentMarker.image;

			// Name & Description
			var locName = currentMarker.title;
			var locDesc = currentMarker.description;


			if( position ) {

				var thisScreenMap = totalScreenMaps;

				totalMarkers++;
				var thisMarkerCount = totalMarkers;
				bounds.extend( position );

				if( locIcon ) {
					alMarkers[thisScreenMap][thisMarkerCount] = new google.maps.Marker({
						position: position,
						map: alScreenMaps[thisScreenMap],
						icon: locIcon
					});
				} else {
					alMarkers[thisScreenMap][thisMarkerCount] = new google.maps.Marker({
						position: position,
						map: alScreenMaps[thisScreenMap]
					});
				}

				if( locName || locDesc ) {

					var locHtml = '';

					if( locName ) {
						locHtml += "<b>"+locName +"</b><br />";
					}

					if( locDesc ) {
						locHtml += locDesc.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+'<br />'+'$2');
					}

					alInfoWindows[thisScreenMap][thisMarkerCount] = new google.maps.InfoWindow({
						content: locHtml
					});

					if( al_maps_show_marker_info == 1 ) {
						alInfoWindows[thisScreenMap][thisMarkerCount].open( alScreenMaps[thisScreenMap], alMarkers[thisScreenMap][thisMarkerCount] );
					}
					google.maps.event.addListener( alMarkers[thisScreenMap][thisMarkerCount], 'click', function() {
						alInfoWindows[thisScreenMap][thisMarkerCount].open( alScreenMaps[thisScreenMap], alMarkers[thisScreenMap][thisMarkerCount] );
					});

				}
			}
		}

		var i;

		for ( i = 0; i < al_maps_google_additional_markers.length; i++ ) {
			add_addtional_marker( al_maps_google_additional_markers[i] )
		}

		if( totalMarkers > 1 ) {
			if( al_maps_center_of_map && al_maps_center_of_map == 1 ) {

				alScreenMaps[thisScreenMap].fitBounds( bounds );

				google.maps.event.addListenerOnce( alScreenMaps[thisScreenMap], 'bounds_changed', function() {
					this.setZoom( zoom );
				});
			}
		}

		alScreenMaps[thisScreenMap].mapTypes.set( 'map_style', styledMap );
		alScreenMaps[thisScreenMap].setMapTypeId( 'map_style' );

		var center;
		function calculateCenter() {
			center = alScreenMaps[thisScreenMap].getCenter();
		}
		google.maps.event.addDomListener( alScreenMaps[thisScreenMap], 'idle', function() {
			calculateCenter();
		});
		google.maps.event.addDomListener(window, 'resize', function() {
			alScreenMaps[thisScreenMap].setCenter(center);
		});
	};
