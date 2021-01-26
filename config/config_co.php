<?php
session_start();
if(isset($_POST['valider']))
{
  require_once('configdb.php');

  $login = htmlentities($_POST['login']);
  $password = htmlentities($_POST['mdp']);

  if (!empty($login) AND !empty($password)) {

    $req = $conn->prepare('SELECT * FROM compte WHERE login = ?');
    $req->execute(array($login));
    $resultCheck = $req->rowCount();

    if ($resultCheck == 1) {
      $data = $req->fetch();
      $result = $data['mdp'];
      $statut = $data['statut'];
      $hashedPasswordCheck = password_verify($password, $result);
      if ($hashedPasswordCheck) {
            $_SESSION['autorisation'] = 'oui';
            $_SESSION['acces'] = $statut;
            $_SESSION['id_compte'] = $data['id_compte'];
            $_SESSION['login'] = $data['login'];
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
