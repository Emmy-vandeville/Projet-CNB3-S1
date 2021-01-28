<?php
require_once("../config/configdb.php");

// On récuppère les informations du compte utilisateur
$query = $conn->prepare('SELECT * FROM compte WHERE id_compte=:id_compte');
$query->bindValue(':id_compte', $_SESSION['id'], PDO::PARAM_INT);
$query->execute();
$compte = $query->fetch();
$query->closeCursor();

$reponse = $conn->query('SELECT * FROM photo WHERE promo='.$compte['promo'].' AND team='.$compte['team'].'');

while ($donnees = $reponse->fetch())
{
	// echo $donnees['source'];
	echo '<li class="element"><img src="'.$donnees['source'].'" id="'.$donnees['id_photo'].'" height="150" width="150"/></li>';
}
$reponse->closeCursor(); // Termine le traitement de la requête

?>
