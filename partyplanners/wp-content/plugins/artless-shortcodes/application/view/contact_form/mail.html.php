<?php
/**
 * Html template for the contact form email
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

$message = '<html>
<body bgcolor="#d9d9d9" style="margin:0;padding:10px 0 40px 0;">
<table width="100%" border="0" style="border:none;">
    <tr align="center">
        <td width="610">
            <table width="610" border="0" style="border:none;">
                <tr>
                    <td bgcolor="#ffffff">
                        <h1 style="font-family:Arial;font-size:18px;line-height:18px; padding: 30px 30px 0 30px;">
                            '. $subject .'
                        </h1>
                        <p style="font-family:Arial;font-size:13px;line-height:18px; padding: 30px;">
                            E-Mail: '. $email . '<br />
                            Message:<br />'. nl2br( $message ) .'
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>';

return( $message );
