<?php
session_start();
$currentPage = "inscription";
?>
<!doctype html>

<html lang="en">

<?php include 'head.php' ?>

<body>

  <?php include 'header.php' ?>

  <!--================Home Banner Area =================-->
  <section class="banner_area_inscription">
    <div class="box_1620">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content text-center">
            <h2>Rejoignez-nous</h2>
            <div class="page_link">
              <p style="color : white;">Inscription</p>
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
        <form id="inscription_form" name="inscription_form" method="post" action="#" novalidate>
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Pseudonyme : </label>
                <input type="pseudo" class="form-control align-center" id="pseudoUser" placeholder="Entrez votre pseudonyme." required>
                <span class="form_error" style="color:red"></span><span id="pseudoPasOk" style="display : none; color : red">Ce pseudo n'est pas disponible.</span>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email :</label>
                <input type="email" class="form-control align-center" id="mailUser" placeholder="Entrez votre email." required>
                <!-- <small class="form-text text-muted">Nous ne partagerons jamais votre email.</small> -->
                <span class="form_error" style="color:red"></span><span id="mailPasOk" style="display : none; color : red">Ce mail est déjà utilisé.</span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe :</label>
                <input type="password" class="form-control align-center" id="passwordUser" placeholder="Entrez votre mot de passe." required>
                <span class="form_error" style="color:red"></span>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirmation de mot de passe :</label>
                <input type="password" class="form-control align-center" id="confirmPasswordUser" placeholder="Entrez à nouveau votre mot de passe." required>
                <span class="form_error" style="color:red"></span>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-dark">S'inscrire</button>
              </div>
              <div>
                <img id="loader" src="../img/ajax-loader.gif" style="display : none" alt="icône patienter" title="Veuillez patientez" />
                <p id="nonComplete" style="display : none; color : red">Veillez a bien remplir l'ensemble des champs du formulaire.</p>
                <p id="caseNonCheck" style="display : none; color : red">Veillez a bien cocher les cases obligatoires en dessous du formulaire.</p>
                <p id="success" style="display : none; color : green">L'inscription a été validée !</p>
                <p id="echecMailOuPseudo" style="display : none; color : red">Une erreur est survenue, veuillez vérifier le formulaire.</p>
                <p id="motDePasseSame" style="display : none; color : red">Les deux mots de passe entrés ne sont pas les mêmes</p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--================Contact Area =================-->

  <?php include 'footer.php' ?>
  <?php include 'jquery.php' ?>
</body>

</html>