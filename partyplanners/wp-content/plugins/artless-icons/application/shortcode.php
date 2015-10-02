<?php
/**
 * @package    artless Icons
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'al_icon', 'al_icon' );

function al_icon( $atts, $content = null ) {

    extract( shortcode_atts( array(
        'icon' => '',
        'size' => '',
        'color' => '',
        'link' => '',
        'circle' => '',
    ), al_normalize_atts($atts) ) );

    $icon_class = ' fa-' . $icon;

    $icon_style = ' style="';
    $icon_style .= ( isset ( $size ) and $size != '' ) ? 'font-size:' . $size . 'em;' : '' ;
    $icon_style .= ( isset ( $color ) and $color != '' ) ? 'color:' . $color . ';' : '' ;
    $icon_style = ( $icon_style == ' style="' ) ? '' : $icon_style . '"';

    $icon_data_color = ( isset ( $color ) and $color != '' ) ? ' data-color="' . $color . '"' : '' ;
    $icon_data_size = ( isset ( $size ) and $size != '' ) ? ' data-size="' . $size . '"' : '' ;

    $icon_html = '<i class="al-icon-fa fa' . $icon_class . '"' . $icon_style . $icon_data_color . $icon_data_size . '></i>';

    $circle_class = ( $circle ) ? ' class="al-icon-circle"' : '';

    if( $link == '' ) {
        $html = sprintf(
            '<span%s>%s</span>',
            $circle_class,
            $icon_html
        );
    } else {
        $html = sprintf(
            '<a href="%s"%s>%s</a>',
            $link,
            $circle_class,
            $icon_html
        );
    }

    return $html;
}