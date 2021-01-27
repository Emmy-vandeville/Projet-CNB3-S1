<?php require_once('../includes/header.php'); ?>


<body>

<main class = "container">
<ul id="photo-list">
    <li class="element">
      <img src="../img/chat2.jpg" id="1" height="150" width="150">
    </li>
    <li class="element">
      <img src="../img/chat7.jpg" id="2" height="150" width="150">
    </li>
    <li class="element">
      <img src="../img/chat4.jpg" id="3" height="150" width="150">
    </li>
    <li class="element">
      <img src="../img/chat1.jpg" id="4" height="150" width="150">
    </li>
    <li class="element">
      <img src="../img/chat3.jpg" id="5" height="150" width="150">
    </li>
</ul>

</main>
  <form method="POST" action="ajout_photo.php" enctype="multipart/form-data">
  <fieldset class="field-photo">
    <h3 class="titreformulaire">Ajouter une photo</h3>
     <!-- On limite le fichier à 500Ko -->
     <input type="hidden" name="MAX_FILE_SIZE" value="500000">
     <label>Fichier :</label>
     <input type="file" name="avatar">
     <button type="submit" name="envoyer" value="Envoyer le fichier">Envoyer le fichier</button>
   </fieldset>
 </form>

<p id="total">Vous allez supprimer <span>0</span> image(s)</p>

<form method="post" action="supprimer.php"> <!-- get c'est quand on passe par l'URL, or ce n'est pas ce qu'on veut donc on passe par post-->
    <button type="submit" class="btn_supr">Supprimer</button>
    <input type="hidden" id="jsonId" name="id" value='[]'/>
</form>

</body>

<script src="main.js"></script>
