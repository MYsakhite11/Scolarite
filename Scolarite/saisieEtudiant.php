<?php 
 	require_once('securite.php');
 	require_once('roleScolarite.php');
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
		<div class="panel panel-default">
			<div class="panel-heading alert alert-primary">Saisie des Etudiants</div>
			<div class="panel-body">
				<form method="POST" action="saveEtudiant.php" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label">Nom:</label>
						<input type="text" name="nom" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Email:</label>
						<input type="text" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">Photo:</label>
						<input type="file" name="photo" class="form-control">
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