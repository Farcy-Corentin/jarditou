<?php 
    include("header.php");
?>

    
<?php
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase(); // Appel de la fonction de connexion
    $requete = "SELECT * FROM produits ORDER BY pro_id,pro_d_ajout DESC";

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

echo '<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="thead-light">';
        echo "<tr>";
            echo '<th class="w-25">Photo</th>';
            echo '<th>ID</th>';
            echo '<th>Référence</th>';
            echo '<th>Libellé</th>';
            echo '<th>Prix</th>';
            echo '<th>Stock</th>';
            echo '<th>Couleur</th>';
            echo '<th>Ajout</th>';
            echo '<th>Modif</th>';
            echo '<th>Bloqué</th>';
        echo "</tr>";
        echo '</thead>';
        echo "<tbody>";    
        while ($row = $result->fetch(PDO::FETCH_OBJ))
        {    
            echo '<tr>';   
            echo     '<td class="table-warning align-middle"><img src="images/jarditou_photos/'.$row->pro_id.'.png" class="img-fluid" alt=""></td>';
            echo    "<td class='align-middle'>$row->pro_id</td>";
            echo    "<td class='align-middle'>$row->pro_ref</td>";
            echo  '<td class="table-warning align-middle"><a href="details.php?pro_id='.$row->pro_id.'"title='.$row->pro_libelle.'><u class="text-danger font-weight-bold text-uppercase">'.$row->pro_libelle.'</u></a></td>';
            echo    "<td class='align-middle'>$row->pro_prix</td>";
            echo    "<td class='align-middle'>$row->pro_stock</td>";
            echo    "<td class='align-middle'>$row->pro_couleur</td>";
            echo    "<td class='align-middle'>$row->pro_d_ajout</td>";
            echo    "<td class='align-middle'>$row->pro_d_modif</td>";
            $bloque = "";
        if(($row->pro_bloque)==1)
        {
            $bloque="bloqué";
            echo '<td class="align-middle">';
            echo '<mark class="bg-danger text-white text-uppercase font-weight-bold">'.$bloque.'</mark>';
            echo "</td>";
        }
        else
        {
            echo "<td>".$bloque."</td>";
        }
            echo "</tr>";
        }
        echo "</tbody>";  
    echo "</table>";
echo "</div>";
?>
<?php 
    include("footer.php");
?>