<?php

    //CONNECTION

    if(isset($_POST['connection_submit'])){

        require "/001CONGRATS/includes/dbh_inc.php";

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        if(empty($email) || empty($mdp)){
            header("Location: /001CONGRATS/index/index.php?error=emptyfields");
            exit();
        }else{
            $sql = "SELECT * FROM utilisateur WHERE email=? OR pseudo=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: /001CONGRATS/index/index.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, "ss", $email, $mdp);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc()){
                    $mdpCheck = password_verify($mdp, $row['mdp']);

                    if($mdpCheck == false){
                        header("Location: /001CONGRATS/index/index.php?error=wrongpwd");
                        exit();

                    }else if($mdpCheck == true){
                        session_start();
                        $_SESSION['utilisateurId'] = $row['id'];
                        $_SESSION['utilisateurPrenom'] = $row['prenom'];

                        header("Location: /001CONGRATS/index/index.php?connection=success");
                        exit();

                    }else{
                        header("Location: /001CONGRATS/index/index.php?error=wrongpwd");
                        exit();
                    }
                }else{
                    header("Location: /001CONGRATS/index/index.php?error=nouserfound");
                    exit();
                }
            }
        }

    }else{
        // header("Location: /001CONGRATS/index/index.php");
        exit();
    }