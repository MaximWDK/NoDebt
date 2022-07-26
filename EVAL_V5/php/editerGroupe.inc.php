<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['nom'],$_POST['devise'])) {

        $nom = trim($_POST['nom']);
        $devise = trim($_POST['devise']);
        $gid = $_GET['gid'];
        $existGroup = $gr->getGroup($nom);
        if ($existGroup) {
            $_SESSION['message'] = "<h1>Ce nom de groupe existe déjà !</h1>";
        } else {
        $gr->modifyGroup($gid, $nom, $devise);
        }
    }
}
?>