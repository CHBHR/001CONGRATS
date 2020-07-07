
<script defer src="/001CONGRATS/JavaScript/back_product_list.js"></script>

<main id="produit_main">
    <section class="list_div">
        
        <h2>PORTAIL PRODUIT</h2>

        <div>
            <a href="#product_list_container" class="back_soft_btn">Liste produits</a>
            <a href="#product_add_container" class="back_soft_btn">Ajout produit</a>
        </div>

    </section>

    <section id="product_list_container">

        <?php
            require '../../../includes/get.php';
            $result = simpleSelect('Produit');
            if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>

        <div id="liste_card">

            <div id="info_img">

                <img src="<?php echo($row['photo_url'])?>" alt="<?php echo($row['description'])?>">
                <p><?php echo($row['nom']);?></p>

            </div>

            <div id="info_template">

                <table id="info_table">
                    <tr>
                        <td><h4>code produit</h4></td>
                        <td><?php echo($row['id']);?></td>
                    </tr>
                    <tr>
                        <td><h4>nom</h4></td>
                        <td><?php echo($row['nom']);?></td>
                    </tr>
                    <tr>
                        <td><h4>description</h4></td>
                        <td><?php echo($row['description']);?></td>
                    </tr>
                    <tr>
                        <td><h4>prix unitaire</h4></td>
                        <td><?php echo($row['prix']);?></td>
                    </tr>
                    <tr>
                        <td><h4>couleur</h4></td>
                        <td><?php echo($row['couleur']);?></td>
                    </tr>
                    <tr>
                        <td><h4>code couleur</h4></td>
                        <td><?php echo($row['code_couleur']);?></td>
                    </tr>
                    <tr>
                        <td><h4>créateur/ marque</h4></td>
                        <td><?php echo($row['createur']);?></td>
                    </tr>
                    <tr>
                        <td><h4>matiere</h4></td>
                        <td><?php echo($row['matiere']);?></td>
                    </tr>
                    <tr>
                        <td><h4>note</h4></td>
                        <td><?php echo($row['note']);?></td>
                    </tr>
                    <tr>
                        <td><h4>url photo</h4></td>
                        <td><?php echo($row['photo_url']);?></td>
                    </tr>
                    <tr>
                        <td><h4>date d'ajout</h4></td>
                        <td><?php echo($row['date_ajout']);?></td>
                    </tr>
                </table>

                <button
                    type="button" 
                    name="btn_modif" 
                    class="back_soft_btn" 
                    value="<?php echo($row['id']);?>" 
                    id="modif">MODIFIER
                </button>

                <form method="POST" action="back_produit_control.php" id="delete">
                    <button 
                        type="submit"
                        name="btn_supp" 
                        class="back_soft_btn" 
                        value="<?php echo($row['id']);?>" 
                        id="supp">SUPPRIMER
                    </button>
                </form>

                <!-- TEST -->
                <!-- <div id="info_modif"></div> -->
                <!-- <?php echo($row['id']);?> -->

            </div>

            <!-- <div id="info_modif">

                <button type="button" name="btn_modif" class="back_soft_btn">MODIFIER</button>

                <button type="button" name="btn_modif" class="back_soft_btn">SUPPRIMER</button>

            </div> -->

        </div>

        <!-- MODAL MODIFICATION PAGE -->
        <div id="back_product_modal">
            <form action="back_produit_control.php" method="POST" id="form_modif_prod">
                <label>nom:</label>
                <input placeholder="<?php echo($row['id']);?>" type="text" name="nom" value="" id="modif_nom" required>
                <label>description:</label>
                <textarea name="description" id="modif_desc" placeholder="<?php echo($row['nom']);?>"></textarea>
                <label>prix:</label>
                <input placeholder="<?php echo($row['prix']);?>" type="text" name="prix" value="" id="modif_prix">
                <label>couleur:</label>
                <input placeholder="<?php echo($row['couleur']);?>" type="text" name="couleur" value="" id="modif_coul">
                <label>code couleur:</label>
                <input placeholder="<?php echo($row['code_couleur']);?>" type="text" name="code_couleur" value="" id="modif_code_coul">
                <label>createur/marque:</label>
                <input placeholder="<?php echo($row['createur']);?>" type="text" name="createur" value="" id="modif_crea">
                <label>matiere:</label>
                <input placeholder="<?php echo($row['matiere']);?>" type="text" name="matiere" value="" id="modif_mat">
                <label>photo:</label>
                <input placeholder="<?php echo($row['photo_url']);?>" type="text" name="photo_path" value="" id="modif_path">

                <button type="submit" name="modif" class="back_soft_btn">MODIFIER</button>
                <button type="button" name="cancel_modif" id="cancel_modif" class="back_soft_btn">ANNULER</button>
            </form>
        </div>

        <?php
                }
            }else{
                echo "0 results";
            }
        ?>

    </section>

    <section id="product_add_container">

        <h2>AJOUT DE PRODUIT</h2>

        <div id="add_card">

            <form action="back_produit_control.php" method="POST" id="form_ajout">
                <label>nom:</label>
                <input type="text" name="nom" value="" id="add_nom" required>
                <label>description:</label>
                <textarea name="description" id="add_desc"></textarea>
                <label>prix:</label>
                <input type="text" name="prix" value="" id="add_prix">
                <label>couleur:</label>
                <input type="text" name="couleur" value="" id="add_coul">
                <label>code couleur:</label>
                <input type="text" name="code_couleur" value="" id="add_code_coul">
                <label>createur/marque:</label>
                <input type="text" name="createur" value="" id="add_crea">
                <label>matiere:</label>
                <input type="text" name="matiere" value="" id="add_mat">
                <label>photo:</label>
                <input type="text" name="photo_path" value="" id="add_path">
                <button type="submit" name="ajout" class="back_soft_btn">AJOUTER</button>
            </form>

            <div id="class_right">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quod nemo omnis vitae culpa voluptas, quia odit nihil recusandae ex officiis exercitationem dolorem pariatur dolor eveniet dicta magnam ducimus quo inventore minima maxime neque! Nulla, quia porro? Natus, vero? Exercitationem adipisci minus ipsa ratione sint ullam ipsam ab earum inventore.

                <form>
                    <h3>TAGS</h3>
                    <select name="tags">
                        <option value="tag">tag</option>
                    </select>
                    <div id="tag_box">
                        <span class="tag_box_tags">joli</span>
                    </div>
                </form>
            </div>

        </div>

    </section>

    <a href="#produit_main" class="back_soft_btn" id="haut_de_page"><i class="fas fa-arrow-circle-up"></i> Haut de page</a>
</main>
