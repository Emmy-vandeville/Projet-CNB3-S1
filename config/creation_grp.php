<?php
session_start();
if (isset($_POST['ajout'])){
  $promo = $_POST['promo'];
  $nb_grp = $_POST['nb_grp'];
  $statut = 1;

  function Genere_Password($size)
  {
      // Initialisation des caractères utilisables
      $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
  
      for($j=0;$j<$size;$j++)
      {
          $password .= ($j%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
      }
          
      return $password;
  }

  require_once('configdb.php');

  for ($i=1; $i<= $nb_grp; $i++) {
      $num_team = $i;
      $login = 'team'.$i;
      $mdp = Genere_Password(10);
    if(!empty($_POST['promo']) && !empty($_POST['nb_grp'])){
        $query = $conn->prepare('INSERT INTO compte (`login`, `mdp`, `statut`, `promo`, `num_team`) VALUES (?, ?, ?, ?, ?)');
        $ajout = $query->execute(array($login, $mdp, $statut, $promo, $num_team));
    } else {header('location: ../affichage_erreur.php?erreur=echec_ajout');}
  }
  header('location: ../pages_enseignant/nouveau_grp.php');
} //else {header('location: ../index.php');}
?>
