<?php
session_start();
$currentPage = "detailsAssociations";
include '../controller/detailsAssocController.php';
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
                        <p style = "color:white">Découvrez plus de détails sur cette association</p>
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
                        <img class="img-fluid" src="<?= $detailsAssoc{0}["img"]; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="portfolio_right_text">
                        <h4><?= $detailsAssoc{0}["nom_assoc"]; ?></h4>
                        <ul class="list">
                            <li><span>Adresse</span>:  <?= $detailsAssoc{0}["adresse_assoc"]; ?></li>
                            <li><span>Numéro de téléphone</span>:  <?= $detailsAssoc{0}["tel_assoc"]; ?></li>
                            <li><span>Email</span>:  <?= $detailsAssoc{0}["email_assoc"]; ?></li>
                            <li><span>Site</span>:  <a href="<?= $detailsAssoc{0}["site_assoc"]; ?>"><?= $detailsAssoc{0}["site_assoc"]; ?></a></li>
                            <li><span>Type d'animaux reccueillis</span>:  <?= $detailsAssoc[0]{'typeAnimal_assoc'}; ?>
                            <li><span>Places animaux en règles</span>: <strong><?= $detailsAssoc{0}["nbPlaceRegle_assoc"]; ?></strong> </li>
                            <li><span>Places animaux en quarantaine</span>:  <strong><?= $detailsAssoc{0}["nbPlaceQuarant_assoc"]; ?></strong></li></br><br><br>
                            <li><span>Contact</span>:  <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>


                        </ul>
                        <ul class="list social_details">
                            <li><a href="<?= $detailsAssoc{0}["face_assoc"]; ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= $detailsAssoc{0}["insta_assoc"]; ?>"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
                <h4>Description de l'association :</h4>
               <p><?= $detailsAssoc{0}["desc_assoc"]; ?></p>
        </div>
    </div>
</section>

    <!--================End Portfolio Details Area =================-->

    <?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>