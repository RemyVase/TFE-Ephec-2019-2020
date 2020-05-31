<?php
session_start();
$currentPage = "changeMdp";
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

    <?php include 'header.php' ?>
    <!--================Home Banner Area =================-->
    <section class="banner_area_oubli">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Oubli de mot de passe</h2>
                        <div class="page_link">
                            <p style="color : white;">Vous ne trouvez plus votre mot de passe ? Réinitialisé le !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->

    <div class="container pad_top pad_bt md-center">
        <div class="col-lg-12 md-center">

            <div class="align-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form id="changeMdp_form" name="changeMdp_form" method="post" action="#" novalidate>
                            <p>Allez vérifier dans votre emails afin de trouver votre jeton pour réinitialiser votre mot de passe ! (Vérifiez les spams) </p>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Votre email :</label>
                                <input type="email" class="form-control align-center" id="emailUserOubliChange" placeholder="Entrez votre email.">
                                <span class="form_error" style="display : none; color : red">Ce n'est pas un mail !</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Votre jeton :</label>
                                <input type="pseudo" class="form-control align-center" id="jetonUserOubliChange" placeholder="Entrez le jeton que vous avez reçu par email.">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nouveau mot de passe :</label>
                                <input type="pseudo" class="form-control align-center" id="mdpUserOubliChange" placeholder="Entrez votre nouveau mot de passe.">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Changer de mot de passe</button>
                            </div>
                            <div>
                                <p id="success" style="display : none; color : green">Le mot de passe à bien été changé.</p>
                                <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--================Contact Area =================-->


    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>