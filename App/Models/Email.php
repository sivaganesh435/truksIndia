<?php

namespace App\Models;

use PDO;
use App\Config;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Email extends \Core\Model
{
public function sendMail($email,$name,$body,$subject,$message){

     $mail2 = new PHPMailer();
        $mail2->IsSMTP();                                     // Set mailer to use SMTP
        $mail2->Host = 'smtp.gmail.com';
        $mail2->SMTPAuth = true; 
        $mail2->Username = 'info@truksindia.com';
        $mail2->Password = 'Truksindia@123$';                           // SMTP password
        $mail2->SMTPSecure = 'tls';   
        $mail2->IsHTML(true); 
        $mail2->Port = 587;   
        $mail2->setFrom(FromMail, FromName);
        $mail2->addAddress($email, $name);
        $mail2->Subject  = FromName;
        $mail2->Body     = $body;
        if(!$mail2->send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail2->ErrorInfo;
        } else {
              
        }
        
        $mail = new PHPMailer();
        $mail->IsSMTP();                                     // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Username = 'info@truksindia.com';
        $mail->Password = 'Truksindia@123$';                           // SMTP password
        $mail->SMTPSecure = 'tls';     
        $mail->Port = 587;   
        $mail->IsHTML(true); 
        $mail->setFrom($email, $name);
        $mail->addAddress(orgMail, FromName);
        $mail->Subject  = $subject;
        $mail->Body     = $message;
        if(!$mail->send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
            return true;
        }
    }
}