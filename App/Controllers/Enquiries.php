<?php
namespace App\Controllers;

use \Core\View;
use App\Models\Enquiry;
use App\Models\Contact;

class Enquiries extends \Core\Controller
{
    
    
    public function enquiryForm()
    {
        $form = [];
        $form['name']=$name = $_POST['name'];
        $form['phone']=$phone = $_POST['phone'];
        $form['email']=$email = $_POST['email'];
        $form['type']=$type = $_POST['type'];
        echo json_encode($form);
    }
    
    public function contactForm()
    {
        
        $data = contact::create($_POST);
        
        View::renderTemplate('pages/contact.html', [
            'base_url' => BASE_URL,'success'=>true
        ]);
    }
    
    public function saveEnquiry(){
       $data = enquiry::create($_POST);
       if($data){
           echo json_encode("Success");
       }
    }
    
    public function getEnquiries(){
        $val = $_POST['value'];
//       print_r($_POST['value']);
//        die();
        $enquiry = [];
       $page = enquiry::getPage();
       $page_data = $page[0]['COUNT(*)'];
//       die();
       $data = enquiry::getAll($val);
//       print_r($data); die();
        array_push($enquiry, $data);
        array_push($enquiry, $page_data);
        
       if($data){
           echo json_encode($enquiry);
       }
    }
    
    public function getEnquirybyId(){
//        print_r($_POST['id']); 
//        die();
        
        $data = enquiry::getEnquirybyId($_POST['id']);
        if($data){
            echo json_encode($data[0]);
        }
    }
}