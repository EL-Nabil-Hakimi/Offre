<?php
namespace App\Models;
use App\Models\Database;


Class AddOffre{

    function add_offre($title, $description, $paye, $user_id, $image){
        $connexion = Database::getInstance();
        $conn = $connexion->getConnection();

        $upload_dir = "uploads/";
        $image_path = $upload_dir .uniqid('IMG-', true).basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $image_path)) {
            $sql = "INSERT INTO `offre`(`titre`,`description`, `paye`, `user_id`, `image`) VALUES ('$title', '$description', '$paye', '$user_id', '$image_path')";
            $result = mysqli_query($conn, $sql);

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