<?php $uri = $_SERVER['REQUEST_URI']; ?>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <?php if (!empty($_SESSION['id'])) { ?>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h ecartGauche" href="accueil.php"><img src="../img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset ecartDroite" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item <?php if ($currentPage === "accueil") echo $active ?>"><a class="nav-link" href="accueil.php">Page d'accueil</a></li>
                            <li class="nav-item <?php if ($currentPage === "comment") echo $active ?>"><a class="nav-link" href="comment.php">Comment sauver un animal ?</a></li>
                            <li class="nav-item <?php if ($currentPage === "messagerie") echo $active ?>"><a class="nav-link" href="messagerie.php">Messagerie</a></li>
                            <li class="nav-item <?php if ($currentPage === "listeAnimaux" || $currentPage === "ajoutAnimal") echo $active ?> submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Adoption</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item <?php if ($currentPage === "listeAnimaux") echo $active ?>"><a class="nav-link" href="listeAnimaux.php">Les animaux</a></li>
                                    <li class="nav-item <?php if ($currentPage === "ajoutAnimal") echo $active ?>"><a class="nav-link" href="ajoutAnimal.php">Ajouter un animal</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if ($currentPage === "donOffre" || $currentPage === "donFaireOffre" || $currentPage === "donDemande" || $currentPage === "donFaireDemande" || $currentPage === "vosAnnonces" || $currentPage === "vosDemandes") echo $active ?>submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dons</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item <?php if ($currentPage === "donOffre") echo $active ?>"><a class="nav-link" href="donOffre.php">Offres de dons</a></li>
                                    <li class="nav-item <?php if ($currentPage === "donDemande") echo $active ?>"><a class="nav-link" href="donDemande.php">Demandes de dons</a></li>
                                    <li class="nav-item <?php if ($currentPage === "donFaireOffre") echo $active ?>"><a class="nav-link" href="donFaireOffre.php">Faites un don</a></li>
                                    <li class="nav-item <?php if ($currentPage === "donFaireDemande") echo $active ?>"><a class="nav-link" href="donFaireDemande.php">Demandez un don</a></li>
                                    <li class="nav-item <?php if ($currentPage === "vosAnnonces") echo $active ?>"><a class="nav-link" href="vosAnnonces.php">Vos annonces</a></li>
                                    <li class="nav-item <?php if ($currentPage === "vosDemandes") echo $active ?>"><a class="nav-link" href="vosDemandes.php">Vos demandes</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if ($currentPage === "lesAssociations" || $currentPage === "ajoutAssociation") echo $active ?> submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Les associations</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item <?php if ($currentPage === "lesAssociations") echo $active ?>"><a class="nav-link" href="lesAssociations.php?p=1">Les associations</a></li>
                                    <?php if ($_SESSION['idAssoc'] != NULL) { ?>
                                        <li class="nav-item <?php if ($currentPage === "detailsMonAssociation") echo $active ?>"><a class="nav-link" href="detailsMonAssoc.php">Mon association</a></li>
                                    <?php } else { ?>
                                        <li class="nav-item <?php if ($currentPage === "ajoutAssociation") echo $active ?>"><a class="nav-link" href="ajoutAssociation.php">Ajouter association</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="nav-item <?php if ($currentPage === "gestionCompte") echo $active ?>"><a class="nav-link" href="gestionCompte.php">Gestion de compte</a></li>
                            <li class="nav-item"><a class="nav-link" href="../controller/deconnexionController.php">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>


        <?php } else { ?>


            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h ecartGauche" href="accueil.php"><img src="../img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset ecartDroite" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item <?php if ($currentPage === "accueil") echo $active ?>"><a class="nav-link" href="accueil.php">Page d'accueil</a></li>
                            <li class="nav-item <?php if ($currentPage === "comment") echo $active ?>"><a class="nav-link" href="comment.php">Comment sauver un animal ?</a></li>
                            <li class="nav-item <?php if ($currentPage === "listeAnimaux" || $currentPage === "ajoutAnimal") echo $active ?> submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Adoption</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item <?php if ($currentPage === "listeAnimaux") echo $active ?>"><a class="nav-link" href="listeAnimaux.php">Les animaux</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if ($currentPage === "donOffre" || $currentPage === "donFaireOffre" || $currentPage === "donDemande" || $currentPage === "donFaireDemande" || $currentPage === "vosAnnonces" || $currentPage === "vosDemandes") echo $active ?>submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dons</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item <?php if ($currentPage === "donOffre") echo $active ?>"><a class="nav-link" href="donOffre.php">Offres de dons</a></li>
                                    <li class="nav-item <?php if ($currentPage === "donDemande") echo $active ?>"><a class="nav-link" href="donDemande.php">Demandes de dons</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if ($currentPage === "lesAssociations" || $currentPage === "ajoutAssociation") echo $active ?> submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Les associations</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item <?php if ($currentPage === "lesAssociations") echo $active ?>"><a class="nav-link" href="lesAssociations.php">Les associations</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if ($currentPage === "connexion") echo $active ?>"><a class="nav-link" href="connexion.php">Connexion</a></li>
                            <li class="nav-item <?php if ($currentPage === "inscription") echo $active ?>"><a class="nav-link" href="inscription.php">Inscription</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php } ?>
    </div>
</header>
<!--================Header Menu Area =================-->