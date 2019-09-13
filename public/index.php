<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

/**
 * Composer
 */
require '../vendor/autoload.php';

require '../App/constants.php';
/**
 * Twig
 */
//Twig_Autoloader::register();


session_start();



/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

function getGlobals() {
    return array(
        'session'   => $_SESSION,
    ) ;
}

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('pages/{page:[a-zA-Z]+$}', ['controller' => 'Pages', 'action' => 'page']);
$router->add('{controller}/{action}');
//$router->add('enquiries/{page:[a-zA-Z]+$}', ['controller' => 'enquir', 'action' => 'page']);
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('home/signUpForm',['controller' => 'Home', 'action' => 'signUpForm']);
    
$router->dispatch($_SERVER['QUERY_STRING']);
