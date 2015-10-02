<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */

add_shortcode( 'contact_form', 'al_contact_form' );

function al_contact_form( $atts ) {

    global $al_theme_options;

	$function_file = AL_SC_DIR . 'application/functions/contact_form.php';

	if( !is_file( $function_file )) {
		return ('Function for Contact Form could not be loaded.<br />' . $function_file );
	}

    $hide_form = '';
    $input_color = '';


    $placeholder_name = 'Your Name';
    $placeholder_email = 'Your E-Mail Address';
    $placeholder_message = 'Your Message';
    $label_submit = 'Submit';

    if( isset( $al_theme_options ) ) {

        $hide_form = $al_theme_options->getOption('al_sc_contact_hide_after_success')
            ? ' class="al-contact-form-hide"' : '';

        $input_color = $al_theme_options->getOption('al_sc_contact_input_color')
            ? ' style="color: '.$al_theme_options->getOption('al_sc_contact_input_color').' !important;"' : '';

        $placeholder_name = $al_theme_options->getOption( 'al_sc_contact_placeholder_name' )
            ? $al_theme_options->getOption( 'al_sc_contact_placeholder_name' ) : $placeholder_name;

        $placeholder_email = $al_theme_options->getOption( 'al_sc_contact_placeholder_email' )
            ? $al_theme_options->getOption( 'al_sc_contact_placeholder_email' ) : $placeholder_email;

        $placeholder_message = $al_theme_options->getOption( 'al_sc_contact_placeholder_message' )
            ? $al_theme_options->getOption( 'al_sc_contact_placeholder_message' ) : $placeholder_message;

        $label_submit = $al_theme_options->getOption( 'al_sc_contact_submit_label' )
            ? $al_theme_options->getOption( 'al_sc_contact_submit_label' ) : $label_submit;
    }


	$html = '<div class="contact-form">
		<div id="contact-error" class="alert-box error" style="display: none;">
			<span>Error Message</span>
			<a class="close">x</a>
		</div>
		<div id="contact-success" class="alert-box success" style="display: none;">
			<span>Success Message</span>
			<a class="close">x</a>
		</div>
		<form id="contact-form"'. $hide_form .' method="POST">
			<input name="action" type="hidden" value="al_ajax_contact_form" />
			<span class="al-hidden ie8-visible">'.$placeholder_name.'</span>
			<input name="name" type="text" class="text cleartext" placeholder="'.$placeholder_name.'"'.$input_color.' />
			<span class="al-hidden ie8-visible">'.$placeholder_email.'</span>
			<input name="email" type="email" class="text cleartext" placeholder="'.$placeholder_email.'"'.$input_color.' />
			<span class="al-hidden ie8-visible">'.$placeholder_message.'</span>
			<textarea name="message" placeholder="'.$placeholder_message.'"'.$input_color.'></textarea>
			<div class="ie8-submit">
				<input type="submit" class="submit" value="'.$label_submit.'" />
			</div>
		</form>
	</div>';

	return $html;
}