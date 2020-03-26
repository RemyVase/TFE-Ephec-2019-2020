<?php
session_start();
$currentPage = "modifDemande";
include '../controller/uneDemandeController.php';
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
	<?php if(!empty($checkAssocDemande)) : ?>
		<section class="portfolio_details_area p_120">
			<div class="container">
				<div class="portfolio_details_inner">
					<div class="row">
						<div class="col-md-5">
							<div class="left_img">
								<img class="img-fluid" src="<?= $recupOneDemande[0]{'img'}; ?>" alt="">
							</div>
						</div>
						<div class="col-md-7">
							<div class="portfolio_right_text">
								<h4><?= $recupOneDemande[0]{'titre_demande'}; ?></h4>
								<ul class="list">
									<li><span>Donateur</span>: <?= $recupOneDemande[0]{'nom_assoc'}; ?></li>
									<li><span>Ville</span>: <?= $recupOneDemande[0]{'ville_demande'}; ?></li>
									<li><span>Contact</span>: <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>
								</ul>
							</div>
						</div>
					</div>
					<h4>Description de la demande :</h4>
					<p><?= $recupOneDemande[0]{'desc_demande'}; ?></p>
				</div>
			</div>
		</section>

		<section>
			<div class="container pad_bt md-center">
				<div class="col-lg-12 md-center">
					<h2 align="center">Modification des informations de la demande</h2>
					<br>
					<div class="align-center">
					<form id="modifDemande_form" method="post" action="#" novalidate>
						<div class="row justify-content-center">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="titreObjectDemande">Titre de la demande: </label>
									<input type="pseudo" class="form-control align-center" id="titreAnnonceDemandeModif"
										value="<?= $recupOneDemande[0]{'titre_demande'}; ?>">
								</div>
								<div class="form-group">
									<label for="titreObjectDemande">Ville où se trouve l'association : </label>
									<input type="pseudo" class="form-control align-center" id="villeAnnonceDemandeModif"
										value="<?= $recupOneDemande[0]{'ville_demande'}; ?>">
								</div>
								<div class="form-group">
									<label for="descriptionObjectDemande">Description de(s) Objet(s) :</label>
									<textarea class="form-control" id="descAnnonceDemandeModif" rows="3"><?= $recupOneDemande[0]{'desc_demande'}; ?></textarea>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-dark">Modifier la demande</button>
								</div>
							</div>
						</div>
					</form>
				</div>
						
						<br>
						<br>
						<br>
						<h2 align="center">Modification de l'image de la demande</h2>
						<br>
						<form id="modifImgDemande_form" method="post" action="#" novalidate>
							<div class="row justify-content-center">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="imageObjectDemandeModif">Image de la demande :</label>
										<input type="file" class="form-control-file" id="imageAnnonceDemandeModif">
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-dark">Modifier l'image de la demande sur le site</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	<?php else: ?>
		<section class="portfolio_details_area p_120">
			<div class="container">
				<div class="portfolio_details_inner">
					<div class="row">
						<div class="col-md-5">
							<div class="left_img">
								<img class="img-fluid" src="<?= $recupOneDemande[0]{'img'}; ?>" alt="">
							</div>
						</div>
						<div class="col-md-7">
							<div class="portfolio_right_text">
								<h4><?= $recupOneDemande[0]{'titre_demande'}; ?></h4>
								<ul class="list">
									<li><span>Donateur</span>: <?= $recupOneDemande[0]{'nom_assoc'}; ?></li>
									<li><span>Ville</span>: <?= $recupOneDemande[0]{'ville_demande'}; ?></li>
									<li><span>Contact</span>: <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>
								</ul>
							</div>
						</div>
					</div>
					<h4>Description de la demande :</h4>
					<p><?= $recupOneDemande[0]{'desc_demande'}; ?></p>
				</div>
			</div>
		</section>
		<section>
			<div class="container pad_bt md-center">
				<div class="col-lg-12 md-center">
					<h2 align="center" style="color:red !important">BHA ET ALORS ON ESSAIE DE MODIFIER UNE DEMANDE QUI N'EST PAS LA SIENNE ? VILAIN</h2>
				</div>
			</div>
		</section>
	<?php endif ?>
	<!--================Contact Area =================-->

	<?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>