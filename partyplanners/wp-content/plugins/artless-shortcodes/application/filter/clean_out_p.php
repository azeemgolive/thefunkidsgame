<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
/*
 * Remove <p> around SPECIFIC shortcodes
 *
 * Thanks to bitfade
 * @link https://gist.github.com/bitfade/4555047
 */
add_filter( "the_content", "al_clean_out_p" );

function al_clean_out_p( $content ) {

    // array of shortcodes, which affected
    $shortcodes = array(
        'center',
		'fa',
		'button',
		'spaceless',
        'percent_bar',
		'price_box',
        'toggle_box',
    //    'one_one',
    //    'one_half',
    //    'one_third',
    //    'two_third',
    //    'one_fourth',
    //    'two_fourth',
    //    'three_fourth',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
		'quote_slide',
		'quote_slider',
        'alert',
        'callout',
		'tab_content_box',
		'tab_content',
		'spacer'
    );

    $block = join( "|" , $shortcodes );

	// clean out span/p arround shortcodes
	//$pattern = '#(<span[^>]*>|<p>)\s?\[(\/?)('.$block.')(\s[^\]]+)?\](<\/span>|<\/p>)#';
	//$rep = preg_replace( $pattern, "[$4$2$3]", $content );
	//$rep = preg_replace( $pattern, "[$4$2$3]", $rep );

    // opening tag
    $rep = preg_replace("#(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?#","[$2$3]",$content);

    // closing tag
    $rep = preg_replace("#(<p>)?\[\/($block)](<\/p>|<br \/>)#","[/$2]",$rep);

	// clean out empty span
	//$rep = preg_replace("/<span[^>]*>[\s|&nbsp;]*<\/span>/", '', $rep);
    // empty paragraph
	$rep = preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $rep);

    return $rep;

}