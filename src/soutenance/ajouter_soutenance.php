<?php

include('../utils/adminOnlyPage.php');
include('../utils/connexion.php');



$query = 'SELECT NCE,nom FROM Etudiant';
$req = $cnx->query($query);
$etudiants = $req->fetchAll();

$query = 'SELECT Matricule,nom_Ens FROM Enseignant';
$req = $cnx->query($query);
$enseignants = $req->fetchAll();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$Numjury = $_POST['Numjury'];
	$date_soutenance = $_POST['date_soutenance'];
	$note = $_POST['note'];
	$etudiant = $_POST['etudiant'];
	$enseignant = $_POST['enseignant'];

	$mutation = "INSERT INTO Soutenance (Numjury, date_soutenance, note, NCE, Matricule) VALUES (?, ?, ?, ?, ?)";
	$statement = $cnx->prepare($mutation);
	$statement->bindParam(1, $Numjury);
	$statement->bindParam(2, $date_soutenance);
	$statement->bindParam(3, $note);
	$statement->bindParam(4, $etudiant);
	$statement->bindParam(5, $enseignant);

	$success = $statement->execute();

	if ($success) {
		echo '<i class="bi bi-check2-circle"></i> Soutenance ajoutée avec succès';
	} else {
		echo '<i class="bi bi-check-circle"></i> Echec d\'ajout de la soutenance';
	}
}



$template = 'ajouter_soutenance';
include 'layout_soutenance.phtml';
?>


<link rel="stylesheet" href="../../css/navbar.css">
<script src="../../js/navbar.js"></script>
