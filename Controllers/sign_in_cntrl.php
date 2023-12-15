<?php
include("../database/connection.php");


class Log_in extends Connection{
        public function LoginUser($email, $pass) {
            $sqlCheck = "SELECT * FROM user WHERE email = '$email'";
            $result = $this->conn->query($sqlCheck);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $HashedPassword = $row['password']; 
                $role = $row['role_id'];
                if (password_verify($pass, $HashedPassword)) {
                    session_start();
                    $_SESSION['iduser'] = $row['id'];

                    if($role == 1){
                        return 1;
                    }
                    else if($role == 2){
                        return 2;
                    }
                    
                } else {
                    return 0;
                }
            }
        }    

}

?>