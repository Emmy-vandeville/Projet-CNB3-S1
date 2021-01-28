<?php
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
      <th>Action</th>
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
        <td>Groupe n°<?php echo $row['promo']?></td>
        <td><a href="../config/download_actuel.php?id_photo=<?php echo $row['id_photo']?>">Télécharger</td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<?php
?>