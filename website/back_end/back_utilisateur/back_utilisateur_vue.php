
<script defer src="/001CONGRATS/JavaScript/back_utilisateur_list.js"></script>

<main id="user_main">
    <section class="list_div">
        
        <h2>PORTAIL UTILISATEUR</h2>

        <div>
            <a href="#user_list_container" class="back_soft_btn">Liste utilisateur</a>
            <a href="#user_add_container" class="back_soft_btn">Ajout admin</a>
        </div>

    </section>

    <section id="user_list_container">

        <table id="user_table">
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Pseudo</th>
                <th>email</th>
                <th>Status</th>
                <th>Date d'ajout</th>
                <th>Téléphone</th>
                <th>Addresse</th>
                <th>Ville</th>
                <th>Code Postal</th>
                <th>Pays</th>
                <th>Derniere modification</th>
                <th>MODIFIER</th>
            </tr>

            <?php
                require '../../../includes/get.php';
                $result = simpleSelect('utilisateur');
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>

            <tr>
                <td><?php echo($row['id']);?></td>
                <td><?php echo($row['nom']);?></td>
                <td><?php echo($row['prenom']);?></td>
                <td><?php echo($row['pseudo']);?></td>
                <td><?php echo($row['email']);?></td>
                <td><?php echo($row['status']);?></td>
                <td><?php echo($row['date_ajout']);?></td>
                <td><?php echo($row['telephone']);?></td>
                <td><?php echo($row['addresse']);?></td>
                <td><?php echo($row['ville']);?></td>
                <td><?php echo($row['code_postal']);?></td>
                <td><?php echo($row['pays']);?></td>
                <td><?php echo($row['date_modif']);?></td>
                <td id="info_toggle" class="back_soft_btn"><i class="fas fa-chevron-down"></i></td>
                <!-- <i class="fas fa-chevron-up"></i> -->
            </tr>

            <?php
                    }
                }else{
                    echo "0 results";
                }
            ?>

        </table>

    </section>





    <a href="#produit_main" class="back_soft_btn" id="haut_de_page"><i class="fas fa-arrow-circle-up"></i> Haut de page</a>
</main>