<?php
session_start();
require 'inc/db_user.inc.php';

use User\UserRepository;
$ur = new UserRepository();
$_SESSION['message'] = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['nom'],$_POST['prenom'],$_POST['courriel'],$_POST['motPasse'],$_POST['confirmerMotPasse'])) {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $courriel = trim($_POST['courriel']);
        $motPassePasHash = trim($_POST['motPasse']);
        $motPassePasHashConfirm = trim($_POST['confirmerMotPasse']);

        $motPasse = hash("sha512", $motPassePasHash);

        $user = $ur->getUser($courriel);
        if ($user) {
            $_SESSION['message'] = "<h1>Cet utilisateur est déjà inscrit !</h1>";
        } else if ($motPassePasHash != $motPassePasHashConfirm) {
            $_SESSION['message'] = "<h1>Les mots de passe ne sont pas les mêmes !</h1>";
        } else {
            $ur->addUser($courriel, $nom, $prenom, $motPasse);
        }
    }
}
?>