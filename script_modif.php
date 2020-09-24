<?php
$ref=$_POST['ref'];
$categorie=$_POST['categorie'];
$libelle=$_POST['libelle'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$stock=$_POST['stock'];
$couleur=$_POST['couleur'];
$bloque=$_POST['bloque'];
$dateAjout=$_POST['date_ajout'];
$dateModif=$_POST['date_modif'];
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion

if(isset($_POST['ref']) && isset($_POST['categorie']) && isset($_POST['libelle']) && isset($_POST['description'])
 && isset($_POST['prix']) && isset($_POST['stock']) && isset($_POST['couleur']) && isset($_POST['date_ajout']) && isset($_POST['date_modif']))
{
    $requete = $db->prepare("UPDATE produits SET pro_ref= :new_ref, pro_cat_id= :new_cat, pro_libelle= :new_libelle,pro_description= :new_description,pro_prix= :new_prix,pro_stock= :new_stock,pro_couleur= :new_couleur,pro_bloque= :new_bloque,pro_d_ajout= :new_dateAjout,pro_d_modif= :new_dateModif");
    $requete->execute(array(
        ':new_ref'=>$ref,
        ':new_cat'=>$categorie,
        ':new_libelle'=>$libelle,
        ':new_description'=>$description,
        ':new_prix'=>$prix,
        ':new_stock'=>$stock,
        ':new_couleur'=>$couleur,
        ':new_bloque'=>$bloque,
        ':new_dateAjout'=>$dateAjout,
        ':new_dateModif'=>$dateModif
    ));
}
?>