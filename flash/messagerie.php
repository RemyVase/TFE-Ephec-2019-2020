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
                        <h2>Messagerie</h2>
                        <div class="page_link">
                            <p style="color : white;">Retrouvez tous vos messages ici</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container pad_bt pad_top">
        <div class="row">
            <div class="card col-sm-4 " style="overflow:scroll;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Rodrygo77</h5>
                        </div>
                        <p>Pour l'arbre à chat..</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Jean25</h5>
                        </div>
                        <p>Je vous propose..</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Mathieuuu9</h5>
                        </div>
                        <p>Bonjour,..</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Name</h5>
                        </div>
                        <p>Last msg</p>
                    </li>

                </ul>
            </div>


            <div class="col-sm-8">
                <div class="chatbody">

                    <table class="table">
                        <tr>
                            <td>message</td>
                            <td>time</td>
                        </tr>
                    </table>

                </div>

                <div class="row">
                    <div class="col-xs-9">
                        <input type="text" placeholder="Message..." class="form-control" [(ngModel)]="message" />
                    </div>
                    <div class="col-xs-3">
                        <button class="btn btn-info btn-block" (click)="">Send</button>
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