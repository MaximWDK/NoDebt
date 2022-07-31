<?php
session_start();
if(!isset($_SESSION['courriel']) && $_SESSION['estActif'] == 0) {
    header('Location: connexion.php');
}
require 'inc/db_user.inc.php';
require 'inc/db_group.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_depense.inc.php';
require 'inc/db_tag.inc.php';
require 'inc/db_caracteriser.inc.php';
require 'inc/db_factures.inc.php';

use User\UserRepository;
use Group\GroupRepository;
use Participate\ParticipateRepository;
use Depense\DepenseRepository;
use Tag\TagRepository;
use Caracteriser\CaracteriserRepository;
use Factures\FacturesRepository;

$ur = new UserRepository();
$gr = new GroupRepository();
$pr = new ParticipateRepository();
$dr = new DepenseRepository();
$tr = new TagRepository();
$cr = new CaracteriserRepository();
$fr = new FacturesRepository();

$_SESSION['message'] = "";
$uid = $_SESSION['uid'];
$gid = $_GET['gid'];
$participe = $pr->getParticipateByUidAndGid($uid, $gid);
$groupe = $gr->getGroupById($gid);

if ($participe->uid == $_SESSION['uid'] && $gid == $participe->gid && $participe->estConfirme == 1) {
    $_SESSION['message'] = "";
} else {
    header("Location: index.php");
}
?>