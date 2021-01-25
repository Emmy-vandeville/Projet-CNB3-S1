<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page étudiant</title>

    <?php

require_once('includes/fonction.php');

$topmenu[] = array(
  'libelle' => 'Accueil',
  'url' => getRootPath().'index.php');
$topmenu[] = array(
  'libelle' => 'Mes photos',
  'url' => getRootPath().'photos.php');
$topmenu[] = array(
  'libelle' => 'Photos des autres groupes',
  'url' => getRootPath().'autresgroupes.php');
$topmenu[] = array(
  'libelle' => 'Archives',
  'url' => getRootPath().'archives.php');
?>


</head>
<body>
<div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <?php for ($i = 0; $i < count($topmenu); $i++) { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo $topmenu[$i]['url'] ?>"><?php echo $topmenu[$i]['libelle'] ?></a></li>
          <?php } ?>
</body>
</html>
