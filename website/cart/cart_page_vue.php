<?php 
    require '../../includes/get.php'; 
    $total = 0;
?>

<script type="text/javascript" src="/001CONGRATS/JavaScript/cartList.js" defer></script>

<main id="cart_page">

    <div id="cart_page_top">
        <h3>VOTRE PANIER</h3>
    </div>

    <div id="cart_sticky">
        <div id="sticky_total">
            <h5>sous-total</h5>
            <p><?php echo $total; ?></p>
        </div>
        <button class="soft_btn checkout">CHECKOUT</button>
    </div>

    <div id="cart_page_container">

        <div id="cart_list">

            <?php

                if($cartContent[0] > 0){
                    foreach($cartContent[0] as $value){

                        $result = productSelect($value['prod_id']);

                        if($result && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()):
                        ?>

                            <div id="cart_card">

                                <i class="far fa-times-circle" id="del_btn"></i>

                                <div class="cart_item">
                                    <img src="<?php echo($row['photo_url']) ?>" alt="placeholder">
                                </div>

                                <div class="cart_info">
                                    <h3><?php echo($row['nom']) ?></h3>
                                    <p><?php echo($row['prix']) ?> €</p>
                                    <p><?php echo($row['description']) ?></p>
                                    <p><?php $value['prod_taille'] ?></p>
                                </div>

                            </div>

                        </div>

                        <?php endwhile; 
                        };

                    };
                };
            ?>

        <div id="cart_total">
            <h3>SOUS-TOTAL</h3>
            <h3>PRIX</h3>
            <button class="soft_btn">PAYMENT</button>
        </div>

    </div>

</main>