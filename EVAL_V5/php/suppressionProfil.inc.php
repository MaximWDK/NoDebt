<?php $statut='tout'; $nomPage='Suppression Profil'; require 'inc/checkConnexion.php';
require ('inc/db_user.inc.php');

use User\UserRepository;
$ur = new UserRepository();

if (isset($_POST['submit'])) {
    $ur->removeUser($_SESSION['uid']);
    header('Location:deconnexion.php');
}

if (isset($_POST['nosubmit'])) {
    header('Location:index.php');
}
?>