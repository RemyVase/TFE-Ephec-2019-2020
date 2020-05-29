<?php
session_start();
$currentPage = "gestionCompte";

$date = strstr($_SESSION['date'], ' ', true);
$date2 = strstr($date, '-');
$dateCorrect = $date[8] . $date[9] . '/' . $date[5] .$date[6] . '/' . $date[0] . $date[1] . $date[2] . $date[3];

?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

    <?php include 'header.php' ?>
    <!--================Home Banner Area =================-->
    <section class="banner_area_gestionCompte">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Gestion de compte</h2>
                        <div class="page_link">
                            <p style="color : white;">Retrouvez toutes les informations concernant votre compte.</p>
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
                        <p class="text-center"><b>Pseudonyme :</b> <?= $_SESSION['pseudo']; ?></p>
                        <p class="text-center"><b>Email :</b> <?= $_SESSION['mail']; ?></p>
                        <p class="text-center"><b>Inscris le :</b> <?= $dateCorrect ?></p></br></br>
                        <form id="gestionCompte" name="gestionCompte" method="post" action="#" novalidate>
                            <h4>Besoin de changer de mot de passe ?</h4></br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ancien mot de passe :</label>
                                <input type="password" class="form-control align-center" id="previousPassword" placeholder="Entrez votre mot de passe." required>
                                <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nouveau mot de passe :</label>
                                <input type="password" class="form-control align-center" id="passwordUserChange" placeholder="Entrez votre nouveau mot de passe." required>
                                <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirmation du nouveau mot de passe :</label>
                                <input type="password" class="form-control align-center" id="confirmPasswordUserChange" placeholder="Entrez à nouveau votre nouveau mot de passe." required>
                                <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Veuillez complèter ce champ.</span>
                            </div>
                            <div class="form-check text-center" style="padding-top : 15px; padding-bottom : 15px">
                                <input type="checkbox" class="form-check-input center-block" id="check1" required>
                                <label class="form-check-label " for="exampleCheck1">Check</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Changer de mot de passe</button>
                            </div>
                            <div>
                                <p id="motDePasseSame" style="display : none; color : red">Les deux mots de passe entrés ne sont pas les mêmes</p>
                                <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                                <p id="caseNonCheck" style="display : none; color : red">Veillez a bien cocher les cases obligatoires en dessous du formulaire.</p>
                                <p id="motDePasseIncorrect" style="display : none; color : red">Le mot de passe actuel est incorrect.</p>
                                <p id="success" style="display : none; color : green">Le mot de passe à bien été changé.</p>
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