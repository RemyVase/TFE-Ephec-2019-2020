<?php
session_start();
$currentPage = "oubliPassword";
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
                        <form id="oubli_form" name="oubli_form" method="post" action="#" novalidate>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Votre email :</label>
                                <input type="email" class="form-control align-center" id="emailUserOubli" placeholder="Entrez votre email.">
                                <span class="form_error" style="display : none; color : red">Ce n'est pas un mail !</span>
                                <small class="form-text text-muted">Un email vous sera envoyé avec un nouveau mot de passe vous permettant de vous connecter. N'oubliez pas de changer ce mot de passe dans gestion de compte lors de votre première connexion.</small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Changer de mot de passe</button>
                            </div>
                            <div>
                                <p id="success" style="display : none; color : green">Le mot de passe à bien été changé.</p>
                                <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                                <p id="mailPasOk" style="display : none; color : red">Ce mail n'existe pas, veuillez vérifier si celui-ci est correct.</p>
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