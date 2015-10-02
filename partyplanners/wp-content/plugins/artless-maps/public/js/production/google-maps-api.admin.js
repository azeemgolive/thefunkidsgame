/*!
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

( function( $ ) {

	'use strict';

	/**
	 * Theme Options - Google Maps Api
	 */
	var alBody = $( 'body' );

	var googleMapPreview = $( '#info-al_gmaps_preview' );

	googleMapPreview.css( 'height', '500px' );

	// Addtional Markers
	var formAdditionalMarkers = $( '#al_options-al_gmaps_additional_markers' );
	var addMarker = formAdditionalMarkers.find( 'a.redux-slides-add' );


	function al_google_map_initialize() {

		var totalMarkers = 0;
		var latlong = $( '#al_gmaps_latitude_longitude-text' ).val();
		var lat = 0;
		var long = 0;

		if( latlong ) {
			var latlongArray = latlong.split(',');

			if( latlongArray.length == 2 ) {
				lat = latlongArray[0];
				long = latlongArray[1];
			}
		}

		var locMarker       = $( '#al_gmaps_marker' ).val();
		var locIconBox      = $( '#al_options-al_gmaps_marker_icon' );
		var locIcon         = locIconBox.find('.redux-option-image' ).attr('src');
		var locIconDisplay  = locIconBox.find('.screenshot' ).css('display');
		var locName         = $( '#al_gmaps_location_name-text' ).val();
		var locDesc         = $( '#al_gmaps_location_desc-textarea' ).val();

		var centerOfMap 	= $('#al_gmaps_center_map-select' ).val();
		var showMarkerInfo  = $('#al_gmaps_marker_show_info' ).val();

		var title = $( '#al_gmaps_title-text' ).val();
		var zoom = parseInt( $( '#al_gmaps_zoom' ).val() );
		var color = $( '#al_gmaps_color-color' ).val();
		var advStyles = $( '#al_gmaps_style-textarea' ).val();

		var hueColor = [];
		var styles = [];

		if( title == '' ) {
			title = 'artless Preview';
		}

		if( color != '' ) {
			hueColor = [{"stylers": [{ "hue": color }]}];
		}

		if( advStyles != '' ) {
			styles = eval(advStyles);
		}

		jQuery.extend( hueColor, styles );
		styles = hueColor;

		var styledMap = new google.maps.StyledMapType(styles, { name: title } );

		var position = new google.maps.LatLng( lat, long );

		var mapOptions = {
			zoom: zoom,
			center: position,
			scrollwheel: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		};

		var map = new google.maps.Map(document.getElementById('info-al_gmaps_preview'),
			mapOptions);

		var bounds = new google.maps.LatLngBounds();
		bounds.extend( position );

		if( locMarker != '0' ){
			totalMarkers++;
			if( locIcon.length == 0 || locIconDisplay == 'none' ) {
				var marker = new google.maps.Marker({
					position: position,
					map: map
				});
			} else {
				var marker = new google.maps.Marker({
					position: position,
					map: map,
					icon: locIcon
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

				var infowindow = new google.maps.InfoWindow({
					content: locHtml
				});

				if( showMarkerInfo == 1 ) {
					infowindow.open( map,marker );
				}

				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});
			}
		}

		// Addtional Markers
		formAdditionalMarkers.find( 'div.ui-accordion-content' ).each( function() {

			var form = $( this );

			// Lat Long Cords
			var latlong = form.find( '[id^=al_gmaps_additional_markers-url]' ).val();
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
			var locIcon = form.find( 'img.redux-option-image, img.redux-slides-image' );

			if( locIcon.length > 0 ) {
				locIcon = locIcon.attr( 'src' );
			} else {
				locIcon = false;
			}

			// Name & Description
			var locName = form.find( '[id^=al_gmaps_additional_markers-title]' ).val();
			var locDesc = form.find( '[id^=al_gmaps_additional_markers-description]' ).val();


			if( position ) {
				totalMarkers++;
				bounds.extend( position );

				if( locIcon ) {
					var marker = new google.maps.Marker({
						position: position,
						map: map,
						icon: locIcon
					});
				} else {
					var marker = new google.maps.Marker({
						position: position,
						map: map
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

					var infowindow = new google.maps.InfoWindow({
						content: locHtml
					});

					if( showMarkerInfo == 1 ) {
						infowindow.open( map,marker );
					}
					google.maps.event.addListener(marker, 'click', function() {
						infowindow.open(map,marker);
					});

				}

			}
		} );

		if( totalMarkers > 1 ) {
			if( centerOfMap && centerOfMap == 1 ) {

				map.fitBounds( bounds );

				google.maps.event.addListenerOnce( map, 'bounds_changed', function() {
					this.setZoom( zoom );
				});
			}
		}

		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');
	}

	if( googleMapPreview.length ) {
		google.maps.event.addDomListener( window, 'load', al_google_map_initialize );

		$( '[id^=al_gmaps_]' ).change( function() {
			al_google_map_initialize();
		});

		$( '#al-gmaps-color-apply, #al-gmaps-icon-apply, #110_section_group_li, #al_options-al_gmaps_marker, #al_options-al_gmaps_marker_show_info' ).click( function() {
			al_google_map_initialize();
		});

		alBody.on( 'click', '.alert-box .al-gmaps-apply-preset', function(){
			var presetCode = $( this ).parent( '.alert-box' ).find( '.al-gmaps-preset-code' ).html();
			$( '#al_gmaps_style-textarea' ).val( presetCode );
			$( this ).parent( '.alert-box' ).slideUp();
			al_google_map_initialize();
		} );
	}

	// Presets
	function gmapsPresets( preset, top, left ) {

		var popup = $( '#gmaps-preset' );

		if( popup.length == 0 ) {
			var html = '<div id="gmaps-preset" class="alert-box notice" style="display: none; position: absolute; top:' + ( top + 20 ) + 'px; left: ' + left + 'px; z-index: 1000;" ><div class="al-gmaps-preset">' + preset + '</div><a class="close">x</a><div class="button button-primary al-gmaps-apply-preset">Apply Preset</div> <div class="button al-gmaps-close-button">Close</div></div>';
			alBody.append( html );
			popup = $( '#gmaps-preset' );
		} else {
			popup.find('.al-gmaps-preset' ).html( preset );
			popup.css( 'left', left );
			popup.css( 'top', top+20 );
		}

		popup.slideDown();
	}


	alBody.on( 'click', '.al-gmaps-preset', function( e ) {
		e.preventDefault();

		var offset = $( this ).offset();
		var presetId = $( this ).data( 'presetId' );

		$.ajax( {
			type: 'POST',
			url: alAdmin.ajaxurl,
			data: { action: 'al_options_gmaps_presets_single', id: presetId },
			dataType: 'json',
			success: function( data ) {
				//.errorMsg
				console.log(data);

				var preset = data.preset;

				gmapsPresets ( preset, offset.top, offset.left );

			},
			error: function( MLHttpRequest, textStatus, errorThrown ) {
				// alert( errorThrown );
			}
		} );
	});

	function gmapsLoadPresets() {
		$.ajax( {
			type: 'POST',
			url: alAdmin.ajaxurl,
			data: { action: 'al_options_gmaps_presets' },
			dataType: 'json',
			success: function( data ) {
				// console.log(data);

				var presets = '';

				$.each( data.presets, function( key, preset ) {

					presets += '<a class="al-gmaps-preset" href="javascript:void(0);" data-preset-id="' + preset.id + '">'+ preset.title + '</a><br />';
				} );

				$( '#al-gmaps-style-presets' ).append( presets );
			},
			error: function(MLHttpRequest, textStatus, errorThrown){
				// alert( errorThrown );
			}
		} );
	}

	if( googleMapPreview.length ) {
		gmapsLoadPresets();
	}

	/**
	 * CLOSE ALL NOTICE BOXES
	 */
	alBody.on( 'click', '.redux-group-tab-link-a', function() {
		$( '.alert-box' ).hide();
	});

	/**
	 * Rename Slider Labels
	 */
	addMarker.html( 'Add Marker' );

	function al_gmaps_additional_markers_rename_labels() {

		formAdditionalMarkers.find( 'span.redux-slides-header' ).each( function() {
			if( $( this ).html() == 'New slide' || $( this ).html() == 'New Slide' ) {
				$( this ).html( 'New Marker' );
			}
		} );

		formAdditionalMarkers.find( 'a.redux-slides-remove' ).each( function() {
			if( $( this ).html() == 'Delete Slide' ) {
				$( this ).html( 'Delete Marker' );
			}
		} );
	} al_gmaps_additional_markers_rename_labels();

	addMarker.on( 'click', function() {
		setTimeout( al_gmaps_additional_markers_rename_labels, 10 ) ;
	} );
} )( jQuery );