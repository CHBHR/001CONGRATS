<?php

    include "header/header_control.php";

    include 'main/main_control.php';

    include 'footer/footer_vue.php';

    if(isset($_GET['error'])){
        switch($_GET['error']){
            case "emptyfields":
                echo '<p class="error_msg">vous devez remplir tous les champs</p>';
            break;
            case "invalidmail":
                echo '<p class="error_msg">cet email n\'est pas valide</p>';
            break;
            case "invaliname":
                echo '<p class="error_msg">veuillez entrer votre nom et prénom avec seulement des charactère et des numéro</p>';
            break;
            case "passwordcheck":
                echo '<p class="error_msg">les deux mots de passes sont différent</p>';
            break;
            case "emailtaken":
                echo '<p class="error_msg">Désolé, cet adresse mail est déjà utilisée</p>';
            break;
            case "sqlerror":
                echo '<p class="error_msg">Il y a eu un problème avec le serveur, veuillez réessayer</p>';
            break;
            case "wrongpwd":
                echo '<p class="error_msg">Mauvais mot de passe</p>';
            break;
            case "nouserfound":
                echo '<p class="error_msg">Désolé, nous ne trouvons pas cet identifiant dans notre base de donnée</p>';
            break;
        }
    }
