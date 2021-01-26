<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Page étudiant</title>

    <?php

require_once('fonction.php');

$topmenu[] = array(
  'libelle' => 'Photos promo',
  'url' => getRootPath().'../photos.php');
$topmenu[] = array(
  'libelle' => 'Nouveaux groupes',
  'url' => getRootPath().'pages_enseignant/nouveau_grp.php');
$topmenu[] = array(
  'libelle' => 'Archives',
  'url' => getRootPath().'pages_enseignant/archives.php');
?>


</head>
<header>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php for ($i = 0; $i < count($topmenu); $i++) { ?>
      <a class="nav-link" class="nav-item" href="<?php echo $topmenu[$i]['url'] ?>"><?php echo $topmenu[$i]['libelle'] ?></a>
      <?php } ?>
    </ul>
  </div>
</header>
<body>
</body>
</html>
