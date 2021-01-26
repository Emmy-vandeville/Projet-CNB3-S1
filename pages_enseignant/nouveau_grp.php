<?php /*      //   A REVOIR METHODE CHOIX HEADER
session_start();
if ($_SESSION['autorisation']=='oui') {
  switch($_SESSION['acces']){
    case 0:
      require('includes/header_connexion.php');
      break;
    case 1:
      require('includes/header_admin.php');
      break;
    case 2:
      require('includes/header_emp.php');
      break;
  }
}
else {
  require('includes/header.php');;
}
     */
?>

<?php require_once('../includes/header_enseignant.php'); ?>

<main>
<form method="POST" action="../config/creation_grp.php" class="form">
    <fieldset class="field">
      <h3 class="titreformulaire">Créer de nouveaux groupes</h3>
      <div class = "row">
      <label for="promo" class="label">Numéro de promotion :</label>
      <input type="int" name="promo" placeholder="Promo" class="input" required></input>
      </div>
      <div class = "row">
      <label for="nb_grp" class="label">Nombre de groupe :</label>
      <input type="int" name="nb_grp" placeholder="Nombre de binome" class="input" required></input>
      </div>
      <button type="add" name="ajout" class="btn_nv_grp">Créer</button>
    </fieldset>
</form>
  <?php /*
    if(isset($erreur)) {
       echo '<font color="red">'.$erreur."</font>";
    }*/
  ?>
</main>

<?php require_once('../includes/footer.php'); ?>