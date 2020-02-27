<?php
session_start();
$currentPage = "ajoutAnimal";
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
                        <h2>Ajouter un animal à l'adoption</h2>
                        <div class="page_link">
                            <p style=" color: white;">Complètez ce formulaire afin d'afficher un animal disponible à l'adoption sur notre site</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Home Blog Area =================-->

    <div class="container pad_top pad_bt md-center">
        <div class="col-lg-12 md-center">

            <div class="align-center">
                <form>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom de l'animal : </label>
                                <input type="pseudo" class="form-control align-center" id="nomAnimal" placeholder="Entrez le nom de l'animal.">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Age de l'animal : </label>
                                <input type="pseudo" class="form-control align-center" id="ageAnimal" placeholder="Entrez l'âge de l'animal.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ville ou le trouver :</label>
                                <input type="pseudo" class="form-control align-center" id="villeAnimal" placeholder="Entrez la ville ou trouver l'animal.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description de l'animal:</label>
                                <textarea class="form-control" id="descAnimal" rows="3" placeholder="Entrez une description de l'animal."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Photo de l'animal :</label>
                                <input type="file" class="form-control-file" id="imageAnimal">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Ajouter l'animal sur le site</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!--================End Home Blog Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>