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
                echo '<input type="text" readOnly class="form-control" name="ref" id="ref" placeholder='.$produit->pro_ref.'>';
                echo '<label for="categorie">Catégorie:  </label>';                 
                echo '<input type="text" readOnly class="form-control" name="categorie" id="catégorie" placeholder='.$produit->cat_nom.'>';
                echo '<label for="libelle">Libellé :  </label>';                 
                echo '<input type="text" readOnly class="form-control" name="libelle" id="libelle" placeholder='.$produit->pro_libelle.'>';
                echo '<label for="description">Description:  </label>';                 
                echo '<input type="text" readOnly class="form-control" name="description" id="description" placeholder='.$produit->pro_description.'>';
                echo '<label for="prix">Prix:  </label>';                 
                echo '<input type="text" readOnly class="form-control" name="prix" id="prix" placeholder='.$produit->pro_prix.'>';
                echo '<label for="stock">Stock:  </label>';                 
                echo '<input type="text" readOnly class="form-control" name="stock" id="stock" placeholder='.$produit->pro_stock.'>';
                echo '<label for="couleur">Couleur:  </label>';                 
                echo '<input type="text" readOnly class="form-control" name="couleur" id="couleur" placeholder='.$produit->pro_couleur.'>';
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
                echo '<input class="form-control" readOnly type="text" name="date_ajout" id="date_ajout" placeholder='.$produit->pro_d_ajout.'>';
                echo '<label for="date_modif">Date de modification :</label>';
                echo '<input class="form-control" readOnly type="text" name="date_modif" id="date_modif" placeholder='.$produit->pro_d_modif.'>';
                echo '</div>'; 
                //   bouttons
                '</div>';      
                
                echo 
                '<a href="tableau.php" title="retour" role="button" class="btn btn-dark active mt-3 mb-2">Retour</a>
                <a href="formulaire_modif.php?pro_id='.$produit->pro_id.'" role="button" class="btn btn-warning mt-3 mb-2">Modifier</a>
                <a href=javascript:void(0) role="button" onclick="confirmation(7)" class="btn btn-danger mt-3 mb-2">Supprimer</a>
                </form>
                </div>';
  ?>

<!-- script js pour la confirmation de suppression et redirection vers tableau-->
    <script type=" text/javascript" language="javascript">
      function confirmation(id)
      {
        if (confirm("Veuillez confirmer la supression de la fiche produit : barb001?")) 
        {
          window.location.href="public/php/delete_script.php?id=" + id;
        }
        else
        {
          window.location.href="tableau.php";
        }
      }
      </script>
                     </div>
       <?php 
    include("footer.php");
?>
