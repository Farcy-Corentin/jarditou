<?php 
    include("header.php");
?>
<p>* Ces zones sont obligatoires</p>
             <form action="exoform.php" method="POST" id="formulaire_contact" name="Vos coordonnées">
                 <h2 class="font-weight-bold">Vos coordonnées</h2>
                 <div class="form-group">
                     <label for="nom">Votre nom* :</label>
                     <input type="text" class="form-control" name="nom" id="nom" ><br>
                     <label for="prenom">Votre prénom* :</label>                 
                     <input type="text" class="form-control" name="prenom" id="prenom" >
                     
                     <div class="form-group d-flex flex-column"> 
                         <div>
                             <label class="form-check-label" for="sexe">Sexe* :</label>
                         </div>
                         <div class="form-check-inline">
                             
                             <input class="form-check-input" type="radio" name="sexe" value="féminin" id="sexeF" >
                             <label class="form-check-label">Féminin</label>
                             <input class="form-check-input ml-3" type="radio" name="sexe" value="masculin" id="sexeM">
                             <label class="form-check-label">Masculin</label>
                         </div>
                     </div>    
                 </div>
                 <div class="form-group">
                     <label for="date_naissance">Date Naissance* :</label>
                     <input class="form-control" type="date" name="date_naissance" id="date_naissance" >
                     <label for="code_postal">Code postal* :</label>
                     <input class="form-control" type="text" name="code_postal" id="code_postal">
                     <label for="adresse">Adresse :</label>
                     <input class="form-control" type="text" name="adresse" id="adresse">
                     <label for="ville">Ville :</label>
                     <input class="form-control" type="text" name="ville" id="ville">
                     <label for="email">Email* :</label>
                     <input class="form-control" type="text" placeholder="dave.loper@afpa.fr" title="dave.loper@afpa.fr" id="email" name="email">    
                     <h2 class="font-weight-bold">Votre demande</h2>
                     <label for="sujet">Sujet :</label>
                 <select class="form-control" name="Mes commandes" id="sujet"> 
                     <option value="" selected>Veuillez choisir une option</option>
                     <option>Mes commandes</option>
                     <option>Question sur un produit</option>
                     <option>Réclamation</option>
                     <option>Autres</option>
                 </select>
                 <label for="votre_question">Votre question* :</label>
                     <textarea class="form-control" name="votre_question" id="votre_question" cols="20" rows="2"></textarea>
                     <div class="form-check">
                         <input  class="form-check-input" type="checkbox" name="accepte" id="accepte">
                         <label class="form-check-label" for="accepte">J'accepte le traitement informatique de ce formulaire</label>
                     </div> 
                 </div>      
                    
                     <div class="d-inline-flex"> 
                         <button type="submit" id="button1" class="btn btn-dark"> Envoyer</button>
                         <button type="reset" class="btn btn-dark ml-2"> Effacer</button>
                     </div>
             </form>
<?php 
    include("footer.php");
?>