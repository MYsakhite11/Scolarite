<?php 
 	require_once('securite.php');
 	require_once('roleScolarite.php');
 ?>
<?php
	$code = $_POST['code'];
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$nomPhoto = $_FILES['photo']['name'];
	require_once('connexion.php');
	if($nomPhoto==""){
		$requestResult = $pdo->prepare('UPDATE Etudiant SET NOM=?, EMAIL=? WHERE CODE=?');
		$params = array($nom, $email, $code);
		$requestResult->execute($params);
		header('location:etudiants.php');
	}else{
		$fichierTEmporaire = $_FILES['photo']['tmp_name'];
		move_uploaded_file($fichierTEmporaire, 'images/'.$nomPhoto);
		$requestResult = $pdo->prepare('UPDATE Etudiant SET NOM=?, EMAIL=?, PHOTO=? WHERE CODE=?');
		$params = array($nom, $email, $nomPhoto, $code);
		$requestResult->execute($params);
		header('location:etudiants.php');
	}
 ?>
