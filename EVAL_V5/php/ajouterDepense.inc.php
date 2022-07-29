<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['dateHeure'], $_POST['montant'], $_POST['libelle'], $_POST['tag'])) {
        $dateHeure = trim($_POST['dateHeure']);
        $montant = trim($_POST['montant']);
        $libelle = trim($_POST['libelle']);
        $tag = trim($_POST['tag']);
        $uid = $_SESSION['uid'];
        $gid = $_GET['gid'];

        if ($tr->getTagByTagNameAndGid($tag, $gid) != null) {
            $tag2 = $tr->getTagByTagNameAndGid($tag, $gid);
            $tid = $tag2->tid;
            $tname = $tag2->tag;
            if ($tname == $tag) {
                $depense = $dr->getDepenseByAll($dateHeure, $montant, $libelle, $uid, $gid);
                if ($depense) {
                    $_SESSION['message'] = "<h1>Cette dépense existe déjà !</h1>";
                } else {
                    $dr->addDepense($dateHeure, $montant, $libelle, $uid, $gid);
                    $depense = $dr->getDepenseByAll($dateHeure, $montant, $libelle, $uid, $gid);
                    $did = $depense->did;
                    $cr->addCaracteriserByDidAndTid($did, $tid);
                }
            } else {
                $depense = $dt->getDepenseByAll($dateHeure, $montant, $libelle, $uid, $gid);
                if ($depense) {
                    $_SESSION['message'] = "<h1>Cette dépense existe déjà !</h1>";
                } else {
                    $tr->addTag($tag, $gid);
                    $dr->addDepense($dateHeure, $montant, $libelle, $uid, $gid);
                    $depense = $dr->getDepenseByAll($dateHeure, $montant, $libelle, $uid, $gid);
                    $did = $depense->did;
                    $cr->addCaracteriserByDidAndTid($did, $tid);
                }
            }
        } else {
            $tr->addTag($tag, $gid);
            $tag2 = $tr->getTagByTagNameAndGid($tag, $gid);
            $tid = $tag2->tid;
            $dr->addDepense($dateHeure, $montant, $libelle, $uid, $gid);
            $depense = $dr->getDepenseByAll($dateHeure, $montant, $libelle, $uid, $gid);
            $did = $depense->did;
            $cr->addCaracteriserByDidAndTid($did, $tid);

        }
    }
}
?>