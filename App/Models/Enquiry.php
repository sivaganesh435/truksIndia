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
//        print_r($params);
//        die();
        $type = $params['type'];
        $name = $params['fullname'];
        $email = $params['email'];
        $phone = $params['phone'];
        $subject =$params['subject'];
        $messageFromClient = $params['feedback-message'];
        $base_url = BASE_URL;
        $message ="<h4>Dear Sale Team,<h4><br><p>You have the enquiry form. Please see the below form details<br><br> Type :$type,<br> Name:$name,<br> Email ID:$email,<br>Contact Number:$phone,<br>Message:$messageFromClient </p><br><h5>Thanks,<br><br>sincerely,<br>Truksindia Sales Team,<br>+7075575239</h5>"; 
        $body ="<img src='".$base_url."' img/Truksindia-logo.png' class='img-fluid'><br> <h3>Dear $name </h3><br><br><p>You've successfully submitted thr enquiry. We'll be in touch soon with more info about all the amazing things.</p><br><br><h5>Thanks,</h5><br><br><h5>sincerely,<br>Truksindia Sales Team,<br>+7075575239</h5>";
        $mail = new Email();
        $result = $mail->sendMail($email,$name,$body,$subject,$message);
        if($result){
              try {
                $db = static::getDB();

                $stmt = "INSERT INTO Enquiries (type, name, phone,email,subject,message)
                        VALUES ('".$type."','". $name."',". $phone.",'".$email."','".$subject."','".$messageFromClient."')";
                if ($db->query($stmt))
                return $db->lastInsertId();
            
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

     public static function getAll($param){
//         print_r($param);
//         die();
         $var = ($param-1)*5;
        
        try {
            $db = static::getDB();

            $stmt = "SELECT * FROM Enquiries LIMIT ".$var.", 5" ;
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
     
     public static function getPage(){
        
        try {
            $db = static::getDB();

            $stmt = "SELECT COUNT(*) FROM  Enquiries" ;
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
     
     public static function getEnquirybyId($params){ 
        $id = $params;
                
        try {
            $db = static::getDB();
            $stmt = "SELECT * FROM Enquiries WHERE id='".$id."'";
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}