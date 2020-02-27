<?php
    session_start();
    if (isset($_SESSION['id'])) {
        // Supression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        header('Location: http://localhost:8878/TFE-RemyVase/TFE-Ephec-2019-2020/flash/vue/accueil.php');
    }else{ // Dans le cas contraire on t'empêche d'accéder à cette page en te redirigeant vers la page que tu veux.
        return false;
    }
?>