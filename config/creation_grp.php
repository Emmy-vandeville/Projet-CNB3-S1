<?php
session_start();
if (isset($_POST['ajout'])){ // Test appuie sur bouton ajout dans page nouveau_grp.php
  // Récupération des élément passés en post et définition variables
  $promo = $_POST['promo'];
  $nb_grp = $_POST['nb_grp'];
  $statut = 1;

  // Fonction générant un mot de passe aléatoire
  function Genere_Password($size)
  {
      // Initialisation des caractères utilisables
      $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
  
      for($j=0;$j<$size;$j++)
      {
          $password .= ($j%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
      }

      return $password;
  }

  // Appel connexion BDD
  require_once('configdb.php');

  // Mise à jour de la promotion actuel suite à la création de nouveau groupe
  if(!empty($_SESSION['id'])){
    $pdo = $conn->prepare('UPDATE compte SET promo=:promo WHERE id_compte=:id_compte');
    $pdo->bindValue(':promo', $promo, PDO::PARAM_INT);
    $pdo->bindValue(':id_compte', $_SESSION['id'], PDO::PARAM_INT);
    $update = $pdo->execute();
  }

  // Création de $nb_grp compte pour les élèves
  $query = $conn->prepare('INSERT INTO compte (`login`, `mdp`, `statut`, `promo`, `num_team`) VALUES (?, ?, ?, ?, ?)');
  for ($i=1; $i<= $nb_grp; $i++) {
      $num_team = $i;
      $login = 'team'.$i.$promo;
      $mdp = Genere_Password(10);
      //echo $mdp;
      // On crypte le mot de passe
      $passwordhash = hash('sha256', $mdp);
    if(!empty($_POST['promo']) && !empty($_POST['nb_grp'])){
        $ajout = $query->execute(array($login, $passwordhash, $statut, $promo, $num_team));
    } else {header('location: ../affichage_erreur.php?erreur=echec_ajout');}
  }
// Envoie vers la page d'affichage de compte
  header('location: ../pages_enseignant/affichage_grp.php');
} //else {header('location: ../index.php');}
?>
