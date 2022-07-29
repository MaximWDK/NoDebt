<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['dateHeure'], $_POST['montant'], $_POST['libelle'], $_POST['tag'])) {
        $did = $_GET['did'];
        $dateHeure = trim($_POST['dateHeure']);
        $montant = trim($_POST['montant']);
        $libelle = trim($_POST['libelle']);
        $tag = trim($_POST['tag']);
        $uid = $_SESSION['uid'];
        $depense = $dr->getDepenseByDid($did);
        $newUid = $depense->uid;
        $gid = $depense->gid;
        $caracteriser = $cr->getCaracteriserByDid($did);
        $tid = $caracteriser->tid;
        $tag2 = $tr->getTagByTid($tid);
        $tname = $tag2->tag;
        $depense2 = $dr->getDepenseByAll($dateHeure, $montant, $libelle, $newUid, $gid);

        if($depense2 && $tag == $tname) {
            $_SESSION['message'] = "<h1>Vous n'avez rien modifié !</h1>";
        } else {
            if($tr->getTagByTagNameAndGid($tag, $gid) != null) {
                if($tname == $tag) {
                    $dr->modifyDepense($did, $dateHeure, $montant, $libelle, $uid);
                } else {
                    $dr->modifyDepense($did, $dateHeure, $montant, $libelle, $uid);
                    $depense = $dr->getDepenseByAll($dateHeure, $montant, $libelle, $uid, $gid);
                    $did = $depense->did;
                    $tid = $tr->getTagByTagNameAndGid($tag, $gid)->tid;
                    $cr->updateCaracteriserByDidAndTid($did, $tid);
                }
            } else {
                $tr->addTag($tag, $gid);
                $dr->modifyDepense($did, $dateHeure, $montant, $libelle, $uid);
                $depense = $dr->getDepenseByAll($dateHeure, $montant, $libelle, $uid, $gid);
                $did = $depense->did;
                $tid = $tr->getTagByTagNameAndGid($tag, $gid)->tid;
                $cr->updateCaracteriserByDidAndTid($did, $tid);
            }
        }
    }
}
?>