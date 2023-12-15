<?php
include("../Controllers/add_offre_cntrl.php");

if(isset($_POST["submit"])){
        $titre = htmlspecialchars($_POST["titre"]);
        $description = htmlspecialchars($_POST["description"]);
        $paye = htmlspecialchars($_POST["paye"]);
        $user_id =  $_POST['userid'];
        $images = $_FILES['image'];

        $Offre = new Add_offre_cntrl();
        $result = $Offre->add_offre($titre, $description ,$paye, $user_id , $images);

        if($result == 0){
            header("Location:add_page.php?msg=error");
        }
        else if($result == 1){
            header("Location:add_page.php?msg=Le Travail e éte ajouter avec succes");
        }

}

else{
    echo"EROOR";
}
?>