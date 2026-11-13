<?php

include('../utils/adminOnlyPage.php');

if (!isset($_GET['NCE'])) {
    exit('NCE is required');
}

include('../utils/connexion.php');



$NCE = $_GET['NCE'];

$query = 'SELECT * FROM Etudiant WHERE NCE = ' . $NCE;
$req = $cnx->query($query);
$etudiant = $req->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mutation = "DELETE FROM Etudiant WHERE NCE = :NCE";
    $statement = $cnx->prepare($mutation);
    $statement->bindParam(':NCE', $NCE);

    $statement->execute();

    header('Location: ./liste_etudiants.php');
    exit('etudiant supprimé');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1b4b 0%, #292a73 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .delete-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .delete-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        
        .warning-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #dc3545 0%, #ff6b7a 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem auto;
            color: white;
            font-size: 2.5rem;
        }
        
        .student-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem 0;
            text-align: left;
        }
        
        .student-info li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #dee2e6;
        }
        
        .student-info li:last-child {
            border-bottom: none;
        }
        
        .btn-danger {
            background: #dc3545;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            margin-right: 1rem;
        }
        
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="delete-container">
        <div class="delete-card">
            <div class="warning-icon">
                <i class="bi bi-exclamation-triangle"></i>
            </div>
            
            <h2 class="text-danger mb-3">Confirmer la suppression</h2>
            <p class="text-muted mb-4">Êtes-vous sûr de vouloir supprimer cet étudiant ? Cette action est irréversible.</p>
            
            <div class="student-info">
                <ul class="list-unstyled">
                    <li><strong>NCE :</strong> <?php echo $etudiant['NCE']; ?></li>
                    <li><strong>Nom :</strong> <?php echo $etudiant['nom']; ?></li>
                    <li><strong>Prénom :</strong> <?php echo $etudiant['prenom']; ?></li>
                    <li><strong>Classe :</strong> <?php echo $etudiant['classe']; ?></li>
                </ul>
            </div>
            
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?NCE=' . $NCE; ?>" method="POST">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-2"></i> Supprimer définitivement
                </button>
                <a href="liste_etudiants.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i> Annuler
                </a>
            </form>
        </div>
    </div>
    
    <script src="../../js/navbar.js"></script>
</body>
</html>