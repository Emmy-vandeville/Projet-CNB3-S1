<?php
session_start();
// On gère le header en fonction du statut
if ($_SESSION['autorisation']=='oui') {
  switch($_SESSION['acces']){
    case 0:
      require('includes/header_enseignant.php');
      break;
    case 1:
      require('includes/header.php');
      break;
  }
}
else {
  require('includes/header_connexion.php');;
}

// Appel connexion BDD
require_once('../config/configdb.php');
require_once('../config/aes256.php');

// On récuppère les informations du compte utilisateur (compte enseignant)
$query = $conn->prepare('SELECT * FROM compte WHERE id_compte=:id_compte');
$query->bindValue(':id_compte', $_SESSION['id'], PDO::PARAM_INT);
$query->execute();
$compte_enseignant = $query->fetch();
$query->closeCursor();

// On réccupère les compte élèves de la promo en cours (promo de l'enseignant)
$compte = $conn -> query('SELECT * FROM compte WHERE promo='.$compte_enseignant['promo'].' AND statut=1');
?>

<main>
    <h2 class="titre">Indentifiants élèves promo <?= $compte_enseignant['promo']?> :​</h2>
        <?php while($a = $compte->fetch()){?>
        <div class="id">
        <h3>Equipe <?= $a['num_team'] ?></h3>
          <p>Login : <?= $a['login'] ?></p>
          <p>Mot de passe : <?= ssl_decode($a['mdp_aes'], $key) ?></p>
        </div>
      <?php } ?>
</main>
<?php require('../includes/footer.php'); ?>
