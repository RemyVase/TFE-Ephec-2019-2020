<?php
session_start();
$currentPage = "animauxDetails";
$_SESSION['animal'] = $_POST['boutonAnimal'];
include '../controller/detailsAnimalController.php';
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

<?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>En savoir plus</h2>
                        <p style = "color:white">Découvrez plus de détails sur cet animal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Portfolio Details Area =================-->
<section class="portfolio_details_area p_120">
    <div class="container">
        <div class="portfolio_details_inner">
            <div class="row">
                <div class="col-md-5">
                    <div class="left_img">
                        <img class="img-fluid" src="<?= $detailsAnimal[0]{'img_animal'}; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="portfolio_right_text">
                        <h4><?= $detailsAnimal[0]{'nom_animal'}; ?></h4>
                        <ul class="list">
                            <li><span>Age</span>:  <?= $detailsAnimal[0]{'age_animal'}; ?></li>
                            <li><span>Ville où le trouver</span>:  <?= $detailsAnimal[0]{'ville_animal'}; ?></li>
                            <li><span>Association</span>:  <?= $detailsAnimal[0]{'nom_assoc'}; ?></li>
                            <li><span>Type d'animal</span>:  <?= $detailsAnimal[0]{'type_animal'}; ?></li></br></br></br>
                            <li><span>Etat (réservé ou pas)</span>:  <?= $detailsAnimal[0]{'statut_animal'}; ?></li></br></br></br>
                            <li><span>Contact</span>:  <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>
                        </ul>
                    </div>
                </div>
            </div>
                <h4>Description de l'animal :</h4>
               <p><?= $detailsAnimal[0]{'desc_animal'}; ?></p>
        </div>
    </div>
</section>

    <!--================End Portfolio Details Area =================-->

    <?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>