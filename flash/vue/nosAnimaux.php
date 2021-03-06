<?php
session_start();
$currentPage = "nosAnimaux";
include "../controller/nosAnimauxController.php"
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

    <?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area_animauxListe">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Vos animaux</h2>
                        <div class="page_link">
                            <p style=" color: white;">Retrouvez vos animaux mis à l'adoption</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Home Blog Area =================-->
    <?php foreach ($recupAllNosAnimaux as $animal) : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="row pad_top_dons pad_bt_dons border border-white">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img class="img-thumbnail imgCoupe mx-auto text-center " src="<?= $animal['img_animal']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Nom de l'animal</h4></br>
                        <p><?= $animal['nom_animal']; ?></p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Association gardant l'animal</h4>
                        <p><?= $animal['nom_assoc']; ?></p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Ville</h4></br>
                        <p><?= $animal['ville_animal']; ?></p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Contacts</h4></br></br>
                        <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a>
                    </div>
                    <div class="col-sm-1 text-center">
                        <h4>Modifier</h4></br>
                        <a href="nosAnimauxDetails.php">
                            <form method="post" action="nosAnimauxDetails.php"><button name="boutonAnimal" value="<?= $animal['id_animal']; ?>" type="submit" class="btn btn-dark align-items-center"><i class="fa fa-plus" style="color:white"></i></button></form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div>
        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <?php for($i=1; $i<= $nbPages; $i++){ ?>
                    <li class="page-item"><a href="nosAnimaux.php?p=<?= $i; ?>" class="page-link"><?= $i ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <!--================End Home Blog Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>