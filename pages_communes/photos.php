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
  $statut = $conn->query('SELECT * FROM compte ORDER BY promo DESC LIMIT 1');
  $statut->execute();
  $promo = $statut->fetch();
  $max =  $promo['promo'];
?>
<main>
  <section id="accordeon">
    <?php for($i = $max; $i>=54; $i--){?>
      <article>
        <h2><a class="toggleDetail">Promo <?= $i ?></a></h2>

        <?php
        // On crée le tableau
        $tableau=[];
        // On défini les titres des colonnes
        $tableau[] = array('Nom du groupe', 'Type', 'Nom latin');
        $tableau[] = array('', '', '');
        ?>
        <div class="panel">
          <?php
          $photos = $conn->prepare('SELECT * FROM photo WHERE promo =:act ORDER BY team DESC');
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
            <img class="img_promos" src=<?=$key['source']?> alt="" style="width:90%">
            <p>Team : <?= $key['team'] ?></p>
            <p>Catégorie : <?= $cat_act?></p>
          </div>

          <?php
          // On réccupère les valeurs à mettre dans le fichier
          $tableau[] = array($key['team'], $cat_act, $key['nom_latin']);

          endforeach;
          ?>
          </div>

          <!-- Lien de téléchargement du csv -->
          <p class="dl-noms"><a class="export color-nav" href="../csv/promo_<?=$i?>.csv"><i class="fas fa-download"></i> Exporter les noms</p></a>


      </article>
      <?php
      // On ouvre le fichier csv
      $fichier = fopen('../csv/promo_'.$i.'.csv', 'w+');
      fputs($fichier, '');
      foreach($tableau as $ligne){
        fputcsv($fichier, $ligne, ";");
      }
      fclose($fichier);
      ?>
    <?php } ?>
  </section>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Numéro de promo</th>
        <th>Téléchargement</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $stmt = $conn->prepare("SELECT * FROM archive");
        $stmt->execute();
        while($row = $stmt->fetch()){
      ?>
      <tr>
          <td><?php echo $row['id_photo']?></td>
          <td>Promo n°<?php echo $row['promo']?></td>
          <td><a href="../config/download.php?id_photo=<?php echo $row['id_photo']?>"><i class="fas fa-download"></i></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>



  <script src="../includes/jquery-3.5.1.min.js"></script>
  <script src='../includes/js_photo_promo.js'></script>
</main>

<?php require('../includes/footer.php'); ?>
