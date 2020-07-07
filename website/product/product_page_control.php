<?php

if(isset($_POST['ajout_panier'])){

    if(!$_POST['prodTaille']){
        $product_array = array(
            'prod_id' => $_POST['prodId'],
            null => $_POST['prodTaille']
        );
    }else{
        $product_array = array(
            'prod_id' => $_POST['prodId'],
            'prod_taille' => $_POST['prodTaille']
        );
    }

    // $product_array = array(
    //     'prod_id' => $_POST['prodId'],
    //     'prod_taille' => $_POST['prodTaille']
    // );

    if(!isset($_SESSION['utilisateurPrenom']) && !isset($_COOKIE['tempShoppingCart'])){

        $cartContent= array();

        // $cartContent = $product_array;
        array_push($cartContent, $product_array);

        setcookie('tempShoppingCart', serialize($cartContent), time()+3600, '/');
        $_COOKIE['tempShoppingCart'] = serialize($cartContent);

        header("Location: /001CONGRATS/website/index.php?addcart=success");

    }elseif(!isset($_SESSION['utilisateurPrenom']) && isset($_COOKIE['tempShoppingCart'])){

        $cartContent = unserialize($_COOKIE['tempShoppingCart']);
        // $cartContent[] = $product_array;
        array_push($cartContent, $product_array);

        setcookie('tempShoppingCart', serialize($cartContent), time()+3600, '/');
        $_COOKIE['tempShoppingCart'] = serialize($cartContent);

        // header("Location: /001CONGRATS/website/index.php?addcart=error");
        header("Location: /001CONGRATS/website/index.php?addcart=success");

    }else{
        header("Location: /001CONGRATS/website/index.php?addcart=error");
    };

};

    include '../header/header_vue.php';

    include 'product_page_vue.php';

    include '../footer/footer_vue.php';

    