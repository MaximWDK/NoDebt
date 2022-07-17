<?php
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';

use Group\GroupRepository;
use Participate\ParticipateRepository;
$pr = new ParticipateRepository();
$gr = new GroupRepository();
$_SESSION['message'] = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['nom'],$_POST['devise'])) {
        $nom = trim($_POST['nom']);
        $devise = trim($_POST['devise']);
        $uid = $_SESSION['uid'];

        $gr->addGroup($nom, $devise, $uid);
        $groupe = $gr->getGroup($nom);
        $gid2 = $groupe->gid;
        $nom2 = $groupe->nom;
        $uid2 = $groupe->uid;
        $estConfirme = '1';

        $pr->addParticipate($uid2, $gid2, $estConfirme);

    }
}
?>