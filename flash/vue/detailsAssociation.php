<?php
session_start();
$currentPage = "detailsAssociations";
?>
<!doctype html>
<html lang="en">

<?php include 'head.php' ?>

<body>

<?php include 'header.php' ?>

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>En savoir plus</h2>
                        <p style = "color:white">Découvrez plus de détails sur cette association</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Portfolio Details Area =================-->
<section class="portfolio_details_area p_120">
    <div class="container">
        <div class="portfolio_details_inner">
            <div class="row">
                <div class="col-md-5">
                    <div class="left_img">
                        <img class="img-fluid" src="../img/project-details-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="portfolio_right_text">
                        <h4>Nom de l'association</h4>
                        <ul class="list">
                            <li><span>Adresse</span>:  80 rue du poivron, Pont-à-Celles</li>
                            <li><span>Numéro de téléphone</span>:  0477/08.06.41</li>
                            <li><span>Email</span>:  google@hotmail.com</li>
                            <li><span>Site</span>:  <a href="www.google.com">www.google.com</a></li>
                            <li><span>Places animaux en règles</span>: <strong>5</strong> </li>
                            <li><span>Places animaux en quarantaine</span>:  <strong>2</strong></li></br><br><br>
                            <li><span>Contact</span>:  <a href="contact.php"><button type="button" class="btn btn-dark align-items-center "><i class="fa fa-envelope" style="color:white"></i></button></a></li>


                        </ul>
                        <ul class="list social_details">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
                <h4>Description de l'association :</h4>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
               <p>Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
        </div>
    </div>
</section>

    <!--================End Portfolio Details Area =================-->

    <?php include 'footer.php' ?>
<?php include 'jquery.php' ?>
</body>

</html>