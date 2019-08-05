<?php

namespace App\Models;
use App\Models\Email;

use PDO;
use App\Config;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Enquiry extends \Core\Model
{
 

    public static function create($params){ 
        $type = $params['form'];
        $name = $params['name'];
        $email = $params['email'];
        $phone = $params['phone'];
        $subject =$params['subject'];
        $messageFromClient = $params['feedback-message'];
        $base_url = BASE_URL;
        $message ="<h4>Dear Sale Team,<h4><br><p>You have the enquiry form. Please see the below form details<br><br> Type :$type,<br> Name:$name,<br> Email ID:$email,<br>Contact Number:$phone,<br>Message:$messageFromClient </p><br><h5>Thanks,<br><br>sincerely,<br>Truksindia Sales Team,<br>+7075575239</h5>"; 
        $body ="<img src=$base_url.'img/Truksindia-logo.png' class='img-fluid'><br> <h3>Dear.$name </h3><br><br><p>You've successfully submitted thr enquiry. We'll be in touch soon with more info about all the amazing things.</p><br><br><h5>Thanks,</h5><br><br><h5>sincerely,<br>Truksindia Sales Team,<br>+7075575239</h5>";
        $mail = new Email();
        $result = $mail->sendMail($email,$name,$body,$subject,$message);
        if($result){
              try {
                $db = static::getDB();

                $stmt = "INSERT INTO Enquiries (type, name, phone,email,subject,message)
                        VALUES ('".$type."','". $name."',". $phone.",'".$email."','".$subject."','".$message."')";
                if ($db->query($stmt))
                return $db->lastInsertId();
            
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function getAll()
    {
        //$host = 'localhost';
        //$dbname = 'mvc';
        //$username = 'root';
        //$password = 'secret';
    
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content FROM post ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}