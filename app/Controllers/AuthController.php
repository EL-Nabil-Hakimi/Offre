<?php
namespace App\Controllers;
use App\Models\Auth;

class AuthController {
    public function Log_in(){
        if(isset($_POST["submit"])){
            $user_name = $_POST["email"];
            $password  = $_POST["password"];
            $User =  new Auth();
            $login = $User->login( $user_name, $password ); 
        
            
            if($login == 1){                
                header("Location:?route=dashboard");
                exit;
                
            }
        
            else if($login == 2){
                header("Location:?route=candidat_page");
                exit;
                
                }
                
            else {
                header("Location:?route=login&msgPass");
                exit;
                
                }
        }
        

    }

  public function Sign_Up(){
    if(isset($_POST["submit"])){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $c_pass = $_POST["c_password"];

            if($pass === $c_pass){
            $User =  new Auth();
            $hached_pass = password_hash($pass, PASSWORD_DEFAULT);
            $register = $User->register($name, $email, $hached_pass);
                if ($register == 0) {
                    header("Location:?route=register&msgEmail=Email est deja existe");    
                    exit; 
                }            

                else if($register == 1) {
                    header ("Location:?route=login");
                }
                
        }   
        else{
            header("Location:?route=register&msgPass=La comfirmation de code est pas marche");
            exit;
        }
        
        }  

  }
    
}

?>
