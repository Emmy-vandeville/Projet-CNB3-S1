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
  require('../includes/header_connexion.php');;
}?>

<?php
  require_once('../config/configdb.php');
  $categories=['Larves','Vers annélides','Mollusques','Arachnides','Crustacés','Myriapodes','Chenilles','Collemboles','Orthoptères','Diptères','Lépidoptères','Nevroptères','Hymenoptères','Homoptères','Hémiptères','Coléoptères'];
  $stat = 0;
  /*$statut = $conn->query('SELECT * FROM compte WHERE statut =:zero');
  $statut->bindValue(':zero', $stat, PDO::PARAM_INT);*/
  $statut = $conn->query('SELECT * FROM compte WHERE statut = 0');
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
          $photos = $conn->prepare('SELECT source, promo, id_categorie FROM photo WHERE promo =:act ORDER BY id_photo DESC');
          $photos->bindValue(':act', $i, PDO::PARAM_INT);
          $photos->execute();
          $data = $photos->fetchAll();
          foreach($data as $key):
          $src_conc = substr($key['source'], 3);
          ?>
          <img src=<?=$src_conc?> alt="" style="width:10%">
          <p>Catégorie : <?= $categories[$key['id_categorie']-1]?></p>
          <?php endforeach; ?>
        </div>
      </article>
    <?php } ?>
  </section>
  <script src="../includes/jquery-3.5.1.min.js"></script>
  <script src='../includes/js_photo_promo.js'></script>
</main>
