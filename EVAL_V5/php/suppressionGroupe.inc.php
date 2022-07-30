<?php
if (isset($_POST['noSubmit'])) {
    header('Location:groupe.php?gid=' . $gid);
}

if (isset($_POST['submit'])) {
    $groupe = $gr->getGroupById($gid);
    if (!$groupe) {
        $_SESSION['message'] = "<h1>Ce groupe a déjà été supprimé !</h1>";
    } else if ($_SESSION['uid'] != $groupe->uid) {
        $_SESSION['message'] = "<h1>Seul le créateur du groupe a la permission de le supprimer !</h1>";
    } else {

        $depenses = $dr->getDepenseByGid($gid);
        foreach ($depenses as $depense) {
            $cr->removeCaracteriserByDid($depense->did);
        }

        $tr->removeTagByGid($gid);
        $dr->removeDepenseByGid($gid);
        $pr->removeAllParticipate($gid);
        $gr->removeGroup($gid);
    }
}
?>