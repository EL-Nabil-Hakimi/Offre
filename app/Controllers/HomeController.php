<?php
namespace App\Controllers;
use App\Models\UserModel;

class HomeController
{
    public function index()
    {   
        $userModel = new UserModel();

        $users = $userModel->getAllUsers(); 
       
        require(__DIR__ .'../../../view/home.php');      

    } 

    public function login()
    {       
        require(__DIR__ .'../../../view/login.php');     
        

    }
    
    public function register(){
        require(__DIR__ .'../../../view/register.php');

    }
   
    public function Dachboard(){
        require(__DIR__ .'../../../view/recruteur/dashboard.php');      


    }

    public function Candidat(){
        require(__DIR__ .'../../../view/recruteur/candidat.php');      
    }

    public function Offre(){
        require(__DIR__ .'../../../view/recruteur/offre.php');      
    }
    public function add_page(){
        require(__DIR__ .'../../../view/recruteur/add_page.php');      
    }
    public function Candidat_page(){
        require(__DIR__ .'../../../view/candidat/index.php');      
    }
    public function Candidat_notification(){
        require(__DIR__ .'../../../view/candidat/notification.php');      
    }
   
    public function Candidat_search_result(){
        require(__DIR__ .'../../../view/candidat/search.php');      
    }
    public function candidat_profile(){
        require(__DIR__ .'../../../view/candidat/profile.php');    
    }


}
?>