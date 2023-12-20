<?php
namespace App\Models;
use App\Models\Database;


    class Auth {
        public static function login($email, $password) {
            $database = Database::getInstance();
            $conn = $database->getConnection();
                
                $sql = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($conn ,$sql);

                if($result) {
                    $row = mysqli_fetch_array($result);
                    if(password_verify($password, $row["password"])) {
                        session_start();
                        $_SESSION['iduser'] = $row['id'];

                        $role = $row["role_id"];
                        if($role == "1") {
                            return 1;

                        }
                        else return 2 ; 
                    }
                    else return -1;
        }
    }

        public static function register($name  , $email , $pass ) {

            $connexion = Database::getInstance();
            $conn = $connexion->getConnection();

            $sqlCheck  =  "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn ,$sqlCheck);
            if($row = mysqli_fetch_assoc($result) > 0){        
                return 0;
        }
        else{
            $sql = "INSERT INTO user (name,  email , password , role_id) VALUES ('$name', '$email' , '$pass' , 2)";
            $result = mysqli_query($conn ,$sql);
            if ($result) {
                return 1; 
            }        
        }    
    }

}

?>