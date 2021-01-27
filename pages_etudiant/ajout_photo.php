<?php
/*session_start();

if ($_SESSION['autorisation']!='oui' || $_SESSION['acces']!=1) {
  header('location: ../index.php');
  exit;
}*/
require_once("../config/configdb.php");


$dossier = '../img';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 500000;
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

       $sources = "../img/$fichier";
       $promo = 0;
       $team = 0;
       $id_categorie = 0;
       $id_lieu = 0;

       $query = $conn->prepare('INSERT INTO photo (source, promo, team, id_categorie, id_lieu) VALUES (:source, :promo, :team, :id_categorie, :id_lieu)');
       $query->bindValue(':source', $sources, PDO::PARAM_STR);
       $query->bindValue(':promo', $promo, PDO::PARAM_STR);
       $query->bindValue(':team', $team, PDO::PARAM_STR);
       $query->bindValue(':id_categorie', $id_categorie, PDO::PARAM_STR);
       $query->bindValue(':id_lieu', $id_lieu, PDO::PARAM_STR);
       $query->execute();

       header('Location: mes_photos.php');
}
else
{
     echo $erreur;
}
?>
