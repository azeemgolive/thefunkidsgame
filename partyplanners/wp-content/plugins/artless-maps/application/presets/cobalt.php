<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

return array(
	'id' => '2',
	'title' => 'Cobalt',
	'url' => 'http://snazzymaps.com/style/30/cobalt',
	'author' => 'macodev',
	'author_url' => 'http://macodev.com/',
	'preview_img' => 'cobalt.jpg',
	'snazzymaps' => true,
	'code' =>
		'[
    {
		"featureType": "all",
        "elementType": "all",
        "stylers": [
            {
				"invert_lightness": true
            },
            {
				"saturation": 10
            },
            {
				"lightness": 30
            },
            {
				"gamma": 0.5
            },
            {
				"hue": "#435158"
            }
        ]
    }
]'
);
