<?php
session_start();

require 'inc/db_user.inc.php';
use User\UserRepository;
$ur = new UserRepository();
$message = "";

if (isset($_POST['submit'])) {
    $user = $ur->getUser(htmlentities($_POST['courriel']));
    $password = hash("sha512", $_POST['motPasse']);
    if(!$user || ($password) != $user->motPasse) {
        $_SESSION['message'] = "<h1>Erreur ! Identifiant ou mot de passe incorrect(s)</h1>";
    }
    else {
        $_SESSION['courriel'] = htmlentities($_POST['courriel']);
        $_SESSION['uid'] = $user->uid;
        $_SESSION['nom'] = $user->nom;
        $_SESSION['prenom'] = $user->prenom;
        $_SESSION['pdp'] = $user->pdp;
        $_SESSION['estActif'] = $user->estActif;
        $_SESSION['message'] = "";
        if($_SESSION['estActif'] == '1') {
            header('Location:index.php');
        }
        else {
            $_SESSION['message'] = "<h1>Erreur ! Profil supprimé !</h1>";
        }
    }
}
?>