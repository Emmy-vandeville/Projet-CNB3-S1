<?php /*      //   A REVOIR METHODE CHOIX HEADER
session_start();
if ($_SESSION['autorisation']=='oui') {
  switch($_SESSION['acces']){
    case 0:
      require('includes/header_connexion.php');
      break;
    case 1:
      require('includes/header_enseignant.php');
      break;
    case 2:
      require('includes/header.php');
      break;
    case 3:
      require('includes/header.php');
      break;
  }
}
else {
  require('includes/header.php');
}
require_once('config/configdb.php'); //configuration bdd */
?>

<?php require_once('../includes/header_enseignant.php'); ?>

<main>
<form method="POST" action="../config/creation_grp.php" class="form">
    <fieldset class="field">
      <h3 class="titreformulaire">Créer de nouveaux groupes</h3>
      <label for="promo" class="label">Numéro de promotion :</label>
      <input type="int" name="promo" placeholder="promo" class="input" required></input>
      <label for="nb_grp" class="label">Nombre de groupe :</label>
      <input type="int" name="nb_grp" placeholder="nb_grp" class="input" required></input>
      <button type="add" name="ajout">Créer</button>
    </fieldset>
</form>
  <?php /*
    if(isset($erreur)) {
       echo '<font color="red">'.$erreur."</font>";
    }*/
  ?>
</main>

<?php require_once('../includes/footer.php'); ?>