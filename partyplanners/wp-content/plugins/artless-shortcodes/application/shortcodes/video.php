<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'al_video', 'al_video' );

function al_video( $atts, $content ) {

	extract( shortcode_atts( array(
		'id' => false,
		'autoplay' => false,
		'provider' => false,
		'type'	=> false,
		'width' => '500px',
		'height' => '500px'
	), al_normalize_atts( $atts ) ) );

	if( !$provider ) {
		$provider = $type;
	}

	$autoplay = ( $autoplay ) ? 'autoplay=1&amp;' : '';
	$id = ( $id and !empty( $id ) ) ? $id : false;
	$provider = ( $provider == 'youtube' or $provider == 'vimeo' ) ? $provider : false;

	if( $id and $provider ) {
		switch( $provider ) {
			case 'youtube':
				$src = 'http://www.youtube.com/embed/'.$id.'?HD=1;rel=0;showinfo=0';
				break;

			case 'vimeo':
				$src = 'http://player.vimeo.com/video/'.$id.'?'.$autoplay.'byline=0&amp;portrait=0&amp;title=0';
				break;
		}
		$html = '<iframe class="al-video" data-sc-after-preload-src="' . $src . '" width="' . $width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	} else {
		$html = '';
	}
	return $html;
}