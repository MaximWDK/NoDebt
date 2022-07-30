<?php
require 'inc/checkConnexion.php';
require 'inc/db_user.inc.php';

use User\UserRepository;
$ur = new UserRepository();
$message = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['nom'],$_POST['prenom'],$_POST['courriel'])) {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $courriel = trim($_POST['courriel']);
        $uid = $_SESSION['uid'];
        $pdp = $_SESSION['pdp'];

        $user = $ur->getUser($courriel);
        $ur->modifyUser($courriel, $nom, $prenom, $uid, $pdp);
    }
}
?>