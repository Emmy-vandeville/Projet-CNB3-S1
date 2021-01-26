<?php
require_once('../config/configdb.php');

if (isset($_POST['id'])) {
  $ids = json_decode($_POST['id']);
  //$ids c'est le tableau JS en php

    //requete de préparatiàon : je dis ce que je vais faire
    $requete = $conn->prepare('DELETE FROM photo WHERE id_photo = ?');

  foreach ($ids as $id) {
    //requête SQL
    $requete->execute(array($id));
  }
}
header('Location: mes_photos.php');
exit();
?>
