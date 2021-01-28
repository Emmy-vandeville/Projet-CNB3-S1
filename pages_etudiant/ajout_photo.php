<?php
session_start();
/*
if ($_SESSION['autorisation']!='oui' || $_SESSION['acces']!=1) {
  header('location: ../index.php');
  exit;
}*/
require_once("../config/configdb.php");

// On récuppère les informations du compte utilisateur
$query1 = $conn->prepare('SELECT * FROM compte WHERE id_compte =:id_compte');
$query1->bindValue(':id_compte', $_SESSION['id'], PDO::PARAM_INT);
$query1->execute();
$compte = $query1->fetch();
$query1->closeCursor();

//On defini le dossier d'enregistrement
$dossier = '../img/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 1000000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg, .PNG', '.GIF', '.JPG', '.JPEG');
$extension = strrchr($_FILES['avatar']['name'], '.');

//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, ou jpeg';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
       $sources = "../img/$fichier";
       $promo = $compte['promo'];
       $id_categorie = 0;
       $id_lieu = 0;
       $team = $compte['num_team'];
       $disposition = 'attachment';

       $query = $conn->prepare('INSERT INTO photo (source, promo, id_categorie, id_lieu, team, disposition) VALUES (:source, :promo, :id_categorie, :id_lieu, :team, :disposition)');
       $query->bindValue(':source', $sources, PDO::PARAM_STR);
       $query->bindValue(':promo', $promo, PDO::PARAM_STR);
       $query->bindValue(':team', $team, PDO::PARAM_STR);
       $query->bindValue(':id_categorie', $id_categorie, PDO::PARAM_STR);
       $query->bindValue(':id_lieu', $id_lieu, PDO::PARAM_STR);
       $query->bindValue(':team', $team, PDO::PARAM_STR);
       $query->bindValue(':disposition', $disposition, PDO::PARAM_STR);
       $query->execute();
       header('Location: mes_photos.php');
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
?>
