<?php
namespace App\Controllers;

use \Core\View;
use App\Models\Enquiry;
use App\Models\Contact;

class Enquiries extends \Core\Controller
{
    
    
    public function enquiryForm()
    {
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        View::renderTemplate('pages/enquiry.html', [
            'base_url' => BASE_URL,'name'=>$name,'phone'=>$phone,'email'=>$email,'type'=>$type
        ]);
    }
    
    public function contactForm()
    {
        
        $data = contact::create($_POST);
        
        View::renderTemplate('pages/contact.html', [
            'base_url' => BASE_URL,'success'=>true
        ]);
    }
    
    public function saveEnquiry(){
//        print_r($_POST);
//        print_r("hii");
//        die();
       $data = enquiry::create($_POST);
       if($data){
           View::renderTemplate('pages/enquiry.html', [
            'base_url' => BASE_URL,'success'=>true
        ]); 
       }
//       print_r($data);
//        die();
    }
}