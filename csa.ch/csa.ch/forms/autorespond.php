<?php
use PHPMailer\PHPMailer\PHPMailer;

function autoReply() {
  $name = $_POST['your-name'];
  $fname = $_POST['first-name'];
  $lname = $_POST['last-name'];
  $email = $_POST['your-email'];

  require_once "../vendor/PHPMailer/PHPMailer.php";
  require_once "../vendor/PHPMailer/SMTP.php";
  require_once "../vendor/PHPMailer/Exception.php";
  require_once "../forms/configuration.php";

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
}
?>