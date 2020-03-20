<?php require_once('securite.php'); ?>
<?php
//dans un premier temps on utilisait: mysql_connect("localhost", "root", "") or die(mysql_error()); : presente beacoup de faille de securite.

// dans un second temps on utilisait : mysql_select_db(database_name) die(mysql_error()); : depasser et on peut faire mieux

try {
	$strConnection = 'mysql:host=localhost;dbname=scolarite';
	$pdo = new PDO($strConnection, 'root', '');
}
catch(PDOException $e){
	$msg = 'ERREUR PDO dans ' . $e->getMessage();
	die($msg);  
}
?>
