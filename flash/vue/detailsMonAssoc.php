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
    <section class="banner_area">
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
                                <li><span>Type d'animaux reccueillis</span>:  <?= $detailsAssoc[0]{'typeAnimal_assoc'}; ?>
                                <li><span>Places animaux en règles</span>: <strong><?= $detailsAssoc{0}["nbPlaceRegle_assoc"]; ?></strong> </li>
                                <li><span>Places animaux en quarantaine</span>: <strong><?= $detailsAssoc{0}["nbPlaceQuarant_assoc"]; ?></strong></li></br><br><br>
                                <li><span>Contact</span>: <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>


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

    <section>
			<div class="container pad_bt md-center">
				<div class="col-lg-12 md-center" align="center">
					<div class="align-center">
						<div class="text-center">
							<button id="afficherModifAnnonce" class="btn btn-dark" style="margin-right:2em">Modifier L'association</button>
							<a href="../controller/deleteAssocController.php"><button id="supprimerAnnonce" class="btn btn-dark" style="margin-left:2em">Supprimer l'association</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="modifAnnonce" style='display:none'>
        <div class="container pad_bt md-center">
            <div class="col-lg-12 md-center">
                <h2 align="center">Modification des informations de l'association</h2>
                <br>
                <div class="align-center">
                    <form id="modifAssoc_form" name="ajoutAssoc_form" method="post" action="#" novalidate>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom de l'association : </label>
                                    <input type="pseudo" class="form-control align-center" id="nomAssocModif" value="<?= $detailsAssoc{0}["nom_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Adresse de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="adresseAssocModif" value="<?= $detailsAssoc{0}["adresse_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Email de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="emailAssocModif" value="<?= $detailsAssoc{0}["email_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Numéro de téléphone de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="telAssocModif" value="<?= $detailsAssoc{0}["tel_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Site web de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="siteAssocModif" value="<?= $detailsAssoc{0}["site_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description de l'association :</label>
                                    <textarea class="form-control" id="descAssocModif" rows="3"><?= $detailsAssoc{0}["desc_assoc"]; ?></textarea>
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Facebook de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="facebookAssocModif" value="<?= $detailsAssoc{0}["face_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Instagram de l'association :</label>
                                    <input type="pseudo" class="form-control align-center" id="instagramAssocModif" value="<?= $detailsAssoc{0}["insta_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                        en quarantaine:</label>
                                    <input type="pseudo" class="form-control align-center" id="placesQuarantaineAssocModif" value="<?= $detailsAssoc{0}["nbPlaceQuarant_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                        en règles:</label>
                                    <input type="pseudo" class="form-control align-center" id="placesReglesAssocModif" value="<?= $detailsAssoc{0}["nbPlaceRegle_assoc"]; ?>">
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">Modifier mon association sur le site</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>

                    <h2 align="center">Modification des champs sélectionnables de l'animal (Veillez à bien remettre tous les champs ci-dessous comme vous le souhaitez)</h2>
						<br>
						<form id="modifAssocSelect_form" method="post" action="#" novalidate>
							<div class="row justify-content-center">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Pour quel type d'animal : </label><br>
										<select class="form-control align-center" id="typeAnimalAssocModif">
											<option value="Chat">Chat</option>
											<option value="Chien">Chien</option>
										</select>
									</div><br><br>
									<div class="text-center">
										<button type="submit" class="btn btn-dark">Modifier les champs sélectionnables de l'animal sur le site</button>
									</div>
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
                                    <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">Modifier l'image de mon association sur le site</button>
                                </div>
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