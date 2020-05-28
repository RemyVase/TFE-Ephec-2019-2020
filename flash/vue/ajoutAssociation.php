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
    <section class="banner_area_assoc">
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
                <form id="ajoutAssoc_form" name="ajoutAssoc_form" method="post" action="#" novalidate>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom de l'association : </label>
                                <input type="pseudo" class="form-control align-center" id="nomAssoc" placeholder="Entrez le nom de votre association." required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ville de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="adresseAssoc" placeholder="Entrez la ville ou se trouve votre association." required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Email de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="emailAssoc" placeholder="Entrez l'email de votre association." required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Numéro de téléphone de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="telAssoc" placeholder="Entrez le numéro de téléphone de l'association." required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Site web de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="siteAssoc" placeholder="Entrez le site web de l'association." required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description de l'association :</label>
                                <textarea class="form-control" id="descAssoc" rows="3" placeholder="Entrez une description de votre association."></textarea>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Facebook de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="facebookAssoc" placeholder="Entrez l'adresse de votre association.">
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Instagram de l'association :</label>
                                <input type="pseudo" class="form-control align-center" id="instagramAssoc" placeholder="Entrez l'adresse de votre association.">
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                    en quarantaine:</label>
                                <input type="pseudo" class="form-control align-center" id="placesQuarantaineAssoc" placeholder="Entrez le nombre de place disponible en quarantaine." required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nombre de places disponibles pour les animaux
                                    en règles:</label>
                                <input type="pseudo" class="form-control align-center" id="placesReglesAssoc" placeholder="Entrez le nombre de place disponible en règle." required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Numéro de compte en banque (Optionnel pour dons financiers) :</label>
                                <input type="pseudo" class="form-control align-center" id="iban" placeholder="Entrez le numéro de compte en banque de l'association.">
                            </div>
                            <div class="form-group">
								<label for="exampleFormControlTextarea1">Pour quel type d'animal : </label></br>
								<select class="form-control align-center" id="typeAnimalAssoc">
									<option value="Chat">Chat</option>
                                    <option value="Chien">Chien</option>
                                    <option value="Autre">Autre</option>
								</select>
                                <span class="form_error" style="color:red"></span>
							</div></br></br>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Logo de l'association :</label>
                                <input type="file" class="form-control-file" id="imageAssoc" required>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LeqO_0UAAAAANTmzQNAEOF0a7SSXk_ZNkFtSQjL"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Ajouter mon association sur le site</button>
                            </div>
                            <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            <p id="assocDejaPresente" style="display : none; color : red">L'association semble déjà présente dans la base de données.</p>
                            <p id="extPasOk" style="display : none; color : red">L'image doit-être un png ou un jpg.</p>
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