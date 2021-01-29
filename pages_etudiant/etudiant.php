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
  <h2> Bienvenue sur votre espace étudiant </h1>
  <div class="contain">
    <body>
      <section id="carousel">
        <div id="carousel-item" class="carousel-item">
          <img src="img/chat.jpg" alt="Le chat">
          <div class="carousel-caption">
          </div>
          <a href="#" id="previous" title="Image précédente"><i class="fas fa-3x fa-angle-left"></i></a>
          <a href="#" id="next" title="Image suivante"><i class="fas fa-3x fa-angle-right"></i></a>
          <p class="carousel-nav align-center"></p>
        </div>
      </section>
    </body>
  </div>
</main>

<script src="../config/carousel.js"></script>
