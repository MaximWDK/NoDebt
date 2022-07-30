<?php
session_start();
if(!isset($_SESSION['courriel']) && $_SESSION['estActif'] == 0) {
header('Location: connexion.php');
}
?>