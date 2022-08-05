<?php ob_start(); $statut='tout'; $nomPage='Confirmation Solde'; require 'inc/checkConnexion.php'; require 'php/solder.inc.php'; require 'inc/header.inc.php'?>
<?php displaySolder();?>
<?php require 'inc/footer.inc.php'?>