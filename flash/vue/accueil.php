<?php
session_start();
$currentPage = "accueil";
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

<?php include 'header.php' ?>

	<!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="box_1620">
			<div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h3>HelPet's</h3>
						<p>Aidez-nous à offrir une vie meilleure aux animaux errants </p>
						<a class="main_btn" href="#">Que faisons-nous ?</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Home Blog Area =================-->
	<section class="home_blog_area pad_top pad_bt">
		<div class="container">
			<div class="home_blog_inner">
				<div class="row h_blog_item">
					<div class="col-lg-6">
						<div class="h_blog_img">
							<img class="img-fluid" src="../img/chatTriste.jpeg" alt="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="h_blog_text">
							<div class="h_blog_text_inner left">
								<h4>Qui sommes-<br />Nous</h4>
								<p>.. est une plateforme web visant à promouvoir le sauvetage, la prise en charge et l’adoption d’animaux errants tout en soutenant les différents organismes de défense des animaux qui, tous les jours, travaillent au service du bien-être animal. </p>
								<a class="main_btn2" href="#">Aller vers les associations</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row h_blog_item">
					<div class="col-lg-6">
						<div class="h_blog_text">
							<div class="h_blog_text_inner right">
								<h4>Un soutient pour <br />les organismes de défense des animaux</h4>
								<p>L’un de nos principaux objectifs est de promouvoir et de rendre plus visible les différents organismes (refuges, associations,…) luttant pour le bien-être animal. </p>
								<p>Pour faciliter la prise de contact et favoriser le placement des animaux errants, nous mettons à votre disposition un annuaire reprenant les coordonnées des différents organismes participatifs. </p>
								<p>Ce site permet également aux différents organismes d’échanger entre eux, de partager quotidiennement les places encore disponibles ou leurs besoins spécifiques dans la rubrique « dons ».</p>
								<a class="main_btn2" href="#">Aller vers la plateforme de dons</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="h_blog_img">
							<img class="img-fluid" src="../img/chienSauve.jpeg" alt="">
						</div>
					</div>
				</div>
				<div class="row h_blog_item">
					<div class="col-lg-6">
						<div class="h_blog_img">
							<img class="img-fluid" src="../img/chatAdopte3.jpeg" alt="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="h_blog_text">
							<div class="h_blog_text_inner left">
								<h4>Adopter ou placer <br />un animal errant </h4>
								<p>Notre principal objectif est de faciliter le placement des animaux errants dans un organisme, et de promouvoir ainsi leur bien-être et leur future adoption. </p>
								<p>Dans la rubrique « Comment sauver un animal ? », nous vous expliquons les différentes marches à suivre pour placer un animal errant dans un organisme où celui-ci pourra être pris correctement en charge. </p>
								<p>Vous souhaitez adopter un animal ? Toutes les annonces d’animaux mis à l’adoption par les différents organismes participatifs figurent dans la rubrique « Adoption ». </p>
								<a class="main_btn2" href="#">Aller à la liste des animaux disponibles à l'adoption</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row h_blog_item">
					<div class="col-lg-6">
						<div class="h_blog_text">
							<div class="h_blog_text_inner right">
								<h4>Faire un don </h4>
								<p>…… vous donne l’opportunité de soutenir et venir en aide aux différents organismes qui luttent pour la cause animale en faisant des dons de quelque nature qu’ils soient (matériel à donner, nourriture, soutien financier, etc.).</p>
								<p>L’espace « dons » offre également la possibilité aux différents organismes de soumettre leurs demandes et besoins spécifiques au grand public et faire appel à leur solidarité. </p>
								<a class="main_btn2" href="#">Aller vers la plateforme de dons</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="h_blog_img">
							<img class="img-fluid" src="../img/chatJouet.jpeg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Blog Area =================-->

<?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>