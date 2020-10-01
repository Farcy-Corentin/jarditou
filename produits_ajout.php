<?php 
    include("header.php");
       
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

        echo "<form action='script_modif.php' id='formulaire' method='POST'>
        <div class='row'>
        <div class='text-center col-12'> 
        <img src='images/jarditou_photos/$produit->pro_id.jpg' class='img-fluid' alt='Image responsive'>
        </div>
        <div class='col-12'>
            <div class='form-group'>
                <label for='ref'>ID :</label>
                <input type='text' readOnly  class='form-control' name='pro_id' id='pro_id' value='$produit->pro_id'>
                <label for='ref'>Référence :</label>
                <input type='text'  class='form-control' name='ref' id='ref' value='$produit->pro_ref'>
                <label for='categorie'>Catégorie:  </label>
                <div class='form-group'>                 
                <label for='categorie'>Catégorie:  </label>                 
                <input type='text' readOnly class='form-control' name='categorie' id='catégorie' placeholder='$produit->cat_nom'>
                <label for='libelle'>Libellé :  </label>                 
                <input type='text'  class='form-control' name='libelle' id='libelle' value='$produit->pro_libelle'>
                <label for='description'>Description:  </label>                 
                <input type='text'  class='form-control' name='description' id='description' value='$produit->pro_description'>
                <label for='prix'>Prix:  </label>                 
                <input type='text'  class='form-control' name='prix' id='prix' value='$produit->pro_prix'>
                <label for='stock'>Stock:  </label>                 
                <input type='text'  class='form-control' name='stock' id='stock' value='$produit->pro_stock'>
                <label for='couleur'>Couleur:  </label>                 
                <input type='text'  class='form-control' name='couleur' id='couleur' value='$produit->pro_couleur'>
                <div class='form-group d-flex flex-column'> 
                <div>
                <label class='form-check-label' name='bloque' for='bloque'>Produit bloqué? :</label>
                </div>
                <div class='form-check-inline'>
                <input class='form-check-input' type='radio' name='bloque' value='1' id='bloque'>
                <label class='form-check-label'>Oui</label>
                <input class='form-check-input ml-3' type='radio' name='bloque' value='0' id='bloque'>
                <label class='form-check-label'>Non</label>
                </div>
                </div>    
                </div>
                <div class='form-group'>
                <label for='date_ajout'>Date d\'ajout :</label>
                <input class='form-control'  type='date' name='date_ajout' id='date_ajout' value='$produit->pro_d_ajout'>
                <label for='date_modif'>Date de modification :</label>
                <input class='form-control'  type='date' name='date_modif' id='date_modif' value='$produit->pro_d_modif'>
                </div> 
                
                     
                
                
                <a href='formulaire_modif.php?pro_id='$produit->pro_id' title='retour' role='button' class='btn btn-dark active mt-3 mb-2'>Retour</a>
                <button type='submit' class='btn btn-warning mt-3 mb-2'>Envoyer</button>
                <button type='reset' title='sup' class='btn btn-danger mt-3 mb-2'>Effacer</button>
                </form>";      
                
    include("footer.php");
?>