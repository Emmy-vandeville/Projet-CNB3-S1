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
}

require_once('../config/configdb.php');
  $statut = $conn->query('SELECT * FROM compte ORDER BY promo DESC LIMIT 1');
  $statut->execute();
  $promo = $statut->fetch();
  $max = $promo['promo'];
?>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Groupe</th>
      <th>Téléchargement</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $stmt = $conn->prepare("SELECT * FROM photo WHERE promo =:act");
      $stmt->bindValue(':act',$max,PDO::PARAM_INT);
      $stmt->execute();
      while($row = $stmt->fetch()){
    ?>
    <tr>
        <td><?php echo $row['id_photo']?></td>
        <td>Groupe n°<?php echo $row['team']?></td>
        <td><a href="../config/download_actuel.php?id_photo=<?php echo $row['id_photo']?>"><i class="fas fa-download"></i></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<?php
require_once('../includes/footer.php');
?>