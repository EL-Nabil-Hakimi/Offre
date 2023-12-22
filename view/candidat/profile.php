<?php 
use App\Models\Database;


  $connexion = Database::getInstance();
  $conn = $connexion->getConnection();
  
  session_start();
  if(isset($_SESSION["iduser"])){    
      $iduser = $_SESSION["iduser"];
  }
  else{
      header("Location:?route=login");
  }



 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        JobEase
    </title>

    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="assets/styles/stylepdf.css">


  
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="#">
                    <i class="fas fa-code"></i>
                    <h1>JobEase &nbsp &nbsp</h1>
                </a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="?route=candidat_page">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?route=candidat_notification">Notification</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                language
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">FR</a>
                                <a class="dropdown-item" href="#">EN</a>
                            </div>
                        </li>
                        <span class="nav-item active">
                            <a class="nav-link" href="#">EN</a>
                        </span>
                        <li class="nav-item">
                            <a class="nav-link" href="?route=login">LogOut</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>




    <section id="secPDF"> 
           
   <div id="pdf">

            <div id="imgandname">
                <div><img src="uploads/IMG-6583142544b382.25150684Business-Ideas-for-Women-Entrepreneurs.png" alt=""></div>
                <div>
                    <h1>Layla El Ouali</h1>
                </div>
            </div>
            <div id="info">
                    <h5>Profile : <span>DEV </span></h5>
                    <h5>Telephone : </h5>
                    <h5>Adresse : </h5>
                    <h5>Pays : </h5>
                    <h5>Situation Familiale : </h5>
                    <h5>Date Naissance : </h5>
                    <h5>Langue Français : </h5>
                    <h5>Langue Anglais: </h5>
                    <h5>Langue Arabe : </h5>
            </div>
           
        </div>
            <div id="btn">
                <button>Ajouter Mes Information</button>
                <button onclick="generatePDF()">Telecharger Le PDF</button>
            </div>
    </section>
    <footer>
        <p>© 2023 JobEase </p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


<script>        

function generatePDF() {

        var nom_fichier = "Inforamation Personnel";
        var element = document.getElementById('pdf');
        var opt = {
            margin: 0,
            filename: `${nom_fichier}.pdf`,
            image: { type: 'png', quality: 1 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };
         html2pdf().set(opt).from(element).save();
    };

</script>
</html>