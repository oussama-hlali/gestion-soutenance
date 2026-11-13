<?php
	include('../utils/adminOnlyPage.php');

	include('../utils/connexion.php');
	$template = 'ajouter_enseignant';





	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$Matricule = $_POST['Matricule'];
		$nom_Ens = $_POST['nom_Ens'];
		$prenom_Ens = $_POST['prenom_Ens'];

		
		$checkQuery = "SELECT * FROM Enseignant WHERE Matricule = ?";
		$checkStatement = $cnx->prepare($checkQuery);
		$checkStatement->bindParam(1, $Matricule);
		$checkStatement->execute();
		
		if ($checkStatement->rowCount() > 0) {
			$error_message = "enseignant deja ajouté";
		} else {
			$mutation = "INSERT INTO Enseignant (Matricule, nom_Ens, prenom_Ens) VALUES (?, ?, ?)";
			$statement = $cnx->prepare($mutation);
			$statement->bindParam(1, $Matricule);
			$statement->bindParam(2, $nom_Ens);
			$statement->bindParam(3, $prenom_Ens);

			$success = $statement->execute();
			if ($success) {
				$success_message = "enseignant ajoute avec succes";
			} else {
				$error_message = "Erreur lors de l'ajout de l'enseignant";
			}
		}
	}

	include 'layout_ajout.phtml';
?>