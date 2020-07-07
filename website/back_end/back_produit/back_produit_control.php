<?php
    ob_clean();

    require '../../../includes/dbh_inc.php';

    include '../back_head/back_header_control.php';

    include 'back_produit_vue.php';

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    };

    if(isset($_POST['btn_supp'])){
        $prodID = $_POST['btn_supp'];
        $sql = "DELETE FROM produit WHERE produit.id = $prodID";
        if(mysqli_query($conn, $sql)){
            header("Location: back_produit_control.php");
        }else{
            alert("Erreur: " . $sql . "" . mysqli_error($conn));
        };  
    };

    if(isset($_POST['ajout'])){

        $nom = $_POST['nom'];
        $desc = $_POST['description'];
        $prix = $_POST['prix'];
        $couleur = $_POST['couleur'];
        $code_coul = $_POST['code_couleur'];
        $creat = $_POST['createur'];
        $matiere = $_POST['matiere'];

        if(empty($_POST['photo_path'])){
            $pic_path = '/001CONGRATS/ressources/photos/default.jpg';
        }else{
            $pic_path = $_POST['photo_path'];
        };
        
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        };

        $sql = "INSERT INTO produit (nom, produit.description, prix, couleur, code_couleur, matiere, photo_url) VALUES ('$nom', '$desc', '$prix', '$couleur', '$code_coul', '$matiere', '$pic_path');";

        if(mysqli_query($conn, $sql)){
            echo "L'ARTICLE A BIEN ETE AJOUTE";
            header("Location: back_produit_control.php");
        }else{
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        
    };
  