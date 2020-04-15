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
    <section class="banner_area_animauxAdoption">
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
                <form id="ajoutAnimal_form" name="ajoutAnimal_form" method="post" action="#" novalidate>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom de l'animal : </label>
                                <input type="pseudo" class="form-control align-center" id="nomAnimal" placeholder="Entrez le nom de l'animal.">
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Age de l'animal : </label>
                                <input type="pseudo" class="form-control align-center" id="ageAnimal" placeholder="Entrez l'âge de l'animal.">
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ville ou le trouver :</label>
                                <input type="pseudo" class="form-control align-center" id="villeAnimal" placeholder="Entrez la ville ou trouver l'animal.">
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description de l'animal:</label>
                                <textarea class="form-control" id="descAnimal" rows="3" placeholder="Entrez une description de l'animal."></textarea>
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="form-group">
								<label for="exampleFormControlTextarea1">Pour quel type d'animal : </label></br>
								<select class="form-control align-center" id="typeAnimal">
									<option value="Chat">Chat</option>
									<option value="Chien">Chien</option>
								</select>
                                <span class="form_error" style="color:red"></span>
							</div></br></br>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Photo de l'animal :</label>
                                <input type="file" class="form-control-file" id="imageAnimal">
                                <span class="form_error" style="color:red"></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Ajouter l'animal sur le site</button>
                            </div><p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            <p id="extPasOk" style="display : none; color : red">L'image doit-être un png ou un jpg.</p>
                            <p id="animalDeja" style="display : none; color : red">L'animal semble déjà présent sur le site ! Vérifiez que vous ne l'ayiez pas déjà encodé.</p>
                            
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
