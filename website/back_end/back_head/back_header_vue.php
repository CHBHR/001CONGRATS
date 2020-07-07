<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>back</title>

    <!-- GENERAL CSS -->
    <link media="" rel="stylesheet" href="/001CONGRATS/css/normalize.css">
    <link rel="stylesheet" href="/001CONGRATS/css/main.css">
    <link rel="stylesheet" href="/001CONGRATS/css/back.css">
    

    <script type="text/javascript" src="/001CONGRATS/assets/jQuery/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/001CONGRATS/assets/jQuery/jquery-migrate-1.4.1.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</head>
<body>

    <header>

        <h1>Welcome to the Back-Side!</h1>

        <h2>Admin only private party</h2>
        
        <form action="/001CONGRATS/website/back_end/back_head/back_header_control.php" method="POST" id="back_header_nav">

            <button class="back_soft_btn" type="submit" name="back_header_btn" value="acceuil">ACCEUIL</button>

            <button class="back_soft_btn" type="submit" name="back_header_btn" value="produit">PRODUIT</button>

            <button class="back_soft_btn" type="submit" name="back_header_btn" value="utilisateur">UTILISATEUR</button>

            <button class="back_soft_btn" type="submit" name="back_header_btn" value="retour">RETOUR SITE</button>

            <button class="back_soft_btn" type="submit" name="back_header_btn" value="deconnection">DECO</button>

        </form> 

    </header>