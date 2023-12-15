<?php

include("../database/connection.php");

class sign_up extends Connection {
    public function createUser($name  , $email , $pass ) {
        $sqlCheck  =  "SELECT * FROM user WHERE email = '$email'";
        $this->conn->query($sqlCheck);
        if($this ->conn->affected_rows > 0) {        
            return 0;
    }
    else{
        $sql = "INSERT INTO user (name,  email , password , role_id) VALUES ('$name', '$email' , '$pass' , 2)";

        if ($this->conn->query($sql) === TRUE) {
            return 1; 
        }        
    }    
    }
}
?>