<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'tab_content_box', 'al_tab_content_box' );

function al_tab_content_box( $tab_atts, $content ) {
	global $al_theme_options;

    extract( shortcode_atts( array(
        'tabs_position' => '',
    ), al_normalize_atts( $tab_atts ) ) );


	 $content = do_shortcode( $content );

    $pattern = '#\[(\[?)(tab_content)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)#';
    preg_match_all( $pattern, $content, $results, PREG_SET_ORDER );

    $tabs = array();

    foreach( $results as $result ) {

        $result = array_filter( $result, 'strlen' );
        $result = array_filter( $result );
        $result = array_values( $result );

        $tab = array();
        $tab_atts = array();

		if( isset( $result[2] ) ) {
			$result[2] = str_replace( '&#8221;', '"', $result[2] );
			$result[2] = str_replace( '&#187;', '"', $result[2] );
			preg_match_all('#([A-z]{1,15})\=[\"\'”]{1}([^\"]{0,200})[\"\'”]{1}#', $result[2], $atts, PREG_SET_ORDER );
			foreach ($atts as $att) {
				$tab_atts[$att[1]] = $att[2];
			}
		}
        $tab['atts'] = $tab_atts;
		if( isset( $tab['atts']['title'] ) ) {
			$tab['content'] = isset( $result[3] ) ? $result[3] : '';
		} else {
			$tab['atts']['title'] = '';
			$tab['content'] = isset( $result[2] ) ? $result[2] : '';
		}

        $tabs[] = $tab;
    }

    // Navigation
    $tabs_navigation = '<ul class="tab-content-navi">';

    $x = ( isset( $al_theme_options->identicator ) )
		? $al_theme_options->identicator . 0 : 0;
    foreach( $tabs as $tab ) {
        $x++;
        $tabs_navigation .= '<li><a open-content="tab-content-' . $x . '">' . $tab['atts']['title'] . '</a></li>';
    }
    $tabs_navigation .= '</ul>';

    // Content
    $content = '';
	$x = ( isset( $al_theme_options->identicator ) )
		? $al_theme_options->identicator . 0 : 0;
    foreach( $tabs as $tab ) {
        $x++;
        $content .= '<div class="tab-content" id="tab-content-' . $x . '">';
        $content .= do_shortcode( $tab['content'] );
        $content .= '</div>';
    }

	if( isset( $al_theme_options->identicator ) ) {
		$al_theme_options->identicator++;
	}

    $tabs_position = ( isset( $tabs_position ) ) ? $tabs_position : 'left';

    switch( $tabs_position ) {
        case 'right':
            $html = '<div class="col span_8 last">';
            $html .= $content;
            $html .= '</div>';

            $html .= '<div class="col span_4">';
            $html .= $tabs_navigation;
            $html .= '</div>';
            break;

        case 'top':
            $html = $tabs_navigation;
            $html .= $content;
            break;

        case 'bottom':
            $html = $content;
            $html .= $tabs_navigation;
            break;

        default: // left
            $html = '<div class="col span_4">';
            $html .= $tabs_navigation;
            $html .= '</div>';

            $html .= '<div class="col span_8 last">';
            $html .= $content;
            $html .= '</div>';
            break;
    }

	$html = '<div class="row">' . $html . '</div>';
    return ( $html );
}
