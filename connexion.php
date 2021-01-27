<?php
/*session_start();
if ($_SESSION['autorisation']=='oui') {
  header('location:index.php');
  exit;
}*/
require('includes/header.php');
require('config/configdb.php');
session_start();

$conn = mysqli_connect("localhost","root","root","projet_cnb3_tpisa");

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$_SESSION['username'] = $username;
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `compte` WHERE login='$username' and mdp='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		$_SESSION['autorisation'] = 'oui';
		$_SESSION['acces'] = $user['statut'];
		$_SESSION['id'] = $user['id_compte'];
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['statut'] == 0) {
			header('location: pages_enseignant/enseignant.php');		  
		}else{
			header('location: pages_etudiant/etudiant.php');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
<main>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</main>

<?php require('includes/footer.php'); ?>
