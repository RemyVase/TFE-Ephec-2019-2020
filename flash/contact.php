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
    <div class="container pad_top pad_bt">
        <form>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sujet :</label>
                        <input type="pseudo" class="form-control" id="connPseudoUser" placeholder="Entrez le sujet du message.">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message :</label>
                        <textarea class="form-control" id="descAnnonce" rows="3" placeholder="Entrez votre message ici"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Envoyer le message</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!--================Contact Area =================-->

    <?php include 'footer.php' ?>
    <?php include 'jquery.php' ?>
</body>

</html>