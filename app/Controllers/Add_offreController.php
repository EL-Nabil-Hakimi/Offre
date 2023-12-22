<?php

namespace App\Controllers;
use App\Models\AddOffre;

class Add_offreController {
public function add_new_offre(){
if(isset($_POST["submit"])){
        $titre = htmlspecialchars($_POST["titre"]);
        $description = htmlspecialchars($_POST["description"]);
        $paye = htmlspecialchars($_POST["paye"]);
        $user_id =  $_POST['userid'];
        $images = $_FILES['image'];

        $Offre = new AddOffre();
        $result = $Offre->add_offre($titre, $description ,$paye, $user_id , $images);

        if($result == 0){
            header("Location:?route=add_new_page");
        }
        else if($result == 1){
            header("Location:?route=add_page&msg=Le Travail e éte ajouter avec succes");
        }
}
else{
    echo"EROOR";
}

}
}



?>