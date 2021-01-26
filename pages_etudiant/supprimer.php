<?php
if (isset($_POST['id'])) {
  $ids = json_decode($_POST['id']);
  //$ids c'est le tableau JS en php
  var_dump($ids);

  foreach ($ids as $id) {
    //requête SQL
    DELETE FROM 'table' WHERE 'id' = 'ids' // a modifier quand on aura la BDD
  }
}
?>
