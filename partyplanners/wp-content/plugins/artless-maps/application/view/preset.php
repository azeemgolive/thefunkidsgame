<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

$html = '
<div>
    <div class="al-gmaps-preset-code" style="display: none;">' . $preset['code'] . '</div>
    <p>
    <img src="' . AL_MAPS_PUBLIC . '/img/presets/'. $preset['preview_img'].'" /><br />
        <a href="'. $preset['url'] . '"><b>'. $preset['title'] . '</b></a> by <a target="_blank" href="'. $preset['author_url'] . '">'. $preset['author'] . '</a>';

            if( $preset['snazzymaps'] ) {
                $html .= ' published on <a target="_blank" href="http://snazzymaps.com">snazzymaps.com</a>';
            }

$html .= '
    </p>
</div>';

return $html;