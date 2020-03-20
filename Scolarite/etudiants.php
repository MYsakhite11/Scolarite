<?php require_once('securite.php'); ?>
<?php 
	require_once('connexion.php');
	$motCle="";
	// le nombre d'elements a afficher
	$size=4;
	
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page = 0;
	}
	//declaration de la mitie du nombre d'element de la page
	$offset = $size*$page;

	//Rechercher un element avec son mot cle
	if(isset($_GET['motCle'])){
  		$motCle = $_GET['motCle'];
  		$request = "SELECT * FROM Etudiant WHERE NOM LIKE '%$motCle%'";

	}else{
		$request = "SELECT * FROM `Etudiant` LIMIT $size OFFSET $offset";
	}
	
	$resutlrequest = $pdo->prepare($request);
	$resutlrequest->execute();
	if (isset($_GET['motCle'])) {
		//faire une recherche tout en affichant la page sur laquelle l'element se trouve
		$requestnombrepage = $pdo->prepare("SELECT count(*) AS NmbreEtudiant FROM Etudiant WHERE NOM LIKE '%$motCle%'");
	}else{
		//Si on ne fait pas de recherche compter seulement le nombre de page
		$requestnombrepage = $pdo->prepare("SELECT count(*) AS NmbreEtudiant FROM Etudiant");
	}
	
	$requestnombrepage->execute();
	$ligne = $requestnombrepage->fetch(PDO::FETCH_ASSOC); //utiliser un tableau associatif:RECUPER UNE LIGNE SOUS FORME DE TABLEAU ASSOCIATIF
	$nbEtudiant = $ligne['NmbreEtudiant'];
	$NmbPage = floor($nbEtudiant/$size)+1;//ajout de un parce quon arrondie par defaut
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<?php require_once('entete.php')?>
	<div class="container">
		<div class="col-md-6 col-xs-6 spacer">
			<form method="GET" action="etudiants.php">
				<div class="form-group">
					<label class="control-label">Mot cle :</label>
					<input type="text" name="motCle" class="form-control" value="<?php echo($motCle) ?>">
					<button type="submit">Chercher</button>
				</div>
			</form>
		</div>
	</div>
	<br>
	<div class="container">
		<ul class="nav nav-pills">
			<!-- creation de liste pour l'affichage des differentes pages -->
			<?php for($i=0; $i<$NmbPage; $i++){ ?>
			<li class="nav-item">
				<a class="nav-link <?php echo(($i==$page)?'active':''); ?>" href="etudiants.php?page=<?php echo($i)?>">Page <?php echo($i); ?></a>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="container">
		<div class="panel panel-info spacer">
			<div class="panel-heading alert alert-primary">Liste des Etudiants</div>
			<div class="panel-body">
				<table class="table table-striped border border-primary">
					<thead>
						<th>CODE</th>
						<th>NOM</th>
						<th>EMAIL</th>
						<th>PHOTO</th>
					</thead>
					<tbody>
						<?php while($etudiant=$resutlrequest->fetch()){ ?>
						<tr>
							<td><?php echo($etudiant['CODE']) ?></td>
							<td><?php echo($etudiant['NOM']) ?></td>
							<td><?php echo($etudiant['EMAIL']) ?></td>
							<td><img src="images/<?php echo($etudiant['PHOTO']) ?>" width='100' height='100'></td>
							<td><a href="EditEtudiant.php?code=<?php echo($etudiant['CODE']) ?>">Edit</a></td>
							<td><a onclick="return confirm('Are you sure...?')" href="Supprime.php?code=<?php echo($etudiant['CODE']) ?>">Delete</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</body>
</html>