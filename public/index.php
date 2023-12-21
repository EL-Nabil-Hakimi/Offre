<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\Add_offreController;

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'login':
        $logincontroller = new HomeController();
        $logincontroller->login();
        break;
    case 'signIn':
            $controller = new AuthController();
            $controller->Log_in();
    case 'register':
            $logincontroller = new HomeController();
            $logincontroller->register();
            break;
    case 'signUp':
        $logincontroller = new AuthController();
        $logincontroller->Sign_Up();
        break;
    case 'dashboard':
        $controller = new HomeController();
        $controller->Dachboard();
        break;

    case 'candidat':
        $controller = new HomeController();
        $controller->Candidat();
        break;
    case 'offre':
        $controller = new HomeController();
        $controller->Offre();
        break;
    case 'add_page':
        $controller = new HomeController();
        $controller->add_page();    
        break;
    case 'add_new_page':
        $controller = new Add_offreController();
        $controller->add_new_offre();    
        break;
    case 'candidat_page':
        $controller = new HomeController();
        $controller->Candidat_page();    
    break;
    case 'search_result':
        $controller = new HomeController();
        $controller->Candidat_search_result();    
    break;

    case 'candidat_notification':
        $controller = new HomeController();
        $controller->Candidat_notification();    
        break;

        // Add mor
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>