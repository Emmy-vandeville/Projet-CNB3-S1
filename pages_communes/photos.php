<?php
session_start();
// On gère le header en fonction du statut
/*if ($_SESSION['autorisation']=='oui') {
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
  require('../includes/header_connexion.php');;
}*/?>

<?php
  require_once('../config/configdb.php');
  $statut = $conn->query('SELECT * FROM compte ORDER BY promo DESC LIMIT 1');
  $statut->execute();
  $promo = $statut->fetch();
  $max =  $promo['promo'];
?>
<main>

  <section id="accordeon">
    <?php for($i = $max; $i>=54; $i--){?>
      <article>
        <h2><a class="toggleDetail" href="#">Promo <?= $i ?></a></h2>
        <div class="panel">
          <?php
          $photos = $conn->prepare('SELECT source, promo, id_categorie, team FROM photo WHERE promo =:act ORDER BY team DESC');
          $photos->bindValue(':act', $i, PDO::PARAM_INT);
          $photos->execute();
          $data = $photos->fetchAll();

          foreach($data as $key):
            $categorie = $conn->prepare('SELECT * FROM categorie WHERE id_categorie=:id_cat');
            $categorie->bindValue(':id_cat', $key['id_categorie'], PDO::PARAM_INT);
            $categorie->execute();
            $data_cat = $categorie->fetch();
            $cat_act = $data_cat['nom'];
          ?>
          <div class="display_pic">
            <img src=<?=$key['source']?> alt="" style="width:10%">
            <p>Team : <?= $key['team'] ?></p>
            <p>Catégorie : <?= $cat_act?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </article>
    <?php } ?>
  </section>
  <script src="../includes/jquery-3.5.1.min.js"></script>
  <script src='../includes/js_photo_promo.js'></script>
</main>
