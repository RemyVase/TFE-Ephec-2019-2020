<?php
session_start();
$currentPage = "donFaireOffre";
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

<?php include 'header.php' ?>

	<!--================Home Banner Area =================-->
	<section class="banner_area_faireOffre">
		<div class="box_1620">
			<div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
					<h2 style="color:white">Faire un don</h2>
						<div class="page_link">
							<p style="color:white">Vous souhaitez soutenir ou venir en aide aux différents organismes en faisant un don ? Créez votre annonce ou rendez-vous directement sur le site de l’organisme auquel vous souhaitez soumettre votre don. </p>
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
				<form id="ajoutOffre_form" name="ajoutOffre_form" method="post" action="#" novalidate>
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Titre de l'annonce : </label>
								<input type="pseudo" class="form-control align-center" id="titreAnnonceOffre"
									placeholder="Entrez le titre de votre annonce.">
									<span class="form_error" style="color:red"></span>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Description du/des objet(s) :</label>
								<textarea class="form-control" id="descAnnonceOffre" rows="3"
									placeholder="Entrez une description pour votre annonce."></textarea>
									<span class="form_error" style="color:red"></span>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Ville :</label>
								<input type="pseudo" class="form-control align-center" id="villeAnnonceOffre"
									placeholder="Entrez la ville dans laquelle se trouve le(s) objet(s) de l'annonce.">
									<span class="form_error" style="color:red"></span>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Etat :</label><br>
								<select class="form-control align-center" id="etatAnnonceOffre">
									<option value="Neuf">Neuf</option>
									<option value="Presque neuf">Presque neuf</option>
									<option value="Usé">Usé</option>
									<option value="Très usé">Très usé</option>
								</select>
								<span class="form_error" style="color:red"></span>
							</div></br></br>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Pour quel type d'animal : </label></br>
								<select class="form-control align-center" id="typeAnimalAnnonceOffre">
									<option value="Chat">Chat</option>
									<option value="Chien">Chien</option>
								</select>
								<span class="form_error" style="color:red"></span>
							</div></br></br>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Type d'objet : </label></br>
								<select class="form-control align-center" id="typeObjetAnnonceOffre">
									<option value="Jouet">Jouet</option>
									<option value="Bien-être">Bien-être</option>
									<option value="Nourriture">Nourriture</option>
								</select>
								<span class="form_error" style="color:red"></span>
							</div></br></br>
							<div class="form-group">
								<label for="exampleFormControlFile1">Image de l'annonce :</label>
								<input type="file" class="form-control-file" id="imageAnnonceOffre">
								<span class="form_error" style="color:red"></span>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-dark">Ajouter l'annonce</button>
							</div>
							<p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            <p id="annonceDejaLa" style="display : none; color : red">L'offre semble déjà présente dans la base de données.</p>
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