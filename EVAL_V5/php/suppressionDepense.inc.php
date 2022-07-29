<?php
if (isset($_POST['noSubmit'])) {
    header('Location:depense.php?did=' . $did);
}

if (isset($_POST['submit'])) {
    $depense = $dr->getDepenseByDid($did);
    if(!$depense) {
        $_SESSION['message'] = "<h1>Cette dépense a déjà été supprimée !</h1>";
    } else {
        $cr->removeCaracteriserByDid($did);
        $dr->removeDepenseByDid($did);
    }
}
?>