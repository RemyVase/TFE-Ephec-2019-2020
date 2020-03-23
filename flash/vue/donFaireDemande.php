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
						<h2>Projects</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="projects.html">Projects</a>
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
							</div>
							<div class="form-group">
								<label for="titreObjectDemande">Ville ou se trouve l'association : </label>
								<input type="pseudo" class="form-control align-center" id="villeAnnonceDemande"
									placeholder="Entrez la ville où se trouve l'association.">
							</div>
							<div class="form-group">
								<label for="descriptionObjectDemande">Description de(s) Objet(s) :</label>
								<textarea class="form-control" id="descAnnonceDemande" rows="3"
									placeholder="Entrez une description pour votre annonce."></textarea>
							</div>
							<div class="form-group">
								<label for="imageObjectDemande">Image de l'annonce :</label>
								<input type="file" class="form-control-file" id="imageAnnonceDemande">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-dark">Ajouter la demande</button>
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