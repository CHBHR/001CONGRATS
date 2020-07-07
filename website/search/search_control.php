<?php

    if(isset($_POST['submit-search'])){
        require '../../includes/dbh_inc.php';

        //protection from the input
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        
        $sql = "SELECT produit.* FROM produit JOIN produit_tag ON produit.id = produit_tag.code_produit WHERE produit_tag.tag LIKE '%$search%' OR produit.nom LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        include '../header/header_control.php';

        include 'search_vue.php';

        include '../footer/footer_vue.php';
    }
