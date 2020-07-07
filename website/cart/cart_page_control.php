<?php

    if(isset($_COOKIE['tempShoppingCart'])){
        $cartContent[] = unserialize($_COOKIE['tempShoppingCart']);
    }else if(!isset($_COOKIE['tempShoppingCart'])){
        echo("can't access cookie");
    };

    include '../header/header_control.php';

    include 'cart_page_vue.php';

    include '../footer/footer_vue.php';