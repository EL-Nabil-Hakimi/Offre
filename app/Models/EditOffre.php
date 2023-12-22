<?php
namespace App\Models;
use App\Models\Database;

Class EditOffre{

    function Edit_offre_Image($title, $description, $paye, $id , $image){
        $connexion = Database::getInstance();
        $conn = $connexion->getConnection();

        $upload_dir = "uploads/";
        $image_path = $upload_dir .uniqid('IMG-', true).basename($image["name"]);

    if (move_uploaded_file($image["tmp_name"] , $image_path)) {
            $sql = "UPDATE `offre`
                 SET     
                `image`='$image_path',
                `titre`='$title',
                `description`='$description',
                `paye`='$paye'
                WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                return 1;
            } else {
                return 0;
            }
        } else {
            return -1; 
        }
    }

    function Edit_offre($title, $description, $paye, $id){
        $connexion = Database::getInstance();
        $conn = $connexion->getConnection();

        $sql = "UPDATE `offre`
         SET 
        `titre`='$title',
        `description`='$description',
        `paye`='$paye'
        WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);

            if($result){
                return 1;
            } else {
                return 0;
            }
    }

}

?>