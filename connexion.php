<?php
/*session_start();
if ($_SESSION['autorisation']=='oui') {
  header('location:index.php');
  exit;
}*/
require('includes/header.php');
?>
<main>
    <form method="POST" action="config/config_co.php">
        <fieldset>
          <h3 class="titreformulaire">Connexion</h3>
          <input type="text" name="login" placeholder="Login" required>
          <input type="password" minlength="8" name="mdp" placeholder="Mot de passe" required>
          <input type="hidden" name="affichage" value="">
          <button type="submit" name="valider">Se connecter</button>
        </fieldset>
    </form>
</main>

<?php require('includes/footer.php'); ?>
