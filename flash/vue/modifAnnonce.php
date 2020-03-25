<?php
session_start();
$currentPage = "modifAnnonce";
include '../controller/uneAnnonceController.php';
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
	<?php if(!empty($checkUserAnnonce)) : ?>
		<section class="portfolio_details_area p_120">
			<div class="container">
				<div class="portfolio_details_inner">
					<div class="row">
						<div class="col-md-5">
							<div class="left_img">
								<img class="img-fluid" src="<?= $recupOneAnnonce[0]{'img'}; ?>" alt="">
							</div>
						</div>
						<div class="col-md-7">
							<div class="portfolio_right_text">
								<h4><?= $recupOneAnnonce[0]{'titre_offre'}; ?></h4>
								<ul class="list">
									<li><span>Donateur</span>: <?= $recupOneAnnonce[0]{'pseudo_user'}; ?></li>
									<li><span>Ville</span>: <?= $recupOneAnnonce[0]{'ville_offre'}; ?></li>
									<li><span>Etat (neuf, presque neuf, usé, très usé,..)</span>: <?= $recupOneAnnonce[0]{'etat_offre'}; ?></li></br></br></br>
									<li><span>Contact</span>: <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>
								</ul>
							</div>
						</div>
					</div>
					<h4>Description de l'offre :</h4>
					<p><?= $recupOneAnnonce[0]{'desc_offre'}; ?></p>
				</div>
			</div>
		</section>

		<section>
			<div class="container pad_bt md-center">
				<div class="col-lg-12 md-center">
					<h2 align="center">Modification des informations de l'offre</h2>
					<br>
					<div class="align-center">
						<form id="modifOffre_form" name="modifOffre_form" method="post" action="#" novalidate>
							<div class="row justify-content-center">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Titre de l'annonce : </label>
										<input type="pseudo" class="form-control align-center" id="titreAnnonceOffreModif" value="<?= $recupOneAnnonce[0]{'titre_offre'}; ?>">
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Description du/des objet(s) :</label>
										<textarea class="form-control" id="descAnnonceOffreModif" rows="3"><?= $recupOneAnnonce[0]{'desc_offre'}; ?></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Ville :</label>
										<input type="pseudo" class="form-control align-center" id="villeAnnonceOffreModif" value="<?= $recupOneAnnonce[0]{'ville_offre'}; ?>">
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Etat(neuf/usé/...) :</label>
										<input type="pseudo" class="form-control align-center" id="etatAnnonceOffreModif" value="<?= $recupOneAnnonce[0]{'etat_offre'}; ?>">
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-dark">Modifier l'annonce</button>
									</div>
								</div>
							</div>
						</form>
						<br>
						<br>
						<br>
						<h2 align="center">Modification de l'image de l'offre</h2>
						<br>
						<form id="modifImgOffre_form" method="post" action="#" novalidate>
							<div class="row justify-content-center">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleFormControlFile1">Image de l'annonce :</label>
										<input type="file" class="form-control-file" id="imageAnnonceOffreModif">
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-dark">Modifier l'image de l'offre sur le site</button>
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
								<img class="img-fluid" src="<?= $recupOneAnnonce[0]{'img'}; ?>" alt="">
							</div>
						</div>
						<div class="col-md-7">
							<div class="portfolio_right_text">
								<h4><?= $recupOneAnnonce[0]{'titre_offre'}; ?></h4>
								<ul class="list">
									<li><span>Donateur</span>: <?= $recupOneAnnonce[0]{'pseudo_user'}; ?></li>
									<li><span>Ville</span>: <?= $recupOneAnnonce[0]{'ville_offre'}; ?></li>
									<li><span>Etat (neuf, presque neuf, usé, très usé,..)</span>: <?= $recupOneAnnonce[0]{'etat_offre'}; ?></li></br></br></br>
									<li><span>Contact</span>: <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>
								</ul>
							</div>
						</div>
					</div>
					<h4>Description de l'offre :</h4>
					<p><?= $recupOneAnnonce[0]{'desc_offre'}; ?></p>
				</div>
			</div>
		</section>
		<section>
			<div class="container pad_bt md-center">
				<div class="col-lg-12 md-center">
					<h2 align="center" style="color:red !important">BHA ET ALORS ON ESSAIE DE MODIFIER UNE OFFRE QUI N'EST PAS LA SIENNE ? VILAIN</h2>
				</div>
			</div>
		</section>
	<?php endif ?>
		<!--================Contact Area =================-->


		<?php include 'footer.php' ?>
		<?php include 'jquery.php' ?>
</body>

</html>