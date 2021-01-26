<?php
session_start();
if(isset($_POST['valider'])) // Test appuie sur bouton de connexion
{
    // Appel connexion bdd
  require_once('configdb.php');

  // On réccupère les valeurs passées en POST
  $login = htmlentities($_POST['login']);
  $password = htmlentities($_POST['mdp']);

  // On teste que les valeurs réccupérées ne sont pas vide
  if (!empty($login) AND !empty($password)) {
    // On réccupère les informations du compte de même login
    $req = $conn->prepare('SELECT * FROM compte WHERE login = ?');
    $req->execute(array($login));
    $resultCheck = $req->rowCount();
    //
    if ($resultCheck == 1) {
      $compte = $req->fetch();
      $mdp = $compte['mdp'];
      $statut = $compte['statut'];
      // Teste si le mot de passe réccupéré et le mot de passe hash de la bdd sont les même
      $hashedPasswordCheck = password_verify($password, $mdp);
      if ($hashedPasswordCheck) {
            $_SESSION['autorisation'] = 'oui';
            $_SESSION['acces'] = $statut;
            $_SESSION['id_compte'] = $compte['id_compte'];
            $_SESSION['login'] = $compte['login'];
            $conn = NULL;
          switch ($statut){
            case 0:
              header('location: ../pages_enseignant/enseignant.php');
              break;
            case 1:
              header('location: ../pages_etudiant/etudiant.php');
              break;
          }
        }
      }
      else {
        $_SESSION = [];
        session_destroy();
        header('location: ../affichage_erreur.php?erreur=echec_authentification');
      }
    }
    else {
      $_SESSION = [];
      session_destroy();
      header('location: ../affichage_erreur.php?erreur=echec_authentification');
    }
  }
  else {
    $_SESSION = [];
    session_destroy();
    header('location: ../affichage_erreur.php?erreur=echec_authentification');
  }
}
else {header('Location: ../index.php');}
?>
