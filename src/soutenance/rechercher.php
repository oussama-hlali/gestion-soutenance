<?php

include('../utils/adminOnlyPage.php');

include('../utils/connexion.php');



$query = 'SELECT Matricule,nom_Ens FROM Enseignant';
$req = $cnx->query($query);
$enseignants = $req->fetchAll();
$soutenances = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$Matricule = $_POST['Matricule'];
	$date = $_POST['date'];

	$query = 'SELECT S.*, E.nom AS etu_nom, E.prenom AS etu_prenom FROM Soutenance S JOIN Etudiant E ON S.Nce = E.NCE WHERE S.Matricule = :Matricule AND S.date_soutenance = :date';
	$statement = $cnx->prepare($query);
	$statement->bindParam(':Matricule', $Matricule);
	$statement->bindParam(':date', $date);
	$statement->execute();

	$soutenances = $statement->fetchAll();
}


$template = 'rechercher';
include 'layout_soutenance.phtml';
?>



<link rel="stylesheet" href="../../css/navbar.css">
<script src="../../js/navbar.js"></script>
