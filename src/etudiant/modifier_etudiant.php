<?php

include('../utils/adminOnlyPage.php');

if (!isset($_GET['NCE'])) {
	exit('NCE is required');
}

include('../utils/connexion.php');



$query = 'SELECT * FROM Etudiant WHERE NCE = ' . $_GET['NCE'];
$req = $cnx->query($query);
$etudiant = $req->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$NCE = $_POST['NCE'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$classe = $_POST['classe'];

	$mutation = "UPDATE Etudiant SET nom = ?, prenom = ?, classe = ? WHERE NCE = ?";
	$statement = $cnx->prepare($mutation);
	$statement->bindParam(1, $nom);
	$statement->bindParam(2, $prenom);
	$statement->bindParam(3, $classe);
	$statement->bindParam(4, $NCE);

	$success = $statement->execute();
}


$template= 'modifier_etudiant';
include 'layout_etudiant.phtml';
?>

<<link rel="stylesheet" href="../../css/navbar.css">
<script src="../../js/navbar.js"></script>
