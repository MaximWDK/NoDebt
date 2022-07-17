<?php
session_start();
if(!isset($_SESSION['courriel'])) {
header('Location: connexion.php');
}
?>