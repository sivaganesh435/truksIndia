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