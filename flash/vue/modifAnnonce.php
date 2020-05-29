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
						<h2>Votre offre</h2>
						<p style="color: white">Modifiez votre offre</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Contact Area =================-->
	<?php if (!empty($checkUserAnnonce)) : ?>
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
				<div class="col-lg-12 md-center" align="center">
					<div class="align-center">
						<div class="text-center">
							<button id="afficherModifAnnonce" class="btn btn-dark" style="margin-right:2em">Modifier l'annonce</button>
							<button id="supprimerAnnonce" class="btn btn-dark" style="margin-left:2em">Supprimer l'annonce</button>
							<a id="supprimerAnnonceDef" href="../controller/deleteAnnonceController.php?token=<?= $_SESSION['token'] ?>" style="display:none"><button  class="btn btn-dark" style="margin-left:2em;">Valider la suppression</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="modifAnnonce" style='display:none'>
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
										<span class="form_error" style="color:red"></span>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Description du/des objet(s) :</label>
										<textarea class="form-control" id="descAnnonceOffreModif" rows="3"><?= $recupOneAnnonce[0]{'desc_offre'}; ?></textarea>
										<span class="form_error" style="color:red"></span>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Ville :</label>
										<input type="pseudo" class="form-control align-center" id="villeAnnonceOffreModif" value="<?= $recupOneAnnonce[0]{'ville_offre'}; ?>">
										<span class="form_error" style="color:red"></span>
									</div>
									<input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
									<div class="text-center">
										<button type="submit" class="btn btn-dark">Modifier l'annonce</button>
									</div>
									<p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
								</div>
							</div>
						</form>
						<br>
						<br>
						<br>

						<h2 align="center">Modification des champs sélectionnables de l'offre</h2>
						<small class="form-text text-muted" align="center">(Veillez à bien remettre tous les champs ci-dessous comme vous le souhaitez)</small>
						<br>
						<form id="modifOffreSelect_form" method="post" action="#" novalidate>
							<div class="row justify-content-center">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Etat :</label><br>
										<select class="form-control align-center" id="etatAnnonceOffreModif">
											<option value="Neuf">Neuf</option>
											<option value="Presque neuf">Presque neuf</option>
											<option value="Usé">Usé</option>
											<option value="Très usé">Très usé</option>
										</select>
										<span class="form_error" style="color:red"></span>
									</div><br><br>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Pour quel type d'animal : </label><br>
										<select class="form-control align-center" id="typeAnimalAnnonceOffreModif">
											<option value="Chat">Chat</option>
											<option value="Chien">Chien</option>
											<option value="Autre">Autre</option>
										</select>
										<span class="form_error" style="color:red"></span>
									</div><br><br>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Type d'objet : </label></br>
										<select class="form-control align-center" id="typeObjetAnnonceOffreModif">
											<option value="Jouet">Jouet</option>
											<option value="Bien-être">Bien-être</option>
											<option value="Nourriture">Nourriture</option>
										</select>
										<span class="form_error" style="color:red"></span>
									</div><br><br>
									<input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
									<div class="text-center">
										<button type="submit" class="btn btn-dark">Modifier les champs sélectionnables</button>
									</div>
									<p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
								</div>
							</div>
						</form><br><br>

						<h2 align="center">Modification de l'image de l'offre</h2>
						<br>
						<form id="modifImgOffre_form" method="post" action="#" novalidate>
							<div class="row justify-content-center">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleFormControlFile1">Image de l'annonce :</label>
										<input type="file" class="form-control-file" id="imageAnnonceOffreModif">
										<span class="form_error" style="color:red"></span>
									</div>
									<input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
									<div class="text-center">
										<button type="submit" class="btn btn-dark">Modifier l'image de l'offre</button>
									</div>
									<p id="extPasOk" style="display : none; color : red">L'image doit-être un png ou un jpg.</p>
									<p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	<?php else : ?>
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