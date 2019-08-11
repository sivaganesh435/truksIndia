<?php
namespace App\Controllers;

use \Core\View;
use App\Models\Enquiry;
use App\Models\Contact;

class Feedback extends \Core\Controller
{
    public function saveFeedback(){
        $data = contact::createFeedback($_POST);
        
        View::renderTemplate('pages/contact.html', [
            'base_url' => BASE_URL,'success'=>true
        ]);
    
    }
    public function getFeedbacks(){
        $val = $_POST['value'];
        $feedback = [];
       $page = contact::getPage();
       $page_data = $page[0]['COUNT(*)'];
        $data = contact::getAllFeedbacks($val);
        array_push($feedback, $data);
        array_push($feedback, $page_data);
        
        if($data){
           echo json_encode($feedback);
       }
    
    }
    
    public function makeApprove(){
        $data = contact::makeApprove($_POST['id']);
        print_r($data);
        die();
        if($data){
            echo json_encode($data[0]);
        }
       
    
    }
    
}