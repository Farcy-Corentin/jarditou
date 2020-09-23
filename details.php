<?php 
    include("header.php");
?>
        <?php    
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

        $db = connexionBase(); // Appel de la fonction deconnexion
        $pro_id = $_GET["pro_id"];
        $requete = "SELECT * FROM produits join categories on produits.pro_cat_id=categories.cat_id WHERE pro_id=".$pro_id;

        $result = $db->query($requete);
        if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    }

    if ($result->rowCount() == 0) 
    {
       // Pas d'enregistrement
       die("La table est vide");
    }

        // Renvoi de l'enregistrement sous forme d'un objet
        $produit = $result->fetch(PDO::FETCH_OBJ);
        echo '<div class="row">';
        echo '<div class="text-center col-12">'; 
        echo '<img src="images/jarditou_photos/'.$produit->pro_id.'.jpg" class="img-fluid" alt="Image responsive">';
        echo "</div>";
        echo "<div class='col-12'>";
            echo '<div class="form-group">';
                echo '<label for="ref">Référence :</label>';
                echo '<input type="text" class="form-control" name="ref" id="ref" placeholder='.$produit->pro_ref.'>';
                echo '<label for="categorie">Catégorie:  </label>';                 
                echo '<input type="text" class="form-control" name="categorie" id="catégorie" placeholder='.$produit->cat_nom.'>';
                echo '<label for="libelle">Libellé :  </label>';                 
                echo '<input type="text" class="form-control" name="libelle" id="libelle" placeholder='.$produit->pro_libelle.'>';
                echo '<label for="description">Description:  </label>';                 
                echo '<input type="text" class="form-control" name="description" id="description" placeholder='.$produit->pro_description.'>';
                echo '<label for="prix">Prix:  </label>';                 
                echo '<input type="text" class="form-control" name="prix" id="prix" placeholder='.$produit->pro_prix.'>';
                echo '<label for="stock">Stock:  </label>';                 
                echo '<input type="text" class="form-control" name="stock" id="stock" placeholder='.$produit->pro_stock.'>';
                echo '<label for="couleur">Couleur:  </label>';                 
                echo '<input type="text" class="form-control" name="couleur" id="couleur" placeholder='.$produit->pro_couleur.'>';
                echo '<div class="form-group d-flex flex-column">'; 
                echo '<div>';
                echo '<label class="form-check-label" for="bloque">Produit bloqué? :</label>';
                echo '</div>';
                echo '<div class="form-check-inline">';
                echo '<input class="form-check-input" type="radio" name="bloque" value="oui" id="bloque">';
                echo '<label class="form-check-label">Oui</label>';
                echo '<input class="form-check-input ml-3" type="radio" name="bloque" value="non" id="bloque">';
                echo '<label class="form-check-label">Non</label>';
                echo '</div>';
                echo '</div>';    
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="date_ajout">Date d\'ajout :</label>';
                echo '<input class="form-control" type="text" name="date_ajout" id="date_ajout" placeholder='.$produit->pro_d_ajout.'>';
                echo '<label for="date_modif">Date de modification :</label>';
                echo '<input class="form-control" type="text" name="date_modif" id="date_modif" placeholder='.$produit->pro_d_modif.'>';

                 ?>
                     
                     <label for="code_postal">Code postal* :</label>
                     <input class="form-control" type="text" name="code_postal" id="code_postal">
                     <label for="adresse">Adresse :</label>
                     <input class="form-control" type="text" name="adresse" id="adresse">
                     <label for="ville">Ville :</label>
                     <input class="form-control" type="text" name="ville" id="ville">
                     <label for="email">Email* :</label>
                     <input class="form-control" type="text" placeholder="dave.loper@afpa.fr" title="dave.loper@afpa.fr" id="email" name="email">    
                     <h2 class="font-weight-bold">Votre demande</h2>
                     <label for="sujet">Sujet :</label>
                     <select class="form-control" name="Mes commandes" id="sujet"> 
                     <option value="" selected>Veuillez choisir une option</option>
                     <option>Mes commandes</option>
                     <option>Question sur un produit</option>
                     <option>Réclamation</option>
                     <option>Autres</option>
                     </select>
                     <label for="votre_question">Votre question* :</label>
                     <textarea class="form-control" name="votre_question" id="votre_question" cols="20" rows="2"></textarea>
                     <div class="form-check">
                     <input  class="form-check-input" type="checkbox" name="accepte" id="accepte">
                     <label class="form-check-label" for="accepte">J'accepte le traitement informatique de ce formulaire</label>
                     </div> 
                 </div>      
                    
                     <div class="d-inline-flex"> 
                     <a href="detail.php?id=12" title="retour" role="button" class="btn btn-dark active mt-3">Retour</a>
        <button type="submit" class="btn btn-warning mt-3">Envoyer</button>
        <button type="reset" title="sup" class="btn btn-danger mt-3">Effacer</button>
                     </div>
       <?php 
    include("footer.php");
?>
