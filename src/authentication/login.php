<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<?php


if (isset($_POST['submit'])) {

    extract($_POST);

    $query = 'SELECT * FROM Administrateur WHERE login = :login ';
    $statement = $cnx->prepare($query);

    $statement->bindValue(':login', $login);
    $statement->execute();

    $row = $statement->fetch();

    if ($row == false) {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
        goto show_form;
    } else {
        if(password_verify($mot_de_passe, $row['mot_de_passe'])) {
            
       
            session_start();

            $_SESSION['login'] = $row['login'];

            header('Location: index.php');
         }
    }
}
show_form:
$template = 'login';
include 'layout_login.phtml';

?>