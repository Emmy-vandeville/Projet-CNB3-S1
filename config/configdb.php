<?php
$db_username = 'root';
$db_password = '';
$conn = new PDO('mysql:host=localhost;dbname=projet_cnb3_tpisa', $db_username, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) or die('Connexion à la base de données impossible');
?>
