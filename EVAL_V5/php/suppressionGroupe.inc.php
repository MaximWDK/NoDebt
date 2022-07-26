<?php
if (isset($_POST['noSubmit'])) {
    header('Location:groupe.php?gid=' . $gid);
}

if (isset($_POST['submit'])) {
    $groupe = $gr->getGroupById($gid);

    if (!$groupe) {
        $_SESSION['message'] = "<h1>Ce groupe a déjà été supprimé !</h1>";
    } else {
        $pr->removeAllParticipate($gid);
        $gr->removeGroup($gid);
    }
}
?>