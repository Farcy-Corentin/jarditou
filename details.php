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
        echo "<div class='row'>
        <div class='text-center col-12'> 
        <img src='images/jarditou_photos/$produit->pro_id.jpg' class='img-fluid' alt='Image responsive'>
        </div>
        <div class='col-12'>
              <div class='form-group'>
                <label for='ref'>ID :</label>
                <input type='text' readOnly  class='form-control' name='pro_id' id='pro_id' placeholder='$produit->pro_id'>
                <label for='ref'>Référence :</label>
                <input type='text' readOnly  class='form-control' name='ref' id='ref' placeholder='$produit->pro_ref'>
                <label for='categorie'>Catégorie:  </label>                 
                <input type='text' readOnly class='form-control' name='categorie' id='catégorie' placeholder='$produit->cat_nom'>
                <label for='libelle'>Libellé :  </label>                 
                <input type='text' readOnly class='form-control' name='libelle' id='libelle' placeholder='$produit->pro_libelle'>
                <label for='description'>Description:  </label>                 
                <textarea class='form-control' readOnly name='description' id='description' rows='3' placeholder='$produit->pro_description'></textarea>
                <label for='prix'>Prix:  </label>                 
                <input type='text' readOnly class='form-control' name='prix' id='prix' placeholder='$produit->pro_prix'>
                <label for='stock'>Stock:  </label>                 
                <input type='text' readOnly class='form-control' name='stock' id='stock' placeholder='$produit->pro_stock'>
                <label for='couleur'>Couleur:  </label>                 
                <input type='text' readOnly class='form-control' name='couleur' id='couleur' placeholder='$produit->pro_couleur'>
                <div class='form-group d-flex flex-column'> 
                <div>
                <label class='form-check-label' name='bloque' for='bloque'>Produit bloqué? :</label>
                </div>
                <div class='form-check-inline'>
                
                <input class='form-check-input' type='radio' name='bloque' value='$produit->pro_bloque' id='bloque'>
                <label class='form-check-label'>Oui</label>
                <input class='form-check-input ml-3' type='radio' name='bloque' value='non' id='bloque'>
                <label class='form-check-label'>Non</label>
                </div>
                </div>    
                </div>
                <div class='form-group'>
                <label for='date_ajout'>Date d\'ajout :</label>
                <input class='form-control' readOnly type='date' name='date_ajout' id='date_ajout' placeholder='$produit->pro_d_ajout'>
                <label for='date_modif'>Date de modification :</label>
                <input class='form-control' readOnly type='date' name='date_modif' id='date_modif' placeholder='$produit->pro_d_modif'>
                </div> 
                
                
                 
                <a href='tableau.php' title='retour' role='button' class='btn btn-dark active mt-3 mb-2'>Retour</a>
                <a href='formulaire_modif.php?pro_id=".$produit->pro_id."' role='button' class='btn btn-warning mt-3 mb-2'>Modifier</a>
                <a href=javascript:void(0) role='button' onclick='confirmation(7)' class='btn btn-danger mt-3 mb-2'>Supprimer</a>
                </form>
                </div>";
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
