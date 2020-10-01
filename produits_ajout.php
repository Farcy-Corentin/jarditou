<?php 
    include("header.php");
       
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

        $db = connexionBase(); // Appel de la fonction deconnexion  

        echo "<form action='script_ajout.php' id='formulaire' method='POST'>
        <div class='row'>
        <div class='col-12'>
            <div class='form-group'>
                <label for='ref'>ID :</label>
                <input type='text'  class='form-control' name='pro_id' id='pro_id' value=''>
                <label for='ref'>Référence :</label>
                <input type='text'  class='form-control' name='ref' id='ref' value=''>
                <div class='form-group'>                 
                <label for='categorie'>Catégorie:  </label>                 
                <input type='text' class='form-control' name='categorie' id='catégorie' value=''>
                <label for='libelle'>Libellé :  </label>                 
                <input type='text'  class='form-control' name='libelle' id='libelle' value=''>
                <label for='description'>Description:  </label>                 
                <input type='text'  class='form-control' name='description' id='description' value=''>
                <label for='prix'>Prix:  </label>                 
                <input type='text'  class='form-control' name='prix' id='prix' value=''>
                <label for='stock'>Stock:  </label>                 
                <input type='text'  class='form-control' name='stock' id='stock' value=''>
                <label for='couleur'>Couleur:  </label>                 
                <input type='text'  class='form-control' name='couleur' id='couleur' value=''>
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
                <input class='form-control'  type='date' name='date_ajout' id='date_ajout' value=''>
                <label for='date_modif'>Date de modification :</label>
                <input class='form-control'  type='date' name='date_modif' id='date_modif' value=''>
                </div> 
                
                     
                
                
                <a href='tableau.php title='retour' role='button' class='btn btn-dark active mt-3 mb-2'>Retour</a>
                <button type='submit' class='btn btn-warning mt-3 mb-2'>Envoyer</button>
                <button type='reset' title='sup' class='btn btn-danger mt-3 mb-2'>Effacer</button>
                </form>";      
                
    include("footer.php");
?>