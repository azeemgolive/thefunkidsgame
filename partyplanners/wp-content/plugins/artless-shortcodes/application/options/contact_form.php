<?php

function al_shortcodes_contact_form() {
    $options = array(
        'title' => __('Contact Form', 'redux-framework-demo'),
        'icon' => 'el-icon-envelope',
        'fields' => array(

            array(
                'id' 		=> 'al_sc_contact_hide_after_success',
                'type' 		=> 'switch',
                'title' 	=> __('Hide Contact Form After Sending', 'artless' ),
                'on' 		=> 'Yes',
                'off' 		=> 'No',
            ),

            array(
                'id' 		=> 'al_sc_contact_input_color',
                'type' 		=> 'color',
                'title' 	=> __('Adjust Input Color', 'artless'),
				'default'	=> '',
            ),

			array(
				'id' 		=> 'al_sc_contact_input_background_color',
				'type' 		=> 'color',
				'title' 	=> __('Adjust Input Background Color', 'artless'),
				'default' 	=> ''
			),

            array(
                'id' 		=> 'al_sc_contact_to',
                'type' 		=> 'text',
                'title' 	=> __('To Address', 'artless' ),
                'desc'      => __( 'Leave blank and the default admin e-mail will be used.', 'artless' )
            ),

            array(
                'id' 		=> 'al_sc_contact_from_name',
                'type' 		=> 'text',
                'title' 	=> __( 'From Name', 'artless' ),
                'desc'      => __( 'Leave blank and the visitors name will be used.', 'artless' ),
            ),

            array(
                'id' 		=> 'al_sc_contact_from_address',
                'type' 		=> 'text',
                'title' 	=> __( 'From Address', 'artless' ),
                'desc'      => __( 'Leave blank and the visitors e-mail will be used.', 'artless' ),
                'validate'  => 'email',
            ),

            array(
                'id' 		=> 'al_sc_contact_subject',
                'type' 		=> 'text',
                'title' 	=> __( 'Subject', 'artless' ),
                'desc'      => __( '[name] is a placeholder for the visitors name.', 'artless' ),
                'placeholder'   => 'Contact from [name]',
            ),

            array(
                'id' 		=> 'al_sc_contact_submit_label',
                'type' 		=> 'text',
                'title' 	=> __( 'Label Submit Button', 'artless' ),
                'placeholder'   => 'Submit',
            ),

            array(
                'id' 		=> 'al_sc_contact_placeholder_name',
                'type' 		=> 'text',
                'title' 	=> __( 'Input Placeholder Name', 'artless' ),
                'placeholder'   => 'Your Name',
            ),

            array(
                'id' 		=> 'al_sc_contact_placeholder_email',
                'type' 		=> 'text',
                'title' 	=> __( 'Input Placeholder E-Mail', 'artless' ),
                'placeholder'   => 'Your E-Mail Address',
            ),

            array(
                'id' 		=> 'al_sc_contact_placeholder_message',
                'type' 		=> 'text',
                'title' 	=> __( 'Input Placeholder Message', 'artless' ),
                'placeholder'   => 'Your Message',
            ),

            array(
                'id' 		=> 'al_sc_contact_msg_success',
                'type' 		=> 'text',
                'title' 	=> __( 'Message Success', 'artless' ),
                'placeholder'   => 'Thanks for your request.',
            ),

            array(
                'id' 		=> 'al_sc_contact_msg_error_name',
                'type' 		=> 'text',
                'title' 	=> __( 'Message Error No Name', 'artless' ),
                'placeholder'   => 'Your Name is required.',
            ),

            array(
                'id' 		=> 'al_sc_contact_msg_error_email',
                'type' 		=> 'text',
                'title' 	=> __( 'Message Error No E-Mail', 'artless' ),
                'placeholder'   => 'Your E-Mail is required.',
            ),

            array(
                'id' 		=> 'al_sc_contact_msg_error_message',
                'type' 		=> 'text',
                'title' 	=> __( 'Message Error No Message', 'artless' ),
                'placeholder'   => 'Message is required',
            ),

	        array(
		        'id' 		=> 'al_sc_contact_smtp',
		        'type' 		=> 'switch',
		        'title' 	=> __('Use SMTP for sending Mails', 'artless' ),
		        'on' 		=> 'Yes',
		        'off' 		=> 'No',
	        ),

	        array(
		        'id'       => 'al_sc_contact_smtp_host',
		        'type'     => 'text',
		        'required' => array( 'al_sc_contact_smtp', '=', '1' ),
		        'title'    => __( 'SMTP Host', 'artless' ),
	        ),

	        array(
		        'id'       => 'al_sc_contact_smtp_user',
		        'type'     => 'text',
		        'required' => array( 'al_sc_contact_smtp', '=', '1' ),
		        'title'    => __( 'SMTP User', 'artless' ),
	        ),

	        array(
		        'id'       => 'al_sc_contact_smtp_password',
		        'type'     => 'text',
		        'required' => array( 'al_sc_contact_smtp', '=', '1' ),
		        'title'    => __( 'SMTP Password', 'artless' ),
	        ),

	        array(
		        'id'       => 'al_sc_contact_smtp_port',
		        'type'     => 'text',
		        'required' => array( 'al_sc_contact_smtp', '=', '1' ),
		        'title'    => __( 'SMTP Port', 'artless' ),
		        'default'  => '25'
	        ),

	        array(
		        'id'       => 'al_sc_contact_smtp_secure_protocol',
		        'type'     => 'select',
		        'required' => array( 'al_sc_contact_smtp', '=', '1' ),
		        'title'    => __( 'SMTP Secure Protocol', 'artless' ),
		        'subtitle' => __( 'Check if your server supports it.' ),
		        'options'  => array(
			        'none' => 'None',
			        'tls'  => 'TLS',
			        'ssl'  => 'SSL',
		        ),
		        'default'  => 'none'
	        ),

	        array(
		        'id'       => 'al_sc_contact_smtp_debug',
		        'type'     => 'switch',
		        'required' => array( 'al_sc_contact_smtp', '=', '1' ),
		        'title'    => __( 'SMTP Debug', 'artless' ),
		        'subtitle' => __( 'Activates SMTP Debug output to console'),
		        'on' 		=> 'Yes',
		        'off' 		=> 'No',
	        ),

        )
    );

    return $options;
}


if( class_exists( 'Artless_Theme_Options' )) {

    if( method_exists( 'Artless_Theme_Options', 'addOption' )) {
        Artless_Theme_Options::addOption( al_shortcodes_contact_form(), 50 );
    }

}