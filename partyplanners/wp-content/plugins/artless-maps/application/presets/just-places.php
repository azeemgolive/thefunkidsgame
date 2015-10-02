<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

return array(
    'id' => '4',
    'title' => 'Just Places',
    'url' => 'http://snazzymaps.com/style/65/just-places',
    'author' => 'Tony',
    'author_url' => 'http://snazzymaps.com/',
    'preview_img' => 'just-places.jpg',
    'snazzymaps' => true,
    'code' => '[
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#fffffa"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "lightness": 50
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry",
        "stylers": [
            {
                "lightness": 40
            }
        ]
    }
]'
);