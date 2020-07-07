<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

    <!-- GENERAL CSS -->
    <link media="" rel="stylesheet" href="/001CONGRATS/css/normalize.css">
    <link media="" rel="stylesheet" href="/001CONGRATS/css/main.css">

    <!-- MAIN CSS -->
    <link media="" rel="stylesheet" href="/001CONGRATS/css/stylesheet.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- THE SLICK SLIDER -->
    <link rel="stylesheet" href="/001CONGRATS/assets/slick/slick.css"/>
    <link rel="stylesheet" href="/001CONGRATS/assets/slick/slick-theme.css"/>
    <script type="text/javascript" src="/001CONGRATS/assets/slick/slick.min.js" defer></script>
    
    <!-- THE MODAL PAGE -->
    <link rel="stylesheet" href="/001CONGRATS/css/modal.css"/>
    <script type="text/javascript" src="/001CONGRATS/JavaScript/modal.js" defer></script>

    <!-- MODAL CONTROLS -->
    <script type="text/javascript" src="/001CONGRATS/JavaScript/validation.js" defer></script>

    <!-- JQ  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    

</head>
<body>
    
    <header>


        <a href="/001CONGRATS/website/index.php" id="headershapetest"><h1>C O N G R A T S</h1><div id="headershape"></div></a>


    </header>

    <form action="/001CONGRATS/website/header/header_control.php" method="post" id="header_nav">


        <button type="submit" name="header_btn" value="home">ACCUEIL</button>

        <button type="button" name="header_btn" value="search" id="search_btn"><i class="fas fa-search"></i> </button>

        <script defer src="/001CONGRATS/JavaScript/searchBar.js"></script>

        <button type="submit" name="header_btn" value="cart"><i class="fas fa-shopping-cart"></i> <span>PANIER</span></button>

        <!-- BUTTON CONNECTION -->

        <?php if(!isset($_SESSION['utilisateurPrenom'])){
            echo
            '<div class="connection_toggle">
                <button type="button" name="header_btn" value="login" id="modal_btn"><i class="fas fa-user"></i> <span>LOGIN</span></button>
            </div>';
        }; ?>
        
        <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] =='admin'){
                echo '<button type="submit" name="header_btn" value="back_end"><i class="fas fa-dungeon"></i><span>back-end</span></button>';
            }
        ?>

        <?php
            if(isset($_SESSION['utilisateurPrenom'])){
                echo '<button type="submit" name="header_btn" value="logout"><i class="fas fa-times"></i><span>loggout</span></button>';
            }
        ?>
    </form>

    <!-- SEARCH BAR -->

    <form action="/001CONGRATS/website/search/search_control.php" method="POST" id="search_bar">

        <input type="text" name="search" placeholder="tapez votre recherche ici" id="input_search">
        <button type="submit" name="submit-search" class="congrats_soft_button">CHERCHER</button>

    </form>

        <!-- BLOCK CONNECTION MODAL -->

        <div id="myModal" class="modal">

            <div class="modal-content">

                <div class="modal_header">

                    <!-- toggle pour les 2 menu -->

                    <button type="button" name="insc_toggle" class="modal_toggle_btn" id="modal_insc_btn">inscription</button>

                    <button type="button" name="conn_toggle" class="modal_toggle_btn" id="modal_conn_btn">connection</button>

                    <span class="close"><i class="fas fa-times"></i></span>

                </div>

                <div id="form_inscription_main" class="form_connection">

                    <form action="/001CONGRATS/website/forms/visiteur_connection.php" method="POST" id="form_inscription">

                        <input type="text" name="email" placeholder="email" id="insc_email" onkeyup="valid_length('insc_email')" maxlength="50">
                        <span id="insc_email_error"></span>

                        <input type="text" name="nom" placeholder="nom" id="insc_nom" onkeyup="valid_length('insc_nom')" maxlength="50">
                        <span id="insc_nom_error"></span>

                        <input type="text" name="prenom" placeholder="prenom" id="insc_prenom" onkeyup="valid_length('insc_prenom')" maxlength="30">
                        <span id="insc_prenom_error"></span>

                        <input type="password" name="mdp" placeholder="mot de passe" id="insc_pass" onKeyUp="check_v_pass('insc_pass', 'mdp_qualite')" maxlength="30" onblur="cancel_output('mdp_qualite')">
                        <span id="mdp_qualite"></span>

                        <input type="password" name="mdpCheck" placeholder="confirmation du mot de passe" id="insc_pass_check" onkeyup="mdp_compare('insc_pass', 'insc_pass_check')">
                        <span id="mdp_error"></span>

                        <button type="submit" name="insc_submit" id="insc_submit_btn" >s'inscrire</button>
                        <!-- onclick=controlSubmit() -->
                        <span id="error_log"></span>

                    </form>

                </div>

                <div id="form_connection_main" class="form_connection">

                    <form action="/001CONGRATS/website/forms/visiteur_connection.php" method="POST">
                    <input type="text" name="email" placeholder="email" id="testemail">
                    <input type="password" name="mdp" placeholder="mot de passe">
                    <button type="submit" name="connection_submit" id="connection_submit_btn">se connecter</button>
                    <a href="#">Mot de passe oublié?</a>
                    </form>

                </div>

                <div class="modal_footer">

                    <h2>Footer</h2>

                </div>

            </div>
        
        </div>

            <!-- <?php
                if(isset($_SESSION['utilisateurPrenom'])){
                    echo '<button type="submit" name="header_btn" value="logout"><i class="fas fa-times"></i><span>loggout</span></button>';
                }else{
                    echo '<button type="submit" name="header_btn" value="login"><i class="fas fa-user"></i> <span>login</span></button>';
                }
            ?> -->
        

    <div id="header_connection_status">
            <?php
                if(isset($_GET['addcart']) && $_GET['addcart'] === "success"){
                    echo "<p><span id='span_connection_status' class='status_success'>L'article est dans votre panier!</span></p>";
                }elseif(isset($_GET['addcart']) && $_GET['addcart'] === "error"){
                    echo "<p><span id='span_connection_status' class='status_error'>Oups, il semble y avoir un problème avec votre panier :(</span></p>";
                }elseif(isset($_SESSION['utilisateurPrenom'])){
                    echo '<p><span id="span_connection_status" class="status_connected">Bonjour '.$_SESSION['utilisateurPrenom'].'!</span></p>';
                }else{
                    echo '<p><span id="span_connection_status">N\'hésitez pas à vous inscrire ;)</span></p>';
                }
            ?>   
    </div>

    <hr>