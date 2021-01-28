<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Page enseignant</title>

    <?php

require_once('fonction.php');

$topmenu[] = array(
  'libelle' => 'Accueil',
  'url' => getRootPath().'pages_enseignant/enseignant.php');
$topmenu[] = array(
  'libelle' => 'Photos promo',
  'url' => getRootPath().'photos.php');
$topmenu[] = array(
  'libelle' => 'Nouveaux groupes',
  'url' => getRootPath().'pages_enseignant/nouveau_grp.php');
$topmenu[] = array(
  'libelle' => 'Affichage des groupes',
  'url' => getRootPath().'pages_enseignant/affichage_grp.php');
$topmenu[] = array(
  'libelle' => 'Archives',
  'url' => getRootPath().'archives-tous.php');

?>


</head>

<img
    class = "logo"
    src="../images_logo/logojunia.png"
    alt="logo ISA"
    height="100px"
    width="250px"
/>

<header>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php for ($i = 0; $i < count($topmenu); $i++) { ?>
      <a class="nav-link" class="nav-item" href="<?php echo $topmenu[$i]['url'] ?>"><?php echo $topmenu[$i]['libelle'] ?></a>
      <?php } ?>
    </ul>
  </div>
</header>
