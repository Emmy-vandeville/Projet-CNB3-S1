<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_cnb3_tpisa;charset=utf8","root","");
require('includes/header_connexion.php');
?>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>filename</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $stmt = $bdd->prepare("SELECT * FROM photo");
      $stmt->execute();
      while($row = $stmt->fetch()){
    ?>
    <tr>
        <td><?php echo $row['id_photo']?></td>
        <td><?php echo $row['source']?></td>
        <td><a href="config/download.php?id_photo=<?php echo $row['id_photo']?>">Télécharger</td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<?php
require('includes/footer.php');
?>
