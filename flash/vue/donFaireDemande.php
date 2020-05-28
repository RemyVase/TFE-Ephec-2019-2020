<?php
session_start();
$currentPage = "donFaireDemande";
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

<?php include 'header.php' ?>

	<!--================Home Banner Area =================-->
	<section class="banner_area_demandeOffre">
		<div class="box_1620">
			<div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Dons</h2>
						<div class="page_link">
							<p style="color:white">Il manque quelque chose dans votre association ? Créez donc une demande afin de voir si quelqu'un peut vous aider !</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Contact Area =================-->

	<div class="container pad_top pad_bt md-center">
		<div class="col-lg-12 md-center">

			<div class="align-center">
				<form id="ajoutDemande_form" name="ajoutDemande_form" method="post" action="#" novalidate>
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="titreObjectDemande">Titre de l'annonce : </label>
								<input type="pseudo" class="form-control align-center" id="titreAnnonceDemande"
									placeholder="Entrez le titre de votre annonce.">
									<span class="form_error" style="color:red"></span>
							</div>
							<div class="form-group">
								<label for="titreObjectDemande">Ville ou se trouve l'association : </label>
								<input type="pseudo" class="form-control align-center" id="villeAnnonceDemande"
									placeholder="Entrez la ville où se trouve l'association.">
									<span class="form_error" style="color:red"></span>
							</div>
							<div class="form-group">
								<label for="descriptionObjectDemande">Description de(s) Objet(s) :</label>
								<textarea class="form-control" id="descAnnonceDemande" rows="3"
									placeholder="Entrez une description pour votre annonce."></textarea>
									<span class="form_error" style="color:red"></span>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Pour quel type d'animal : </label></br>
								<select class="form-control align-center" id="typeAnimalAnnonceDemande">
									<option value="Chat">Chat</option>
									<option value="Chien">Chien</option>
									<option value="Autre">Autre</option>
								</select>
								<span class="form_error" style="color:red"></span>
							</div></br></br>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Type d'objet : </label></br>
								<select class="form-control align-center" id="typeObjetAnnonceDemande">
									<option value="Jouet">Jouet</option>
									<option value="Bien-être">Bien-être</option>
									<option value="Nourriture">Nourriture</option>
								</select>
								<span class="form_error" style="color:red"></span>
							</div></br></br>
							<div class="form-group">
								<label for="imageObjectDemande">Image de l'annonce :</label>
								<input type="file" class="form-control-file" id="imageAnnonceDemande">
								<span class="form_error" style="color:red"></span>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-dark">Ajouter la demande</button>
							</div>
							<p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            <p id="demandeDejaLa" style="display : none; color : red">L'offre semble déjà présente dans la base de données.</p>
                            <p id="extPasOk" style="display : none; color : red">L'image doit-être un png ou un jpg.</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--================Contact Area =================-->

	<?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>