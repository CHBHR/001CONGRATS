<?php

    // SIMPLE SELECT (validate)
    function simpleSelect($id){
        require 'dbh_inc.php';
        $dbTable = $id;
        $sql = "SELECT * FROM $dbTable";
        $result = $conn ->query($sql);
        return $result;
    }

    function selectPromotion(){
        require 'dbh_inc.php';
        $data = "maillot de bain";
        $sql = "SELECT produit.id, produit.nom, produit.photo_url, produit.prix, produit.description FROM produit JOIN produit_tag ON produit.id = produit_tag.code_produit WHERE produit_tag.tag = 'maillot de bain' LIMIT 4";
        $result = $conn ->query($sql);
        return $result;
    }
    

    function selectPromotionTop(){
        require 'dbh_inc.php';
        $data = "haut";
        $sql = "SELECT * FROM produit JOIN produit_tag ON produit.id = produit_tag.code_produit WHERE produit_tag.tag = 'haut' LIMIT 4";
        $result = $conn ->query($sql);
        return $result;
    }

    function selectNewest(){
        require 'dbh_inc.php';
        $sql = "SELECT * FROM produit ORDER BY STR_TO_DATE(date_ajout, '%d %M %Y') ASC LIMIT 4";
        $result = $conn ->query($sql);
        return $result;
    }

    function productSelect($id){
        require 'dbh_inc.php';
        $sql = "SELECT * FROM produit WHERE produit.id = $id";
        $result = $conn ->query($sql);
        return $result;
    }

    function tagSelect($id){
        require 'dbh_inc.php';
        $sql = "SELECT * FROM produit_tag WHERE code_produit=$id";
        $result = $conn ->query($sql);
        return $result;
    }

    function productTailleSelect($id){
        require 'dbh_inc.php';
        $sql = "SELECT * FROM taille_quantite WHERE code_produit=$id";
        $result = $conn ->query($sql);
        return $result;
    }