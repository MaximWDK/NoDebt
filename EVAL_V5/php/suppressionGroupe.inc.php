<?php
require 'inc/db_participate.inc.php';
require 'inc/db_group.inc.php';

use Group\GroupRepository;
use Participate\ParticipateRepository;

$pr = new ParticipateRepository();
$gr = new GroupRepository();
$_SESSION['message'] = "";

if (isset($_POST['noSubmit'])) {
    header('Location:groupe.php');
}

if (isset($_POST['submit'])) {
    $gid = '1';
    $groupe = $gr->getGroupById($gid);

    if (!$groupe) {
        $_SESSION['message'] = "<h1>Ce groupe a déjà été supprimé !</h1>";
    } else {
        $pr->removeAllParticipate($gid);
        $gr->removeGroup($gid);
    }
}
?>