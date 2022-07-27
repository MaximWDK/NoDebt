<?php
if (isset($_POST['noSubmit'])) {
    header('Location:index.php');
}

if (isset($_POST['submit'])) {
    $_SESSION['message'] = "<h1>Vous avez rejoint le groupe avec succès !</h1>";
        $pr->confirmParticipate($_SESSION['uid'], $gid);
}
?>