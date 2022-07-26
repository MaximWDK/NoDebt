<?php
require 'inc/db_user.inc.php';
require 'inc/db_participate.inc.php';
require 'inc/db_group.inc.php';

use User\UserRepository;
use Participate\ParticipateRepository;
use Group\GroupRepository;
$ur = new UserRepository();
$pr = new ParticipateRepository();
$gr = new GroupRepository();
$_SESSION['message'] = "";

$groupes = $gr->getAllGroups();
$participates = $pr->getParticipateByUid($_SESSION['uid']);
?>
