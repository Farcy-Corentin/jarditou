<html>
<head>
   <meta charset="UTF-8">
   <title>testDb.php</title>
   <?php
   $pro_id = $_GET["pro_id"];

     
  
   try 
   {        
       $db = new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou', 'root', '');
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } 
   catch (Exception $e) {
      echo "Erreur : " . $e->getMessage() . "<br>";
      echo "N° : " . $e->getCode();
      die("Fin du script"); 
   }    
$requete = "SELECT * FROM produits WHERE pro_id=".$pro_id;
$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();


?>
</head>
<body>


<?php //while ($produit) 
//{
   echo $produit->pro_id." – ".$produit->pro_libelle. "<br>"; ?>
    <div> <?php echo $produit->pro_id; ?> </div>
    <div> <?php echo $produit->pro_cat_id; ?> </div>
    <div> <?php echo $produit->pro_ref; ?> </div>
    <div> <?php echo $produit->pro_libelle; ?> </div>
    <div> <?php echo $produit->pro_description; ?> </div>
    <div> <?php echo $produit->pro_prix; ?> </div>
    <div> <?php echo $produit->pro_stock; ?> </div>
    <div> <?php echo $produit->pro_couleur; ?> </div>
    <div> <?php echo $produit->pro_photo; ?> </div>
    <div> <?php echo $produit->pro_d_ajout; ?> </div>
    <div> <?php echo $produit->pro_d_modif; ?> </div>
    <div> <?php echo $produit->pro_bloque; ?> </div>

<?php 

//} ?>

</body>
</html>