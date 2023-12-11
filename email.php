<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer(true);
$alert = '';

    // Get form data
    $subject = htmlentities($_POST['subject']);
    $firstName = htmlentities ($_POST['firstName']);
    $lastName = htmlentities ($_POST['lastName']);
    $message = htmlentities($_POST['message']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $name = htmlentities($_POST['name']); 
      

    // SMTP configuration
    $smtp_host = "smtp.gmail.com";
    $smtp_port = 587;
    $smtp_username = 'preconceptionc@gmail.com';
    $smtp_password = "rqgowdpammzklpzi";
        
    try {
      $mail->isSMTP();
      $mail->Host = $smtp_host;
      $mail->SMTPAuth = true;
      $mail->Username = $smtp_username;
      $mail->Password = $smtp_password;
      $mail->Port = $smtp_port;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
      $mail->isHTML(true);
      $mail->setFrom($email, $name);
      $mail->addAddress('preconceptionc@gmail.com');
      $mail->Subject = $subject;
      $mail->Body = "Phone: $phone <br>Email: $email<br> $message";
      $mail->send();
      echo "true";

    } catch (Exception $e){
      $errorMessage = $e->getMessage();
      echo $errorMessage;
    }
  
  
    