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

$sql = "SELECT status.id idstatus, user.name name , user.email email , offre.titre titre 
 , status.approved approved
 FROM user
INNER JOIN status ON status.userid = user.id
INNER JOIN offre ON status.offreid = offre.id AND offre.user_id = $iduser;";
$result = mysqli_query($conn, $sql);


if(isset($_GET['accept'])){
    $acceptuser = $_GET['accept'];
    $sql1 = "UPDATE `status` SET `approved`= 1,`notification`= 1 WHERE id = '$acceptuser'";
    $result1 = mysqli_query($conn, $sql1);
    header("location:candidat.php");
    echo '<script>alert("accepter avec succes")</script>';
}

else if(isset($_GET['inaccept'])){
    
    $acceptuser = $_GET['inaccept'];
    $sql2 = "UPDATE `status` SET `approved`= -1  ,`notification`= 1 WHERE id = '$acceptuser'";
    $result2 = mysqli_query($conn, $sql2);
    header("location:candidat.php");
    echo '<script>alert("refuser avec succes")</script>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    </div>
                    <div class="inline"></div>
                    <div class="name">Admin</div>
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
                <table class="agent table align-middle bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Title d'offre</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"><?php echo $row['name']?></p>
                                        <p class="text-muted mb-0 f_email"><?php echo $row['email']?></p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <?php echo $row['titre']?>
                            </td>
                            <td>

                                <?php if($row['approved'] == NULL) {echo 'No Status';}

                                    else if($row['approved'] == 1) {echo 'Approved';}
                                    
                                    else {
                                        echo 'Inapproved';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php if($row['approved'] == NULL){ ?>
                                <a href="candidat.php?accept=<?php echo $row['idstatus'] ?>"
                                    style="color : white; width : 100%; background-color: green; padding : 5px 10px; border-radius :3px ">
                                    Accepter</a>
                                <a href="candidat.php?inaccept=<?php echo $row['idstatus'] ?>"
                                    style="color : white;  width : 100%; background-color: red; padding : 5px 10px;border-radius :3px ;">Refusé</a>
                                <?php }
                                    else{echo "_" ; }
                                ?>

                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>


            </section>
            <!-- edit modal -->
            <div class=" modal">
                <div class="modal-content">
                    <form id="forms">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="">
                                    <label class="form-label">First name</label>
                                    <input type="text" class="form-control first_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label class="form-label">Last name</label>
                                    <input type="text" class="form-control last_name">
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control email">
                        </div>

                        <!-- Text input -->
                        <div class="mb-4">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control title_user">
                        </div>

                        <!-- Number input -->
                        <div class=" mb-4">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control status">
                        </div>

                        <!-- Message input -->
                        <div class=" mb-4">
                            <label class="form-label">Position</label>
                            <textarea class="form-control position" rows="4"></textarea>
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex w-100 justify-content-center">
                            <p class="error text-danger"></p>
                            <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                            <button class="btn btn-danger btn-block mb-4 annuler">Annuler</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
    <script src="agents.js"></script>
</body>

</html>