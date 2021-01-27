<?php
require_once("../config/configdb.php");


$reponse = $conn->query('SELECT * FROM photo');
while ($donnees = $reponse->fetch())
{

	// echo $donnees['source'];
	echo '<li class="element"><img src="'.$donnees['source'].'" id="'.$donnees['id_photo'].'" height="150" width="150"/></li>';

}
$reponse->closeCursor(); // Termine le traitement de la requête

?>
