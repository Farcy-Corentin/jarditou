<?php
$ref=$_POST['ref'];
$libelle=$_POST['libelle'];
$description=$_POST['description'];
$prix=floatval($_POST['prix']);
$cat_id=$_POST['categories'];
$stock=$_POST['stock'];
$couleur=$_POST['couleur'];
$bloque=$_POST['bloque'];
$dateAjout=$_POST['date_ajout'];
$dateModif=$_POST['date_modif'];
$pro_id = $_POST['pro_id'];
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
var_dump($_POST);


    $requete = $db->prepare("UPDATE produits 
    SET pro_ref= :new_ref,pro_cat_id= :new_cat,pro_photo='', pro_libelle= :new_libelle,pro_description= :new_description,pro_prix= :new_prix,pro_stock= :new_stock,pro_couleur= :new_couleur,pro_bloque= :newbloque,pro_d_ajout= :new_dateAjout,pro_d_modif= :new_dateModif
    WHERE pro_id=:pro_id");
    $requete->bindValue(':pro_id',$pro_id,PDO::PARAM_INT);    
    $requete->bindValue(':new_ref',$ref);
        $requete->bindValue(':new_cat',$cat_id,PDO::PARAM_INT);
        $requete->bindValue(':new_libelle',$libelle);
        $requete->bindValue(':new_description',$description);
        $requete->bindValue(':new_prix',$prix,PDO::PARAM_INT);
        $requete->bindValue(':new_stock',$stock,PDO::PARAM_INT);
        $requete->bindValue(':new_couleur',$couleur);
        $requete->bindValue(':new_bloque',$bloque,PDO::PARAM_INT);
        $requete->bindValue(':new_dateAjout',$dateAjout);
        $requete->bindValue(':new_dateModif',$dateModif);

        $requete->execute();
        var_dump($requete);
?>