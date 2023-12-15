<?php

session_start();
if(isset($_SESSION["iduser"])){    
    $iduser = $_SESSION["iduser"];
}
else{
    header("Location:../auth/login.php");
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
    <!-- #region -->
    <style>
    #Mysec {
        width: 98vw;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    #Mysec form {
        padding: 30px;
        border-radius: 2px;
        box-shadow: 0px 0px 3px 1px;
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
                            <a class="nav-link" href="dashboard/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="offre.php">Mes Offre</a>
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




    <?php
                if(isset($_GET["msg"])){
                            $msg = $_GET["msg"];
                      
                        echo "<script> alert('$msg');</script> ";  }
                ?>

    <section id="Mysec">
        <form style="width: 26rem;" action="add_offre.php" method="post" enctype="multipart/form-data">
            <h4>Ajouter Une Offre</h4>

            <div data-mdb-input-init class="form-outline mb-4">
                <label class="Image" for="form4Example1">Image</label>
                <input type="file" name="image" id="form4Example1" class="form-control" accept=".jpg, .jpeg, .png," />
            </div>

            <!-- Name input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form4Example1">Titre</label>

                <input type="text" id="form4Example1" name="titre" class="form-control" required />
            </div>


            <!-- Message input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form4Example3">Descruption</label>

                <textarea class="form-control" id="form4Example3" name="description" rows="4" required></textarea>
            </div>


            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form4Example2">Paye Du Travail</label>

                <input type="text" id="form4Example2" name="paye" class="form-control" required />

                <input type="hidden" name="userid" value="<?php echo $iduser?>">
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Ajouter</button>
        </form>
    </section>



    <footer>
        <p>© 2023 JobEase </p>
    </footer>