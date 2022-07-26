<?php
require 'inc/db_user.inc.php';
require 'inc/db_participate.inc.php';

use User\UserRepository;
use Participate\ParticipateRepository;

$ur = new UserRepository();
$pr = new ParticipateRepository();
$_SESSION['message'] = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['courriel'])) {
        $courriel = trim($_POST['courriel']);
        $user = $ur->getUser($courriel);
        if ($user) {
            $uid2 = $user->uid;
            $gid2 = '1';
            $participate = $pr->checkIfExistsParticipate($uid2, $gid2);
        }

        if (!$user) {
            $_SESSION['message'] = "<h1>Cet utilisateur n'existe pas !</h1>";
        } elseif ($participate) {
            $_SESSION['message'] = "<h1>Cet utilisateur a déjà été invité !</h1>";
        } else {
            $uid = $user->uid;
            $gid = '1';
            $estConfirme = '0';
            $pr->addParticipate($uid, $gid, $estConfirme);
            $_SESSION['message'] = "<h1>L'utilisateur a été invité avec succès !</h1>";
        }
    }
}
?>