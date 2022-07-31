<?php
if (isset($_POST['noSubmit'])) {
    header('Location:factures.php?did=' . $did);
}

if (isset($_POST['submit'])) {
    $facture = $fr->getFactureByFid($fid);
    if(!$facture) {
        $_SESSION['message'] = "<h1>Cette facture a déjà été supprimée !</h1>";
    } else {
        if (unlink('uploads/factures/' . $facture->scan)) {
            $fr->removeFactureByFid($fid);
            $_SESSION['message'] = "<h1>La facture a bien été supprimée !</h1>";
        } else {
            $_SESSION['message'] = "<h1>Une erreur est survenue lors de la suppression de la facture !</h1>";
        }
    }
}
?>