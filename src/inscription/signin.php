<?php
include('../utils/connexion.php');

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];

    if ($mot_de_passe !== $confirm_mot_de_passe) {
        $error = "Les mots de passe ne correspondent pas.";
        goto show_form;
    }

   
    $query = 'SELECT * FROM Administrateur WHERE login = :login';
    $statement = $cnx->prepare($query);
    $statement->bindValue(':login', $login);
    $statement->execute();

    if ($statement->fetch()) {
        $error = "Le nom d'utilisateur existe déjà.";
        goto show_form;
    }


    $insertQuery = 'INSERT INTO Administrateur (login, mot_de_passe) VALUES (:login, :mot_de_passe)';
    $insertStmt = $cnx->prepare($insertQuery);
    $insertStmt->bindValue(':login', $login);
    
    $insertStmt->bindValue(':mot_de_passe', password_hash($mot_de_passe, PASSWORD_DEFAULT));
    $success = $insertStmt->execute();

    if ($success) {
        header('Location: ../index.php');
        exit;
    } else {
        $error = "Une erreur est survenue pendant l'inscription.";
    }
}

show_form:
$template = 'signin';
include 'layout_signin.phtml';
?>
