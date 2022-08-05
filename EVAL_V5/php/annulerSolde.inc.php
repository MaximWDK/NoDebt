<?php
if (isset($_POST['noSubmit'])) {
    header('Location:groupe.php?gid=' . $gid);
}

if (isset($_POST['submit'])) {
    $versements = $vr->getVersementsByGid($gid);
    if (!$versements) {
        $_SESSION['message'] = "<h1>Le solde de ce groupe a déjà été annulé !</h1>";
    } else {
        $vr->deleteVersementByGid($gid);
        $_SESSION['message'] = "<h1>Le solde de ce groupe a été annulé avec succès !</h1>";

    }
}
?>