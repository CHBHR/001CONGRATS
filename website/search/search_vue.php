<script type="text/javascript" src="/001CONGRATS/JavaScript/slick.js"></script>

<section>

    <div class="result slideshow">

        <h2>RESULTATS</h2>
        <?php echo "<h3>Il y a ".$queryResult. " résultats</h3>"; ?>

        <div class="result_list slick img_block">

        <?php

            if($queryResult > 0){
                while($row = $result->fetch_assoc()): ?>


                <div class="result_item">
                    <a href='/001CONGRATS/website/product/product_page_control.php?product=<?php echo($row['id']) ?>'>
                        <img src="<?php echo($row['photo_url']) ?>" alt="placeholder">
                    </a>
                    <h4><?php echo($row['nom']) ?></h4>
                    <h5><?php echo($row['prix']) ?> €</h5>
                    <p><?php echo($row['date_ajout']) ?></p>
                </div>

                <?php endwhile; 

            }else{
                echo "La recherche n'a donné aucun résultat";
            }
            ?>

        </div>
    </div>

</section>