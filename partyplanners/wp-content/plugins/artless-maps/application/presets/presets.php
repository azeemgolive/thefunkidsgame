<?php
/**
 * @package    artless Maps
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

$presets = array();

$dir = dirname(__FILE__);

$files = array(
	$dir . '/flato.php',
	$dir . '/cobalt.php',
    $dir . '/gowalla.php',
    $dir . '/subtle-grayscale.php',
    $dir . '/just-places.php',
    $dir . '/midnight-commander.php'
);

foreach( $files as $file ) {

    if( is_file( $file ) ) {
        $presets[] = include( $file );
    }
}

return( $presets );