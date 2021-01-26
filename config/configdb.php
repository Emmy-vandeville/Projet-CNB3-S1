<?php
$db_username = 'root';
$db_password = 'root';
$conn = new PDO('mysql:host=localhost;dbname=projet-cnb3-tpisa', $db_username, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) or die('Connexion à la base de données impossible');
?>
