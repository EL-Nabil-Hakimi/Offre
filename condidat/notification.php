<?php 
  include("../database/connection.php");
  $connection = new Connection();
  $conn = $connection->conn;
  
  session_start();
  if(isset($_SESSION["iduser"])){    
      $iduser = $_SESSION["iduser"];
  }
  else{
      header("Location:../auth/login.php");
  }


$sql = "SELECT status.id idstatus, status.notification , user.name name , user.email email , offre.titre titre 
 , status.approved approved
 FROM user
INNER JOIN status ON status.userid = user.id
INNER JOIN offre ON status.offreid = offre.id
WHERE user.id = $iduser
";
$result = mysqli_query($conn, $sql);
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        JobEase
    </title>

    <link rel="stylesheet" href="../styles/style.css">
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
    <style>
    #notif {
        background-color: #5659e6;
        color: white;
        font-weight: bold;
    }

    #notif1 {
        background-color: #c94329;
        color: white;
        font-weight: bold;
    }

    #notif2 {
        background-color: #818181;
        color: white;
        font-weight: bold;
    }

    #notif p,
    #notif1 p,
    #notif2 p {
        padding: 10px;
    }
    </style>
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="offre.php">Notification</a>
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
                            <a class="nav-link" href="../auth/login.php">LogOut</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>




    <section action="#" method="get" class="search" style="height:90vh">
        <?php while($row = mysqli_fetch_assoc($result)) {?>
        <?php if($row["notification"] == 1 && $row['approved']== 1 ){?>
        <div>
            <div id="notif">

                <p>Félicitations ! Vous êtes accepté(e) : <?php echo $row["titre"] ?> </p>
            </div>
        </div>
        <?php }else if($row["notification"] == 1  && $row['approved']== -1){ ?>
        <div>
            <div id="notif1">

                <p>Malheureusement, votre candidature n'a pas été retenue de : <?php echo $row["titre"] ?></p>
            </div>
        </div>
        <?php }else{?>

        <div>
            <div id="notif2">

                <p>Aucune status a ce mement : <?php echo $row["titre"] ?></p>
            </div>
        </div>


        <?php } ?>
        <?php } ?>
    </section>




    <footer>
        <p>© 2023 JobEase </p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>