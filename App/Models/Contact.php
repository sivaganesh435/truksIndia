<?php

namespace App\Models;
use App\Models\Email;
use PDO;
include 'Email.php';
use App\Config;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Contact extends \Core\Model
{
 

    public static function create($params){ 
        
        $name = $params['contact-name'];
        $email = $params['contact-email'];
        $phone = $params['contact-phone'];
        $company = $params['contact-company'];
        $message = $params['contact-message'];
        $body = "Thank you, Your response record successfully our agent contact you soon!";
        $mail = new Email();
        $result = $mail->sendMail($email,$name,$body,$company,$message);
        if($result){
            try {
                //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $db = static::getDB();

                $stmt = "INSERT INTO Contacts (name,email, phone,company,message)
                            VALUES ('". $name."','".$email."',". $phone.",'".$company."','".$message."')";
                if ($db->query($stmt))
                return $db->lastInsertId();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    
    public static function createFeedback($params){ 
        
        
        $name = $params['name'];
        $email = $params['email'];
        $type = $params['type'];
        $company = '';
        $message = $params['feedback-message'];
        $body = "Thank you, Your feedback is recoreded succesfully!";
        $mail = new Email();
        $result = $mail->sendMail($email,$name,$body,$company,$message);
        if($result){
            try {
                //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $db = static::getDB();

                $stmt = "INSERT INTO Feedback (type,name,email,message)
                            VALUES ('". $type."','". $name."','".$email."','".$message."')";
                if ($db->query($stmt))
                return $db->lastInsertId();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    
    

    public static function getAllFeedbacks($param)
    {
        $var = ($param-1)*5;
        try {
            $db = static::getDB();

            $stmt = "SELECT * FROM Feedback LIMIT ".$var.", 5" ;
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

            $stmt = "SELECT COUNT(*) FROM  Feedback" ;
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
     
    public static function makeApprove($param){
        $id = $param;
        
        try {
            $db = static::getDB();

            $stmt = "UPDATE Users SET isApproved=1 WHERE id='".$id."' " ; 
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
}