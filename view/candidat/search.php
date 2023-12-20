<?php
use App\Models\Database;


$connexion = Database::getInstance();
$conn = $connexion->getConnection();
 
if(isset($_GET['titre']) || isset($GET['paye']) ){
            $titre = $_GET['titre'];
            $paye = $_GET['paye'];

            if(empty($titre)){
                
                if(empty($paye)){
                    $sql = "SELECT * FROM offre";
                }
                else{
                    $sql = "SELECT * FROM offre WHERE paye LIKE '%$paye%'";

                }
            }else{
                $sql = "SELECT * FROM offre WHERE titre LIKE '%$titre%'";
                if(!empty($paye)){
                    $sql = "SELECT * FROM offre WHERE titre LIKE '%$titre%' AND paye LIKE '%$paye%'";

                }
            }

}

 $result = mysqli_query($conn, $sql);
?>

<?php while($row = mysqli_fetch_assoc($result) ){?>
<article class="postcard light green">
    <a class="postcard__img_link" href="#">
        <img class="postcard__img" src="<?php echo $row['image']?>" alt="Image Title" />
    </a>
    <div class="postcard__text t-dark">
        <h3 class="postcard__title green"><a href="#"><?php echo $row['titre']?></a></h3>
        <div class="postcard__subtitle small">
            <time datetime="2020-05-25 12:00:00">
                <i class="fas fa-calendar-alt mr-2"></i><?php echo $row['date']?>
            </time>
        </div>
        <div class="postcard__bar"></div>
        <div class="postcard__preview-txt"><?php echo $row['description']?></div>
        <ul class="postcard__tagbox">
            <li class="tag__item"><i class="fas fa-tag mr-2"></i><?php echo $row['paye']?></li>
            <li class="tag__item play green">
                <a href="auth/login.php"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
            </li>
        </ul>
    </div>
</article>

<?php
    }
?>