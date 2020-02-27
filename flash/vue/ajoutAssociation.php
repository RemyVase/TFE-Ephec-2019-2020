<?php
session_start();
$currentPage = "ajoutAssociation";
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
                        <h2>Ajouter son association</h2>
                        <div class="page_link">
                            <p style=" color: white;">Complètez ce formulaire afin d'afficher votre association sur
                                notre site</p>
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
                                <label for="exampleInputEmail1">Nom de l'association : </label>
                                <input type="pseudo" class="form-control align-center" id="nomAssoc"
                                    placeholder="Entrez le nom de votre association.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Adresse de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="adresseAssoc"
                                placeholder="Entrez l'adresse de votre association.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Email de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="emailAssoc"
                                    placeholder="Entrez l'email de votre association.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Numéro de téléphone de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="telAssoc"
                                    placeholder="Entrez le numéro de téléphone de l'association.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Site web de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="siteAssoc"
                                    placeholder="Entrez le site web de l'association.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description de l'association :</label>
                                <textarea class="form-control" id="descAnnonce" rows="3"
                                    placeholder="Entrez une description de votre association."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Facebook de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="facebookAssoc"
                                placeholder="Entrez l'adresse de votre association.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Instagram de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="instagramAssoc"
                                placeholder="Entrez l'adresse de votre association.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                    en quarantaine:</label>
                                <input type="pseudo" class="form-control align-center" id="placesQuarantaineAssoc"
                                    placeholder="Entrez le nombre de place disponible en quarantaine.">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                    en règles:</label>
                                <input type="pseudo" class="form-control align-center" id="placesReglesAssoc"
                                    placeholder="Entrez le nombre de place disponible en règle.">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Logo de l'association :</label>
                                <input type="file" class="form-control-file" id="imageAnnonce">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Ajouter mon association sur le site</button>
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