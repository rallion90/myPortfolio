<?php // Check if form was submitted:

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['your-email'])) {
    $name = $_POST['your-name'];
    $email = $_POST['your-email'];
    $company = $_POST['your-company'];
    $purpose = $_POST['purpose'];
    $sender = "info@lucysecurity.com";
    $sendername = "Lucy Security";

    require_once "../vendor/PHPMailer/PHPMailer.php";
    require_once "../vendor/PHPMailer/SMTP.php";
    require_once "../vendor/PHPMailer/Exception.php";
    require_once "../forms/configuration.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = _SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = _SMTP_USER;
    $mail->Password = _SMTP_PASS;
    $mail->Port = _SMTP_PORT; //587
    $mail->SMTPSecure = "ssl"; //tls

    //Configure in configuration.php
    $mail->addCC(MAIL_CC_1);
    $mail->addCC(MAIL_CC_2);
    $mail->addCC(MAIL_CC_3);

    //Uncomment below to add BCC - Configure in configuration.php
    //$mail->addBCC(MAIL_BCC_1);
    //$mail->addBCC(MAIL_BCC_2);
    //$mail->addBCC(MAIL_BCC_3);
        
    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom(SENDER,SENDERNAME);
    $mail->addAddress(_MAIL_TO);
    $mail->Subject = "Lucy Security - Book a Demo Form Submission"; //Change subject according to form usage
        
    $mail->Body = "Name: $name <br> Email: $email <br> Company: $company <br> Purpose: $purpose <br><br>--<br>This e-mail was sent from a contact form on cyber-security-awareness.ch";

    // Build POST request:
    $recaptcha_response;
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => SECRETKEYV3,
        'response' => $recaptcha_response
    );
    $options = array(
        'http' => array (
            'header' => 'Content-Type: application/x-www-form-urlencoded\r\n',
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $recaptcha = json_decode($response);

    $error_output = '';
    $success_output = '';

    // Take action based on the score returned:
    if ($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == 'book_demo_submit') {
        // Verified - send email
        //echo json_encode(array('success' => 'true'));
        if ($mail->send()){
            $autoRespond = new PHPMailer();
            $autoRespond->IsSMTP();
            $autoRespond->CharSet = 'UTF-8';
            $autoRespond->Host = _SMTP_HOST;
            $autoRespond->SMTPAuth = true;
            $autoRespond->Username = _SMTP_USER;
            $autoRespond->Password = _SMTP_PASS;
            $autoRespond->Port = _SMTP_PORT; //587
            $autoRespond->SMTPSecure = "ssl"; //tls

            $autoRespond->isHTML(true);
            $autoRespond->setFrom(SENDER,SENDERNAME);
            $autoRespond->addAddress($email);
            $autoRespond->Subject = "Thanks for getting in touch. We’re on it!";
            $autoRespond->Body = "Hi $name <br><br>Thank you for reaching out. We appreciate that you’ve taken the time to write us. We will do our best to respond to you within 24 hours. However, if your request can't wait, you can also reach us via info@lucysecurity.com or call +41 44 557 19 37 (Europe) or +1-512-696-1522 (USA).<br><br>Best regards,<br>Your LUCY Security team";

            $autoRespond->send();

            $success_output = "Your message sent successfully";
        }
    } else {
        // Not verified - show form error
        //echo json_encode(array('success' => 'false'));
        $error_output = "Something went wrong. Please try again or refresh the page.";
    }

    $output = array(
        'error' => $error_output,
        'success' => $success_output
    );

    echo json_encode($output);

} ?>