<?php

	include('../utils/adminOnlyPage.php');
	include('../utils/connexion.php');


	$query = 'SELECT * FROM Etudiant';
	$req = $cnx->query($query);
	$etudiants = $req->fetchAll();


	$template = 'liste_etudiants';
	include 'layout_etudiant.phtml';
?>


<link rel="stylesheet" href="../../css/navbar.css">
<script src="../../js/navbar.js"></script>
