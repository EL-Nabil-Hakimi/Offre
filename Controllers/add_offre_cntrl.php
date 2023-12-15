<?php
include("../database/connection.php");

Class Add_offre_cntrl extends Connection{

    function add_offre($title, $description, $paye, $user_id, $image){
        $upload_dir = "../uploads/";
        $image_path = $upload_dir .uniqid('IMG-', true).basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $image_path)) {
            $sql = "INSERT INTO `offre`(`titre`,`description`, `paye`, `user_id`, `image`) VALUES ('$title', '$description', '$paye', '$user_id', '$image_path')";
            $result = $this->conn->query($sql);

            if($result){
                return 1; 
            } else {
                return 0;
            }
        } else {
            return 0; 
        }
    }
}

?>