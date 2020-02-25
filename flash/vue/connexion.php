<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

    <?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area_connexion">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Connexion</h2>
                        <div class="page_link">
                            <p style="color : white;">Connectez-vous</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <div class="container pad_top pad_bt">
        <form id="connexion_form" name="connexion_form" method="post" action="#" novalidate>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pseudonyme/Email: </label>
                        <input type="pseudo" class="form-control" id="connPseudoUser" placeholder="Entrez votre pseudonyme.">
                        <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Ce champs n'est pas complèté.</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe :</label>
                        <input type="password" class="form-control" id="connPasswordUser" placeholder="Entrez votre mot de passe.">
                        <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Ce champs n'est pas complèté.</span>
                    </div>
                    <a href="oubliPassword.html">Mot de passe oublié ? </a>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Se connecter</button>
                    </div>
                    <!--<p id="echecMailPseudo" style="display : none; color : red">Le pseudo ou email rentré n'existe pas.</p>-->
                    <p id="motDePasseIncorrect" style="display : none; color : red">Mot de passe ou pseudo/email incorrect.</p>
                </div>
            </div>
        </form>
    </div>
    <!--================Contact Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>