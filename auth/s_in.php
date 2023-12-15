<?php
include("../Controllers/sign_in_cntrl.php");

if(isset($_POST["submit"])){
    $user_name = $_POST["email"];
    $password  = $_POST["password"];
    $User =  new Log_in();
    
    $login = $User->LoginUser( $user_name, $password ); 

    
    if($login == 1){
        header("Location:../recruteur/index.php");
        
    }

    else if($login == 2){
        header("Location:../condidat/index.php");
        
        }
        
    else {
        header("Location:login.php?msgPass");
    }
}



?>