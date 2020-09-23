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

if(isset($_POST['ref']))
{
    $requete = "UPDATE produits SET pro_ref='$ref'";
}
if(isset($_POST['categorie']))
{
    $requete = "UPDATE produits SET pro_cat_id='$categorie'";
}
if(isset($_POST['libelle']))
{
    $requete = "UPDATE produits SET pro_libelle='$libelle'";
}
if(isset($_POST['description']))
{
    $requete = "UPDATE produits SET pro_description='$description'";
}
if(isset($_POST['prix']))
{
    $requete = "UPDATE produits SET pro_prix='$prix'";
}
if(isset($_POST['stock']))
{
    $requete = "UPDATE produits SET pro_stock='$stock'";
}
if(isset($_POST['couleur']))
{
    $requete = "UPDATE produits SET pro_couleur='$couleur'";
}
// if(isset($_POST['bloque']))
// {
//     $requete = "UPDATE produits SET pro_bloque='$bloque'";
// }
if(isset($_POST['date_ajout']))
{
    $requete = "UPDATE produits SET pro_d_ajout='$dateAjout'";
}
if(isset($_POST['date_modif']))
{
    $requete = "UPDATE produits SET pro_d_modif='$dateModif'";
}
?>