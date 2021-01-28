<?php
session_start();
// On gère le header en fonction du statut
if ($_SESSION['autorisation']=='oui') {
  switch($_SESSION['acces']){
    case 0:
      require('../includes/header_enseignant.php');
      break;
    case 1:
      require('../includes/header.php');
      break;
  }
}
else {
  require('../includes/header_connexion.php');;
}?>
<body>

<main class = "container">
  <ul id="photo-list">
    <?php require_once('affichage_image.php'); ?>
  </ul>
</main>

<form method="POST" action="ajout_photo.php" enctype="multipart/form-data">
  <fieldset class="field-photo">
    <h3 class="titreformulaire">Ajouter une photo</h3>
     <!-- On limite le fichier à 10Mo -->
     <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
     <label>Fichier :</label>
     <input type="file" name="avatar">

     <label for="species-select">Choisissez une espèce:</label>

     <select name="animaux" >
        <option value="">--Please choose an option--</option>
        <option value="1" >Larves</option>
        <option value="2" >Vers annélides</option>
        <option value="3" >Mollusques</option>
        <option value="4" >Arachnides</option>
        <option value="5" >Crustacés</option>
        <option value="6" >Myriapodes</option>
        <option value="7" >Chenilles</option>
        <option value="8" >Collenboles</option>
        <option value="9" >Orthoptères</option>
        <option value="10">Diptères</option>
        <option value="11">Lépidoptères</option>
        <option value="12">Nevroptères</option>
        <option value="13">Hymenoptères</option>
        <option value="14">Homoptères</option>
        <option value="15">Hémiptères</option>
        <option value="16">Coléoptères</option>

      </select>


     <button type="submit" name="envoyer" value="Envoyer le fichier" class="btn-env">Envoyer le fichier</button>
   </fieldset>
 </form>

<p id="total"> Vous allez supprimer <span>0</span> photo(s) </p>

  <form method="post" action="supprimer.php"> <!-- get c'est quand on passe par l'URL, or ce n'est pas ce qu'on veut donc on passe par post-->
      <button type="submit" class="btn_supr">Supprimer</button>
      <input type="hidden" id="jsonId" name="id" value='[]'/>
  </form>
</body>

<script src="main.js"></script>


<?php require('../includes/footer.php'); ?>

