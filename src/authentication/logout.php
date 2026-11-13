<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    if (isset($_SESSION['login'])) {
        $_SESSION = array();

        session_destroy();

        header('Location: index.php');

        unset ($_SESSION['login' ]);
        unset ($_SESSION['password']);
    } else {
        header("Location: index.php");
    }
}

$template = 'logout';  
include 'layout_login.phtml';

?>