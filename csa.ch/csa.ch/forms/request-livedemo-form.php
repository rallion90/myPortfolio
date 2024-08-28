<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['first-name']) && isset($_POST['your-email'])) {
        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $company = $_POST['your-company'];
        $email = $_POST['your-email'];
        $phone = $_POST['phone'];
        $jobtitle = $_POST['jobtitle'];
        $country = $_POST['your-country'];
        $usage = $_POST['IntendedUsageofLUCY'];
        $message = $_POST['message'];
        $sender = "info@lucysecurity.com";
        $sendername = "Lucy Security";

        $secretKey = "6Le2flAaAAAAAKaDPM_gSfwnxC7MJX6GsOZ4_pEk";

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
        $mail->Subject = "Lucy Security - Request a Demo Server Form Submission"; //Change subject according to form usage
        
        $mail->Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='100'>Name: </td><td>$fname $lname</td></tr><tr><td>Company: </td><td>$company</td></tr><tr><td>E-mail: </td><td>$email</td></tr><tr><td>Phone: </td><td>$phone</td></tr><tr><td>Job Title: </td><td>$jobtitle</td></tr><tr><td>Country: </td><td>$country</td></tr><tr><td>Intended Usage of Lucy: </td><td>$usage</td></tr><tr><td>Message: </td><td>$message</td></tr></table><br><br>--<br>This e-mail was sent from a contact form on Lucy Security";

        //Captcha
        //$response = $_POST["g-recaptcha-response"];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => SECRETKEY,
            'response' => $_POST["g-recaptcha-response"]
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if ($captcha_success->success==false) {
            echo "Please complete the captcha";
        } else if ($captcha_success->success==true) {
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
                $autoRespond->Body = "Hi $fname <br><br>Thank you for reaching out. We appreciate that you’ve taken the time to write us. We will do our best to respond to you within 24 hours. However, if your request can't wait, you can also reach us via info@lucysecurity.com or call +41 44 557 19 37 (Europe) or +1-512-696-1522 (USA).<br><br>Best regards,<br>Your LUCY Security team";

                $autoRespond->send();

                echo "OK";
                exit;
            }
            //else {
            //    $response = array('status' => 'Failed', 'message' => "Try again");
            //}
            //exit(json_encode(array($response)));
        }
    }
?>