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
  'libelle' => 'Accueil',
  'url' => getRootPath().'pages_etudiant/etudiant.php');
$topmenu[] = array(
  'libelle' => 'Mes photos',
  'url' => getRootPath().'pages_etudiant/mes_photos.php');
$topmenu[] = array(
  'libelle' => 'Photos des autres groupes',
  'url' => getRootPath().'photos.php');
$topmenu[] = array(
  'libelle' => 'Archives',
  'url' => getRootPath().'archives-tous.php');
  $topmenu[] = array(
    'libelle' => 'Téléchargement photos cette année',
    'url' => getRootPath().'pages_etudiant/telechargement_actuel.php');
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
