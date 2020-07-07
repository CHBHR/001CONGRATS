<script type="text/javascript" src="/001CONGRATS/JavaScript/slick.js"></script>

<main id="front_page">

    <section id="header_banner">

        <div id="header_banner_text">

            <h2>
                WEBSITE LAUNCH
            </h2>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam laboriosam inventore minus vitae sed, dolorem nesciunt magni error aperiam id repudiandae perspiciatis, corporis impedit tempora rerum explicabo! Ipsum rerum repellat, id praesentium illum sed aut labore fugiat repellendus cumque maxime dicta tempora aliquam quisquam optio exercitationem quia, architecto distinctio facere.
            </p>
        </div>
        
    </section>

    <section id="main_news_container">

        <div id="main_news_block">

            <div id="main_news_text">

                <h3>
                    La nouvelle collection d'été!
                </h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, quam ratione eius doloribus veritatis nulla omnis sit commodi sequi eum quae et earum suscipit, accusamus saepe natus atque mollitia fugiat quod quia minima.
                </p>
            </div>
        </div>

        <div class="new_arrivals slideshow">

            <div class="new_arrival_items_list slick img_block">

            <?php 
                require '../includes/get.php'; 
                $result = selectPromotion(); 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()):
            ?>

            <div class="new_arrival_item">
                <a href="/001CONGRATS/website/product/product_page_control.php?product=<?php echo($row['id']); ?>&cat=newArrival" class="new_arrival_item_img">
                <img src="<?php echo($row['photo_url']) ?>" alt="<?php echo($row['description']) ?>">
                </a>
                <h4><?php echo($row['nom']) ?></h4>
                <h5><?php echo($row['prix']) ?> €</h5>
            </div>

            <?php endwhile; }; ?>

        </div>

    </section>

    <section id="main_container">

        <!-- THE SLICK -->


        <div class="new_arrivals slideshow">

            <h2>NOUVEAUX ARRIVAGES</h2>

            <div class="new_arrival_items_list slick img_block">

                <?php
                    $result = selectNewest();
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()):
                ?>

                <div class="new_arrival_item">
                    <a href="/001CONGRATS/website/product/product_page_control.php?product=<?php echo($row['id']); ?>" class="new_arrival_item_img">
                    <img src="<?php echo($row['photo_url']) ?>" alt="placeholder">
                    </a>
                    <h4><?php echo($row['nom']) ?></h4>
                    <h5><?php echo($row['prix']) ?> €</h5>
                    <p><?php echo($row['date_ajout']) ?></p>
                </div>
                <?php endwhile; }; ?>


            </div>
        </div>

        <div class="promotion_top slideshow">

            <h2>NOS HAUTS</h2>

            <div class="promotion_top_items_list slick img_block">

                <?php
                    // require '../includes/get.php';
                    // $result = simpleSelect('produit');
                    $result = selectPromotionTop();
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()):
                ?>

                <div class="promotion_top_item">
                    <a href="/001CONGRATS/website/product/product_page_control.php?product=<?php echo($row['id']); ?>" class="promotion_top_item_img">
                    <img src="<?php echo($row['photo_url']) ?>" alt="placeholder">
                    </a>
                    <h4><?php echo($row['nom']) ?></h4>
                    <h5><?php echo($row['prix']) ?> €</h5>
                    <p><?php echo($row['date_ajout']) ?></p>
                </div>
                <?php endwhile; }; ?>


            </div>
        </div>

        <!-- <div id="main_breakpoint_top"></div> -->

        <!-- <div id="main_bottom_container">
            <img src="/001CONGRATS/ressources/placeholder/discover01.jpg" alt="placeholder">
            <h3>SUMMER IN PURPLE</h3>
            <p>Vaporwave Style</p>
            <button>SHOP NOW</button>
        </div> -->
    </section>
</main>
<hr>