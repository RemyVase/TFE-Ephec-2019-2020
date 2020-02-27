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
				<form>
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Titre de l'annonce : </label>
								<input type="pseudo" class="form-control align-center" id="titreAnnonce"
									placeholder="Entrez le titre de votre annonce.">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Description du/des objet(s) :</label>
								<textarea class="form-control" id="descAnnonce" rows="3"
									placeholder="Entrez une description pour votre annonce."></textarea>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Ville :</label>
								<input type="pseudo" class="form-control align-center" id="villeAnnonce"
									placeholder="Entrez la ville dans laquelle se trouve le(s) objet(s) de l'annonce.">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Etat du/des objet(s):</label>
								<div class="radio">
									<label><input type="radio" name="optradio" value="neuf" checked>Presque neuf</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="optradio" value="use">Usé</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="optradio" value="fullUse">Très usé</label>
								</div>
							</div>

							<div class="form-group">
								<label for="exampleFormControlFile1">Image de l'annonce :</label>
								<input type="file" class="form-control-file" id="imageAnnonce">
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