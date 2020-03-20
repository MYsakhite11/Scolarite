<?php require_once('securite.php'); ?>
<?php
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$nomPhoto = $_FILES['photo']['name'];
	$fichierTEmporaire = $_FILES['photo']['tmp_name'];

	move_uploaded_file($fichierTEmporaire, 'images/'.$nomPhoto);

	require_once('connexion.php');
	$requestResult = $pdo->prepare('INSERT INTO Etudiant(NOM, EMAIL, PHOTO) VALUES(?,?,?) ');
	$params = array($nom, $email, $nomPhoto);
	$requestResult->execute($params);
	header('location:etudiants.php');

 ?>
