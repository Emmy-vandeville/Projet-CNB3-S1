<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <title>Page étudiant</title>

    <?php

require_once('fonction.php');

// Tableau contenant chaque libelle avec nom et pages de redirection
$topmenu[] = array(
  'libelle' => 'Accueil',
  'url' => getRootPath().'pages_etudiant/etudiant.php');
$topmenu[] = array(
  'libelle' => 'Mes photos',
  'url' => getRootPath().'pages_etudiant/mes_photos.php');
$topmenu[] = array(
  'libelle' => 'Photos des autres groupes',
  'url' => getRootPath().'pages_communes/photos.php');
 $topmenu[] = array(
  'libelle' => 'Téléchargement photos cette année',
  'url' => getRootPath().'pages_etudiant/telechargement_actuel.php');
$topmenu[] = array(
  'libelle' => 'Archives',
  'url' => getRootPath().'pages_communes/archives-tous.php');
$topmenu[] = array(
  'libelle' => 'Déconnexion',
  'url' => getRootPath().'config/deconnexion.php');
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
      <!-- Permet d'afficher tous les onglets dans la barre de menu -->
        <a class="nav-link" class="nav-item" href="<?php echo $topmenu[$i]['url'] ?>"><?php echo $topmenu[$i]['libelle'] ?></a>
      <?php } ?>
    </ul>
  </div>
</header>
