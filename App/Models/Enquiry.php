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
        $subject = $params['subject'];
        $message = $params['feedback-message'];
        $body ="Thank you, Your enquiry recorded successfully our agent contact you soon!";
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