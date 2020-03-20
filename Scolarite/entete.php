<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active"><a class="nav-link" style="color: white;" href="etudiants.php">Etudiants</a></li>
		<li class="nav-item"><a class="nav-link" style="color: white;" href="saisieEtudiant.php">Saisie</a></li>
		<li class="nav-item"><a class="nav-link" style="color: white;" href="LogOut.php">LogOut [<?php echo((isset($_SESSION['profil']))?($_SESSION['profil']['USERNAME']):"") ?>]</a></li>
	</ul>
</nav>