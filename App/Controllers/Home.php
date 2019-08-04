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

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        /*
        View::render('Home/index.php', [
            'name'    => 'Dave',
            'colours' => ['red', 'green', 'blue']
        ]);
        */
        View::renderTemplate('Home/index.html', ["base_url" =>BASE_URL
        ]);
    }
    
    public function signUpForm()
    {
        $data = users::create($_POST);
        if($data){
            View::renderTemplate('Home/index.html', ["base_url" =>BASE_URL,'sucess'=>true
        ]);
        }
        
    }
    
    public function loginForm()
    {
        $password = $_POST['password'];
        $data = users::getByEmail($_POST['email']);
        $hash = $data[0]['password'];
        if(password_verify($password, $hash)){
            session_start();
            $_SESSION["user"] = $data;
//            $_SESSION["lastname"] = "Parker";
        }
        else{
            return false;
        }
//        print_r($data[0]['password']);
//        die();
        if($data){
            View::renderTemplate('Home/index.html', ["base_url" =>BASE_URL,'session'=>$_SESSION
        ]);
        }
        
    }
}
