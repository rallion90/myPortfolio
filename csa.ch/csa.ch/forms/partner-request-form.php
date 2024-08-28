<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['first-name']) && isset($_POST['your-email'])) {
        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $company = $_POST['company'];
        $email = $_POST['your-email'];
        $phone = $_POST['phone'];
        $industry = $_POST['industry'];
        $website = $_POST['website'];
        $country = $_POST['your-country'];
        $state = $_POST['state'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];
        $description = $_POST['description'];
        $revenue = $_POST['revenue'];
        $employees = $_POST['numberofemployees'];
        $salesreps = $_POST['salesrep'];
        $supporters = $_POST['supporters'];
        $keypartners = $_POST['keypartners'];
        $primarymarket = $_POST['primarymarket'];
        $dealinprogress = $_POST['DealinProgress'];
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
        $mail->Subject = "Lucy Security - Partner Request Form Submission"; //Change subject according to form usage

        $mail->Body = "<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='120'>Name: </td><td>$fname $lname</td></tr><tr><td>Company: </td><td>$company</td></tr><tr><td>E-mail: </td><td>$email</td></tr><tr><td>Phone: </td><td>$phone</td></tr><tr><td>Industry: </td><td>$industry</td></tr><tr><td>Website: </td><td>$website</td></tr><tr><td>Country, State: </td><td>$country, $state</td></tr><tr><td>Street Address: </td><td>$street</td></tr><tr><td>City, ZIP: </td><td>$city, $zip</td></tr><tr><td>Description: </td><td>$description</td></tr><tr><td>Annual Revenue: </td><td>$revenue</td></tr><tr><td>Number of Employees: </td><td>$employees</td></tr><tr><td>Number of Sales Reps: </td><td>$salesreps</td></tr><tr><td>Number of Supporters: </td><td>$supporters</td></tr><tr><td>Key Partners: </td><td>$keypartners</td></tr><tr><td>Primary Market: </td><td>$primarymarket</td></tr><tr><td>Deal in Progress: </td><td>$dealinprogress</td></tr></table><br><br>--<br>This e-mail was sent from a contact form on Lucy Security";

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

                //echo "OK";

                echo "OK";
                exit;
            }
            /*else {
                //$response = array('status' => 'Failed', 'message' => "Try again");
                $response = "failed" . $mail->ErrorInfo;
            }*/
            //exit(json_encode(array($response)));
        }
    }
?>