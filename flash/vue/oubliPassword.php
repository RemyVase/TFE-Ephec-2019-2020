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
                        <form>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Votre email :</label>
                                <input type="email" class="form-control align-center" id="emailUserOubli"
                                    placeholder="Entrez votre email.">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe :</label>
                                <input type="password" class="form-control align-center" id="passwordUserOubli"
                                    placeholder="Entrez votre mot de passe.">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirmation de mot de passe :</label>
                                <input type="password" class="form-control align-center" id="confirmPasswordUserOubli"
                                    placeholder="Entrez à nouveau votre mot de passe.">
                            </div>
                            <div class="form-check text-center" style="padding-top : 15px; padding-bottom : 15px">
                                <input type="checkbox" class="form-check-input center-block" id="exampleCheck1">
                                <label class="form-check-label " for="exampleCheck1">Check</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Changer de mot de passe</button>
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