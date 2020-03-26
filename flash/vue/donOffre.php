<?php
session_start();
$currentPage = "donOffre";
include '../controller/listeOffresController.php';
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

	<?php include 'header.php' ?>

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="box_1620">
			<div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Dons</h2>
						<div class="page_link">
							<a href="index.html">Dons</a>
							<a href="projects.html">Offres de dons</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Home Blog Area =================-->
	<?php foreach ($recupAllOffre as $offre) : ?>
		<div class="container">
			<div class="col-md-12">
				<div class="row pad_top_dons pad_bt_dons border border-white">
					<div class="col-sm-3">
						<div class="text-center">
							<img class="img-thumbnail imgCoupe mx-auto text-center " src="<?= $offre['img']; ?>" alt="">
						</div>
					</div>
					<div class="col-sm-3 text-center">
						<h4>Nom de l'annonce</h4></br>
						<p><?= $offre['titre_offre']; ?></p>
					</div>
					<div class="col-sm-2 text-center">
						<h4>Ville</h4></br>
						<p><?= $offre['ville_offre']; ?></p>
					</div>
					<div class="col-sm-2 text-center">
						<h4>Détails</h4></br></br>
						<a href="detailsAnnonce.php">
						<form method="post" action="detailsAnnonce.php"><button value="<?= $offre['id_offre']; ?>" type="submit" name="buttonOffre" class="btn btn-dark align-items-center "><i class="fa fa-plus" style="color:white"></i></button></form>
					</a>
					</div>
					<div class="col-sm-2 text-center">
						<h4>Contacts</h4></br></br>
						<a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<div>
		<nav class="blog-pagination justify-content-center d-flex">
			<ul class="pagination">
				<li class="page-item">
					<a href="#" class="page-link" aria-label="Previous">
						<span aria-hidden="true">
							<span class="lnr lnr-chevron-left"></span>
						</span>
					</a>
				</li>
				<?php for ($i = 1; $i <= $nbPages; $i++) { ?>
					<li class="page-item"><a href="http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/donOffre.php?p=<?= $i; ?>" class="page-link"><?= $i ?></a></li>
				<?php } ?>
				<li class="page-item">
					<a href="#" class="page-link" aria-label="Next">
						<span aria-hidden="true">
							<span class="lnr lnr-chevron-right"></span>
						</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<!--================End Home Blog Area =================-->


	<?php include 'footer.php' ?>
	<?php include 'jquery.php' ?>
</body>

</html>