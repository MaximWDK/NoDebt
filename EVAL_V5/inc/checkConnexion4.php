<?php
session_start();
if(!isset($_SESSION['courriel'])) {
header('Location: connexion.php');
}
require 'inc/db_user.inc.php';
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_depense.inc.php';

use User\UserRepository;
use Group\GroupRepository;
use Participate\ParticipateRepository;
use Depense\DepenseRepository;

$ur = new UserRepository();
$gr = new GroupRepository();
$pr = new ParticipateRepository();
$dr = new DepenseRepository();

$_SESSION['message'] = "";
$uid = $_SESSION['uid'];
$gid = $_GET['gid'];
$participe = $pr->getParticipateByUidAndGid($uid, $gid);

if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 0) {
    $_SESSION['message'] = "";
} else {
    header("Location: index.php");
}
?>