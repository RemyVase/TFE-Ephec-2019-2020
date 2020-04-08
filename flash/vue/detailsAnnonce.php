<?php
session_start();
$currentPage = "detailAnnonce";
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
									<li><span>Etat (neuf, presque neuf, usé, très usé,..)</span>: <?= $recupOneAnnonce[0]{'etat_offre'}; ?></li>
									<li><span>Pour quel type d'animal</span>: <?= $recupOneAnnonce[0]{'typeAnimal_offre'}; ?></li>
									<li><span>Type d'objet</span>: <?= $recupOneAnnonce[0]{'typeObjet_offre'}; ?></li></br></br></br>
									<li><span>Contact</span>: 						<a href="contact.php">
										<form method="post" action="contactAssocToUser.php"><button value="<?= $recupOneAnnonce[0]{'id_user'}; ?>" type="submit" name="idReceveur" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></form>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
					<h4>Description de l'offre :</h4>
					<p><?= $recupOneAnnonce[0]{'desc_offre'}; ?></p>
				</div>
			</div>
        </section>
    <!--================End Portfolio Details Area =================-->

<?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>