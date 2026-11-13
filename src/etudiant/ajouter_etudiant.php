<?php
include('../utils/adminOnlyPage.php');

include('../utils/connexion.php');
$template = 'ajouter_etudiant';
include 'layout_etudiant.phtml';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$NCE = $_POST['NCE'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$classe = $_POST['classe'];

	try {
		$mutation = "INSERT INTO Etudiant (NCE, nom, prenom, classe) VALUES (?, ?, ?, ?)";
		$statement = $cnx->prepare($mutation);
		$statement->bindParam(1, $NCE);
		$statement->bindParam(2, $nom);
		$statement->bindParam(3, $prenom);
		$statement->bindParam(4, $classe);

		$success = $statement->execute();
		
		if ($success) {
			$success_message = "Etudiant ajoute avec succes";
		} else {
			$error_message = "Erreur lors de l'ajout de l'etudiant";
		}
	} catch (\Throwable $th) {
		//throw $th;
	}
}
?>


<link rel="stylesheet" href="../../css/navbar.css">
<script src="../../js/navbar.js"></script>
