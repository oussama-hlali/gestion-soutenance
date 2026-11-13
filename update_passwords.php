<?php
include('src/utils/connexion.php');

try {
    $hashedPassword = password_hash('password', PASSWORD_DEFAULT);
    $updateQuery = "UPDATE Administrateur SET mot_de_passe = :hashedPassword";
    $stmt = $cnx->prepare($updateQuery);
    $stmt->bindValue(':hashedPassword', $hashedPassword);
    $stmt->execute();
    echo "Passwords updated successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
