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

$bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_cnb3_tpisa;charset=utf8","root","root");
?>


<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Numéro de promo</th>
      <th>Télechargement</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $stmt = $bdd->prepare("SELECT * FROM archive");
      $stmt->execute();
      while($row = $stmt->fetch()){
    ?>
    <tr>
        <td><?php echo $row['id_photo']?></td>
        <td>Promo n°<?php echo $row['promo']?></td>
        <td><a href="../config/download.php?id_photo=<?php echo $row['id_photo']?>"><i class="fas fa-arrow-down"></i></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>

<?php require('../includes/footer.php'); ?>
