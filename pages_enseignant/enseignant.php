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
  require('includes/header_connexion.php');;
}?>

<main>

<h2>Bienvenue sur votre espace enseignant</h2>

</main>

<?php require_once('../includes/footer.php'); ?>