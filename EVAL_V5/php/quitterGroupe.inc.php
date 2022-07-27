<?php
if (isset($_POST['noSubmit'])) {
    header('Location:groupe.php?gid=' . $gid);
}

if (isset($_POST['submit'])) {
    $_SESSION['message'] = "<h1>Vous avez quitté le groupe avec succès !</h1>";
    $pr->removeParticipate($_SESSION['uid'], $gid);
}
?>