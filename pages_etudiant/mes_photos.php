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
      <div class = "label">
     <label class="label-file">Choisir un fichier :</label>
     <input type="file" name="avatar" class="input-file" id="my-file">
</div>
     <button type="submit" class="btn-env" name="envoyer" value="Envoyer le fichier">Envoyer le fichier</button>
   </fieldset>
 </form>


  <form method="post" action="supprimer.php"> <!-- get c'est quand on passe par l'URL, or ce n'est pas ce qu'on veut donc on passe par post-->
      <button type="submit" class="btn_supr">Supprimer</button>
      <input type="hidden" id="jsonId" name="id" value='[]'/>
  </form>
</body>

<script src="main.js"></script>

<<<<<<< HEAD
=======
<?php require('../includes/footer.php'); ?>
>>>>>>> Page_Etudiant
