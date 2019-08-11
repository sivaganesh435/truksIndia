<?php

namespace App\Controllers;

use \Core\View;
//use App\Models\Post;

class Pages extends \Core\Controller
{
    
    public function page()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url_segments     = explode('/', $url);
        $page = end($url_segments);
       View::renderTemplate('pages/'.$page.'.html', [
            'base_url' => BASE_URL,'session'=>$_SESSION
        ]); 
    }
    
    
    
    
    
}