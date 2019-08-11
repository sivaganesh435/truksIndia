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
    
    public static function getUserbyId($params){ 
        $id = $params;
                
        try {
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();

            $stmt = "SELECT * FROM Users WHERE id='".$id."'";
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function getAll($param){
        $var = ($param-1)*5;
        try {
            $db = static::getDB();

            $stmt = "SELECT * FROM Users LIMIT ".$var.", 5" ;
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

            $stmt = "SELECT COUNT(*) FROM  Users" ;
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
     
    public static function makeAdmin($param){
        $id = $param;
        try {
            $db = static::getDB();

            $stmt = "UPDATE Users SET isAdmin=1 WHERE id='".$id."' " ;
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
    
    public static function update($params){
        
        $id = $params['id'];
        $original = $params['originalPass'];
        $name = $params['name'];
        $email = $params['email'];
        $phone = $params['phone'];
        $password = $params['password'];
        if($password != ''){
            $actual = password_hash($password, PASSWORD_DEFAULT);
        }
        else{
            $actual = $original;
        }
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $actual,
            'id' =>$id,
        ];
        
        try {
            $db = static::getDB();

//            $stmt = "UPDATE Users SET name=:name,email= :email,phone=:phone,password=:password WHERE id=:id";
            $stmt = "UPDATE Users SET name='.$name.' WHERE id=".$id."";
//            $stmt= $dpo->prepare($sql);
//            $result = $stmt->execute($data);
            if ($db->query($stmt))
            $result = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    
}