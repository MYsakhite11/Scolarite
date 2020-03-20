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
		<div class="panel-heading">Autehentification</div>
		<div class="panel-body">
			<form method="POST" action="Authentifier.php" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">USERNAME:</label>
					<input type="text" name="username" class="form-control">
				</div>
				<div class="form-group">
					<label class="control-label">PASSWORD:</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div>
					<button type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
	</div>
	
</body>
</html>