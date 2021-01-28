<?php
require_once('../config/configdb.php');
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
      $stmt = $conn->prepare("SELECT * FROM photo");
      $stmt->execute();
      while($row = $stmt->fetch()){
    ?>
    <tr>
        <td><?php echo $row['id_photo']?></td>
        <td>Groupe n°<?php echo $row['team']?></td>
        <td><a href="../config/download_actuel.php?id_photo=<?php echo $row['id_photo']?>">Télécharger</td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<?php
?>