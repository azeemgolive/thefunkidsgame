<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'box', 'al_box' );

function al_box( $atts, $content ) {

	extract( shortcode_atts( array(
        'width' => '',
		'position' => '',
        'text_align' => '',
        'last' => ''
	), al_normalize_atts( $atts ) ) );

    $style = '';

    $style .= ( $width ) ? 'width: 100%; max-width:' . $width . ';' : '';

    switch( $position ) {
        case 'left':
        case 'right':
            $style .= 'float:' . $position . ';';
            break;
        case 'center':
            $style .= 'margin:0 auto;';
    }

    $style .= ( $text_align ) ? 'text-align:' . $text_align . ';' : '';

    $html = sprintf( '<div style="%s">%s</div>',
        $style,
        do_shortcode( $content ));


    if( $last ) {
        $html .= '<div class="clear"></div>';
    }

	return $html;
}