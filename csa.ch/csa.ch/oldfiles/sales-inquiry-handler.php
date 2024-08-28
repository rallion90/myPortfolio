<?php
	$name = $_POST['your-name'];
	$visitor_email = $_POST['your-email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$country = $_POST['your-country'];
	$message = $_POST['message'];
	
	$email_from = 'info@lucysecurity.com';
	
	$email_subject = 'Test Form';
	
	$email_body = "Name: $name.\n".
					"Email: $visitor_email.\n".
						"Message: $message.\n";
						
	$to = "sayasalvin@gmail.com";
	
	$headers = "From: $email_from \r\n;";
	
	$headers .= "Reply-To: $visitor_email \r\n";
	
	mail($to,$email_subject,$email_body,$headers);
	
	header("Location: pricing.html");
?>