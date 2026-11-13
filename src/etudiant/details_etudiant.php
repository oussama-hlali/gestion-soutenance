<?php
include('../utils/adminOnlyPage.php');
include('../utils/connexion.php');

if (!isset($_GET['NCE'])) {
    header('Location: liste_etudiants.php');
    exit;
}

$NCE = $_GET['NCE'];
$query = 'SELECT * FROM Etudiant WHERE NCE = :NCE';
$stmt = $cnx->prepare($query);
$stmt->bindParam(':NCE', $NCE, PDO::PARAM_INT);
$stmt->execute();
$etudiant = $stmt->fetch();

if (!$etudiant) {
    header('Location: liste_etudiants.php');
    exit;
}

$template = 'details_etudiant';
include 'layout_etudiant.phtml';
?>
