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
            $facture = $fr->getFactureByDid($depense->did);
            if ($facture && unlink('uploads/factures/' . $facture->scan)) {
            $fr->removeAllFacturesByDid($depense->did);
            $cr->removeCaracteriserByDid($depense->did);
            $dr->removeDepenseByDid($depense->did);
            } else {
                $fr->removeAllFacturesByDid($depense->did);
                $cr->removeCaracteriserByDid($depense->did);
                $dr->removeDepenseByDid($depense->did);
            }
        }
        $tr->removeTagByGid($gid);
        $pr->removeAllParticipate($gid);
        $gr->removeGroup($gid);
    }
}
?>