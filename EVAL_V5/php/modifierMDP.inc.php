<?php
require 'inc/checkConnexion.php';
require 'inc/db_user.inc.php';

use User\UserRepository;
$ur = new UserRepository();
$_SESSION['message'] = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['motPasse'],$_POST['confirmerMotPasse'])) {
        $motPasse = trim($_POST['motPasse']);
        $motPasseConfirm = trim($_POST['confirmerMotPasse']);
        $uid = $_SESSION['uid'];
        $courriel = $_SESSION['courriel'];
        $user = $ur->getUser($courriel);
        if ($motPasse != $motPasseConfirm) {
            $_SESSION['message'] = "<h1>Les mots de passe ne sont pas les mêmes !</h1>";
        } else if (hash("sha512", $motPasse) == $user->motPasse) {
            $_SESSION['message'] = "<h1>Le mot de passe saisit doit être différent de votre mot de passe actuel !</h1>";
        } else {
            $ur->modifyPassword($motPasse, $uid);
        }

    }
}
?>