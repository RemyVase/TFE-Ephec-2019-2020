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
						<h2>Dons</h2>
						<div class="page_link">
							<p style="color:white">Demandes de dons</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Portfolio Details Area =================-->
	<section>
		<div class="container pad_bt md-center" style="padding-top:3%">
			<div class="col-lg-12 md-center" align="center">
				<div class="row">
					<div class="col align-self-center" style="font-size:11px">
					<h5>TRI : </h5>
						Type d'animal :
						
							<select onchange="location = this.value;">
								<option value="donDemande.php">Tous</option>
								<option value="donDemande.php?p=1&typeAnimal=Chat">Chat</option>
								<option value="donDemande.php?p=1&typeAnimal=Chien">Chien</option>
							</select>
						
						Type d'objet :
						
							<select onchange="location = this.value;">
								<option value="donDemande.php">Tous</option>
								<option value="donDemande.php?p=1&typeObjet=Jouet">Jouet</option>
								<option value="donDemande.php?p=1&typeObjet=Bien-être">Bien-être</option>
								<option value="donDemande.php?p=1&typeObjet=Nourriture">Nourriture</option>
							</select>
						
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
						<a href="contact.php">
							<form method="post" action="contact.php"><button value="<?= $demande['id_assoc']; ?>" type="submit" name="idReceveur" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></form>
						</a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<div>
		<nav class="blog-pagination justify-content-center d-flex">
			<ul class="pagination">
				<?php for ($i = 1; $i <= $nbPages; $i++) { ?>
					<li class="page-item"><a href="donDemande.php?p=<?= $i; ?>" class="page-link"><?= $i ?></a></li>
				<?php } ?>
			</ul>
		</nav>
	</div>
	<!--================End Portfolio Details Area =================-->

	<?php include 'footer.php' ?>
	<?php include 'jquery.php' ?>
</body>

</html>