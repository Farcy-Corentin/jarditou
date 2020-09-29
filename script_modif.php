<?php
$ref=$_POST['ref'];
$categorie=$_POST['categorie'];
$libelle=$_POST['libelle'];
$description=$_POST['description'];
$prix=floatval($_POST['prix']);
var_dump($prix);
$stock=$_POST['stock'];
$couleur=$_POST['couleur'];
$bloque=$_POST['bloque'];
$dateAjout=$_POST['date_ajout'];
$dateModif=$_POST['date_modif'];
$pro_id = $_POST['pro_id'];
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion


var_dump($_POST);
    $requete = $db->prepare("UPDATE produits,categories 
    JOIN categories 
    ON produits.pro_cat_id=categories.cat_id
    SET pro_ref= ':new_ref', categories.cat_id= ':new_cat', pro_libelle= ':new_libelle',pro_description= ':new_description',pro_prix= ':new_prix',pro_stock= ':new_stock',pro_couleur= ':new_couleur',pro_bloque= ':newbloque',pro_d_ajout= ':new_dateAjout',pro_d_modif= ':new_dateModif'
    WHERE pro_id=':pro_id'");
    var_dump($requete);
    $requete->bindValue(':pro_id',$pro_id,PDO::PARAM_INT);    
    $requete->bindValue(':new_ref',$ref);
        $requete->bindValue(':new_cat',$categorie);
        $requete->bindValue(':new_libelle',$libelle);
        $requete->bindValue(':new_description',$description);
        $requete->bindValue(':new_prix',$prix);
        $requete->bindValue(':new_stock',$stock,PDO::PARAM_INT);
        $requete->bindValue(':new_couleur',$couleur);
        $requete->bindValue(':new_bloque',$bloque,PDO::PARAM_INT);
        $requete->bindValue(':new_dateAjout',$dateAjout);
        $requete->bindValue(':new_dateModif',$dateModif);
        var_dump($requete);
        $requete->execute();
?>