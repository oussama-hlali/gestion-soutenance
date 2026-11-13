<?php
include('./utils/connexion.php');
$template = 'index';
include 'layout.phtml';

?>



<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION["login"]) {
	include("authentication/logout.php");
} else {
	include("authentication/login.php");
}
?>

