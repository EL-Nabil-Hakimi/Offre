<?php
namespace App\Controllers;
use App\Models\EditOffre;

class Edit_offreController {

    public function edit_offre() {
        if (isset($_POST["submit"])) {
            $id = $_POST['id'];
            $titre = htmlspecialchars($_POST["titre"]);
            $description = htmlspecialchars($_POST["description"]);
            $paye = htmlspecialchars($_POST["paye"]);
            $images = $_FILES['image'];

            if (!empty($images['name'])) {
                $Offre = new EditOffre();
                $result = $Offre->Edit_offre_image($titre, $description, $paye, $id, $images);
            } else {
                $Offre = new EditOffre();
                $result = $Offre->Edit_offre($titre, $description, $paye, $id);
            }

            if ($result == 0) {
                header("Location:?route=page_edit");
            } else if ($result == 1) {
                header("Location:?route=offre&msg=Le Travail e éte ajouter avec succes");
            }
        }
    }
}
?>
