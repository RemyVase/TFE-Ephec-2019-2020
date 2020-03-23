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
						<h2>Créez une offre de dons</h2>
						<p style="color: white">Offrez votre aide aux associations</p>
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
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Description du/des objet(s) :</label>
								<textarea class="form-control" id="descAnnonceOffre" rows="3"
									placeholder="Entrez une description pour votre annonce."></textarea>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Ville :</label>
								<input type="pseudo" class="form-control align-center" id="villeAnnonceOffre"
									placeholder="Entrez la ville dans laquelle se trouve le(s) objet(s) de l'annonce.">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Etat(neuf/usé/...) :</label>
								<input type="pseudo" class="form-control align-center" id="etatAnnonceOffre"
									placeholder="Entrez l'état de l'objet. (S'il est usé, très usé, neuf ou presque neuf)">
							</div>
							<div class="form-group">
								<label for="exampleFormControlFile1">Image de l'annonce :</label>
								<input type="file" class="form-control-file" id="imageAnnonceOffre">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-dark">Ajouter l'annonce</button>
							</div>
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