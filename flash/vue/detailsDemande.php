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
									<li><span>Pour quel type d'animal</span>: <?= $recupOneDemande[0]{'typeAnimal_demande'}; ?></li>
									<li><span>Type d'objet</span>: <?= $recupOneDemande[0]{'typeObjet_demande'}; ?></li></br></br></br>
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
<?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>
</html>