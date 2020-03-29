<?php
session_start();
$currentPage = "donDemande";
include '../controller/listeDemandesController.php';
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
						<h2>Project Details</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="projects.html">Projects</a>
							<a href="project-details.html">Project Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Portfolio Details Area =================-->
	<section>
		<div class="container pad_bt md-center">
			<div class="col-lg-12 md-center" align="center">
				<div class="align-center">
					<div class="text-center">
						<label>Type d'animal :</label>
						<a href="donDemande.php?p=1&typeAnimal=Chat"><button class="btn btn-dark" style="margin-right:1em; font-size:0.8em;">Chats</button></a>
						<a href="donDemande.php?p=1&typeAnimal=Chien"><button class="btn btn-dark" style="margin-right:1em; font-size:0.8em;">Chiens</button></a>
						<label>Type d'objet :</label>
						<a href="donDemande.php?p=1&typeObjet=Jouet"><button class="btn btn-dark" style="margin-right:1em; font-size:0.8em;">Jouet</button></a>
						<a href="donDemande.php?p=1&typeObjet=Bien-être"><button class="btn btn-dark" style="margin-right:1em; font-size:0.8em;">Bien-être</button></a>
						<a href="donDemande.php?p=1&typeObjet=Nourriture"><button class="btn btn-dark" style="margin-right:1em; font-size:0.8em;">Nourriture</button></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php foreach ($recupAllDemande as $demande) : ?>
		<div class="container">
			<div class="col-md-12">
				<div class="row pad_top_dons pad_bt_dons border border-white">
					<div class="col-sm-3">
						<div class="text-center">
							<img class="img-thumbnail imgCoupe mx-auto text-center " src="<?= $demande['img']; ?>" alt="">
						</div>
					</div>
					<div class="col-sm-3 text-center">
						<h4>Nom de l'annonce</h4></br>
						<p><?= $demande['titre_demande']; ?></p>
					</div>
					<div class="col-sm-2 text-center">
						<h4>Ville</h4></br>
						<p><?= $demande['ville_demande']; ?></p>
					</div>
					<div class="col-sm-2 text-center">
						<h4>Détails</h4></br></br>
						<a href="detailsDemande.php">
							<form method="post" action="detailsDemande.php"><button value="<?= $demande['id_demande']; ?>" type="submit" name="buttonDemande" class="btn btn-dark align-items-center "><i class="fa fa-plus" style="color:white"></i></button></form>
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
					<li class="page-item"><a href="http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/donDemande.php?p=<?= $i; ?>" class="page-link"><?= $i ?></a></li>
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
	<!--================End Portfolio Details Area =================-->

	<?php include 'footer.php' ?>
	<?php include 'jquery.php' ?>
</body>

</html>