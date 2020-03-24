<?php
session_start();
$currentPage = "animauxDetails";
include '../controller/detailsAnimalController.php';
$_SESSION['animal'] = $_GET['animal'];
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
                        <p style="color:white">Découvrez plus de détails sur cet animal</p>
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
                                <li><span>Age</span>: <?= $detailsAnimal[0]{'age_animal'}; ?></li>
                                <li><span>Ville où le trouver</span>: <?= $detailsAnimal[0]{'ville_animal'}; ?></li>
                                <li><span>Association</span>: <?= $detailsAnimal[0]{'nom_assoc'}; ?></li></br></br></br>
                                <li><span>Etat (réservé ou pas)</span>: <?= $detailsAnimal[0]{'statut_animal'}; ?></li></br></br></br>
                                <li><span>Contact</span>: <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h4>Description de l'animal :</h4>
                <p><?= $detailsAnimal[0]{'desc_animal'}; ?></p>
            </div>
        </div>
    </section>
    <section>
        <div class="container pad_bt md-center">
            <div class="col-lg-12 md-center">
                <h2 align="center">Modification des informations de l'animal</h2>
                <br>
                <div class="align-center">
                    <form id="modifAnimal_form" method="post" action="#" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom de l'animal : </label>
                                    <input type="pseudo" class="form-control align-center" id="nomAnimalModif" value="<?= $detailsAnimal[0]{'nom_animal'}; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Age de l'animal : </label>
                                    <input type="pseudo" class="form-control align-center" id="ageAnimalModif" value="<?= $detailsAnimal[0]{'age_animal'}; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Ville ou le trouver :</label>
                                    <input type="pseudo" class="form-control align-center" id="villeAnimalModif" value="<?= $detailsAnimal[0]{'ville_animal'}; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description de l'animal:</label>
                                    <textarea class="form-control" id="descAnimalModif" rows="3"><?= $detailsAnimal[0]{'desc_animal'}; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Statut de l'animal(réservé ou disponible) :</label>
                                    <input type="pseudo" class="form-control align-center" id="statutAnimalModif" value="<?= $detailsAnimal[0]{'statut_animal'}; ?>">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">Modifier la présentation de l'animal sur le site</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <h2 align="center">Modification de l'image de l'animal</h2>
                    <br>
                    <form id="modifImgAnimal_form" method="post" action="#" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Photo de l'animal :</label>
                                    <input type="file" class="form-control-file" id="imageAnimalModif" value="<?= $detailsAnimal{0}["img"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">Modifier l'image de l'animal sur le site</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--================End Portfolio Details Area =================-->

        <?php include 'footer.php' ?>
        <?php include 'jquery.php' ?>
</body>

</html>