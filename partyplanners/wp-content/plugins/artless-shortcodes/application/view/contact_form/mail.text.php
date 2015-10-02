<?php
/**
 * Text template for the contact form email
 * Available variables:
 * $name
 * $email
 * $message
 *
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

$message = 'Contact request by '. $name .'\n\nE-Mail: '. $email . '\n\nMessage: '. $message;

return( $message );
