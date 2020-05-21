<?php
session_start();
$currentPage = "detailsMonAssociations";
include '../controller/detailsMonAssocController.php';
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

    <?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area_assoc">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>En savoir plus</h2>
                        <p style="color:white">Découvrez plus de détails sur cette association</p>
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
                                <li><span>Adresse</span>: <?= $detailsAssoc{0}["adresse_assoc"]; ?></li>
                                <li><span>Numéro de téléphone</span>: <?= $detailsAssoc{0}["tel_assoc"]; ?></li>
                                <li><span>Email</span>: <?= $detailsAssoc{0}["email_assoc"]; ?></li>
                                <li><span>Site</span>: <a href="<?= $detailsAssoc{0}["site_assoc"]; ?>"><?= $detailsAssoc{0}["site_assoc"]; ?></a></li>
                                <li><span>Type d'animaux reccueillis</span>: <?= $detailsAssoc[0]{'typeAnimal_assoc'}; ?>
                                <li><span>Places animaux en règles</span>: <strong><?= $detailsAssoc{0}["nbPlaceRegle_assoc"]; ?></strong> </li>
                                <li><span>Places animaux en quarantaine</span>: <strong><?= $detailsAssoc{0}["nbPlaceQuarant_assoc"]; ?></strong></li>
                                <?php if($detailsAssoc[0]{'IBAN'} != null) : ?>
                                    <li><span>Compte banquaire pour dons</span>:  <strong><?= $detailsAssoc{0}["IBAN"]; ?></strong></li>
                                <?php endif ?>
                                </br><br><br>
                                <li><span>Contact</span>: <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>


                            </ul>
                            <ul class="list social_details">
                                <li><a href="<?= $detailsAssoc{0}["face_assoc"]; ?>"><i class="fa fa-facebook fa-3x"></i></a></li>
                                <li><a href="<?= $detailsAssoc{0}["insta_assoc"]; ?>"><i class="fa fa-instagram fa-3x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h4>Description de l'association :</h4>
                <p><?= $detailsAssoc{0}["desc_assoc"]; ?></p>
            </div>
        </div>
    </section>




    <section>
        <div id="popup"></div>
        <div class="container pad_bt md-center">
            <div class="col-lg-12 md-center" align="center">
                <div class="align-center">
                    <div class="text-center">
                        <button id="afficherModifAnnonce" class="btn btn-dark" style="margin-right:2em">Modifier L'association</button>
                        <?php if($_SESSION['chefAssoc'] === "1") : ?>
                            <button id="supprimerAnnonce" name="supprAssoc" class="btn btn-dark" style="margin-left:2em">Supprimer l'association</button>
                            <button id="supprimerAnnonceDef" onclick="popup()" name="supprAssocDef" class="btn btn-dark" style="margin-left:2em; display:none" data-toggle="modal" data-target="#modalConfirmDelete">Valider la suppression</button>
                        <?php endif ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="modifAnnonce" style='display:none'>
        <div class="container pad_bt md-center">
            <div class="col-lg-12 md-center">
            <?php if($_SESSION['chefAssoc'] === "1") : ?>
                <h2 align="center">Gestion des membres de l'association</h2><br>
                <h3 align="center">Liste des membres :</h3>
                <?php foreach($recupAllMembreAssoc as $membreAssoc) : ?>
                    <p align="center"><?= $membreAssoc['pseudo_user']; ?><p>
                <?php endforeach ?>
                <br>
                <form id="ajoutMembre_form" method="post" action="#" novalidate>
                    <div class="row justify-content-center" align="center">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pseudoAjout">Indiquez le pseudo de la personne :</label>
                                <input list="pseudoList" type="text" id="pseudoAjout">
                                <datalist id="pseudoList">
                                    <?php foreach($recupAllMembrePourAjout as $membre) : ?>
                                        <option value="<?= $membre['pseudo_user']; ?>">
                                    <?php endforeach ?>
                                    </datalist>
                                <button type="submit" class="btn btn-dark">Ajouter un membre à l'association</button><br>
                                <span id="userDejaDansAssoc" style="display : none; color : red">Cet utilisateur est déjà dans une association.</span>
                            </div>    
                        </div>
                    </div>
                </form><br><br>
                <form id="suppressionMembre_form" method="post" action="#" novalidate>
                    <div class="row justify-content-center" align="center">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pseudoSupp">Indiquez le pseudo de la personne :</label>
                                <input list="pseudoListAssoc" type="text" id="pseudoSupp">
                                <datalist id="pseudoListAssoc">
                                    <?php foreach($recupAllMembreAssocSansChef as $membreAssoc) : ?>
                                        <option value="<?= $membreAssoc['pseudo_user']; ?>">
                                    <?php endforeach ?>
                                </datalist>
                                <button type="submit" class="btn btn-dark">Retirer cette personne de l'association</button>
                            </div>
                        </div>
                    </div>
                </form><br><br>
                <br>
                <h2 align="center">Transmettre ses droits de responsable de l'association : </h2><br>
                <form id="transmettreDroit_form" method="post" action="#" novalidate>
                    <div class="row justify-content-center" align="center">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pseudoTransmet">Indiquez le pseudo de la personne :</label>
                                <input list="pseudoList" type="text" id="pseudoTransmet">
                                <datalist id="pseudoTransmettre">
                                    <?php foreach($recupAllMembreAssocSansChef as $membre) : ?>
                                        <option value="<?= $membre['pseudo_user']; ?>">
                                    <?php endforeach ?>
                                    </datalist>
                                <button type="submit" class="btn btn-dark">Transmettre les droits</button><br>
                                <span id="userPasDansAssoc" style="display : none; color : red">L'utilisateur doit-être dans l'association.</span>
                            </div>    
                        </div>
                    </div>
                </form>
                <?php endif ?>
                <h2 align="center">Modification des informations de l'association</h2>
                <br>
                <div class="align-center">
                    <form id="modifAssoc_form" name="ajoutAssoc_form" method="post" action="#" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom de l'association : </label>
                                    <input type="pseudo" class="form-control align-center" id="nomAssocModif" value="<?= $detailsAssoc{0}["nom_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Adresse de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="adresseAssocModif" value="<?= $detailsAssoc{0}["adresse_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Email de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="emailAssocModif" value="<?= $detailsAssoc{0}["email_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Numéro de téléphone de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="telAssocModif" value="<?= $detailsAssoc{0}["tel_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Site web de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="siteAssocModif" value="<?= $detailsAssoc{0}["site_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description de l'association :</label>
                                    <textarea class="form-control" id="descAssocModif" rows="3"><?= $detailsAssoc{0}["desc_assoc"]; ?></textarea>
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Facebook de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="facebookAssocModif" value="<?= $detailsAssoc{0}["face_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Instagram de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="instagramAssocModif" value="<?= $detailsAssoc{0}["insta_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                        en quarantaine:</label>
                                    <input type="pseudo" class="form-control align-center" id="placesQuarantaineAssocModif" value="<?= $detailsAssoc{0}["nbPlaceQuarant_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                        en règles:</label>
                                    <input type="pseudo" class="form-control align-center" id="placesReglesAssocModif" value="<?= $detailsAssoc{0}["nbPlaceRegle_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Numéro de compte en banque (Optionnel pour dons financiers) :</label>
                                    <input type="pseudo" class="form-control align-center" id="ibanModif" value="<?= $detailsAssoc{0}["IBAN"]; ?>">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">Modifier mon association sur le site</button>
                                </div>
                                <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>

                    <h2 align="center">Modification des champs sélectionnables de l'animal </h2>
                    <small class="form-text text-muted" align="center">(Veillez à bien remettre tous les champs ci-dessous comme vous le souhaitez)</small>
                    <br>
                    <form id="modifAssocSelect_form" method="post" action="#" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Pour quel type d'animal : </label><br>
                                    <select class="form-control align-center" id="typeAnimalAssocModif">
                                        <option value="Chat">Chat</option>
                                        <option value="Chien">Chien</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <span class="form_error" style="color:red"></span>
                                </div><br><br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">Modifier les champs sélectionnables</button>
                                </div>
                                <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            </div>
                        </div>
                    </form><br><br>
                    <br>
                    <h2 align="center">Modification de l'image de l'association</h2>
                    <br>
                    <form id="modifImgAssoc_form" name="modifImgAssoc_form" method="post" action="#" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Logo de l'association :</label>
                                    <input type="file" class="form-control-file" id="imageAssocModif" value="<?= $detailsAssoc{0}["img"]; ?>">
                                    <span class="form_error" style="color:red"></span>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">Modifier l'image de mon association</button>
                                </div>
                                <p id="extPasOk" style="display : none; color : red">L'image doit-être un png ou un jpg.</p>
                                <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================End Portfolio Details Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>