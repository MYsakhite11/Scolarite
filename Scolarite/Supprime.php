<?php 
 	require_once('securite.php');
 	require_once('roleScolarite.php');
 ?> 
<?php
	$code = $_GET['code'];
	require_once('connexion.php');
	$requestResult=$pdo->prepare("DELETE FROM Etudiant WHERE CODE=?");
	$params = array($code);
	$requestResult->execute($params);

	header('location:etudiants.php');
?>
