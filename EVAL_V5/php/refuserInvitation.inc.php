<?php
if (isset($_POST['noSubmit'])) {
    header('Location:index.php');
}

if (isset($_POST['submit'])) {
    $_SESSION['message'] = "<h1>Vous avez supprimé l'invitation avec succès !</h1>";
    $pr->removeParticipate($_SESSION['uid'], $gid);
}
?>