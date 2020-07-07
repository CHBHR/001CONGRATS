<?php

    echo 'visiteur_connection';

//magic formula
    // ob_start();

    // include '../header/header_control.php';

    // include 'visiteur_connection_vue.php';

    // include '../footer/footer_vue.php';

    // INSCRIPTION

    if(isset($_POST['insc_submit'])){

        require '../../includes/dbh_inc.php';

        $email = $_POST['email'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $mdpCheck = $_POST['mdpCheck'];

        // ERROR HANDLERS

        if(empty($email) || empty($prenom) || empty($nom) || empty($mdp) || empty($mdpCheck)){
            header("Location: /001CONGRATS/website/index.php?toggle_signin&error=emptyfields&email=".$email."&prenom=".$prenom."&nom=".$nom);
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: /001CONGRATS/website/index.php?toggle_signin&error=invalidmail&prenom=".$prenom."&nom=".$nom);
            exit();
        }
        '/[^A-Za-z0-9_-\s]/'
        "/^[a-zA-Z0-9 _]*$"
        else if(!preg_match('/[^A-Za-z0-9_-\s]/', $prenom)){
            header("Location: /001CONGRATS/website/index.php?toggle_signin&error=invalidname&nom=".$nom."email=".$email);
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $nom)){
            header("Location: /001CONGRATS/website/index.php?error=invalidname&prenom=".$prenom."email=".$email);
            exit();
        }
        else if($mdp !== $mdpCheck){
            header("Location: /001CONGRATS/website/index.php?toggle_signin&error=passwordcheck&email=".$email."&prenom=".$prenom."&nom=".$nom);
            exit();
        }

        // IF EMAIL TAKEN
        else {

            $sql = "SELECT email FROM utilisateur WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: /001CONGRATS/website/index.php?toggle_signin&error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);

                if($resultCheck > 0){
                    header("Location: /001CONGRATS/website/index.php?toggle_signin&error=emailtaken");
                    exit();
                }
                else{

                    $sql = "INSERT INTO utilisateur (email, nom, prenom, mdp) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: /001CONGRATS/website/index.php?toggle_signin&error=sqlerror");
                        exit();
                    }
                    else {
                        $hashedPwd = password_hash($mdp, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "ssss", $email, $nom, $prenom, $hashedPwd);
                        mysqli_stmt_execute($stmt);

                        header("Location: /001CONGRATS/website/index.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    

    //CONNECTION

    if(isset($_POST['connection_submit'])){

        require '../../includes/dbh_inc.php';

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        if(empty($email) || empty($mdp)){
            header("Location: /001CONGRATS/website/index.php?error=emptyfields");
            exit();
        }else{
            $sql = "SELECT * FROM utilisateur WHERE email=? OR pseudo=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: /001CONGRATS/website/index.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "ss", $email, $pseudo);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){
                    $mdpCheck = password_verify($mdp, $row['mdp']);

                    if($mdpCheck == false){
                        header("Location: /001CONGRATS/website/index.php?error=wrongpwd");
                        exit();

                    }else if($mdpCheck == true){
                        session_start();
                        
                        $_SESSION['utilisateurId'] = $row['id'];
                        $_SESSION['status'] = $row['status'];
                        
                        if($row['pseudo']!= NULL){
                            $_SESSION['utilisateurPrenom'] = $row['pseudo'];
                        }else{
                            $_SESSION['utilisateurPrenom'] = $row['prenom'].$row['nom'][0];
                        }
                        

                        header("Location: /001CONGRATS/website/index.php?connection=success");
                        exit();

                    }else{
                        header("Location: /001CONGRATS/website/index.php?error=wrongpwd");
                        exit();
                    }
                }else{
                    header("Location: /001CONGRATS/website/index.php?error=nouserfound");
                    exit();
                }
            }
        }
    }
    if(isset($_POST['logout'])){
        header("Location: /001CONGRATS/includes/logout_inc.php");
        exit();
    }else {
        header("Location: /001CONGRATS/website/index.php");
        exit();
    }
    
    
    // else{
    //     header("Location: /001CONGRATS/website/index.php");
    //     exit();
    // }