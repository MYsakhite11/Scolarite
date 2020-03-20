<?php 
	if (!($_SESSION['profil']['ROLE']=="SCOLARITE")) {
		header("location:$_SERVER[HTTP_REFERER]");
	}
?>