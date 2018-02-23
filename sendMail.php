<?php
include 'library.php';
include "classes/class.phpmailer.php"; // include the class name
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = SMTP_AUTH; // authentication enabled
$mail->SMTPSecure = SMTP_SECURE; // secure transfer enabled REQUIRED for GMail
$mail->Host = SMTP_HOST;
$mail->Port = SMTP_PORT;
$mail->IsHTML(true);
$mail->Username = SMTP_UNAME;
$mail->Password = SMTP_PWORD;
$mail->SetFrom(SMTP_UNAME);
$mail->Subject = MAIL_SUBJECT;
$mail->Body = "Name : ".$_POST['name']."<br/> <br/>Email : ".$_POST['email']."<br/> <br/>Title : ".$_POST['title']."<br/> <br/>Message : ".$_POST['message'];

$email = TO_MAILS;
$emails = explode(",", $email);
foreach ($emails as $value) {
    $mail->AddAddress($value);
}
 if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
  }
  else{
	echo "Message has been sent";
  }
?>
