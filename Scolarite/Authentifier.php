<?php
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	require_once('connexion.php');
	$requestResult = $pdo->prepare('SELECT * FROM Users WHERE USERNAME=? AND PASSWORD=?');
	$params = array($username, $password);
	$requestResult->execute($params);
	//on verifie si l'utilisateur existe
	if($user = $requestResult->fetch()){
		session_start();
		$_SESSION['profil'] = $user;
		header('location:etudiants.php');
	}
	else{
		header('location:login.php');
	}
 ?>
