<?php
session_start();
include 'head.php';
$id = $_SESSION['id'];
$_SESSION['idReceveur'] = $_POST['idReceveur'];
?>

<!doctype html>
<html lang="en">

<body>

    <?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area_connexion">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Contact</h2>
                        <div class="page_link">
                            <p style="color : white;">Envoyez un message</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <?php if ($_SESSION['idReceveur'] !== $_SESSION['id']) : ?>
        <?php if (!empty($_SESSION['idAssoc'])) : ?>
        <div class="container pad_top pad_bt">
            <form id="envoiMessageAssocToUser_form" method="post">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message :</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Entrez votre message ici"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Envoyer le message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php else : ?>
        <div class="container pad_top pad_bt">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 style="color:red">Vous n'appartenez pas à une association et ne pouvez donc pas envoyer de message pour répondre à une offre de don!</h2>
                </div>
            </div>
        </div>
        <?php endif ?>
    <?php else : ?>
        <div class="container pad_top pad_bt">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 style="color:red">Ceci est une offre faites par vous même, vous ne pouvez par conséquent pas vous envoyer de message !</h2>
                </div>
            </div>
        </div>
    <?php endif ?>
    <!--================Contact Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>