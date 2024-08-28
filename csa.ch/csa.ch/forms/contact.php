<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  if (isset($_POST['your-name']) && isset($_POST['your-email'])) {
    $name = $_POST['your-name'];
    $email = $_POST['your-email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $country = $_POST['your-country'];
    $message = $_POST['message'];
    $sender = "info@lucysecurity.com";
    $sendername = "Lucy Security";

    $responseKey = $_POST["g-recaptcha-response"];
    $secretKey = "6Le2flAaAAAAAKaDPM_gSfwnxC7MJX6GsOZ4_pEk";
    $ip = $_SERVER['REMOTE_ADDR'];

    require_once "../vendor/PHPMailer/PHPMailer.php";
    require_once "../vendor/PHPMailer/SMTP.php";
    require_once "../vendor/PHPMailer/Exception.php";
    require_once "../forms/configuration.php";

    $mail = new PHPMailer();

    try {
      //SMTP Settings
      $mail->isSMTP();
      $mail->CharSet = 'UTF-8';
      $mail->Host = _SMTP_HOST;
      $mail->SMTPAuth = true;
      $mail->Username = _SMTP_USER;
      $mail->Password = _SMTP_PASS;
      $mail->Port = _SMTP_PORT; //587
      $mail->SMTPSecure = "ssl"; //tls

      //Uncomment below to add CC and BCC
      //$mail->addCC("cc@example.com");
      //$mail->addBCC("bcc@example.com");
          
      //Email Settings
      $mail->isHTML(true);
      $mail->setFrom(SENDER,SENDERNAME);
      $mail->addAddress(_MAIL_TO);
      $mail->Subject = "Lucy Security - Pricing Form Submission"; //Change subject according to form usage
      $mail->Body = "Name: $name <br> Email: $email <br> Phone: $phone <br> Country: $country <br> Message: $message <br><br>--<br>This e-mail was sent from a contact form on Lucy Security";

      $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$ip";
      $response = file_get_contents($url);
      $response = json_decode($response);

      if ($response->success == true) {
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
          $autoRespond->addAddress("darkpsai@gmail.com");
          $autoRespond->Subject = "Thanks for getting in touch. We’re on it!";
          $autoRespond->Body = "Hi $name <br><br>Thank you for reaching out. We appreciate that you’ve taken the time to write us. We will do our best to respond to you within 24 hours. However, if your request can't wait, you can also reach us via info@lucysecurity.com or call +41 44 557 19 37 (Europe) or +1-512-696-1522 (USA).<br><br>Best regards,<br>Your LUCY Security team";

          $autoRespond->send();

          echo "OK";
          $responseArray = array('type' => 'success', 'message' => "OK");
          exit;
        }
        //else {
        //    $response = array('status' => 'Failed', 'statusText' => "Try again");
        //    exit;
        //}
        //exit(json_encode(array($response)));
      } else {
        throw new \Exception('ERROR TRY AGAIN' . $mail->ErrorInfo);
      }
    } catch (\Exception $e) {
      $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
    }
  }

  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    header('Content-Type: application/json');
    echo $encoded;
  } else {
    echo $responseArray['message'];
  }
?>