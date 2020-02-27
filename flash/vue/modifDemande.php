<?php
session_start();
$currentPage = "modifDemande";
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
				<form>
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="titreObjectDemande">Titre de l'annonce : </label>
								<input type="pseudo" class="form-control align-center" id="titreAnnonceDemandeModif"
									placeholder="Entrez le titre de votre annonce.">
							</div>
							<div class="form-group">
								<label for="imageObjectDemandeModif">Image de l'annonce :</label>
								<input type="file" class="form-control-file" id="imageAnnonceDemandeModif">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-dark">Modifier la demande</button>
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