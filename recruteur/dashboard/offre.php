<?php 

  include("../../database/connection.php");

  session_start();
if(isset($_SESSION["iduser"])){    
    $iduser = $_SESSION["iduser"];
}
else{
    header("Location:../../auth/login.php");
}  

  $connection = new Connection();
  $conn = $connection->conn;
  
  $sql = "SELECT * FROM user 
  INNER JOIN offre ON offre.user_id = user.id
  WHERE user.id = $iduser ;";
  
  $result = mysqli_query($conn, $sql);
  
    if (isset($_GET["delete"])){
        $delete = $_GET["delete"];
        $sql2 = "DELETE FROM `offre` WHERE id = $delete";
        $result2 = mysqli_query($conn, $sql2);
        header("Location:offre.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    #IMGOFFRE {
        width: 5vw;
        height: 5vw;
        border-radius: 5px;
        margin-left: 15px;
        opacity: 0.9;
        transition: ease 0.6s;
        cursor: pointer;

    }

    #IMGOFFRE:hover {
        opacity: 1;
        transform: scale(1.4);
        z-index: 5;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">

                    <a href="#" class="nav-link text-white-50">Dashboard</a>

                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg"
                                alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="candidat.php" class="sidebar_link"> <img src="img/agents.svg" alt="icon">Candidat</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="offre.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Offre</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="contact.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Contact</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="../add_page.php" class="sidebar_link"><img src="img/articles.svg" alt="icon">Ajouter
                            Des
                            Offres</a>
                    </li>

                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="img/settings.svg" alt="">Settings</a>


            </div>
        </aside>

        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="img/search.svg" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="img/settingsno.svg"
                                        alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                        Offres</button></a>

                    </div>
                    <div class="inline"></div>
                    <div class="name"> Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="../index.php">Home</a>
                                <a class="dropdown-item" href="../offre.php">Voir Mes Offres</a>
                                <a class="dropdown-item" href="../../auth/login.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="Agents px-4">
                <table class="agent table align-middle bg-white" style="min-width: 700px;">
                    <thead class="bg-light">
                        <tr>
                            <th>Image D'offfre</th>
                            <th>Titre D'offfre</th>
                            <th>description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($row = mysqli_fetch_assoc($result)){?>
                        <tr class="freelancer">
                            <td>
                                <img id="IMGOFFRE" src="../../uploads/<?php echo $row['image']?>" />
                            </td>

                            <td>
                                <p class="fw-bold mb-1 f_name"><?php echo $row['titre']?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-4 f_title" style="width : 50wv;">
                                    <?php echo $row['description']?></p>

                            </td>
                            <td>
                                <p class="fw-bold mb-4 f_name" style="font-size : 15px; width : 10vw;">
                                    <?php echo $row['date']?>
                                </p>
                            </td>

                            <td>
                                <a href="offre.php?delete=<?php echo $row['id'] ?>">
                                    <p class="fw-bold mb-4 f_name"
                                        style="font-size : 15px; width : 10vw; color : red; cursor : pointer">
                                        Supprimer
                                    </p>
                                </a>
                            </td>
                            <?php }?>

                    </tbody>
                </table>


            </section>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>