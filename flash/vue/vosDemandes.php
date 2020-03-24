<?php
session_start();
$currentPage = "vosDemandes";
include '../controller/listeNosDemandesController.php'
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
                        <h2>Project Details</h2>
                        <div class="page_link">
                            <a href="index.html">Home</a>
                            <a href="projects.html">Projects</a>
                            <a href="project-details.html">Project Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Portfolio Details Area =================-->
    <?php foreach ($recupAllNosDemandes as $demande) : ?>
        <div class="container">
            <div class="col-md-12">
                <div class="row pad_top_dons pad_bt_dons border border-white">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img class="img-thumbnail imgCoupe mx-auto text-center " src="<?= $demande['img']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-sm-5 text-center">
                        <h4>Nom de l'annonce</h4></br>
                        <p><?= $demande['titre_demande']; ?></p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h4>Modifier</h4></br>
                        <a href="modifDemande.php">
                            <form method="post" action="modifDemande.php"><button name="buttonDemande" type="submit" value ="<?= $demande['id_demande']; ?>" class="btn btn-dark align-items-center"><i class="fa fa-pencil" style="color:white"></i></button></form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div>
        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <li class="page-item">
                    <a href="#" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">
                            <span class="lnr lnr-chevron-left"></span>
                        </span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $nbPages; $i++) { ?>
                    <li class="page-item"><a href="http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/vosDemandes.php?p=<?= $i; ?>" class="page-link"><?= $i ?></a></li>
                <?php } ?>
                <li class="page-item">
                    <a href="#" class="page-link" aria-label="Next">
                        <span aria-hidden="true">
                            <span class="lnr lnr-chevron-right"></span>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>
<!--================End Portfolio Details Area =================-->

<?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>