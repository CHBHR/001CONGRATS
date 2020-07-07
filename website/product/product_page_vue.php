<!-- <script type="text/javascript" src="/001CONGRATS/JavaScript/product.js" defer></script> -->
<main>

    <section id="product_container">

        <div id="article_preview_container">

        <?php
            require '../../includes/get.php';
            $id = $_GET['product'];
            $result = productSelect($id);
            if($result->num_rows > 0){
                while($rowprod = $result->fetch_assoc()):
                    
                if(isset($_GET['cat']) && $_GET['cat'] === 'newArrival'){
                ?>
                    <style>
                        #testback{background-image: url('/001CONGRATS/ressources/promotion/clearSea.jpg'); background-position: center; background-repeat: no-repeat;background-size: cover;}
                    </style>
                <?php
                }
                elseif($rowprod['code_couleur'] != NULL || $rowprod['code_couleur'] != null ){
                ?>
                    <style>
                        #testback{background-color: <?php echo($rowprod['code_couleur']); ?>;background-image:none;}
                    </style>
                <?php }else{ ?>
                    <style>
                        #testback{background-color: #399370;background-image:none;}
                    </style>
                <?php }; ?>
            <div id="testback"></div>

            <div class="article_preview_img">
                <img src="<?php echo($rowprod['photo_url']); ?>" alt="">
            </div>

            <div class="article_preview_text">

                <div>
                    <h3><?php echo($rowprod['nom']); ?></h3>
                    <p>
                        <span><?php echo($rowprod['prix']); ?> €</span>

                        <span>
                            <?php $result = productTailleSelect($id);
                            $row = $result->fetch_assoc();
                            if($row['quantite'] > 10){
                                echo ($row['quantite'].' en stock');
                            }
                            else if($row['quantite'] < 10 && $row['quantite'] > 0){
                                echo ('Attention! PLus que '.$row['quantite'].' articles en stock!');
                            }else if($row['quantite'] == 0){
                                echo ("Cet article n'est malheureusement plus disponible");
                            }
                            ?>
                        </span>

                    </p>
                </div>

                <div>
                    <span><?php echo($rowprod['note']); ?></span>
                    <div>

                        <?php $taglist = tagSelect($id);
                        if($taglist->num_rows > 0){
                            while($tagRow = $taglist->fetch_assoc()):?>
                                <p><?php echo($tagRow['tag']);?></p>
                            <?php endwhile; 
                        };?>
                        tags
                    </div>
                </div>


                <form method="POST" action="/001CONGRATS/website/product/product_page_control">
                        <label for="size">taille</label>
                        <select id="size" name="prodTaille">
                        <?php
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()):?>
                                    <option value="<?php echo($row['taille']);?>"><?php echo($row['taille']);?></option>
                                <?php endwhile; 
                            };?>
                        </select>

                        <br>

                        <p>
                            <?php echo($rowprod['description']); ?>
                        </p>
                        
                        <input type="hidden" name="prodPrix" value="<?php echo($rowprod['prix']);?>"> 
                        <input type="hidden" name="prodNom" value="<?php echo($rowprod['nom']);?>">
                        <input type="hidden" name="prodId" value="<?php echo($rowprod['id']);?>">
                        <button type="submit" name="ajout_panier" id="btn_panier">AJOUTER AU PANIER</button>
                        <button type="button" name="ajout_wish" id="btn_wish"><i class="far fa-heart"></i></button>


                    </form>

            </div>

        </div>
    </section>

    <section id="article_preview_information">

        <nav class="preview_button">
            <button class="soft_btn" name="desc">Description</button>
            <button class="soft_btn" name="mat">Matiere</button>
            <button class="soft_btn" name="crea">Createur</button>
        </nav>

        <div class="preview_information">

            <div id="info_desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero iste eius inventore consequatur vero, id aliquid molestiae non blanditiis nemo magnam natus excepturi neque velit, eaque placeat maiores perferendis doloribus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, quasi? Quia beatae nulla voluptates nesciunt aut quae tempora rerum officiis?
            </div>

            <div id="info_mat">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt repellendus cumque neque quis odio quam, praesentium corporis sint iure dicta ratione voluptatibus beatae, eveniet dolorum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi expedita atque fugiat illo pariatur repellendus voluptatem omnis deleniti commodi ut?
            </div>

            <div id="info_crea">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex veniam commodi quis, temporibus vero laboriosam, rem culpa nobis voluptatem ratione sed magnam modi harum tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, similique!
            </div>

        </div>

    </section>
                        
        <?php


                endwhile; 
            }; 
            // list() = mysql_fetch_row($result);
            
            ?>

    <section>



    </section>