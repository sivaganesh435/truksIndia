<?php

namespace App\Controllers;
use App\Models\Users;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    public function indexAction()
    {
        View::renderTemplate('Home/index.html', ["base_url" =>BASE_URL, "session"=>$_SESSION
        ]);
    }
    
    public function logout(){
        session_destroy();
        View::renderTemplate('Home/index.html', ["base_url" =>BASE_URL,"session"=>$_SESSION]);
    }

        public function indexView()
    {
        View::renderTemplate('Home/index.html', ["base_url" =>BASE_URL,"session"=>$_SESSION]);
    }
    
    public function signUpForm()
    {
        
        if($_POST['id'] != ''){
            $user = users::update($_POST);
            print_r($user); die();
            $output= array('success' => 'success');
        }
        else{
            $user = users::getByEmail($_POST['email']);

            if($user)
            {
                $output= array('error' => 'User already exist with this email');
            }
            else {
                $data = users::create($_POST);
                if($data){
                    $output= array('Success' => 'success');
                }
                else{
                    $output= array('error' => 'Invalid data');
                }
            }
        }
        echo json_encode($output);
    }
    
    public function editForm()
    {
        $data = users::update($_POST);
    }
    
//    public function footer(){
//        header('location: http://trucks-india.com/footer');
//    }

    public function loginForm()
    {
        $password = $_POST['password'];
        $data = users::getByEmail($_POST['email']);
        if($data){
            
        $name = $data[0]['name'];
        $email = $data[0]['email'];
        $Admin = $data[0]['isAdmin'];
        $hash = $data[0]['password'];
        }
        else 
            {
            $output= array('error' => 'Invalid username');
            }
        

        if(password_verify($password, $hash)){
            
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['isAdmin'] = $Admin;
            $_SESSION['user'] = TRUE;
            $output= array('success' => 'success');
        }
        else{
           $output= array('error' => 'Invalid username or password');
        }
        echo json_encode($output);
    }
    
    public function getUsers(){
        $val = $_POST['value'];
        $users = [];
       $page = users::getPage();
       $page_data = $page[0]['COUNT(*)'];
        $data = users::getAll($val);
        array_push($users, $data);
        array_push($users, $page_data);
        if($data){
            echo json_encode($users);
        }
    }
    
    public function getUserbyId(){
        
        $data = users::getUserbyId($_POST['id']);
//        print_r($data);
//        die();
        if($data){
            echo json_encode($data[0]);
        }
    }
    public function makeAdmin(){
        
        $data = users::makeAdmin($_POST['id']);
        print_r($data);
        die();
        if($data){
            echo json_encode($data[0]);
        }
    }
}
