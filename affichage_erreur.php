<?php
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
$erreur = $_GET['erreur'];
?>

<main>
    <h2 class="titre">OUPSS...</h2>
    <section class="message-erreur">
      <p><?php echo $erreur ?></p>
      <p>Il semblerait qu'une erreur se soit produite,</p>
      <p>Veuillez réessayer</p>
      <p class="arriere">Cliquez pour revenir à la page précédente</p>
      <a href="javascript:history.go(-1)"><i class="fas fa-arrow-left color-nav"></i></a>
    </section>
</main>

<?php require('includes/footer.php'); ?>
