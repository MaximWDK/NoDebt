<?php
require 'inc/db_group.inc.php';

use Group\GroupRepository;
$gr = new GroupRepository();
$_SESSION['message'] = "";

if (isset($_POST['submit'])) {
    if (isset($_POST['nom'],$_POST['devise'])) {
        $nom = trim($_POST['nom']);
        $devise = trim($_POST['devise']);
        $gid = '1';

        $gr->modifyGroup($gid, $nom, $devise);
    }
}
?>