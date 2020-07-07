<?php

    ob_start();

    include 'back_header_vue.php';

    if(isset($_POST['back_header_btn'])){
        switch($_POST['back_header_btn']){
        case "acceuil":
            header("Location: /001CONGRATS/website/back_end/back_acceuil_control.php");
        break;
        // case "log":
        //     header("Location: /001CONGRATS/website/back_end/back_acceuil_control.php");
        // break;
        case "produit":
            header("Location: /001CONGRATS/website/back_end/back_produit/back_produit_control.php");
        break;
        case "utilisateur":
            header("Location: /001CONGRATS/website/back_end/back_utilisateur/back_utilisateur_control.php");
        break;
        case "retour":
             header("Location: /001CONGRATS/website/index.php");
        break;
        case "deconnection":
            header("Location: /001CONGRATS/includes/logout_inc.php");
       break;
        }
    }