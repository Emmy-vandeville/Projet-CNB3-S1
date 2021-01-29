<?php
// Connexion base de données
$db_username = 'root';
$db_password = 'root';
try {
    $conn = new PDO("mysql:dbname=projet_cnb3_tpisa;host=localhost;charset=utf8", $db_username, $db_password);
} catch ( PDOException $e ) {
    echo 'Échec connexion PDO : ' . $e->getMessage() . "<br>\n";
}
?>
