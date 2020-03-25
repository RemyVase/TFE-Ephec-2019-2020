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
						<p>Aidez à construire un avenir meilleur pour les animaux errants.</p>
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
								<h4>Objectif <br />Premier</h4>
								<p>Notre principal objectif est d'aider les animaux errants à trouver un endroit dans
									lequel ils seront pris en charge, correctemment soignés et traités, en attendant
									d'être reccueillis par une famille aimante.</p>
								<a class="main_btn2" href="#">Aller vers les associations</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row h_blog_item">
					<div class="col-lg-6">
						<div class="h_blog_text">
							<div class="h_blog_text_inner right">
								<h4>Objectif <br />Second</h4>
								<p>Soutenir les divers organismes luttant jour après jour pour le bien-être des animaux
									errants en leur mettant à disposition une plateforme de dons accessible à toutes
									personnes souhaitant leur venir en aide.</p>
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
								<h4>Dernier <br />Objectif</h4>
								<p>Promouvoir l'adoption des animaux disponibles dans les divers organismes.</p>
								<a class="main_btn2" href="#">Aller à la liste des animaux disponibles à l'adoption</a>
							</div>
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