<?php
session_start();
$currentPage = "lesAssociations";
include "../controller/listeAssociationsController.php"
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

    <?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area_assoc">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Les associations</h2>
                        <div class="page_link">
                            <p style=" color: white;">Liste des différentes associations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Home Blog Area =================-->
    <section>
		<div class="container pad_bt md-center" style="padding-top:3%">
			<div class="col-lg-12 md-center" align="center">
                <div class="row">
					<div class="col align-self-center" style="font-size:11px">
					<h5>TRI : </h5>
						Type d'animal :
						
							<select onchange="location = this.value;">
								<option value="lesAssociations.php">Tous</option>
								<option value="lesAssociations.php?p=1&typeAnimal=Chat">Chat</option>
								<option value="lesAssociations.php?p=1&typeAnimal=Chien">Chien</option>
							</select>
						
					</div>
				</div>
			</div>
		</div>
	</section>

    <?php foreach ($recupAllAssoc as $assoc) : ?>
        <div class="container ">
            <div class="col-md-12">
                <div class="row pad_top_dons pad_bt_dons border border-white">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img class="img-thumbnail imgCoupe" src="<?= $assoc['img']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Nom de l'association</h4></br>
                        <p><?= $assoc['nom_assoc']; ?></p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Nombre de places disponibles</h4>
                        <p><?= $assoc['nbPlaceRegle_assoc']; ?> en règles</p>
                        <p><?= $assoc['nbPlaceQuarant_assoc']; ?> en quarantaines</p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Localisation</h4></br>
                        <p><?= $assoc['adresse_assoc']; ?></p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <h4>Contacts</h4></br></br>
                        <a href="contact.php"><form method="post" action="contact.php"><button value="<?= $assoc['id_assoc']; ?>" type="submit" name="idReceveur" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></form></a>
                    </div>
                    <div class="col-sm-1 text-center">
                        <h4>Plus de détails</h4></br>
                        <a href="detailsAssociation.php?assoc=<?= $assoc['id_assoc']; ?>"><button type="button" class="btn btn-dark align-items-center"><i class="fa fa-plus" style="color:white"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div>
        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <?php for($i=1; $i<= $nbPages; $i++){ ?>
                    <li class="page-item"><a href="http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/lesAssociations.php?p=<?= $i; ?>" class="page-link"><?= $i ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <!--================End Home Blog Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>