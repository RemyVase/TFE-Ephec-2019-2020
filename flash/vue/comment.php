<?php
session_start();
$currentPage = "comment";
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

<?php include 'header.php' ?>
<!--================Home Banner Area =================-->
<section class="banner_area_tuto">
	<div class="box_1620">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2 style="color:white">Vous avez trouvé un animal errant et vous souhaitez lui trouver une place rapidement dans un refuge ou une association ? Rien de plus simple.</h2>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================About Area =================-->
<section class="about_area pad_top">
	<div class="container">
		<div class="about_inner row">
			<div class="col-lg-6">
				<div class="about_text">
				<h3>Tout d'abord ! </h3><br>
					<p>Commencez par créer un compte en cliquant sur « Inscription » pour pouvoir entrer en contact et interagir directement avec l’organisme de votre choix.</p></br>
					
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about_img"><img class="img-fluid" src="../img/contrat.jpeg" alt=""></div>
			</div>
		</div>
	</div>
</section>

<section class="about_area pad_top">
	<div class="container">
		<div class="about_inner row">
			<div class="col-lg-6">
				<div class="about_text">
				<h3>Ensuite </h3><br>
					<p>Pour faciliter le travail du refuge ou de l’association qui prendra en charge l’animal, vérifiez si celui-ci n’est pas pucé. </p><br>
					<p>Si l’animal n’est pas pucé, cherchez un organisme dans lequelle il reste des places disponibles. </p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about_img"><img class="img-fluid" src="../img/multipleChats.jpeg" alt=""></div>
			</div>
		</div>
	</div>
</section>

<section class="about_area pad_top pad_bt">
	<div class="container">
		<div class="about_inner row">
			<div class="col-lg-6">
				<div class="about_text">
				<h3>Enfin </h3><br>
					<p>Prenez contact avec l’organisme et envoyez-leur un petit descriptif de l’animal (état de santé, mâle ou femelle, âge approximatif, etc.).  </p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about_img"><img class="img-fluid" src="../img/multipleChats.jpeg" alt=""></div>
			</div>
		</div>
	</div>
</section>
<!--================End About Area =================-->

<?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>