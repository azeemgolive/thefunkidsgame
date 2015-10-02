<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
add_filter( 'the_content', 'al_clean_columns' );

/*
 * Remove </p> & <br /> after opening columns
 * Remove <p> before opening column
 * Remove <p> before closing column
 * Remove </p> & <br /> after closing columns
 */
function al_clean_columns( $content ) {

	// array of shortcodes, which affected
	$shortcodes = array(
        'box',
		'one_one',
		'one_half',
		'one_third',
		'two_third',
		'one_fourth',
		'two_fourth',
		'three_fourth',
	);

	$columns = join( "|" , $shortcodes );

    // opening tag
    $rep = preg_replace("#(<p>)?\[($columns)(\s[^\]]+)?\](<\/p>|<br \/>)?#","[$2$3]",$content);

    //closing tag
    $rep = preg_replace("#(<p>)?\[\/($columns)](<\/p>|<br \/>)?#","[/$2]",$rep);

	// empty paragraph
	$rep = preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $rep);

	return $rep;

}