<?php

include("../database/connection.php");
$connection = new Connection();
$conn = $connection->conn;

if(isset($_POST["input"])){
        $titre = htmlspecialchars($_POST["titre"]);
        $sql = "SELECT * FROM offre WHERE titre LIKE '%$titre%'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            header("Location:index.php?titre=$titre");
        }
        else{
            header("Location:index.php");
        }
}

else{
    header("Location:index.php");
}
?>