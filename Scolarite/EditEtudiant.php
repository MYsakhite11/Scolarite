<?php 
 	require_once('securite.php');
 	require_once('roleScolarite.php');
 ?>
<?php
	$code=$_GET['code'];
	require_once('connexion.php');
	$requestResult = $pdo->prepare("SELECT * FROM Etudiant WHERE CODE=?");
	$params=array($code);
	$requestResult->execute($params);

	$Etudiant = $requestResult->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php require_once('entete.php') ?>
	<div class="container spacer col-md-6 col-xs-12 col-md-offset=3">
		<div class="panel panel-defaut">
		<div class="panel-heading alert alert-primary">Saisie des Etudiants</div>
		<div class="panel-body">
			<form method="POST" action="updateEtudiant.php" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">CODE: <?php echo($Etudiant['CODE']) ?></label>
					<input type="hidden" name="code" value="<?php echo($Etudiant['CODE']) ?>" class="form-control">
				</div>
				<div class="form-group">
					<label class="control-label">Nom:</label>
					<input type="text" name="nom" value="<?php echo($Etudiant['NOM']) ?>" class="form-control">
				</div>
				<div class="form-group">
					<label class="control-label">Email:</label>
					<input type="text" name="email" value="<?php echo($Etudiant['EMAIL']) ?>" class="form-control">
				</div>
				<div class="form-group">
					<label class="control-label">Photo:</label>
					<input type="file" name="photo" class="form-control">
					<img src="images/<?php echo($Etudiant['PHOTO']) ?>" width='100' height='100'>
				</div>
				<div>
					<button type="submit">Save</button>
				</div>
			</form>
		</div>
	</div>
	</div>
	
</body>
</html>