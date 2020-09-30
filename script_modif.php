<?php
$pro_ref=$_POST['ref'];
$pro_libelle=$_POST['libelle'];
$pro_description=$_POST['description'];
$pro_prix=$_POST['prix'];
$pro_cat_id=$_POST['categories'];
$pro_stock=$_POST['stock'];
$pro_couleur=$_POST['couleur'];
$pro_bloque=$_POST['bloque'];
$pro_d_ajout=$_POST['date_ajout'];
$pro_d_modif=$_POST['date_modif'];
$pro_id = $_POST['pro_id'];
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
var_dump($_POST);


    $requete = $db->prepare("UPDATE produits 
    SET pro_ref= ':pro_ref',pro_cat_id= :pro_cat_id,pro_photo='', pro_libelle= ':pro_libelle',pro_description= ':pro_description',pro_prix= :pro_prix,pro_stock= :pro_stock,pro_couleur= ':pro_couleur',pro_bloque= :pro_bloque,pro_d_ajout= ':pro_d_ajout',pro_d_modif= ':pro_d_modif'
    WHERE pro_id=:pro_id");
    $requete->bindValue(':pro_id',$pro_id,PDO::PARAM_INT);  
    var_dump($pro_id);  
    $requete->bindValue(':pro_ref',$pro_ref);
    var_dump($ref);
        $requete->bindValue(':pro_cat_id',$pro_cat_id,PDO::PARAM_INT);
        var_dump($cat_id);
        $requete->bindValue(':pro_libelle',$pro_libelle);
        var_dump($libelle);
        $requete->bindValue(':pro_description',$pro_description);
        var_dump($description);
        $requete->bindValue(':pro_prix',$pro_prix,PDO::PARAM_INT);
        var_dump($prix);
        $requete->bindValue(':pro_stock',$pro_stock,PDO::PARAM_INT);
        var_dump($stock);
        $requete->bindValue(':pro_couleur',$pro_couleur);
        var_dump($couleur);
        $requete->bindValue(':pro_bloque',$pro_bloque,PDO::PARAM_INT);
        var_dump($bloque);
        $requete->bindValue(':pro_d_ajout',$pro_d_ajout);
        var_dump($dateAjout);
        $requete->bindValue(':pro_d_modif',$pro_d_modif);
        var_dump($dateModif);

        $requete->execute();
        var_dump($requete);
?>