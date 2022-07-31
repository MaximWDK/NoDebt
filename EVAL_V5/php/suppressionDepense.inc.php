<?php
if (isset($_POST['noSubmit'])) {
    header('Location:depense.php?did=' . $did);
}

if (isset($_POST['submit'])) {
    $depense = $dr->getDepenseByDid($did);
    if(!$depense) {
        $_SESSION['message'] = "<h1>Cette dépense a déjà été supprimée !</h1>";
    } else {
        $facture = $fr->getFactureByDid($did);
        if ($facture && unlink('uploads/factures/' . $facture->scan)) {
            $fr->removeAllFacturesByDid($did);
            $cr->removeCaracteriserByDid($did);
            $dr->removeDepenseByDid($did);
        } else {
            $fr->removeAllFacturesByDid($did);
            $cr->removeCaracteriserByDid($did);
            $dr->removeDepenseByDid($did);
        }
    }
}
?>