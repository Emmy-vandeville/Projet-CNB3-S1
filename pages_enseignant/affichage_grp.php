<?php
session_start();
//gérer affichage header en fonction du statut
require_once('../includes/header_enseignant.php');

// Appel connexion BDD
require_once('../config/configdb.php');

// On récuppère les informations du compte utilisateur (compte enseignant)
$query = $conn->prepare('SELECT * FROM compte WHERE id_compte=:id_compte');
$query->bindValue(':id_compte', $_SESSION['id'], PDO::PARAM_INT);
$query->execute();
$compte_enseignant = $query->fetch();
$query->closeCursor();

// On réccupère les compte élèves de la promo en cours (promo de l'enseignant)
$statut = 1;
$pdo = $conn->prepare('SELECT * FROM compte WHERE promo=:promo AND statut=:staut');
$pdo->bindValue(':promo', $compte_enseignant['promo'], PDO::PARAM_INT);
$pdo->bindValue(':statut', $statut, PDO::PARAM_INT);
$pdo->execute();
$compte = $pdo->fetchAll()
$pdo->closeCursor();
$conn = NULL;

?>

<main>
    <h2 class="titre">Indentifiants élèves promo <?= $compte_enseignant['promo']?> :​</h2>
        <?php foreach($compte as $key => $compte):?>
        <div class="id">
          <?php $key = $compte['id_compte']?>
          <p>Login : <?= $compte['login'] ?></p>
          <p>Mot de passe : <?= $compte['mdp'] ?></p>
        </div>
      <?php endforeach; ?>
</main>

<?php require('../includes/footer.php'); ?>
