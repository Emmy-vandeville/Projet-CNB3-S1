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

//On va chercher l'image dans le dossier
$dossier = '../img/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 1000000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg, .PNG', '.GIF', '.JPG', '.JPEG');
$extension = strrchr($_FILES['avatar']['name'], '.');

if(isset($_POST['animaux'])){
     if($_POST['animaux']=="1"){
             $esp = 1;
     }
     elseif($_POST['animaux']=="2"){
          $esp = 2;
     }
     elseif($_POST['animaux']=="3"){
          $esp = 3;
     }
     elseif($_POST['animaux']=="4"){
          $esp = 4;
     }
     elseif($_POST['animaux']=="5"){
          $esp = 5;
     }
     elseif($_POST['animaux']=="6"){
          $esp = 6;
     }
     elseif($_POST['animaux']=="7"){
          $esp = 7;
     }
     elseif($_POST['animaux']=="8"){
          $esp = 8;
     }
     elseif($_POST['animaux']=="9"){
          $esp = 9;
     }
     elseif($_POST['animaux']=="10"){
          $esp = 10;
     }
     elseif($_POST['animaux']=="11"){
          $esp = 11;
     }
     elseif($_POST['animaux']=="12"){
          $esp = 12;
     }
     elseif($_POST['animaux']=="13"){
          $esp = 13;
     }
     elseif($_POST['animaux']=="14"){
          $esp = 14;
     }
     elseif($_POST['animaux']=="15"){
          $esp = 15;
     }
     else{
          $esp = 16;
     }
}

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
       $id_categorie = $esp; //Ajouter ici l'ID de l'espèce sélectionnée
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
