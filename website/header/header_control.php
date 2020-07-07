<?php
    ob_start();
    
    include 'header_vue.php';


    if(isset($_POST['header_btn'])){
        switch($_POST['header_btn']){
        case "home":
            header("Location: /001CONGRATS/website/index.php");
        break;
        // case "wish":
        //     header("Location: /001CONGRATS/website/wish/wish_control.php");
        // break;
        // case "submit_search":
        //     header("Locaction: /001CONGRATS/website/main/result.php");
        // break;
        case "cart":
            header("Location: /001CONGRATS/website/cart/cart_page_control.php");
        break;
        case "logout":
            header("Location: /001CONGRATS/includes/logout_inc.php");
        break;
        case "back_end":
             header("Location: /001CONGRATS/website/back_end/back_acceuil_control.php");
        break;
        }
    }
