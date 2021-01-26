<?php
session_start();
if (isset($_POST['ajout'])){
  $promo = $_POST['promo'];
  $nb_grp = $_POST['nb_grp'];
  $statut = 1;

  function generRandStr($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ&-_/#@%$*!?:;,()')
  {
   $chaine = '';
   $max = mb_strlen($listeCar, '8bit') - 1;
   for ($i = 0; $i < $longueur; ++$i) {
   $chaine .= $listeCar[random_int(0, $max)];
   }
   return $chaine;
  }

  require_once('configdb.php');
  for (int $i=1; $i<= $nb_grp; $i++) {
      $num_team = $i;
      $login = 'team'$i;
    if(!empty($_POST['promo']) && !empty($_POST['nb_grp'])){
        $query = $conn->prepare('INSERT INTO compte (login, mdp, statut, promo, num_team) VALUES (:login, :mdp, :statut, :promo, :num_team)');
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->bindValue(':mdp', $chaine, PDO::PARAM_STR);
        $query->bindValue(':statut', $statut, PDO::PARAM_INT);
        $query->bindValue(':promo', $promo, PDO::PARAM_INT);
        $query->bindValue(':num_team', $num_team, PDO::PARAM_INT);
        $ajout = $query->execute();
        $conn = NULL;
    } //else {header('location: ../affichage_erreur.php?erreur=echec_ajout');}
  }
  /*if($ajout){
    header('location: ../pages_enseignant/nouveau_grp.php');
  } else {header('location: ../affichage_erreur.php?erreur=echec_ajout');}*/
} // else {header('location: ../index.php');}
?>
