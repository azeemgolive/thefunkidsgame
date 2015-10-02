<?php
/**
 * @package    artless Shortcodes
 * @author     Christian Glingener <glingener.christian@gmail.com>
 * @version    1.0.0
 * @copyright  2014 artlessthemes.com
 * @link       http://artlessthemes.com/
 */
add_action('wp_ajax_al_ajax_contact_form', 'al_ajax_contact_form');
add_action('wp_ajax_nopriv_al_ajax_contact_form', 'al_ajax_contact_form');

function al_ajax_contact_form() {

    global $al_theme_options;

	ob_start();
    if( $al_theme_options->getOption('al_sc_contact_to') ) {
        $addresses = explode( ';', $al_theme_options->getOption('al_sc_contact_to') );
        $addresses = str_replace( ' ', '', $addresses );

        foreach( $addresses as $address ) {
            $toAddresses[] = $address;
        }
    } else {
        $toAddresses[] = get_bloginfo( 'admin_email' );
    }

    $subject = $al_theme_options->getOption( 'al_sc_contact_subject' )
        ?  $al_theme_options->getOption( 'al_sc_contact_subject' ) : 'Contact from [name]';

    $subject = str_replace( '[name]', $_POST['name'], $subject );

    $from = $al_theme_options->getOption('al_sc_contact_from_name')
        ? $al_theme_options->getOption('al_sc_contact_from_name') : $_POST['name'];

    $fromAddress = $al_theme_options->getOption('al_sc_contact_from_address')
        ? $al_theme_options->getOption('al_sc_contact_from_address') : $_POST['email'];

    $msg_success = $al_theme_options->getOption('al_sc_contact_msg_success')
        ? $al_theme_options->getOption('al_sc_contact_msg_success') : 'Thanks for your request.';

    $msg_error_name = $al_theme_options->getOption('al_sc_contact_msg_error_name')
        ? $al_theme_options->getOption('al_sc_contact_msg_error_name') : 'Your Name is required.';

    $msg_error_email = $al_theme_options->getOption('al_sc_contact_msg_error_email')
        ? $al_theme_options->getOption('al_sc_contact_msg_error_email') : 'Your E-Mail is required.';

    $msg_error_message = $al_theme_options->getOption('al_sc_contact_msg_error_message')
        ? $al_theme_options->getOption('al_sc_contact_msg_error_message') : 'Message is required.';

    $messages = array(
        'success'               => $msg_success,
        'error_name_empty'      => $msg_error_name,
        'error_email_empty'     => $msg_error_email,
        'error_message_empty'   => $msg_error_message,
        'error_mail_send'       => 'Sorry! System Error. Please us our E-Mail: <a href=\'mailto:'.$toAddresses[0].'\'>'.$toAddresses[0].'</a>',
    );

    $smtp = array(
        'activate'  => 0,
        'auth'      => 1,
        'host'      => 'smtp.yourdomain.com',
        'user'      => 'youremail@yourdomain.com',
        'password'  => 'yourpassword',
        'port'      => 25
    );

	if( $al_theme_options->getOption('al_sc_contact_smtp') ) {
		$smtp = array(
			'activate'  => 1,
			'auth'      => 1,
			'host'      => $al_theme_options->getOption('al_sc_contact_smtp_host'),
			'user'      => $al_theme_options->getOption('al_sc_contact_smtp_user'),
			'password'  => $al_theme_options->getOption('al_sc_contact_smtp_password'),
			'port'      => $al_theme_options->getOption('al_sc_contact_smtp_port'),
		);
	}

    $return = array();
    $error = FALSE;

    $FilePhpMailer      = AL_SC_DIR. 'library/phpmailer/phpmailer.php';
    $FilePhpMailerSmtp  = AL_SC_DIR. 'library/phpmailer/phpmailer.smtp.php';
    $FileTemplateHtml   = AL_SC_DIR. 'application/view/contact_form/mail.html.php';
    $FileTemplateText   = AL_SC_DIR. 'application/view/contact_form/mail.text.php';

    // Check PHPMailer File
    if( !is_file( $FilePhpMailer ) )
        $error[] = 'Server Error: PHPMailer File not found.';

    // Check PHPMailerSMTP File if SMTP active
    if( ( $smtp['activate'] == 1) AND ( !is_file( $FilePhpMailerSmtp ) ) )
        $error[] = 'Server Error: PHPMailerSMTP File not found.';

    // Check Layout Files
    if( ( !is_file( $FileTemplateHtml ) ) OR ( !is_file( $FileTemplateText ) ) )
        $error[] = 'Server Error: Layout Files not Found';

    // If no Server Errors
    if( $error == FALSE ) {

        // Check Name
        if( empty( $_POST['name'] ) )
            $error[] = $messages['error_name_empty'];

        // Check Email
            if( empty( $_POST['email'] ))
                $error[] = $messages['error_email_empty'];

        // Check Message
            if( empty( $_POST['message'] ))
                $error[]= $messages['error_message_empty'];

    }


    // $error to $return['errorsMsg']
    if( $error != FALSE ) {

        $return['errorMsg'] = '';

        foreach( $error as $msg ) {
            $return['errorMsg'] .= $msg . '<br />';
        }

    }

    // if no error
    if( !isset( $return['errorMsg'] ) ) {

        require_once( $FilePhpMailer );

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $mail = new PHPMailer();

        $mail->IsHTML(true);
        $mail->CharSet  = 'UTF-8';

        // Subject
        $subject = str_replace( '[username]', $name, $subject );
        $subject = str_replace( '[useremail]', $email, $subject );

        $mail->Subject  = $subject;

        // From
        $from = str_replace( '[username]', $name, $from );
        $fromAddress = str_replace( '[useremail]', $email, $fromAddress );

        $mail->SetFrom( $fromAddress, $from );

        // Body
        $mail->Body = include( $FileTemplateHtml );
        $mail->AltBody = include( $FileTemplateText );

        // SMTP
        if( $smtp['activate'] == 1 ) {



            $mail->IsSMTP();
	        $mail->SMTPDebug  = 2;
            $mail->Host = $smtp['host'];
            $mail->Port = $smtp['port'];

	        if( $al_theme_options->getOption('al_sc_contact_smtp_secure_protocol') && $al_theme_options->getOption('al_sc_contact_smtp_secure_protocol') != 'none' ) {
		        $mail->SMTPSecure = $al_theme_options->getOption('al_sc_contact_smtp_secure_protocol');
	        }

            if( ! empty( $smtp['user'] ) && ! empty( $smtp['password'] ) ) {

                $mail->SMTPAuth = TRUE;
                $mail->Username = $smtp['user'];
                $mail->Password = $smtp['password'];

            }
        }

        // send Mail
        $one_email_success = 0;
        $email_send_error = 0;

        foreach( $toAddresses as $address ) {

            $mail->AddAddress( $address );

            if( $mail->Send() ) {

                $one_email_success = 1;
                $return['successMsg'] = $messages['success'];

            }

            $mail->ClearAddresses();
        }

        if( $one_email_success == 0 ) {
            $return['errorMsg'] = $messages['error_mail_send'];
        }

    }
	if( $al_theme_options->getOption('al_sc_contact_smtp_debug') ) {
		$return['SMTPDebug'] = ob_get_contents();
	}
	ob_end_clean();

    // feedback
    echo json_encode( $return );
    die();
}

