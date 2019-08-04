<?php

namespace App\Models;

use PDO;
use App\Config;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Users extends \Core\Model
{
 

    public static function create($params){ 
        $name = $params['name'];
        $email = $params['email'];
        $phone = $params['phone'];
        $password = $params['password'];
        $newpassword = password_hash($password, PASSWORD_DEFAULT);
//        $mail = new PHPMailer;
//        $mail->isSMTP();
//        $mail->SMTPAuth = true; 
//        $mail->Username = 'ganesh.golla435@gmail.com';
//        $mail->Password = 'ganesh435';                           // SMTP password
//        $mail->SMTPSecure = 'tls';     
//            $mail->setFrom('ganesh.golla435@gmail.com', 'Ganesh');
//            $mail->addAddress($email, $name);
//            $mail->Subject  = $subject;
//            $mail->Body     = $message;
//            if(!$mail->send()) {
//              echo 'Message was not sent.';
//              echo 'Mailer error: ' . $mail->ErrorInfo;
//            } else {
//              echo 'Message has been sent.';
//            }

        
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $stmt = "INSERT INTO Users (name,email, phone,password)
                        VALUES ('". $name."','".$email."',". $phone.",'".$newpassword."')";
            if ($db->query($stmt))
            return $db->lastInsertId();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function getByEmail($params){ 
        $email = $params;
                
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $stmt = "SELECT * FROM Users WHERE email='".$email."'";
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
}