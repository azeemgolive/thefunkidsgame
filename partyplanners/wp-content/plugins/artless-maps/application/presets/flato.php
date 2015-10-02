<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

return array(
    'id' => '1',
    'title' => 'Flato',
    'url' => 'http://artlessthemes.com',
    'author' => 'artless',
    'author_url' => 'http://artlessthemes.com',
    'preview_img' => 'flato.jpg',
    'snazzymaps' => false,
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
                "saturation": 9
            },
            {
                "lightness": 30
            },
            {
                "gamma": 0.4
            },
            {
                "hue": "#33d69a"
            }
        ]
    }
]'
);